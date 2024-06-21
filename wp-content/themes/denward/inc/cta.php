<?php $image = wp_get_attachment_image_src( get_field('get_in_touch_image', 'option'), 'full' ); ?>
<div class="cta" style="background-image:url(<?php echo $image[0] ?>);">
    <div class="container cta__container">
        <div class="cta__block">
            <h2 class="cta__title"><?php the_field('get_in_touch_title', 'option'); ?></h2>
            <div class="cta__row">
                <div class="cta__col">
                    <p class="cta__phone"><span class="cta__opacity">General enquiries</span> <a class="cta__link tracking__phone" href="tel:<?php echo str_replace(' ','',get_field('phone_number', 'option')); ?>"><?php the_field('phone_number', 'option'); ?></a></p>
                </div>
                <div class="cta__buttons">
                    <a href="<?php the_field('get_in_touch_button_one_link', 'option'); ?>" class="cta__white"><?php the_field('get_in_touch_button_one', 'option'); ?></a>
                    <a href="<?php the_field('get_in_touch_button_two_link', 'option'); ?>" class="cta__btn"><?php the_field('get_in_touch_button_two', 'option'); ?></a>
                </div>
            </div>
        </div>
    </div>
</div>
