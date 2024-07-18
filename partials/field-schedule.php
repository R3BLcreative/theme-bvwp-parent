<?php extract($args); ?>

<select id="course_schedule" name="course_schedule" class="w-full rounded-md text-body-300 text-xs tracking-wider">
	<option value="" disabled selected>Select a Schedule</option>
	<?php
	$scheds = get_field('course_dates', $id);

	foreach ($scheds as $sched) :
		// Filter past dates
		$now = strtotime('now');
		$start = strtotime($sched['start_date']);
		if ($now > $start) continue;

		// Format
		$value = $sched['start_date'];
		$value .= (!empty($sched['end_date'])) ? ' - ' . $sched['end_date'] : '';

		// Selected
		$isSelected = (isset($selected) && $selected == $value) ? 'selected' : '';
	?>
		<option value="<?php echo $value; ?>" <?php echo $isSelected; ?>>
			<?php echo $value; ?>
		</option>
	<?php endforeach; ?>
</select>