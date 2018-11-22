<?php get_header(); ?>
<section id="slider" class="text-center">
<img src="<?php bloginfo('template_url')?>/images/s1.jpg" alt="404页面" title="404页面">
</section>
<?php the_crumbs(); ?>
<Section id="main" class="p40 fafafa">
<div class="container">
<div class="content mb30">
<div class="row">
<div class="col-md-6 col-xs-6 col-sm-6">
<div class="youshi-img text-center">
<img src="<?php the_field('logo','option'); ?>">
</div>
</div>
<div class="col-md-6 col-xs-6 col-sm-6 no4">
<p>你所查找的页面，突然奔溃了，请访问首页或者点击以下链接</p>
<ul>
<li><a href="<?php bloginfo('url');?>/products/cp">产品中心</a></li>
<li><a href="<?php bloginfo('url');?>/category/case">案例中心</a></li>
<li><a href="<?php bloginfo('url');?>/category/news">新闻中心</a></li>
</ul>
</div>
</div>
</div>
<div class="content">
<div class="product-list">
<div class="entry-meta">
<h1>您是不是要找以下产品</h1>
</div>
<div class="pro-list clearfix">
 <ul class="row"> 
 <?php 
$args = array(
'post_type'=> 'product',
'posts_per_page'	=> 4,
'ignore_sticky_posts' => 1,
'orderby'   => rand,
);query_posts($args);?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<li class="col-md-3 col-sm-3 col-xs-6 mb30">
<a href="<?php the_permalink(); ?>"  title="<?php the_title(); ?>">
<img   src="<?php echo get_template_directory_uri(); ?>/timthumb.php?src=<?php echo post_thumbnail_src(); ?>&h=400&w=400&zc=1" alt="<?php the_title(); ?>" title="<?php the_title(); ?>"/>
<h3 class="mt10"><?php the_title(); ?></h3>
</a>
</li>
<?php endwhile;  endif;?>
</ul> 
</div>
</div>
</div>
</div>
</div>
</section>
<?php get_footer(); ?>