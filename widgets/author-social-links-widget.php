<?php
/**
 * Author Social Links Widget
 *
 * Elementor widget to display author social media links
 */

namespace PNNCLE\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

class Author_Social_Links_Widget extends Widget_Base {

    /**
     * Get widget name
     */
    public function get_name() {
        return 'pnncle_author_social_links';
    }

    /**
     * Get widget title
     */
    public function get_title() {
        return __('Author Box Plus', 'pnncle-widget');
    }

    /**
     * Get widget icon
     */
    public function get_icon() {
        return 'eicon-person';
    }

    /**
     * Get widget categories
     */
    public function get_categories() {
        return ['general'];
    }

    /**
     * Get widget keywords
     */
    public function get_keywords() {
        return ['author', 'social', 'links', 'profile', 'bio'];
    }

    /**
     * Register widget controls
     */
    protected function register_controls() {

        // Author Information Section
        $this->start_controls_section(
            'author_info_section',
            [
                'label' => __('Author Information', 'pnncle-widget'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'show_avatar',
            [
                'label' => __('Show Author Image', 'pnncle-widget'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'pnncle-widget'),
                'label_off' => __('No', 'pnncle-widget'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'author_name',
            [
                'label' => __('Author Name Format', 'pnncle-widget'),
                'type' => Controls_Manager::SELECT,
                'default' => 'display_name',
                'options' => [
                    'display_name' => __('Display Name', 'pnncle-widget'),
                    'first_name' => __('First Name', 'pnncle-widget'),
                    'last_name' => __('Last Name', 'pnncle-widget'),
                    'nickname' => __('Nickname', 'pnncle-widget'),
                ],
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'label_before_name',
            [
                'label' => __('Label Before Name', 'pnncle-widget'),
                'type' => Controls_Manager::TEXT,
                'default' => 'About',
                'placeholder' => 'About',
                'description' => __('This label will be displayed before the author name (e.g., "About John Doe")', 'pnncle-widget'),
            ]
        );

        $this->add_control(
            'name_html_tag',
            [
                'label' => __('Name HTML Tag', 'pnncle-widget'),
                'type' => Controls_Manager::SELECT,
                'default' => 'h4',
                'options' => [
                    'h1' => 'H1',
                    'h2' => 'H2',
                    'h3' => 'H3',
                    'h4' => 'H4',
                    'h5' => 'H5',
                    'h6' => 'H6',
                    'div' => 'DIV',
                    'span' => 'SPAN',
                    'p' => 'P',
                ],
                'description' => __('Choose the HTML tag for the author name. H1-H6 are semantic headings, while DIV, SPAN, and P are generic containers.', 'pnncle-widget'),
            ]
        );

        $this->add_control(
            'show_bio',
            [
                'label' => __('Show Bio', 'pnncle-widget'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'pnncle-widget'),
                'label_off' => __('No', 'pnncle-widget'),
                'return_value' => 'yes',
                'default' => 'yes',
                'separator' => 'before',
            ]
        );

        $this->end_controls_section();

        // Social Links Section
        $this->start_controls_section(
            'social_links_section',
            [
                'label' => __('Social Links', 'pnncle-widget'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'label_above_social',
            [
                'label' => __('Label Above Social Links', 'pnncle-widget'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Find them on',
                'placeholder' => 'Find them on',
            ]
        );

        $this->add_control(
            'social_label_html_tag',
            [
                'label' => __('Social Label HTML Tag', 'pnncle-widget'),
                'type' => Controls_Manager::SELECT,
                'default' => 'h4',
                'options' => [
                    'h2' => 'H2',
                    'h3' => 'H3',
                    'h4' => 'H4',
                    'h5' => 'H5',
                    'h6' => 'H6',
                    'div' => 'DIV',
                    'span' => 'SPAN',
                    'p' => 'P',
                ],
                'description' => __('Choose the HTML tag for the social label. H2-H6 are semantic headings, while DIV, SPAN, and P are generic containers.', 'pnncle-widget'),
            ]
        );

        $this->add_control(
            'layout',
            [
                'label' => __('Layout', 'pnncle-widget'),
                'type' => Controls_Manager::SELECT,
                'default' => 'horizontal',
                'options' => [
                    'horizontal' => __('Horizontal', 'pnncle-widget'),
                    'vertical' => __('Vertical', 'pnncle-widget'),
                ],
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'icon_style',
            [
                'label' => __('Icon Style', 'pnncle-widget'),
                'type' => Controls_Manager::SELECT,
                'default' => 'icon',
                'options' => [
                    'icon' => __('Icon Only', 'pnncle-widget'),
                    'text' => __('Text Only', 'pnncle-widget'),
                    'both' => __('Icon + Text', 'pnncle-widget'),
                ],
            ]
        );

        $this->add_control(
            'link_target',
            [
                'label' => __('Link Target', 'pnncle-widget'),
                'type' => Controls_Manager::SELECT,
                'default' => '_blank',
                'options' => [
                    '_self' => __('Same Window', 'pnncle-widget'),
                    '_blank' => __('New Window', 'pnncle-widget'),
                ],
            ]
        );

        $this->end_controls_section();

        // Style Section - Author Name (Label + Name)
        $this->start_controls_section(
            'style_name_section',
            [
                'label' => __('Author Name', 'pnncle-widget'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'name_color',
            [
                'label' => __('Name Color', 'pnncle-widget'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pnncle-author-name' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'name_typography',
                'selector' => '{{WRAPPER}} .pnncle-author-name',
            ]
        );

        $this->add_responsive_control(
            'name_spacing',
            [
                'label' => __('Space Between', 'pnncle-widget'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'em'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 50,
                        'step' => 1,
                    ],
                    'em' => [
                        'min' => 0,
                        'max' => 3,
                        'step' => 0.1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 8,
                ],
                'selectors' => [
                    '{{WRAPPER}} .pnncle-author-name' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
                'description' => __('Controls the space between the author name and bio.', 'pnncle-widget'),
            ]
        );



        $this->end_controls_section();

        // Style Section - Author Image
        $this->start_controls_section(
            'style_image_section',
            [
                'label' => __('Author Image', 'pnncle-widget'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'show_avatar' => 'yes',
                ],
            ]
        );

        $this->add_responsive_control(
            'avatar_size',
            [
                'label' => __('Image Size', 'pnncle-widget'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 40,
                        'max' => 300,
                        'step' => 5,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 100,
                ],
                'tablet_default' => [
                    'unit' => 'px',
                    'size' => 100,
                ],
                'mobile_default' => [
                    'unit' => 'px',
                    'size' => 100,
                ],
                'selectors' => [
                    '{{WRAPPER}} .pnncle-author-avatar img' => 'width: {{SIZE}}{{UNIT}}; max-width: {{SIZE}}{{UNIT}}; height: auto;',
                ],
            ]
        );

        $this->add_control(
            'image_shape',
            [
                'label' => __('Image Shape', 'pnncle-widget'),
                'type' => Controls_Manager::SELECT,
                'default' => 'square',
                'options' => [
                    'square' => __('Square', 'pnncle-widget'),
                    'circle' => __('Circle', 'pnncle-widget'),
                    'rounded' => __('Rounded', 'pnncle-widget'),
                    'custom' => __('Custom', 'pnncle-widget'),
                ],
                'description' => __('Choose the shape of the author image.', 'pnncle-widget'),
            ]
        );

        $this->add_responsive_control(
            'image_border_radius',
            [
                'label' => __('Border Radius', 'pnncle-widget'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .pnncle-author-avatar img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'image_shape' => ['rounded', 'custom'],
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'image_border',
                'selector' => '{{WRAPPER}} .pnncle-author-avatar img',
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'image_box_shadow',
                'selector' => '{{WRAPPER}} .pnncle-author-avatar img',
            ]
        );

        $this->add_responsive_control(
            'image_gap',
            [
                'label' => __('Space Between', 'pnncle-widget'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                    'em' => [
                        'min' => 0,
                        'max' => 5,
                        'step' => 0.1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 20,
                ],
                'selectors' => [
                    '{{WRAPPER}} .pnncle-author-info' => 'gap: {{SIZE}}{{UNIT}};',
                ],
                'description' => __('Controls the space between the author image and the content column.', 'pnncle-widget'),
            ]
        );

        $this->add_responsive_control(
            'image_vertical_align',
            [
                'label' => __('Vertical Alignment', 'pnncle-widget'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'flex-start' => [
                        'title' => __('Top', 'pnncle-widget'),
                        'icon' => 'eicon-v-align-top',
                    ],
                    'center' => [
                        'title' => __('Middle', 'pnncle-widget'),
                        'icon' => 'eicon-v-align-middle',
                    ],
                    'flex-end' => [
                        'title' => __('Bottom', 'pnncle-widget'),
                        'icon' => 'eicon-v-align-bottom',
                    ],
                ],
                'default' => 'flex-start',
                'selectors' => [
                    '{{WRAPPER}} .pnncle-author-info' => 'align-items: {{VALUE}};',
                ],
                'description' => __('Align the image vertically relative to the content.', 'pnncle-widget'),
            ]
        );

        $this->end_controls_section();

        // Style Section - Bio
        $this->start_controls_section(
            'style_bio_section',
            [
                'label' => __('Bio', 'pnncle-widget'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'show_bio' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'bio_color',
            [
                'label' => __('Text Color', 'pnncle-widget'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pnncle-author-bio' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'bio_typography',
                'selector' => '{{WRAPPER}} .pnncle-author-bio',
            ]
        );

        $this->add_responsive_control(
            'bio_padding',
            [
                'label' => __('Padding', 'pnncle-widget'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .pnncle-author-bio' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Style Section - Social (Label + Icons)
        $this->start_controls_section(
            'style_social_section',
            [
                'label' => __('Social Links', 'pnncle-widget'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        // Social Label Styling
        $this->add_control(
            'social_label_heading',
            [
                'label' => __('Social Label', 'pnncle-widget'),
                'type' => Controls_Manager::HEADING,
            ]
        );

        $this->add_control(
            'social_label_color',
            [
                'label' => __('Label Color', 'pnncle-widget'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pnncle-label-above-social' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'social_label_typography',
                'selector' => '{{WRAPPER}} .pnncle-label-above-social',
            ]
        );

        $this->add_responsive_control(
            'social_label_spacing',
            [
                'label' => __('Space Between', 'pnncle-widget'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'em'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 50,
                        'step' => 1,
                    ],
                    'em' => [
                        'min' => 0,
                        'max' => 3,
                        'step' => 0.1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 10,
                ],
                'selectors' => [
                    '{{WRAPPER}} .pnncle-label-above-social' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // Social Icons Styling
        $this->add_control(
            'social_icons_heading',
            [
                'label' => __('Social Icons', 'pnncle-widget'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'icon_size',
            [
                'label' => __('Icon Size', 'pnncle-widget'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'em'],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                    'em' => [
                        'min' => 0.5,
                        'max' => 5,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 20,
                ],
                'selectors' => [
                    '{{WRAPPER}} .pnncle-social-link i' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .pnncle-social-link svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'link_spacing',
            [
                'label' => __('Spacing', 'pnncle-widget'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'em'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 50,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 10,
                ],
                'selectors' => [
                    '{{WRAPPER}} .pnncle-social-links.horizontal .pnncle-social-link' => 'margin-right: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .pnncle-social-links.vertical .pnncle-social-link' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'link_padding',
            [
                'label' => __('Padding', 'pnncle-widget'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .pnncle-social-link' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->start_controls_tabs('link_style_tabs');

        $this->start_controls_tab(
            'link_style_normal',
            [
                'label' => __('Normal', 'pnncle-widget'),
            ]
        );

        $this->add_control(
            'link_color',
            [
                'label' => __('Color', 'pnncle-widget'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pnncle-social-link' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'link_bg_color',
            [
                'label' => __('Background Color', 'pnncle-widget'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pnncle-social-link' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'link_style_hover',
            [
                'label' => __('Hover', 'pnncle-widget'),
            ]
        );

        $this->add_control(
            'link_color_hover',
            [
                'label' => __('Color', 'pnncle-widget'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pnncle-social-link:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'link_bg_color_hover',
            [
                'label' => __('Background Color', 'pnncle-widget'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pnncle-social-link:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'link_border',
                'selector' => '{{WRAPPER}} .pnncle-social-link',
            ]
        );

        $this->add_control(
            'link_border_radius',
            [
                'label' => __('Border Radius', 'pnncle-widget'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .pnncle-social-link' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'link_box_shadow',
                'selector' => '{{WRAPPER}} .pnncle-social-link',
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Render widget output on the frontend
     */
    protected function render() {
        $settings = $this->get_settings_for_display();

        // Get the current post author
        global $post;
        if (!$post || !isset($post->post_author)) {
            return;
        }

        $author_id = absint($post->post_author);
        if (!$author_id || $author_id <= 0) {
            return;
        }

        // Get author data and verify user exists
        $author = get_userdata($author_id);
        if (!$author || !$author->exists()) {
            return;
        }

        // Get social media links
        $social_links = $this->get_author_social_links($author_id);

        // If no social links, show message or nothing
        if (empty($social_links)) {
            if (current_user_can('edit_posts')) {
                echo '<p class="pnncle-no-links">' . esc_html__('No social media links found for this author. Add them in the user profile.', 'pnncle-widget') . '</p>';
            }
            return;
        }

        // Get author name based on setting
        $author_name = '';
        switch ($settings['author_name']) {
            case 'first_name':
                $author_name = get_the_author_meta('first_name', $author_id);
                break;
            case 'last_name':
                $author_name = get_the_author_meta('last_name', $author_id);
                break;
            case 'nickname':
                $author_name = get_the_author_meta('nickname', $author_id);
                break;
            default:
                $author_name = get_the_author_meta('display_name', $author_id);
        }

        // Get custom author image or fallback to avatar
        $author_image_html = '';
        $custom_image_id = get_user_meta($author_id, 'pnncle_author_image', true);
        
        // Get avatar size - use desktop size for image generation, CSS handles responsive sizing
        $avatar_size = 100; // Default
        if (isset($settings['avatar_size']['size']) && is_numeric($settings['avatar_size']['size'])) {
            $avatar_size = absint($settings['avatar_size']['size']);
        } elseif (isset($settings['avatar_size']) && is_array($settings['avatar_size']) && isset($settings['avatar_size']['size'])) {
            $avatar_size = absint($settings['avatar_size']['size']);
        }
        
        if ($custom_image_id && $settings['show_avatar'] === 'yes') {
            // Use wp_get_attachment_image for proper image handling
            // Size is handled by Elementor CSS via responsive control selectors
            $author_image_html = wp_get_attachment_image(
                $custom_image_id,
                [$avatar_size, $avatar_size],
                false,
                [
                    'alt' => esc_attr($author_name),
                ]
            );
        } elseif ($settings['show_avatar'] === 'yes') {
            $author_image_html = get_avatar($author_id, $avatar_size);
        }

        // Process label - will be concatenated with author name
        // Sanitize label text to prevent XSS
        $label_before_name = isset($settings['label_before_name']) ? sanitize_text_field(trim($settings['label_before_name'])) : 'About';
        
        $label_above_social = isset($settings['label_above_social']) ? sanitize_text_field($settings['label_above_social']) : 'Find them on';
        
        // Get HTML tags with strict validation (whitelist approach)
        $name_html_tag = isset($settings['name_html_tag']) ? sanitize_key($settings['name_html_tag']) : 'h4';
        $allowed_name_tags = ['h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'div', 'span', 'p'];
        if (!in_array($name_html_tag, $allowed_name_tags, true)) {
            $name_html_tag = 'h4';
        }
        
        $social_label_html_tag = isset($settings['social_label_html_tag']) ? sanitize_key($settings['social_label_html_tag']) : 'h4';
        $allowed_social_tags = ['h2', 'h3', 'h4', 'h5', 'h6', 'div', 'span', 'p'];
        if (!in_array($social_label_html_tag, $allowed_social_tags, true)) {
            $social_label_html_tag = 'h4';
        }
        
        $layout_class = ($settings['layout'] === 'vertical') ? 'vertical' : 'horizontal';
        $icon_style = isset($settings['icon_style']) ? sanitize_text_field($settings['icon_style']) : 'icon';
        $link_target = isset($settings['link_target']) && in_array($settings['link_target'], ['_self', '_blank'], true) 
            ? $settings['link_target'] 
            : '_blank';
        
        // Get image shape
        $image_shape = isset($settings['image_shape']) ? sanitize_text_field($settings['image_shape']) : 'square';
        $allowed_shapes = ['square', 'circle', 'rounded', 'custom'];
        if (!in_array($image_shape, $allowed_shapes, true)) {
            $image_shape = 'square';
        }
        $image_shape_class = 'pnncle-image-shape-' . $image_shape;

        // Concatenate label with author name as a single string
        $display_name = '';
        if ($author_name) {
            if ($label_before_name) {
                $display_name = esc_html($label_before_name . ' ' . $author_name);
            } else {
                $display_name = esc_html($author_name);
            }
        }

        ?>
        <div class="pnncle-author-social-widget">
            <div class="pnncle-author-info">
                <?php if ($settings['show_avatar'] === 'yes' && $author_image_html): ?>
                    <div class="pnncle-author-avatar <?php echo esc_attr($image_shape_class); ?>">
                        <?php echo wp_kses_post($author_image_html); ?>
                    </div>
                <?php endif; ?>
                <div class="pnncle-author-details">
                    <?php if ($display_name): ?>
                        <?php echo '<' . esc_attr($name_html_tag) . ' class="pnncle-author-name">' . $display_name . '</' . esc_attr($name_html_tag) . '>'; ?>
                    <?php endif; ?>
                    <?php if ($settings['show_bio'] === 'yes'): ?>
                        <div class="pnncle-author-bio">
                            <?php echo wp_kses_post(get_the_author_meta('description', $author_id)); ?>
                        </div>
                    <?php endif; ?>
                    
                    <?php if (!empty($social_links)): ?>
                        <?php if ($label_above_social): ?>
                            <?php echo '<' . esc_attr($social_label_html_tag) . ' class="pnncle-label-above-social">'; ?>
                                <?php echo esc_html($label_above_social); ?>
                            <?php echo '</' . esc_attr($social_label_html_tag) . '>'; ?>
                        <?php endif; ?>
                        <div class="pnncle-social-links <?php echo esc_attr($layout_class); ?>">
                            <?php foreach ($social_links as $platform => $url): ?>
                                <?php if ($url): ?>
                                    <a href="<?php echo esc_url($url); ?>" 
                                       target="<?php echo esc_attr($link_target); ?>" 
                                       rel="noopener noreferrer"
                                       class="pnncle-social-link pnncle-social-<?php echo esc_attr($platform); ?>"
                                       aria-label="<?php echo esc_attr(ucfirst($platform)); ?>">
                                        <?php if ($icon_style === 'icon' || $icon_style === 'both'): ?>
                                            <?php echo wp_kses($this->get_social_icon($platform), [
                                                'svg' => [
                                                    'xmlns' => [],
                                                    'viewbox' => [],
                                                    'fill' => [],
                                                    'width' => [],
                                                    'height' => [],
                                                ],
                                                'path' => [
                                                    'd' => [],
                                                ],
                                            ]); ?>
                                        <?php endif; ?>
                                        <?php if ($icon_style === 'text' || $icon_style === 'both'): ?>
                                            <span class="pnncle-social-text"><?php echo esc_html(ucfirst($platform)); ?></span>
                                        <?php endif; ?>
                                    </a>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php
    }

    /**
     * Get author social links
     */
    private function get_author_social_links($author_id) {
        $links = [];
        $platforms = [
            'twitter' => 'twitter',
            'facebook' => 'facebook',
            'instagram' => 'instagram',
            'threads' => 'threads',
            'linkedin' => 'linkedin',
            'youtube' => 'youtube',
            'pinterest' => 'pinterest',
            'tiktok' => 'tiktok',
            'website' => 'website_custom',
        ];

        foreach ($platforms as $key => $meta_key) {
            $value = get_the_author_meta($meta_key, $author_id);
            if ($value) {
                // Format X (Twitter) URL if needed
                if ($key === 'twitter' && !filter_var($value, FILTER_VALIDATE_URL)) {
                    // Remove @ if present and sanitize username
                    $username = sanitize_user(ltrim($value, '@'), true);
                    // Only create URL if username is valid
                    if (!empty($username) && preg_match('/^[a-zA-Z0-9_]{1,15}$/', $username)) {
                        $value = 'https://x.com/' . $username;
                    } else {
                        continue; // Skip invalid X username
                    }
                }
                
                // Validate all URLs before adding
                if (filter_var($value, FILTER_VALIDATE_URL)) {
                    // Additional security: ensure URL uses http or https
                    $parsed = wp_parse_url($value);
                    if (isset($parsed['scheme']) && in_array($parsed['scheme'], ['http', 'https'], true)) {
                        // Ensure platform key matches the URL (detect platform from URL as fallback)
                        $detected_platform = $this->detect_platform_from_url($value, $key);
                        $links[$detected_platform] = esc_url_raw($value);
                    }
                }
            }
        }

        return $links;
    }

    /**
     * Detect platform from URL to ensure correct icon mapping
     */
    private function detect_platform_from_url($url, $default_platform) {
        $url_lower = strtolower($url);
        
        // Platform detection patterns
        $platform_patterns = [
            'twitter' => ['twitter.com', 'x.com', 't.co'],
            'facebook' => ['facebook.com', 'fb.com', 'fb.me'],
            'instagram' => ['instagram.com', 'instagr.am'],
            'threads' => ['threads.net'],
            'linkedin' => ['linkedin.com'],
            'youtube' => ['youtube.com', 'youtu.be'],
            'pinterest' => ['pinterest.com', 'pin.it'],
            'tiktok' => ['tiktok.com', 'vm.tiktok.com'],
        ];
        
        // Check if URL matches any platform pattern
        foreach ($platform_patterns as $platform => $patterns) {
            foreach ($patterns as $pattern) {
                if (strpos($url_lower, $pattern) !== false) {
                    return $platform;
                }
            }
        }
        
        // If no match found, return default platform
        return $default_platform;
    }

    /**
     * Get social media icon
     */
    private function get_social_icon($platform) {
        $icons = [
            'twitter' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>',
            'facebook' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>',
            'instagram' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>',
            'linkedin' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>',
            'youtube' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>',
            'pinterest' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.099.12.112.225.085.345-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.401.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.357-.629-2.75-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24.009 12.017 24.009c6.624 0 11.99-5.367 11.99-11.988C24.007 5.367 18.641.001 12.017.001z"/></svg>',
            'tiktok' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .88.13V9.4a6.84 6.84 0 0 0-1-.05A6.33 6.33 0 0 0 5 20.1a6.34 6.34 0 0 0 10.86-4.43v-7a8.16 8.16 0 0 0 4.77 1.52v-3.4a4.85 4.85 0 0 1-1-.1z"/></svg>',
            'threads' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm4.51 13.86c-.26 1.74-1.68 3.93-4.72 3.93-1.16 0-2.12-.38-2.77-.94l.76-1.46c.52.46 1.32.79 2.08.79 1.41 0 2.32-.86 2.54-2.29-.39.23-.9.38-1.5.38-1.82 0-3.3-1.38-3.3-3.37 0-2.06 1.55-3.55 3.64-3.55 2.29 0 3.77 1.6 3.77 4.29 0 .37-.03.73-.1 1.12zm-2.07-3.44c-.07-.84-.55-1.66-1.6-1.66-1 0-1.7.73-1.7 1.88 0 1.06.67 1.83 1.7 1.83.77 0 1.35-.39 1.6-.96.05-.14.08-.3.08-.49 0-.21-.02-.41-.08-.6z"/></svg>',
            'website' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm-1.568 3.332c.347-.033.7-.05 1.056-.05.355 0 .708.017 1.055.05-1.228 1.208-2.137 2.703-2.61 4.38-.473-1.677-1.382-3.172-2.61-4.38zm-1.15 1.107c-.984 1.25-1.75 2.7-2.22 4.28-.47 1.58-.7 3.22-.68 4.9.02 1.68.28 3.32.75 4.9.47 1.58 1.236 3.03 2.22 4.28-.984-1.25-1.75-2.7-2.22-4.28-.47-1.58-.73-3.22-.75-4.9-.02-1.68.21-3.32.68-4.9.47-1.58 1.236-3.03 2.22-4.28zm2.718 0c.984 1.25 1.75 2.7 2.22 4.28.47 1.58.73 3.22.75 4.9.02 1.68-.21 3.32-.68 4.9-.47 1.58-1.236 3.03-2.22 4.28-.984-1.25-1.75-2.7-2.22-4.28-.47-1.58-.7-3.22-.68-4.9.02-1.68.28-3.32.75-4.9.47-1.58 1.236-3.03 2.22-4.28zm1.15 1.107c1.228 1.208 2.137 2.703 2.61 4.38.473 1.677 1.382 3.172 2.61 4.38-.347.033-.7.05-1.055.05-.355 0-.708-.017-1.056-.05 1.228-1.208 2.137-2.703 2.61-4.38.473-1.677 1.382-3.172 2.61-4.38zM12 6.5c-3.038 0-5.5 2.462-5.5 5.5s2.462 5.5 5.5 5.5 5.5-2.462 5.5-5.5S15.038 6.5 12 6.5zm0 2c1.933 0 3.5 1.567 3.5 3.5S13.933 15.5 12 15.5 8.5 13.933 8.5 12 10.067 8.5 12 8.5z"/></svg>',
        ];

        return isset($icons[$platform]) ? $icons[$platform] : '';
    }

    /**
     * Get script dependencies
     */
    public function get_script_depends() {
        return ['pnncle-author-social-widget'];
    }

    /**
     * Get style dependencies
     */
    public function get_style_depends() {
        return ['pnncle-author-social-widget'];
    }
}

