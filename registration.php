<?php
/* Template Name: Registration */

get_header();

if (empty($_SESSION['cart']['items'])) header('/cart');
?>

<section class="infinite-section !to-white !from-white  !text-body">
	<div class="infinite-grid">

		<div class="col-span-full flex flex-col items-start justify-start gap-4">
			<h1 class="h2 !text-body-600"><?php echo get_the_title(); ?></h1>

			<?php the_field('instructions'); ?>

			<div class="mb-6 font-semibold flex items-center gap-3">
				<strong class="inline-block bg-secondary px-2 py-1 rounded-sm text-base">NOTICE:</strong>
				<?php the_field('notice'); ?>
			</div>
		</div>

	</div>


	<div class="infinite-grid items-start relative mt-6 gap-8">
		<div class="sm:col-span-full md:col-span-6 lg:col-span-8 xl:col-span-9 sm:order-2 md:order-1 flex flex-col items-start justify-start gap-4">

			<?php
			$form = get_field('registration_form_id');
			gravity_form($form['id'], false, false, false, null, false, '-1', true, null, null);
			?>

		</div>

		<div class="sm:col-span-full md:col-span-3 lg:col-span-4 xl:col-span-3 bg-white border p-4 rounded-lg shadow-sm transition-all ease-in-out group/card flex flex-col gap-4 sm:w-full md:w-[225px] lg:w-[300px] sm:order-1 md:order-2 md:justify-self-end md:sticky top-[125px]">
			<h2 class="h2 !text-body-600 !text-2xl">Your Cart</h2>

			<div class="w-full grid grid-cols-2 gap-3">

				<?php foreach ($_SESSION['cart']['items'] as $item) : ?>
					<div class="text-xs flex flex-col mb-2">
						<span class="text-primary font-semibold">
							<?php echo get_field('course_code', $item['id']); ?>
						</span>
						<span class="text-body italic">
							<?php echo get_field('course_time', $item['id']) . ' HR - ' . $item['sched']; ?>
						</span>
					</div>

					<div class="text-xs flex flex-col mb-2 justify-self-end text-success">
						<?php echo '$' . get_field('course_price', $item['id']); ?>
					</div>
				<?php endforeach; ?>

				<hr class="col-span-full border-borders">

				<div class="text-left text-base font-semibold">Subtotal</div>
				<div class="text-right text-base font-semibold text-success-600">
					<?php echo '$' . $_SESSION['cart']['total']; ?>
				</div>

			</div>
		</div>
</section>

<?php
get_template_part('partials/course', 'legal');

get_footer();
?>