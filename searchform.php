
<form action="/" method="GET" role="form">
	<div class="input-group">
		<input type="search" name="s" id="search" class="form-control" value="<?php the_search_query(); ?>" required="required" title="">
		<span class="input-group-btn">
			<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></button>
		</span>
	</div>
</form>
