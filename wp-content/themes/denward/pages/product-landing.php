<?php
/* Template Name: Product Landing */
get_header(); ?>
<div class="slider-landing">
    <div class="container slider-landing__slider">
        <?php if( have_rows('slider') ):
            while( have_rows('slider') ) : the_row(); ?>
            <div class="slider-landing__container">
                <div class="slider-landing__block slider-landing__block--text">
                    <h1 class="slider-landing__title"><?php the_sub_field('title'); ?></h1>
                    <div class="slider-landing__text">
                        <?php the_sub_field('text'); ?>
                    </div>
                    <?php if (get_sub_field('button_link')) {
                    $link = get_sub_field('button_link');
                    if( $link ):
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                    <a target="<?php echo esc_attr( $link_target ); ?>" rel="noreferrer" href="<?php echo esc_url( $link_url ); ?>" class="slider-landing__btn carousel__button"><?php the_sub_field('button_text'); ?></a>
                <?php endif; } ?>
                </div>
                <div class="slider-landing__block slider-landing__block--img">
                    <?php $imagefield = get_sub_field('image');
                        $image = wp_get_attachment_image_src( $imagefield, 'slider-product' );
                        $alt = get_post_meta($imagefield , '_wp_attachment_image_alt', true); ?>
                        <?php if ($image) { ?>
                            <img class="slider-landing__img" src="<?php echo $image[0]; ?>" alt="<?php echo $alt; ?>">
                        <?php } else { ?>
                            <img class="slider-landing__img" src="<?php echo $image[0]; ?>" alt="Denward">
                        <?php } ?>
                </div>
            </div>
            <?php endwhile;
        endif; ?>
    </div>
</div>
<?php if( have_rows('page_builder') ) {
    while ( have_rows('page_builder') ) {
    	the_row();
         if( get_row_layout() == 'blue_banner' ) { ?>
             <div class="blue-banner">
                 <div class="container blue-banner__container">
                     <?php if( have_rows('banner') ):
                         while( have_rows('banner') ) : the_row(); ?>
                            <div class="blue-banner__block">
                                <i class="blue-banner__icon fas fa-check-circle"></i>
                                <p class="blue-banner__text"><?php the_sub_field('text'); ?></p>
                            </div>
                         <?php endwhile;
                     endif;?>
                 </div>
             </div>
         <?php } elseif( get_row_layout() == 'image_&_content' ) { ?>
             <div class="icontent icontent__<?php the_sub_field('theme'); ?>">
                 <div class="container icontent__container">
                     <div class="icontent__block">
                         <h2 class="icontent__heading"><?php the_sub_field('title'); ?></h2>
                         <div class="icontent__text">
                             <?php the_sub_field('content'); ?>
                         </div>
                         <?php if (get_sub_field('button_link')) {
                         $link = get_sub_field('button_link');
                         if( $link ):
                             $link_url = $link['url'];
                             $link_title = $link['title'];
                             $link_target = $link['target'] ? $link['target'] : '_self';
                         ?>
                         <a target="<?php echo esc_attr( $link_target ); ?>" rel="noreferrer" href="<?php echo esc_url( $link_url ); ?>" class="icontent__btn carousel__button"><?php the_sub_field('button_text'); ?></a>
                     <?php endif; } ?>

                     </div>
                     <div class="icontent__block">
                         <?php if( get_sub_field('video_or_image') == 'image' ) { ?>
                             <?php $imagefield = get_sub_field('image');
                                 $image = wp_get_attachment_image_src( $imagefield, 'landing' );
                                 $alt = get_post_meta($imagefield , '_wp_attachment_image_alt', true); ?>
                                 <?php if ($image) { ?>
                                     <img class="icontent__img" src="<?php echo $image[0]; ?>" alt="<?php echo $alt; ?>">
                                 <?php } else { ?>
                                     <img class="icontent__img" src="<?php echo $image[0]; ?>" alt="Denward">
                                 <?php } ?>
                         <?php } elseif( get_sub_field('video_or_image') == 'video' ) { ?>
                             <?php the_sub_field('video'); ?>
                         <?php } ?>
                     </div>
                 </div>
             </div>
         <?php } elseif( get_row_layout() == 'products') { ?>
             <div class="carousel">
                 <div class="container">
                     <div class="carousel__container">
                         <div class="carousel__block">
                             <h2 class="carousel__title"><?php the_sub_field('title'); ?></h2>
                             <div class="carousel__content">
                                 <?php the_sub_field('description'); ?>
                             </div>
                         </div>
                         <div class="carousel__arrows">
                             <span class="carousel__arrow carousel__arrow--prev"><i class="carousel__arrow-icon fa fa-long-arrow-left"></i></span>
                             <span class="carousel__arrow carousel__arrow--next"><i class="carousel__arrow-icon fa fa-long-arrow-right"></i></span>
                         </div>
                     </div>
                     <div class="carousel__slider">
                         <?php if( get_sub_field('type') == 'own' ) { ?>
                             <?php do_action( 'woocommerce_before_shop_loop' );
                             woocommerce_product_loop_start();
                             $args = array(
                                 'post_type' => 'product',
                                 'post__in' => get_sub_field('own_products'),
                                 'posts_per_page' => -1,
                             );
                             $loop = new WP_Query( $args );
                             while ( $loop->have_posts() ) : $loop->the_post();
                             global $product;

                             include(locate_template('woocommerce/content-product.php'));
                             endwhile; ?>
                             <?php woocommerce_product_loop_end();
                             do_action( 'woocommerce_after_shop_loop' ); ?>
                             <?php wp_reset_query(); ?>
                        <?php } elseif( get_sub_field('type') == 'other' ) { ?>
                            <ul class="products">
                                <?php if( have_rows('other_products') ):
                                    while( have_rows('other_products') ) : the_row(); ?>
                                     <li class="product carousel__other-product">
                                        <?php $imagefield = get_sub_field('image');
                                            $image = wp_get_attachment_image_src( $imagefield, 'full' );
                                            $alt = get_post_meta($imagefield , '_wp_attachment_image_alt', true); ?>
                                            <?php if ($image) { ?>
                                                <img class="carousel__main-img" src="<?php echo $image[0]; ?>" alt="<?php echo $alt; ?>">
                                            <?php } else { ?>
                                                <img class="carousel__main-img" src="<?php echo $image[0]; ?>" alt="Denward">
                                            <?php } ?>
                                            <h2 class="woocommerce-loop-product__title"><?php the_sub_field('title'); ?></h2>
                                            <p class="carousel__price"><?php the_sub_field('price'); ?></p>

                                            <?php $link = get_sub_field('link');
                                            if( $link ):
                                                $link_url = $link['url'];
                                                $link_title = $link['title'];
                                                $link_target = $link['target'] ? $link['target'] : '_self';
                                            ?>
                                            <a target="<?php echo esc_attr( $link_target ); ?>" rel="noreferrer" href="<?php echo esc_url( $link_url ); ?>" class="carousel__other-btn carousel__button">View product</a>
                                        <?php endif; ?>

                                        </li>
                                    <?php endwhile;
                                endif; ?>
                            </ul>
                        <?php } ?>
                    </div>
                 </div>
             </div>
        <?php } elseif( get_row_layout() == 'form') { ?>
            <div class="lquote" id="lquote-section">
                <div class="container">
                    <div class="lquote__container">
                        <div class="lquote__block">
                            <h2 class="lquote__title"><?php the_sub_field('form_title'); ?></h2>
                            <p class="lquote__text"><?php the_sub_field('form_description'); ?></p>
                        </div>
                    </div>
                    <?php echo do_shortcode('[gravityform id="'. get_sub_field('form') .'" title="false" description="false" ajax="true"]'); ?>
                </div>
            </div>
        <?php } }
    } ?>
<?php get_footer(); ?>
