<?php

namespace Elementor;

class List_news_and_blogs extends Widget_Base
{

    public function get_name()
    {
        return 'List_news_and_blogs';
    }

    public function get_title()
    {
        return 'List News and Blogs';
    }

    public function get_icon()
    {
        return 'eicon-slider-push';
    }

    public function get_categories()
    {
        return ['basic'];
    }

    protected function _register_controls()
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
                        'name' => 'date',
                        'label' => __('Date', 'elementor'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'placeholder' => __('Title', 'elementor')
                    ],
                    [
                        'name' => 'title_text',
                        'label' => __('Title Text', 'elementor'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'placeholder' => __('Title', 'elementor')
                    ],
                    [
                        'name' => 'textna',
                        'label' => __('Description', 'elementor'),
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
        <div class="list-item-wrapper">
            <?php if ($settings['text'] != NULL) { ?>
                <div class="list-item-text-heading">
                    <?php echo $settings['text']; ?>
                </div>
            <?php } ?>
            <div class="list-item-wrapper-items" data-show_d="1" data-show_m="1">
                <?php foreach ($settings['list'] as $key => $value) : ?>
                    <div class="list-item-wrapper-item-group">
                        <img src="<?= $value['media']['url']; ?>">
                        <p class="list-item-text-date"><?= $value['date']; ?></p>
                        <p class="list-item-text-title"><?= $value['title_text']; ?></p>
                        <p class="list-item-text-description" style="color: <?php echo esc_attr($value['textna_color']); ?>;"><?= $value['textna']; ?></p>
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
