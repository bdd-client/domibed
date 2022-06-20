<?php

namespace Elementor;

class Js_widget extends Widget_Base{
	public function __construct($data = [], $args = null) {
        parent::__construct($data, $args);
        
        wp_register_script( 'script-custom', get_stylesheet_directory_uri().'/custom-widget/my-widget.js', [ 'elementor-frontend' ], '1.0.0', true );
    }
	public function get_name() {
		return 'js-widget';
	}

	public function get_title() {
		return __( 'Js Widget', 'elementor' );
	}

	public function get_icon() {
		return 'eicon-dual-button';
	}

	public function get_keywords() {
		return [ 'button', 'content', 'toggle' ];
	}

	protected function register_controls() {
		// WYSIWYG CONTENT
		$this->start_controls_section(
			'content_settings',
			[
				'label' => __( 'Content', 'elementor' ),
			]
		);

		$this->add_control(
			'widget_content',
			[
				'label' => __( 'Content Box', 'elementor' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( 'Widget Content', 'elementor' ),
				'show_label' => false,
			]
		);

		$this->end_controls_section();

		/*
		 * BUTTON TEXT
		 */
		$this->start_controls_section(
			'button_settings',
			[
				'label' => __( 'Button Settings', 'elementor' ),
			]
		);

		$this->add_control(
			'button_text',
			[
				'label' => __( 'Button Text', 'elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Button Text', 'elementor' ),
			]
		);

		$this->add_responsive_control(
			'button_align',
			[
				'label' => __( 'Button Alignment', 'elementor' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left'    => [
						'title' => __( 'Left', 'elementor' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'elementor' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'elementor' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'left',
				'selectors' => [
					'{{WRAPPER}} .elementor-content-toggle-button-wrapper' => 'text-align: {{VALUE}};'
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

	?>
	<div class="elementor-content-toggle-button-wrapper">
		<a class="elementor-content-toggle-button-btn" href="#"><?php echo $settings['button_text']; ?></a>
		<div class="elementor-content-toggle-button-content-box"><?php echo $settings['widget_content']; ?></div>
	</div>
	<?php
	}
}