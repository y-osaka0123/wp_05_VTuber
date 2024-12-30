<?php get_header(); ?>
<?php $links = custom_links(); ?>

<section class="section archive_section">
  <div id="guidline_archive_inner" class="inner">
    <div class="archive_guidline_title">
      <?php
        // 最新の投稿を取得 (ここでは3件を取得)
        $guidline_query = new WP_Query(array(
          'post_type' => 'guidline',
          'posts_per_page' => '-1',
          'order' => 'ASC',       // 降順で表示
          'orderby' => 'date'      // 日付順にソート
        ));
        
        if ($guidline_query->have_posts()) : 
          $guidline_query->the_post();  //1件目表示
      ?>
        <h2><?php the_title(); ?></h2>
        <p><?php the_content(); ?></p>
      <?php
        endif
      ?>
    </div>
    <div class="content max_width">
      <ul>
        <?php
          if ($guidline_query->have_posts()) :
              while ($guidline_query->have_posts()) : $guidline_query->the_post(); 
        ?>
        <li class="guidline_list">
            <h3 class="guidline_list_title"><?php the_title(); ?></h3>
            <p><?php the_content(); ?></p>
        </li>
        <?php
            endwhile;
          endif;
          // 投稿データをリセット
          wp_reset_postdata();
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
    <img id="guidline_a_bg_lol" class="bg_common bg_a_common_lol bg_circle" src="<?php echo $links['bg_circle']; ?>" alt="装飾画像">
</section>

<?php get_footer(); ?>