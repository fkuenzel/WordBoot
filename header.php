<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<?php wp_head(); ?>
		
	</head>
	
	<body <?php body_class(); ?>>
		<div id="pageWrapper">
			<header id="pageHeader">
				<div class="<?php wb_container_class(); ?>">
					<?php get_template_part( 'template-parts/header/socialMenu' ); ?>
					<?php get_template_part( 'template-parts/header/logo' ); ?>
				</div>
				
				<?php get_template_part( 'template-parts/header/topMenu' ); ?>

				<?php get_template_part( 'template-parts/header/image' ); ?>
				
			</header> <!-- #pageHeader .<?php wb_container_class(); ?> .p-2 end; -->