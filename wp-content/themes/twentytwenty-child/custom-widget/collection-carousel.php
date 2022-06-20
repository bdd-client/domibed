<?php

namespace Elementor;

class Collection_carousel extends Widget_Base
{

    public function get_name()
    {
        return 'Collection_carousel';
    }

    public function get_title()
    {
        return 'Collection Carousel';
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
                        'name' => 'title',
                        'label' => __('Tttle', 'elementor'),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                        'placeholder' => __('Title', 'elementor')
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
        <div class="collection-carousel-wrapper">
            <div class="slick-carousel collection-carousel-wrapper-inner">
                <?php foreach ($settings['list'] as $key => $value) : ?>
                    <div class="collection-carousel-group-content">
                        <img class="collection-carousel-content" src="<?= $value['media']['url']; ?>">
                        <div class="collection-carousel-content-title"> <?= $value['title']; ?></div>
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
