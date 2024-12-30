<?php get_header(); ?>
<?php $links = custom_links(); ?>

<section id="contact_page_section" class="section archive_section">
  <div id="contact_a" class="inner">
    <h2 class="section_title">Contact</h2>
    <div class="contact_form_container">
      <?php echo do_shortcode('[contact-form-7 id="c6144e2" title="コンタクトフォーム 1"]'); ?>
    </div>
    <a href="<?php echo $links['top']; ?>" class="btn_back"><p>TOP</p></a> 

  </div>
  <img class="bg_common bg_a_common_hil" src="<?php echo $links['bg_oblique3']; ?>" alt="装飾画像">
  <img class="bg_common bg_a_common_hir bg_dot" src="<?php echo $links['bg_dot']; ?>" alt="装飾画像">
  <img class="bg_common bg_a_common_cel" src="<?php echo $links['bg_oblique2bo']; ?>" alt="装飾画像">
  <img id="contact_p_bg_cer" class="bg_common bg_a_common_cer" src="<?php echo $links['bg_oblique3bo']; ?>" alt="装飾画像">
  <img class="bg_common bg_a_common_lor" src="<?php echo $links['bg_oblique1bo']; ?>" alt="装飾画像">
  <img id="contact_p=_bg_lor" class="bg_common bg_a_common_lol bg_circle" src="<?php echo $links['bg_circle']; ?>" alt="装飾画像">
</section>

<?php get_footer(); ?>