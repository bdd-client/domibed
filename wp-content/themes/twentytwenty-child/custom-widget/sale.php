<?php

namespace Elementor;

class Sale extends Widget_Base
{

    public function get_name()
    {
        return 'Sale';
    }

    public function get_title()
    {
        return 'Sale';
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
        <div class="testimoni-container bg-primary">
            <div class="testimoni-container-inner">
                <div class="testimoni-content ">
                    <div class="testimoni-content-box-content">
                        <div class="testimoni-content-heading"><?php echo $settings['heading']; ?></div>
                        <div class="testimoni-content-description"> <?php echo $settings['Description']; ?></div>
                    </div>
                    <div class="slick-nav-testimonial-carousel">
                        <div class=" prev-testimoni bg-secoundary navigation-testimonial-carousel">
                            <i class="fa fa-chevron-left "></i>
                        </div>
                        <div class="next-testimoni bg-secoundary navigation-testimonial-carousel">
                            <i class="fa fa-chevron-right "></i>
                        </div>
                    </div>
                </div>
                <div class="carouselna-testimoni testimoni-content-items">
                    <?php foreach ($settings['list'] as $key => $value) : ?>
                        <div class="testimonial-box-items">
                            <div class="testimonial-item-testimoni"><?= $value['text-testimoni']; ?></div>
                            <div class="testimonial-item-name"><?= $value['name']; ?> </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
            <script>
                jQuery(document).ready(function() {
                    jQuery(".carouselna-testimoni").slick({
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
