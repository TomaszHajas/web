<?php get_header(); ?>
	
<!-- start site's main content area -->
<section class="content-wrap">
	<div class="container">
		<div class="row">
			<!-- start main post area -->
			<?php $sidebar = get_theme_mod('sidebar_position'); ?>
			<div class="col-md-8 main-content<?php if ($sidebar == 'left') echo ' col-md-push-4'; ?>">
				<div class="cover author-cover">
					<div class="avatar-wrap">
						<?php echo get_avatar( get_the_author_meta('email'), '200' ); ?>
					</div>
					<h3 class="author-name">
						<?php the_author(); ?>
					</h3>
					<div class="meta-info">
						<span class="post-count"><i class="fa fa-pencil-square-o"></i>
							<?php 
								$total_posts = $wp_query->found_posts;
								printf (__('Total %d Posts', 'futura'), $total_posts);
							?>
						</span>
						<?php if (get_the_author_meta('user_url') != NULL) : ?>
						<span class="website"><i class="fa fa-globe"></i><a href="<?php esc_url(the_author_meta('user_url')) ?>" targer="_BLANK"><?php _e('Website', 'futura') ?></a></span>
						<?php endif; ?>
					</div>
					<?php $authordesc = get_the_author_meta( 'description' );
						if (! empty($authordesc)) : ?>
						<div class="bio">
							<?php echo the_author_meta('description') ?>
						</div>
					<?php endif; ?>
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