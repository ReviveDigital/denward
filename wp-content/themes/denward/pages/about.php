<?php
/* Template Name: About */
get_header(); ?>
<?php include(locate_template('inc/page-banner.php')); ?>
<div class="intro">
    <div class="container">
        <?php the_content(); ?>
    </div>
</div>
<div class="history">
    <div class="container">
        <div class="history__timeline">
            <?php if( have_rows('timeline') ):
                while ( have_rows('timeline') ) : the_row(); ?>
                <div class="history__row">
                    <div class="history__entry">
                        <i class="history__icon fal fa-plus-circle"></i>
                    </div>
                    <div class="history__block">
                        <div class="history__box">
                            <p class="history__date"><?php the_sub_field('date'); ?></p>
                            <h5 class="history__title"><?php the_sub_field('title'); ?></h5>
                            <div class="history__text">
                                <?php the_sub_field('content'); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endwhile;
            endif; ?>
        </div>
    </div>
</div>
<?php include(locate_template('inc/cta.php')); ?>
<?php get_footer(); ?>
