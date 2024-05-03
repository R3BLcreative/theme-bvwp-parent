<?php
/* Template Name: Thank You */

session_start();
session_destroy();

get_header();

if (have_posts()) {
	while (have_posts()) {
		the_post();

		the_content();
	}
}

get_footer();
