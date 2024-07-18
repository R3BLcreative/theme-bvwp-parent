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

		<?php
		require_once get_template_directory() . '/partials/cart-items.php';
		require_once get_template_directory() . '/partials/cart-items-sm.php';
		?>
	</div>
</section>

<?php
get_template_part('partials/course', 'legal');

get_footer();
?>