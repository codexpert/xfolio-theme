<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package xFolio
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="col-md-4">
		<?php 
			if (has_post_thumbnail( $post->ID ) ){
				$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'xfolio-thumb' ); ?>
				<img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>">	
			<?php } else { ?>
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/default.png">
		<?php	} ?>
	</div>
	<div class="col-md-8">
		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header><!-- .entry-header -->	
		<div class="entry-content">
			<?php the_content(); ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'xfolio' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<?php edit_post_link( __( 'Edit', 'xfolio' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-footer -->
	</div>
</article><!-- #post-## -->
