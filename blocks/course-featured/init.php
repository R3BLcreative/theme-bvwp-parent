<?php
class Block_Course_Featured extends Blocks_Init {
	function __construct($block) {
		$this->load_global_config();

		$config = [
			'id' => $block['id'],
			'slug' => str_replace('infinite/', '', $block['name']) . '-' . $block['id'],
			'headline' => get_field('headline'),
			'copy' => get_field('copy'),
			'courses' => get_field('featured_courses'),
		];

		$this->config = array_merge($this->config, $config);
	}
}
