<html class="no-js" <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
	<?php include 'wp-content/themes/twentytwenty-child/style.css' ?>
</style>
<style>
	.section-inner {
		display: flex;
		justify-content: space-between;
		align-items: center;
		height: 82px;
		width: 100%;
		max-width: 1440px;
		padding: 0 50px;
		background-color: #fff;

	}

	.header-items-left {
		display: flex;
		align-items: center;
	}

	.header-items-left-logo {
		margin-right: 20px;
		height: 38px;
		width: 108px;
		display: flex;
		justify-content: center;
		align-items: center;
		font-size: 2em;
		color: #fff;
	}

	.header-items-left-menu {
		display: flex;
		align-items: center;
		list-style-type: none;
		font-size: 14px;
		font-family: 'Quicksand';
		margin-right: 20px;
		cursor: pointer;
		flex-wrap: wrap;
		font-weight: 500;
		color: yellow !important;
	}


	input[name="input-search"] {
		height: 40px;
		width: 302px;
		border-width: 0;
		color: #074ee8;
		padding-left: 30px;
		border-radius: 100px;
		background-color: #F2F2F2;

	}

	.header-items-left-search {
		position: relative;
		display: flex;
		align-items: center;
	}

	.icon-search {
		position: absolute;
		top: 40%;
		margin-left: 10px;
		font-size: 14px;
	}

	.header-items-right {
		display: flex;
		margin-left: 20px;
	}

	.header-items-right-items {
		cursor: pointer;
		margin-right: 37px;
		font-size: 20px;
	}

	.header-items-menu-mobile {
		display: none;
	}

	.mobile-icon-menu {
		font-size: 30px;
		margin-right: 30px;
	}

	.modal-mobile-menu {
		display: none;
		position: fixed;
		width: 100%;
		height: 86%;
		z-index: 10;
		bottom: 0;
		left: 0;
		background-color: #fff;
		padding: 30px 20px;
	}

	.header-custom {
		display: flex;
		justify-content: center;
		width: 100vw;
		position: fixed !important;
		top: 0;
		left: 0;
		height: 82px !important;
		align-items: center;
		z-index: 90;
		background-color: green I !important;
		margin-top: 3em;
		background-color: #fff;
	}

	@media only screen and (max-width: 800px) {
		.header-custom {
			margin-bottom: -6em;
		}

		.mobile-hide {
			display: none !important;
		}

		.header-items-menu-mobile {
			display: block;
		}

		.header-items-left-logo {
			margin-right: 30px;
			height: 30px;
			width: 60px;
		}

		.header-items-left-search {
			height: 30px;
			width: 100%;
		}

		.icon-search {
			top: 43%;
		}

		input[name="input-search"] {
			height: 100%;
			width: 100%;
		}

		.header-items-left-menu {
			padding-top: 30px;
			flex-direction: column;
			margin: 0;
			align-items: flex-start;
		}
	}
</style>


<body <?php body_class(); ?>>
	<?php
	wp_body_open();
	?>
	<header id="site-header" class=" header-custom">
		<div class="header-inner section-inner">
			<div class="header-items-left">
				<div class="header-items-menu-mobile" id="menu-mobile" name="menu-mobile">
					<i class=" fa-solid fa-bars mobile-icon-menu" onclick="onClickMenu()"></i>
				</div>
				<div class="header-items-left-logo">



				</div>
				<!-- <ul class="header-items-left-menu mobile-hide">
					<li>Matresses</li>
					<li>Toppers</li>
					<li>Pillow & Bolster</li>
					<li>Bed Frame</li>
					<li>Bedding</li>
					<li>Bundles</li>
					<li>Blog</li>
				</ul> -->

				<div class="header-items-left-search mobile-hide">
					<input type="text" name="input-search" class="header-items-left-search" placeholder="Search product..." />
					<i class="fa-solid fa-magnifying-glass icon-search"></i>
				</div>
			</div>
			<div class="header-items-right">
				<i class="fa-solid fa-user header-items-right-items "></i>
				<i class="fa-solid fa-heart header-items-right-items"></i>
				<i class="fa-solid fa-bag-shopping header-items-right-items"></i>
			</div>
		</div>
		<!-- .header-inner -->

		<?php
		// Output the search modal (if it is activated in the customizer).
		if (true === $enable_header_search) {
			get_template_part('template-parts/modal-search');
		}
		?>
		<div class="modal-mobile-menu">
			<div class="header-items-left-search">
				<input type="text" name="input-search" class="header-items-left-search" placeholder="Search product..." />
				<i class="fa-solid fa-magnifying-glass icon-search"></i>
			</div>
			<ul class="header-items-left-menu">
				<li>Matresses</li>
				<li>Toppers</li>
				<li>Pillow & Bolster</li>
				<li>Bed Frame</li>
				<li>Bedding</li>
				<li>Bundles</li>
				<li>Blog</li>
			</ul>
		</div>
	</header><!-- #site-header -->

	<script>
		// function onClickMenu() {
		// 	alert('cja');
		// 	$(".modal-mobile-menu").css("display", "flex");
		// }


		// $(function() {
		// 	$("menu-mobile").on('click', function() {
		// 		alert("Success !!!");

		// 	})
		// })
	</script>

	<?php
	// Output the menu modal.
	get_template_part('template-parts/modal-menu');
