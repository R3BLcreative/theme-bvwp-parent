<?php
class Block_Hero extends Blocks_Init {
	function __construct($block) {
		$this->load_global_config();

		$config = [
			'id' => $block['id'],
			'slug' => $block['name'] . '-' . $block['id'],
			'overline' => get_field('overline'),
			'headline' => get_field('headline'),
			'copy' => get_field('copy'),
			'bkg_image' => get_field('bkg_image'),
		];

		$this->config = array_merge($this->config, $config);
	}
}
