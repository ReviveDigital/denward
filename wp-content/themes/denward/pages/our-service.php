<?php
/* Template Name: Our service */
get_header(); ?>
<?php include(locate_template('inc/page-banner.php')); ?>
<div class="service">
    <div class="container">
        <div class="service__content">
            <?php the_content(); ?>
        </div>
        <div class="service__container">
            <?php $parent = 108;
            $our_pages = get_posts( array(
                'post_type' => 'page',
                'child_of' => $parent,
                'parent' => $parent,
                'order'     => 'ASC',
                'meta_key' => 'sort_order',
                'orderby'   => 'meta_value',
                'hide_empty'=> -1,
                'posts_per_page'=> -1
                // 'sort_column' => 'menu_order'
            ) ); ?>
            <?php if (!empty($our_pages)): ?>
                <?php foreach ($our_pages as $key => $page_item): ?>
                    <div class="service__entry">
                        <a class="service__link" href="<?php echo esc_url(get_permalink($page_item->ID)); ?>">
                            <?php echo get_the_post_thumbnail($page_item->ID,'full'); ?>
                        </a>
                        <div class="service__box">
                            <h5 class="service__heading"><a class="service__heading-link" href="<?php echo esc_url(get_permalink($page_item->ID)); ?>"><?php echo $page_item->post_title ; ?></a></h5>
                            <p class="service__text"><?php echo get_post_meta( $page_item->ID, 'service_introduction', true); ?></p>
                            <a class="service__more" href="<?php echo esc_url(get_permalink($page_item->ID)); ?>">View more <i class="service__icon fa fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                <?php endforeach ?>
            <?php endif ?>
        </div>
    </div>
</div>
<?php include(locate_template('inc/cta.php')); ?>
<?php get_footer(); ?>
