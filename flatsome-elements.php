<?php
/*
Plugin Name: Flatsome Elementer for BliSynlig AS
Description: Flatsome Elementer
Version: 1.2
Author: Pelle Nilsen
Text Domain: fee
*/

if (!defined('ABSPATH')) exit;

define('FLATSOME_ELEMENTS_PATH', plugin_dir_path(__FILE__));

require_once(FLATSOME_ELEMENTS_PATH . 'admin/admin-page.php');

class FlatsomeElements
{

    public function __construct() {
        add_action('wp_enqueue_scripts', [$this, 'fee_enqueue_scripts']);
        add_action('after_setup_theme', [$this, 'init']);
    }

    public function fee_enqueue_scripts() {
        // wp_register_script( 'dynamicChildViewer', plugin_dir_url(__FILE__) . 'assets/js/dynamicChildViewer.js', [], null, true );
        wp_enqueue_script( 'dynamicChildViewer' );
    }

    public function init() {
        add_action('ux_builder_setup', [$this, 'setup_ux_builder']);

        add_shortcode('flatsome_button', [$this, 'button_shortcode']);
        add_shortcode('flatsome_cards', [$this, 'cards_shortcode']);
        add_shortcode('flatsome_card_item', [$this, 'card_item_shortcode']);
        add_shortcode('flatsome_gravity_form', [$this, 'gravity_forms_shortcode']);
        add_shortcode('flatsome_chat_icon', [$this, 'custom_chat_icon_shortcode']);
        add_shortcode('flatsome_chat_text', [$this, 'custom_chat_text_shortcode']);
        add_shortcode('flatsome_fb_stories', [$this, 'fb_stories_shortcode']);
    }

    public function button_shortcode($atts) {
        $atts = shortcode_atts([
            'href' => 'javascript:void();',
            'background_color' => '#fff',
            'text_color' => '#000',
            'text' => 'Button',
            'letter_case' => '',
            'padding' => '16',
            'margin' => '5',
        ], $atts);

        ob_start();

        require(FLATSOME_ELEMENTS_PATH . 'public-html/button.php');

        $output = ob_get_clean();

        return $output;
    }

    public function cards_shortcode($atts, $content = null) {
        $atts = shortcode_atts([
            'flex_direction' => 'row',
            'justify_content' => 'start',
            'align_items' => 'start',
            'gap' => '2',
            'margin' => '5',
            'content' => $content,
            'button_class' => 'primary',
            'inactive_class' => 'is-outline',
            'scroll_to_offset' => '200',
        ], $atts);

        ob_start();

        require(FLATSOME_ELEMENTS_PATH . 'public-html/dynamic-child-viewer.php');

        $output = ob_get_clean();

        return '<div class="fee-main-container"><div id="buttons" class="fee-buttons-container" style="display: flex; flex-direction: ' . esc_attr($atts['flex_direction']) . '; justify-content: ' . esc_attr($atts['justify_content']) . '; align-items: ' . esc_attr($atts['align_items']) . '; gap: ' . esc_attr($atts['gap']) . 'rem; margin: ' . esc_attr($atts['margin']) . '"></div><div id="container" class="fee-main-content-container">' . do_shortcode($content) . '</div></div>' . $output;
    }

    public function card_item_shortcode($atts, $content = null) {
        $atts = shortcode_atts([
            'text' => 'Card Element',
            'undertext' => 'Descriptive text',
            'class' => '',
        ], $atts);

        return '<div class="fee-child-content-container ' . esc_attr($atts['class']) . '" data-text="' . esc_attr($atts['text']) . '" data-undertext="' . esc_attr($atts['undertext']) . '">' . do_shortcode($content) . '</div>';
    }

    public function gravity_forms_shortcode($atts, $content = null) {
        $atts = shortcode_atts([
            'id' => '1',
            'title' => 'true',
            'description' => 'true',
            'ajax' => 'true',
            'tabindex' => '0',
            'test' => '',
        ], $atts);

        return do_shortcode('[gravityform id="' . esc_attr($atts['id']) . '" title="' . esc_attr($atts['title']) . '" description="' . esc_attr($atts['description']) . '" ajax="' . esc_attr($atts['ajax']) . '" tabindex="' . esc_attr($atts['tabindex']) . '"]');
    }

    public function custom_chat_icon_shortcode($atts) {
        $atts = shortcode_atts([
            'image_link' => 'Image link',
            'size' => '150',
            'padding' => '',
            'background_color' => '#fceed9',
            'border_color' => '#ed8b00',
            'border_width' => '5',
            'border_radius' => '100',
            'image_size' => '75',
            'link' => 'https://',
            'target' => '_blank',
            'position' => 'bottomLeft',
            'distance_from_top' => '20',
            'distance_from_right' => '20',
            'distance_from_bottom' => '20',
            'distance_from_left' => '20',
        ], $atts);

        ob_start();

        require(FLATSOME_ELEMENTS_PATH . 'public-html/chat-icon.php');

        $output = ob_get_clean();

        return $output;
    }

    public function custom_chat_text_shortcode($atts) {
        $atts = shortcode_atts([
            'text' => 'Kontakt oss!',
            'text_size' => '18',
            'text_color' => '#ed8b00',
            'size' => '150',
            'padding' => '',
            'background_color' => '#fceed9',
            'border_color' => '#ed8b00',
            'border_width' => '5',
            'border_radius' => '100',
            'link' => 'https://',
            'target' => '_blank',
            'position' => 'bottomRight',
            'distance_from_top' => '20',
            'distance_from_right' => '20',
            'distance_from_bottom' => '20',
            'distance_from_left' => '20',
        ], $atts);

        ob_start();

        require(FLATSOME_ELEMENTS_PATH . 'public-html/chat-text.php');

        $output = ob_get_clean();

        return $output;
    }

    public function fb_stories_shortcode($atts, $content = null) {
        $atts = shortcode_atts([
            'gap' => '8',
            'max_height' => '180',
            'thumbnail_size_mobile' => '180',
        ], $atts);

        ob_start();
        require(FLATSOME_ELEMENTS_PATH . 'public-html/fb-stories.php');
        $output = ob_get_clean();

        $json_content = wp_strip_all_tags($content);
        $json_content = str_replace(['“', '”', '‘', '’'], ['"', '"', "'", "'"], $json_content);

        return $output . '<div class="json-content-for-stories" data-json="' . $json_content . '"></div>';
    }
    
    public function setup_ux_builder() {
        require_once FLATSOME_ELEMENTS_PATH . 'integrations/flatsome.php';
    }

}

new FlatsomeElements();
