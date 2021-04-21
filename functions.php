<?php 


 function philosophy_after_setup_theme(){
 	load_theme_textdomain('philosophy');
 	add_theme_support( 'post-thumbnails' );
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


 add_action( 'after_setup_theme', 'philosophy_after_setup_theme');