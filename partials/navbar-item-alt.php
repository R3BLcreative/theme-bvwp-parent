<?php extract($args); ?>

<div class="group relative <?php echo $class; ?>" aria-expanded="false">
	<a href="<?php echo $link; ?>" class="uppercase font-semibold tracking-widest py-3 text-white fill-white transition-all ease-in-out relative inline-block group-hover:text-accent group-hover:fill-accent" aria-label="<?php echo $label; ?>">

		<div class="flex flex-row flex-nowrap items-center justify-center gap-3 relative">
			<?php if ($icon) : ?>
				<i class="w-7 fill-inherit"><?php echo infinite_get_icon($icon); ?></i>
			<?php else : ?>
				<span><?php echo $label; ?></span>
			<?php endif; ?>

			<?php if (isset($subnav)) : ?>
				<i class="w-3 fill-inherit transition-all ease-in-out rotate-180 group-hover:rotate-0"><?php echo infinite_get_icon('chevron'); ?></i>
			<?php endif; ?>
		</div>
	</a>
</div>