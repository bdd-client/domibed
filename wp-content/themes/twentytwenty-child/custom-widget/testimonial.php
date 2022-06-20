<?php

namespace Elementor;

class Testimonial extends Widget_Base
{

    public function get_name()
    {
        return 'Testimonial';
    }

    public function get_title()
    {
        return 'Testimonial';
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
            'heading',
            [
                'name' => 'heading',
                'label' => __('Heading', 'elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __('Heading', 'elementor')
            ]
        );
        $this->add_control(
            'Description',
            [
                'name' => 'description',
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
                        'name' => 'name',
                        'label' => __('name', 'elementor'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'placeholder' => __('name', 'elementor')
                    ],
                    [
                        'name' => 'text-testimoni',
                        'label' => __('text testimoni', 'elementor'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'placeholder' => __('testimoni', 'elementor')
                    ],
                ]
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {

        $settings = $this->get_settings_for_display();
?>
        <div class="sale-container">
            <div class="sale-container-inner">
                <div class="sale-content ">
                    <div class="sale-content-box-content">
                        <div class="sale-content-heading">
                            <!-- <?php echo $settings['heading']; ?> -->
                            Save up to <span class="color-primary">50% </span> Now!
                        </div>
                        <div class="sale-content-description"> <?php echo $settings['Description']; ?></div>
                    </div>
                    <div class="carousel-text-box-button">>
                    </div>
                </div>
                <div class="carouselna-sale sale-content-items">
                    <?php foreach ($settings['list'] as $key => $value) : ?>
                        <div class="testimoni-box-items">
                            <img class="testomoni-carousel-content" src="<?= $value['media']['url']; ?>">
                        </div>
                        <!-- <div class="product-carousel-text">
                            <div class="product-carousel-text-name">Domi Topper AIR</div>
                            <div class="product-carousel-text-category">Topper</div>
                            <div class="product-carousel-text-price">Rp.300.000</div>
                        </div> -->
                    <?php endforeach ?>
                </div>
            </div>
            <script>
                jQuery(document).ready(function() {
                    jQuery(".carouselna-sale").slick({
                        autoplay: false,
                        dots: false,
                        slidesToShow: 3,
                        nextArrow: jQuery(".next-testimoni"),
                        prevArrow: jQuery(".prev-testimoni"),
                    });
                })
            </script>
    <?php
    }

    protected function _content_template()
    {
    }
}
