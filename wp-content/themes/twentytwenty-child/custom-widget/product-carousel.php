<?php

namespace Elementor;

class Product_carousel extends Widget_Base
{

    public function get_name()
    {
        return 'product_carousel';
    }

    public function get_title()
    {
        return 'Product Carousel';
    }

    public function get_icon()
    {
        return 'eicon-slider-push';
    }

    public function get_categories()
    {
        return ['basic'];
    }

    protected function register_controls()
    {

        $this->start_controls_section(
            'section_title',
            [
                'label' => __('Content', 'elementor'),
            ]
        );

        $this->add_control(
            'text',
            [
                'name' => 'heading_block',
                'label' => __('Heading (not color)', 'elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __('heading', 'elementor')
            ]
        );
        $this->add_control(
            'text-color',
            [
                'name' => 'heading_block',
                'label' => __('Heading (color)', 'elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __('heading', 'elementor')
            ]
        );
        $this->add_control(
            'name',
            [
                'name' => 'heading_block',
                'label' => __('Name', 'elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __('name', 'elementor')
            ]
        );
        $this->add_control(
            'category',
            [
                'name' => 'heading_block',
                'label' => __('Category', 'elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __('category', 'elementor')
            ]
        );
        $this->add_control(
            'description',
            [
                'name' => 'heading_block',
                'label' => __('Description', 'elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __('Description', 'elementor')
            ]
        );


        $this->add_control(
            'list',
            [
                'label' => __('List', 'elementor'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'media',
                        'label' => __('Media', 'elementor'),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src()
                        ]
                    ],

                    [
                        'name' => 'textna',
                        'label' => __('Image Text', 'elementor'),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                        'placeholder' => __('Type Image Text', 'elementor')
                    ],

                    [
                        'name' => 'link',
                        'label' => __('Link', 'elementor'),
                        'type' => \Elementor\Controls_Manager::URL,
                        'placeholder' => __('http://your-link.com/', 'elementor')
                    ],

                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'content_typography',
                'label' => __('Text Image Font', 'elementor'),
                'selector' => '{{WRAPPER}} .image-text',
                'global' => [
                    'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_TEXT,
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {

        $settings = $this->get_settings_for_display();
?>
        <div class="product-carousel-title"> <?php echo $settings['text']; ?><span class="color-primary"> <?php echo $settings['text-color']; ?></span></div>
        <div class="slick-nav-product-carousel">
            <div class=" prev-product bg-secoundary navigation-product-carousel">
                <i class="fa fa-chevron-left "></i>
            </div>
            <div class="next-product bg-secoundary navigation-product-carousel">
                <i class="fa fa-chevron-right "></i>
            </div>
        </div>

        <div class="product-carousel-wrapper">
            <div class="carouselna-product product-carousel-wrapper-inner">
                <?php foreach ($settings['list'] as $key => $value) : ?>
                    <div class="product-carousel-group-content">
                        <div class="product-carousel-box">
                            <img class="product-carousel-content" src="<?= $value['media']['url']; ?>">
                        </div>
                        <div class="product-carousel-text">
                            <div class="product-carousel-text-name">Domi Topper AIR</div>
                            <div class="product-carousel-text-category">Topper</div>
                            <div class="product-carousel-text-price">Rp.300.000</div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
        <script>
            jQuery(document).ready(function() {
                jQuery(".carouselna-product").slick({
                    autoplay: false,
                    dots: false,
                    slidesToShow: 5,
                    nextArrow: jQuery(".next-product"),
                    prevArrow: jQuery(".prev-product"),
                });
            })
        </script>
<?php
    }

    protected function _content_template()
    {
    }
}
