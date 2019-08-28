<!-- start main sidebar widget area -->
<?php if ( is_active_sidebar( 'main-sidebar') ) : ?>
	<div class="col-md-4 sidebar">
		<?php dynamic_sidebar( 'main-sidebar'); ?>
	</div>
<?php endif; ?>
<!-- end main sidebar widget area -->