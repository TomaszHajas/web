<?php get_header(); ?>
	
<!-- start site's main content area -->
<section class="content-wrap">
	<div class="container">
		<div class="row">
			<!-- start main post area -->
			<?php $sidebar = get_theme_mod('sidebar_position'); ?>
			<div class="col-md-8 main-content<?php if ($sidebar == 'left') echo ' col-md-push-4'; ?>">
				<?php if (have_posts()): while (have_posts()) : the_post();
					get_template_part( 'partials/post-templates/content', get_post_format() );
				endwhile; endif; ?>

				<!-- start about the author -->
				<div class="about-author clearfix">
					<?php if (function_exists('get_avatar')) : ?>
						<a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php  echo get_avatar( get_the_author_meta('email'), $size = '200');  ?></a>
					<?php endif; ?>
					<div class="details">
						<div class="author">
							<?php _e('About', 'futura'); ?>&nbsp;<?php  the_author_posts_link(); ?>
						</div>
						<div class="meta-info">
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
				</div>
				<!-- end about the author -->
				<?php wp_enqueue_script( "comment-reply" ) ?>
				<?php
					if(comments_open() || get_comments_number()) {
						comments_template();
					}
				?>
				<!-- start prev next wrap -->
				<div class="prev-next-wrap clearfix">
					<?php next_post_link('%link', '<i class="fa fa-angle-left fa-fw"></i> %title'); ?>
					&nbsp;
					<?php previous_post_link('%link', '%title <i class="fa fa-angle-right fa-fw"></i>'); ?>
				</div>
				<!-- end prev next wrap -->
			</div>
			<!-- end main post area -->
			<?php get_sidebar('main-sidebar'); ?>
		</div>
	</div>
</section>
<!-- end site's main content area -->

<?php get_footer(); ?>