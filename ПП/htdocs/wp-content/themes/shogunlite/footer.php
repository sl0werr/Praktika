<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "body-content-wrapper" div and all content after.
 *
 */
?>
			<a href="#" class="scrollup"></a>

			<footer id="footer-main">

				<div id="footer-content-wrapper">

					<div class="clear">
					</div>

				</div><!-- #footer-content-wrapper -->

			</footer>
			<div id="footer-bottom-area">
				<div id="footer-bottom-content-wrapper">
					<div id="copyright">

						<p>
						 	<a href="<?php echo esc_url( 'https://tishonator.com/product/shogunlite' ); ?>"
						 		title="<?php esc_attr_e( 'shogunlite Theme', 'shogunlite' ); ?>">
								<?php esc_html_e('shogunlite Theme', 'shogunlite'); ?>
							</a> 
							<?php
								/* translators: %s: WordPress name */
								printf( __( 'Powered by %s', 'shogunlite' ), 'WordPress' ); ?>
						</p>
						
					</div><!-- #copyright -->
				</div>
			</div><!-- #footer-main -->

		</div><!-- #body-content-wrapper -->
		<?php wp_footer(); ?>
	</body>
</html>