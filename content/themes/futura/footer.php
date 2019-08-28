<?php if (get_theme_mod('hide_footer_widgets') != true) : ?>
	<?php if ( is_active_sidebar( 'footer-sidebar-left') || is_active_sidebar( 'footer-sidebar-center') || is_active_sidebar( 'footer-sidebar-right')) : ?>
	<!-- start main-footer -->
	<footer class="main-footer">
		<div class="container">
			<div class="row">
				<!-- start first footer widget area -->
				<div class="col-sm-4">
				<?php if ( is_active_sidebar( 'footer-sidebar-left') ) : ?>
					<?php dynamic_sidebar( 'footer-sidebar-left'); ?>
				<?php endif; ?>
				</div>
				<!-- end first footer widget area -->
				<!-- start second footer widget area -->
				<div class="col-sm-4">
				<?php if ( is_active_sidebar( 'footer-sidebar-center') ) : ?>
					<?php dynamic_sidebar( 'footer-sidebar-center'); ?>
				<?php endif; ?>
				</div>
				<!-- end second footer widget area -->
				<!-- start third footer widget area -->
				<div class="col-sm-4">
				<?php if ( is_active_sidebar( 'footer-sidebar-right') ) : ?>
					<?php dynamic_sidebar( 'footer-sidebar-right'); ?>
				<?php endif; ?>
				</div>
				<!-- end third footer widget area -->
			</div>
		</div>
	</footer>
	<!-- end main-footer -->
<?php endif; endif; ?>
	<!-- start copyright section -->
	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
				    <?php esc_attr_e('&copy;', 'futura'); ?>
				    <?php _e(date('Y')); ?>
				    <a href=" <?php echo home_url('/') ?>"><?php echo esc_attr(get_bloginfo('name', 'display')); ?></a>.&nbsp;
				    <span class="custom-copyright-text"><?php echo get_theme_mod( 'copyright_textbox', 'All Right Reserved.' ); ?></span>
				</div>
			</div>
		</div>
	</div>
	<!-- end copyright section -->
	<a href="#" id="back-to-top"><i class="fa fa-angle-up"></i></a>
	<?php wp_footer(); ?>
</body>
</html>