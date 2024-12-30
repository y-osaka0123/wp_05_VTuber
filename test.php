<?php

// #1 $_POST['paged']で現在のページ番号を受け取り、WP_Queryにpagedパラメータを渡します。さらに、ページネーションのHTMLをAJAXのレスポンスとして返します。
// ページネーション表示バグ発生
function load_gallery_items() {
    if (isset($_POST['post_type'])) {
        $post_type = sanitize_text_field($_POST['post_type']);
        $paged = isset($_POST['paged']) ? intval($_POST['paged']) : 1;  // ページ番号を取得
        
        // WP_Queryでpost_typeごとの投稿を取得
        $gallery_query = new WP_Query(array(
            'post_type' => $post_type,
            'posts_per_page' => 10,
            'paged' => $paged  // 現在のページ番号を設定
        ));

        if ($gallery_query->have_posts()) :
            // ギャラリーアイテム
            ob_start();
            while ($gallery_query->have_posts()) : $gallery_query->the_post(); ?>
                <li class="gallery_item">
                    <img class="gallery-image" src="<?php the_post_thumbnail_url('medium'); ?>"
                        data-full="<?php the_post_thumbnail_url('full'); ?>" alt="">
                </li>
            <?php endwhile;
            $items = ob_get_clean();

            // ページネーション
            ob_start();
            echo paginate_links(array(
                'total' => $gallery_query->max_num_pages,
                'current' => $paged,
                'format' => '?paged=%#%',
                'type' => 'list',
                'prev_text' => __('« 前へ'),
                'next_text' => __('次へ »'),
            ));
            $pagination = ob_get_clean();

            // JSONで結果を返す
            wp_send_json_success(array(
                'items' => $items,
                'pagination' => $pagination
            ));
        endif;

        wp_reset_postdata();
    }
    wp_die();
}

// AJAX用のフックを追加
add_action('wp_ajax_load_gallery_items', 'load_gallery_items');
add_action('wp_ajax_nopriv_load_gallery_items', 'load_gallery_items'); // 非ログインユーザーにも対応


