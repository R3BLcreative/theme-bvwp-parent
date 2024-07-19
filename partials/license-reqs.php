<section class="infinite-section group/section">
	<div class="infinite-grid items-center">

		<div class="sm:col-span-full lg:col-span-8 sm:order-2 group-odd/section:md:order-1 group-even/section:md:order-2">

			<h2 class="h2 text-secondary uppercase">License Requirements</h2>
			<p>Please visit the <a href="https://www.tceq.texas.gov/licensing/licenses/requirements" target="_blank" class="btn_tertiary">TCEQ</a> for more detailed information about license requirements</p>

			<div class="mt-8 prose prose-li:text-white prose-li:my-1 prose-a:text-white prose-a:no-underline prose-a:my-0 prose-em:my-0 max-w-screen-lg">
				<?php the_field('reqs_list'); ?>
			</div>

		</div>

		<div class="sm:hidden lg:hidden lg:col-span-4 sm:order-1 group-odd/section:md:order-2 group-even/section:md:order-1">
			<?php $image = get_field('reqs_image'); ?>
			<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" width="<?php echo $image['width']; ?>" height="<?php echo $image['height']; ?>" class="rounded-md">
		</div>

	</div>
</section>