<?php

namespace TRUSTIFY_REVIEWS\WIDGETS;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Typography;
use Elementor\Repeater;
use Elementor\Plugin;

class TABS_CAROUSEL extends Widget_Base {

    public function get_name() {
        return 'trustify-reviews';
    }

    public function get_title() {
        return esc_html__('Tabs and Carousel', 'trustify-reviews');
    }


    public function get_icon() {
        return 'eicon-nerd';
    }

    public function get_categories() {
        return ['trustify-reviews'];
    }

    public function get_keywords() {
        return ['yelp', 'tabs', 'carousel'];
    }


    protected function register_controls() {
        $this->start_controls_section(
            'section_content',
            [
                'label' => esc_html__('Yelp Content', 'trustify-reviews'),
            ]
        );

        $this->add_control(
            'yelp_location',
            [
                'label' => esc_html__('Location', 'trustify-reviews'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('San Francisco, CA', 'trustify-reviews'),
                'placeholder' => esc_html__('San Francisco, CA', 'trustify-reviews'),
            ]
        );


        $this->add_control(
            'yelp_limit',
            [
                'label' => esc_html__('Limit', 'trustify-reviews'),
                'description' => esc_html__('The number of items load per terms. max: 50 default:10', 'trustify-reviews'),
                'type' => Controls_Manager::NUMBER,
                'default' => 10,
                'placeholder' => esc_html__('10', 'trustify-reviews'),
                'separator' => 'after'

            ]
        );
        // $this->add_control(
        //     'yelp_rating',
        //     [
        //         'label'      => __('Rating', 'trustify-reviews'),
        //         'type'       => Controls_Manager::SELECT,
        //         'default'    => '5',
        //         'options'    => [
        //             '5' => __('5 Star', 'trustify-reviews'),
        //             '4.5' => __('4.5 Star', 'trustify-reviews'),
        //             '4' => __('4 Star', 'trustify-reviews'),
        //             '3.5' => __('3.5 Star', 'trustify-reviews'),
        //             '3' => __('3 Star', 'trustify-reviews'),
        //             '2.5' => __('2.5 Star', 'trustify-reviews'),
        //             '2' => __('2 Star', 'trustify-reviews'),
        //             '1.5' => __('1.5 Star', 'trustify-reviews'),
        //             '1' => __('1 Star', 'trustify-reviews'),
        //             'all' => __('All', 'trustify-reviews'),
        //         ],
        //     ]
        // );
        $this->add_control(
            'yelp_sort_by',
            [
                'label'      => __('Sort By', 'trustify-reviews'),
                'type'       => Controls_Manager::SELECT,
                'default'    => 'best_match',
                'options'    => [
                    'best_match' => __('Best Match', 'trustify-reviews'),
                    'rating' => __('Rating', 'trustify-reviews'),
                    'review_count' => __('Review Count', 'trustify-reviews'),
                    'distance' => __('Distance', 'trustify-reviews'),
                ],
            ]
        );
        $repeater = new Repeater();
        $repeater->add_control(
            'yelp_term',
            [
                'label'   => __('Categories/Terms', 'trustify-reviews'),
                'type'    => Controls_Manager::TEXT,
            ]
        );
        $repeater->add_control(
            'menu_icon',
            [
                'label' => __('Icon', 'trustify-reviews'),
                'type' => Controls_Manager::ICONS,
                'label_block' => false,
                'skin' => 'inline',

            ]
        );
        $this->add_control(
            'yelp_terms',
            [
                'label'  => esc_html__('Yelp Listings', 'trustify-reviews'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'yelp_term' => __('restaurants', 'trustify-reviews'),
                        'menu_icon'  => ['value' => 'fas fa-home', 'library' => 'fa-solid'],
                    ],
                    [
                        'yelp_term' => __('bars', 'trustify-reviews'),
                        'menu_icon'  => ['value' => 'fas fa-home', 'library' => 'fa-solid'],
                    ],
                    [
                        'yelp_term' => __('shopping', 'trustify-reviews'),
                        'menu_icon'  => ['value' => 'fas fa-home', 'library' => 'fa-solid'],
                    ],
                    [
                        'yelp_term' => __('coffee', 'trustify-reviews'),
                        'menu_icon'  => ['value' => 'fas fa-home', 'library' => 'fa-solid'],
                    ],
                    [
                        'yelp_term' => __('fitness', 'trustify-reviews'),
                        'menu_icon'  => ['value' => 'fas fa-home', 'library' => 'fa-solid'],
                    ],
                    [
                        'yelp_term' => __('hair', 'trustify-reviews'),
                        'menu_icon'  => ['value' => 'fas fa-shopping-cart', 'library' => 'fa-solid'],
                    ],
                    [
                        'yelp_term' => __('pets', 'trustify-reviews'),
                        'menu_icon'  => ['value' => 'fas fa-user', 'library' => 'fa-solid'],
                    ],
                ],
                'title_field' => '{{{ elementor.helpers.renderIcon( this, menu_icon, {}, "i", "panel" ) || \'<i class="{{ icon }}" aria-hidden="true"></i>\' }}} {{{ yelp_term }}}',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_carousel',
            [
                'label' => esc_html__('API Settings', 'trustify-reviews'),
            ]
        );
        $this->add_control(
            'yelp_api_key',
            [
                'label'       => __('Yelp API key', 'trustify-reviews'),
                'type'        => Controls_Manager::TEXTAREA,
                'rows'        => 3,
                'placeholder' => __('naus-Hoyx6VPJkorSIpms3yQmQ72iwD7vO5BIivoZkzbBMO5CjtSeON-2i_s6cnjG-j79PUBwZXYx', 'trustify-reviews'),
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'section_style',
            [
                'label' => __('Filter Bar', 'trustify-reviews'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'yelp_align',
            [
                'label'         => __('Alignment', 'trustify-reviews'),
                'type'          => Controls_Manager::CHOOSE,
                'options'       => [
                    'left'      => [
                        'title' => __('Left', 'trustify-reviews'),
                        'icon'  => 'fa fa-align-left',
                    ],
                    'center'    => [
                        'title' => __('Center', 'trustify-reviews'),
                        'icon'  => 'fa fa-align-center',
                    ],
                    'right'     => [
                        'title' => __('Right', 'trustify-reviews'),
                        'icon'  => 'fa fa-align-right',
                    ],
                ],
                'default'       => 'left',
                'toggle'        => false,
                'selectors'     => [
                    '{{WRAPPER}} .trustify-reviews .yelp-tabs' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'yelp_tabs_width',
            [
                'label'         => __('Bottom Spacing', 'trustify-reviews'),
                'type'          => Controls_Manager::SLIDER,
                'size_units'    => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .trustify-reviews .yelp-tabs' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->start_controls_tabs(
            'yelp_tabs_style_tabs'
        );
        $this->start_controls_tab(
            'style_tabs_normal',
            [
                'label' => __('Normal', 'trustify-reviews'),
            ]
        );
        $this->add_control(
            'yelp_tabs_color',
            [
                'label' => esc_html__('Color', 'trustify-reviews'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .trustify-reviews .yelp-tabs button' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'yelp_tabs_bg_color',
            [
                'label' => esc_html__('Background Color', 'trustify-reviews'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .trustify-reviews .yelp-tabs button' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'yelp_tabs_padding',
            [
                'label'                 => __('Padding', 'trustify-reviews'),
                'type'                  => Controls_Manager::DIMENSIONS,
                'size_units'            => ['px', '%', 'em'],
                'selectors'             => [
                    '{{WRAPPER}} .trustify-reviews .yelp-tabs button'    => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'yelp_tabs_margin',
            [
                'label'                 => __('Margin', 'trustify-reviews'),
                'type'                  => Controls_Manager::DIMENSIONS,
                'size_units'            => ['px', '%', 'em'],
                'selectors'             => [
                    '{{WRAPPER}} .trustify-reviews .yelp-tabs button'    => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'      => 'yelp_tabs_border',
                'label'     => __('Border', 'trustify-reviews'),
                'selector'  => '{{WRAPPER}} .trustify-reviews .yelp-tabs button',
            ]
        );
        $this->add_control(
            'yelp_tabs_radius',
            [
                'label'                 => __('Border Radius', 'trustify-reviews'),
                'type'                  => Controls_Manager::DIMENSIONS,
                'size_units'            => ['px', '%', 'em'],
                'selectors'             => [
                    '{{WRAPPER}} .trustify-reviews .yelp-tabs button'    => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'style_tabs_hover',
            [
                'label' => __('Hover', 'trustify-reviews'),
            ]
        );
        $this->add_control(
            'yelp_tabs_h_color',
            [
                'label' => esc_html__('Color', 'trustify-reviews'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .trustify-reviews .yelp-tabs button:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'yelp_tabs_h_bg_color',
            [
                'label' => esc_html__('Background Color', 'trustify-reviews'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .trustify-reviews .yelp-tabs button:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'yelp_tabs_h_border_color',
            [
                'label' => esc_html__('Border Color', 'trustify-reviews'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .trustify-reviews .yelp-tabs button:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'style_tabs_active',
            [
                'label' => __('Active', 'trustify-reviews'),
            ]
        );
        $this->add_control(
            'yelp_tabs_active_color',
            [
                'label' => esc_html__('Tabs Active Color', 'trustify-reviews'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .trustify-reviews .yelp-tabs button.active' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'yelp_tabs_active_bg_color',
            [
                'label' => esc_html__('Tabs Active Background Color', 'trustify-reviews'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .trustify-reviews .yelp-tabs button.active' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'yelp_tabs_active_border_color',
            [
                'label' => esc_html__('Border Color', 'trustify-reviews'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .trustify-reviews .yelp-tabs button.active' => 'border-color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
        $this->start_controls_section(
            'section_carousel_style',
            [
                'label' => __('Carousel', 'trustify-reviews'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs(
            'yelp_carousel_tabs_style_tabs'
        );
        $this->start_controls_tab(
            'tabs_style_title_normal',
            [
                'label' => __('Title', 'trustify-reviews'),
            ]

        );
        $this->add_control(
            'yelp_carousel_title_color',
            [
                'label' => esc_html__('Color', 'trustify-reviews'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .trustify-reviews .yelp-tabs-content .yelp-title' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'yelp_carousel_title_bg_color',
            [
                'label' => esc_html__('Background Color', 'trustify-reviews'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .trustify-reviews .yelp-tabs-content .yelp-title' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'yelp_carousel_title_padding',
            [
                'label'                 => __('Padding', 'trustify-reviews'),
                'type'                  => Controls_Manager::DIMENSIONS,
                'size_units'            => ['px', '%', 'em'],
                'selectors'             => [
                    '{{WRAPPER}} .trustify-reviews .yelp-tabs-content .yelp-title'    => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'yelp_carousel_title_margin',
            [
                'label'                 => __('Margin', 'trustify-reviews'),
                'type'                  => Controls_Manager::DIMENSIONS,
                'size_units'            => ['px', '%', 'em'],
                'selectors'             => [
                    '{{WRAPPER}} .trustify-reviews .yelp-tabs-content .yelp-title'    => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'yelp_carousel_title_typography',
                'label'     => __('Typography', 'trustify-reviews'),
                'selector'  => '{{WRAPPER}} .trustify-reviews .yelp-tabs-content .yelp-title',
            ]
        );


        $this->end_controls_tab();
        $this->start_controls_tab(
            'tabs_style_share',
            [
                'label' => __('Share', 'trustify-reviews'),
            ]
        );

        $this->add_control(
            'yelp_carousel_share_color',
            [
                'label' => esc_html__('Color', 'trustify-reviews'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .trustify-reviews .yelp-tabs-content .yelp-social-btn' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'yelp_carousel_share_bg_color',
            [
                'label' => esc_html__('Background Color', 'trustify-reviews'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .trustify-reviews .yelp-tabs-content .yelp-social-btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'yelp_carousel_share_padding',
            [
                'label'                 => __('Padding', 'trustify-reviews'),
                'type'                  => Controls_Manager::DIMENSIONS,
                'size_units'            => ['px', '%', 'em'],
                'selectors'             => [
                    '{{WRAPPER}} .trustify-reviews .yelp-tabs-content .yelp-social-btn'    => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'yelp_carousel_share_margin',
            [
                'label'                 => __('Margin', 'trustify-reviews'),
                'type'                  => Controls_Manager::DIMENSIONS,
                'size_units'            => ['px', '%', 'em'],
                'selectors'             => [
                    '{{WRAPPER}} .trustify-reviews .yelp-tabs-content .yelp-social-btn'    => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'yelp_carousel_share_typography',
                'label'     => __('Typography', 'trustify-reviews'),
                'selector'  => '{{WRAPPER}} .trustify-reviews .yelp-tabs-content .yelp-social-btn',
            ]
        );



        $this->end_controls_tab();
        $this->start_controls_tab(
            'tabs_style_review',
            [
                'label' => __('Review Count', 'trustify-reviews'),
            ]

        );
        $this->add_control(
            'yelp_carousel_review_color',
            [
                'label' => esc_html__('Color', 'trustify-reviews'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .trustify-reviews .yelp-tabs-content .yelp-review-count' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'yelp_carousel_review_bg_color',
            [
                'label' => esc_html__('Background Color', 'trustify-reviews'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .trustify-reviews .yelp-tabs-content .yelp-review-count' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'yelp_carousel_review_padding',
            [
                'label'                 => __('Padding', 'trustify-reviews'),
                'type'                  => Controls_Manager::DIMENSIONS,
                'size_units'            => ['px', '%', 'em'],
                'selectors'             => [
                    '{{WRAPPER}} .trustify-reviews .yelp-tabs-content .yelp-review-count'    => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'yelp_carousel_review_margin',
            [
                'label'                 => __('Margin', 'trustify-reviews'),
                'type'                  => Controls_Manager::DIMENSIONS,
                'size_units'            => ['px', '%', 'em'],
                'selectors'             => [
                    '{{WRAPPER}} .trustify-reviews .yelp-tabs-content .yelp-review-count'    => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'yelp_carousel_review_typography',
                'label'     => __('Typography', 'trustify-reviews'),
                'selector'  => '{{WRAPPER}} .trustify-reviews .yelp-tabs-content .yelp-review-count',
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
        $this->start_controls_section(
            'section_carousel_arrow_style',
            [
                'label' => __('Carousel Arrow', 'trustify-reviews'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs(
            'yelp_carousel_arrow_tabs_style_tabs'
        );

        $this->start_controls_tab(
            'tabs_style_arrow_normal',
            [
                'label' => __('Normal', 'trustify-reviews'),
            ]
        );

        $this->add_control(
            'yelp_carousel_arrow_color',
            [
                'label' => esc_html__('Color', 'trustify-reviews'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .trustify-reviews .slick-arrow::before' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'yelp_carousel_arrow_bg_color',
            [
                'label' => esc_html__('Background Color', 'trustify-reviews'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .trustify-reviews .slick-arrow' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'      => 'yelp_carousel_arrow_border',
                'label'     => __('Border', 'trustify-reviews'),
                'selector'  => '{{WRAPPER}} .trustify-reviews .slick-arrow',
            ]
        );
        $this->add_control(
            'yelp_carousel_arrow_border_radius',
            [
                'label'                 => __('Border Radius', 'trustify-reviews'),
                'type'                  => Controls_Manager::DIMENSIONS,
                'size_units'            => ['px', '%', 'em'],
                'selectors'             => [
                    '{{WRAPPER}} .trustify-reviews .slick-arrow'    => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->start_controls_tab(
            'tabs_style_arrow_hover',
            [
                'label' => __('Hover', 'trustify-reviews'),
            ]
        );

        $this->add_control(
            'yelp_carousel_arrow_h_color',
            [
                'label' => esc_html__('Color', 'trustify-reviews'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .trustify-reviews .slick-arrow:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'yelp_carousel_arrow_h_bg_color',
            [
                'label' => esc_html__('Background Color', 'trustify-reviews'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .trustify-reviews .slick-arrow:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'yelp_carousel_arrow_h_border_color',
            [
                'label' => esc_html__('Border Color', 'trustify-reviews'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .trustify-reviews .slick-arrow::before:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
    }

    public function render() {
        $settings = $this->get_settings_for_display();
        $this->add_render_attribute(
            [
                'yelp-carousel' => [
                    'class'         => 'trustify-reviews',
                    'data-settings' => [
                        wp_json_encode(
                            [
                                'yelpLocation' => $settings['yelp_location'],
                                'yelpLimit' => $settings['yelp_limit'],
                                'initialFilter' => $settings['yelp_terms'][0]['yelp_term'],
                                'yelpApiKey' => $settings['yelp_api_key'],
                                'yelpSortBy' => $settings['yelp_sort_by'],
                            ]
                        ),
                    ],
                ],
            ]
        );

?>
        <div <?php $this->print_render_attribute_string('yelp-carousel'); ?>>
            <div class="yelp-tabs-content"></div>
        </div>
    <?php
    }

}
