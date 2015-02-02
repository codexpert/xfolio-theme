<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package xFolio
 */
?>
<?php get_template_part( 'xfolio', 'resources' ); ?>

<footer id="footer" class="site-footer" role="contentinfo">
	<div id="floor">
		<div class="container">
			<div class="row">
				<div class="col-md-4"><?php dynamic_sidebar( 'footer-1' ); ?></div>
				<div class="col-md-4"><?php dynamic_sidebar( 'footer-2' ); ?></div>
				<div class="col-md-4"><?php dynamic_sidebar( 'footer-3' ); ?></div>
			</div>	
		</div>
	</div>
	<div class="site-info">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					© 2015 ThemesGrove. Made with &hearts; by <a href="http://www.themexpert.com">ThemeXpert</a>		
				</div>
			</div>
		</div>
	</div><!-- .site-info -->
</footer><!-- #colophon -->

</div><!-- #content -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
