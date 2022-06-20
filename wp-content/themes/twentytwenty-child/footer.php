<?php

/**
 * The template for displaying the footer
 *
 * Contains the opening of the #site-footer div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

?>

<footer id="site-footer" class="header-footer-group footer-menu-custom">
	<div class="footer_wrapper">
		<div id="footer_bottom">
			<div class="footer-inner-menu">
				<div class="container">
					<div class="row footer-custom-row1">
						<div class="col-md-3 col-sm-12 col-xs-12">
							<aside id="stm_text-2" class="widget stm_wp_widget_text">
								<div class="logo-footer">
									<img src="<?=get_site_url();?>/wp-content/uploads/2022/06/domi-white.png" alt="">
								</div>
							</aside>
						</div>
						<div class="col-md-6 col-sm-12 mobile-padding-0">
							<?php
							wp_nav_menu(
								array(
									'theme_location'  => 'footer',
									'menu_class'      => 'menu-footer',
									'container_class' => 'secondary-menu-container',
									'items_wrap'      => '<ul id="secondary-menu-list" class="%2$s">%3$s</ul>',
									'fallback_cb'     => false,
								)
							);
							?>
						</div>
						<div class="col-md-3 col-sm-12 col-xs-12">
							<div class="heading-menu-footer">STAY IN TOUCH</div>
							<form action="" class="subscription-custom">
								<div class="form-group">
									<input type="text" class="input-newsletter" name="email" placeholder="Your email..">
								</div>
								<div class="form-group">
									<button type="submit" name="submit" class="button-primary-custom">
										<div class="box-img-submit"><img src="<?=get_site_url();?>/wp-content/uploads/2022/06/newsletter.png" class="icon-submit-newsletter"></div>Subscribe
									</button>
								</div>
							</form>
							<div class="desc-subs">By submitting this form, you agree to receive recurring automated promotional and personalized marketing text messages (e.g. cart reminders) from Domibed at the cell number used when signing up. Consent is not a condition of any purchase. Reply HELP for help and STOP to cancel. Msg frequency varies. Msg and data rates may apply. View Terms & Privacy.</div>
							<div class="list-sosmed">
								<div class="item-sosmed">
									<a href="" target="_blank">
										<img src="<?=get_site_url();?>/wp-content/uploads/2022/06/Instagram.png" alt="">
									</a>
								</div>
								<div class="item-sosmed">
									<a href="" target="_blank">
										<img src="<?=get_site_url();?>/wp-content/uploads/2022/06/Twitter.png" alt="">
									</a>
								</div>
								<div class="item-sosmed">
									<a href="" target="_blank">
										<img src="<?=get_site_url();?>/wp-content/uploads/2022/06/Linkedin.png" alt="">
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="footer-copyright-custom">
			<div class="container">
				<p class="text-copyright-custom">©<?php echo date("Y"); ?> Domibed All rights reserved.</p>
			</div>
		</div>
	</div>
</footer><!-- #site-footer -->

<script>
	jQuery(document).ready(function() {
		if(window.matchMedia('(max-width: 750px)').matches){
			jQuery('#site-footer .menu-footer').append("<li class='menu-item-has-children sosmed-append'><div class='heading-menu-footer'>FOLLOW US</div></li>");
			jQuery('.sosmed-append').append(jQuery('.list-sosmed'));
		}
	})
</script>

<?php wp_footer(); ?>
<?php
if (is_active_sidebar('footer-1')) : ?>
	<?php dynamic_sidebar('footer-1'); ?>
<?php endif; ?>

</body>

</html>