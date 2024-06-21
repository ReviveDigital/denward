<?php get_header(); ?>
<?php get_template_part('inc/page-banner'); ?>
<div class="news">
	<div class="container">
		<div class="news__intro">
			<?php the_field('news_content', 268); ?>
		</div>
		<div class="news__container">
		<?php $paged = get_query_var('paged') ? get_query_var('paged') : 1;
			$args = array(
			'post_type' => 'post',
			'paged' => $paged,
			'posts_per_page' => 9,
	  	);
  	  $the_query = new WP_Query( $args );
  		if ( have_posts() ) :
 			while ( have_posts() ) : the_post(); ?>
			<div class="news__block">
				<p class="news__date"><?php echo get_the_date( 'd/m/Y' ); ?></p>
				<h4 class="news__title"><a href="<?php the_permalink();?>" class="news__title-link"><?php the_title(); ?></a></h4>
				<div class="news__content">
					<?php echo excerpt(20); ?>
				</div>
				<a href="<?php the_permalink();?>" class="news__more">Read more <i class="news__read fas fa-long-arrow-right"></i></a>
			</div>
		<?php endwhile; wp_pagenavi();
		 endif; ?>
	 </div>
	</div>
</div>
<?php get_template_part('inc/cta'); ?>
<?php
get_footer();
