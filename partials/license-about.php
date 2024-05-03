<section class="infinite-section group/section">
	<div class="infinite-grid items-center">
		<div class="sm:col-span-full md:col-span-4 lg:col-span-6 sm:order-2 group-odd/section:md:order-1 group-even/section:md:order-2">

			<h2 class="h2 text-primary-700"><?php the_field('about_headline'); ?></h2>

			<?php the_field('about_copy'); ?>

		</div>

		<div class="sm:col-span-full md:col-span-4 lg:col-span-6 sm:order-1 group-odd/section:md:order-2 group-even/section:md:order-1">
			<?php $image = get_field('about_image'); ?>
			<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" width="<?php echo $image['width']; ?>" height="<?php echo $image['height']; ?>" class="rounded-md">
		</div>
	</div>
</section>