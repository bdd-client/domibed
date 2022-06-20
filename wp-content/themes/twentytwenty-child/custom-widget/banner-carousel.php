<?php

namespace Elementor;

class Banner_carousel extends Widget_Base
{

    public function get_name()
    {
        return 'Banner_carousel';
    }

    public function get_title()
    {
        return 'Banner Carousel';
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
                'label' => __('Heading', 'elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __('Type heading', 'elementor')
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
                        'name' => 'button_text',
                        'label' => __('Button Text', 'elementor'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'placeholder' => __('Learn more', 'elementor')
                    ],
                    [
                        'name' => 'title_text',
                        'label' => __('Title Text', 'elementor'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'placeholder' => __('Title', 'elementor')
                    ],
                    [
                        'name' => 'textna',
                        'label' => __('Image Text', 'elementor'),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                        'placeholder' => __('Type Image Text', 'elementor')
                    ],
                    [
                        'name' => 'textna_color',
                        'label' => __('Image Text Color', 'elementor'),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .image-text' => 'color: {{VALUE}}',
                        ],
                    ],
                    [
                        'name' => 'link',
                        'label' => __('Link', 'elementor'),
                        'type' => \Elementor\Controls_Manager::URL,
                        'placeholder' => __('http://your-link.com/', 'elementor')
                    ],
                    [
                        'name' => 'link_color',
                        'label' => __('Link Color', 'elementor'),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .btn-carousel' => 'color: {{VALUE}}',
                        ],
                    ],
                    [
                        'name' => 'link_bg',
                        'label' => __('Background Button', 'elementor'),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .btn-carousel' => 'color: {{VALUE}}',
                        ],
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
        <div class="custom-carousel custom-carousel-custom">
            <?php if ($settings['text'] != NULL) { ?>
                <div class="heading-block mb-5">
                    <?php echo $settings['text']; ?>
                </div>
            <?php } ?>

            <!-- <div class="slick-nav">

                <i class="fa-solid fa-chevron-left prev"></i>
                <i class="fa-solid fa-chevron-right next"></i>
            </div> -->
            <div class="slick-nav-banner-carousel">
                <div class=" carouselna-prev bg-secoundary navigation-banner-carousel">
                    <i class="fa fa-chevron-left "></i>
                </div>
                <div class="carouselna-next bg-secoundary navigation-banner-carousel">
                    <i class="fa fa-chevron-right "></i>
                </div>
            </div>
            <div class="carouselna" data-show_d="1" data-show_m="1">
                <?php foreach ($settings['list'] as $key => $value) : ?>
                    <div class="list-carousel">
                        <div class="content-carousel banner-content-carousel bg-primary">
                            <div class="banner-content-carousel-text">
                                <p class="carousel-text-title"><?= $value['title_text']; ?></p>
                                <p class="carousel-text-description" style="color: <?php echo esc_attr($value['textna_color']); ?>;"><?= $value['textna']; ?></p>
                                <?php if ($value['button_text'] != "") { ?>
                                    <div class="carousel-text-box-button">
                                        <a href="<?= $value['link']; ?>">
                                            <div class="carousel-text-button bg-secoundary">
                                                <div class="carousel-text-icon-button"></div>
                                                <?= $value['button_text']; ?>
                                            </div>
                                        </a>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="banner-content-carousel-image">
                                <img src="<?= $value['media']['url']; ?>">
                            </div>

                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
<?php
    }

    protected function _content_template()
    {
    }
}
