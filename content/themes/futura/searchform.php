<form action="<?php echo esc_url(home_url( '/' )); ?>" method="get" class="search-form">
	<div class="form-group clearfix">
		<label for="search">Search</label>
		<input type="text" name="s" id="search" value="<?php the_search_query(); ?>" class="pull-left search-input" placeholder="<?php _e('Enter keyword...', 'futura') ?>">
		<button class="fa fa-search btn btn-default search-submit pull-right" type="submit"></button>		
	</div>
</form>