<?php

	/**
	*Template Name: Text Query Example
	 */ 
	
	$philosophy_query_args = array(
		'post_type'      => 'book',
		'posts_per_page' => -1,
		'tax_query'      => array(
			'relation' => 'AND',
			array(
				'taxonomy' => 'language',
				'fields'   => 'slug',
				'terms'    => array('bangla')
			),
			array(
				'taxonomy' => 'language',
				'fields'   => 'slug',
				'terms'    => array('english'),
				'operator' => 'NOT IN'
			),
		)
	);

	$philosophy_post = new WP_Query($philosophy_query_args);

	while ($philosophy_post->have_posts()) {
	    $philosophy_post->the_post();
	    the_title( );
	    echo "<br/>";
	}
	wp_reset_query();

















