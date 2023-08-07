<?php

/**
 * Portfolio builder
 *
 * @package     swp-portfolio
 * @author      SolverWP
 * @copyright   2021 solverwp
 * @license     GPL-2.0-or-later
 *
 * Plugin Name: Portfolio Builder
 * Plugin URI:  https://solverwp.com/
 * Description: Portfolio Builder - Elementor Portfolio Addon is a fully responsive plugin that display your company or personal portfolio/ Gallery items. From admin panel you can easily add your portfolio items. It has widget included with carousel,Isotope,Masonary, Tab, Grid with different settings how many want to display total or  at a time and many more. It has the different custom Project URL, features, video url and many more.
 * Version:     1.0.1
 * Author:      SolverWP
 * Author URI:  https://themeforest.net/user/solverwp/portfolio
 * Text Domain: swp-portfolio
 * License:     GPL v2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 *
 */


if (!defined('ABSPATH')) {
	die;
}


/*
 * Define Plugin Dir Path
 * @since 1.0.0
 * */
define('SWP_PORTFOLIO_ROOT_PATH', plugin_dir_path(__FILE__));
define('SWP_PORTFOLIO_ROOT_URL', plugin_dir_url(__FILE__));
define('SWP_PORTFOLIO_INC', SWP_PORTFOLIO_ROOT_PATH . '/inc');
define('SWP_PORTFOLIO_CSS', SWP_PORTFOLIO_ROOT_URL . 'assets/css');
define('SWP_PORTFOLIO_JS', SWP_PORTFOLIO_ROOT_URL . 'assets/js');
define('SWP_PORTFOLIO_IMG', SWP_PORTFOLIO_ROOT_URL . 'assets/img');
define('SWP_PORTFOLIO_ELEMENTOR', SWP_PORTFOLIO_ROOT_PATH . '/elementor');


/** Plugin version **/
define('SWP_PORTFOLIO_VERSION', '1.0.0');



/**
 * Load plugin textdomain.
 */
add_action('plugins_loaded', 'swp_postfolio_textdomain');
if (!function_exists('swp_postfolio_textdomain')) {

	function swp_postfolio_textdomain()
	{
		load_plugin_textdomain('swp-portfolio', false, plugin_basename(dirname(__FILE__)) . '/language');
	}
}


/*
 * require file
*/

if (file_exists(SWP_PORTFOLIO_INC . '/class-swp-portfolio-init.php')) {
	require_once SWP_PORTFOLIO_INC . '/class-swp-portfolio-init.php';
}
