<?php
/**
 * @package xFolio
 */
?>
<div class="row">
	<div class="col-md-2">
			<?php echo get_avatar( $post->post_author, 100 ); ?>
			<p><?php echo get_the_author_meta('display_name', $post->post_author); ?></p>	
	</div>
	<div class="col-md-10">
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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
			
		</article><!-- #post-## -->	
	</div>
</div>