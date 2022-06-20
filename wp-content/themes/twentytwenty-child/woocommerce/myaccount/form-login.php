<?php

/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.1.0
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

do_action('woocommerce_before_customer_login_form'); ?>

<?php if ('yes' === get_option('woocommerce_enable_myaccount_registration')) : ?>
	<style>
		body {
			background: #E5E5E5 !important;
			font-family: 'Quicksand', sans-serif !important;
		}

		.mo-openid-app-icons {

			display: flex;
			position: relative;
			justify-content: flex-start;
			margin-left: -8px !important;
		}

		.mo-openid-app-icons a {
			width: 100% !important;
			margin-left: -30px !important;
			left: 0 !important;
		}

		.section-inner {
			background-color: transparent;
		}

		.login-wrapper {
			width: 100%;
			height: 100%;
			display: flex;
			justify-content: center;
			align-items: center;
		}

		.register-wrapper {
			display: flex;
			width: 100%;
			height: 100%;
			display: normalizer_is_normalized;
			justify-content: center;
			align-items: center;
			z-index: 4;
		}

		.login-wrapper-inner {
			width: 510px;
			height: 650px;
			padding: 30px;
			background-color: #fff;
			border: 1px solid #D7D7D7;
			border-radius: 10px;
			position: absolute;
			margin: 0 30px;
		}

		.register-wrapper-inner {
			width: 510px;
			height: 800px;
			padding: 30px;
			background-color: #fff;
			border: 1px solid #D7D7D7;
			border-radius: 10px;
			position: absolute;
			margin: 0 30px;
			margin-top: 10em;
		}

		.login-title {
			font-family: 'Quicksand';
			font-style: normal;
			font-weight: 700;
			font-size: 36px;
			color: #373737;
		}

		.login-label {
			font-style: normal;
			font-weight: 500;
			font-size: 16px;
			color: #262626;
			opacity: 0.7;
		}

		input[name="firstname"] {
			background: #F4F4F4;
			border-radius: 64px;
			height: 50px;
			width: 100%;
			outline: none;
			border-width: 0;
			margin-top: 10px;
		}

		input[name="email"] {
			background: #F4F4F4;
			border-radius: 64px;
			height: 50px;
			width: 100%;
			outline: none;
			border-width: 0;
			margin-top: 10px;
		}


		input[name="lastname"] {
			background: #F4F4F4;
			border-radius: 64px;
			height: 50px;
			width: 100%;
			outline: none;
			border-width: 0;
			margin-top: 25px;
		}

		input[name="reg-password"] {
			background: #F4F4F4;
			border-radius: 64px;
			height: 50px;
			width: 100%;
			outline: none;
			border-width: 0;
			margin-top: 10px;
		}

		input[name="email-register"] {
			background: #F4F4F4;
			border-radius: 64px;
			height: 50px;
			width: 100%;
			outline: none;
			border-width: 0;
			margin-top: 10px;
		}

		input[name="username"] {
			background: #F4F4F4;
			border-radius: 64px;
			height: 50px;
			width: 100%;
			outline: none;
			border-width: 0;
			margin-top: 50px;
		}

		input[name="username"]:focus {
			outline: none;
			border-width: 0;
		}

		input[name="password"] {
			background: #F4F4F4;
			border-radius: 64px;
			height: 50px;
			width: 100%;
			outline: none;
			border-width: 0;
			margin-top: 20px;
		}

		.content-after-input {
			display: flex;
			justify-content: space-between;
			align-items: center;
			margin-top: 15px;
			font-size: 14px;
			color: #333333;
		}



		.login-btn-box-submit {
			background: linear-gradient(93.47deg, #EC6F66 -32.61%, #F3A183 119.08%) !important;
			background: #F4F4F4;
			border-radius: 64px;
			height: 50px;
			width: 100%;
			outline: none;
			border-width: 0;
			margin-top: 52px;
			text-decoration: none;
			display: flex;
			justify-content: space-between;
			padding: 0 15px 0 4px;
			align-items: center;
			font-weight: 700;
			font-size: 14px;
			text-decoration: none;
		}

		.login-btn-box-submit-google {
			border: 1px solid #D6D6D6;
			background-color: #fff;
			border-radius: 60px;
			height: 50px;
			width: 100%;
			outline: none;
			margin-top: 20px;
			text-decoration: none;
			display: flex;
			justify-content: space-between;
			padding: 0 15px 0 4px;
			align-items: center;
			font-weight: 700;
			font-size: 14px;
			text-decoration: none;
			color: #373737;
		}

		.login-btn-content-left {
			width: 34px;
			height: 34px;
			border-radius: 50%;
			display: flex;
			justify-content: center;
			align-items: center;
			background-color: #fff;

		}



		.login-btn-content-left-google {
			color: #373737;
			width: 34px;
			height: 34px;
			border-radius: 50%;
			display: flex;
			justify-content: center;
			align-items: center;
			background-color: #fff;

		}

		.login-line-box-title {
			width: 100%;
			font-size: 14px;
			margin: 20px 0 21px 0;
			display: flex;
			justify-content: center;

		}

		.login-line-title {
			padding: 5px 20px;
			font-size: 14px;
			background-color: #fff;
			z-index: 1;
		}

		.login-line {
			width: 85%;
			height: 2px;
			border-radius: 0.5px;
			position: absolute;
			margin-top: 14px;
			background-color: #373737;
			color: #fff;

		}

		.login-text-footer {
			display: flex;
			justify-content: center;
			margin-top: 10px;
			font-size: 14px;
			color: #797979;
			font-weight: 600;
		}

		.login-forgot-password {
			text-decoration: none;
			color: #262626;
		}

		input[name="remember-me"] {
			margin-right: 9px;
			margin-top: -1px;
		}

		input[name="remember-me"]:checked {
			background-color: #33A595;
			width: 18px;
			height: 18px;

		}

		input[name="remember-me"]:checked~.checkbox-alias .fa {
			color: #fff;
		}

		.login-box-input-password {
			position: relative;
			width: 100%;
		}

		.login-box-icon-eye {
			position: absolute;
			height: 100%;
			right: 20px;
			display: flex;
			align-items: center;
			z-index: 4;
			top: 3px;
			cursor: pointer;
		}
	</style>

	<div class="login-wrapper" id="login-wrapper">
		<div class="login-wrapper-inner">
			<div class="login-title">Login</div>
			<div class="login-label">Please log in to your account.</div>
			<form class="woocommerce-form woocommerce-form-login login" method="post">
				<input type="text" name="username" id="username" autocomplete="username" value="<?php echo (!empty($_POST['username'])) ? esc_attr(wp_unslash($_POST['username'])) : ''; ?>" /><?php // @codingStandardsIgnoreLine 
																																																?><br>
				<div class="login-box-input-password"><input type="password" name="password" id="password" autocomplete="current-password" />
					<div id="show_password" class="login-box-icon-eye show_password" onclick="onShowPassword()"><img src="<?= get_site_url(); ?>/wp-content/uploads/2022/06/icon-eye.png" alt=""></div>
				</div>
				<div>
					<div class="content-after-input">
						<div style="display: flex;align-items:center;"><input type="checkbox" id="remember-me" name="remember-me" value="remember-me">Remember me</div>
						<a href="<?php echo esc_url(wp_lostpassword_url()); ?>" class="login-forgot-password">Forgot Password</a>
					</div>
					<?php wp_nonce_field('woocommerce-login', 'woocommerce-login-nonce'); ?>
					<button class="login-btn-box-submit" type="submit" class="woocommerce-button button woocommerce-form-login__submit" name="login" value="<?php esc_attr_e('Log in', 'woocommerce'); ?>">
						<div class="login-btn-content-left"><img src="<?= get_site_url(); ?>/wp-content/uploads/2022/06/icon-cart.png" alt=""></div>
						Login
						<img src="<?= get_site_url(); ?>/wp-content/uploads/2022/06/icon-arrow-right-white.png" alt="">
					</button>
					<div class="login-line-box-title">
						<div class="login-line">.</div>
						<div class="login-line-title">or</div>
					</div>
					<?php do_action('woocommerce_login_form_start'); ?>
					<div class="login-text-footer">Don’t have an Account? <span style="margin-left: 2px;font-weight:600; cursor:pointer;" onclick="showRegister()">
							Create Account
						</span></div>
					<?php do_action('woocommerce_login_form_end'); ?>
			</form>
		</div>
	</div>
	<div class="register-wrapper" id="register-wrapper">
		<div class="register-wrapper-inner">
			<div class="login-title">Register</div>
			<div class="login-label">Sign up with us and receive updates on our items and promotions</div>
			<form>
				<?php do_action('woocommerce_register_form_start'); ?>
				<input type="text" name="firstname" id="reg_username" autocomplete="username" placeholder="First Name.." value="<?php echo (!empty($_POST['username'])) ? esc_attr(wp_unslash($_POST['username'])) : ''; ?>" />
				<input type="text" id="lastname" name="lastname" value="" placeholder="Last Name.."><br>
				<input type="text" name="email" id="reg_email" autocomplete="email" placeholder="Input Email.." value="<?php echo (!empty($_POST['email'])) ? esc_attr(wp_unslash($_POST['email'])) : ''; ?>" /><?php // @codingStandardsIgnoreLine 																																																																																																																																																																	
																																																				?><br>
				<input type="text" name="reg-password" id="reg_password" autocomplete="new-password" placeholder="Your Password.." /><br>
				<!-- <div class=" login-box-input-password"><input type="password" id="password" name="password" value="" placeholder="Input Password">
					<div id="show_password" class="login-box-icon-eye show_password" onclick="onShowPassword()"><img src="<?= get_site_url(); ?>/wp-content/uploads/2022/06/icon-eye.png" alt=""></div>
				</div> -->
				<div>
					<div class="content-after-input">
						<div style="display: flex;align-items:center;"><input type="checkbox" id="remember-me" name="remember-me" value="remember-me">I agree to Terms of Use and Privacy Policy</div>
						<div class="login-forgot-password">Forgot Password</div>
					</div>
					<?php wp_nonce_field('woocommerce-register', 'woocommerce-register-nonce'); ?>
					<!-- <button type="submit" class="woocommerce-Button woocommerce-button button woocommerce-form-register__submit" name="register" value="<?php esc_attr_e('Register', 'woocommerce'); ?>"><?php esc_html_e('Register', 'woocommerce'); ?></button> -->
					<button class="login-btn-box-submit" <?php wp_nonce_field('woocommerce-register', 'woocommerce-register-nonce'); ?> <div class="login-btn-content-left"><img src="<?= get_site_url(); ?>/wp-content/uploads/2022/06/icon-cart.png" alt="">
				</div>
				Register
				<img src="<?= get_site_url(); ?>/wp-content/uploads/2022/06/icon-arrow-right-white.png" alt="">
				</button>
				<div class="login-line-box-title">
					<div class="login-line">.</div>
					<div class="login-line-title">or</div>
				</div>
				<?php do_action('woocommerce_login_form_start'); ?>
				<div class="login-text-footer">Already have an Account? <span style="margin-left: 2px;font-weight:600;cursor:pointer;" onclick="hideRegister()">Login here</span></div>

			</form>
		</div>
	</div>
	<script>
		function showRegister() {
			document.getElementById("register-wrapper").style.display = "flex";
		}

		function hideRegister() {
			document.getElementById("register-wrapper").style.display = "none";
		}

		function onShowPassword() {
			var x = document.getElementById("password");
			if (x.type === "password") {
				x.type = "text";
			} else {
				x.type = "password";
			}
		}
	</script>
<?php endif; ?>