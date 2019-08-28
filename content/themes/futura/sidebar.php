<!-- start main sidebar widget area -->
<?php if ( is_active_sidebar( 'main-sidebar') ) : 
	$sidebar = get_theme_mod('sidebar_position'); ?>
	<div class="col-md-4 sidebar<?php if ($sidebar == 'left') echo ' col-md-pull-8'; ?>">
		<?php dynamic_sidebar( 'main-sidebar'); ?>
	</div>
<?php endif; ?>
<!-- end main sidebar widget area -->