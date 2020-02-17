<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<?php
		if(is_front_page()) {
			get_template_part( 'templates/topheader', 'logo' );
		}
		?>
		<header id="siteHeader">
			<div class="marquee">
				<?php
				$lauftextSpacer = get_field('sys_lauftexte_spacer', 'option');
				while(have_rows('sys_lauftexte', 'option')) {
					the_row();
					the_sub_field('txt');
					echo '<span class="spacer">'.$lauftextSpacer.'</span>';
				}
				?>
			</div>
		</header>