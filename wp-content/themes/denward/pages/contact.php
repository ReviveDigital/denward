<?php
/* Template Name: Contact */
get_header(); ?>
<?php include(locate_template('inc/page-banner.php')); ?>
<div class="contact">
    <div class="container">
        <div class="contact__content">
            <?php the_content(); ?>
        </div>
        <div class="contact__container">
            <div class="contact__block">
                <?php echo do_shortcode('[gravityform id="2" title="false" description="false" ajax="true"]'); ?>
            </div>
            <div class="contact__info">
                <div class="contact__details">
                    <ul class="contact__list">
                        <li class="contact__item"><?php the_field('address_line_one', 'option'); ?>, <?php the_field('address_line_two', 'option'); ?>, <?php the_field('town', 'option'); ?>, <?php the_field('county', 'option'); ?>, <?php the_field('postcode', 'option'); ?>, <?php the_field('country', 'option'); ?></li>
                        <li class="contact__item"><span class="contact__strong">Phone:</span> <a class="contact__link" href="tel:<?php echo str_replace(' ','',get_field('phone_number', 'option')); ?>"><?php the_field('phone_number', 'option'); ?></a></li>
                        <li class="contact__item"><span class="contact__strong">Fax:</span> <?php the_field('fax', 'option'); ?></li>
                    </ul>

                    <ul class="contact__list">
                        <li class="contact__item contact__item--department">Customer service:</li>
                        <li class="contact__item"><span class="contact__strong">Phone:</span> <a class="contact__link" href="tel:<?php echo str_replace(' ','',get_field('customer_service_phone_number', 'option')); ?>"><?php the_field('customer_service_phone_number', 'option'); ?></a></li>
                        <li class="contact__item"><span class="contact__strong">Email:</span> <a class="contact__link" href="mailto:<?php the_field('customer_service_email_address', 'option'); ?>"><?php the_field('customer_service_email_address', 'option'); ?></a></li>
                    </ul>

                    <ul class="contact__list">
                        <li class="contact__item contact__item--department">Sales:</li>
                        <li class="contact__item"><span class="contact__strong">Phone:</span> <a class="contact__link" href="tel:<?php echo str_replace(' ','',get_field('sales_phone_number', 'option')); ?>"><?php the_field('sales_phone_number', 'option'); ?></a></li>
                        <li class="contact__item"><span class="contact__strong">Email:</span> <a class="contact__link" href="mailto:<?php the_field('sales_email_address', 'option'); ?>"><?php the_field('sales_email_address', 'option'); ?></a></li>
                    </ul>

                    <ul class="contact__list">
                        <li class="contact__item contact__item--department">Accounts:</li>
                        <li class="contact__item"><span class="contact__strong">Phone:</span> <a class="contact__link" href="tel:<?php echo str_replace(' ','',get_field('accounts_phone_number', 'option')); ?>"><?php the_field('accounts_phone_number', 'option'); ?></a></li>
                        <li class="contact__item"><span class="contact__strong">Email:</span> <a class="contact__link" href="mailto:<?php the_field('accounts_email_address', 'option'); ?>"><?php the_field('accounts_email_address', 'option'); ?></a></li>
                    </ul>

                    <ul class="contact__list">
                        <li class="contact__item contact__item--department">Warehouse:</li>
                        <li class="contact__item"><span class="contact__strong">Email:</span> <a class="contact__link" href="mailto:<?php the_field('warehouse_email_address', 'option'); ?>"><?php the_field('warehouse_email_address', 'option'); ?></a></li>
                    </ul>

                    <ul class="contact__list">
                        <li class="contact__item"><span class="contact__strong">VAT number:</span> <?php the_field('vat_number', 'option'); ?></li>
                        <li class="contact__item"><span class="contact__strong">Company number:</span> <?php the_field('company_number', 'option'); ?></li>
                    </ul>
                    <?php if (false) : ?>
                        <ul class="contact__social">
                            <li class="contact__social-item contact__social-item--title">Follow us</li>
                            <li class="contact__social-item contact__social-item--icon"><a href="<?php the_field('facebook', 'option'); ?>" target="_blank" class="contact__social-link"><i class="contact__icon fab fa-facebook-f"></i></a></li>
                            <li class="contact__social-item contact__social-item--icon"><a href="<?php the_field('twitter', 'option'); ?>" target="_blank" class="contact__social-link"><i class="contact__icon fab fa-twitter"></i></a></li>
                            <li class="contact__social-item contact__social-item--icon"><a href="<?php the_field('linkedin', 'option'); ?>" target="_blank" class="contact__social-link"><i class="contact__icon fab fa-linkedin-in"></i></a></li>
                            <li class="contact__social-item contact__social-item--icon"><a href="<?php the_field('youtube', 'option'); ?>" target="_blank" class="contact__social-link"><i class="contact__icon fab fa-youtube"></i></a></li>
                        </ul>
                    <?php endif; ?>
                    <img class="contact__iso" src="<?php echo get_template_directory_uri(); ?>/images/iso.jpg" alt="ISO">
                </div>

            </div>
        </div>
    </div>
</div>
<div class="map">
    <?php $location = get_field('location', 'option');
    if( !empty($location) ): ?>
		<div class="map__acf-map acf-map">
			<div class="map__marker marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
		</div>
 <?php endif; ?>
</div>
<?php include(locate_template('inc/cta.php')); ?>
<?php get_footer(); ?>
