<nav id="main-menu" role="navigation" aria-label="Site Navigation" class="md:col-span-6 lg:col-span-9 xl:col-span-10 flex md:flex-row md:flex-nowrap md:items-center md:justify-end md:gap-10 smOnly:h-0 smOnly:max-h-0 smOnly:overflow-hidden smOnly:transition-all smOnly:ease-in-out smOnly:duration-300 smOnly:absolute smOnly:top-[90px] smOnly:left-0 smOnly:w-full smOnly:py-0 smOnly:flex-col smOnly:gap-4 smOnly:bg-surface-translucent smOnly:backdrop-blur-sm smOnly:shadow-lg aria-expanded:smOnly:max-h-screen aria-expanded:smOnly:h-screen aria-expanded:smOnly:py-6" aria-expanded="false">

	<?php
	$items = wp_get_nav_menu_items('main-menu');
	$menus = [];

	foreach ($items as $item) {
		$id = (!$item->menu_item_parent) ? $item->ID : $item->menu_item_parent;
		if (!$item->menu_item_parent) {
			$menus[$id] = [
				'label' => $item->title,
				'link' => $item->url,
				'borders' => (get_field('icon', $item)) ? false : true,
				'icon' => get_field('icon', $item),
				'class' => (get_field('icon', $item)) ? 'smOnly:hidden' : '',
			];
		} else {
			$menus[$id]['subnav'][] = [
				'label' => $item->title,
				'link' => $item->url,
			];
		}
	}

	foreach ($menus as $menu) {
		get_template_part('partials/navbar', 'item', $menu);
	}
	?>
</nav>

<div class="md:hidden col-span-2 flex flex-row items-center justify-end gap-6">
	<?php
	foreach ($menus as $menu) {
		if ($menu['icon']) {
			unset($menu['class']);
			get_template_part('partials/navbar', 'item-alt', $menu);
		}
	}
	?>
	<button id="burger" class="group/burger relative w-[28px] h-[28px] fill-white hover:fill-accent" data-controls="main-menu" aria-expanded="false">
		<i class="w-7 h-7 absolute top-0 left-0 opacity-100 transition-all ease-in-out group-aria-expanded/burger:opacity-0">
			<?php echo infinite_get_icon('bars'); ?>
		</i>
		<i class="w-7 h-7 absolute top-0 left-0 opacity-0 transition-all ease-in-out group-aria-expanded/burger:opacity-100 group-aria-expanded/burger:rotate-180">
			<?php echo infinite_get_icon('close'); ?>
		</i>
	</button>
</div>