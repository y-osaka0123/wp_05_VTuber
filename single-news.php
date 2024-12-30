<?php get_header(); ?>
<?php $links = custom_links(); ?>

<section id="single_news" class="section single">
  <div class="single_news_inner">
    <div class="single_news_top">
      <p class="single_news_date"><?php echo get_the_date(); ?></p> <!-- 投稿日時を表示 -->
      <h2 class="single_news_title"><?php the_title(); ?></h2> <!-- 投稿のタイトルを表示 -->
    </div>
    <!-- 投稿のサムネイル画像を表示 -->
    <div class="single_news_thumbnail">
        <?php the_post_thumbnail('large'); ?>
    </div>
    <div class="single_news_content">
      <p><?php the_content(); ?></p>
    </div>
    <a href="<?php echo $links['back']; ?>" class="btn_back"><p>BACK</p></a> 

  </div>
  <img class="bg_common bg_a_common_hil" src="<?php echo $links['bg_oblique3']; ?>" alt="装飾画像">
  <img class="bg_common bg_a_common_hir bg_dot" src="<?php echo $links['bg_dot']; ?>" alt="装飾画像">
  <img class="bg_common bg_a_common_cel" src="<?php echo $links['bg_oblique2bo']; ?>" alt="装飾画像">
  <img class="bg_common bg_a_common_cer" src="<?php echo $links['bg_oblique3bo']; ?>" alt="装飾画像">
  <img class="bg_common bg_a_common_lor" src="<?php echo $links['bg_oblique1bo']; ?>" alt="装飾画像">
  <img class="bg_common bg_a_common_lol bg_circle" src="<?php echo $links['bg_circle']; ?>" alt="装飾画像">
</section>
<?php get_footer(); ?>