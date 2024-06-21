<?php get_header(); ?>
<?php get_template_part('inc/page-banner'); ?>
<div class="default">
    <div class="container">
        <div class="default__content">
            <?php the_content(); ?>
        </div>
    </div>
</div>
<?php get_template_part('inc/cta'); ?>
<?php get_footer(); ?>
