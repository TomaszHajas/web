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
						<?php
							if ( is_day() ) :
							printf(__('Date: %s', 'futura'), get_the_date());
							elseif (is_month()) :
							printf(__('Month: %s', 'futura'), get_the_date( _x( 'F Y', 'Date for monthly archive', 'futura')));
							elseif (is_year()) :
							printf(__('Year: %s', 'futura'), get_the_date( _x( 'Y', 'Date for yearly archive', 'futura' )));
							elseif ( is_tag() ) :
							printf(__('Tag: %s', 'futura'), single_tag_title('', false ));
							elseif (is_category()) :
							printf(__('Category: %s', 'futura'), single_cat_title('', false ));
							else :
							_e('Archive', 'futura');
							endif;
		                ?>
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
				endwhile; endif; ?>

			 	<!-- start pagination -->
				<nav class="pagination">
					<?php previous_posts_link('<i class="fa fa-angle-left"></i>') ?>
					<span class="page-number">
						<?php
						//display Page x of y pages
						$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
						$total = $wp_query->max_num_pages;
						printf(__('Page %d of %d', 'futura'), $paged, $total);
						?>
					</span>
					<?php next_posts_link('<i class="fa fa-angle-right"></i>') ?>
				</nav>
				<!-- end pagination -->
			</div>
			<!-- end main post area -->
			<?php get_sidebar('main-sidebar'); ?>
		</div>
	</div>
</section>
<!-- end site's main content area -->

<?php get_footer(); ?>