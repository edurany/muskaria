<section class="site_bottom">
	<div class="container">
		<div class="row">
			<div class="col-md-3 col-sm-6 col-xs-12">
				<?php if(is_active_sidebar('bottom_column_1_area')):?>
					<?php dynamic_sidebar('bottom_column_1_area');?>			
				<?php endif;?>
			</div> <!--Bottom column #1-->
			<div class="col-md-3 col-sm-6 col-xs-12">
				<?php if(is_active_sidebar('bottom_column_2_area')):?>
					<?php dynamic_sidebar('bottom_column_2_area');?>			
				<?php endif;?>
			</div> <!--Bottom column #2-->
			<div class="col-md-3 col-sm-6 col-xs-12">
				<?php if(is_active_sidebar('bottom_column_3_area')):?>
					<?php dynamic_sidebar('bottom_column_3_area');?>			
				<?php endif;?>
			</div> <!--Bottom column #3-->
			<div class="col-md-3 col-sm-6 col-xs-12">
				<?php if(is_active_sidebar('bottom_column_4_area')):?>
					<?php dynamic_sidebar('bottom_column_4_area');?>			
				<?php endif;?>
			</div> <!--Bottom column #4-->
		</div>
	</div>
</section>


<section class="sidebar_area">
	<div class="sidebar_area_head">
		<div class="close_sidebar_area"><i class="fa fa-times" aria-hidden="true"></i></div>		
	</div>
	<div class="sidebar_area_content">
		<div class="sidebar_area_content_scrollable">
		<?php if(is_active_sidebar('off-canvas-area')):?>
			<?php dynamic_sidebar('off-canvas-area');?>			
		<?php endif;?>
		</div>
	</div>
</section>
	
<footer class="footer">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-sm-12 text-left">
				<?php if (!get_theme_mod('alith_copyright')):?>
				<p class="copyright"><?php esc_html__( 'All rights reserved. Designed by <a href="http://alithemes.com" target="_blank">Alithemes.com</a>', 'livemag' );?></p>
				<?php else: ?>
				<p class="copyright"><?php echo wp_kses(get_theme_mod('alith_copyright'),'');?></p>
				<?php endif; ?>
			</div>

			<div class="col-md-6 col-sm-12">
				<?php if (has_nav_menu('footer-menu')) {
				 /* Footer navigation */				
					wp_nav_menu( array(
							'theme_location'    => 'footer-menu',
							'depth'             => 1,
							'menu_class' 		=> 'footer-menu',
							'fallback_cb'       => 'alithemes_theme_bootstrap_navwalker::fallback',
							'walker'            => new alithemes_theme_bootstrap_navwalker())
						);
				}
				?>			
			</div>
		</div>
	</div>
</footer>


<?php if (!get_theme_mod('alith_disable_back_to_top')):?>		
<a id="back-to-top" href="#" class="back-to-top" role="button" title="Top page" data-toggle="tooltip" data-placement="left"><i class="fa fa-long-arrow-up" aria-hidden="true"></i></a>
<?php endif; ?>	
		
<?php wp_footer();?>	
<?php if (get_theme_mod('alith_boxed_layout')):?>	
</div> <!--.main-wrap-->
<?php endif; ?>	
</body>
</html>
