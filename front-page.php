<?php get_header(); ?>
<?php $links = custom_links(); ?>


<section id="top" >
  <div class="top_img_wrapper">
    <img class="top_img" src="<?php echo $links['img_top_main']; ?>" alt="">
    <img class="sp_top_img" src="<?php echo $links['img_sp_top_main']; ?>" alt="">
    <div id="sp_top_nav">
      <div class="top_nav_icon_sp">
        <a class="icon sp_top_nav_icon1" href="<?php echo $links['link_x']; ?>" target="_blank"></a>
      </div>
      <div class="top_nav_icon_sp">
        <a class="icon sp_top_nav_icon2" href="<?php echo $links['link_x']; ?>" target="_blank"></a>
      </div>
      <div class="top_nav_icon_sp">
        <a class="icon sp_top_nav_icon3" href="<?php echo $links['link_x']; ?>" target="_blank"></a>
      </div>
    </div>
    <div class="top_btn_active">
      <a href="<?php echo $links['link_x']; ?>" target="_blank">
        <img class="top_btn_active_img" src="<?php echo $links['img_top_btn_active']; ?>" alt="">
      </a>
    </div>
  </div>
</section>

<main class="main">
<!-- ==================================== -->
<!--                                      -->
<!--         Profile Section              -->
<!--                                      -->
<!-- ==================================== -->
  <section id="profile_front_section" class="section">
    <div class="inner">
      <h2 class="section_title">PROFILE</h2>
      <div id="profile_front_content" class="content_flex">
        <article class="profile_text">
          <p class="profile_kana_name">- <?php echo $links['top_profile_en_name']; ?> -</p>
          <h2 class="profile_kanji_name"><?php echo $links['top_profile_kanji_name']; ?></h2>
          <p><?php echo $links['top_profile_text']; ?></p>
          <dl class="profile_columns">
            <div class="profile_dl">
              <dt><?php echo $links['top_profile_dt1']; ?></dt>
              <dd><?php echo $links['top_profile_dd1']; ?></dd>
            </div>
            <div class="profile_dl">
              <dt><?php echo $links['top_profile_dt2']; ?></dt>
              <dd><?php echo $links['top_profile_dd2']; ?></dd>
            </div>
            <div class="profile_dl">
              <dt><?php echo $links['top_profile_dt3']; ?></dt>
              <dd><?php echo $links['top_profile_dd3']; ?></dd>
            </div>
            <div class="profile_dl">
              <dt><?php echo $links['top_profile_dt4']; ?></dt>
              <dd><?php echo $links['top_profile_dd4']; ?></dd>
            </div>
            <div class="profile_dl">
              <dt><?php echo $links['top_profile_dt5']; ?></dt>
              <dd><?php echo $links['top_profile_dd5']; ?></dd>
            </div>
            <div class="profile_dl">
              <dt><?php echo $links['top_profile_dt6']; ?></dt>
              <dd>
                <a href="<?php echo $links['tag_general']; ?>" target="_blank">
                  <?php echo $links['top_profile_dd6']; ?>
                </a>
              </dd>            
            </div>
            <div class="profile_dl">
              <dt><?php echo $links['top_profile_dt7']; ?></dt>
              <dd>
                <a href="<?php echo $links['tag_funart']; ?>" target="_blank">
                  <?php echo $links['top_profile_dd7']; ?>
                </a>
              </dd>
            </div>
            <div class="profile_dl">
              <dt><?php echo $links['top_profile_dt8']; ?></dt>
              <dd><?php echo $links['top_profile_dd8']; ?></dd>
            </div>
          </dl>
        </article>
        <img id="profile_front_img" class="img_top_profile" src="<?php echo $links['img_top_profile']; ?>" alt="">
      </div>
      <a class="btn_more" href="<?php echo $links['profile']; ?>">more</a>
    </div>
    <img class="back_section_bottom" src="<?php echo $links['back_top_profile_bottom']; ?>"alt="">
    <img id="profile_f_bg_hil" class="bg_common" src="<?php echo $links['bg_oblique3']; ?>" alt="装飾画像">
    <img id="profile_f_bg_hir" class="bg_common bg_dot" src="<?php echo $links['bg_dot']; ?>" alt="装飾画像">
    <img id="profile_f_bg_lor" class="bg_common" src="<?php echo $links['bg_oblique1bo']; ?>" alt="装飾画像">
    <img id="profile_f_bg_lol" class="bg_common bg_circle" src="<?php echo $links['bg_circle']; ?>" alt="装飾画像">
  </section>

<!-- ==================================== -->
<!--                                      -->
<!--         News Section                 -->
<!--                                      -->
<!-- ==================================== -->
  <section id="news_f_section" class="section">
    <div class="inner">
      <h2 class="section_title">NEWS</h2>
      <div class="content">
       <ul class="content_flex">
        <?php
            // 最新の投稿3件を取得
            $latest_posts = new WP_Query(array(
              'post_type' => 'news',
              'posts_per_page' => 3,   // 表示する投稿数
              'order' => 'DESC',       // 降順で表示
              'orderby' => 'date'      // 日付順にソート
            ));
            
            // ループを使って投稿を表示
            if ($latest_posts->have_posts()) :
              while ($latest_posts->have_posts()) : $latest_posts->the_post();
          ?>
          <li class="news_list" id="none">
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
        <a class="btn_more" href="<?php echo $links['news']; ?>">more</a>
      </div>
    </div>
    <img id="news_f_bg_hir" class="bg_common" src="<?php echo $links['bg_oblique2flve']; ?>"  alt="装飾画像">
    <img id="news_f_bg_hil" class="bg_common bg_dot" src="<?php echo $links['bg_dot']; ?>" alt="装飾画像">
    <img id="news_f_bg_lor" class="bg_common bg_circle" src="<?php echo $links['bg_circle']; ?>" alt="装飾画像">
    <img id="news_f_bg_lol" class="bg_common" src="<?php echo $links['bg_oblique1']; ?>" alt="装飾画像">
  </section>


<!-- ==================================== -->
<!--                                      -->
<!--           Movie Section              -->
<!--                                      -->
<!-- ==================================== -->
  <section id="movie" class="section">
    <img class="back_section_top" src="<?php echo $links['back_top_movie_top']; ?>"alt="">
    <div id="movie_inner" class="inner">
      <h2 class="section_title">MOVIE</h2>
      <div class="content">
        <ul class="content_flex">
          <?php
          // 最新の投稿を取得 (ここでは3件を取得)
          $movie = new WP_Query(array(
            'post_type' => 'movie',
            'posts_per_page' => 3,   // 表示する投稿数
            'order' => 'DESC',       // 降順で表示
            'orderby' => 'date'      // 日付順にソート
          ));

          if ($movie->have_posts()) :
            while ($movie->have_posts()) : $movie->the_post();
            // カスタムフィールド 'youtube_video_id' から動画IDを取得
            $video_id = get_post_meta(get_the_ID(), 'youtube_video_id', true);
            ?>
            <li class="movie_list">
              <h3 class="movie_theme"><?php the_title(); ?></h3> <!-- 投稿のタイトルを表示 -->
              <!-- 投稿本文を表示。YouTubeの埋め込みも含む -->
              <div class="movie_area">
                    <?php if ($video_id): ?>
                        <!-- Lite YouTube Embed -->
                        <lite-youtube videoid="<?php echo esc_attr($video_id); ?>"></lite-youtube>
                    <?php else: ?>
                        <p>動画が指定されていません。</p>
                    <?php endif; ?>
                </div>
            </li>
          <?php endwhile; wp_reset_postdata(); endif; ?>
        </ul>
      </div>
    </div>
    <img class="back_section_bottom" src="<?php echo $links['back_top_movie_bottom']; ?>"alt="">
    <img id="movie_f_bg_hir" class="bg_common bg_dot" src="<?php echo $links['bg_dot']; ?>" alt="装飾画像">
    <img id="movie_f_bg_hil" class="bg_common" src="<?php echo $links['bg_oblique3flve']; ?>" alt="装飾画像">
    <img id="movie_f_bg_lol" class="bg_common bg_circle" src="<?php echo $links['bg_circle']; ?>" alt="装飾画像">
    <img id="movie_f_bg_lor" class="bg_common" src="<?php echo $links['bg_oblique2']; ?>" alt="装飾画像">

  </section>


<!-- ==================================== -->
<!--                                      -->
<!--           Goods Section              -->
<!--                                      -->
<!-- ==================================== -->
  <section id="goods_f_section" class="section">
    <div class="inner">
      <h2 class="section_title">GOODS</h2>
        <div class="content">
          <ul class="content_flex goods_flex">
          <?php
            // 最新の投稿3件を取得
            $latest_posts = new WP_Query(array(
              'post_type' => 'goods',
              'posts_per_page' => 3,   // 表示する投稿数
              'order' => 'DESC',       // 降順で表示
              'orderby' => 'date'      // 日付順にソート
            ));
            
            // ループを使って投稿を表示
            if ($latest_posts->have_posts()) :
              while ($latest_posts->have_posts()) : $latest_posts->the_post();
              ?>

              <?php
                $add_url = get_post_meta(get_the_ID(), 'URL', true);
                if ($add_url) {
                  $goods_url = $add_url;
                } else {
                  $goods_url = get_permalink();
                }
              ?>
            <li class="goods_list">
              <a class="goods_item" href="<?php echo esc_url($add_url) ?>" target="_blank">
                <div class="goods_img">
                  <?php the_post_thumbnail('large'); ?>
                </div>
                <div class="goods_text">
                  <?php the_title(); ?> <!-- 投稿のタイトルを表示 -->
                </div>

              </a>
            </li>
          <?php
              endwhile;
              wp_reset_postdata(); // 投稿データをリセット
            endif;
          ?>
        </ul>
        <a class="btn_more" href="<?php echo $links['link_booth']; ?>" target=_blank>more</a>
      </div>
    </div>
    <img id="goods_f_bg_lor" class="bg_common bg_circle" src="<?php echo $links['bg_circle']; ?>" alt="装飾画像">
    <img id="goods_f_bg_hil" class="bg_common" src="<?php echo $links['bg_oblique1flho']; ?>" alt="装飾画像">
    <img id="goods_f_bg_hir" class="bg_common bg_dot" src="<?php echo $links['bg_dot']; ?>" alt="装飾画像">
    <img id="goods_f_bg_lol" class="bg_common" src="<?php echo $links['bg_oblique3flve']; ?>" alt="装飾画像">
  </section>


<!-- ==================================== -->
<!--                                      -->
<!--         Gallery Section              -->
<!--                                      -->
<!-- ==================================== -->
  <section id="gallery_front_section" class="section">
    <img class="back_section_top" src="<?php echo $links['back_top_gallery_top']; ?>"alt="">
    <div class="inner">
      <h2 class="section_title">GALLERY</h2>
      <div id="gallery_items">
        <ul class="gallery_columns masonry-container">
        <?php
        // ページ番号を取得
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

        // カスタム投稿のクエリ設定
        $args = array(
            'post_type' => 'gallery', // 必要に応じてカスタム投稿タイプを指定
            'posts_per_page' => 9,
            'paged' => $paged,
        );
        $query = new WP_Query($args);

        if ($query->have_posts()) {
            // 投稿が存在する場合に表示
            while ($query->have_posts()) {
                $query->the_post();
                if (has_post_thumbnail()) {
                    echo '<li class="gallery_item">';
                    echo '<img class="gallery-image" src="' . get_the_post_thumbnail_url(get_the_ID(), 'medium') . '" data-full="' . get_the_post_thumbnail_url(get_the_ID(), 'full') . '">';
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
        <a class="btn_more" href="<?php echo $links['gallery']; ?>">more</a>
        <!-- モーダルウィンドウのHTMLを追加 -->
      <div id="image-modal" class="modal">
        <span class="close">&times;</span>
        <img class="modal-content" id="modal-img">
      </div>
    </div>
    <img class="back_section_bottom" src="<?php echo $links['back_top_gallery_bottom']; ?>" loading="lazy" alt="">

    <img id="gallery_f_bg_hil" class="bg_common bg_dot" src="<?php echo $links['bg_dot']; ?>" alt="装飾画像">
    <img id="gallery_f_bg_hir" class="bg_common" src="<?php echo $links['bg_oblique2bo']; ?>" alt="装飾画像">
    <img id="gallery_f_bg_lor" class="bg_common bg_circle" src="<?php echo $links['bg_circle']; ?>" alt="装飾画像">
    <img id="gallery_f_bg_lol" class="bg_common" src="<?php echo $links['bg_oblique3flho']; ?>" alt="装飾画像">
  </section>



<!-- ==================================== -->
<!--                                      -->
<!--         Contact Section              -->
<!--                                      -->
<!-- ==================================== -->
  <section id="contact_f_section" class="section">
    <div class="inner">
      <a id="recommendation_btn" href="<?php echo $links['recommendation']; ?>">
          <img class="recommendation_banner" src="<?php echo $links['recommendation_banner']; ?>" alt="">
      </a>
      <h2 id="top_contact_title" class="section_title">CONTACT</h2>      <div class="content">
        <div class="content_flex contact_max_width">
          <a id="btn_contact_guidline" class="btn_contact" href="<?php echo $links['guidline']; ?>">ガイドライン</a>
          <a class="btn_contact" href="<?php echo $links['contact']; ?>">お問い合わせ</a>
        </div>
      </div>
    </div>
    <img id="contact_f_bg_hir" class="bg_common bg_dot" src="<?php echo $links['bg_dot']; ?>" alt="装飾画像">
    <img id="contact_f_bg_hil" class="bg_common" src="<?php echo $links['bg_oblique3bo']; ?>" alt="装飾画像">
    <img id="contact_f_bg_lol" class="bg_common bg_circle" src="<?php echo $links['bg_circle']; ?>" alt="装飾画像">
    <img id="contact_f_bg_lor" class="bg_common" src="<?php echo $links['bg_oblique1flve']; ?>" alt="装飾画像">
  </section>
</main>


<?php get_footer(); ?>