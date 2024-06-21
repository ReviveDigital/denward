<?php
/* Template Name: Woocommerce */
get_header(); ?>
<?php get_template_part('inc/page-banner'); ?>
<div class="woo-page">
    <div class="container">
        <?php the_content(); ?>
    </div>
</div>
<?php get_footer(); ?>
