<?php

namespace Elementor;

class Text_image extends Widget_Base
{

    public function get_name()
    {
        return 'Text_image';
    }

    public function get_title()
    {
        return 'Text Image';
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
            'title',
            [
                'name' => 'title',
                'label' => __('Title', 'elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __('Type heading', 'elementor')
            ]
        );
        $this->add_control(
            'title-color',
            [
                'name' => 'title',
                'label' => __('Title Color', 'elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __('Type heading', 'elementor')
            ]
        );
        $this->add_control(
            'description',
            [
                'name' => 'title',
                'label' => __('Description', 'elementor'),
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
        <div class="text-image-container">
            <div class="text-image-container-inner">
                <div class="text-image-content ">
                    <?php if ($settings['title'] != NULL) { ?>
                        <div class="text-image-content-title">
                            <?php echo $settings['title']; ?> <span class="color-primary"><?php echo $settings['title-color']; ?></span>
                        </div>
                    <?php } ?>
                    <?php if ($settings['description'] != NULL) { ?>
                        <div class="text-image-content-description">
                            <?php echo $settings['description']; ?>
                        </div>
                    <?php } ?>
                </div>
                <div class="text-image-box carouselna-text-image ">
                    <?php foreach ($settings['list'] as $key => $value) : ?>
                        <div class="text-image-content-box">
                            <img class="text-image-content-box-image" src="<?= $value['media']['url']; ?>">
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
        <script>
            jQuery(document).ready(function() {
                jQuery(".carouselna-text-image").slick({
                    autoplay: false,
                    dots: true,
                    slidesToShow: 1,
                    nextArrow: false,
                    prevArrow: false,
                });
            })
        </script>
<?php
    }

    protected function _content_template()
    {
    }
}
