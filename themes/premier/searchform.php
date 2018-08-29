<?php
/**
 * default search form
 */
?>
<form id="searchform" class="navbar-form" method="get" action="<?php echo home_url('/'); ?>">
	<div class="form-group">
		<span class="input-group">
			<input type="text" class="form-control" name="s" placeholder="Search" value="<?php the_search_query(); ?>">

            <button type="submit" value="Search" class="btn btn-default input-group-addon search-form-submit">
                <span class="sr-only">Search</span>
                <i class="fa fa-search" aria-hidden="true"></i>
             </button>
		</span>
	</div>
</form>
