<?php

 // posts page

	$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ):1; 
	$posts_per_page = 1; // show post per page 
	$post_ids = array( 1, 39, 41, ); // post ids 
	$_p = new WP_Query ( array( 
		'posts_per_page' => $posts_per_page, 
		'post__in' => $post_ids, 
		'orderby' => 'post__in', // asc/ desc 
		'paged' => $paged 

		/* category post show */ 
		// 'category_name' => 'print', 
		// 'posts_per_page' => $posts_per_page, 
		// 'paged' => $paged 
	) ); 

	while ( $_p->have_posts() ) { 
		$_p->the_post(); 
	?> 
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<?php 
	} 
		wp_reset_query(); 

	?>


	<!-- Pagination -->

	<?php 
		echo paginate_links( array( 
			'total' => $_p->max_num_pages, 
			'current' => $paged, 
			// 'prev_next'=> false, 
			// prev/next text disable 
			'prev_text' => __('Old Posts', 'alpha'), 
			'next_text' => __('New Posts', 'alpha'), 
		) ); 
	?>