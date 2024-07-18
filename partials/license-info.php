<section class="infinite-section group/section">
	<div class="infinite-grid">
		<div class="col-span-full text-center">
			<h2 class="h2 group-even/section:text-primary-700 group-odd/section:text-secondary uppercase">Continuing Education and License Renewals</h2>
			<p>Please visit the <a href="https://www.tceq.texas.gov/licensing/licenses/requirements" target="_blank" class="btn_tertiary">TCEQ</a> for more detailed information about license requirements</p>
		</div>
	</div>

	<div class="infinite-grid mt-6">
		<?php
		get_template_part('partials/license-info', 'card', ['title' => 'Education', 'items' => get_field('edu_list')]);

		get_template_part('partials/license-info', 'card', ['title' => 'Renewal', 'items' => get_field('renew_list')]);
		?>
	</div>
</section>