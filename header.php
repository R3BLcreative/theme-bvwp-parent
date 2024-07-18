<!DOCTYPE html>

<html <?php language_attributes(); ?> class="scroll-smooth">

<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="facebook-domain-verification" content="5110pkmkunmoqh9zx47bjng5ggbr3x" />

	<link rel="icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico" />

	<?php
	session_start();
	if (!isset($_SESSION['cart'])) {
		$_SESSION['cart']['items'] = [];
		$_SESSION['cart']['total'] = 0;
	}

	$_SESSION['cart']['count'] = count($_SESSION['cart']['items']);

	wp_head();
	?>
</head>

<body <?php body_class('font-sans font-normal sm:text-sm md:text-base lg:text-lg tracking-wide text-body antialiased leading-normal infinite-blocks-css'); ?> id="site">

	<?php wp_body_open(); ?>

	<button tabindex="0" class="block opacity-0 h-0 w-0 fixed top-3 overflow-hidden font-semibold bg-blue text-white rounded-md px-6 focus:h-fit focus:w-fit focus:opacity-100" onclick="document.location+='#content';return false;">Skip to main content</button>

	<!-- Site Container -->
	<div id="infinite-frontend" class="max-w-xl mx-auto relative shadow-md">

		<header class="flex flex-col items-start justify-center bg-primary fixed top-0 z-50 w-full max-w-xl h-navbar border-b border-b-white shadow-header text-white" role="banner" aria-label="Site Header">
			<div class="infinite-grid items-center">
				<div class="sm:col-span-2 md:col-span-3 lg:col-span-3 xl:col-span-2">
					<a href="/" class="transition-all ease-in-out fill-white hover:fill-accent" aria-label="Back to site home">
						<i class="w-[175px] block"><?php echo infinite_get_icon('logo_bvwp'); ?></i>
					</a>
				</div>

				<?php get_template_part('partials/navbar', 'base'); ?>
			</div>
		</header>

		<div class="h-navbar z-40"></div>

		<main role="main" id="content" tabindex="-1" aria-label="Main content" class="z-30">