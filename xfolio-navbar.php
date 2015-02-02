<header class="navbar navbar-default navbar-fixed-top" data-spy="affix" data-offset-top="100"> 
	<div class="container">
		
		<!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">ThemesGrove</a>
	    </div>

	    <div class="collapse navbar-collapse" id="navbar-collapse">
      	 
      	 <?php
            wp_nav_menu( array(
                // 'menu'              => 'primary',
                'theme_location'    => 'primary',
                'depth'             => 2,
                'container'         => false,
                'container_class'   => 'collapse navbar-collapse',
        		'container_id'      => 'bs-example-navbar-collapse-1',
                'menu_class'        => 'nav navbar-nav',
                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                'walker'            => new wp_bootstrap_navwalker())
            );
        ?>

	      
		<?php if ( !is_front_page() && !is_home() ) :?>
		<form role="search" method="get" class="navbar-form navbar-left" action="http://localhost/themesgrove/">
		  	<div class="input-group">
		      <input type="search" class="form-control search-field" placeholder="Search …" value="" name="s" title="Search for:">
		      <span class="input-group-btn">
		        <button class="btn btn-info" type="submit"><span class="fa fa-search"></span></button>
		      </span>
		    </div>
		</form>
		<?php endif; ?>
	      <div class="nav navbar-nav navbar-right">
			<a class="btn btn-success navbar-btn">Submit Item</a>	
			<a class="btn btn-default navbar-btn" href="<?php echo site_url();?>/wp-login.php">Login</a>
	      </div>

	    </div>

	</div>
</header>