<?php
/**
 * @package xFolio
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="article-inner clearfix">
		<div class="row">
			<div class="col-md-4">
				<?php 
					if (has_post_thumbnail( $post->ID ) ){
						$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail' ); ?>
						<img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>">	
					<?php } else { ?>
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/default.png">
				<?php	} ?>
			</div>

			<div class="col-md-8">

				<header class="entry-header">
					<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

					<?php if ( 'post' == get_post_type() ) : ?>
					<div class="entry-meta">
						<?php xfolio_posted_on(); ?>
					</div><!-- .entry-meta -->
					<?php endif; ?>
				</header><!-- .entry-header -->	
				
				<div class="entry-content">
					<?php
						/* translators: %s: Name of current post */
						the_content( sprintf(
							__( 'Continue reading &rarr;', 'xfolio' )
						) );
					?>

					<?php
						wp_link_pages( array(
							'before' => '<div class="page-links">' . __( 'Pages:', 'xfolio' ),
							'after'  => '</div>',
						) );
					?>
				</div><!-- .entry-content -->
			</div>
		</div>
	</div>
</article><!-- #post-## -->