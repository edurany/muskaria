<?php get_header(); ?>


<div class="main-content">
	<section class="container sitecontainer bgw">
		<div class="row">		
		 <?php 
			$archive_sidebar_position = get_theme_mod('alith_archive_sidebar_position');	
			switch ( $archive_sidebar_position ) {
				case 'one_sidebar_right':  get_template_part( 'template-parts/archive/archive', 'one_sidebar_right' ); break;
				case 'one_sidebar_left':  get_template_part( 'template-parts/archive/archive', 'one_sidebar_left' ); break;
				case 'two_sidebar_right':  get_template_part( 'template-parts/archive/archive', 'two_sidebar_right' ); break;
				case 'two_sidebar_left':  get_template_part( 'template-parts/archive/archive', 'two_sidebar_left' ); break;
				case 'center_content':  get_template_part( 'template-parts/archive/archive', 'center_content' ); break;
				default: get_template_part( 'template-parts/archive/archive', 'one_sidebar_right' ); break;
			}
		 ?>		
		</div><!-- .row -->
</div>
 
<?php get_footer(); ?>