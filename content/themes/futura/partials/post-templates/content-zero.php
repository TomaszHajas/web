<article class="post">
	<div class="post-content">
		<?php if (is_search()) : ?>
			<p><?php _e('Sorry nothing found for your search term. Please try again with another term.', 'futura'); ?></p>
			<?php 
			get_search_form(); 
			endif;
		?>
	</div>
</article>