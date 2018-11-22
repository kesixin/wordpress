<?php get_header(); ?>
<section id="slider" class="text-center">
<?php 
$terms = wp_get_post_terms($post->ID, 'products', array("fields" => "all"));$termsid = $terms[0]->term_taxonomy_id;
if( get_field('top-images',products_.$termsid) ): ?>
<img src="<?php the_field('top-images',products_.$termsid)?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>">
<?php else:?>
<img src="<?php bloginfo('template_url')?>/images/s1.jpg" alt="<?php the_title(); ?>" title="<?php the_title(); ?>">
<?php endif; ?>
</section>
<?php the_crumbs(); ?>
<Section id="main" class="p40 fafafa">
<div class="container">
<div class="row">
<div class="col-md-9 col-sm-9 col-xs-12">
<div class="content">
<div class="product-main">
<h3><?php the_title();?></h3>
<div class="entry-content">
<?php if ( have_posts() ) :  while ( have_posts() ) : the_post(); ?>
<?php the_content(); ?>
<?php endwhile;endif; ?>
</div>
</div>
</div>
</div>
<div class="col-md-3 col-sm-3 hidden-xs wow fadeInRight delay300">
<div class="sidebar">
<?php get_sidebar();?>
</div>
</div>
</div>
</div>
</section>
<?php get_footer();?>