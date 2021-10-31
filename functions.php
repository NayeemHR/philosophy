<?php 

require_once(get_theme_file_path( "/inc/tgm.php" ));
require_once(get_theme_file_path( "/inc/attachments.php" ));
if ( ! isset( $content_width ) ) $content_width = 960;
function philosophy_theme_setup(){
    load_theme_textdomain( "philosophy", get_theme_file_path( '/languages' ) );
    add_theme_support( "post-thumbnails" );
    add_theme_support( "title-tag" );
    add_theme_support( "custom-logo" );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'html5', array( 'search-form', 'comment-list' ) );
    add_theme_support( "post-formats", array( "audio", "video", "image", "gallery", "quote", "link" ) );
    add_editor_style( '/assets/css/editor-style.css' );
    register_nav_menu( "topmenu", __("Top Menu", "philosophy") );
    register_nav_menus( array(
        "footer-left" => __("Footer Left Menu", "philosophy"),
        "footer-middle" => __("Footer Middle Menu", "philosophy"),
        "footer-right" => __("Footer Right Menu", "philosophy"),
    ) );
    add_image_size( "philosophy-square", 400, 400, true );
}
add_action( 'after_setup_theme', 'philosophy_theme_setup' );

function philosophy_assets(){
    wp_enqueue_style( 'fontawesome-css', get_theme_file_uri( "/assets/css/font-awesome/css/font-awesome.min.css" ), null , "4.2.0");
    wp_enqueue_style( 'fonts-css', get_theme_file_uri( "/assets/css/fonts.css" ), null , "1.0.0");
    
    wp_enqueue_style( 'main-css', get_theme_file_uri( "/assets/css/main.css" ), null , "1.0.0");
    wp_enqueue_style( 'philosophy-css', get_stylesheet_uri() );

    wp_enqueue_script( 'modernizr-js', get_theme_file_uri( "/assets/js/modernizr.js" ), null, '1.0.0' );
    wp_enqueue_script( 'pace-js', get_theme_file_uri( "/assets/js/pace.min.js" ), null, '1.0.0' );
    wp_enqueue_script( 'plugins-js', get_theme_file_uri( "/assets/js/plugins.js" ), array('jquery'), '1.0.0',true );
    if ( is_singular() ) wp_enqueue_script( "comment-reply" );
    wp_enqueue_script( 'main-js', get_theme_file_uri( "/assets/js/main.js" ), array('jquery'), '1.0.0',true );
    
}
add_action( 'wp_enqueue_scripts' ,'philosophy_assets' );

function philosophy_pagination(){
    global $wp_query;
    $links = paginate_links( 
        array(
            'current' => max(1,get_query_var( 'paged' )),
            'total' => $wp_query->max_num_pages,
            'type' => 'list',
            'mid_size'=> 3,
        )
     );
    $links = str_replace("page-numbers", "pgn__num", $links);
    $links = str_replace("<ul class='pgn__num'>", "<ul>", $links);
    $links = str_replace("next pgn__num", "pgn__next", $links);
    $links = str_replace("prev pgn__num", "pgn__prev", $links);
    echo wp_kses_post($links);
}

/**
 * About us page
 */
function philosophy_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'About Us Page', 'philosophy' ),
        'id'            => 'about_widget',
        'description'   => __( 'Widgets in this area will be shown on about page.', 'philosophy' ),
        'before_widget' => '<div id="%1s" class="col-block %2s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="quarter-top-margin">',
        'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
        'name'          => __( 'Contact Page Map', 'philosophy' ),
        'id'            => 'contact_map',
        'description'   => __( 'Widgets in this area will be shown on contact page.', 'philosophy' ),
        'before_widget' => '<div id="%1s" class="%2s">',
        'after_widget'  => '</div>',
        'before_title'  => '',
        'after_title'   => '',
    ) );
    register_sidebar( array(
        'name'          => __( 'Contact Page Information', 'philosophy' ),
        'id'            => 'contact_info',
        'description'   => __( 'Widgets in this area will be shown on contact page.', 'philosophy' ),
        'before_widget' => '<div id="%1s" class="col-block %2s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="quarter-top-margin">',
        'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
        'name'          => __( 'Before Footer Section', 'philosophy' ),
        'id'            => 'before_footer_right',
        'description'   => __( 'This is a before section', 'philosophy' ),
        'before_widget' => '<div id="%1s" class="%2s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
        'name'          => __( 'Footer Section', 'philosophy' ),
        'id'            => 'footer-right',
        'description'   => __( 'footer section right side', 'philosophy' ),
        'before_widget' => '<div id="%1s" class="%2s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ) );
    register_sidebar( array(
        'name'          => __( 'Footer Bottom Section', 'philosophy' ),
        'id'            => 'footer-bottom',
        'description'   => __( 'footer section bottom side', 'philosophy' ),
        'before_widget' => '<div id="%1s" class="s-footer__copyright %2s">',
        'after_widget'  => '</div>',
        'before_title'  => '',
        'after_title'   => '',
    ) );
}
add_action( 'widgets_init', 'philosophy_widgets_init' );
function philosophy_search_form(){
    $homedir = home_url( "/" );
    $label = __("Search for: ", "philosophy");
    $btn_label = __("Submit", "philosophy");
    $newform = '
    <form role="search" method="get" class="header__search-form" action="'.$homedir.'">
            <label>
              <span class="hide-content">'.$label.'</span>
              <input type="search" class="search-field" placeholder="Type Keywords" value="" name="s"
                title="'.$label.'" autocomplete="off">
            </label>
            <input type="submit" class="search-submit" value="{'.$btn_label.'}">
          </form>
          ';
          return $newform;
}
add_filter( 'get_search_form', 'philosophy_search_form' );



remove_action( "term_description", "wpautop" );
// remove_action( "the_excerpt", "wpautop" );
?>