<?php 
	$_p = get_posts( 
	array( 'posts_per_page' => 3, // show post per page 
		'post__in' => array( 1, 39, 41, ), // post ids 
		'orderby' => 'post__in', // asc/ desc 
	) ); 

	foreach ( $_p as $post ) { 
		setup_postdata( $post ); ?> 

		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2> 

	<?php } wp_reset_postdata(); ?>