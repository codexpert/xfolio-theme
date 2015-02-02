<?php
/**
 * The template for displaying download archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package xFolio
 */

get_header(); ?>

<div class="page-header light-bg">
    <div class="container">
        <?php
            the_archive_title( '<h1 class="page-title">', '</h1>' );
            the_archive_description( '<div class="taxonomy-description">', '</div>' );
        ?>
    </div>
</div>

<section id="cat-download">
    <div class="container">
        <?php if ( have_posts() ) : ?>
        <div class="row">
        <?php while ( have_posts() ) : the_post(); ?>
            <div class="col-md-4 col-sm-6">
                <figure class="clearfix">
                    <a href="<?php echo get_permalink();?>">
                        <?php 
                        if (has_post_thumbnail( $post->ID ) ){
                            $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'xfolio-homepage-thumb' ); ?>
                            <img src="<?php echo $image[0]; ?>">    
                        <?php } else { ?>
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/deafdiv class="row"t.png">
                        <?php   } ?>
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
        <?php endif; ?>
    </div>  
</section>

<?php wp_bootstrap_pagination(); ?>

<?php get_footer(); ?>
