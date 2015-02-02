<?php
/**
 * The template for displaying all single posts.
 *
 * @package xFolio
 */

get_header();
// Store metabox values
$demo_url 			= get_post_meta( get_the_ID(), '_tx_demo_url', true );
$compatible_with 	= get_post_meta( get_the_ID(), '_tx_compatible', true );
$files_included 	= get_post_meta( get_the_ID(), '_tx_files_included', true );
$support_url 		= get_post_meta( get_the_ID(), '_tx_support_url', true );
$paypal 			= get_post_meta( get_the_ID(), '_tx_paypal', true );
?>

<div class="page-header light-bg">
	<div class="container">
		<?php the_title( '<h1 class="page-title">', '</h1>' ); ?>		
	</div>
</div>

<div class="container">
	<div class="row">
		<div id="primary" class="content-area col-md-8">
			<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'download' ); ?>


				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>
			
			<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->
		</div><!-- #primary -->

		<div id="info" class="col-md-4">
			<div class="info-inner">
				<div class="panel panel-default">
				  <div class="panel-body">
					<div class="well">
						<div class="box">
							<strong><?php echo edd_get_download_sales_stats( $post->ID ); ?></strong>
							<span>Downloads</span>
						</div>
					</div>
					
					<p>
					  <a class="btn btn-success btn-lg btn-block" href="<?php echo $demo_url; ?>" target="_blank">Live Demo</a>
					</p>

				    <?php dynamic_sidebar( 'sidebar-item' ); ?>
				  </div>
				</div>

				<div class="panel panel-default panel-author">
					<div class="panel-body">
						<div class="author-info">
							<?php echo get_avatar( $post->post_author, 64 ); ?>
							<h3><?php echo get_the_author_meta('display_name', $post->post_author); ?></h3>	
							<div class="btn-group">
								<?php if($support_url):?>
									<a class="btn btn-default" href="<?php echo $support_url?>" target="_blank"><span class="fa fa-life-ring"></span>Get Support</a>
								<?php endif; ?>
								<?php if($paypal):?>
									<a class="btn btn-default" href="https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=<?php echo $paypal?>&lc=US&item_name=Donate&currency_code=USD&bn=PP-DonationsBF:btn_donate_SM.gif:NonHostedGuest" target="_blank"><span class="fa fa-coffee"></span>Buy Me a Coffee</a>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>

				<div class="panel panel-default">
					<div class="panel-heading">
					    <h3 class="panel-title">Theme Details</h3>
					 </div>
					 <!-- List group -->
					  <ul class="list-group">
					    <li class="list-group-item"><strong>Category</strong> <?php echo get_the_term_list( $post->ID, 'download_category', '', ', ', '' ); ?></li>
					    <li class="list-group-item"><strong>Created</strong> <?php the_date(); ?></li>
					    <li class="list-group-item"><strong>Last Update</strong> <?php the_modified_date(); ?></li>
					    <li class="list-group-item"><strong>Compatible With</strong> <?php echo implode(', ', $compatible_with); ?></li>
					    <li class="list-group-item"><strong>Files Included</strong> <?php echo implode(', ', $files_included); ?></li>
					  </ul>
				</div>

				<div class="panel panel-default panel-tags">
					<div class="panel-heading"><h3 class="panel-title">Tags</h3></div>
					<div class="panel-body"><?php echo get_the_term_list( $post->ID, 'download_tag', '<div class="tag-cloud">', '', '</div>' ); ?>		</div>			
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>
