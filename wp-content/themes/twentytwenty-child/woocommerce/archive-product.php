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
	<?php if (apply_filters('woocommerce_show_page_title', true)) : ?>
		<style>
			.hide-content {
				height: 80px;
				position: relative;
				width: 100%;
				color: transparent;
				margin-bottom: 65px;
			}

			.box-sort-wrapper {
				position: absolute;
				left: 0;
				width: 100%;
				height: 80px;
				border-bottom-width: 1px;
				border-top-width: 1px;
				border-right-width: 0;
				border-left-width: 0;
				border-style: solid;
				border-color: #ECECEC;
				display: flex;
				justify-content: center;
				align-items: center;


			}

			.box-sort-wrapper-inner {
				width: 1440px;
				height: 100%;
				display: flex;
				align-items: center;
			}

			.filter-wrapper {
				background: #F4F4F4;
				font-size: 20px;
				font-family: 'Quicksand', sans-serif !important;
				font-weight: 600;
				width: 130px;
				height: 45px;
				border-width: 0;
				border-radius: 100px;
				position: relative;
				appearance: none;
				color: #130F26;
				margin-right: 10px;
				cursor: pointer;
				display: flex;
				justify-content: space-between;
				align-items: center;
				padding: 0 20px 0 24px;
				z-index: 1;
			}

			.sorting-wrapper {
				background: #F4F4F4;
				font-size: 20px;
				font-family: 'Quicksand', sans-serif !important;
				font-weight: 600;
				width: 140px;
				height: 45px;
				border-width: 0;
				border-radius: 100px;
				position: relative;
				appearance: none;
				color: #130F26;
				margin-right: 10px;
				cursor: pointer;
				display: flex;
				justify-content: space-between;
				align-items: center;
				padding: 0 20px 0 24px;
				z-index: 1;
			}

			.filter-wrapper-icon {
				display: flex;
				left: 24px;
				align-items: center;
				height: 100%;
				position: absolute;
				cursor: pointer;
			}

			select[name="sorting"] {
				background: #F4F4F4;
				font-size: 20px;
				font-family: 'Quicksand', sans-serif !important;
				font-weight: 600;
				padding: 10px 20px;
				border-width: 0;
				border-radius: 100px;
				color: #130F26;
				-webkit-appearance: none;
				-moz-appearance: none;

			}

			.select-wrapper {
				position: relative;
			}

			.select-wrapper::after {
				content: "▼";
				font-size: 1rem;
				top: 6px;
				right: 10px;
				position: absolute;
			}

			.modal-sorting {
				background-color: #fff;
				position: absolute;
				z-index: 2;
				width: 250px;
				height: 100px;
				margin-left: 100px;
				margin-top: 70px;
				border-radius: 10px;
				padding: 10px;
				display: none;
				flex-direction: column;
				box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
			}

			.modal-sorting-items {
				margin-top: 10px;
				font-size: 16px;
				cursor: pointer;
			}

			.modal-filter {
				width: 100%;
				height: 307px;
				position: absolute;
				z-index: 2;
				left: 0;
				margin-top: 70px;
				display: none;
				justify-content: center;
				align-items: center;
				background-color: #fff;
			}

			.modal-filter-inner {
				height: 100%;
				max-width: 1440px;
				width: 100%;
				background-color: #fff;
				padding: 30px 0;
			}

			.modal-filter-items {
				width: 336px;
				height: 183px;
				border: 1px solid #f0f0f0;
				padding: 20px 30px;
			}

			.modal-filter-group {
				display: flex;
				justify-content: space-between;
			}

			.modal-filter-group-button {
				display: flex;
				justify-content: flex-end;
			}

			.modal-filter-title {
				font-weight: 600;
				font-size: 20px;
				font-family: 'Quicksand', sans-serif !important;
				color: #130F26;
				margin-bottom: 17px;
			}

			.modal-filter-group-filter {
				display: flex;
				justify-content: space-between;
				flex-wrap: wrap;
			}

			.radio-button-group {
				display: block;
				position: relative;
				margin-bottom: 12px;
				cursor: pointer;
				font-size: 16px;
				-webkit-user-select: none;
				width: 49%;
				-moz-user-select: none;
				-ms-user-select: none;
				user-select: none;
				padding-left: 25px;

			}

			.radio-button-group-single {
				width: 100% !important;
			}

			.radio-button-group input {
				position: absolute;
				opacity: 0;
				cursor: pointer;
			}

			.checkmark {
				position: absolute;
				top: 3.5px;
				left: 0;
				height: 16px;
				width: 16px;
				background-color: #fff;
				border: 0.1px solid #f0f0f0;
				border-radius: 50%;
			}

			.radio-button-group:hover input~.checkmark {
				background-color: #ccc;
			}

			.radio-button-group input:checked~.checkmark {
				background-color: #33A595;
			}

			.checkmark:after {
				content: "";
				position: absolute;
				display: none;
			}

			.radio-button-group input:checked~.checkmark:after {
				display: block;
			}

			.radio-button-group .checkmark:after {
				top: 4.5px;
				left: 4px;
				width: 6px;
				height: 6px;
				border-radius: 50%;
				background: white;
			}

			.radio-button-color {
				width: 20px;
				height: 20px;
				border-radius: 50%;
				display: flex;
				justify-content: center;
				align-items: center;
				margin-right: 10px;
			}

			.color-gray {
				background-color: gray;
				color: gray;
			}

			.color-orange {
				background-color: orange;
				color: orange;
			}

			.color-green {
				background-color: #33A595;
				color: #33A595;
			}

			.color-black {
				background-color: black;
				color: black;
			}

			.color-blue {
				background-color: #2356A7;
				color: #2356A7;
			}

			.color-white {
				background-color: #EFEFEF;
				color: #EFEFEF;
			}

			.button-filter {
				/* background: linear-gradient(93.47deg, #EC6F66 -32.61%, #F3A183 119.08%); */
				background-color: #33A595;
				width: 167px;
				height: 44px;
				margin-top: 30px;
				cursor: pointer;
				border-radius: 60px;
				display: flex;
				justify-content: space-between;
				align-items: center;
				color: #fff;
				font-size: 14px;
				padding: 0 16px 0 20px;

			}
		</style>
		<h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
		<div class="page-label">
			Lorem ipsum dolor sit amet, consectetur adipiscing elit.
			A eget sapien nisl egestas purus.
		</div>
		<div class="box-sort-wrapper">
			<div class="box-sort-wrapper-inner">
				<div class="filter-wrapper" onclick="onOpenModalFilter()"> <img src="<?= get_site_url(); ?>/wp-content/uploads/2022/06/Group-1-3.png" alt="">Filter</div>
				<div class="sorting-wrapper" onclick="onOpenModalSorting()"> Sort by <img src="<?= get_site_url(); ?>/wp-content/uploads/2022/06/icon-arrow-down.png" alt=""></div>
				<!-- <form class="woocommerce-ordering-custom" method="get">
					<select name="sorting" id="cars" class="select-wrapper">
						<option value="volvo">Sort by</option>
						<option value="volvo">Volvo</option>
						<option value="saab">Saab</option>
						<option value="mercedes">Mercedes</option>
						<option value="audi">Audi</option>
					</select>
				</form> -->
			</div>
		</div>
		<div id="modal-sorting" class="modal-sorting">
			<div class="modal-sorting-items" onclick="goSorting('popularity')">
				Sort by popularity
			</div>
			<div class="modal-sorting-items" onclick="goSorting('popularity')">
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
							$url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];


							foreach ($all_categories as $cat) {
								$name_category =  $cat->name;
								$name_category_lowercase = strtolower($name_category);

								echo "<label class='radio-button-group'>";
								echo $name_category;
								if (str_contains($url, $name_category_lowercase)) {
									echo "<input type='radio' id='category' checked='checked' name='category' value=${name_category}>";
								} else {
									echo "<input type='radio' id='category' name='category' value=${name_category}>";
								}
								echo " <span class='checkmark'></span>";
								echo "</label>";
							}

							?>
						</div>
					</div>
					<div class="modal-filter-items">
						<div class="modal-filter-title">Size</div>
						<div class="modal-filter-group-filter">
							<label class='radio-button-group '>Twin
								<input type='radio' id='size' name='size' value='twin'>
								<span class='checkmark'></span>
							</label>
							<label class='radio-button-group '>Twin XL
								<input type='radio' id='size' name='size' value='twin-xl'>
								<span class='checkmark'></span>
							</label>
							<label class='radio-button-group '>Full
								<input type='radio' id='size' name='size' value='full'>
								<span class='checkmark'></span>
							</label>
							<label class='radio-button-group '>Queen
								<input type='radio' id='size' name='size' value='queen'>
								<span class='checkmark'></span>
							</label>
							<label class='radio-button-group '>King
								<input type='radio' id='size' name='size' value='king'>
								<span class='checkmark'></span>
							</label>
							<label class='radio-button-group '>CAL King
								<input type='radio' id='size' name='size' value='cl-king'>
								<span class='checkmark'></span>
							</label>
						</div>
					</div>
					<div class="modal-filter-items">
						<div class="modal-filter-title">
							Price
						</div>
						<div class="modal-filter-group-filter">
							<label class='radio-button-group radio-button-group-single'>Rp 1.0jt - Rp 2.0jt
								<input type='radio' id='price' name='price' value='1000000,2000000'>
								<span class='checkmark'></span>
							</label>
							<label class='radio-button-group radio-button-group-single'>Rp 2.0jt - Rp 3.0jt
								<input type='radio' id='price' name='price' value='2000000,3000000'>
								<span class='checkmark'></span>
							</label>
							<label class='radio-button-group radio-button-group-single'>Rp 3.0jt - Rp 5.0jt
								<input type='radio' id='price' name='price' value='3000000,5000000'>
								<span class='checkmark'></span>
							</label>
						</div>
					</div>
					<div class="modal-filter-items">
						<div class="modal-filter-title">Color</div>
						<div class="modal-filter-group-filter">
							<label class='radio-button-group '>
								<div style="display: flex;align-items:center;">
									<div class="radio-button-color color-orange">.</div>Orange
								</div>
								<input type='radio' id='color' name='color' value='orange'>
								<span class='checkmark'></span>
							</label>
							<label class='radio-button-group '>
								<div style="display: flex;align-items:center;">
									<div class="radio-button-color color-gray">.</div>gray
								</div>
								<input type='radio' id='color' name='color' value='gray'>
								<span class='checkmark'></span>
							</label>
							<label class='radio-button-group '>
								<div style="display: flex;align-items:center;">
									<div class="radio-button-color color-green">.</div>Green
								</div>
								<input type='radio' id='color' name='color' value='green'>
								<span class='checkmark'></span>
							</label>
							<label class='radio-button-group '>
								<div style="display: flex;align-items:center;">
									<div class="radio-button-color color-black">.</div>Black
								</div>
								<input type='radio' id='color' name='color' value='black'>
								<span class='checkmark'></span>
							</label>
							<label class='radio-button-group '>
								<div style="display: flex;align-items:center;">
									<div class="radio-button-color color-blue">.</div>Blue
								</div>
								<input type='radio' id='color' name='color' value='blue'>
								<span class='checkmark'></span>
							</label>
							<label class='radio-button-group '>
								<div style="display: flex;align-items:center;">
									<div class="radio-button-color color-white">.</div>White
								</div>
								<input type='radio' id='color' name='color' value='white'>
								<span class='checkmark'></span>
							</label>
						</div>
					</div>
				</div>
				<div class="modal-filter-group-button">
					<div class="button-filter" id="button-filter" onclick="onChangeResult()"> Result <i class="fa-solid fa-chevron-right"></i></div>
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
	do_action('woocommerce_archive_description');
	?>
</header>
<?php
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
				document.getElementById("modal-filter").style.display = "flex";
			}

			function onChangeResult() {
				let current_url = window.location.href;
				let new_url = ''
				let filter_url = ''

				//check sorting
				let url_sorting = ''
				if (current_url.includes("orderby")) {
					split_url = current_url.split('orderby')
					split_url = split_url[split_url.length - 1]
					url_sorting = '/?orderby' + split_url
				}



				if (current_url.includes("shop")) {
					filter_url = current_url.split('shop')
					new_url = filter_url[0];
				} else {
					filter_url = current_url.split('product-category')
					new_url = filter_url[0];
				}

				//Filter Category

				let url_category = ''
				let category_selected = null
				if (document.querySelector('input[name="category"]:checked')) {
					category_selected = document.querySelector('input[name="category"]:checked').value.toLowerCase()
					if (category_selected) {
						url_category = `/product-category/${category_selected}`
					} else {
						url_category = ''
					}
				}

				//Filter Category12
				let url_price = ''
				if (document.querySelector('input[name="price"]:checked')) {
					let price_selected = document.querySelector('input[name="price"]:checked').value.toLowerCase();
					let split_price = price_selected.split(',')
					let url_price_before = ''
					if (category_selected) {
						url_price_before = `?min_price=${split_price[0]}&max_price=${split_price[1]}`
					} else {
						url_price_before = `shop?min_price=${split_price[0]}&max_price=${split_price[1]}`
					}

					if (url_price_before) {
						url_price = url_price_before
					} else {
						url_price = ''
					}
				}

				window.location.href = new_url + url_category + url_price + url_sorting




			}

			function onOpenModalSorting() {
				document.getElementById("modal-sorting").style.display = "flex";
			}

			function goSorting(sorting) {
				var current_location = window.location.href;
				let url_sorting = ''
				if (current_location.includes("/?orderby")) {
					split_url = current_location.split('/?orderby')
					split_url = split_url[0]
					url_sorting = split_url
				}


				window.location = url_sorting + `/?orderby=${sorting}`
			}



			document.addEventListener('mouseup', function(e) {
				var container = document.getElementById('modal-filter');
				if (!container.contains(e.target)) {
					document.getElementById("modal-filter").style.display = "none";
				}
			});
			document.addEventListener('mouseup', function(e) {
				var container = document.getElementById('modal-sorting');
				if (!container.contains(e.target)) {
					document.getElementById("modal-sorting").style.display = "none";
				}
			});
		</script>



		<?php
		do_action('woocommerce_after_main_content');

		do_action('woocommerce_sidebar');

		get_footer('shop');
