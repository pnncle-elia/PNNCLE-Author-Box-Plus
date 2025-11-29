<?php
/**
 * Plugin Name: Author Box Plus
 * Description: A custom Elementor widget that displays author information and social media links dynamically
 * Version: 1.0.0
 * Author: Custom Development
 * Text Domain: pnncle-widget
 * Domain Path: /languages
 * Requires at least: 5.0
 * Requires PHP: 7.4
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

// Define plugin constants
define('PNNCLE_WIDGET_VERSION', '1.0.0');
define('PNNCLE_WIDGET_PATH', plugin_dir_path(__FILE__));
define('PNNCLE_WIDGET_URL', plugin_dir_url(__FILE__));

/**
 * Main Plugin Class
 */
final class PNNCLE_Author_Social_Widget {

    /**
     * Plugin Version
     */
    const VERSION = '1.0.0';

    /**
     * Minimum Elementor Version
     */
    const MINIMUM_ELEMENTOR_VERSION = '3.0.0';

    /**
     * Minimum PHP Version
     */
    const MINIMUM_PHP_VERSION = '7.4';

    /**
     * Instance
     */
    private static $_instance = null;

    /**
     * Instance
     */
    public static function instance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * Constructor
     */
    public function __construct() {
        add_action('plugins_loaded', [$this, 'on_plugins_loaded']);
    }

    /**
     * Load Textdomain
     */
    public function i18n() {
        load_plugin_textdomain('pnncle-widget');
    }

    /**
     * On Plugins Loaded
     */
    public function on_plugins_loaded() {
        if ($this->is_compatible()) {
            add_action('elementor/init', [$this, 'init']);
        }
    }

    /**
     * Compatibility Checks
     */
    public function is_compatible() {
        // Check if Elementor installed and activated
        if (!did_action('elementor/loaded')) {
            add_action('admin_notices', [$this, 'admin_notice_missing_main_plugin']);
            return false;
        }

        // Check for required Elementor version
        if (!version_compare(ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=')) {
            add_action('admin_notices', [$this, 'admin_notice_minimum_elementor_version']);
            return false;
        }

        // Check for required PHP version
        if (version_compare(PHP_VERSION, self::MINIMUM_PHP_VERSION, '<')) {
            add_action('admin_notices', [$this, 'admin_notice_minimum_php_version']);
            return false;
        }

        return true;
    }

    /**
     * Initialize
     */
    public function init() {
        $this->i18n();

        // Add user profile fields
        $profile_fields_file = PNNCLE_WIDGET_PATH . 'includes/user-profile-fields.php';
        if (file_exists($profile_fields_file)) {
            require_once($profile_fields_file);
        }

        // Register Widget Scripts
        add_action('elementor/frontend/after_register_scripts', [$this, 'register_widget_scripts']);
        add_action('elementor/frontend/after_register_styles', [$this, 'register_widget_styles']);

        // Register Widget
        add_action('elementor/widgets/register', [$this, 'register_widgets']);
    }

    /**
     * Register Widget Scripts
     */
    public function register_widget_scripts() {
        wp_register_script(
            'pnncle-author-social-widget',
            PNNCLE_WIDGET_URL . 'assets/js/widget.js',
            ['jquery'],
            self::VERSION,
            true
        );
    }

    /**
     * Register Widget Styles
     */
    public function register_widget_styles() {
        wp_register_style(
            'pnncle-author-social-widget',
            PNNCLE_WIDGET_URL . 'assets/css/widget.css',
            [],
            self::VERSION
        );
    }

    /**
     * Register Widgets
     */
    public function register_widgets($widgets_manager) {
        $widget_file = PNNCLE_WIDGET_PATH . 'widgets/author-social-links-widget.php';
        if (file_exists($widget_file)) {
            require_once($widget_file);
            $widgets_manager->register(new \PNNCLE\Widgets\Author_Social_Links_Widget());
        }
    }

    /**
     * Admin notice
     */
    public function admin_notice_missing_main_plugin() {
        if (isset($_GET['activate'])) unset($_GET['activate']);

        $message = sprintf(
            esc_html__('"%1$s" requires "%2$s" to be installed and activated.', 'pnncle-widget'),
            '<strong>' . esc_html__('Author Box Plus', 'pnncle-widget') . '</strong>',
            '<strong>' . esc_html__('Elementor', 'pnncle-widget') . '</strong>'
        );

        printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', wp_kses_post($message));
    }

    /**
     * Admin notice
     */
    public function admin_notice_minimum_elementor_version() {
        if (isset($_GET['activate'])) unset($_GET['activate']);

        $message = sprintf(
            esc_html__('"%1$s" requires "%2$s" version %3$s or greater.', 'pnncle-widget'),
            '<strong>' . esc_html__('Author Box Plus', 'pnncle-widget') . '</strong>',
            '<strong>' . esc_html__('Elementor', 'pnncle-widget') . '</strong>',
            esc_html(self::MINIMUM_ELEMENTOR_VERSION)
        );

        printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', wp_kses_post($message));
    }

    /**
     * Admin notice
     */
    public function admin_notice_minimum_php_version() {
        if (isset($_GET['activate'])) unset($_GET['activate']);

        $message = sprintf(
            esc_html__('"%1$s" requires "%2$s" version %3$s or greater.', 'pnncle-widget'),
            '<strong>' . esc_html__('Author Box Plus', 'pnncle-widget') . '</strong>',
            '<strong>' . esc_html__('PHP', 'pnncle-widget') . '</strong>',
            esc_html(self::MINIMUM_PHP_VERSION)
        );

        printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', wp_kses_post($message));
    }
}

PNNCLE_Author_Social_Widget::instance();

