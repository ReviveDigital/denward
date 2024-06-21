<div class="slider">
    <?php if( have_rows('slider', 'option') ):
    	while ( have_rows('slider', 'option') ) : the_row(); ?>
            <?php if( get_sub_field('link_type') == 'Page / Product' ) { ?>
                <a target="_blank" href="<?php the_sub_field('link'); ?>">
            <?php } elseif( get_sub_field('link_type') == 'Category / Subcategory' ) { ?>
                <a target="_blank" href="<?php echo get_term_link( get_sub_field( 'category_link' ) ); ?>">
            <?php }  ?>
                <?php $image = wp_get_attachment_image_src( get_sub_field('image'), 'slide' ); ?>
                <?php if ($image) { ?>
                    <img class="slider__img" src="<?php echo $image[0]; ?>" alt="Denward">
                <?php } else { ?>
                    <?php $image = wp_get_attachment_image_src( get_field('default_image', 'option'), 'slide' ); ?>
                    <img class="slider__img" src="<?php echo $image[0]; ?>" alt="Denward">
                <?php } ?>
            </a>
      	<?php endwhile;
    endif; ?>
</div>
<div class="container">
    <div class="hp">
        <div class="hp__cta">
            <div class="hp__container">
                <?php if( have_rows('call_to_action', 'option') ):
                	while ( have_rows('call_to_action', 'option') ) : the_row(); ?>
                        <div class="hp__col">
                             <div class="hp__entry">
                                <i class="hp__icon fas <?php the_sub_field('icon'); ?>"></i>
                                <h4 class="hp__heading"><?php the_sub_field('title'); ?>
                                    <span class="hp__small"><?php the_sub_field('text'); ?></span>
                                </h4>
                            </div>
                        </div>

                    <?php endwhile;
                endif; ?>
              <div class="hp__col">
                  <div class="hp__entry">
                     <i class="hp__icon fas fa-phone fa-flip-horizontal"></i>
                      <h4 class="hp__heading">Need some help?
                          <span class="hp__small"><a class="hp__link" href="tel:<?php echo str_replace(' ','',get_field('phone_number', 'option')); ?>"><?php the_field('phone_number', 'option'); ?></a></span>
                      </h4>
                  </div>
              </div>
          </div>
      </div>
    </div>
</div>
