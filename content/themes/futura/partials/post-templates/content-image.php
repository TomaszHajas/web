<article id="<?php the_id(); ?>" <?php post_class('post'); ?>>
	<?php if (is_sticky()): ?>
		<div class="featured">
			<i class="fa fa-star"></i>
		</div>
	<?php endif; ?>

	<div class="post-head">
		<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<div class="post-meta">
			<span class="author"><?php _e('By', 'futura') ?> <?php the_author_posts_link(); ?></span> &bull;
			<span class="date"><?php the_time( get_option('date_format')); ?></span>
			<?php if(comments_open() && !post_password_required()) : ?>
			 &bull; <span class="comment-count"><?php comments_popup_link( __('0 Comments', 'futura'), __('1 Comment', 'futura'), __('% Comments', 'futura')); ?></span>
		<?php endif; ?>
		</div>
	</div>

	<?php if (has_post_thumbnail()): ?>
	<div class="featured-media magnific-popup-image">
		<?php 
		$attachment = get_post(get_post_thumbnail_id($post->ID));
		$image_caption = $attachment->post_excerpt;
		?>
		<?php $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
		<a href="<?php echo $thumbnail_src[0]; ?>" <?php if ($image_caption !=NULL) : ?>data-caption="<?php echo $image_caption; ?>"<?php endif; ?>>
			<?php the_post_thumbnail(); ?></a>
	</div>
	<?php endif; ?>
	<div class="post-content">
		<?php is_single() ? the_content() : the_excerpt() ?>

		<?php wp_link_pages( array(
				'before'           => '<nav class="pagination align-left">',
				'after'            => '</nav>',
				'link_before'      => '',
				'link_after'       => '',
				'next_or_number'   => 'page',
				'nextpagelink'     => '<i class="fa fa-angle-right"></i>',
				'previouspagelink' => '<i class="fa fa-angle-left"></i>',
			) ); ?>
	</div>
	<?php if (is_single() && has_tag()) : ?>
		<div class="tag-list">
			<?php the_tags(__('Tagged in:','futura'), ', ', '' ); ?>
		</div>
	<?php endif ?>
	<footer class="post-footer clearfix">
		<div class="pull-left category-list">
			<i class="fa fa-folder-open-o"></i>
			<?php the_category(',&nbsp' ); ?>
		</div>
		<div class="pull-right share">
			<?php get_template_part('partials/social-share'); ?>
		</div>
	</footer>
</article>