<?php
/* Template Name: Accreditations */
get_header(); ?>
<?php include(locate_template('inc/page-banner.php')); ?>
<div class="accreditations">
    <div class="container">
        <div class="accreditations__intro">
            <?php the_content(); ?>
        </div>
        <?php if( have_rows('accreditations') ):
            while ( have_rows('accreditations') ) : the_row(); ?>
            <div class="accreditations__container">
                <div class="accreditations__img">
                    <?php $image = wp_get_attachment_image_src( get_sub_field('image'), 'medium' ); ?>
                    <?php if ($image) { ?>
                        <img class="accreditations__image" src="<?php echo $image[0]; ?>" alt="Denward">
                    <?php } else { ?>
                        <?php $image_default_one = wp_get_attachment_image_src( get_field('default_image', 'option'), 'medium' ); ?>
                        <img class="accreditations__image" src="<?php echo $image_default_one[0]; ?>" alt="Denward">
                    <?php } ?>
                </div>
                <div class="accreditations__block">
                    <h4 class="accreditations__title"><?php the_sub_field('title'); ?></h4>
                    <div class="accreditations__content">
                        <?php the_sub_field('text'); ?>
                    </div>
                </div>
            </div>
            <?php endwhile;
        endif; ?>
    </div>
</div>
<?php include(locate_template('inc/cta.php')); ?>
<?php get_footer(); ?>
