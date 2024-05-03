<?php

/**
 * BLOCKS
 * 
 * Handles loading of custom blocks
 *
 */
class Infinite_Blocks {
	private $version;
	private $isDev = true;

	public function __construct() {
		$this->version = INFINITE_THEME_VERSION;
		$this->actions();
		$this->filters();
	}


	private function actions() {
		add_action('init', [$this, 'load_blocks'], 5);
		add_action('enqueue_block_editor_assets', [$this, 'enqueue']);
	}


	private function filters() {
		add_filter('block_categories_all', [$this, 'block_categories']);
		add_filter('allowed_block_types_all', [$this, 'allowed_blocks'], 25, 2);
	}


	public function enqueue() {
		wp_enqueue_style('infinite-css-blocks', get_template_directory_uri() . '/css/infinite-blocks.css', [], filemtime(get_template_directory() . '/css/infinite-blocks.css'), 'all');
	}


	public function allowed_blocks($allowed, $editor) {
		$core = [
			'core/heading',
			'core/paragraph',
			'core/list',
			'core/table',
			'core/shortcode',
			'core/media-text',
			'core/image',
			'core/video',
		];

		if (in_array($editor->post->post_type, ['page'])) {
			return $this->get_slugs();
		}

		return $core;
		// return $allowed;
	}


	private function get_blocks() {
		$blocks  = get_option('infinite_blocks');
		$version = get_option('infinite_blocks_version');

		if (empty($blocks) || $this->isDev || version_compare($this->version, $version) || (function_exists('wp_get_environment_type') && 'production' !== wp_get_environment_type())) {
			$blocks = scandir(get_template_directory() . '/blocks/');
			$blocks = array_values(array_diff($blocks, array('..', '.', '.DS_Store', '_block-template')));

			update_option('infinite_blocks', $blocks);
			update_option('infinite_blocks_version', $this->version);
		}

		return $blocks;
	}


	private function get_slugs() {
		$blocks = $this->get_blocks();

		foreach ($blocks as $block) {
			$slugs[] = 'infinite/' . $block;
		}

		return $slugs;
	}


	public function load_blocks() {
		$blocks = $this->get_blocks();
		$blocks_path = get_template_directory() . '/blocks';

		foreach ($blocks as $block) {
			$block_path = $blocks_path . '/' . $block;

			if (file_exists($block_path . '/block.json')) {
				register_block_type($block_path . '/block.json', ['icon' => $this->get_icon($block)]);
			}

			// Base class that handles global block data and settings
			if (file_exists($blocks_path . '/class-blocks-init.php')) {
				include_once $blocks_path . '/class-blocks-init.php';
			}

			// Block class that extends the base class for block specific data and settings
			if (file_exists($block_path . '/init.php')) {
				include_once $block_path . '/init.php';
			}
		}
	}


	public function block_categories($categories) {
		$categories = array_merge(
			$categories,
			[
				[
					'slug'  => 'infinite-common',
					'title' => 'Infinite - Common',
				],
				[
					'slug'  => 'infinite-columns',
					'title' => 'Infinite - Columns',
				],
				[
					'slug'  => 'course-blocks',
					'title' => 'Course Blocks',
				],
			]
		);

		return $categories;
	}


	private function get_icon($block) {
		$path = get_template_directory() . '/blocks/' . $block . '/icon.svg';

		if (file_exists($path)) {
			return file_get_contents($path);
		} else {
			return '';
		}
	}
}

$Infinite_Blocks = new Infinite_Blocks();
