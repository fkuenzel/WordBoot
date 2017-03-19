<?php
/**
 * Header Logo / Textlogo 
 *
 * @subpackage		WordBoot
 * @since			1.0.0
 */
 
?>
<?php if ( !has_custom_logo() ) { ?>
	<h1 class="pageTitle"><?php bloginfo( 'name' ); ?></h1>
	<?php 
	$description = get_bloginfo( 'description', 'display' );
	if ( $description || is_customize_preview() ) : ?>
		<span class="lead pageDesc"><?php echo $description; ?></span>
	<?php endif; ?>
<?php } else { ?>
		<?php the_custom_logo('custom-logo'); ?>
<?php } ?>