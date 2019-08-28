<?php get_header(); ?>
	
<!-- start site's main content area -->
<section class="content-wrap">
	<div class="container">
		<div class="row">
			<!-- start main post area -->
			<?php $sidebar = get_theme_mod('sidebar_position'); ?>
			<div class="col-md-8 main-content<?php if ($sidebar == 'left') echo ' col-md-push-4'; ?>">
				<div class="error-wrap">
					<div class="error-code"><?php _e('404', 'futura') ?></div>
					<h4><?php _e('OOPS! The page not found.', 'futura') ?></h4>
					<a class="home-page-link btn btn-default" href="<?php echo esc_url(home_url('/')); ?>"><?php _e('Visit Home Page', 'fu8tura') ?></a>
					<p><?php _e('Unfortunately the page you were looking for could not be found. Maybe search can help.', 'futura') ?></p>
					<div class="search-form-wrap">
						<?php get_search_form(); ?>
					</div>
				</div>
			</div>
			<!-- end main post area -->
			<?php get_sidebar('main-sidebar'); ?>
		</div>
	</div>
</section>
<!-- end site's main content area -->

<?php get_footer(); ?>