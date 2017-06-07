<?php
/**
 * Header Logo / Textlogo 
 *
 * @subpackage		Bootstrap4
 * @since			1.0.0
 */
 
?>
<?php if ( !has_custom_logo() ) { ?>
	<span class="h1 pageTitle"><?php bloginfo( 'name' ); ?></span>
	<?php 
	$description = get_bloginfo( 'description', 'display' );
	if ( $description || is_customize_preview() ) : ?>
		<span class="lead pageDesc"><?php echo $description; ?></span>
	<?php endif; ?>
<?php } else { ?>
		<?php the_custom_logo('custom-logo'); ?>
<?php } ?>