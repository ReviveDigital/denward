<?php
/* Template Name: Register */
get_header(); ?>
<?php include(locate_template('inc/page-banner.php')); ?>
<div class="register">
    <div class="container">
        <?php echo do_shortcode('[gravityform id="1" title="false" description="false" ajax="true"]'); ?>
    </div>
</div>
<?php get_footer(); ?>
