<header class="header">
	<div class="container">
		<div class="row">
			<div class="col-md-2 col-sm-12">
				<div class="alith-logo">                        
					<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<?php if (!get_theme_mod('alith_logo')):?>
							<img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" data-retina="<?php echo get_template_directory_uri(); ?>/images/logo@2x.png" />
						<?php else: ?>
							<img src="<?php echo esc_url(get_theme_mod('alith_logo'));?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"<?php echo esc_url(get_theme_mod('alith_logo_retina') ? ' data-retina="'.get_theme_mod('alith_logo_retina').'"' : '');?> />
						<?php endif; // logo ?>
					</a>                       

				</div><!-- #wi-logo -->
			</div>
			<div class="col-md-10 col-sm-12">
				<nav class="navbar navbar-default"> 
					<div class="navbar-header"> 
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"> 
					  <span class="sr-only"><?php echo esc_html__('MENU', 'livemag')?></span> 
					  <span class="icon-bar"></span> 
					  <span class="icon-bar"></span> 
					  <span class="icon-bar"></span> 
					</button>
					</div> 
					<?php if (has_nav_menu('main-menu')):?>					
					<?php /* Primary navigation */
					 wp_nav_menu( array(
							'theme_location'    => 'main-menu',
							'depth'             => 4,
							'container'         => 'div',
							'container_class'   => 'collapse navbar-collapse navbar-ex1-collapse',
							'container_id'      => 'bs-example-navbar-collapse-1',
							'menu_class'        => 'nav navbar-nav',
							'fallback_cb'       => 'alithemes_theme_bootstrap_navwalker::fallback',
							'walker'            => new alithemes_theme_bootstrap_navwalker())
						);
					?>
					<?php else: ?>
					<?php echo esc_html__( 'Go to Appearance > Menu to set Main Menu','livemag'); ?>
					<?php endif; ?>

				
					<?php if (!get_theme_mod('alith_disable_off_canvas')):?>
						<?php if(is_active_sidebar('off-canvas-area')):?>
							<div class="open_sidebar_area navbar-right"><a href="#"><i class="fa fa-align-right" aria-hidden="true"></i></a></div>	
						<?php endif;?>
					<?php endif; //off_canvas?>
					
					<?php if (!get_theme_mod('alith_disable_header_search')):?>
					<ul class="nav navbar-nav navbar-right searchandbag">
						<li class="dropdown searchdropdown hasmenu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-search"></i></a>
							<ul class="dropdown-menu show-right" id="top-search">
								<li>
									<form method="get" class="topbar-searchform" action="<?php echo site_url();?>" role="search">
										<button class="btn searchform-button" type="submit">
											<i class="fa fa-search"></i>
										</button>
										<input type="search" class="searchform-input" name="s" value="" placeholder="Type your search & hit enter" />										
									</form>
								</li>
							</ul>
						</li>
					</ul>
					<?php endif; // header search ?>
					
					<?php if (!get_theme_mod('alith_disable_header_social')):?>
					<div id="header-social" class="social-list">
						<ul class="nav navbar-nav navbar-right">
							<?php alith_social_list(!get_theme_mod('')); ?>
						</ul>
					</div><!-- #header-social -->
					<?php endif; // footer social ?>
					
				</nav>
				
			</div> <!-- end col -->
		</div> <!-- end row -->
	</div>
<!-- end container -->
</header>