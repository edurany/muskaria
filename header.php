<!DOCTYPE html>
<html <?php language_attributes();?>>

<head>
	<meta charset="<?php bloginfo('charset')?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-PPXLFGX');</script>
	<!-- End Google Tag Manager -->
	<?php wp_head();?>		 
</head>
<?php 
	$alith_header_style = get_theme_mod('alith_header_style');	
	$alith_widget_header_style = get_theme_mod('alith_widget_header_style');	
?>
<body <?php body_class(array($alith_header_style, $alith_widget_header_style));?>>	
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PPXLFGX"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<?php if (get_theme_mod('alith_boxed_layout')):?>	
	<div class="main-wrap">
<?php endif; ?>	
	<?php 
	switch ( $alith_header_style ) {
		case 'header_one':  get_template_part( 'template-parts/header/header', 'style_one' ); break;
		case 'header_two':  get_template_part( 'template-parts/header/header', 'style_two' ); break;
		case 'header_three':  get_template_part( 'template-parts/header/header', 'style_three' ); break;
		default: get_template_part( 'template-parts/header/header', 'style_one' ); break;
	}
	?>	

<!-- end header -->