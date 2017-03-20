		
			<footer id="pageFooter">
				<?php 
				if ( is_active_sidebar( 'footer_widgets' ) ) { ?>
				<div class="footer-widgets">
					<div class="<?php wb_container_class(); ?>">
						<div class="row">
							<?php dynamic_sidebar( 'footer_widgets' );  ?>
						</div><!-- .row end; -->
					</div> <!-- .<?php wb_container_class(); ?> -->
				</div> <!-- .footer-widgets end -->
				<?php } ?>
			
				<div class="<?php wb_container_class(); ?>">
					<div class="copyright">
						<p>Copyright <?php echo date('Y'); ?> by <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>. | Make with <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'wordboot' ) ); ?>"><?php echo  __( 'WordPress', 'wordboot' ); ?></a> and <a href="<?php echo esc_url( __( 'https://fkuenzel.de/theme/wordboot/', 'wordboot' ) ); ?>"><?php echo __( "WordBoot ", "wordboot" ) .' '. $GLOBALS['wordboot_version']; ?></a><p>
					</div>
				</div>
			</footer>
			
			<?php wp_footer(); ?>
		</div> <!-- #pageWrapper END -->
		<div id="modalwindows"></div>
	</body>
</html>