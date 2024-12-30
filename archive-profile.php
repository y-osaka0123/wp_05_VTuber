<?php get_header(); ?>
<?php $links = custom_links(); ?>

<section id="top_profile" class="section archive_section">
    <div id="profile_a" class="inner">
      <h2 class="section_title">PROFILE</h2>
      <div class="content_flex archive_profile_flex">
        <article class="profile_text">
          <p class="profile_kana_name">- <?php echo $links['top_profile_en_name']; ?> -</p>
          <h2 class="profile_kanji_name"><?php echo $links['top_profile_kanji_name']; ?></h2>
          <p class="profile_description"><?php echo $links['top_profile_text']; ?></p>
          <dl class="profile_column">
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
        <img class="img_top_profile" src="<?php echo $links['img_top_profile']; ?>" alt="">
      </div>
      <div>
        <ul class="profile_grid">
          <?php
            $news_query = new WP_Query(array(
              'post_type' => 'profile',
              'posts_per_page' => 12,   // 表示する投稿数
              'order' => 'DESC',       // 降順で表示
              'orderby' => 'date',      // 日付順にソート
              'paged' => get_query_var('paged', 1),  // 現在のページを取得
            ));
            
            // ループを使って投稿を表示
            if ($news_query->have_posts()) :
              while ($news_query->have_posts()) : $news_query->the_post();
          ?>

          <li class="profile_link">
            <a class="profile_link_a" href="<?php echo esc_url(get_post_meta(get_the_ID(), 'URL', true)); ?>" target="_blank">
              <!-- 投稿のサムネイル画像を表示 -->
              <div class="profile_link_img">
                <?php echo wp_get_attachment_image(get_post_thumbnail_id(), 'full'); ?>
              </div>
              <div class="profile_link_text">
                <h3 class="profile_link_title"><?php the_title(); ?></h3> <!-- 投稿のタイトルを表示 -->
                <p class="profile_link_description"><?php the_excerpt(); ?></p>
              </div>
            </a>
          </li>
          <?php
              endwhile;
              // wp_reset_postdata(); // 投稿データをリセット
            endif;
          ?>
        </ul>

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
