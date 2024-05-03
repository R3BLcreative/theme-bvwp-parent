<?php
class Block_Course_List extends Blocks_Init {
	function __construct($block) {
		$this->load_global_config();

		// Query DB and create an array of published course ID's grouped by license type
		$args = [
			'post_type' => 'course',
			'post_status' => 'publish',
		];
		$posts = new WP_Query($args);

		$licenses = [];
		if ($posts->have_posts()) {
			while ($posts->have_posts()) {
				$posts->the_post();
				$ID = get_the_ID();
				$LID = get_field('license_type', $ID);
				$license = get_the_title($LID);
				$licenses[$LID]['title'] = $license;
				$licenses[$LID]['courses'][] = $ID;
			}
		}

		wp_reset_postdata();

		$config = [
			'id' => $block['id'],
			'slug' => str_replace('infinite/', '', $block['name']) . '-' . $block['id'],
			'headline' => get_field('headline'),
			'copy' => get_field('copy'),
			'licenses' => $licenses,
		];

		$this->config = array_merge($this->config, $config);
	}
}
