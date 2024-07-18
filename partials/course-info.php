<section class="infinite-section group/section">
	<div class="infinite-grid">
		<div class="col-span-full text-center">
			<h2 class="h2 text-secondary">Additional Information</h2>
			<p>Please read all of the information listed below prior to enrolling in this course.</p>
		</div>
	</div>

	<div class="infinite-grid mt-6">
		<?php
		get_template_part('partials/course-info', 'card', ['title' => 'Attendance', 'items' => get_field('attendance_list')]);

		get_template_part('partials/course-info', 'card', ['title' => 'CEU Credits Towards Other
		TCEQ Licenses', 'items' => get_field('credits_list')]);

		get_template_part('partials/course-info', 'card', ['title' => 'Rescheduling & Cancellations', 'items' => [
			['item_text' => 'Course enrollments can be transferred to another class if requested more than 5 business days prior to original course start date, and is subject to availability.'],
			['item_text' => 'Courses can be rescheduled 1 time for no fee if requested 5 business day or more prior to start date.'],
			['item_text' => 'Any cancellation requested within 5 business days prior to class, will only receive a 50% refund of that course price.'],
			['item_text' => 'Students who "no-show" to any course will not be entitled to any refund, transfer or reschedule for that course.'],
			['item_text' => 'For last minute hardships, please call to discuss options.'],
		]]);
		?>
	</div>
</section>