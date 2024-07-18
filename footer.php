</main>

<footer class="flex flex-col items-start justify-start bg-primary-800 text-white z-30 py-8" role="contentinfo" aria-label="Site Footer">

	<div class="infinite-grid !gap-5">

		<div class="col-span-full flex sm:flex-col md:flex-row items-center justify-between text-base font-semibold gap-6">

			<div class="flex sm:flex-col md:flex-row items-stretch sm:gap-6 lg:gap-12  sm:order-2 md:order-1">

				<span class="flex items-center gap-3">
					<i class="w-6 fill-neutral-700"><?php echo infinite_get_icon('directions'); ?></i>

					<a href="https://www.google.com/maps/dir/30.0215182,-95.761584/9623+Zaka+Rd,+Houston,+TX+77064/@29.9641604,-95.8100966,11z/data=!3m1!4b1!4m9!4m8!1m1!4e1!1m5!1m1!1s0x8640ce340e3173ed:0x1c388c14aa9e8c10!2m2!1d-95.5453636!2d29.9089129?entry=ttu" target="_blank" class="transition-all ease-in-out hover:text-secondary-200">
						9623 Zaka Rd
						<br />
						Houston, TX 77064
					</a>
				</span>

				<!-- <div class="sm:hidden md:block md:border-r md:border-r-borders-100"></div> -->

				<div class="flex flex-col gap-2">
					<!-- <span class="flex items-center gap-3">
						<i class="w-4 fill-neutral-700"><?php echo infinite_get_icon('phone'); ?></i>

						<a href="tel:832.805.5505" class="transition-all ease-in-out hover:text-secondary-200">
							832.805.5505
						</a>
					</span>

					<span class="flex items-center gap-3">
						<i class="w-4 fill-neutral-700"><?php echo infinite_get_icon('email'); ?></i>

						<a href="mailto:brazosvalleywp@gmail.com" class="transition-all ease-in-out hover:text-secondary-200">
							brazosvalleywp@gmail.com
						</a>
					</span> -->
				</div>

			</div>

			<a href="/" class="sm:order-1 md:order-2 transition-all ease-in-out fill-white hover:fill-secondary-200">
				<i class="w-[175px] fill-inherit block"><?php echo infinite_get_icon('logo_bvwp'); ?></i>
			</a>

		</div>

		<div class="col-span-full border-b border-b-borders-100"></div>

		<div class="col-span-full flex sm:flex-col lg:flex-row flex-nowrap items-center justify-between gap-8">
			<div class="text-xs sm:order-2 sm:text-center lg:text-left lg:order-1">
				&copy; Copyright <?php echo date('Y'); ?> Brazos Valley Water Protection // All Rights Reserved
			</div>

			<nav class="flex flex-row flex-nowrap items-center justify-end gap-6 sm:text-xs md:text-sm sm:order-1 lg:order-2" role="navigation" aria-label="Footer Navigation">
				<?php
				$items = wp_get_nav_menu_items('footer-menu');
				$menus = [];

				foreach ($items as $item) {
					$id = (!$item->menu_item_parent) ? $item->ID : $item->menu_item_parent;
					if (!$item->menu_item_parent) {
						$menus[$id] = [
							'label' => $item->title,
							'link' => $item->url,
							'borders' => (get_field('icon', $item)) ? false : true,
							'icon' => get_field('icon', $item),
						];
					}
				}

				foreach ($menus as $menu) {
					get_template_part('partials/footer-nav', 'item', $menu);
				}
				?>
			</nav>
		</div>

	</div>

</footer>

<!-- // Site Container -->
</div>

<?php wp_footer(); ?>

</body>

</html>