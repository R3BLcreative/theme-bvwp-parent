<?php
if (isset($block['data']['show_preview'])) {
	get_template_part('partials/blocks', 'preview', $block);
	return;
}

$TheBlock = new Block_Course_List($block);
extract($TheBlock->config);
?>

<section id="section-<?php echo $id; ?>" class="<?php echo $section_css; ?>" role="section">
	<!-- Anchor ID -->
	<span id="<?php echo $slug; ?>" class="-translate-y-[150px]"></span>

	<div class="infinite-grid">

		<?php if (!empty($headline) || !empty($copy)) : ?>
			<div class="col-span-full text-center">
				<?php if (!empty($headline)) echo '<h2 class="h2 text-primary-600">' . $headline . '</h2>'; ?>
				<?php if (!empty($copy)) echo $copy; ?>
			</div>
		<?php endif; ?>

	</div>

	<div class="infinite-grid mt-10">

		<?php foreach ($licenses as $license) : ?>

			<?php foreach ($license['courses'] as $course) : ?>
				<a href="<?php echo get_the_permalink($course); ?>" class="sm:col-span-full md:col-span-3 lg:col-span-4 bg-white border p-4 rounded-lg shadow-sm transition-all ease-in-out group/card hover:-translate-y-3 hover:shadow-lg" aria-label="View course">
					<div class="grid grid-cols-1 grid-rows-[auto_auto_auto_1fr] h-full">
						<?php $image = get_field('featured_image', $course); ?>
						<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" loading="lazy" width="<?php echo $image['width']; ?>" height="<?php echo $image['height']; ?>" class="rounded-lg mb-4">

						<span class="text-sm"><?php the_field('course_time', $course); ?> Hour</span>

						<h3 class="h3 text-lg text-primary !text-left tracking-tight mb-6">
							<?php echo get_the_title($course); ?>
						</h3>

						<div class="self-end flex flex-row flex-nowrap items-center justify-between gap-8">
							<div class="flex gap-2 text-sm">
								<i class="w-4 fill-primary-800"><?php echo infinite_get_icon('reader'); ?></i>
								<span><?php the_field('course_code', $course); ?></span>
							</div>
						</div>
					</div>
				</a>
			<?php endforeach; ?>
		<?php endforeach; ?>

	</div>
</section>