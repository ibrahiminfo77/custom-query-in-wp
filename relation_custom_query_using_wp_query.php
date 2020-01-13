<?php 

	$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ):1; 
	$posts_per_page = 1; // show post per page 
	$_p = new WP_Query ( array( 
	'posts_per_page' => $posts_per_page, 
	'paged' => $paged, 
	'tax_query' => array( 
		'relation' => 'OR', 
		array( 
			'taxonomy' => 'category', 
			'field' => 'slug', 
			'terms' => array('print') 
		), 
		array( 
			'taxonomy' => 'post_tag', 
			'field' => 'slug', 
			'terms' => array('web') 
		) ), 

		// 'post_status' => 'publish' 

	) ); 

	while ( $_p->have_posts() ) { 
		$_p->the_post(); 
		?> 

		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2> 
		<?php 
		
	} 
	wp_reset_query(); 
	?>