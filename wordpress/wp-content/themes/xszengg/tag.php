<?php get_header(); ?>
<section id="slider" class="text-center">
<?php 
global $wp_query;
$cat_ID = get_query_var('cat');
if( get_field('top-images',category_.$cat_ID) ): ?>
<img src="<?php the_field('top-images',category_.$cat_ID)?>" alt="<?php single_cat_title(); ?>" title="<?php single_cat_title(); ?>">
<?php else:?>
<img src="<?php bloginfo('template_url')?>/images/s1.jpg" alt="<?php single_cat_title(); ?>" title="<?php single_cat_title(); ?>">
<?php endif; ?>
</section>
<?php the_crumbs(); ?>
<Section id="main" class="p40 fafafa">
<div class="container">
<div class="row">
<div class="col-md-9 col-sm-9 col-xs-12">
<div class="content">
<div class="entry-meta">
<h1 class="pull-left"><?php single_cat_title(); ?></h1>
</div>
<ul class="content-list">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<li>
<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><span class="hidden-xs"><?php the_time('Y / n / j'); ?></span></h2>
<p class="hidden-xs">
<?php the_excerpt(); ?>
</p>
</li>
<?php endwhile; endif;?>
</ul>
<?php the_posts_pagination( array( 'prev_text' => __( '上一页', 'xs' ), 'next_text' => __( '下一页', 'xs' ) ) );?>
</div>
</div>
<div class="col-md-3 col-sm-3 hidden-xs">
<div class="sidebar">
<?php get_sidebar();?>
</div>
</div>
</div>
</div>
</div>
</section>
<?php get_footer(); ?>