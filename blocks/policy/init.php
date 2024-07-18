<?php
class Block_Policy extends Blocks_Init {
	function __construct($block) {
		$this->load_global_config();

		$config = [
			'id' => $block['id'],
			'slug' => $block['name'] . '-' . $block['id'],
			'policy_code' => get_field('policy_code'),
		];

		$this->config = array_merge($this->config, $config);
	}
}
