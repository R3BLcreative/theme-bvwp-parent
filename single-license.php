<?php
get_header();

get_template_part('partials/license', 'hero');

get_template_part('partials/license', 'about');

if (get_field('reqs_display')) {
	get_template_part('partials/license', 'reqs');
}

get_template_part('partials/license', 'info');

get_template_part('partials/course', 'legal');

get_footer();
