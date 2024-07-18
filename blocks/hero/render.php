<?php
if (isset($block['data']['show_preview'])) {
	get_template_part('partials/blocks', 'preview', $block);
	return;
}

$TheBlock = new Block_Hero($block);
extract($TheBlock->config);
?>

<section id="section-<?php echo $id; ?>" class="flex flex-col justify-center relative overflow-hidden h-[500px] bg-primary-750 text-white" role="section">
	<!-- Anchor ID -->
	<span id="<?php echo $slug; ?>" class="-translate-y-[150px]"></span>

	<div class="z-20 infinite-grid">

		<div class="flex flex-col items-start justify-center sm:col-span-full lg:col-span-6">

			<?php if (!empty($overline) || !empty($headline)) : ?>
				<h1 class="h1">
					<?php if (!empty($overline)) echo $overline . '<br>'; ?>
					<?php if (!empty($headline)) echo $headline; ?>
				</h1>
			<?php endif; ?>

			<?php if (!empty($copy)) echo $copy; ?>

		</div>

	</div>

	<div class="absolute z-10 w-full h-[500px] top-0 left-0 before:content-[''] before:block before:absolute before:top-0 before:left-0 before:w-full before:h-full before:bg-primary-750 before:opacity-75">
		<img src="<?php echo $bkg_image['url']; ?>" alt="<?php echo $bkg_image['alt']; ?>" width="<?php echo $bkg_image['width']; ?>" height="<?php echo $bkg_image['height']; ?>" class="w-full h-[500px] object-cover object-center" />
	</div>
</section>