<?php get_header(); ?>
<section id="slider" class="text-center">
<?php 
$cat_ID = get_queried_object_id();
if( get_field('top-images',products_.$cat_ID) ): ?>
<img src="<?php the_field('top-images',products_.$cat_ID)?>" alt="<?php single_cat_title(); ?>" title="<?php single_cat_title(); ?>">
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
<div class="product-list">
<div class="entry-meta">
<h1 class="pull-left"><?php single_cat_title(); ?></h1>
</div>
<div class="entry-des">
<?php if( category_description() ):?>
<p><?php echo category_description(); ?></p>
<?php endif;?>
</div>
<ul class="cp-child">
<?php 
$cid = get_queried_object_id();
$args = array(
'taxonomy'     => 'products',
'orderby'      => 'count',
'title_li'     => $title,
'show_option_none'=>$title,
'hide_empty' =>1,
'child_of' =>$cid,
'order '=>'DESC',
'hierarchical'=>0,
);
?>
<?php wp_list_categories( $args ); ?>
</ul>
<div class="pro-list clearfix">
 <ul class="row"> 
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<li class="col-md-4 col-sm-4 col-xs-6 mb30">
<a href="<?php the_permalink(); ?>"  title="<?php the_title(); ?>">
<img   src="<?php echo get_template_directory_uri(); ?>/timthumb.php?src=<?php echo post_thumbnail_src(); ?>&h=400&w=400&zc=1" alt="<?php the_title(); ?>" title="<?php the_title(); ?>"/>
<h3 class="mt10"><?php the_title(); ?></h3>
</a>
</li>
<?php endwhile;  endif;?>
</ul> 
</div>
<?php the_posts_pagination( array( 'prev_text' => __( '上一页', 'xs' ), 'next_text' => __( '下一页', 'xs' ) ) );?>
</div>
</div>
</div>
<div class="col-md-3 col-sm-3 hidden-xs">
<div class="sidebar">
<?php get_sidebar();?>
</div>
</div>
</div>
</section>
<?php get_footer();?>