<?php
$cat_args = array(
	'exclude'            => '',
	'include'            => '',
	'title_li'           => '',
	'taxonomy'           => 'download_category',
    );
?>

<div class="splash">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="animated bounceInDown"><span class="item-counter"><?php echo wp_count_posts('download')->publish ;?></span> Website Templates and Themes For FREE</h1>
				<div class="animated bounceInLeft cat-list">for <?php echo  wp_list_categories( $cat_args ) ; ?> and more</div>

				<form role="search" class="animated bounceInUp" method="get">
				  	<div class="input-group">
				      <input type="search" class="form-control search-field input-lg" placeholder="Search …" value="" name="s" title="Search for:">
				      <span class="input-group-btn">
				        <button class="btn btn-default" type="submit"><span class="fa fa-search"></span></button>
				      </span>
				    </div>
				</form>
			</div>
		</div>
	</div>
</div>