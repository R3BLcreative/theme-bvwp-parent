<div class="col-span-full md:hidden flex flex-col gap-2">
	<?php if (!empty($_SESSION['cart']['items'])) : ?>

		<?php foreach ($_SESSION['cart']['items'] as $item) : ?>
			<div class="odd:bg-surface even:bg-white border-t border-t-body">
				<div class="py-4 px-3 flex flex-row items-center justify-start gap-2">
					<?php $remove_item = admin_url('admin-ajax.php?action=infinite_theme_remove_cart_item&nonce=' . $cart_nonce) . '&id=' . $item['id']; ?>
					<a href="<?php echo $remove_item; ?>" class="btn_icon" style="padding: 0 5px;" data-nonce="<?php echo $cart_nonce; ?>">
						<i class="block w-4">
							<?php echo infinite_get_icon('trash'); ?>
						</i>
					</a>
					<div class="">
						<div class="font-semibold"><?php echo get_the_title($item['id']); ?></div>
						<div class="text-xs flex flex-row gap-4 uppercase">
							<?php echo get_field('course_code', $item['id']) . ' &bull; ' . get_field('course_time', $item['id']) . 'HR &bull; ' . get_field('class_type', $item['id'])['label'] . ' &bull; $' . get_field('course_price', $item['id']); ?>
						</div>
					</div>
				</div>
				<div class="px-3 text-center text-sm">
					<?php get_template_part('partials/field', 'schedule', ['id' => $item['id'], 'selected' => $item['sched']]); ?>
				</div>
			</div>
		<?php endforeach; ?>

	<?php else : ?>
		<div>
			<div class="px-3 py-10 text-center text-2xl italic text-body-200">
				Your cart is empty
			</div>
		</div>
	<?php endif; ?>

	<?php if (!empty($_SESSION['cart']['items'])) : ?>
		<div class="bg-white text-right border-t border-t-body">
			<div class="flex flex-row items-center justify-end gap-2">
				<div class="px-3 py-2 italic text-lg font-semibold">
					Subtotal
				</div>
				<div class="px-3 py-2 font-semibold text-2xl text-success-600">
					<?php echo '$' . $_SESSION['cart']['total']; ?>
				</div>
			</div>
			<div class="">
				<div colspan="4" class="">
					<div class="flex flex-row items-center justify-end pt-6">
						<a href="/registration" class="btn_primary">
							Next: Registration
							<i class="block w-5">
								<?php echo infinite_get_icon('register'); ?>
							</i>
						</a>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>

</div>