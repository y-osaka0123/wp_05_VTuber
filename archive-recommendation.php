<?php get_header(); ?>
<?php $links = custom_links(); ?>

<section  class="section archive_section">
  <div id="recommendation_archive_inner" class="inner">
    <h2 class="section_title">Recommendation</h2>
    <p class="affiliates_text">当ページはアフィリエイトプログラムによる収益を得ています。</p>
    <ul>
      <?php
        // recommendationカテゴリの投稿総数と最新10件の投稿を1つのクエリで取得
        $query = new WP_Query(array(
          'post_type' => 'recommendation',
          'posts_per_page' => 10,   // 表示する投稿数
          'order' => 'DESC',       // 降順で表示
          'orderby' => 'date',      // 日付順にソート
          'paged' => get_query_var('paged', 1),  // 現在のページを取得
        ));

        $total_posts = $query->found_posts; // 総投稿数を取得
        if ($query->have_posts()) :
          while ($query->have_posts()) : $query->the_post(); // ここでループを開始
      ?>
        <li class="reco_box">
          <a href="<?php the_permalink(); ?>">
            <?php the_content(); ?>
          </a>
        </li>
      <?php 
          endwhile; 
          wp_reset_postdata(); // ループ終了後にデータをリセット
        endif;
      ?>
    </ul>

    <div class="pnum">
      <?php
        // 現在のページ番号を取得
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        // 1ページあたりの表示件数
        $posts_per_page = 10;
        // 現在表示している投稿の範囲を計算
        $start_post = ($paged - 1) * $posts_per_page + 1;
        $end_post = min($paged * $posts_per_page, $total_posts);

        // 総投稿数と表示範囲の出力
        echo "全{$total_posts}件中 {$start_post}件〜{$end_post}件";
      ?>

      <?php
        // ページネーションの表示
        the_posts_pagination( array(
          'mid_size'  => 2,
          'prev_text' => __( '« 前へ' ),
          'next_text' => __( '次へ »' ),
        ) );
      ?>

    </div>
    <a href="<?php echo $links['top']; ?>" class="btn_back"><p>TOP</p></a> 

  </div>
  <img class="bg_common bg_a_common_hil" src="<?php echo $links['bg_oblique3']; ?>" alt="装飾画像">
  <img class="bg_common bg_a_common_hir bg_dot" src="<?php echo $links['bg_dot']; ?>" alt="装飾画像">
  <img class="bg_common bg_a_common_cel" src="<?php echo $links['bg_oblique2bo']; ?>" alt="装飾画像">
  <img class="bg_common bg_a_common_cer" src="<?php echo $links['bg_oblique3bo']; ?>" alt="装飾画像">
  <img class="bg_common bg_a_common_lor" src="<?php echo $links['bg_oblique1bo']; ?>" alt="装飾画像">
  <img class="bg_common bg_a_common_lol bg_circle" src="<?php echo $links['bg_circle']; ?>" alt="装飾画像">
</section>

<?php get_footer(); ?>