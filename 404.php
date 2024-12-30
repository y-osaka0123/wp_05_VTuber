<?php get_header(); ?>
<?php $links = custom_links(); ?>

<section id="top_gallery" class="section">
  <div class="inner">
    <img class="back_section_top" src="<?php echo $links['back_top_gallery_top']; ?>"alt="">
    <h2 class="section_title">404だよ、このページ見つからないよ</h2>
    <a class="btn_top_view_more" href="<?php echo $links['gallery']; ?>">back</a>
    <img class="back_section_bottom" src="<?php echo $links['back_top_gallery_bottom']; ?>"alt="">
  </div>
</section>



<?php get_footer(); ?>