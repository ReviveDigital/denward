<?php if (is_search()) { ?>
    <div class="denward__sidebar">
        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("sidebar-search-widget") ) :
             dynamic_sidebar( 'sidebar-search-widget' ); ?>
         <?php endif;?>
        <?php get_template_part('inc/sidebar-cta'); ?>
    </div>
<?php } else { ?>
    <div class="denward__sidebar">
        <?php if (is_shop()) { ?>

        <?php } else { ?>
            <div id="denward__mobile" class="denward__refine">
                <a class="denward__close"><i class="denward__icon-close fal fa-times"></i></a>
                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("sidebar") ) :
                     dynamic_sidebar( 'sidebar' ); ?>
                 <?php endif;?>
                 <a class="denward__filter-btn">Close</a>
            </div>
        <?php } ?>
        <?php get_template_part('inc/sidebar-cta'); ?>
    </div>
<?php } ?>
