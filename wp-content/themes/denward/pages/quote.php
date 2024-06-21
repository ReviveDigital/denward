<?php
/* Template Name: Request a quote */
get_header(); ?>
<?php include(locate_template('inc/page-banner.php')); ?>
<div class="request">
    <div class="container">
        <div class="request__intro">
            <?php the_content(); ?>
        </div>
        <?php echo do_shortcode('[gravityform id="3" title="false" description="false" ajax="true"]'); ?>
    </div>
</div>
<?php include(locate_template('inc/cta.php')); ?>
<?php get_footer(); ?>
