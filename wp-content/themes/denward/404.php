<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Denward
 */

get_header(); ?>
<div class="error">
	<div class="container error__container">
		<div class="error__block">
			<h1 class="error__title">404</h1>
			<p class="error__text">Oops...page not found!</p>
			<div class="error__button">
				<a href="<?php echo esc_url(home_url('/')); ?>" class="error__btn">Go back</a>
			</div>
		</div>
	</div>
</div>
<?php
get_footer();
