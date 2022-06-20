<?php
namespace WB_REV\PRODUCT_CAROUSEL;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
/**
 * Elementor Post Slider Slider Widget.
 *
 * Main widget that create the Post Slider widget
 *
 * @since 1.0.0
*/
class WB_REV_WIDGET extends \Elementor\Widget_Base
{

	/**
	 * Get widget name
	 *
	 * Retrieve the widget name.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'revtes-slider';
	}

	/**
	 * Get widget title
	 *
	 * Retrieve the widget title.
	 *
	 * @since 1.1.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html( 'Testimonial Slider', 'revtes' );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.1.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-products';
	}

	/**
	 * Retrieve the widget category.
	 *
	 * @since 1.1.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_categories() {
		return [ 'web-builder-element' ];
	}

	public function get_style_depends()
    {
        return [
            'font-awesome-5-all',
            'font-awesome-4-shim',
        ];
    }

    public function get_script_depends()
    {
        return [
            'font-awesome-4-shim'
        ];
    }

	/**
	 * Retrieve the widget category.
	 *
	 * @since 1.1.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	protected function _register_controls() {
		$this->start_controls_section(
			'section_title',
			[
				'label' => esc_html( 'Title', 'revtes' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'revtes' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => "Reviews",
			]
		);

		$this->add_control(
			'sub_title',
			[
				'label' => esc_html__( 'Sub Title', 'revtes' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => "What they say",
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'query_configuration',
			[
				'label' => esc_html( 'Query Builder', 'revtes' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'posts_per_page',
			[
				'label' => esc_html__( 'Limit', 'revtes' ),
				'placeholder' => esc_html__( 'Default is 10', 'revtes' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'default' => 10,
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'slider_configuration',
			[
				'label' => esc_html( 'Slider Configurtion', 'revtes' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'slide_to_show',
			[
				'label' => __( 'Slides to Show', 'revtes' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 3,
			]
		);

		$this->add_control(
			'slides_to_scroll',
			[
				'label' => __( 'Slides to Scroll', 'revtes' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 3,
			]
		);

		$this->add_control(
			'display_navigation_arrows',
			[
				'label' => esc_html__( 'Display Navigation Arrows', 'revtes' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'revtes' ),
				'label_off' => esc_html__( 'No', 'revtes' ),
				'return_value' => 'yes',
				'default' => 'yes'
			]
		);

		$this->add_control(
			'display_dots',
			[
				'label' => esc_html__( 'Display Dots', 'revtes' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'revtes' ),
				'label_off' => esc_html__( 'No', 'revtes' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'autoplay',
			[
				'label' => esc_html__( 'AutoPlay', 'revtes' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'revtes' ),
				'label_off' => esc_html__( 'No', 'revtes' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'autoplay_speed',
			[
				'label' => esc_html__( 'AutoPlay Speed', 'revtes' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 1000,
			]
		);

		$this->add_control(
			'pauseOnHover',
			[
				'label' => esc_html__( 'Pause On Hover', 'revtes' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'revtes' ),
				'label_off' => esc_html__( 'No', 'revtes' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'pauseOnDotsHover',
			[
				'label' => esc_html__( 'Pause On Dots Hover', 'revtes' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'revtes' ),
				'label_off' => esc_html__( 'No', 'revtes' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		$this->end_controls_section();


		// Arrow Style
		$this->start_controls_section(
			'nav_arrow_style_section',
			[
				'label' => esc_html( 'Navigation Arrow Style', 'revtes' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);


		$this->start_controls_tabs(
			'nav_arrow_style_tabs'
		);

		$this->start_controls_tab(
			'nav_arrow_normal_tab',
			[
				'label' => __( 'Normal', 'revtes' ),
			]
		);

		$this->add_control(
			'nav_arrow_color',
			[
				'label' => __( 'Color', 'revtes' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpce-arrow' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'nav_arrow_border',
				'label' => __( 'Border', 'plugin-domain' ),
				'selector' => '{{WRAPPER}} .wpce-arrow',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'nav_arrow_background',
				'label' => __( 'Background', 'plugin-domain' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .wpce-arrow',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'nav_arrow_hover_tab',
			[
				'label' => __( 'Hover', 'revtes' ),
			]
		);

		$this->add_control(
			'nav_arrow_hover_color',
			[
				'label' => __( 'Color', 'revtes' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpce-arrow:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'nav_arrow_border_hover',
				'label' => __( 'Border', 'plugin-domain' ),
				'selector' => '{{WRAPPER}} .wpce-arrow:hover',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'nav_arrow_hover_background',
				'label' => __( 'Background', 'plugin-domain' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .wpce-arrow:hover',
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();

		$this->end_controls_section();

		$this->start_controls_section(
			'others_style_section',
			[
				'label' => esc_html( 'Others Style', 'revtes' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'full_content_box_shadow',
				'label' => __( 'Box Shadow', 'plugin-domain' ),
				'selector' => '{{WRAPPER}} .wpce_single_item',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'image_box_shadow',
				'label' => __( 'Image Box Shadow', 'plugin-domain' ),
				'selector' => '{{WRAPPER}} .wpce_thumbnail img',
			]
		);

		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings_for_display();
		$element_id = 'wb_wpce_'.$this->get_id();

		$template_style = $settings['template_style'];
		
		$slide_to_show = isset($settings['slide_to_show']) && $settings['slide_to_show'] ? $settings['slide_to_show'] : 3;
		$slides_to_scroll = isset($settings['slides_to_scroll']) && $settings['slides_to_scroll'] ? $settings['slides_to_scroll'] : 3;

		$arrows = isset($settings['display_navigation_arrows']) && $settings['display_navigation_arrows'] ? $settings['display_navigation_arrows'] : 'no';
		$display_dots = isset($settings['display_dots']) && $settings['display_dots'] ? $settings['display_dots'] : 'no';
		$autoplay = isset($settings['autoplay']) && $settings['autoplay'] ? $settings['autoplay'] : 'no';
		$pauseOnDotsHover = isset($settings['pauseOnDotsHover']) && $settings['pauseOnDotsHover'] ? $settings['pauseOnDotsHover'] : 'no';
		$pauseOnHover = isset($settings['pauseOnHover']) && $settings['pauseOnHover'] ? $settings['pauseOnHover'] : 'no';

		$args = array();

		$args['post_type'] = 'product';
		$args['post_status'] = 'publish';
		$args['status'] = 'approve';
		


		if( isset($settings['posts_per_page']) && intval($settings['posts_per_page']) > 0 ){
			$args['number'] = $settings['posts_per_page'];
		}

		if( isset($settings['posts_per_page']) && intval($settings['posts_per_page']) == -1 ){
			$args['number'] = $settings['posts_per_page'];
		}

		?>

		<div class="row">
			<div class="col-md-3">
				<div class="sub-title">
					<?=$settings['sub_title'] ?>
				</div>
				<div class="title">
					<?=$settings['title'] ?>
				</div>

				

				<div class="arrows">
					<div class="wpce-arrow wb-arrow-prev">
						<i class="fa fa-angle-left"></i>
					</div>
					<div class="wpce-arrow wb-arrow-next">
						<i class="fa fa-angle-right"></i>
					</div>
				</div>
			</div>
			<div class="col-md-9">
		<?php
        echo '<div
        		class="revtes_slider_wrapper revtes_slider_wrapper_'.$template_style.'"
        		id="revtes_slider_wrapper_'.esc_attr($element_id).'"
        		data-slide-to-show="'.$slide_to_show.'"
        		data-slides-to-scroll="'.$slides_to_scroll.'"
        		data-pause-on-dots-hover="'.$pauseOnDotsHover.'"
        		data-pause-on-hover="'.$pauseOnHover.'"
        		data-display-dots="'.$display_dots.'"
        		data-autoplay="'.$autoplay.'"
        		data-autoplay-speed="'.$settings['autoplay_speed'].'"
        		data-arrows="'.$arrows.'"
        	>';
        $comments = get_comments($args);
        
        if( $comments ){
        	$count=0;
			foreach( $comments as $com ){
				$count++;
				$comment = get_comment($com->comment_ID);
				$rating = get_comment_meta($com->comment_ID, 'rating', true);
				$name = $comment->comment_author;
				$content_rating = $comment->comment_content;
		?>
			<div class="comment-carousel">
				<div class="rating">
					<div class="rating-outer" style="--rating: <?=$rating;?>;"></div>
					<div class="rating-bottom"></div>
				</div>

				<div class="content-rating">
					"<?=$content_rating?>"
				</div>

				<div class="author-rating">
					<?=$name?>
				</div>
			</div>
		<?php
			}
		}
		echo "</div>";
		
		
		?>
			</div>
		</div>
		<?php
			//echo apply_filters('wpce_arrow_left_container', $arrow_left_container);
			//echo apply_filters('wpce_arrow_right_container', $arrow_right_container);


	}


}
