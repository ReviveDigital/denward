<?php
/* Template Name: Subpage */
get_header(); ?>
<?php include(locate_template('inc/page-banner.php')); ?>
<div class="subpage">
    <div class="container subpage__container">
        <div class="subpage__sidebar">
            <?php get_sidebar('subpage'); ?>
        </div>
        <div class="subpage__block">
            <?php the_content(); ?>
        </div>
    </div>
</div>
<?php include(locate_template('inc/cta.php')); ?>
<?php include(locate_template('inc/latest-news.php')); ?>
<?php include(locate_template('inc/reviews.php')); ?>
<?php get_footer(); ?>
