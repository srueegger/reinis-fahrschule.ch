		<footer id="siteFooter">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-12 col-lg-3">
						<p class="mb-0">&copy; reinis-fahrschule.ch <?php echo date('Y'); ?></p>
					</div>
					<div class="col-12 col-lg-7">
						<?php
						/* Footer Menü ausgeben - sofern vorhanden */
						$menuLocations = get_nav_menu_locations();
						$menuItems = wp_get_nav_menu_items( $menuLocations['footer-menu'] );
						if(!empty($menuItems)) {
							echo '<ul id="footerMenu">';
							foreach($menuItems as $menuItem) {
								$target = '_self';
								if($menuItem->target != '') {
									$target = '_blank';
								}
								echo '<li><a target="'.$target.'" href="'.$menuItem->url.'">'.$menuItem->title.'</a></li>';
							}
							echo '</ul>';
						}
						?>
					</div>
				</div>
			</div>
		</footer>
		<?php wp_footer(); ?>
	</body>
</html>