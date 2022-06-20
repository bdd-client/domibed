<?php

namespace Elementor;

class Servicena extends Widget_Base
{

    public function get_name()
    {
        return 'Servicena';
    }

    public function get_title()
    {
        return 'Circle section';
    }

    public function get_icon()
    {
        return 'eicon-circle';
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
            'media',
            [
                'name' => 'media',
                'label' => __('Media', 'elementor'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src()
                ]
            ]
        );

        $this->add_control(
            'heading_1',
            [
                'name' => 'heading_1',
                'label' => __('Heading 1', 'elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __('Type heading', 'elementor')
            ]
        );

        $this->add_control(
            'desc_1',
            [
                'name' => 'desc_1',
                'label' => __('Description 1', 'elementor'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Type description', 'elementor')
            ]
        );

        $this->add_control(
            'heading_2',
            [
                'name' => 'heading_2',
                'label' => __('Heading 2', 'elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __('Type heading', 'elementor')
            ]
        );

        $this->add_control(
            'desc_2',
            [
                'name' => 'desc_2',
                'label' => __('Description 2', 'elementor'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Type description', 'elementor')
            ]
        );

        $this->add_control(
            'heading_3',
            [
                'name' => 'heading_3',
                'label' => __('Heading 3', 'elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __('Type heading', 'elementor')
            ]
        );

        $this->add_control(
            'desc_3',
            [
                'name' => 'desc_3',
                'label' => __('Description 3', 'elementor'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Type description', 'elementor')
            ]
        );

        $this->add_control(
            'heading_4',
            [
                'name' => 'heading_4',
                'label' => __('Heading 4', 'elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __('Type heading', 'elementor')
            ]
        );

        $this->add_control(
            'desc_4',
            [
                'name' => 'desc_4',
                'label' => __('Description 4', 'elementor'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Type description', 'elementor')
            ]
        );

        $this->add_control(
            'heading_5',
            [
                'name' => 'heading_5',
                'label' => __('Heading 5', 'elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __('Type heading', 'elementor')
            ]
        );

        $this->add_control(
            'desc_5',
            [
                'name' => 'desc_5',
                'label' => __('Description 5', 'elementor'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Type description', 'elementor')
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {

        $settings = $this->get_settings_for_display();
?>

        <div class="services-custom-widget">

            <!-- <div class="main">
            <div class="navigation-circle">
                <div class="navigation-circle__inner">
                <svg class="navigation-circle-svg navigation-circle-svg--opaque" version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewbox="0 0 320 320" style="enable-background:new 0 0 320 320">
                    <circle cx="160" cy="160" r="158" fill="none" stroke-width="1" stroke="#40B4E5" stroke-linecap="round" stroke-miterlimit="10" style="stroke-dashoffset: 0; stroke-dasharray: none"></circle>
                    <path id="top-sector" style="fill:none;stroke:none" d="M 9,50 A 46,46.5 0 0 1 100.5,50" /> 
                    <text text-anchor="middle">
                        <textPath xlink:href="#top-sector" startOffset="50%" style="font-size: 10px; font-weight:700;">Hello World</textPath>
                    </text>
                </svg>
                
                <ul class="navigation-circle__list">
                    <li class="navigation-circle-list-item"><a class="navigation-circle-list-item__point">
                    <span class="title">tess</span>
                        <div class="navigation-circle-list-item__meta">
                        <h3 class="navigation-circle-list-item__title">Item #1
                        </h3>
                        <h4 class="navigation-circle-list-item__subtitle">It just goes round and round</h4>
                        </div></a>
                    </li>
                    <li class="navigation-circle-list-item"><a class="navigation-circle-list-item__point">
                        <div class="navigation-circle-list-item__meta">
                        <h3 class="navigation-circle-list-item__title">Item #2
                        </h3>
                        <h4 class="navigation-circle-list-item__subtitle">It just goes round and round</h4>
                        </div></a>
                    </li>
                    <li class="navigation-circle-list-item"><a class="navigation-circle-list-item__point">
                        <div class="navigation-circle-list-item__meta">
                        <h3 class="navigation-circle-list-item__title">Item #3
                        </h3>
                        <h4 class="navigation-circle-list-item__subtitle">It just goes round and round</h4>
                        </div></a>
                    </li>
                    <li class="navigation-circle-list-item"><a class="navigation-circle-list-item__point" >
                        <div class="navigation-circle-list-item__meta">
                        <h3 class="navigation-circle-list-item__title">Item #4
                        </h3>
                        <h4 class="navigation-circle-list-item__subtitle">It just goes round and round</h4>
                        </div></a>
                    </li>
                </ul>
                </div>
            </div>
        </div> -->
            <div class="row">
                <div class="servisna-group-content-image">
                    <div class="col-md-8 servisna-group-image">
                        <div class=" circle-svg">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 323.93 323.93" class="servisna-image-circle">
                                <defs>
                                    <style>
                                        .cls-2 {
                                            fill: #fff;
                                        }
                                    </style>
                                </defs>
                                <g id=" Layer_2" data-name="Layer 2">
                                    <g id="Layer_1-2" data-name="Layer 1">
                                        <circle fill="none" stroke="white" stroke-width="4" class="cls-1" cx="161.96" cy="161.96" r="152.69" transform="translate(-67.09 161.96) rotate(-45)" />
                                        <circle fill="transparent" stroke="#3cb4e5" stroke-width="6" class="another-circle" cx="161.96" cy="161.96" r="152.69" transform="translate(-67.09 161.96) rotate(-45)" />

                                        <polygon class="cls-2" points="157.33 18.54 166.6 9.27 157.33 0 157.33 18.54" />
                                        <polygon class="cls-2" points="166.6 305.39 157.33 314.66 166.6 323.93 166.6 305.39" />
                                        <polygon class="cls-2" points="305.39 157.33 314.66 166.6 323.93 157.33 305.39 157.33" />
                                        <polygon class="cls-2" points="18.54 166.6 9.27 157.33 0 166.6 18.54 166.6" />
                                    </g>
                                </g>
                            </svg>
                            <div class="inside-svg">
                                <img src="<?= $settings['media']['url'] ?>" class="servisna-image-inner" />
                            </div>
                            <div class="data-1">
                                <?php echo $settings['heading_1']; ?>
                            </div>
                            <div class="data-2">
                                <?php echo $settings['heading_2']; ?>
                            </div>
                            <div class="data-3">
                                <?php echo $settings['heading_3']; ?>
                            </div>
                            <div class="data-4">
                                <?php echo $settings['heading_4']; ?>
                            </div>
                            <div class="data-5">
                                <?php echo $settings['heading_5']; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 servisna-show-desktop">
                        <div class="detail-data">
                            <div class="detail-1">
                                <div class="title"><?php echo $settings['heading_1']; ?></div>
                                <div class="desc"><?php echo $settings['desc_1']; ?></div>
                            </div>
                            <div class="detail-2">
                                <div class="title"><?php echo $settings['heading_2']; ?></div>
                                <div class="desc"><?php echo $settings['desc_2']; ?></div>
                            </div>
                            <div class="detail-3">
                                <div class="title"><?php echo $settings['heading_3']; ?></div>
                                <div class="desc"><?php echo $settings['desc_3']; ?></div>
                            </div>
                            <div class="detail-4">
                                <div class="title"><?php echo $settings['heading_4']; ?></div>
                                <div class="desc"><?php echo $settings['desc_4']; ?></div>
                            </div>
                            <div class="detail-5">
                                <div class="title"><?php echo $settings['heading_5']; ?></div>
                                <div class="desc"><?php echo $settings['desc_5']; ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 servisna-show-mobile servisna-description-mobile">
                <div class="detail-data">
                    <div class="detail-1">
                        <div class="title"><?php echo $settings['heading_1']; ?></div>
                        <div class="desc"><?php echo $settings['desc_1']; ?></div>
                    </div>
                    <div class="detail-2">
                        <div class="title"><?php echo $settings['heading_2']; ?></div>
                        <div class="desc"><?php echo $settings['desc_2']; ?></div>
                    </div>
                    <div class="detail-3">
                        <div class="title"><?php echo $settings['heading_3']; ?></div>
                        <div class="desc"><?php echo $settings['desc_3']; ?></div>
                    </div>
                    <div class="detail-4">
                        <div class="title"><?php echo $settings['heading_4']; ?></div>
                        <div class="desc"><?php echo $settings['desc_4']; ?></div>
                    </div>
                    <div class="detail-5">
                        <div class="title"><?php echo $settings['heading_5']; ?></div>
                        <div class="desc"><?php echo $settings['desc_5']; ?></div>
                    </div>
                </div>
            </div>



            <script>
                jQuery(".data-1").on({
                    mouseenter: function() {
                        jQuery(this).css({
                            "font-size": "14px",
                            "font-weight": "bold",
                            "transition": "font-size .25s ease-in",

                        });
                        jQuery('.detail-1').css({
                            "visibility": "visible",
                            "opacity": '1',
                            "animation": "slide-up-opacity .5s",
                            "position": "absolute",
                            "top": "15px",
                            "right": "35px"
                        })
                    },
                    mouseleave: function() {
                        jQuery(this).css({
                            "font-size": "10px",
                            "font-weight": "300",
                            "transition": "all .25s ease-out",
                        })
                        jQuery('.detail-1').css({
                            "visibility": "hidden",
                            "opacity": '0',
                            "transition": "display .5s, opacity 1s linear",
                            "animation": "slide-down 1s",
                            "position": "relative",
                            "top": "unset",
                            "right": "unset"
                        })
                    }
                });

                jQuery(".data-2").on({
                    mouseenter: function() {
                        jQuery(this).css({
                            "font-size": "14px",
                            "font-weight": "bold",
                            "transition": "font-size .25s ease-in",
                        })
                        jQuery('.detail-2').css({
                            "visibility": "visible",
                            "opacity": '1',
                            "animation": "slide-up-opacity .5s",
                            "position": "absolute",
                            "top": "15px",
                            "right": "35px"
                        })
                        jQuery('.another-circle').css({
                            "stroke-dasharray": "960",
                            "stroke-dashoffset": "760",
                            "transition": "stroke-dashoffset 1.5s",
                        })
                    },
                    mouseleave: function() {
                        jQuery(this).css({
                            "font-size": "10px",
                            "font-weight": "300",
                            "transition": "font-size .25s ease-in",
                        })
                        jQuery('.detail-2').css({
                            "visibility": "hidden",
                            "opacity": '0',
                            "transition": "display .5s, opacity 1s linear",
                            "animation": "slide-down 1s",
                            "position": "relative",
                            "top": "unset",
                            "right": "unset"
                        })
                        jQuery('.another-circle').css({
                            "stroke-dasharray": "960",
                            "stroke-dashoffset": "1080",
                            "transition": "stroke-dashoffset 1.5s",
                        })
                    }
                });

                jQuery(".data-3").on({
                    mouseenter: function() {
                        jQuery(this).css({
                            "font-size": "14px",
                            "font-weight": "bold",
                            "transition": "font-size .25s ease-in",
                        })
                        jQuery('.detail-3').css({
                            "visibility": "visible",
                            "opacity": '1',
                            "animation": "slide-up-opacity .5s",
                            "position": "absolute",
                            "top": "15px",
                            "right": "35px"
                        })
                        jQuery('.another-circle').css({
                            "stroke-dasharray": "960",
                            "stroke-dashoffset": "560",
                            "transition": "stroke-dashoffset 1.5s",
                        })
                    },
                    mouseleave: function() {
                        jQuery(this).css({
                            "font-size": "10px",
                            "font-weight": "300",
                            "transition": "font-size .25s ease-in",
                        })
                        jQuery('.detail-3').css({
                            "visibility": "hidden",
                            "opacity": '0',
                            "transition": "display .5s, opacity 1s linear",
                            "animation": "slide-down 1s",
                            "position": "relative",
                            "top": "unset",
                            "right": "unset"
                        })
                        jQuery('.another-circle').css({
                            "stroke-dasharray": "960",
                            "stroke-dashoffset": "760",
                            "transition": "stroke-dashoffset 1.5s",
                        })
                    }
                });

                jQuery(".data-4").on({
                    mouseenter: function() {
                        jQuery(this).css({
                            "font-size": "14px",
                            "font-weight": "bold",
                            "transition": "font-size .25s ease-in",
                        })
                        jQuery('.detail-4').css({
                            "visibility": "visible",
                            "opacity": '1',
                            "animation": "slide-up-opacity .5s",
                            "position": "absolute",
                            "top": "15px",
                            "right": "35px"
                        })
                        jQuery('.another-circle').css({
                            "stroke-dasharray": "960",
                            "stroke-dashoffset": "320",
                            "transition": "stroke-dashoffset 1.5s",
                        })
                    },
                    mouseleave: function() {
                        jQuery(this).css({
                            "font-size": "10px",
                            "font-weight": "300",
                            "transition": "font-size .25s ease-in",
                        })
                        jQuery('.detail-4').css({
                            "visibility": "hidden",
                            "opacity": '0',
                            "transition": "display .5s, opacity 1s linear",
                            "animation": "slide-down 1s",
                            "position": "relative",
                            "top": "unset",
                            "right": "unset"
                        })
                        jQuery('.another-circle').css({
                            "stroke-dasharray": "960",
                            "stroke-dashoffset": "560",
                            "transition": "stroke-dashoffset 1.5s",
                        })
                    }
                });

                jQuery(".data-5").on({
                    mouseenter: function() {
                        jQuery(this).css({
                            "font-size": "14px",
                            "font-weight": "bold",
                            "transition": "font-size .25s ease-in",
                        })
                        jQuery('.detail-5').css({
                            "visibility": "visible",
                            "opacity": '1',
                            "animation": "slide-up-opacity .5s",
                            "position": "absolute",
                            "top": "15px",
                            "right": "35px"
                        })
                        jQuery('.another-circle').css({
                            "stroke-dasharray": "960",
                            "stroke-dashoffset": "0",
                            "transition": "stroke-dashoffset 1.5s",
                        })
                    },
                    mouseleave: function() {
                        jQuery(this).css({
                            "font-size": "10px",
                            "font-weight": "300",
                            "transition": "font-size .25s ease-in",
                        })
                        jQuery('.detail-5').css({
                            "visibility": "hidden",
                            "opacity": '0',
                            "transition": "display .5s, opacity 1s linear",
                            "animation": "slide-down 1s",
                            "position": "relative",
                            "top": "unset",
                            "right": "unset"
                        })
                        jQuery('.another-circle').css({
                            "stroke-dasharray": "960",
                            "stroke-dashoffset": "120",
                            "transition": "stroke-dashoffset 1.5s",
                        })
                    }
                });
            </script>
            <!-- <div class="circlena">    
            <?php foreach ($settings['list'] as $key => $value) : ?>
            <div class="arrowna">
                <i class="fa fa-chevron-right"></i>
                <span class="title"><?= $value['title'] ?></span>
            </div>
            <?php endforeach ?>
        </div> -->
        </div>
<?php
    }

    protected function _content_template()
    {
    }
}
