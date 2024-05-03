<section class="infinite-section group/section">
	<div class="infinite-grid items-center">
		<div class="sm:col-span-full md:col-span-4 lg:col-span-6 sm:order-2 group-odd/section:md:order-1 group-even/section:md:order-2">
			<?php the_field('about_copy'); ?>

			<ul class="list-disc my-6 sm:text-xs md:text-sm lg:text-base p-4 rounded-md bg-white/50 border border-neutral-600">
				<?php
				$items = get_field('about_list');
				foreach ($items as $item) :
				?>
					<li class="ml-8"><?php echo $item['item_text']; ?></li>
				<?php endforeach; ?>
			</ul>

			<?php $lic_type = get_field('license_type'); ?>
			<a href="<?php echo get_the_permalink($lic_type); ?>" class="btn_primary mt-8">
				Additional Licensing Info
				<i class="rotate-90 block w-3">
					<?php echo infinite_get_icon('chevron'); ?>
				</i>
			</a>
		</div>

		<div class="sm:col-span-full md:col-span-4 lg:col-span-6 sm:order-1 group-odd/section:md:order-2 group-even/section:md:order-1">
			<?php $image = get_field('about_image'); ?>
			<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" width="<?php echo $image['width']; ?>" height="<?php echo $image['height']; ?>" class="rounded-md">
		</div>
	</div>
</section>