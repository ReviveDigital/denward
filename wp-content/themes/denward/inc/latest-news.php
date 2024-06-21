<div class="latest">
    <div class="container latest__container">
        <div class="latest__block">
            <h2 class="latest__title"><?php the_field('latest_news_title', 'option'); ?></h2>
            <p class="latest__content"><?php the_field('latest_news_content', 'option'); ?></p>
            <a class="latest__btn" href="<?php echo esc_url(home_url('/news/')); ?>">View more</a>
        </div>

        <div class="latest__block latest__block--articles">
            <div class="latest__row">
            <?php $the_query = new WP_Query( array(
                   'post_type' => 'post',
                   'posts_per_page' => 2,
               ));
               if ( $the_query->have_posts() ) :
                    while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                     <div class="latest__entry">
                        <p class="latest__date"><?php echo get_the_date( 'd/m/Y' ); ?></p>
                        <a class="latest__link" href="<?php the_permalink(); ?>">
    					   <?php if ( has_post_thumbnail() ) {
    						  the_post_thumbnail('blog');
    						} else {
    						  $image_blog = wp_get_attachment_image_src( get_field('default_image', 'option'), 'blog' ); ?>
    						  <img class="latest__img" src="<?php echo $image_blog[0]; ?>" alt="News">
    					   <?php } ?>
    					</a>
                        <div class="latest__box">
                            <h4 class="latest__heading"><a href="<?php the_permalink(); ?>" class="latest__link-title"><?php the_title(); ?></a></h4>
                            <div class="latest__text">
                                <?php echo excerpt(18); ?>
                            </div>
                            <a href="<?php the_permalink(); ?>" class="latest__more">View more <i class="latest__read fas fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                    <?php endwhile;
                     wp_reset_postdata();
                 endif; ?>
             </div>
         </div>
    </div>
</div>
