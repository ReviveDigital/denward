<?php
/* Template Name: Reviews */
get_header(); ?>
<?php include(locate_template('inc/page-banner.php')); ?>
<div class="testimonials">
    <div class="container">
        <div class="testimonials__content">
            <?php the_content(); ?>
        </div>
        <div class="testimonials__container">
            <?php if( have_rows('reviews', 'option') ):
                while ( have_rows('reviews', 'option') ) : the_row(); ?>
                        <div class="testimonials__entry">
                            <div class="testimonials__block">
                                <div class="testimonials__row">
                                    <div class="testimonials__col">
                                        <ul class="testimonials__stars">
                                            <li class="testimonials__star"><?php
                                            $ratings = '<i class="testimonials__icon fas fa-star"></i>';
                                            if(get_sub_field('rating') == '1' ) {
                                              echo $ratings;
                                            }
                                            elseif (get_sub_field('rating') == '2' ) {
                                              echo $ratings; echo $ratings;
                                            }
                                            elseif (get_sub_field('rating') == '3' ) {
                                              echo $ratings; echo $ratings; echo $ratings;
                                            }
                                            elseif (get_sub_field('rating') == '4' ) {
                                              echo $ratings; echo $ratings; echo $ratings; echo $ratings;
                                            }
                                            elseif (get_sub_field('rating') == '5' ) {
                                              echo $ratings; echo $ratings; echo $ratings; echo $ratings; echo $ratings;
                                            }
                                            ?></li>
                                    </ul>
                                    </div>
                                    <div class="testimonials__col testimonials__col--icon">
                                        <i class="testimonials__quote fal fa-quote-right"></i>
                                    </div>
                                </div>
                                <div class="testimonials__text">
                                    <?php the_sub_field('review'); ?>
                                </div>
                                <p class="testimonials__client">- <?php the_sub_field('client_name'); ?></p>
                            </div>
                        </div>
                        <?php
                 endwhile;
            endif; ?>
        </div>
    </div>
</div>
<?php include(locate_template('inc/cta.php')); ?>
<?php get_footer(); ?>
