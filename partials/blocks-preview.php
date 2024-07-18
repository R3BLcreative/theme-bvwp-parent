<?php
// Renders a preview image in block editor selector instead of example data

$preview_uri = esc_url(get_theme_file_uri('blocks/' . $args['name'] . '/preview.png'));
?>

<img src="<?php echo $preview_uri; ?>" class="w-full h-auto" />