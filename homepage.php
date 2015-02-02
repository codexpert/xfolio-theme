<?php
/**
 * Template Name: HomePage
 *
 */
get_header(); 
$recent = xfolio_get_posts('download');
$featured = xfolio_get_posts('download', 3, 'featured');
?>

<?php get_template_part( 'xfolio', 'header' ); ?>

<section id="featured">
	<div class="container">
		<h2 class="section-title">Exclusive Free Goods</h2>
		<h3 class="section-subtitle">Hand picked exclusive goods, so get 'em before fast!</h3>
		<div class="row">
		<?php while ( $featured->have_posts() ) : $featured->the_post(); ?>
			<div class="col-md-4 col-sm-6">
				<figure class="clearfix">
					<a href="<?php echo get_permalink();?>">
						<?php 
	        			if (has_post_thumbnail( $post->ID ) ){
							$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'xfolio-homepage-thumb' ); ?>
							<img src="<?php echo $image[0]; ?>">	
						<?php } else { ?>
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/deafdiv class="row"t.png">
						<?php	} ?>
					</a>	
					<figcaption class="pull-left">
						<a href="<?php echo get_permalink();?>"><h3 class="title"><?php the_title(); ?></h3></a>
						<?php xfolio_posted_by_in(); ?>
					</figcaption>
					<a class="btn btn-success pull-right" href="<?php echo get_permalink();?>">Download</a>
				</figure>
			</div>
		<?php endwhile; ?>
		</div>
	</div>	
</section>

<section id="latest" class="light-bg">
	<div class="container">
		<h2 class="section-title">Latest Products</h2>
		<h3 class="section-subtitle">Top design and themes from independent creators</h3>
		<div class="row">
		<?php while ( $recent->have_posts() ) : $recent->the_post(); ?>
			<div class="col-md-4 col-sm-6">
				<figure class="clearfix">
					<a href="<?php echo get_permalink();?>">
						<?php 
	        			if (has_post_thumbnail( $post->ID ) ){
							$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'xfolio-homepage-thumb' ); ?>
							<img src="<?php echo $image[0]; ?>">	
						<?php } else { ?>
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/deafdiv class="row"t.png">
						<?php	} ?>
					</a>	
					<figcaption class="pull-left">
						<a href="<?php echo get_permalink();?>"><h3 class="title"><?php the_title(); ?></h3></a>
						<?php xfolio_posted_by_in(); ?>
					</figcaption>
					<a class="btn btn-success pull-right" href="<?php echo get_permalink();?>">Download</a>
				</figure>
			</div>
		<?php endwhile; ?>
		</div>
	</div>	
</section>

<?php get_footer(); ?>
