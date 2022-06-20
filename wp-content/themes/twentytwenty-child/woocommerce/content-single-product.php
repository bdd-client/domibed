<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>

<style>
	.single-product .product {
		margin-top: 200px;
	}
	.before-footer {
		width: 100%;
		background-color: #F8F8F8;
		left: 0;
		padding: 100px 0 100px 0;
		display: flex;
		justify-content: center;
		align-items: center;
	}

	.before-footer-inner {
		position: relative;
		width: 100%;
		max-width: 1440px;
		display: flex;
		justify-content: space-around;
		padding: 0 50px;
		flex-wrap: wrap;
	}

	.before-footer-content {
		display: flex;
		margin: 0 15px;
	}

	.before-footer-content-image {
		height: 80px;
		width: 80px;
		margin-right: 20px;
	}

	.before-footer-desc {
		display: flex;
		flex-direction: column;
		width: 230px;
		justify-content: center;
	}

	.before-footer-desc-title {
		font-style: normal;
		font-weight: 600;
		font-size: 20px;
		line-height: 25px;
		color: #373737;
	}

	.before-footer-desc-label {
		font-style: normal;
		font-weight: 500;
		font-size: 14px;
		line-height: 20px;
		color: #262626;
		opacity: 0.7;
		margin-top: 5px;
	}

	@media only screen and (max-width: 1200px) {

		.before-footer {
			margin-top: -280px;
		}

		.before-footer-inner {
			justify-content: space-between;
		}

		.before-footer-content {
			margin-top: 20px;
		}
	}

	@media only screen and (max-width: 800px) {

		.before-footer {
			height: 328px;
		}

		.before-footer {
			margin-top: -250px;
		}

		.before-footer-content {
			align-items: center;
		}

		.before-footer-inner {
			justify-content: flex-start;
			padding: 0 0;
		}

		.before-footer-desc-title {
			font-size: 16px;
		}

		.before-footer-desc-label {
			font-size: 12px;
			margin-top: 4px;
		}

		.before-footer-desc {
			width: 100%;
			padding-right: 20px;
		}

		.before-footer-content-image {
			height: 44px;
			width: 44px;
			margin-right: 20px;
		}
	}
</style>

<div id="product-<?php the_ID(); ?>" <?php wc_product_class( 'custom-detail-product ', $product ); ?>>
	<div class="container product-up">
		<div class="row">
			<div class="col-md-7 col-sm-12 col-xs-12">
				<div class="product-detail-box style-slick2">
					<?php

						/**
						 * Hook: woocommerce_before_single_product_summary.
						 *
						 * @hooked woocommerce_show_product_sale_flash - 10
						 * @hooked woocommerce_show_product_images - 20
						 */
						// do_action( 'woocommerce_before_single_product_summary' );
						$attachment_ids  = $product->get_gallery_image_ids();
						$image_urls      = array();
						$image_id        = $product->get_image_id();
						if ( $image_id ) {
							$image_url = wp_get_attachment_image_url( $image_id, 'full' );

							$image_urls[ 0 ] = $image_url;
						}

						foreach ( $attachment_ids as $attachment_id ) {
							$image_urls[] = wp_get_attachment_url($attachment_id);
						}
						
						$itemKe = 'full';
						$cekItem = 0;
						foreach ($image_urls as $key => $image_src_url) {
							if($key == 0): continue; endif;
					?>
							<div class="item-product-detail item-<?=$itemKe;?> <?=$itemKe."".$cekItem;?>">
								<img src="<?=$image_src_url;?>" alt="">
							</div>
					<?php
							if($itemKe == 'full' && $cekItem == 0){
								$itemKe = 'half';
								$cekItem = $cekItem + 1;
							}
							else{
								if($itemKe == 'half' && $cekItem == 2){
									$itemKe = 'full';
									$cekItem = 0;
								}
								
								if($cekItem != 0){ $cekItem = $cekItem + 1; }
							}
						}
					?>
				</div>
			</div>
			<div class="col-md-5 col-sm-12 col-xs-12">
				<div class="summary entry-summary">
					<?php
					/**
					 * Hook: woocommerce_single_product_summary.
					 *
					 * @hooked woocommerce_template_single_title - 5
					 * @hooked woocommerce_template_single_rating - 10
					 * @hooked woocommerce_template_single_price - 10
					 * @hooked woocommerce_template_single_excerpt - 20
					 * @hooked woocommerce_template_single_add_to_cart - 30
					 * @hooked woocommerce_template_single_meta - 40
					 * @hooked woocommerce_template_single_sharing - 50
					 * @hooked WC_Structured_Data::generate_product_data() - 60
					 */
					do_action( 'woocommerce_single_product_summary' );
					?>
				</div>
			</div>
		</div>
	</div>

	<div class="before-footer">
		<div class="before-footer-inner">
			<div class="before-footer-content">
				<div class="before-footer-content-image">
					<img src="<?= get_site_url(); ?>/wp-content/uploads/2022/06/Rectangle-85.png" alt="">
				</div>
				<div class="before-footer-desc">
					<div class="before-footer-desc-title">Delivered in a box</div>
					<div class="before-footer-desc-label">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
				</div>
			</div>
			<div class="before-footer-content">
				<div class="before-footer-content-image">
					<img src="<?= get_site_url(); ?>/wp-content/uploads/2022/06/Rectangle-86.png" alt="">
				</div>
				<div class="before-footer-desc">
					<div class="before-footer-desc-title">Free Shipping</div>
					<div class="before-footer-desc-label">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
				</div>
			</div>
			<div class="before-footer-content">
				<div class="before-footer-content-image">
					<img src="<?= get_site_url(); ?>/wp-content/uploads/2022/06/Rectangle-87.png" alt="">
				</div>
				<div class="before-footer-desc">
					<div class="before-footer-desc-title">10-Year Warranty</div>
					<div class="before-footer-desc-label">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
				</div>
			</div>
		</div>
	</div>

	<?php
		$img_desktop = $product->get_meta('_bhww_img_desktop_wysiwyg');
		$img_mobile = $product->get_meta('_bhww_img_mobile_wysiwyg');
		if(!empty($img_desktop)){
	?>
			<div class="img-additional">
				<div class="img-desktop hmc"><?=$img_desktop;?></div>
				<div class="img-mobile hdc"><?=$img_mobile;?></div>
			</div>
	<?php
		}
	?>
	
	<div class="container">
		<?php
			/**
			 * Hook: woocommerce_after_single_product_summary.
			 *
			 * @hooked woocommerce_output_product_data_tabs - 10
			 * @hooked woocommerce_upsell_display - 15
			 * @hooked woocommerce_output_related_products - 20
			 */
			do_action( 'woocommerce_after_single_product_summary' );
		?>
	</div>
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
