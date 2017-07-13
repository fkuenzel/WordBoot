		
			<footer id="pageFooter" class="<?php bs4_container_class(); ?>">
				<?php 
				if ( is_active_sidebar( 'footer_widgets' ) ) { ?>
				<div class="footer-widgets">
					<div class="<?php bs4_container_class(); ?>">
						<div class="row">
							<?php dynamic_sidebar( 'footer_widgets' );  ?>
						</div><!-- .row end; -->
					</div> <!-- .<?php bs4_container_class(); ?> -->
				</div> <!-- .footer-widgets end -->
				<?php } ?>
			
			
			
				<?php
					$theme_data = wp_get_theme(); 
				?>
				<div class="copyright text-center">
					<p>Copyright <?php echo date('Y'); ?> by <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo( 'name' ); ?>"><?php bloginfo( 'name' ); ?></a>. | Make with <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'bs4_lang' ) ); ?>" title="<?php echo  __( 'WordPress', 'bs4_lang' ); ?>" rel="external"><?php echo  __( 'WordPress', 'bs4_lang' ); ?></a> and <a href="<?php echo esc_url( $theme_data->get('ThemeURI') ); ?>" title="<?php echo esc_html($theme_data->get('Name')) .' '. esc_html($theme_data->get('Version')); ?>" rel="external"><?php echo esc_html($theme_data->get('Name')) .' '. esc_html($theme_data->get('Version')); ?></a></p>
				</div>

			</footer>
		</div> <!-- #pageWrapper END -->
		<div id="modalwindows"></div>
		
		<?php wp_footer(); ?>
	</body>
</html>
