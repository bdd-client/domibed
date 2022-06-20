<?php
require_once('custom-widget/my-widget.php');

add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');
function my_theme_enqueue_styles()
{
	$parenthandle = 'parent-style';
	$theme = wp_get_theme();

	wp_enqueue_style(
		$parenthandle,
		get_template_directory_uri() . '/style.css',
		array(),  // if the parent theme code has a dependency, copy it to here
		$theme->parent()->get('Version')
	);

	wp_enqueue_style(
		'style2',
		get_stylesheet_directory_uri() . '/style-2.css',
		'',
		$theme->get('Version') // this only works if you have Version in the style header
	);

	wp_enqueue_style(
		'child-style',
		get_stylesheet_uri(),
		array($parenthandle),
		$theme->get('Version') // this only works if you have Version in the style header
	);

	wp_enqueue_style(
		'bootstrap',
		"https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css",
		array()
	);

	wp_enqueue_style(
		'fontawesome',
		"https://pro.fontawesome.com/releases/v5.10.0/css/all.css",
		array()
	);

	wp_enqueue_style(
		'owl',
		"https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css",
		array()
	);

	wp_enqueue_style(
		'slick',
		"//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css",
		array()
	);

	// wp_enqueue_style( 'j-ui-css', "https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css",
	// 	array()
	// );
}

function my_custom_scripts()
{
	wp_enqueue_script('slick', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js', '', '', true);

	wp_enqueue_script('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', '', '', true);

	// wp_enqueue_script( 'select2-js', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js','',true );

	wp_enqueue_script('custom-js', get_stylesheet_directory_uri() . '/script.js', array('jquery'), '', true);
	wp_enqueue_script('js-2', get_stylesheet_directory_uri() . '/js-2.js', array('jquery'), '', true);
}

function twentyfifteen_child_widgets_init()
{
	register_sidebar(array(
		'name'          => __('Footer 1', 'twentytwentyone-child'),
		'id'            => 'footer-1',
		'description'   => __('Add widgets here to appear in your footer area.', 'twenty-fifteen-child'),
		'before_widget' => '<aside id="%1$s" class="widget widget-footer %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	));

	register_sidebar(array(
		'name'          => __('Footer 2', 'twentytwentyone-child'),
		'id'            => 'footer-2',
		'description'   => __('Add widgets here to appear in your footer area.', 'twenty-fifteen-child'),
		'before_widget' => '<aside id="%1$s" class="widget widget-footer %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	));

	register_sidebar(array(
		'name'          => __('Footer 3', 'twentytwentyone-child'),
		'id'            => 'footer-3',
		'description'   => __('Add widgets here to appear in your footer area.', 'twenty-fifteen-child'),
		'before_widget' => '<aside id="%1$s" class="widget widget-footer %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	));

	register_sidebar(array(
		'name'          => __('Footer 4', 'twentytwentyone-child'),
		'id'            => 'footer-4',
		'description'   => __('Add widgets here to appear in your footer area.', 'twenty-fifteen-child'),
		'before_widget' => '<aside id="%1$s" class="widget widget-footer %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	));

	register_sidebar(array(
		'name'          => __('Footer 5', 'twentytwentyone-child'),
		'id'            => 'footer-5',
		'description'   => __('Add widgets here to appear in your footer area.', 'twenty-fifteen-child'),
		'before_widget' => '<aside id="%1$s" class="widget widget-footer %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	));

	register_sidebar(array(
		'name'          => __('Footer 6', 'twentytwentyone-child'),
		'id'            => 'footer-6',
		'description'   => __('Add widgets here to appear in your footer area.', 'twenty-fifteen-child'),
		'before_widget' => '<aside id="%1$s" class="widget widget-footer %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	));

	register_sidebar(array(
		'name'          => __('Navigation Produk Lainnya', 'twentytwentyone-child'),
		'id'            => 'nav-header-1',
		'description'   => __('Add widgets here to appear in your Jenjang Navigation area.', 'twenty-fifteen-child'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	));
}
add_action('widgets_init', 'twentyfifteen_child_widgets_init');

// change text badge sale
add_filter('woocommerce_sale_flash', 'ds_change_sale_text');
function ds_change_sale_text()
{
	return '<span class="onsale">Sale</span>';
}
// change position discount price dan price
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);

add_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 25);

add_action('custom_product_name_title', 'custom_product_category_title', 6);
function custom_product_category_title()
{
	global $post;
	$terms = get_the_terms($post->ID, 'product_cat');
	$title = '';
	foreach ($terms as $term) {
		$title = $term->name . ' ';
	}
	echo "<span>" . $title . "</span>";
}

// change position in product detail

function getCategory()
{
	global $post;
	$terms = get_the_terms($post->ID, 'product_cat');
	// echo "<pre>";
	// var_dump($terms);
	// echo "</pre>";
	foreach ($terms as $term) {
		$product_cat_name = $term->name;
		break;
	}

	echo "<div class='badge-category'>" . $product_cat_name . "</div>";
}

function description_product()
{
	global $post;

	$product = wc_get_product($post->ID);
	$product_description = $product->get_description();
	// $product_short_description = $product->get_short_description();

	if ($product_description != '') {
		echo '
			<div class="box-product-description">
				<label class="subtitle-detail">Description</label>
				<div class="text-description">' . $product_description . '</div>
			</div>
		';
	}
}

function additional_description()
{
	global $post;

	$product = wc_get_product($post->ID);
	$measurements = $product->get_meta('_bhww_measurements_wysiwyg');
	$materian = $product->get_meta('_bhww_materian_wysiwyg');
	$warranty = $product->get_meta('_bhww_warranty_wysiwyg');

	echo "
	<div class='tabs accordion-additional'>
		<div class='tab'>
			<input type='checkbox' id='chck1'>
			<label class='tab-label' for='chck1'>Measurements & Dimensions</label>
			<div class='tab-content'>" . apply_filters('the_content', $measurements) . "</div>
		</div>
		<div class='tab'>
			<input type='checkbox' id='chck2'>
			<label class='tab-label' for='chck2'>Materian & Construction</label>
			<div class='tab-content'>" . apply_filters('the_content', $materian) . "</div>
		</div>
		<div class='tab'>
			<input type='checkbox' id='chck3'>
			<label class='tab-label' for='chck3'>Warranty & Shipping</label>
			<div class='tab-content'>" . apply_filters('the_content', $warranty) . "</div>
		</div>
	</div>
	";
}

add_action('woocommerce_single_product_summary', 'getCategory', 1);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
add_action('woocommerce_single_product_summary', 'description_product', 51);
add_action('woocommerce_single_product_summary', 'additional_description', 52);

remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
add_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 21);

// end change

// add meta box custom
add_action('add_meta_boxes', 'create_custom_meta_box');
if (!function_exists('create_custom_meta_box')) {
	function create_custom_meta_box()
	{
		add_meta_box(
			'custom_product_meta_box',
			__('Additional Product Information <em>(optional)</em>', 'cmb'),
			'add_custom_content_meta_box',
			'product',
			'normal',
			'default'
		);
	}
}

if (!function_exists('add_custom_content_meta_box')) {
	function add_custom_content_meta_box($post)
	{
		$prefix = '_bhww_'; // global $prefix;

		$measurements = get_post_meta($post->ID, $prefix . 'measurements_wysiwyg', true) ? get_post_meta($post->ID, $prefix . 'measurements_wysiwyg', true) : '';
		$materian = get_post_meta($post->ID, $prefix . 'materian_wysiwyg', true) ? get_post_meta($post->ID, $prefix . 'materian_wysiwyg', true) : '';
		$warranty = get_post_meta($post->ID, $prefix . 'warranty_wysiwyg', true) ? get_post_meta($post->ID, $prefix . 'warranty_wysiwyg', true) : '';
		$img_desktop = get_post_meta($post->ID, $prefix . 'img_desktop_wysiwyg', true) ? get_post_meta($post->ID, $prefix . 'img_desktop_wysiwyg', true) : '';
		$img_mobile = get_post_meta($post->ID, $prefix . 'img_mobile_wysiwyg', true) ? get_post_meta($post->ID, $prefix . 'img_mobile_wysiwyg', true) : '';

		$args['textarea_rows'] = 6;

        echo '<p>'.__( 'Warranty', 'cmb' ).'</p>';
        wp_editor( $warranty, 'warranty_wysiwyg', $args );
        echo "<br><br>";

		echo '<p>' . __('Measurements & Dimensions', 'cmb') . '</p>';
		wp_editor($measurements, 'measurements_wysiwyg', $args);
		echo "<br><br>";

		echo '<p>' . __('Materian & Construction', 'cmb') . '</p>';
		wp_editor($materian, 'materian_wysiwyg', $args);

		echo '<p>' . __('Image desktop (additional)', 'cmb') . '</p>';
		wp_editor($img_desktop, 'img_desktop_wysiwyg', $args);

		echo '<p>' . __('Image mobile (additional)', 'cmb') . '</p>';
		wp_editor($img_mobile, 'img_mobile_wysiwyg', $args);

		echo '<input type="hidden" name="custom_product_field_nonce" value="' . wp_create_nonce() . '">';
	}
}

//Save the data of the Meta field
add_action('save_post', 'save_custom_content_meta_box', 10, 1);
if (!function_exists('save_custom_content_meta_box')) {

	function save_custom_content_meta_box($post_id)
	{
		$prefix = '_bhww_'; // global $prefix;

		// We need to verify this with the proper authorization (security stuff).

		// Check if our nonce is set.
		if (!isset($_POST['custom_product_field_nonce'])) {
			return $post_id;
		}
		$nonce = $_REQUEST['custom_product_field_nonce'];

		//Verify that the nonce is valid.
		if (!wp_verify_nonce($nonce)) {
			return $post_id;
		}

		// If this is an autosave, our form has not been submitted, so we don't want to do anything.
		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
			return $post_id;
		}

		// Check the user's permissions.
		if ('product' == $_POST['post_type']) {
			if (!current_user_can('edit_product', $post_id))
				return $post_id;
		} else {
			if (!current_user_can('edit_post', $post_id))
				return $post_id;
		}

		// Sanitize user input and update the meta field in the database.
		update_post_meta($post_id, $prefix . 'warranty_wysiwyg', wp_kses_post($_POST['warranty_wysiwyg']));
		update_post_meta($post_id, $prefix . 'measurements_wysiwyg', wp_kses_post($_POST['measurements_wysiwyg']));
		update_post_meta($post_id, $prefix . 'materian_wysiwyg', wp_kses_post($_POST['materian_wysiwyg']));
		update_post_meta($post_id, $prefix . 'img_desktop_wysiwyg', wp_kses_post($_POST['img_desktop_wysiwyg']));
		update_post_meta($post_id, $prefix . 'img_mobile_wysiwyg', wp_kses_post($_POST['img_mobile_wysiwyg']));
	}
}

// end meta box


add_action('wp_enqueue_scripts', 'my_custom_scripts');
add_action('woocommerce_register_form_start', 'bbloomer_add_name_woo_account_registration');
add_action('woocommerce_created_customer', 'bbloomer_save_name_fields');
function bbloomer_save_name_fields($customer_id)
{
	if (isset($_POST['billing_first_name'])) {
		update_user_meta($customer_id, 'billing_first_name', sanitize_text_field($_POST['billing_first_name']));
		update_user_meta($customer_id, 'first_name', sanitize_text_field($_POST['billing_first_name']));
	}
	if (isset($_POST['billing_last_name'])) {
		update_user_meta($customer_id, 'billing_last_name', sanitize_text_field($_POST['billing_last_name']));
		update_user_meta($customer_id, 'last_name', sanitize_text_field($_POST['billing_last_name']));
	}
}
