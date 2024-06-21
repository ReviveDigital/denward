<div class="hero">
    <?php $image = wp_get_attachment_image_src( get_field('page_banner_image', 'option'), 'full' ); ?>
    <div class="hero__img" style="background-image:url(<?php echo $image[0] ?>);">
        <div class="container hero__container">
            <div class="hero__block">

                <?php if (is_singular('post')) { ?>
                    <div class="hero__title hero__title--size">
                        <?php echo 'News'; ?>
                    </div>
                    <?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb(); } ?>
                <?php } elseif (is_archive()) {
                    echo '<h1 class="hero__title">';
                    single_cat_title();
                    echo '</h1>';
                } else { ?>
                <h1 class="hero__title"><?php the_title(); ?></h1>
                <?php if (is_singular('product')) { ?>
                    <?php woocommerce_breadcrumb(); ?>
                <?php } else { ?>
                    <?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb(); } ?>
                <?php } ?>
            <?php }?>
            </div>
        </div>
    </div>
</div>
