<?php extract($args); ?>

<a class="transition-all ease-in-out font-semibold hover:text-secondary-200 hover:fill-secondary-200 relative inline-flex flex-row flex-nowrap items-center justify-center gap-2 overflow-hidden border-b border-b-transparent group/button text-center" href="">

	<?php if ($icon) : ?>
		<i class="w-7 fill-inherit"><?php echo infinite_get_icon($icon); ?></i>
	<?php else : ?>
		<span><?php echo $label; ?></span>
	<?php endif; ?>

	<?php if ($borders) : ?>
		<span class="ease absolute left-0 right-0 bottom-0 mx-auto h-0 w-0 border-b border-b-secondary-200 opacity-0 transition-all duration-300 group-hover/button:w-full group-hover/button:opacity-100"></span>
	<?php endif; ?>
</a>