<?php get_header(); ?>
	
<!-- start site's main content area -->
<section class="content-wrap">
	<div class="container">
		<div class="row">
			<!-- start main post area -->
			<?php $sidebar = get_theme_mod('sidebar_position'); ?>
			<div class="col-md-8 main-content<?php if ($sidebar == 'left') echo ' col-md-push-4'; ?>">

				<div class="cover tag-cover">
					<h3 class="tag-name">
						<?php _e('Search Results for', 'futura'); echo '&nbsp;"' . get_search_query() . '"'; ?>
					</h3>
					<div class="post-count">

						<?php 
							$total_posts = $wp_query->found_posts;
							printf (__('Total %d Posts', 'futura'), $total_posts);
						?>
					</div>
				</div>

				<?php if (have_posts()): while (have_posts()) : the_post();
					get_template_part( 'partials/post-templates/content', get_post_format() );
				endwhile; else:

				get_template_part( 'partials/post-templates/content', 'zero' );

				endif; ?>
			</div>
			<!-- end main post area -->
			<?php get_sidebar('main-sidebar'); ?>
		</div>
	</div>
</section>
<!-- end site's main content area -->

<?php get_footer(); ?>