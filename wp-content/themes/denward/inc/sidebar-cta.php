<?php $image = wp_get_attachment_image_src( get_field('shop_sidebar_image', 'option'), 'full' ); ?>
<div class="denward__help-img <?php if (is_page(295)) { echo 'denward__help-img--extra';}?>" style="background-image:url(<?php echo $image[0] ?>);">
    <div class="denward__help-cta">
        <h4 class="denward__help-title"><?php the_field('shop_sidebar_title', 'option'); ?></h4>
        <p class="denward__help-text">Give us a call<br> <a class="denward__help-link" href="tel:<?php echo str_replace(' ','',get_field('phone_number', 'option')); ?>"><?php the_field('phone_number', 'option'); ?></a></p>
    </div>
</div>
