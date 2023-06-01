<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo wp_get_document_title(); ?></title>
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<!-- Generate favicon here http://www.favicon-generator.org/ -->
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php
$header_button = get_field('header_button', 'option');
$modal_sing_in = get_field('modal_sing_in', 'option');
$modal_register_url = get_field('modal_register_url', 'option');
?>
<header class="site-header" itemscope itemtype="http://schema.org/WPHeader">
	<div class="container flex-container header-items relative-parent">
		<div class="header-left">
			<div itemscope itemtype="http://schema.org/Organization" id="logo">
				<a itemprop="url" href="<?php echo bloginfo('url') ?>">
					<img itemprop="logo" src="<?php echo get_template_directory_uri(); ?>/img/logo.svg">
				</a>
			</div>
		</div>
		<nav itemscope itemtype="http://schema.org/SiteNavigationElement"><?php
				wp_nav_menu([
					'theme_location' => 'primary-menu',
					'menu_class' => 'main-menu',
					'container' => '',
				]); ?>
		</nav>
		<div class="header-right relative parent">
			<div id="burger-icon">
				<span></span>
				<span></span>
				<span></span>
			</div>
			<p class="primary-button header-button desktop-header-button"><?= $header_button['title']; ?></a>
		</div>
		<div class="custom-modal">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
					<div class="modal-header">
						<h5 class="sign-modal-title h-four" id="exampleModalLabel">Log in to find more features!</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<p class="modal-subtitle">Have access to additional services and solutions</p>
						<ul class="modal-list">
							<li>Detailed information about products</li>
							<li>Get information about of all current and past orders</li>
							<li>Managing personal account</li>
						</ul>
						<div class="modal-buttons d-flex">
							<a target="_blank" href="<?= $modal_sing_in; ?>" class="s-s-button primary-button">Sign in</a>
							<a target="_blank" href="<?= $modal_register_url; ?>" class="s-s-button secondary-button">Sign up</a>
						</div>
					</div>
					</div>
				</div>
		</div>
	</div>
</header>
<div class="mobile-menu">
	<div class="container">
		<div class="d-flex mobile-container">
			<div class="mobile-menu-block">
				<?php
				wp_nav_menu([
					'theme_location' => 'primary-menu',
					'menu_class' => 'mobile-menu-main',
					'container' => '',
				]); ?>
			</div>
			<p class="primary-button header-button" data-bs-toggle="modal" data-bs-target="#exampleModal"><?= $header_button['title']; ?></a>
		</div>
	</div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="sign-modal-title h-four" id="exampleModalLabel">Log in to find more features!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p class="modal-subtitle">Have access to additional services and solutions</p>
		<ul class="modal-list">
			<li>Detailed information about products</li>
			<li>Get information about of all current and past orders</li>
			<li>Managing personal account</li>
		</ul>
		<div class="modal-buttons d-flex">
			<a target="_blank" href="<?= $modal_sing_in; ?>" class="s-s-button primary-button">Sign in</a>
			<a target="_blank" href="<?= $modal_register_url; ?>" class="s-s-button secondary-button">Sign up</a>
		</div>
      </div>
    </div>
  </div>
</div>
<div class="modal-over"></div>