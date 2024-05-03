<?php
/* Template Name: Cart */

get_header();

$total = 0;
foreach ($_SESSION['cart']['items'] as $item) {
	$total = $total + get_field('course_price', $item['id']);
}
$_SESSION['cart']['total'] = $total;

$cart_nonce = wp_create_nonce('infinite_cart_nonce');
$empty_cart = admin_url('admin-ajax.php?action=infinite_theme_empty_cart&nonce=' . $cart_nonce);
?>

<section class="infinite-section !to-white !from-white  !text-body">
	<div class="infinite-grid">
		<div class="col-span-full flex flex-row items-center justify-between gap-4">
			<h1 class="h2 !text-body-600"><?php echo get_the_title(); ?></h1>

			<a href="<?php echo $empty_cart; ?>" type="submit" class="btn_secondary" data-nonce="<?php echo $cart_nonce; ?>">
				Empty Cart
				<i class="block w-3">
					<?php echo infinite_get_icon('trash'); ?>
				</i>
			</a>
		</div>

		<table class="col-span-full table-fixed">
			<thead class="italic text-sm text-body-200 border-b border-b-body">
				<tr>
					<th></th>
					<th class="px-3 text-left">
						Description
					</th>
					<th class="px-3 text-center w-[250px]">Schedule</th>
					<th class="px-3 text-right w-[150px]">Price</th>
				</tr>
			</thead>

			<tbody>

				<?php if (!empty($_SESSION['cart']['items'])) : ?>

					<?php foreach ($_SESSION['cart']['items'] as $item) : ?>
						<tr class="odd:bg-surface even:bg-white">
							<td class="py-4 px-3 text-center w-[50px]">
								<?php $remove_item = admin_url('admin-ajax.php?action=infinite_theme_remove_cart_item&nonce=' . $cart_nonce) . '&id=' . $item['id']; ?>
								<a href="<?php echo $remove_item; ?>" class="btn_icon" data-nonce="<?php echo $cart_nonce; ?>">
									<i class="block w-4">
										<?php echo infinite_get_icon('trash'); ?>
									</i>
								</a>
							</td>
							<td class="px-3 text-left">
								<div class="font-semibold"><?php echo get_the_title($item['id']); ?></div>
								<div class="text-xs flex flex-row gap-4 uppercase"><?php echo get_field('course_code', $item['id']) . ' &bull; ' . get_field('course_time', $item['id']) . 'HR &bull; ' . get_field('class_type', $item['id'])['label']; ?></div>
							</td>
							<td class="px-3 text-center text-sm">
								<?php get_template_part('partials/field', 'schedule', ['id' => $item['id'], 'selected' => $item['sched']]); ?>
							</td>
							<td class="px-3 text-right font-semibold text-success">
								<?php echo '$' . get_field('course_price', $item['id']); ?>
							</td>
						</tr>
					<?php endforeach; ?>

				<?php else : ?>
					<tr>
						<td colspan="4" class="px-3 py-10 text-center text-2xl italic text-body-200">
							Your cart is empty
						</td>
					</tr>
				<?php endif; ?>

			</tbody>

			<?php if (!empty($_SESSION['cart']['items'])) : ?>
				<tfoot class="bg-white text-right border-t border-t-body">
					<tr class="">
						<td colspan="3" class="px-3 py-2 italic text-lg font-semibold">
							Subtotal
						</td>
						<td class="px-3 py-2 font-semibold text-2xl text-success-600">
							<?php echo '$' . $_SESSION['cart']['total']; ?>
						</td>
					</tr>
					<tr>
						<td colspan="4" class="">
							<div class="flex flex-row items-center justify-end pt-6">
								<a href="/registration" class="btn_primary">
									Next: Registration
									<i class="block w-5">
										<?php echo infinite_get_icon('register'); ?>
									</i>
								</a>
							</div>
						</td>
					</tr>
				</tfoot>
			<?php endif; ?>

		</table>
	</div>
</section>

<?php
get_template_part('partials/course', 'legal');

get_footer();
?>