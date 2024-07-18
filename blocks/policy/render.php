<?php
if (isset($block['data']['show_preview'])) {
	get_template_part('partials/blocks', 'preview', $block);
	return;
}

$TheBlock = new Block_Policy($block);
extract($TheBlock->config);
?>

<section id="section-<?php echo $id; ?>" class="bg-white my-32" role="section">
	<!-- Anchor ID -->
	<span id="<?php echo $slug; ?>" class="-translate-y-[150px]"></span>

	<div class="infinite-grid">

		<div class="col-span-full prose max-w-none">
			<?php echo $policy_code; ?>
		</div>

	</div>

</section>