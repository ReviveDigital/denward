<?php
/* Template Name: Home */
get_header(); ?>
<?php include(locate_template('inc/slider.php')); ?>


<div class="homepage-banner">
    <div class="container">
        <h1 class="homepage-banner__title">Delivering the Highest Standards in Pharmacy Equipment Manufacture and Supply</h1> 
    </div>
</div>


<div class="options">
    <div class="container options__container">
        <?php if( have_rows('product_categories_options') ):
            while ( have_rows('product_categories_options') ) : the_row(); ?>
                <div class="options__block">
                    <a class="options__link options__link--white" href="<?php the_sub_field('page_link'); ?>">
                        <?php $image = wp_get_attachment_image_src( get_sub_field('image'), 'full' ); ?>
                        <?php if ($image) { ?>
                            <img class="options__img" src="<?php echo $image[0]; ?>" alt="Denward">
                        <?php } else { ?>
                            <?php $image = wp_get_attachment_image_src( get_field('default_image', 'option'), 'full' ); ?>
                            <img class="options__img" src="<?php echo $image[0]; ?>" alt="Denward">
                        <?php } ?>
                    </a>
                    <a class="options__link" href="<?php the_sub_field('page_link'); ?>">
                        <h5 class="options__title"><?php the_sub_field('title'); ?></h5>
                    </a>

                </div>
            <?php endwhile;
        endif; ?>
        <div class="options__block options__block--img">
            <?php $image = wp_get_attachment_image_src( get_field('product_categories_cta_image'), 'full' ); ?>
                <?php if ($image) { ?>
                    <img class="options__cta-img" src="<?php echo $image[0]; ?>" alt="Denward">
                <?php } else { ?>
                    <?php $image_default_one = wp_get_attachment_image_src( get_field('default_image', 'option'), 'full' ); ?>
                    <img class="options__cta-img" src="<?php echo $image_default_one[0]; ?>" alt="Denward">
                <?php } ?>
            <div class="options__content">
                <h3 class="options__cta"><?php the_field('product_categories_cta_title'); ?></h3>
                <p class="options__text"><?php the_field('product_categories_cta_text'); ?><br>
                <a class="options__phone" href="tel:<?php echo str_replace(' ','',get_field('phone_number', 'option')); ?>"><?php the_field('phone_number', 'option'); ?></a></p>
            </div>
        </div>
    </div>
</div>
<?php include(locate_template('inc/special-offers.php')); ?>
<?php include(locate_template('inc/popular-products.php')); ?>
<?php include(locate_template('inc/create-account.php')); ?>
<?php include(locate_template('inc/cta.php')); ?>
<?php include(locate_template('inc/latest-news.php')); ?>
<?php include(locate_template('inc/reviews.php')); ?>
<?php get_footer(); ?>
