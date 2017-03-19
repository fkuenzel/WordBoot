<?php
/**
 * Template Name: Modal Window
 */
?>
<div class="modal fade" id="modal_frame" tabindex="-1" role="dialog" aria-labelledby="modal_frame" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
<?php
	if ( have_posts() ) :
		/* Start the Loop */
		while ( have_posts() ) : the_post();
?>
			<div class="modal-header">
				<h5 class="modal-title h1" id="modal_frame"><?php the_title(); ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<?php the_content(); ?>
			</div>
<?php		
		endwhile;
	endif;
			?>
		</div>
	</div>
</div>