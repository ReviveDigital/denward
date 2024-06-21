<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="stylesheet" href="https://use.typekit.net/dpz7mfa.css">
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon/favicon.ico" type="image/x-icon" />
	<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon/apple-touch-icon.png" />
	<link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_template_directory_uri(); ?>/images/favicon/apple-touch-icon-57x57.png" />
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/images/favicon/apple-touch-icon-72x72.png" />
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_template_directory_uri(); ?>/images/favicon/apple-touch-icon-76x76.png" />
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/images/favicon/apple-touch-icon-114x114.png" />
	<link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_template_directory_uri(); ?>/images/favicon/apple-touch-icon-120x120.png" />
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/images/favicon/apple-touch-icon-144x144.png" />
	<link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_template_directory_uri(); ?>/images/favicon/apple-touch-icon-152x152.png" />
	<!-- Google tag (gtag.js) --> 
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-1J7CWL17EV"></script> <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'G-1J7CWL17EV'); </script>
	<?php wp_head(); ?>
	<script>
	var siteURL = '<?php echo esc_url(home_url('/')); ?>';
	var directoryURL = '<?php echo get_template_directory_uri(); ?>';
	</script>
</head>
<body <?php body_class(); ?> >
<?php 
?>
<!-- share facebook -->
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v3.2"></script>
<header class="header">
	<div class="container header__container">
		<div class="header__row">
			<div class="header__logo">
				<a class="header__logo-link" href="<?php echo esc_url(home_url('/')); ?>">
					<img class="header__img" src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="Denward">
				</a>
			</div>
			<div class="header__col">
				<?php if ( is_active_sidebar( 'search-widget' ) ) : ?>
				   <?php dynamic_sidebar( 'search-widget' ); ?>
				<?php endif; ?>
				<a class="header__button" href="<?php echo esc_url(home_url('/request-a-quote/')); ?>">Request a quote</a>
				<ul class="header__list">
					<li class="header__item"><a href="<?php echo esc_url(home_url('/my-account/')); ?>"><i class="header__icon fas fa-user"></i></a></li>
					<li class="header__item header__item--extra"><a href="<?php echo esc_url(home_url('/my-account/wishlist/')); ?>"><i class="header__icon fas fa-heart"></i></a></li>
					<li class="header__item header__item--hidden"><a href="#" id="header__dropdown-search"><i class="header__icon fal fa-search"></i></a></li>
					<li class="header__item header__item--basket">
						<?php global $woocommerce;
						$total = $woocommerce->cart->get_cart_total();
						?>
						<a class="header__basket-link" href="<?php echo wc_get_cart_url(); ?>">
							<img class="header__basket-icon" src="<?php echo get_template_directory_uri(); ?>/images/shopping-basket.png" alt="Denward">
							<span class="header__total cart-customlocation"><?php echo $total; ?></span>
						</a>
						<div class="header__cart-hover">
							<?php woocommerce_mini_cart(); ?>
						</div>
					</li>
					<li class="header__item header__item--hidden"><a class="header__toggle" data-target="#main-navigation"><i class="header__icon fal fa-bars"></i></a></li>
				</ul>
			</div>
		</div>
	</div>
	<hr class="header__hr">
	<div class="container header__container">
		<nav class="main-nav header__nav">
			<div id="main-navigation" class="header__menu m-menu">
				<?php wp_nav_menu( array ('menu' => 'Main Navigation') ); ?>
			</div>
		</nav>
	</div>
</header>
