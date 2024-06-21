<div class="denward__sidebar">
    <?php if ( is_active_sidebar( 'sale-sidebar-widget' ) ) : ?>
            <?php dynamic_sidebar( 'sale-sidebar-widget' ); ?>
        <?php endif; ?>
    <?php get_template_part('inc/sidebar-cta'); ?>
</div>
