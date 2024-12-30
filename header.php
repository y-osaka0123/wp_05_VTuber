<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- nameってどこ? -->
  <title><?php echo bloginfo('name'); ?></title>

  <!-- descriptionってどこ？ -->
  <meta name="description" content="<?php echo esc_attr(bloginfo('description')); ?>">
  <link rel="icon" href="<?php echo esc_url(get_theme_file_uri('img/custom//favicon.ico')) ?>">
  <div class="safe-area-top"></div>
  <?php $links = custom_links(); ?>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <header id="header">
    <nav id="header_inner">
      <ul class="header_menu">
        <li class="header_logo">
          <a href="<?php echo $links['top']; ?>">
            <img src="<?php echo $links['logo_name']; ?>" alt="">
          </a>
        </li>
        <li>
          <a href="<?php echo $links['profile']; ?>">Profile
          </a>
        </li>
        <li>
          <a href="<?php echo $links['news']; ?>">News
          </a>
        </li>
        <li>
          <a href="<?php echo $links['movie']; ?>">Movie
          </a>
        </li>
        <li>
          <a href="<?php echo $links['goods']; ?>" target="_blank">Goods
          </a>
        </li>
        <li>
          <a href="<?php echo $links['gallery']; ?>">Gallery
          </a>
        </li>
        <li>
          <a href="<?php echo $links['recommendation']; ?>">Recommendation
          </a>
        </li>
        <li>
          <a href="<?php echo $links['guidline']; ?>">Guidline
          </a>
        </li>
        <li>
          <a href="<?php echo $links['contact']; ?>">Contact
          </a>
        </li>
      </ul>
      <div class="header_icon">
        <a class="icon header_icon1" href="<?php echo $links['link_x']; ?>" target="_blank"></a>
        <a class="icon header_icon2" href="<?php echo $links['link_x']; ?>" target="_blank"></a>
        <a class="icon header_icon3" href="<?php echo $links['link_x']; ?>" target="_blank"></a>
        <a class="icon header_icon4" href="<?php echo $links['link_x']; ?>" target="_blank"></a>
        <a class="icon header_icon5" href="<?php echo $links['link_x']; ?>" target="_blank"></a>
        <a class="icon header_icon6" href="<?php echo $links['link_x']; ?>" target="_blank"></a>
      </div>
    </nav>

    <div class="hamburger">
      <span></span>
      <span></span>
      <span></span>
    </div>

      <!-- モバイルメニュー -->
    <div class="mobile_menu">
      <ul class="mobile_menu_list">
        <li class="header_logo"><a href="<?php echo $links['top']; ?>"><img src="<?php echo $links['logo_name']; ?>" alt=""></a></li>
        <li><a href="<?php echo $links['profile']; ?>">Profile</a></li>
        <li><a href="<?php echo $links['news']; ?>">News</a></li>
        <li><a href="<?php echo $links['movie']; ?>">Movie</a></li>
        <li><a href="<?php echo $links['goods']; ?>" target="_blank">Goods</a></li>
        <li><a href="<?php echo $links['gallery']; ?>">Gallery</a></li>
        <li><a href="<?php echo $links['recommendation']; ?>">Recommendation</a></li>
        <li><a href="<?php echo $links['guidline']; ?>">Guidline</a></li>
        <li><a href="<?php echo $links['contact']; ?>">Contact</a></li>
      </ul>
    </div>
  </header>