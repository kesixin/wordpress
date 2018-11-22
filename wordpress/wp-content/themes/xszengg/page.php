<?php get_header(); ?>
<section id="slider" class="text-center">
<?php 
if( get_field('top-images') ): ?>
<img src="<?php the_field('top-images')?>" alt="<?php the_title();?>" alt="<?php the_title();?>" title="<?php the_title();?>">
<?php else:?>
<img src="<?php bloginfo('template_url')?>/images/s1.jpg" alt="<?php the_title();?>" title="<?php the_title();?>">
<?php endif; ?>
</section>
<?php the_crumbs(); ?>
<Section id="main" class="p40 fafafa">
<div class="container">
<div class="row">
<div class="col-md-9 col-sm-9 col-xs-12">
<div class="content">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="entry-meta">
<h1 class="pull-left"><?php the_title();?></h1>
</div>
<div class="entry-content">
<?php the_content();?> 
</div>
</article>
<?php endwhile;  endif;?>
</div>
</div>
<div class="col-md-3 col-sm-3 hidden-xs">
<div class="sidebar">
<?php get_sidebar();?>
</div>
</div>
</div>
</section>
<?php get_footer(); ?>