<article id="<?php the_id(); ?>" <?php post_class('post'); ?>>
	<?php if (is_sticky()): ?>
		<div class="featured">
			<i class="fa fa-star"></i>
		</div>
	<?php endif; ?>
	<div class="post-head">
		<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	</div>
	<?php if (has_post_thumbnail()): ?>
	<div class="featured-media">
		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
	</div>
	<?php endif; ?>
	<div class="post-content">
		<?php the_content() ?>
	</div>
</article>