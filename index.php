<?php get_header(); ?>
<?php $links = custom_links(); ?>

<section id="single_post" class="section">
  <div class="inner">
    <h1>index.phpですよ</h1>
    <h1><?php the_title(); ?></h1>  <!-- 投稿のタイトルを表示 -->
    <div class="post-content">
      <?php
        if (have_posts()) :
          while (have_posts()) : the_post();
            the_content();  // 投稿の内容を表示
          endwhile;
        endif;
      ?>
    </div>
  </div>
</section>

<?php get_footer(); ?>