<?php
/* Template Name: Thank you */
get_header(); ?>
<?php include(locate_template('inc/page-banner.php')); ?>
<div class="thanks">
    <div class="container">
        <h2 class="thanks__check"><i class="thanks__icon fas fa-check-circle"></i></h2>
        <?php if ($_GET['form'] == 'quote') { ?>
			<p>Thank you for requesting a quote. A member of the team will be in touch shortly.</p>
        <?php } elseif ($_GET['form'] == 'register') {  ?>
            <p>Thank you for registering.</p>
		<?php } else {
         	the_content();
	 	} ?>
        <div class="thanks__button">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="thanks__btn">Return home</a>
        </div>
    </div>
</div>
<?php include(locate_template('inc/cta.php')); ?>
<?php get_footer(); ?>
