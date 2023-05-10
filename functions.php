<?php 

//include get_template_directory().'/pageBuilder/pageBuilder_moduleConstructor.php';
include get_template_directory().'/pigeonPageBuilder/pigeonPageBuilder.php';

//Include Page Builder
include get_template_directory().'/pigeonPageBuilder_update.php';

//Inlcude Post Type Builder	
require get_template_directory() . '/pigeonPostTypeBuilder.php';

// Include Taxonomy Builder
require get_template_directory() . '/pigeonTaxonomyBuilder.php';

// Disable Gutenberg and enable default editor
add_filter('use_block_editor_for_post', '__return_false', 10);

// Customize WordPress visual editor with styles from site
add_editor_style();

// Add featured image support
add_theme_support( 'post-thumbnails' );

// Enqueue CSS and JS files into theme
function add_theme_scripts() {
  // Get latest update of Stylesheet
  $style_ver = filemtime( get_stylesheet_directory() . '/style.css' );
  // Get latest update of Scripts
  $script_ver = filemtime( get_stylesheet_directory() . '/js/scripts.js' );
  // Get latest update of Heritage Stylesheet
  $heritage_style_ver = filemtime( get_stylesheet_directory() . '/css/heritage-styles.css' );
  // Get latest update of Heritage Scripts
  $heritage_script_ver = filemtime( get_stylesheet_directory() . '/js/heritage-scripts.js' );
  // Enqueue style.css with version updating
  wp_enqueue_style( 'main_style', get_stylesheet_directory_uri() . '/style.css', '', $style_ver );
  // Enqueue script.js with version updating and dependency on jQuery
  // wp_enqueue_script( 'script', get_stylesheet_directory_uri() . '/js/scripts.js', array ( 'jquery' ), $script_ver, true);
  // // Enqueue sly carousel.js with a dependency on jQuery
  // wp_enqueue_script( 'sly-js', get_stylesheet_directory_uri() . '/js/sly.min.js', array ( 'jquery' ));
  // Enqueue owl carousel.css
  // wp_enqueue_style( 'owl-css', get_stylesheet_directory_uri() . '/css/owl.carousel.min.css', '');
  // // Enqueue owl carousel.css
  // wp_enqueue_style( 'owl-theme-css', get_stylesheet_directory_uri() . '/css/owl.theme.default.min.css', '');
  // // Enqueue owl carousel.js with a dependency on jQuery
  // wp_enqueue_script( 'owl-js', get_stylesheet_directory_uri() . '/js/owl.carousel.js', array ( 'jquery' ));
  // Enqueue heritage page scripts only on that page
  if (is_page( 'heritage' )) {
   wp_enqueue_style( 'heritage-styles', get_stylesheet_directory_uri() . '/css/heritage-styles.css', '', $heritage_style_ver );
   wp_enqueue_script( 'heritage-scripts', get_stylesheet_directory_uri() . '/js/heritage-scripts.js', array ( 'jquery' ), $heritage_script_ver , true);
  }
}
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );

// Create menus
function register_my_menus() {
 register_nav_menus(
  array(
   'main-menu' => __( 'Main Menu' ),
   'footer-menu' => __( 'Footer Menu' )
  )
 );
}
add_action( 'init', 'register_my_menus' );

//Read More Function
function set_readMore($args) {
  if (count($args) < 1) {
      //do nothing

  } else {
    $content = $args['content'];
    $word_count_desktop = $args['readMore_desktop'];
    $word_count_tablet = $args['readMore_tablet'];
    $word_count_mobile = $args['readMore_mobile'];
    $replace_target_array = ['<br>', '<br />', '<br/>'];
    $replace_with_array = ['**BREAK**', '**BREAK**', '**BREAK**'];
    $content = str_replace($replace_target_array, $replace_with_array, $content);
    $content_word_count = str_word_count($content);

    if ($word_count_mobile < $content_word_count) {
      $content_mobile_array = explode(' ', $content, $word_count_mobile + 1);
      $readmore_class = 'readMore_mobile';
  
      if ($word_count_tablet < $content_word_count) {
        $content_tablet_array = explode(' ', array_pop($content_mobile_array), $word_count_tablet - $word_count_mobile + 1);
        $readmore_class = $readmore_class . ' readMore_tablet';

        if ($word_count_desktop < $content_word_count) {
          $content_desktop_array = explode(' ', array_pop($content_tablet_array), $word_count_desktop - $word_count_tablet + 1);
          $content_readMore_array = explode(' ', array_pop($content_desktop_array));
          $readmore_class = $readmore_class . ' readMore_desktop';

          $content_desktop = implode(' ', $content_desktop_array);
          $content_desktop = str_replace($replace_with_array, $replace_target_array, $content_desktop);
          $content_readmore = implode(' ', $content_readMore_array);
          $content_readmore = str_replace($replace_with_array, $replace_target_array, $content_readmore);

        } else {
          $content_readMore_array = explode(' ', array_pop($content_tablet_array));
          $content_readmore = implode(' ', $content_readMore_array);
          $content_readmore = str_replace($replace_with_array, $replace_target_array, $content_readmore);

        }

        $content_tablet = implode(' ', $content_tablet_array);
        $content_tablet = str_replace($replace_with_array, $replace_target_array, $content_tablet);

      } else {
        $content_readmore = array_pop($content_mobile_array);
        $content_readmore = str_replace($replace_with_array, $replace_target_array, $content_readmore);
      }
  
      $content_mobile = implode(' ', $content_mobile_array);
      $content_mobile = str_replace($replace_with_array, $replace_target_array, $content_mobile);

    } else {
      $content_mobile = str_replace($replace_with_array, $replace_target_array, $content);

    }
  
    echo "<div class='readMore_parent'>
        <div class='readMore_container " . $readmore_class . "'>
            <p class='readMore_mobile_copy'>" . $content_mobile . "</p>
            <p class='readMore_tablet_copy'>" . " " . $content_tablet . "</p>
            <p class='readMore_desktop_copy'>" . " " . $content_desktop . "</p>
            <p class='readMore_readmore'>" . " " . $content_readmore . "</p>
            <p class='readMore_button' onclick='do_readMore(this)'>Read more</p>
        </div>
    </div>";
  }
}

	//include svgs
	function cc_mime_types($mimes) {
		$mimes['svg'] = 'image/svg+xml';
		return $mimes;
	}
	add_filter('upload_mimes', 'cc_mime_types');