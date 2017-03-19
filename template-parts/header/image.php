<?php
/**
 * Header Logo / Textlogo 
 *
 * @subpackage		WordBoot
 * @since			1.0.0
 */
 
?>

<?php if ( !empty( get_header_image() ) AND get_theme_mod('wb_slider_status') == false ) { ?>
<div id="HeaderImage" class="<?php wb_container_class(); ?>">
	<?php 
		$attach_ID = get_custom_header()->attachment_id; 
		$image_alt = get_post_meta( $attach_ID, '_wp_attachment_image_alt', true);
	?>
	<img src="<?php header_image(); ?>" class="img-fluid" alt="<?php echo $image_alt; ?>" />
</div>
<?php } if ( get_theme_mod('wb_slider_status') == true ) {
	wb_image_slider(); 
} ?>