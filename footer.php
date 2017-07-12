		
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
			
			
			
				<div class="copyright text-center text-muted">
					<p>Copyright <?php echo date('Y'); ?> by <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo( 'name' ); ?>"><?php bloginfo( 'name' ); ?></a>. | Make with <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'bs4_lang' ) ); ?>" title="<?php echo  __( 'WordPress', 'bs4_lang' ); ?>" rel="external"><?php echo  __( 'WordPress', 'bs4_lang' ); ?></a> and <a href="<?php echo esc_url( __( 'https://github.com/fkuenzel/WordBoot', 'bs4_lang' ) ); ?>" title="<?php echo __( "WordBoot ", "bs4_lang" ) .' '. $GLOBALS['bs4_version']; ?>" rel="external"><?php echo __( "WordBoot ", "bs4_lang" ) .' '. $GLOBALS['bs4_version']; ?></a></p>
				</div>

			</footer>
		</div> <!-- #pageWrapper END -->
		<div id="modalwindows"></div>
		
		<?php wp_footer(); ?>
	</body>
</html>