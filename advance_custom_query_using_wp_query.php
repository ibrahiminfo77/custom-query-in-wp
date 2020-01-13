<?php 


	$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ):1; 
	$posts_per_page = 1; // show post per page 
	$_p = new WP_Query ( array( 
		'posts_per_page' => $posts_per_page, 
		'paged' => $paged, 
		// Category or tag posts show 
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
			) 
		), 

		/* Meta value posts show */ 

		// 'posts_per_page' => $posts_per_page, 
		// 'paged' => $paged, 
		// 'meta_key' => 'featured', 
		// 'meta_value' => '1' 

		/* Multiple Meta value posts show */ 

		// 'posts_per_page' => $posts_per_page, 
		// 'paged' => $paged, 
		// 'meta_query' => array( 
			// 'relation' => 'AND', 
			// array( 
				// 'key' => 'featured', 
				// 'value' => '1', 
				// 'compare' => '=' 
			// ), 
			// array( 
				// 'key' => 'homepage', 
				// 'value' => '1', 
				// 'compare' => '=' 
				// ) 
			// ) 

		/* tag post show */ 

		// 'tag' => 'web', 
		// 'posts_per_page' => $posts_per_page, 
		// 'paged' => $paged 

		/* category post show */ 

		// 'category_name' => 'print', 
		// 'posts_per_page' => $posts_per_page, 
		// 'paged' => $paged 

		/* Month & Year post show */ 

		// 'monthnum' => 5, 
		// 'year' => 2019, 
		// 'posts_per_page' => $posts_per_page, 
		// 'paged' => $paged 

		/* post status posts show */ 

		// 'posts_per_page' => $posts_per_page, 
		// 'paged' => $paged, 
		// 'post_status' => 'draft' // publish/ future/ private 

		/* post format posts show */ 

		// 'posts_per_page' => $posts_per_page, 
		// 'paged' => $paged, 
		// 'tax_query' => array( 
			// 'relation' => 'OR', 
				// array( 
					// 'taxonomy' => 'post_format', 
					// 'field' => 'slug', 
					// 'terms' => array( 
						// 'post-format-audio', 
						// 'post-format-video' 
					// ), 
				// ), 
			// ) 
		) ); 

		while ( $_p->have_posts() ) { 
			$_p->the_post(); ?> 

			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2> 
			<?php 
		} 
		wp_reset_query(); 

	?>


	<!-- pagination -->

	<?php 
		echo paginate_links( array( 
			'total' => $_p->max_num_pages, 
			'current' => $paged, 
			// 'prev_next'=> false, // prev/next text disable 
			'prev_text' => __('Old Posts', 'alpha'), 
			'next_text' => __('New Posts', 'alpha'), 
		) ); 
	?>