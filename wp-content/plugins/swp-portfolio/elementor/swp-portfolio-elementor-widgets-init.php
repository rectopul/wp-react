<?php

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

/**
 * Main portfolio builder Addon Class
 *
 * The main class that initiates and runs the plugin.
 *
 * @since 1.0.0
 */

if (!class_exists('Swp_Portfolio_Elementor_Widgets_Init')) {
	final class Swp_Portfolio_Elementor_Widgets_Init
	{

		/**
		 * Plugin Version
		 *
		 * @since 1.0.0
		 *
		 * @var string The plugin version.
		 */
		const VERSION = '1.0.0';

		/**
		 * Minimum Elementor Version
		 *
		 * @since 1.0.0
		 *
		 * @var string Minimum Elementor version required to run the plugin.
		 */
		const MINIMUM_ELEMENTOR_VERSION = '2.0.0';

		/**
		 * Minimum PHP Version
		 *
		 * @since 1.0.0
		 *
		 * @var string Minimum PHP version required to run the plugin.
		 */
		const MINIMUM_PHP_VERSION = '5.4';

		/**
		 * Instance
		 *
		 * @since 1.0.0
		 *
		 * @access private
		 * @static
		 *
		 * @var Kontakt_elementor The single instance of the class.
		 */
		private static $_instance = null;

		/**
		 * Instance
		 *
		 * Ensures only one instance of the class is loaded or can be loaded.
		 *
		 * @since 1.0.0
		 *
		 * @access public
		 * @static
		 *
		 * @return Kontakt_elementor An instance of the class.
		 */
		public static function instance()
		{

			if (is_null(self::$_instance)) {
				self::$_instance = new self();
			}
			return self::$_instance;
		}

		/**
		 * Constructor
		 *
		 * @since 1.0.0
		 *
		 * @access public
		 */
		public function __construct()
		{

			add_action('plugins_loaded', [$this, 'init']);
		}

		/**
		 * Initialize the plugin
		 *
		 * Load the plugin only after Elementor (and other plugins) are loaded.
		 * Checks for basic plugin requirements, if one check fail don't continue,
		 * if all check have passed load the files required to run the plugin.
		 *
		 * Fired by `plugins_loaded` action hook.
		 *
		 * @since 1.0.0
		 *
		 * @access public
		 */
		public function init()
		{

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

			add_action('elementor/elements/categories_registered', array($this, '_widget_categories'));

			//elementor widget registered
			add_action('elementor/widgets/widgets_registered', array($this, '_widget_registered'));
		}

		/**
		 * Admin notice
		 *
		 * Warning when the site doesn't have Elementor installed or activated.
		 *
		 * @since 1.0.0
		 *
		 * @access public
		 */
		public function admin_notice_missing_main_plugin()
		{

			if (isset($_GET['activate'])) unset($_GET['activate']);

			$message = sprintf(
				/* translators: 1: Plugin name 2: Elementor */
				esc_html__('"%1$s" requires "%2$s" to be installed and activated.', 'swp-portfolio'),
				'<strong>' . esc_html__('Eleblog', 'swp-portfolio') . '</strong>',
				'<strong>' . esc_html__('Elementor', 'swp-portfolio') . '</strong>'
			);

			printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);
		}

		/**
		 * Admin notice
		 *
		 * Warning when the site doesn't have a minimum required Elementor version.
		 *
		 * @since 1.0.0
		 *
		 * @access public
		 */
		public function admin_notice_minimum_elementor_version()
		{

			if (isset($_GET['activate'])) unset($_GET['activate']);

			$message = sprintf(
				/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
				esc_html__('"%1$s" requires "%2$s" version %3$s or greater.', 'swp-portfolio'),
				'<strong>' . esc_html__('Eleblog Addon', 'swp-portfolio') . '</strong>',
				'<strong>' . esc_html__('Elementor', 'swp-portfolio') . '</strong>',
				self::MINIMUM_ELEMENTOR_VERSION
			);

			printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);
		}

		/**
		 * Admin notice
		 *
		 * Warning when the site doesn't have a minimum required PHP version.
		 *
		 * @since 1.0.0
		 *
		 * @access public
		 */
		public function admin_notice_minimum_php_version()
		{

			if (isset($_GET['activate'])) unset($_GET['activate']);

			$message = sprintf(
				/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
				esc_html__('"%1$s" requires "%2$s" version %3$s or greater.', 'swp-portfolio'),
				'<strong>' . esc_html__('ELEBLOG', 'swp-portfolio') . '</strong>',
				'<strong>' . esc_html__('PHP', 'swp-portfolio') . '</strong>',
				self::MINIMUM_PHP_VERSION
			);

			printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);
		}


		/**
		 * _widget_categories()
		 * @since 1.0.0
		 * */

		public function _widget_categories($elements_manager)
		{
			$elements_manager->add_category(
				'swp-portfolio',
				[
					'title' => esc_html__('Portfolio', 'swp-portfolio'),
					'icon' => 'fa fa-plug',
				]
			);
		}



		/**
		 * _widget_registered()
		 * @since 1.0.0
		 * */
		public function _widget_registered()
		{

			if (!class_exists('Elementor\Widget_Base')) {
				return;
			}
			$elementor_widgets = array(
				'grid',
				'isotop',
				'masonry',
				'generel',
				'slider',
				'tab',
				'ajax-filter',
			);
			$elementor_widgets = apply_filters('swp_portfolio_elementor_widget', $elementor_widgets);

			if (is_array($elementor_widgets) && !empty($elementor_widgets)) {

				foreach ($elementor_widgets as $widget) {

					$template_file = SWP_PORTFOLIO_ELEMENTOR . '/widgets/class-swp-portfolio-style-' . $widget . '.php';

					if ($template_file && is_readable($template_file)) {
						include_once $template_file;
					}
				}
			}
		}
	}

	Swp_Portfolio_Elementor_Widgets_Init::instance();
}
