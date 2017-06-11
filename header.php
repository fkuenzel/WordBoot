<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<?php wp_head(); ?>
	</head>
	
	<body <?php body_class(); ?>>
		<div id="pageWrapper" class="<?php bs4_container_class( 'none' ); ?>">
			<header id="pageHeader" class="<?php bs4_container_class(); ?>">
				
				<?php get_template_part( 'template-parts/header/logo' ); ?>
				
				<?php get_template_part( 'template-parts/header/headerMenu' ); ?>

				<?php get_template_part( 'template-parts/header/image' ); ?>
				
			</header> <!-- #pageHeader .<?php bs4_container_class(); ?> .p-2 end; -->