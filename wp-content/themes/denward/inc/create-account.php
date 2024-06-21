<div class="create">
    <div class="create__container">
        <div class="create__account">
            <div class="create__row">
                <div class="create__col">
                    <h2 class="create__title"><?php the_field('create_account_title', 'option'); ?></h2>
                    <p class="create__text"><?php the_field('create_account_content', 'option'); ?></p>
                </div>
                <div class="create__button">
                    <a class="create__btn" href="<?php the_field('create_account_button_link', 'option'); ?>"><?php the_field('create_account_button_text', 'option'); ?></a>
                </div>
            </div>
            <ul class="create__list">
                <?php if( have_rows('create_account_list', 'option') ):
                    while ( have_rows('create_account_list', 'option') ) : the_row(); ?>
                        <li class="create__item">
                            <i class="create__icon fa fa-check"></i>
                            <span class="create__span"><?php the_sub_field('item_title'); ?></span>
                            <span class="create__opacity"><?php the_sub_field('item_content'); ?></span>
                        </li>
                    <?php endwhile;
                endif; ?>
            </ul>

        </div>
        <?php $image = wp_get_attachment_image_src( get_field('manufacturing_image', 'option'), 'full' ); ?>
        <div class="create__manufacturing" style="background-image:url(<?php echo $image[0] ?>);">
            <div class="create__position">
                <h3 class="create__heading"><?php the_field('manufacturing_title', 'option'); ?></h3>
                <p class="create__content"><?php the_field('manufacturing_content', 'option'); ?></p>
                <a class="create__link" href="<?php the_field('manufacturing_link', 'option'); ?>"><?php the_field('manufacturing_text', 'option'); ?> <i class="create__right-icon fal fa-long-arrow-right"></i></a>
            </div>
        </div>
    </div>
</div>
