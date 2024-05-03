<section id="section-hero" class="flex flex-col justify-center relative overflow-hidden h-[500px] bg-primary-750 text-white group/section" role="section">
	<!-- Anchor ID -->
	<span id="course-hero" class="-translate-y-[150px]"></span>

	<div class="z-20 infinite-grid">

		<div class="flex flex-col items-start justify-center smOnly:hidden md:col-span-5 lg:col-span-6">

			<h1 class="h1">
				<?php the_title(); ?>
			</h1>

			<p><?php the_field('course_intro'); ?></p>

		</div>

		<?php get_template_part('partials/course', 'buy-card'); ?>

	</div>

	<div class="absolute z-10 w-full h-[500px] top-0 left-0 before:content-[''] before:block before:absolute before:top-0 before:left-0 before:w-full before:h-full before:bg-primary-750 before:opacity-75">
		<?php $image = get_field('course_hero'); ?>
		<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" width="<?php echo $image['width']; ?>" height="<?php echo $image['height']; ?>" class="w-full h-[500px] object-cover object-center" />
	</div>
</section>