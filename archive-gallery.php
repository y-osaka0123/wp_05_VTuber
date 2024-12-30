<?php get_header(); ?>
<?php $links = custom_links(); ?>

<section class="section archive_section">
  <div class="inner gallery_flex">
    <h2 class="section_title">Gallery</h2>
    <div id="gallery_items">
      <ul class="gallery_columns masonry-container">
      <?php
      // ページ番号を取得
      $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

      // カスタム投稿のクエリ設定
      $args = array(
          'post_type' => 'gallery', // 必要に応じてカスタム投稿タイプを指定
          'posts_per_page' => 12,
          'paged' => $paged,
      );
      $query = new WP_Query($args);

      if ($query->have_posts()) {
          // 投稿が存在する場合に表示
          while ($query->have_posts()) {
              $query->the_post();
              if (has_post_thumbnail()) {
                  echo '<li class="gallery_item">';
                  echo '<img class="gallery_img" src="' . get_the_post_thumbnail_url(get_the_ID(), 'medium') . '" data-full="' . get_the_post_thumbnail_url(get_the_ID(), 'full') . '">';
                  echo '</li>';
              }
          }
      } else {
          // 投稿が存在しない場合のメッセージ
          echo '<p>No posts found.</p>';
      }
      wp_reset_postdata();
      ?>
      </ul>
    </div>

    <!-- PHPでのページネーションリンクの生成 -->
    <div class="pagination">
      <?php
      echo paginate_links(array(
          'total' => $query->max_num_pages,
          'current' => $paged,
          'format' => '?paged=%#%',
          'show_all' => false,
          'type' => 'plain',
          'prev_text' => __('&laquo; Previous'),
          'next_text' => __('Next &raquo;'),
      ));
      ?>
    </div>

    <div class="btn_back"> 
      <a href="<?php echo $links['top']; ?>"><p>TOP</p></a> 
    </div>
  </div>

  <!-- モーダルウィンドウのHTMLを追加 -->
  <div id="image-modal" class="modal">
      <span class="close">&times;</span>
      <img class="modal-content" id="modal-img">
  </div>
  <img class="bg_common bg_a_common_hil" src="<?php echo $links['bg_oblique3']; ?>" alt="装飾画像">
  <img class="bg_common bg_a_common_hir bg_dot" src="<?php echo $links['bg_dot']; ?>" alt="装飾画像">
  <img class="bg_common bg_a_common_cel" src="<?php echo $links['bg_oblique2bo']; ?>" alt="装飾画像">
  <img class="bg_common bg_a_common_cer" src="<?php echo $links['bg_oblique3bo']; ?>" alt="装飾画像">
  <img class="bg_common bg_a_common_lor" src="<?php echo $links['bg_oblique1bo']; ?>" alt="装飾画像">
  <img class="bg_common bg_a_common_lol bg_circle" src="<?php echo $links['bg_circle']; ?>" alt="装飾画像">
</section>

<?php get_footer(); ?>