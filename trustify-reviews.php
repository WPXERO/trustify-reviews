<?php
/*
 * Plugin Name: Trustify Reviews
 * Plugin URI: https://github.com/HelloTalib
 * Description: Trustify Reviews is a plugin that allows you to display Yelp reviews in a carousel slider or tabbed widget.
 * Version: 1.0.0
 * Author: flexthemes, HelloTalib, wpxero, abu talib
 * Author URI: https://wpxero.com
 * License: GPLv3
 * Text Domain: trustify-reviews
 * Domain Path: /languages/
 */

namespace TRUSTIFY_REVIEWS;

use TRUSTIFY_REVIEWS\WIDGETS\TRUSTIFY_REVIEWS_GRID;
use Elementor\Plugin;

if (!defined('ABSPATH')) {
    exit(__('Direct Access is not allowed', 'trustify-reviews'));
}


define('yelp_tbc_version', time());

final class TRUSTIFY_REVIEWS_INIT {

    const VERSION                   = yelp_tbc_version;
    const MINIMUM_ELEMENTOR_VERSION = '3.0.0';
    const MINIMUM_PHP_VERSION       = '7.0';

    private static $_instance = null;

    public static function instance() {

        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }

    public function __construct() {
        add_action('plugins_loaded', [$this, 'init']);
    }

    public function admin_notice_minimum_php_version() {

        if (isset($_GET['activate'])) {
            unset($_GET['activate']);
        }

        $message = sprintf(
            /* translators: 1: Trustify Reviews 2: PHP 3: Required PHP version */
            esc_html__('"%1$s" requires "%2$s" version %3$s or greater.', 'trustify-reviews'),
            '<strong>' . esc_html__('Trustify Reviews', 'trustify-reviews') . '</strong>',
            '<strong>' . esc_html__('PHP', 'trustify-reviews') . '</strong>',
            self::MINIMUM_PHP_VERSION
        );
        printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);
    }

    public function admin_notice_minimum_elementor_version() {

        if (isset($_GET['activate'])) {
            unset($_GET['activate']);
        }

        $message = sprintf(
            /* translators: 1: Trustify Reviews 2: Elementor 3: Required Elementor version */
            esc_html__('"%1$s" requires "%2$s" version %3$s or greater.', 'trustify-reviews'),
            '<strong>' . esc_html__('Trustify Reviews', 'trustify-reviews') . '</strong>',
            '<strong>' . esc_html__('Elementor', 'trustify-reviews') . '</strong>',
            self::MINIMUM_ELEMENTOR_VERSION
        );
        printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);
    }

    public function admin_notice_missing_main_plugin() {

        if (isset($_GET['activate'])) {
            unset($_GET['activate']);
        }

        $message = sprintf(
            /* translators: 1: Trustify Reviews 2: Elementor */
            esc_html__('"%1$s" requires "%2$s" to be installed and activated.', 'trustify-reviews'),
            '<strong>' . esc_html__('Trustify Reviews', 'trustify-reviews') . '</strong>',
            '<strong>' . esc_html__('Elementor', 'trustify-reviews') . '</strong>'
        );
        printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);
    }

    public function load_files() {
        require_once __DIR__ . '/includes/settings.php';
    }

    public function init() {
        load_plugin_textdomain('trustify-reviews', false, plugin_dir_path(__FILE__) . '/languages');
        $this->load_files();

        // Check if Elementor installed and activated
        if (!did_action('elementor/loaded')) {
            add_action('admin_notices', [$this, 'admin_notice_missing_main_plugin']);
            return;
        }



        // Check for required Elementor version
        if (!version_compare(ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=')) {
            add_action('admin_notices', [$this, 'admin_notice_minimum_elementor_version']);
            return;
        }

        // Check for required PHP version
        if (version_compare(PHP_VERSION, self::MINIMUM_PHP_VERSION, '<')) {
            add_action('admin_notices', [$this, 'admin_notice_minimum_php_version']);
            return;
        }

        // Register Widget
        add_action('elementor/widgets/register', [$this, 'init_widgets']);
        add_action('elementor/elements/categories_registered', [$this, 'register_new_category']);
        add_action('elementor/frontend/after_enqueue_scripts', [$this, 'widget_assets_enqueue']);
        add_action('wp_ajax_nopriv_TRUSTIFY_REVIEWS', [$this, 'TRUSTIFY_REVIEWS']);
        add_action('wp_ajax_TRUSTIFY_REVIEWS', [$this, 'TRUSTIFY_REVIEWS']);
    }

    public function TRUSTIFY_REVIEWS() {

        if (!wp_verify_nonce($_POST['nonce'], 'TRUSTIFY_REVIEWS_nonce')) {
            wp_send_json_error('Nonce verification failed', 401);
            die();
        }

        $getData = $this->get_cached_api_data('ffnnn');
        if ($getData) {
            wp_send_json($getData);
        } else {
            $this->your_api_request_function();
        }
    }

    public function get_cached_api_data($filter) {
        $cache_key = 'TRUSTIFY_REVIEWS_' . $filter;
        $cache_data = get_transient($cache_key);
        if ($cache_data) {
            return $cache_data;
        }
        return false;
    }

    public function set_cached_api_data($filter, $data) {
        $cache_key = 'TRUSTIFY_REVIEWS_' . $filter;
        set_transient($cache_key, $data, 60 * 60 * 24);
    }

    public function your_api_request_function() {
        $api_url = $this->getApiUrl();
        $options = get_option('trustify_reviews_settings');
        $business_id = isset($options['business_id']) ? $options['business_id'] : '';
        // $business_id = '62835855486917834877667559591936';
        // $business_id = '124032242297630996235869843795968';
        // $business_id = '125703889431862179196789435166720';

        $allReview = [];
        $page = 1;
        do {
            $source      = wp_remote_get($api_url . $business_id . '/feed?page=' . $page);
            if (is_wp_error($source)) {
                return [];
            }
            $reponse_raw = wp_remote_retrieve_body($source);
            $response    = json_decode($reponse_raw);
            $allReview = array_merge($allReview, $response->items);
            $page++;
        } while ($response->items);
        $this->set_cached_api_data('nnn', $allReview);
        wp_send_json($allReview);
    }
    protected function getApiUrl() {
        return 'https://api.trustify.ch/reporting/profile/';
    }
    /**
     * !Register Categories
     */
    public function register_new_category($elements_manager) {
        $elements_manager->add_category(
            'trustify-reviews',
            [
                'title' => __('Yelp', 'trustify-reviews'),
            ]
        );
    }

    /**
     * !enqueue assets
     */
    public function widget_assets_enqueue() {
        // fontawesome
        wp_enqueue_style('fontawesome-css', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css', [], self::VERSION);
        // slick slider
        wp_enqueue_style('trustify-reviews-slick-css', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', [], self::VERSION);
        wp_enqueue_script('trustify-reviews-slick-js', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', ['jquery'], self::VERSION, true);

        // slick slider

        wp_enqueue_style('trustify-reviews-css', plugin_dir_url(__FILE__) . 'assets/css/style.css', [], self::VERSION);
        wp_enqueue_script('trustify-reviews-js', plugin_dir_url(__FILE__) . 'assets/js/trustify-reviews-grid.js', ['jquery'], self::VERSION, true);
        wp_localize_script('trustify-reviews-js', 'TRUSTIFY_REVIEWSObj', array(
            'ajaxurl' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('TRUSTIFY_REVIEWS_nonce'),

        ));
    }

    /**
     * ! Widgets Init
     */

    function init_widgets($widgets_manager) {
        require_once __DIR__ . '/widgets/trustify-reviews-grid.php';
        $widgets_manager->register(new TRUSTIFY_REVIEWS_GRID());
    }
}

TRUSTIFY_REVIEWS_INIT::instance();
