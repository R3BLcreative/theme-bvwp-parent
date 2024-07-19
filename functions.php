<?php
$theme = wp_get_theme();
define('INFINITE_THEME_VERSION', $theme->get('Version'));

// WP one-click updates hosted on GitHub
require 'plugin-update-checker/plugin-update-checker.php';

use YahnisElsts\PluginUpdateChecker\v5\PucFactory;

$myUpdateChecker = PucFactory::buildUpdateChecker(
	'https://github.com/R3BLcreative/theme-bvwp-parent/',
	__FILE__,
	'theme-bvwp-parent'
);
$myUpdateChecker->getVcsApi()->enableReleaseAssets();
// $myUpdateChecker->setBranch('production');
$myUpdateChecker->setAuthentication('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');

require_once 'includes/class-infinite-blocks.php';

add_action('admin_init', 'infinite_theme_ajax_hooks');

/**
 * Undocumented function
 *
 * @return void
 */
function infinite_enqueue_styles_scripts() {
	wp_enqueue_style('infinite-css-frontend', get_template_directory_uri() . '/css/infinite-theme.css', [], filemtime(get_template_directory() . '/css/infinite-theme.css'), 'all');

	wp_enqueue_script('infinite-js-frontend', get_template_directory_uri() . '/js/infinite-theme.js', [], filemtime(get_template_directory() . '/js/infinite-theme.js'), true);
}
add_action('wp_enqueue_scripts', 'infinite_enqueue_styles_scripts');

/**
 * Undocumented function
 *
 * @return void
 */
function infinite_register_menus() {
	register_nav_menus(['main-menu' => 'Main Menu', 'footer-menu' => 'Footer Menu']);
}
add_action('init', 'infinite_register_menus');

/**
 * Undocumented function
 *
 * @param  [type]  $icon
 * @param  boolean $path
 * @return void
 */
function infinite_get_icon($icon) {
	$file = get_template_directory() . '/icons/' . $icon . '.svg';

	if (file_exists($file)) {
		return file_get_contents($file);
	}

	return false;
}

/**
 * Undocumented function
 *
 * @param  boolean $id
 * @return void
 */
function infinite_disable_editor($id = false) {

	$excluded_templates = array(
		'registration.php',
		'cart.php',
		'comingsoon.php'
	);

	if (empty($id))
		return false;

	$template = get_page_template_slug($id);

	return in_array($template, $excluded_templates);
}

/**
 * Undocumented function
 *
 * @param  [type] $can_edit
 * @param  [type] $post_type
 * @return void
 */
function infinite_disable_gutenberg($can_edit, $post_type) {

	if (!(is_admin() && !empty($_GET['post'])))
		return $can_edit;

	if (infinite_disable_editor($_GET['post']))
		$can_edit = false;

	return $can_edit;
}
add_filter('gutenberg_can_edit_post_type', 'infinite_disable_gutenberg', 10, 2);
add_filter('use_block_editor_for_post_type', 'infinite_disable_gutenberg', 10, 2);

/**
 * Undocumented function
 *
 * @return void
 */
function infinite_theme_ajax_hooks() {
	// ADD TO CART
	add_action('wp_ajax_nopriv_infinite_theme_add_to_cart', 'infinite_add_to_cart');
	add_action('wp_ajax_infinite_theme_add_to_cart', 'infinite_add_to_cart');

	// EMPTY CART
	add_action('wp_ajax_nopriv_infinite_theme_empty_cart', 'infinite_empty_cart');
	add_action('wp_ajax_infinite_theme_empty_cart', 'infinite_empty_cart');

	// REMOVE CART ITEM
	add_action('wp_ajax_nopriv_infinite_theme_remove_cart_item', 'infinite_remove_cart_item');
	add_action('wp_ajax_infinite_theme_remove_cart_item', 'infinite_remove_cart_item');
}

/**
 * Undocumented function
 *
 * @return void
 */
function infinite_add_to_cart() {
	session_start();

	// Verify Nonce
	if (!wp_verify_nonce($_REQUEST['nonce'], 'infinite_cart_nonce')) {
		exit('No naughty business please');
	}

	$id = $_REQUEST['course_id'];
	$sched = $_REQUEST['course_schedule'];

	$_SESSION['cart']['items'][$id] = [
		'id' => $id,
		'sched' => $sched,
	];

	// Return to sender
	header('Location: /cart');

	// Just in case...
	die();
}

/**
 * Undocumented function
 *
 * @return void
 */
function infinite_empty_cart() {
	session_start();

	// Verify Nonce
	if (!wp_verify_nonce($_REQUEST['nonce'], 'infinite_cart_nonce')) {
		exit('No naughty business please');
	}

	$_SESSION['cart']['items'] = [];

	// Return to sender
	header('Location: ' . $_SERVER['HTTP_REFERER']);

	// Just in case...
	die();
}

/**
 * Undocumented function
 *
 * @return void
 */
function infinite_remove_cart_item() {
	session_start();

	// Verify Nonce
	if (!wp_verify_nonce($_REQUEST['nonce'], 'infinite_cart_nonce')) {
		exit('No naughty business please');
	}

	unset($_SESSION['cart']['items'][$_REQUEST['id']]);

	// Return to sender
	header('Location: ' . $_SERVER['HTTP_REFERER']);

	// Just in case...
	die();
}
