<?php extract($args); ?>

<div class="sm:col-span-full md:col-span-4 even:md:col-span-5 lg:!col-span-6 bg-white border p-6 rounded-lg shadow-sm text-body group/card">
	<h3 class="h3 text-primary-700"><?php echo $title; ?></h3>
	<ul class="list-disc ml-8 my-4 text-base">
		<?php foreach ($items as $item) : ?>
			<li><?php echo $item['item_text']; ?></li>
		<?php endforeach; ?>
	</ul>
</div>