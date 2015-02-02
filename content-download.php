<?php
/**
 * @package xFolio
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<?php 
	if (has_post_thumbnail( $post->ID ) ){
		$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' ); ?>
		<img src="<?php echo $image[0]; ?>">	
	<?php } else { ?>
	<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/deafult.png">
	<?php	} ?>

	<div class="entry-content">
		<div role="tabpanel">
		  <!-- Nav tabs -->
		  <ul class="nav nav-tabs" role="tablist">
		    <li role="presentation" class="active"><a href="#description" aria-controls="home" role="tab" data-toggle="tab">Description</a></li>
		    <li role="presentation"><a href="#review" aria-controls="review" role="tab" data-toggle="tab">Review</a></li>
		  </ul>

		  <!-- Tab panes -->
		  <div class="tab-content">
		    <div role="tabpanel" class="tab-pane fade in active" id="description">
		    	<?php the_content(); ?>
		    </div>
		    <div role="tabpanel" class="tab-pane" id="review">
		    	 <div id="disqus_thread"></div>
				    <script type="text/javascript">
				        /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
				        var disqus_shortname = 'themesgrove'; // required: replace example with your forum shortname

				        /* * * DON'T EDIT BELOW THIS LINE * * */
				        (function() {
				            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
				            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
				            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
				        })();
				    </script>
				    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
				    
		    </div>
		  </div>

		</div>
		
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'xfolio' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php xfolio_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
