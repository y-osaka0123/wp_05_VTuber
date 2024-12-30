<?php get_header(); ?>
<?php $links = custom_links(); ?>

<section class="section archive_section">
  <div class="inner">
    <h2 class="section_title">News</h2>
    <div id="news_archive_topic">
      <!-- トピックをページネーションで2ページ目以降では非表示に -->
      <?php if (!is_paged()) : ?>
        <div id="news_archive_oldest">
          <?php
          // 最も古い投稿を1件取得
          $oldest_post_query = new WP_Query(array(
              'post_type' => 'news',
              'posts_per_page' => 1,
              'order' => 'ASC',        // 昇順で最も古い投稿を取得
              'orderby' => 'date',     // 日付順にソート
          ));

          if ($oldest_post_query->have_posts()) :
              while ($oldest_post_query->have_posts()) : $oldest_post_query->the_post();
          ?>
          <div class="oldest_post">
              <a href="<?php the_permalink(); ?>" class="oldest_item">
                  <!-- サムネイル画像とタイトルの表示 -->
                  <div class="oldest_post_img">
                      <?php the_post_thumbnail('large'); ?>
                  </div>
                  <div class="news_text">
                      <p><?php echo get_the_date(); ?></p> <!-- 投稿日時を表示 -->
                      <h3 class="news_title"><?php echo custom_title_length(get_the_title(), 43); ?></h3> <!-- 投稿のタイトルを表示 -->
                  </div>
              </a>
          </div>
        <?php
          endwhile;
        endif;
        // クエリのリセット
        wp_reset_postdata();
        ?>
    </div>
     <?php endif; ?>
    <ul class="content_grid">
      <?php
        // 最も古い投稿を1件取得
        $oldest_post_query = new WP_Query(array(
          'post_type' => 'news',
          'posts_per_page' => 1,
          'order' => 'ASC',
          'orderby' => 'date',
        ));

        $oldest_post_id = null;
        if ($oldest_post_query->have_posts()) {
          while ($oldest_post_query->have_posts()) : $oldest_post_query->the_post();
              $oldest_post_id = get_the_ID(); // 最も古い投稿のID
          endwhile;
        }
        wp_reset_postdata();
    
        // メインクエリ: 古い投稿を除外してページネーション
        $news_query = new WP_Query(array(
          'post_type' => 'news',
          'posts_per_page' => 12,
          'order' => 'DESC',
          'orderby' => 'date',
          'paged' => get_query_var('paged', 1),
          'post__not_in' => $oldest_post_id ? array($oldest_post_id) : array(), // 古い投稿を除外
        ));

        // 投稿をループで表示
        if ($news_query->have_posts()) :
          while ($news_query->have_posts()) : $news_query->the_post();
      ?>

          <li class="news_list">
            <a class="news_item"  href="<?php the_permalink(); ?>">
              <!-- 投稿のサムネイル画像を表示 -->
                <div class="news_img">
                  <?php the_post_thumbnail('large'); ?>
                </div>
              <div class="news_text">
                <p><?php echo get_the_date(); ?></p> <!-- 投稿日時を表示 -->
                <h3 class="news_title"><?php echo custom_title_length(get_the_title(), 43); ?></h3> <!-- 投稿のタイトルを表示 -->
              </div>
            </a>
          </li>
      <?php
          endwhile;
             wp_reset_postdata(); // 投稿データをリセット
        endif;
      ?>
    </ul>
    <div class="pagination">
    <?php
      // 総投稿数を取得（最も古い投稿を除外する）
      $total_posts_query = new WP_Query(array(
          'post_type' => 'news',
          'posts_per_page' => -1,
          'post__not_in' => $oldest_post_id ? array($oldest_post_id) : array(),
      ));
      $total_posts = $total_posts_query->found_posts;
      wp_reset_postdata(); // 投稿データをリセット

      // メインクエリ: ページネーション付き
      $news_query = new WP_Query(array(
          'post_type' => 'news',
          'posts_per_page' => 12,
          'paged' => get_query_var('paged', 1),
          'post__not_in' => $oldest_post_id ? array($oldest_post_id) : array(),
      ));

      // ページ数を計算
      $total_pages = ceil($total_posts / 12);

      // ページネーションの表示
      if ($total_pages > 1) {
          the_posts_pagination(array(
              'total'     => $total_pages,
              'current'   => max(1, get_query_var('paged')),
              'mid_size'  => 2,
              'prev_text' => __('« 前へ'),
              'next_text' => __('次へ »'),
          ));
      }
      ?>

    </div>
    <a href="<?php echo $links['top']; ?>" class="btn_back"><p>TOP</p></a> 

  </div>
  <img id="news_a_bg_hil" class="bg_common bg_a_common_hil" src="<?php echo $links['bg_oblique3']; ?>" alt="装飾画像">
  <img class="bg_common bg_a_common_hir bg_dot" src="<?php echo $links['bg_dot']; ?>" alt="装飾画像">
  <img class="bg_common bg_a_common_cel" src="<?php echo $links['bg_oblique2bo']; ?>" alt="装飾画像">
  <img class="bg_common bg_a_common_cer" src="<?php echo $links['bg_oblique3bo']; ?>" alt="装飾画像">
  <img class="bg_common bg_a_common_lor" src="<?php echo $links['bg_oblique1bo']; ?>" alt="装飾画像">
  <img class="bg_common bg_a_common_lol bg_circle" src="<?php echo $links['bg_circle']; ?>" alt="装飾画像">
</section>

<?php get_footer(); ?>