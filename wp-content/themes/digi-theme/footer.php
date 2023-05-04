		<?php
		$ft_menu_title_1 = get_field('ft_menu_title_1', 'option');
		$ft_menu_title_2 = get_field('ft_menu_title_2', 'option');
		$address = get_field('address', 'option');
		$phone_number_1 = get_field('phone_number_1', 'option');
		$phone_number_2 = get_field('phone_number_2', 'option');
		$phone_number_3 = get_field('phone_number_3', 'option');
		$phone_number_4 = get_field('phone_number_4', 'option');
		?>
		<footer itemscope itemtype="http://schema.org/WPFooter">
			<div class="container">
				<div class="footer-top">
					<div class="row">
						<div class="col-lg-8">
							<div class="footer-navigation d-flex">
								<div class="footer-nav-col">
									<h6 class="h6 footer-menu-title"><?= $ft_menu_title_1; ?></h6>
									<?php wp_nav_menu([
										'theme_location' => 'footer-menu-1',
										'menu_class' => 'footer-menu footer-menu-1',
										'container' => '',
									]); ?>
								</div>
								<div class="footer-nav-col">
									<h6 class="h6 footer-menu-title"><?= $ft_menu_title_2; ?></h6>
									<?php wp_nav_menu([
										'theme_location' => 'footer-menu-2',
										'menu_class' => 'footer-menu footer-menu-2',
										'container' => '',
									]); ?>
								</div>
								<div class="footer-nav-col">
									<?php wp_nav_menu([
										'theme_location' => 'footer-menu-3',
										'menu_class' => 'footer-menu footer-menu-3',
										'container' => '',
									]); ?>
								</div>
								<div class="footer-nav-col">
									<?php wp_nav_menu([
										'theme_location' => 'footer-menu-4',
										'menu_class' => 'footer-menu footer-menu-4',
										'container' => '',
									]); ?>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-12">
							<div class="footer-contact-info d-flex">
								<div class="footer-contact">
									<div itemscope itemtype="http://schema.org/Organization" id="logo">
										<a itemprop="url" href="<?php echo bloginfo('url') ?>">
											<img itemprop="logo" src="<?php echo get_template_directory_uri(); ?>/img/logo_white.svg">
										</a>
									</div>
									<p class="contact-info-title orange-text address-title">Address</p>
									<p class="address white-text"><?= $address; ?></p>
									<p class="contact-info-title orange-text phone-title">Number</p>
									<a href="tel:<?= $phone_number_1; ?>" class="phone white-text"><?= $phone_number_1; ?></a>
									<a href="tel:<?= $phone_number_2; ?>" class="phone white-text"><?= $phone_number_2; ?></a>
									<a href="tel:<?= $phone_number_3; ?>" class="phone white-text"><?= $phone_number_3; ?></a>
									<a href="tel:<?= $phone_number_4; ?>" class="phone white-text"><?= $phone_number_4; ?></a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="footer-bottom d-flex">
					<div class="copy">Copyright &copy; <?php echo date("Y") . ". All rights reserved."; ?></div>
					<div class="social">
						<span>Let’s Connect:</span>
						<?php
						if( have_rows('social_icons', 'option') ):
							while( have_rows('social_icons', 'option') ) : the_row();
								$icon = get_sub_field('icon');
								$social_url = get_sub_field('social_url'); ?>
								<a href="<?= $social_url; ?>" class="social-icon"><?= $icon; ?></a>
							<?php endwhile;
						endif; ?>
					</div>
				</div>
			</div>
		</footer>
		
		<?php wp_footer(); ?>
	</body>
</html>