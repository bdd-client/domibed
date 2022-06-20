<?php
/**
 * Single variation cart button
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

global $product;
?>

<div class="woocommerce-variation-add-to-cart variations_button">
	<?php 
		do_action( 'woocommerce_before_add_to_cart_button' ); 
	
		do_action( 'woocommerce_before_add_to_cart_quantity' );
	?>
	<label for="quantity" class="label-form-variant">Quantity</label>
	<div class="flex-atc">
		<div class="box-qty-custom">
			<div class="img-min-plus img-min" data-type="min">
				<img src="<?=get_site_url();?>/wp-content/uploads/2022/06/Group-930.png" alt="min">
			</div>
			<?php
				woocommerce_quantity_input(
					array(
						'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
						'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
						'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
					)
				);
			?>
			<div class="img-min-plus img-min" data-type="plus">
				<img src="<?=get_site_url();?>/wp-content/uploads/2022/06/Group-929.png" alt="plus">
			</div>
		</div>
		
		<button type="submit" class="custom-style-atc single_add_to_cart_button button alt">
			<div class="box-img-atc"><img src="<?=get_site_url();?>/wp-content/uploads/2022/06/Bag.png" alt=""></div>
			<?php echo esc_html( $product->single_add_to_cart_text() ); ?>
		</button>
	</div>
	
	<?php
		do_action( 'woocommerce_after_add_to_cart_quantity' );
	?>

	<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>

	<input type="hidden" name="add-to-cart" value="<?php echo absint( $product->get_id() ); ?>" />
	<input type="hidden" name="product_id" value="<?php echo absint( $product->get_id() ); ?>" />
	<input type="hidden" name="variation_id" class="variation_id" value="0" />
</div>
