
<?php

require_once(get_theme_file_path('inc/tgm.php'));
require_once(get_theme_file_path('inc/attachments.php'));
require_once(get_theme_file_path('widgets/social-icons-widget.php'));

if (site_url() == "http://demo.lwhh.com") {
    define("VERSION", time());
}else{
    define("VERSION",wp_get_theme()->get("Version"));
}

/**
 * after setup theme.
 */

 function philosophy_after_setup_theme(){
 	load_theme_textdomain('philosophy');
 	add_theme_support( 'post-thumbnails' );
    add_theme_support( 'custom-logo' );
 	add_theme_support('title-tag');
 	add_theme_support( 
 		'html5', 
 		array( 
 			'comment-list', 
 			'comment-form', 
 			'search-form', 
 			'gallery', 
 			'caption', 
 			'style', 
 			'script', 
 		) 
 	);

 	add_theme_support(
			'post-formats',
			array(
				'link',
				'gallery',
				'image',
				'quote',				
				'video',
				'audio',			
			)
		);
 	add_editor_style("/assets/css/editor-style.css");

 	register_nav_menu("topmenu", __("Top Menu", "philosophy"));

    register_nav_menus(array(
        "footer_left"   => __("Footer Left Menu","philosophy"),
        "footer_middle" => __("Footer Middle Menu","philosophy"),
        "footer_right"  => __("Footer Right Menu","philosophy")
    ));

 	add_image_size( "philosophy-home-square", 400, 400, true);
 }

 add_action( 'after_setup_theme', 'philosophy_after_setup_theme');

/**
 * Enqueue scripts and styles.
 */

 function philosophy_assets() {
 	wp_enqueue_style( 'fontawesome-css', get_theme_file_uri('/assets/css/font-awesome/css/font-awesome.min.css'), null, '1.0' );
 	wp_enqueue_style( 'fonts-css', get_theme_file_uri('/assets/css/fonts.css'), null, '1.0' );
 	wp_enqueue_style( 'base-css', get_theme_file_uri('/assets/css/base.css'), null, '1.0' );
 	wp_enqueue_style( 'vendor-css', get_theme_file_uri('/assets/css/vendor.css'), null, '1.0' );
 	wp_enqueue_style( 'main-css', get_theme_file_uri('/assets/css/main.css'), null, '1.0' );
 	wp_enqueue_style( 'philosophy-style-css', get_stylesheet_uri(),null, VERSION);

 	wp_enqueue_script( 'modernizr-js', get_theme_file_uri('/assets/js/modernizr.js'), '1.0');
 	wp_enqueue_script( 'pace-min-js', get_theme_file_uri('/assets/js/pace.min.js'), '1.0');
 	wp_enqueue_script( 'plugins-js', get_theme_file_uri('/assets/js/plugins.js'), array('jquery'), '1.0',true);
 	wp_enqueue_script( 'main-js', get_theme_file_uri('/assets/js/main.js'), array('jquery'), '1.0',true);
 }

add_action('wp_enqueue_scripts', 'philosophy_assets');


function philosophy_pagination(){
	global $wp_query;
	$links = paginate_links( array(
		'current'	=> max(1,get_query_var('paged')),
		'total' 	=> $wp_query->max_num_pages,
		'type'		=> 'list',
		'mid-size' 	=> apply_filters('pagination_philosophy_mid_size', 3)
	) );
	$links = str_replace("page-numbers","pgn__num",$links);
	$links = str_replace("<ul class='pgn__num'>","<ul>",$links);
	$links = str_replace("next pgn__num","pgn__next",$links);
	$links = str_replace("prev pgn__num","pgn__prev",$links);
	echo $links;
}
 
 remove_action("term_description","wpautop");


function philosophy_widgets(){
	register_sidebar( array(
        'name'          => __( 'About Us Page', 'philosophy' ),
        'id'            => 'about-us',
        'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'philosophy' ),
        'before_widget' => '<div id="%1$s" class="col-block %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="quarter-top-margin">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Contact Page Map Section', 'philosophy' ),
        'id'            => 'cantact-maps',
        'description'   => __( 'Widgets in this area will be shown on all contact page.', 'philosophy' ),
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '',
        'after_title'   => '',
    ) );

    register_sidebar( array(
        'name'          => __( 'Contact Page info', 'philosophy' ),
        'id'            => 'cantact-info',
        'description'   => __( 'Widgets in this area will be shown on all contact page.', 'philosophy' ),
        'before_widget' => '<div id="%1$s" class="col-block %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="quarter-top-margin">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Before Footer Section', 'philosophy' ),
        'id'            => 'before_footer_section',
        'description'   => __( 'footer section right site', 'philosophy' ),
        'before_widget' => '<div id="%1$s" "%2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 ">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer Section', 'philosophy' ),
        'id'            => 'footer_right',
        'description'   => __( 'footer section right site', 'philosophy' ),
        'before_widget' => '<div id="%1$s" "%2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer Bottom Section', 'philosophy' ),
        'id'            => 'footer-bottom',
        'description'   => __( 'footer bottom section', 'philosophy' ),
        'before_widget' => '<div id="%1$s" "%2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '',
        'after_title'   => '',
    ) );

    register_sidebar( array(
        'name'          => __( 'Header Section', 'philosophy' ),
        'id'            => 'header-social-link',
        'description'   => __( 'Widgets in this area will be shown on all contact page.', 'philosophy' ),
        'before_widget' => '<div id="%1$s" class=" %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ) );
}
add_action("widgets_init", "philosophy_widgets");

function philosophy_search_form($form){
    $homedir      = home_url("/");
    $label        = __("Search for:","philosophy");
    $button_label = __("Search","philosophy");
    $post_pt      =<<<PT
        <input type="hidden" name="post_type" value="post"> 
PT;

    if (is_post_type_archive('book')) {
        $post_type   = <<<PT
        <input type="hidden" name="post_type" value="book"> 
PT;
    }

    $newform =<<<FORM
    <form role="search" method="get" class="header__search-form" action="{$homedir}">
        <label>
            <span class="hide-content">{$label}</span>
            <input type="search" class="search-field" placeholder="Type Keywords" value="" name="s" title="{$label}" autocomplete="off">
        </label>
        {$post_type}
        <input type="submit" class="search-submit" value="{$button_label}">
    </form>;
FORM;
    return $newform;
}
add_filter( 'get_search_form', 'philosophy_search_form' );

function before_category_title1(){
    echo "<p>Before title1</p>";
}
add_action( 'philosophy_before_category_titel', 'before_category_title1' );

function before_category_title2(){
    echo "<p>Before title2</p>";
}
add_action( 'philosophy_before_category_titel', 'before_category_title3',99 );

function before_category_title3(){
    echo "<p>Before title3</p>";
}
add_action( 'philosophy_before_category_titel', 'before_category_title2' );

function after_category_title(){
    echo "<p>After title</p>";
}
add_action( 'philosophy_after_category_titel', 'after_category_title' );

remove_action('philosophy_after_category_titel', 'after_category_title');
remove_action('philosophy_before_category_titel', 'before_category_title2' );
remove_action( 'philosophy_before_category_titel', 'before_category_title3',99);
remove_action('philosophy_before_category_titel', 'before_category_title1' );

function after_category_discription(){
    echo "<p>After category Description</p>";
}
add_action('philosophy_after_category_description','after_category_discription');

function beginnig_category_page($category_title){
    if ("new"==$category_title) {
        $visit_count = get_option('category_new');
        $visit_count = $visit_count?$visit_count:0;
        $visit_count++;
        update_option( 'category_new',$visit_count);
    }
}
add_action('philosophy_category_page','beginnig_category_page');


function philosophy_home_banner_class($class_name){
    if (is_home()) {
        return $class_name;
    }else{
        return "";
    }
}
add_filter("philosophy_home_banner_class", "philosophy_home_banner_class");    


function capital_text($text){
    return strtoupper($text);
}
add_filter('philosophy_text','capital_text');

function pagination_mid_size($size){
    return 2;
}
add_filter('pagination_philosophy_mid_size','pagination_mid_size');




add_action ( 'category_edit_form_fields', function( $tag ){
    $cat_title = get_term_meta( $tag->term_id, '_pagetitle', true ); ?>
    <tr class='form-field'>
        <th scope='row'><label for='cat_page_title'><?php _e('Category Page Title'); ?></label></th>
        <td>
            <input type='text' name='cat_title' id='cat_title' value='<?php echo $cat_title ?>'>
            <p class='description'><?php _e('Title for the Category '); ?></p>
        </td>
    </tr> <?php
});

function philosophy_cpt_slug_fix($post_link,$id){
    $p = get_post($id);
    if (is_object($p) && 'chapter' == get_post_type($id)) {
        $parent_post_id = get_field('parent_book');
        $parent_post    = get_post($parent_post_id);
        if ($parent_post) {
            $post_link = str_replace("%book%",$parent_post->post_name,$post_link);
        }
        
    }
    return $post_link; 
}
add_filter('post_type_link', 'philosophy_cpt_slug_fix',1,2 );


function philosophy_footer_language_heading($title)
{
    if (is_post_type_archive('book')) {
        $title = __('Language','philosophy');
    }
    return $title;
}
add_filter( 'philosophy_footer_tag_heading', 'philosophy_footer_language_heading' );


function philosophy_footer_language_items($tags)
{
    if (is_post_type_archive('book')) {
        $tags = get_terms(array(
            'taxonomy'   => 'language',
            'hide_empty' => false
        ));
    }
    return $tags;
}
add_filter( 'philosophy_footer_tag_items', 'philosophy_footer_language_items' );

































