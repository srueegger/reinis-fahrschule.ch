<?php
/***************************************
 * Individuelle Gutenberg Blocks
 ***************************************/
function rfs_register_acf_block_types() {
	/* Link Struktur */
	acf_register_block_type(array(
		'name' => 'seitenstruktur',
		'title' => 'Seiten Struktur',
		'description' => 'Dieser Block rendert die Seitenstruktur von reinis-fahrschule.ch',
		'render_template' => 'templates/blocks/seitenstruktur.php',
		'category' => 'layout',
		'icon' => 'editor-table',
		'keywords' => array( 'seitenstruktur', 'links', 'gelb', 'kasten' ),
		'mode' => 'edit'
	));
}

if( function_exists('acf_register_block_type') ) {
	add_action('acf/init', 'rfs_register_acf_block_types');
}