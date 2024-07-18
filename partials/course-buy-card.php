<div class="sm:col-span-full md:col-span-4 lg:col-span-6 flex flex-col items-start justify-start relative">
	<div class="border p-6 rounded-lg shadow-sm text-body group/card bg-[rgba(255,255,255,0.8)] md:w-[250px] sm:w-[70%] sm:self-center md:self-end">

		<div class="flex flex-col gap-3">

			<div>
				<div class="md:hidden mb:6">
					<h1 class="h1 !text-2xl !text-primary-600 first-line:!text-2xl first-line:!text-primary-600">
						<?php the_title(); ?>
					</h1>
				</div>

				<ul class="text-sm flex flex-col gap-2 text-body-300">

					<?php
					get_template_part(
						'partials/course-buy',
						'item',
						['icon' => 'reader', 'text' => get_field('course_code')]
					);

					get_template_part(
						'partials/course-buy',
						'item',
						['icon' => 'clock', 'text' => get_field('course_time') . ' hour']
					);

					get_template_part(
						'partials/course-buy',
						'item',
						['icon' => 'gradcap', 'text' => get_field('class_type')['value']]
					);

					get_template_part(
						'partials/course-buy',
						'item',
						['icon' => 'price', 'text' => '$' . get_field('course_price')]
					);
					?>

				</ul>
			</div>

			<?php
			$cart_nonce = wp_create_nonce('infinite_cart_nonce');
			$add_to_cart = admin_url('admin-ajax.php?action=infinite_theme_add_to_cart&nonce=' . $cart_nonce);
			?>
			<form action="<?php echo $add_to_cart; ?>" method="post">
				<div class="grid grid-cols-[auto_1fr] items-center justify-start pb-2 gap-3">
					<div class="w-5 h-5 fill-body-200">
						<?php echo infinite_get_icon('calendar'); ?>
					</div>
					<label for="course_schedule" class="font-semibold normal-case text-xs text-body-600">
						Select Course Schedule
					</label>
				</div>

				<input id="course_id" name="course_id" type="hidden" value="<?php echo get_the_ID(); ?>">

				<?php get_template_part('partials/field', 'schedule', ['id' => get_the_ID()]); ?>

				<button type="submit" class="btn_secondary !w-full mt-8">
					Add to Cart
					<i class="rotate-90 block w-3">
						<?php echo infinite_get_icon('chevron'); ?>
					</i>
				</button>
			</form>

		</div>

	</div>
</div>