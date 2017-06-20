<?php
/**
 * Header Logo / Textlogo 
 *
 * @subpackage		Bootstrap4
 * @since			1.0.0
 */
 
?>

<?php if ( !empty( get_header_image() ) AND get_theme_mod( 'bs4_carousel_status' ) == false OR is_customize_preview() ) { ?>
<div id="HeaderImage" class="<?php bs4_container_class(); ?>">
	<?php 
		$attach_ID = get_custom_header()->attachment_id; 
		$image_alt = get_post_meta( $attach_ID, '_wp_attachment_image_alt', true);
	?>
	<img src="<?php header_image(); ?>" class="img-fluid" alt="<?php echo $image_alt; ?>" />
</div>
<?php } if ( get_theme_mod( 'bs4_carousel_status' ) == true OR is_customize_preview() ) {
	bs4_image_carousel(); 
} ?>