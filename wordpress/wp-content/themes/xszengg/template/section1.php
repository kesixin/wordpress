<section class="product clearfix mt40">
<div class="container">
<div class="section-head mb30 text-center">
<h2><?php if( get_field('pro-title') ): ?><?php the_field('pro-title')?><?php else:?><?php _e('产品中心','xs')?><?php endif; ?></h2> 
</div>
<div class="pro-cat mb30">
<ul class="clearfix filters"> 
<?php 
$case = get_field('pro-cat');
if( $case ): ?>
<li class="on"><span><?php _e('推荐产品','xs');?></span></li>
<?php foreach( $case as $term ):?>
<li><span><?php echo $term->name; ?></span></li>
<?php endforeach;endif;?>
</ul>
</div>
<div class="pro-list clearfix">
<div class="on pro-item">
<ul class="row">
<?php 
$products = get_field('pro-con');
if( $products ): ?>
<?php foreach( $products as $post):?>
<?php setup_postdata($post); ?>
<li class="col-md-3 col-sm-3 col-xs-6 mb30">
<a href="<?php the_permalink(); ?>"  title="<?php the_title(); ?>">
<img   src="<?php echo get_template_directory_uri(); ?>/timthumb.php?src=<?php echo post_thumbnail_src(); ?>&h=400&w=400&zc=1" alt="<?php the_title(); ?>" title="<?php the_title(); ?>"/>
<h3 class="mt10"><?php the_title(); ?></h3>
</a>
</li>
<?php endforeach; ?>
<?php wp_reset_postdata();  ?>
<?php else:?>
<?php 
$args = array(
'post_type'=> 'product',
'posts_per_page'	=> 8,
'orderby'   => date,
);query_posts($args);  while ( have_posts() ) : the_post(); ?>
<li class="col-md-3 col-sm-3 col-xs-6 mb30">
<a href="<?php the_permalink(); ?>"  title="<?php the_title(); ?>">
<img   src="<?php echo get_template_directory_uri(); ?>/timthumb.php?src=<?php echo post_thumbnail_src(); ?>&h=400&w=400&zc=1" alt="<?php the_title(); ?>" title="<?php the_title(); ?>"/>
<h3 class="mt10"><?php the_title(); ?></h3>
</a>
</li>
<?php endwhile;wp_reset_query(); ?>
<?php endif; ?>
</ul>
</div>
<?php 
$case = get_field('pro-cat');
if( $case ): ?>
<?php foreach( $case as $term ):?>
<div class="pro-item">
<ul class="row">
<?php 
$args = array(
'post_type'=>'product', //文章类型
'tax_query'=>array(
array(
'taxonomy'=>'products', //分类法为type
'terms'=>$term->term_taxonomy_id, //分类ID为666
)
),
'ignore_sticky_posts' => 1,
'posts_per_page' => 8,      // 显示多少条
'orderby' => 'date',         // 时间排序
'order' => 'desc',          // 降序（递减，由大到小）    
);
query_posts($args); while (have_posts()) : the_post();?>
<li class="col-md-3 col-sm-3 col-xs-6 mb30">
<a href="<?php the_permalink(); ?>"  title="<?php the_title(); ?>">
<img   src="<?php echo get_template_directory_uri(); ?>/timthumb.php?src=<?php echo post_thumbnail_src(); ?>&h=400&w=400&zc=1" alt="<?php the_title(); ?>" title="<?php the_title(); ?>"/>
<h3 class="mt10"><?php the_title(); ?></h3>
</a>
</li>
<?php endwhile;wp_reset_query();  ?>
</ul>
</div>
<?php endforeach; ?>
<?php endif; ?>
</div>
</div>
</section >