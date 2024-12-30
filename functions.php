<?php 
/**************************************************
CSSファイルの読み込み
**************************************************/
function my_enqueue_styles() {
    // Normalize系のリセットCSS（ress.min.css）
    wp_enqueue_style('ress', '//unpkg.com/ress/dist/ress.min.css', array(), null, 'all');
    
    // テーマスタイル
    wp_enqueue_style('style', get_stylesheet_uri(), array(), null, 'all');
    
    // Google Fonts のスタイルシート読み込み
    wp_enqueue_style(
        'google-fonts',
        'https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Noto+Sans+JP:wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap',
        array(),
        null,
        'all'
    );
}
add_action('wp_enqueue_scripts', 'my_enqueue_styles');

/**************************************************
Google Fontsのプリコネクト
**************************************************/
function add_google_fonts_preconnect() {
    echo '<link rel="preconnect" href="https://fonts.googleapis.com">';
    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>';
}
add_action('wp_head', 'add_google_fonts_preconnect');


/**************************************************
リンク・画像の読み込み
**************************************************/
function custom_links() {
  return array(
    // 各種リンク ここカスタマイズ
      'link_x' => esc_url('https://x.com/KenWebCrafting'),
      'link_youtube' => esc_url('https://www.youtube.com/'),
      'link_booth' => esc_url('https://booth.pm/ja'),
      'goods' => esc_url('https://kenwebcrafting.booth.pm/'), 


    // ロゴ 顧客ごとに素材変更
      'logo_name' => esc_url(get_theme_file_uri('img/custom/logo_name.webp')),
    // 文章
      'top_profile_en_name' => 'Karinohito Shino',
      'top_profile_kanji_name' => '仮ノ人 紫野',
      'top_profile_text' => '自己紹介のテキストが入るテキストテキステキスト
      <br>テキストテキストテキステキスト
      <br>テキストテキストテキステキストテキストテキストテキステキスト',

    // footer
      'footer_en_name' => 'Karinohito Shino',
      'link_promoize' => esc_url(''),


    // プロフィール系
      'top_profile_dt1' => '誕生日',
      'top_profile_dd1' => '9月20日',
      'top_profile_dt2' => '身長',
      'top_profile_dd2' => '165cm',
      'top_profile_dt3' => '得意な事',
      'top_profile_dd3' => '書道、ピアノ、水泳',
      'top_profile_dt4' => '苦手な事',
      'top_profile_dd4' => 'ホラー、虫',
      'top_profile_dt5' => '好きなもの',
      'top_profile_dd5' => '歌、ゲーム、話すこと',
      'top_profile_dt6' => '総合タグ',
      'top_profile_dd6' => '#総合タグ',
      'top_profile_dt7' => 'ファンアートタグ',
      'top_profile_dd7' => '#funart',
      'top_profile_dt8' => 'ファンネーム',
      'top_profile_dd8' => 'ファン総称',
      'tag_general' => esc_url('https://x.com/search?q=%23総合タグ'),
      'tag_funart' => esc_url('https://x.com/search?q=%23funart'),

    // アイコン集
      'icon_x_color' => esc_url(get_theme_file_uri('img/icon/icon_x_color.svg')),
      'icon_x_white' => esc_url(get_theme_file_uri('img/icon/icon_x_white.svg')),
      'icon_youtube_color' => esc_url(get_theme_file_uri('img/icon/icon_youtube_color.svg')),
      'icon_youtube_white' => esc_url(get_theme_file_uri('img/icon/icon_youtube_white.svg')),
      'icon_twitch_color' => esc_url(get_theme_file_uri('img/icon/icon_twitch_color.svg')),
      'icon_twitch_white' => esc_url(get_theme_file_uri('img/icon/icon_twitch_white.svg')),
      'icon_instagram_color' => esc_url(get_theme_file_uri('img/icon/icon_instagram_color.svg')),
      'icon_instagram_white' => esc_url(get_theme_file_uri('img/icon/icon_instagram_white.svg')),
      'icon_marshmallow_color' => esc_url(get_theme_file_uri('img/icon/icon_marshmallow_color.svg')),
      'icon_marshmallow_white' => esc_url(get_theme_file_uri('img/icon/icon_marshmallow_white.svg')),
      'icon_facebook_white' => esc_url(get_theme_file_uri('img/icon/icon_facebook_white.png')),
      'icon_facebook_black' => esc_url(get_theme_file_uri('img/icon/icon_facebook_black.png')),
      'icon_facebook_color' => esc_url(get_theme_file_uri('img/icon/icon_facebook_blue.png')),
      'icon_facebook_grey' => esc_url(get_theme_file_uri('img/icon/icon_facebook_grey.png')),

    // サイト内　マッピング先　（不変）
      'top' => esc_url(home_url('')),
      'profile' => esc_url(home_url('/profile')),
      'news' => esc_url(home_url('/news')),
      'gallery' => esc_url(home_url('/gallery')),
      'recommendation' => esc_url(home_url('/recommendation')),
      'movie' => esc_url(home_url('#movie')),
      'guidline' => esc_url(home_url('/guidline')),
      'contact' => esc_url(home_url('/contact')),
      'back' => get_back_url(),

    // TOPページ　画像（顧客に毎に内容のみ）
      'img_top_main' => esc_url(get_theme_file_uri('img/custom/top_main_3.webp')),
      'img_top_btn_active' => esc_url(get_theme_file_uri('img/bg/btn_active.webp')),
      'img_top_profile' => esc_url(get_theme_file_uri('img/custom/top_profile.webp')),
      'img_top_material_star_white' => esc_url(get_theme_file_uri('img/custom/material_star_white.png')),
      'img_top_matrial_spade_colore' => esc_url(get_theme_file_uri('img/custom/matrial_spade_colore.png')),
      'recommendation_banner' => esc_url(get_theme_file_uri('img/custom/recommendation_banner.webp')),
      'img_sp_top_main' => esc_url(get_theme_file_uri('img/custom/sp_top_main.webp')),

    // TOPページ　背景素材
      'back_top_profile_bottom' => esc_url(get_theme_file_uri('img/bg/back_top_profile_bottom.png')),
      'back_top_movie_top' => esc_url(get_theme_file_uri('img/bg/back_top_movie_top2.png')),
      'back_top_movie_bottom' => esc_url(get_theme_file_uri('img/bg/back_top_movie_bottom.png')),
      'back_top_gallery_top' => esc_url(get_theme_file_uri('img/bg/back_top_gallery_top.png')),
      'back_top_gallery_bottom' => esc_url(get_theme_file_uri('img/bg/back_top_gallery_bottom.png')),
      // 'back_top_contact_top' => esc_url(get_theme_file_uri('img/bg/back_top_contact_top.png'))

    //装飾素材
    'bg_oblique1' => esc_url(get_theme_file_uri('img/bg/oblique1.svg')),
    'bg_oblique1flve' => esc_url(get_theme_file_uri('img/bg/oblique1flve.svg')),
    'bg_oblique1flho' => esc_url(get_theme_file_uri('img/bg/oblique1flho.svg')),
    'bg_oblique1bo' => esc_url(get_theme_file_uri('img/bg/oblique1bo.svg')),
    'bg_oblique2' => esc_url(get_theme_file_uri('img/bg/oblique2.svg')),
    'bg_oblique2flve' => esc_url(get_theme_file_uri('img/bg/oblique2flve.svg')),
    'bg_oblique2flho' => esc_url(get_theme_file_uri('img/bg/oblique2flho.svg')),
    'bg_oblique2bo' => esc_url(get_theme_file_uri('img/bg/oblique2bo.svg')),
    'bg_oblique3' => esc_url(get_theme_file_uri('img/bg/oblique3.svg')),
    'bg_oblique3flve' => esc_url(get_theme_file_uri('img/bg/oblique3flve.svg')),
    'bg_oblique3flho' => esc_url(get_theme_file_uri('img/bg/oblique3flho.svg')),
    'bg_oblique3bo' => esc_url(get_theme_file_uri('img/bg/oblique3bo.svg')),
    'bg_circle' => esc_url(get_theme_file_uri('img/bg/circle.webp')),
    'bg_dot' => esc_url(get_theme_file_uri('img/bg/dot.webp')),


  );
}


add_theme_support('post-thumbnails');//これ必須　投稿のサムネイル項目出現させる。




/**************************************************
JSファイルの読み込み
**************************************************/
function st_enqueue_scripts() {
  
  wp_deregister_script('jquery');
  wp_enqueue_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js', array(), '3.5.1', false);
  // 上記の２行が必要必ず　//GPTに上記の直入力は問題ないか聞く

  wp_enqueue_script('main', get_theme_file_uri('js/main.js'), array(), false, true);
}
add_action('wp_enqueue_scripts', 'st_enqueue_scripts');


/**************************************************
カスタムフィールド読み込み
**************************************************/
function redirect_to_add_URL() {
  if (is_single()) {
      global $post;
      $add_URL = get_post_meta($post->ID, 'add_URL', true);
      if ($add_URL) {
          $add_URL = esc_url_raw($add_URL);  // URLを検証
          // 無限リダイレクトを防ぐため、外部URLのみをリダイレクト対象とする
          if (strpos($add_URL, home_url()) === false) {
              wp_redirect($add_URL);
              exit;
          }
      }
  }
}
add_action('template_redirect', 'redirect_to_add_URL');


/**************************************************
メイソンリーレイアウト読み込み　（Gallery）
**************************************************/
function enqueue_masonry_script() {
  wp_enqueue_script('masonry', array('jquery'), null, true); // jQueryに依存させてロード
  wp_enqueue_script('imagesloaded', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_masonry_script');


/**************************************************
AJAX用スクリプトを読み込む
**************************************************/
function enqueue_gallery_ajax_script() {
  // JavaScriptファイルの読み込み
  wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', array('jquery'), null, true);

  // AJAX用のURLをJavaScriptに渡す
  wp_localize_script('main', 'ajax_object', array(
      'ajax_url' => admin_url('admin-ajax.php')
  ));
}
add_action('wp_enqueue_scripts', 'enqueue_gallery_ajax_script');

/**************************************************
ギャラリーアイテムをロードするためのAJAX処理
**************************************************/
// PHP: WP_Queryで動的にカテゴリ名を使用

// ギャラリーアイテムをロードするためのAJAX処理
function load_official_items() {
  if (isset($_POST['gallery']) && isset($_POST['paged'])) {
      $post_type = sanitize_text_field($_POST['gallery']);
      $paged = intval($_POST['gallery']);

      $official_query = new WP_Query(array(
          'post_type' => 'gallery',  // 選択されたpost_typeを使用
          'posts_per_page' => 10,  // 10件ずつ表示
          'paged' => $paged  // ページネーションを受け取る
      ));

      if ($official_query->have_posts()) :
          while ($official_query->have_posts()) : $official_query->the_post(); ?>
              <li class="gallery_item">
                  <img class="gallery-image" src="<?php the_post_thumbnail_url('medium'); ?>" 
                       data-full="<?php the_post_thumbnail_url('full'); ?>" alt="">
              </li>
          <?php endwhile;
      endif;
      wp_reset_postdata();
  }
  wp_die();
}

add_action('wp_ajax_load_official_items', 'load_official_items');
add_action('wp_ajax_nopriv_load_official_items', 'load_official_items');  // 非ログインユーザーにも対応






/**************************************************
プロフィールアイテムのカスタム投稿
**************************************************/
function create_profile_post_type() {
  register_post_type('profile',  // 'profile' がカスタム投稿タイプのスラッグ
      array(
          'labels' => array(
              'name' => __('プロフィール(profile)'),
              'singular_name' => __('profile')
          ),
          'public' => true,
          'has_archive' => true,  // アーカイブページの自動生成を有効化
          'rewrite' => array('slug' => 'profile'),  // 'profile' というURLスラッグ
          'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
          'show_in_rest' => true, //　ブロックエディタ有効化
          'supports'
      )
  );
}
add_action('init', 'create_profile_post_type');

/**************************************************
ニュースアイテムのカスタム投稿
**************************************************/
function create_news_post_type() {
  register_post_type('news',  // 'news' がカスタム投稿タイプのスラッグ
      array(
          'labels' => array(
              'name' => __('お知らせ(News)'),
              'singular_name' => __('news'),
          ),
          'public' => true,
          'has_archive' => true,  // アーカイブページの自動生成を有効化
          'rewrite' => array('slug' => 'news'),  // 'news' というURLスラッグ
          'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
          'show_in_rest' => true,
      )
  );
}
add_action('init', 'create_news_post_type');

/**************************************************
 * 動画のカスタム投稿
**************************************************/
function create_movie_post_type() {
  register_post_type('movie',  // 'movie' がカスタム投稿タイプのスラッグ
      array(
          'labels' => array(
              'name' => __('動画(movie))'),
              'singular_name' => __('movie')
          ),
          'public' => true,
          'has_archive' => true,  // アーカイブページの自動生成を有効化
          'rewrite' => array('slug' => 'movie'),  // 'movie' というURLスラッグ
          'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
          'show_in_rest' => true,
      )
  );
}
add_action('init', 'create_movie_post_type');

/**************************************************
 * グッズのカスタム投稿
**************************************************/
function create_goods_post_type() {
  register_post_type('goods',  // 'goods' がカスタム投稿タイプのスラッグ
      array(
          'labels' => array(
              'name' => __('グッズ(Goods))'),
              'singular_name' => __('goods')
          ),
          'public' => true,
          'has_archive' => true,  // アーカイブページの自動生成を有効化
          'rewrite' => array('slug' => 'goods'),  // 'goods' というURLスラッグ
          'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
          'show_in_rest' => true,
      )
  );
}
add_action('init', 'create_goods_post_type');

/**************************************************
ギャラリーイラストのカスタム投稿
**************************************************/
function create_gallery_post_type() {
  register_post_type('gallery',  // 'gallery' がカスタム投稿タイプのスラッグ
      array(
          'labels' => array(
              'name' => __('ギャラリー(gallery)'),
              'singular_name' => __('gallery')
          ),
          'public' => true,
          'has_archive' => true,  // アーカイブページの自動生成を有効化
          'rewrite' => array('slug' => 'gallery'),  // 'gallery' というURLスラッグ
          'supports' => array('title', 'editor', 'thumbnail'),
          'show_in_rest' => true,
      )
  );
}
add_action('init', 'create_gallery_post_type');

/**************************************************
オススメのカスタム投稿
**************************************************/
function create_recommendation_post_type() {
  register_post_type('recommendation',  // 'recommendation' がカスタム投稿タイプのスラッグ
      array(
          'labels' => array(
              'name' => __('アフィリエイト'),
              'singular_name' => __('recommendation')
          ),
          'public' => true,
          'has_archive' => true,  // アーカイブページの自動生成を有効化
          'rewrite' => array('slug' => 'recommendation', 'with_front' => false),  // 'recommendation' というURLスラッグ
          'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
          'show_in_rest' => true,
      )
  );
}
add_action('init', 'create_recommendation_post_type');

/**************************************************
ガイドラインのカスタム投稿
**************************************************/
function create_guidline_post_type() {
  register_post_type('guidline',  // 'guidline' がカスタム投稿タイプのスラッグ
      array(
          'labels' => array(
              'name' => __('ガイドライン(guidline)'),
              'singular_name' => __('guidline')
          ),
          'public' => true,
          'has_archive' => true,  // アーカイブページの自動生成を有効化
          'rewrite' => array('slug' => 'guidline'),  // 'guidline' というURLスラッグ
          'supports' => array('title', 'editor', 'thumbnail'),
          'show_in_rest' => true,
      )
  );
}
add_action('init', 'create_guidline_post_type');


/**************************************************
カスタム投稿（News）のパーマリンクをnews/idにする処理
**************************************************/
add_filter('post_type_link', 'custom_post_link', 1, 2);
function custom_post_link($link, $post) {
  if($post -> post_type === 'news') {
    // カスタム投稿名が"news"の投稿のパーマリンクを「/news/投稿ID/」の形に書き換え
    return home_url('/news/'.$post->ID);
  } else {
    return $link;
  }
}

//書き換えたパーマリンクに対応したリライトルールを追加
add_filter('rewrite_rules_array', 'custom_post_link_rewrite');
function custom_post_link_rewrite($rules) {
  $rewrite_rules = array(
    'news/([0-9]+)/?$' => 'index.php?post_type=news&p=$matches[1]',
  );
  return $rewrite_rules + $rules;
}

function get_back_url() {
  global $wp_query, $wp;
  // 現在のURLを取得
  $current_url = home_url(add_query_arg(array(), $wp->request));
  // ページネーションが存在するか確認
  if (is_paged()) {
      $paged = max(1, get_query_var('paged')); // 現在のページ番号を取得
      if ($paged > 1) {
          // ページ番号を1減らしたURLを生成
          return get_pagenum_link($paged - 1);
      }
  }
  // 通常の階層処理
  $url_parts = explode('/', trim(parse_url($current_url, PHP_URL_PATH), '/'));
  if (count($url_parts) === 1) {
      return home_url('/');
  }
  if (count($url_parts) > 1) {
      array_pop($url_parts); // 最後のセグメントを削除
  }
  return home_url(implode('/', $url_parts));
}

// profile_link excerpt()３０字制限
function custom_excerpt_length($excerpt) {
  $excerpt = strip_tags($excerpt); // HTMLタグを除去
  if (mb_strlen($excerpt) > 31) { // 30文字以上なら
      $excerpt = mb_substr($excerpt, 0, 30) . '...'; // 30文字で切り取る
  }
  return $excerpt;
}
add_filter('the_excerpt', 'custom_excerpt_length');

// news_title 40文字制限
function custom_title_length($title, $limit = 43) {
  if (mb_strlen($title) > $limit) {
      return mb_substr($title, 0, $limit) . '...';
  }
  return $title;
}

function responsive_embed_wrapper($html) {
  return '<div class="movie_area">' . $html . '</div>';
}
add_filter('embed_oembed_html', 'responsive_embed_wrapper', 10, 3);

function get_decorative_images() {
  // 5つの装飾画像を設定（必要に応じて画像のパスを変更）
  $decorative_images = [
      [
          'src' => esc_url(get_theme_file_uri('img/bg/oblique3bo.svg')),
          'alt' => '装飾画像1',
          'style' => 'top: 200px; left: 50px;'
      ],
      [
          'src' => get_template_directory_uri() . '/img/decorative2.svg',
          'alt' => '装飾画像2',
          'style' => 'top: 200px; right: 50px;'
      ],
      [
          'src' => get_template_directory_uri() . '/img/decorative3.svg',
          'alt' => '装飾画像3',
          'style' => 'bottom: 100px; right: 100px;'
      ],
      [
          'src' => get_template_directory_uri() . '/img/decorative4.svg',
          'alt' => '装飾画像4',
          'style' => 'bottom: 200px; left: 100px;'
      ],
      [
          'src' => get_template_directory_uri() . '/img/decorative5.svg',
          'alt' => '装飾画像5',
          'style' => 'top: 50%; left: 50%; transform: translate(-50%, -50%);'
      ],
  ];

  return $decorative_images;
}


function enqueue_lite_youtube_embed() {
  // Lite YouTube EmbedのCSS
  wp_enqueue_style('lite-youtube-embed', get_template_directory_uri() . '/css/lite-yt-embed.css', array(), null, 'all');
  
  // Lite YouTube EmbedのJavaScript
  wp_enqueue_script('lite-youtube-embed', get_template_directory_uri() . '/js/lite-yt-embed.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_lite_youtube_embed');
