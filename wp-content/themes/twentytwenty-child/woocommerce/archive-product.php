<?php

/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined('ABSPATH') || exit;

get_header('shop');

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action('woocommerce_before_main_content');

?>
<header class="woocommerce-products-header">
	<?php 
    $attr_color = get_terms( array(
	    'taxonomy' => 'pa_color',
	    'hide_empty' => false
	));

	$attr_size = get_terms( array(
	    'taxonomy' => 'pa_size',
	    'hide_empty' => false
	));  

	?>
	<?php if (apply_filters('woocommerce_show_page_title', true)) : ?>
		<h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
		<div class="page-label">
			<?php do_action('woocommerce_archive_description');?>
		</div>
		<div class="box-sort-wrapper container">
			<div class="box-sort-wrapper-inner">
				<div class="filter-wrapper" onclick="onOpenModalFilter()"> <img src="<?= get_site_url(); ?>/wp-content/uploads/2022/06/Group-1-3.png" alt="">Filter</div>
				<div class="sorting-wrapper" onclick="onOpenModalSorting()"> Sort by</div>
			</div>
		</div>
		<div id="modal-sorting" class="modal-sorting">
			<div class="modal-sorting-items" onclick="goSorting('?orderby=popularity')">
				Sort by popularity
			</div>
			<div class="modal-sorting-items" onclick="goSorting('?orderby=popularity')">
				Sort by averagi rating
			</div>
		</div>
		<div id="modal-filter" class="modal-filter">
			<div class="modal-filter-inner">
				<div class="modal-filter-group">
					<div class="modal-filter-items">
						<div class="modal-filter-title">Category</div>
						<div class="modal-filter-group-filter">
							<?php
							$taxonomy     = 'product_cat';
							$orderby      = 'name';
							$show_count   = 0;      // 1 for yes, 0 for no
							$pad_counts   = 0;      // 1 for yes, 0 for no
							$hierarchical = 1;      // 1 for yes, 0 for no  
							$title        = '';
							$empty        = 0;

							$args = array(
								'taxonomy'     => $taxonomy,
								'orderby'      => $orderby,
								'show_count'   => $show_count,
								'pad_counts'   => $pad_counts,
								'hierarchical' => $hierarchical,
								'title_li'     => $title,
								'hide_empty'   => $empty
							);
							$all_categories = get_categories($args);

							foreach ($all_categories as $cat) {
								$name_category =  $cat->name;
								echo "<label class='radio-button-group'>";
								echo $name_category;
								echo "<input type='radio' id='category' name='category' value='".$cat->slug."'>";
								echo " <span class='checkmark'></span>";
								echo "</label>";
							}

							?>
						</div>
					</div>
					<div class="modal-filter-items">
						<div class="modal-filter-title">Size</div>
						<div class="modal-filter-group-filter">
							<?php foreach ($attr_size as $key => $value) { ?>
							<label class='radio-button-group '><?= $value->name ?>
								<input type='radio' id='size' name='size' value='<?= $value->slug ?>'>
								<span class='checkmark'></span>
							</label>
							<?php } ?>
						</div>
					</div>
					<div class="modal-filter-items">
						<div class="modal-filter-title">
							Price
						</div>
						<div class="modal-filter-group-filter">
							<label class='radio-button-group radio-button-group-single'>Rp 1.0jt - Rp 2.0jt
								<input type='radio' id='price' name='price' value='1000000'>
								<span class='checkmark'></span>
							</label>
							<label class='radio-button-group radio-button-group-single'>Rp 2.0jt - Rp 3.0jt
								<input type='radio' id='price' name='price' value='2000000'>
								<span class='checkmark'></span>
							</label>
							<label class='radio-button-group radio-button-group-single'>Rp 3.0jt - Rp 4.0jt
								<input type='radio' id='price' name='price' value='3000000'>
								<span class='checkmark'></span>
							</label>
						</div>
					</div>
					<div class="modal-filter-items">
						<div class="modal-filter-title">Color</div>
						<div class="modal-filter-group-filter">
							<?php foreach ($attr_color as $term) { ?>
							<label class='radio-button-group '>
								<div style="display: flex;align-items:center;">
									<div class="radio-button-color" style="background-color: <?= get_term_meta($term->term_id)["product_attribute_color"][0] ?>">.</div><?=$term->name?>
								</div>
								<input type='radio' id='color' name='color' value="<?=$term->slug?>">
								<span class='checkmark'></span>
							</label>
							<?php } ?>
						</div>
					</div>
				</div>
				<div class="modal-filter-group-button">
					<div class="button-filter" id="button-filter" onclick="onChangeResult()">View Result <i class="fa-solid fa-chevron-right"></i></div>
				</div>
			</div>
		</div>
		<div class="hide-content">.</div>

	<?php endif; ?>

	<?php
	/**
	 * Hook: woocommerce_archive_description.
	 *
	 * @hooked woocommerce_taxonomy_archive_description - 10
	 * @hooked woocommerce_product_archive_description - 10
	 */
	
	?>
</header>
<?php
if (isset($_GET['cat'])) {
	$args = array(
		'post_type' 	=> 'product',
		'category__in'	=> $_GET['cat'],
		'posts_per_page'=> 12,
		'tax_query'		=> array(
	    	array(
		    	'taxonomy' 		=> 'pa_color',
				'terms' 		=> $_GET['color'],
				'field' 		=> 'slug',
				'operator' 		=> 'IN'
			),
			array(
		    	'taxonomy' 		=> 'pa_size',
				'terms' 		=> $_GET['size'],
				'field' 		=> 'slug',
				'operator' 		=> 'IN'
			)
	    )
	);
	$products = new WP_Query( $args );
	echo "<pre>";
	var_dump($products->have_posts());
}else{
	if (woocommerce_product_loop()) {

		/**
		 * Hook: woocommerce_before_shop_loop.
		 *
		 * @hooked woocommerce_output_all_notices - 10
		 * @hooked woocommerce_result_count - 20
		 * @hooked woocommerce_catalog_ordering - 30
		 */
		do_action('woocommerce_before_shop_loop');

		woocommerce_product_loop_start();

		if (wc_get_loop_prop('total')) {
			while (have_posts()) {
				the_post();

				/**
				 * Hook: woocommerce_shop_loop.
				 */
				do_action('woocommerce_shop_loop');

				wc_get_template_part('content', 'product');
			}
		}

		woocommerce_product_loop_end();

		/**
		 * Hook: woocommerce_after_shop_loop.
		 *
		 * @hooked woocommerce_pagination - 10
		 */
		do_action('woocommerce_after_shop_loop');
	} else {
		/**
		 * Hook: woocommerce_no_products_found.
		 *
		 * @hooked wc_no_products_found - 10
		 */
		do_action('woocommerce_no_products_found');
	}
}


/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */


/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
?>
<style>
	.before-footer {
		width: 100%;
		background-color: #F8F8F8;
		position: absolute;
		left: 0;
		padding: 75px 0 120px 0;
		display: flex;
		justify-content: center;
		align-items: center;
		margin-top: -110px;
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
		body {
			background-color: lightblue;
		}

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
<div style="height: 396px; color:transparent;">.</div>
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
	<div>
		<script>
			function onOpenModalFilter() {
				jQuery("#modal-filter" ).slideToggle( "slow");
			}

			function onChangeResult() {
				var cat = '';
				var size = '';
				var price = '';
				var color = '';

				if (document.querySelector('input[name="category"]:checked')) {
					cat = document.querySelector('input[name="category"]:checked').value;
				}
				if (document.querySelector('input[name="size"]:checked')) {
					size = document.querySelector('input[name="size"]:checked').value;
				}
				if (document.querySelector('input[name="price"]:checked')) {
					price = document.querySelector('input[name="price"]:checked').value;
				}
				if (document.querySelector('input[name="color"]:checked')) {
					color = document.querySelector('input[name="color"]:checked').value;
				}
				
				let current_url = window.location.href.split('?')[0];
				let new_url = current_url+'?cat='+cat+'&size='+size+'&price='+price+'&color='+color;
				window.location.href = new_url

			}

			function onOpenModalSorting() {
				jQuery("#modal-sorting" ).slideToggle( "slow");
			}

			function goSorting(sorting) {
				var current_location = window.location.href;
				window.location = current_location + sorting;
			}

		</script>



		<?php
		do_action('woocommerce_after_main_content');

		do_action('woocommerce_sidebar');

		get_footer('shop');
