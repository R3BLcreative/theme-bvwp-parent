<?php extract($args); ?>

<div class="group relative smOnly:text-center <?php echo $class; ?>" aria-expanded="false">
	<a href="<?php echo $link; ?>" class="uppercase font-semibold tracking-widest py-3 text-white fill-white transition-all ease-in-out relative inline-block group-hover:md:text-accent group-hover:md:fill-accent smOnly:text-primary-800 smOnly:fill-primary-800 smOnly:hover:text-accent-600 smOnly:text-xl" aria-label="<?php echo $label; ?>">

		<div class="flex flex-row flex-nowrap items-center justify-center gap-3 relative">
			<?php if ($icon) : ?>
				<i class="w-7 fill-inherit">
					<?php echo infinite_get_icon($icon); ?>

					<?php if ($icon == 'cart' && $_SESSION['cart']['count'] > 0) : ?>
						<div class="absolute -top-3 -right-3 rounded-full overflow-hidden bg-secondary text-[9px] text-body-600 flex items-center justify-center w-5 h-5">
							<?php echo $_SESSION['cart']['count']; ?>
						</div>
					<?php endif; ?>
				</i>
			<?php else : ?>
				<span><?php echo $label; ?></span>
			<?php endif; ?>

			<?php if (isset($subnav)) : ?>
				<i class="w-3 fill-inherit transition-all ease-in-out rotate-180 group-hover:rotate-0 smOnly:hidden"><?php echo infinite_get_icon('chevron'); ?></i>
			<?php endif; ?>
		</div>

		<?php if ($borders) : ?>
			<span class="ease absolute left-0 right-0 top-0 mx-auto h-0 w-0 border-t-2 border-t-accent opacity-0 transition-all duration-300 group-hover:md:w-full group-hover:md:opacity-100"></span>
			<span class="ease absolute left-0 right-0 bottom-0 mx-auto h-0 w-0 border-b-2 border-b-accent opacity-0 transition-all duration-300 group-hover:md:w-full group-hover:md:opacity-100"></span>
		<?php endif; ?>
	</a>

	<?php if (isset($subnav)) : ?>
		<div class="ease-in-out absolute left-3 top-[52px] max-h-0 min-w-[250px] w-full shadow-md overflow-hidden rounded-md bg-white transition-all duration-500 flex flex-col items-stretch justify-start gap-0 text-primary-700 text-base font-semibold group-hover:md:max-h-[999px] smOnly:w-[75%] smOnly:mx-auto smOnly:static smOnly:bg-transparent smOnly:shadow-none smOnly:text-lg smOnly:font-normal smOnly:max-h-[999px] smOnly:opacity-100">

			<?php foreach ($subnav as $item) : ?>
				<a href="<?php echo $item['link']; ?>" class="block p-4 hover:text-accent-600">
					<?php echo $item['label']; ?>
				</a>

				<div class="border-b border-b-neutral sm:w-1/2 smOnly:mx-auto md:w-full last:hidden"></div>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>
</div>

<div class="border-b border-b-neutral-600 sm:w-1/2 smOnly:mx-auto md:hidden last:hidden"></div>