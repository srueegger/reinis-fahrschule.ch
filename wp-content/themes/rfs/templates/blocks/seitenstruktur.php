<?php
/* Dieser Block rendert die Seitenstruktur */
// Create id attribute allowing for custom "anchor" value.
$id = 'seitenstruktur-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$className = 'seitenstruktur';
if( !empty($block['className']) ) {
	$className .= ' ' . $block['className'];
}
$contents = get_field('block_seitenstruktur_pages');
if(!empty($contents)) {
	?>
	<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $className ); ?>">
		<div class="row seitenstruktur-container">
			<?php
			global $post;
			foreach($contents as $post) {
				setup_postdata( $post );
				$image = get_field('page_image', get_the_ID());
				?>
				<div class="col-12 col-lg-6 seitenstruktur-item">
					<a href="<?php the_permalink(); ?>" class="no-line" target="_self">
						<div class="yellow-btn">
							<?php
							if(!empty($image)) {
								/* Code geht von SVG Bilder aus, daher kein ausführliches Picture Element */
								echo '<div class="image-container"><picture><img src="'.$image['url'].'" class="image" alt="'.$image['alt'].'"></picture></div>';
							}
							the_title('<div class="inner">', '</div>');
							?>
						</div>
					</a>
				</div>
				<?php
			}
			wp_reset_postdata();
			?>
		</div>
	</div>
	<?php
}