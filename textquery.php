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
				'relation' => 'AND',
				array(
					'taxonomy' => 'language',
					'field'   => 'slug',
					'terms'    => array('English'),
				),
				array(
					'taxonomy' => 'language',
					'field'   => 'slug',
					'terms'    => array('Bangla'),
					'operator' => 'NOT IN'
				),

			),
			array(
					'taxonomy' => 'genre',
					'field'   => 'slug',
					'terms'    => array('horror')
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

















