<div class="special">
    <div class="container special__container">
        <?php if( have_rows('special_offer', 'option') ): ?>
            <?php while( have_rows('special_offer', 'option') ): the_row(); ?>
                <?php $post_object = get_sub_field('product'); ?>
                <?php if( $post_object ): ?>
                    <?php
                    $post = $post_object;
                    setup_postdata( $post );
                    ?>
                    <div class="special__slider">
                        <div class="special__img">
                            <a class="special__link" href="<?php the_permalink(); ?>">
                                <?php if (has_post_thumbnail( $loop->post->ID ))
                                echo get_the_post_thumbnail($loop->post->ID, 'special');
                                else echo '<img src="'.woocommerce_placeholder_img_src().'" />'; ?>
                            </a>
                        </div>
                        <div class="special__col">
                            <h3 class="special__title"><?php the_sub_field('title'); ?></h3>
                            <h2 class="special__offer"><?php the_sub_field('offer'); ?></h2>
                            <a class="special__name" href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>
                            <div class="special__content">
                                <?php the_sub_field('content'); ?>
                            </div>
                            <a class="special__button" href="<?php the_permalink(); ?>"><?php the_sub_field('button_text'); ?></a>
                        </div>
                    </div>
                    <?php wp_reset_postdata(); ?>
                <?php endif; ?>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</div>
