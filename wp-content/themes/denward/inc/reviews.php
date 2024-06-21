<div class="reviews">
    <div class="container reviews__container">
        <div class="reviews__block reviews__block--about">
            <h2 class="reviews__title"><?php the_field('about_us_title', 'option'); ?></h2>
            <h5 class="reviews__subtitle"><?php the_field('about_us_subtitle', 'option'); ?></h5>
            <div class="reviews__content">
                <?php the_field('about_us_content', 'option'); ?>
            </div>
        </div>
        <div class="reviews__block reviews__block--reviews">
            <h2 class="reviews__heading">What our customers say</h2>
            <div class="reviews__slide">
                <?php if( have_rows('reviews', 'option') ):
                    while ( have_rows('reviews', 'option') ) : the_row(); ?>
                        <?php if (get_sub_field('display_on_carousel')) { ?>
                            <div class="reviews__extra">
                            <div class="reviews__box">
                                <div class="reviews__review"><?php the_sub_field('review'); ?></div>
                                <p class="reviews__client">- <?php the_sub_field('client_name'); ?></p>
                                <ul class="reviews__stars">
                                    <li class="reviews__star"><?php
                                    $ratings = '<i class="reviews__icon fas fa-star"></i>';
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
                        </div>
                        <?php } ?>
                    <?php endwhile;
                endif; ?>
            </div>
        </div>
    </div>
</div>
