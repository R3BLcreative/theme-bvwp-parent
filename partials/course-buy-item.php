<?php extract($args); ?>

<li class="grid grid-cols-[auto_1fr] items-center justify-start pb-2 gap-3 border-b border-b-body">
	<div class="w-5 h-5 fill-body-200">
		<?php echo infinite_get_icon($icon); ?>
	</div>
	<div class="font-semibold uppercase text-body-600">
		<?php echo $text; ?>
	</div>
</li>