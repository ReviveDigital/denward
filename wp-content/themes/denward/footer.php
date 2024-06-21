<?php wp_footer(); ?>
<footer class="footer">
    <div class="footer__container container">
        <div class="footer__block">
            <img class="footer__img" src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="Denward">
            <img class="footer__iso" src="<?php echo get_template_directory_uri(); ?>/images/iso.jpg" alt="ISO">
        </div>
        <div class="footer__block">
            <p class="footer__title">Navigation</p>
            <?php wp_nav_menu( array('container_class' => 'footer__menu', 'theme_location' => 'secondary') ); ?>
        </div>
        <div class="footer__block">
            <p class="footer__title">Important infromation</p>
            <?php wp_nav_menu( array('container_class' => 'footer__menu', 'theme_location' => 'third') ); ?>
        </div>
        <div class="footer__block">
            <p class="footer__title">Contact us</p>
            <ul class="footer__list">
                <li class="footer__item"><a class="footer__link" href="tel:<?php echo str_replace(' ','',get_field('phone_number', 'option')); ?>"><?php the_field('phone_number', 'option'); ?></a></li>
                <li class="footer__item"><a class="footer__link" href="mailto:<?php the_field('email_address', 'option'); ?>"><?php the_field('email_address', 'option'); ?></a></li>
                <?php if (false) : ?>
                    <li class="footer__item footer__item--socials">
                        <a class="footer__social" target="_blank" href="<?php the_field('facebook', 'option'); ?>"><i class="footer__icon fab fa-facebook-f"></i></a>
                        <a class="footer__social" target="_blank" href="<?php the_field('twitter', 'option'); ?>"><i class="footer__icon fab fa-twitter"></i></a>
                        <a class="footer__social" target="_blank" href="<?php the_field('linkedin', 'option'); ?>"><i class="footer__icon fab fa-linkedin-in"></i></a>
                        <a class="footer__social" target="_blank" href="<?php the_field('youtube', 'option'); ?>"><i class="footer__icon fab fa-youtube"></i></a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</footer>
<div class="copyright">
    <div class="container copyright__container">
        <div class="copyright__block">
            <p class="copyright__text">&copy; Denward <?php echo date("Y"); ?> | ISO 9001 accredited</p>
        </div>
        <div class="copyright__block">
            <ul class="copyright__list">
            <li class="copyright__item"><img class="copyright__img" alt="Payment Icon" src="<?php echo get_template_directory_uri(); ?>/images/payment/opayo.jpg"></li>
            <li class="copyright__item"><img class="copyright__img" alt="Payment Icon" src="<?php echo get_template_directory_uri(); ?>/images/payment/paypal.jpg"></li>
            <li class="copyright__item"><img class="copyright__img" alt="Payment Icon" src="<?php echo get_template_directory_uri(); ?>/images/payment/visa.jpg"></li>
            <li class="copyright__item"><img class="copyright__img" alt="Payment Icon" src="<?php echo get_template_directory_uri(); ?>/images/payment/maestro.jpg"></li>
            <li class="copyright__item"><img class="copyright__img" alt="Payment Icon" src="<?php echo get_template_directory_uri(); ?>/images/payment/mastercard.jpg"></li>
        </ul>
        </div>
    </div>
</div>
</body>
</html>
