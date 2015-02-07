<?php
/**
 * The template for displaying search results pages.
 *
 * @package xFolio
 */

get_header(); 
$results_count = $wp_query->found_posts;
?>

<div class="jumbotron">
    <div class="container">
        <h1>Search <span class="keyword">&ldquo;<?php the_search_query(); ?>&rdquo;</span></h1>
        <?php if ($results_count == '' || $results_count == 0) { // No Results ?>
            <p><span class="label label-warning"><?php _e('No Results'); ?></span>&nbsp; <?php _e('Try different search terms.'); ?></p>
        <?php } else { // Results Found ?>
            <p><span class="label label-success"><?php echo $results_count . __(' Results'); ?></span></p>
        <?php } // end results check ?>
        
        <?php get_search_form(); ?>
    </div> <!-- .container -->
</div> <!-- .jumbotron -->

<div class="container" id="main">
    <div class="row">
        <div class="col-md-12">
            <?php if (have_posts()) : // Results Found ?>

                <h1><?php _e('Search Results'); ?></h1>
                <?php while (have_posts()) : the_post(); ?>
                
                <div class="media">
                  <div class="media-left">
                  <?php 
                        if (has_post_thumbnail( $post->ID ) ){
                            $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), array(32,32 ) ); ?>
                            <img class="media-object" src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>">    
                        <?php } else { ?>
                        <img class="media-object" src="<?php echo get_stylesheet_directory_uri(); ?>/images/default.png">
                    <?php   } ?>
                  </div>
                  <div class="media-body">
                    <h4 class="media-heading"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>
                    <p><?php echo wp_trim_words( get_the_excerpt(), 30, '...' ); ?></p>
                  </div>
                </div>
                
                <hr />

                <?php endwhile; ?>

                <ul class="pager">
                    <li><?php next_posts_link('<i class="icon-chevron-left"></i>&nbsp; Older Results') ?></li>
                    <li><?php previous_posts_link('Newer Results &nbsp;<i class="icon-chevron-right"></i>') ?></li>
                </ul>

            <?php else : // No Results ?>

            <p class="alert alert-warning"><i class="fa fa-frown-o"></i><?php _e('Sorry. We couldn&rsquo;t find anything for that search. View one of our site&rsquo;s pages or a recent article below.'); ?></p>
            <div class="row">
                <div class="col-md-6 posts">
                	<div class="panel panel-success">
					  <div class="panel-heading">
					    <h3 class="panel-title"><?php _e('Recent Articles'); ?></h3>
					  </div>
					  <div class="panel-body">
					    <ul>
	                        <?php
	                            $args = array(
	                                'numberposts' => '10',
	                                'post_status' => 'publish'
	                            );
	                            $recent_posts = wp_get_recent_posts( $args );
	                            foreach( $recent_posts as $recent ) {
	                                echo '<li><a href="' . get_permalink($recent["ID"]) . '">' . $recent["post_title"] . '</a></li>';
	                            }
	                        ?>
	                    </ul>
					  </div>
					</div>
                </div> <!-- .posts -->
                <div class="col-md-6 pages">
                	<div class="panel panel-success">
					  <div class="panel-heading">
					    <h3 class="panel-title"><?php _e('Page Sitemap'); ?></h3>
					  </div>
					  <div class="panel-body">
					    <ul>
	                        <?php wp_list_pages('title_li=&sort_column=menu_order'); ?>
	                    </ul>
					  </div>
					</div>
                    
                    
                </div> <!-- .pages -->
            </div> <!-- .row -->

            <?php endif; ?>

        </div> <!-- .col-md-12 -->

    </div> <!-- .row -->
</div><!-- .container -->
<?php get_footer(); ?>
