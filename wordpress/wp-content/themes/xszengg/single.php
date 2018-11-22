<?php get_header(); ?>
<section id="slider" class="text-center">
<?php 
$category = get_the_category();
$cat_ID = $category[0]->cat_ID;
if( get_field('top-images',category_.$cat_ID) ): ?>
<img src="<?php the_field('top-images',category_.$cat_ID)?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>">
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
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="single-header  clearfix text-center">
<h1 class="text-center"><?php the_title(); ?></h1>
<div class="single-meta">
<div class="time"><?php _e('日期','xs')?>：<?php the_time('Y-n-j'); ?></div>
<?php If (in_array( 'wp-postviews/wp-postviews.php',
apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ){?><div class="eye"><?php _e('浏览数','xs')?>：<?php the_views();?></div><?php };?>

<div class="bdsharebuttonbox">
<span class="share-hmj">分享到：</span>
<a title="分享到新浪微博" class="bds_tsina fa fa-weibo" href="#" data-cmd="tsina"></a>
<a title="分享到QQ空间" class="bds_qzone fa fa-star" href="#" data-cmd="qzone"></a>
<a title="分享到QQ好友" class="qq fa fa-qq" href="#" data-cmd="sqq" ></a>
<a title="分享到微信" class="bds_weixin fa fa-weixin" href="#" data-cmd="weixin"></a>
<a class="bds_more fa fa-ellipsis-h" href="#" data-cmd="more"></a>
</div>
</div>
</div>
<div class="entry-content">
<?php the_content();?> 
</div>
</article>
<?php endwhile;  endif;?>
<div class="single-info">
<div class="post-tags pull-left"><?php the_tags()?></div>
<div class="pull-right"><?php _e('版权所有','xs')?>：<?php bloginfo('url')?> <?php _e('转载请注明出处','xs')?></div>
</div>
<nav id="nav-single" class="clearfix">
<div class="nav-previous"><?php if (get_previous_post()) { previous_post_link('上一篇: %link');} else {echo "没有了，已经是最后文章";} ?></div>
<div class="nav-next"><?php if (get_next_post()) { next_post_link('下一篇: %link');} else {echo "没有了，已经是最新文章";} ?></div>
</nav>
</div>
</div>
<div class="col-md-3 col-sm-3 hidden-xs">
<div class="sidebar">
<?php get_sidebar();?>
</div>
</div>
</div>
</div>
</section>
<?php get_footer(); ?>