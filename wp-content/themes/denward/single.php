<?php get_header(); ?>
<?php get_template_part('inc/page-banner'); ?>
 <div class="article">
 	<div class="container article__container">
        <div class="article__sidebar">
            <h4 class="article__navigation-title">Recent News</h4>
            <ul class="article__nav">
            <?php $args = array(
              'post_type' => 'post',
              'order' => 'DESC',
              'orderby' => 'date',
              'posts_per_page' => 6
            );
            $the_query = new WP_Query( $args );
            if ( $the_query->have_posts() ) :
              while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                  <li class="article__nav-item">
            		  <a href="<?php the_permalink(); ?>" class="article__nav-link">
            			  <?php the_title(); ?>
            		  </a>
            	  </li>
              <?php endwhile;
            endif; ?>
            </ul>

            <h4 class="article__navigation-title article__navigation-title--cats">Categories</h4>
            <ul class="article__nav">
                <?php $categories = get_categories();
                foreach($categories as $category) {
                        echo '<li class="article__nav-item"><a class="article__nav-link" href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></li>';
                } ?>
            </ul>

        </div>
        <div class="article__entry">
    		<?php if ( have_posts() ) : ?>
     			<?php while ( have_posts() ) : the_post(); ?>
                    <div class="article__img">
                        <?php if ( has_post_thumbnail() ) {
                             the_post_thumbnail('single');
                           } else {
                           $image_blog = wp_get_attachment_image_src( get_field('default_image', 'option'), 'single' ); ?>
                           <img src="<?php echo $image_blog[0]; ?>" alt="News">
                        <?php } ?>
                    </div>
                    <h1 class="article__title"><?php the_title(); ?></h1>
                    <p class="article__date"><i class="fal fa-calendar"></i> <?php echo get_the_date( 'd/m/Y' ); ?></p>
                    <div class="article__content">
                        <?php the_content(); ?>
                    </div>
                    <ul class="article__share">
                        <li class="article__share-item article__share-item--share">Share:</li>
                        <li class="article__share-item"><a href="https://twitter.com/share" class="article__link" target="_blank" data-show-count="false"><i class="article__share-icon fab fa-twitter"></i></a><script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script></li>
                        <li class="article__share-item"><div data-href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];?>" data-layout="button" data-size="small" data-mobile-iframe="true"><a href="https://www.facebook.com/sharer?u=<?php the_permalink();?>&amp;t=<?php the_title(); ?>" target="blank" class="article__link fb-xfbml-parse-ignore"><i class="article__share-icon fab fa-facebook-f"></i></a></div></li>
                        <li class="article__share-item"><a class="article__link" href="javascript:void(0)" onclick="window.open( 'http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo home_url( $wp->request ); ?>', 'sharer', 'toolbar=0, status=0, width=626, height=436');return false;" title="Linkedin"><i class="article__share-icon fab fa-linkedin-in"></i></a></li>
                    </ul>
                    <a href="<?php echo esc_url(home_url('/news/')); ?>" class="article__back"><i class="article__arrow fa fa-long-arrow-left"></i> Back to news</a>
    			<?php endwhile; ?>
     		<?php endif; ?>
        </div>
 	</div>
</div>
<?php get_template_part('inc/cta'); ?>
 <?php get_footer();?>
