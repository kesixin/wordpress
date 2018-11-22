<?php if ( is_front_page() ) { ?>
<meta property="og:title" content="<?php $page_id = get_queried_object(); the_field('title',$page_id); ?>">
<meta property="og:type" content="website">
<meta property="og:description" content="<?php $page_id = get_queried_object(); the_field('description',$page_id);?>">
<meta property="og:url" content="<?php bloginfo('url');?>">
<meta property="og:site_name" content="<?php bloginfo('name');?>">
<title><?php $page_id = get_queried_object(); the_field('title',$page_id); ?></title>
<meta name="description" content="<?php $page_id = get_queried_object(); the_field('description',$page_id);?>" />
<meta name="keywords" content="<?php $page_id = get_queried_object(); the_field('keywords',$page_id);?>" />
<?php } ?>
<?php if ( is_search() ) { ?><title><?php ;echo get_search_query(); _e('搜索结果 ','xs');?> | <?php bloginfo('name'); ?></title><?php } ?>
<?php if ( is_single() ) { ?><title><?php $page_id = get_queried_object();if( get_field('title',$page_id) ): ?><?php the_field('title',$page_id); ?><?php else : ?><?php the_title();?><?php endif; ?> | <?php bloginfo('name'); ?></title><?php } ?>
<?php if ( is_page() && !is_front_page()) { ?><title><?php $page_id = get_queried_object();if( get_field('title',$page_id) ): ?><?php the_field('title',$page_id); ?><?php else : ?><?php the_title();?><?php endif; ?> | <?php bloginfo('name'); ?></title><?php } ?>
<?php if ( is_category() ) { ?><title><?php $page_id = get_queried_object();if( get_field('title',$page_id) ): ?><?php the_field('title',$page_id); ?><?php else : ?><?php single_cat_title();?><?php endif; ?> | <?php bloginfo('name'); ?></title><?php } ?>
<?php if ( is_tag() ) { ?><title><?php  single_tag_title("", true); ?> | <?php bloginfo('name'); ?></title><?php } ?>
<?php if ( is_tax() ) { ?><title><?php $page_id = get_queried_object();if( get_field('title',$page_id) ): ?><?php the_field('title',$page_id); ?><?php else : ?><?php single_cat_title();?><?php endif; ?> | <?php bloginfo('name'); ?></title><?php } ?>
<?php if ( is_single() ) { ?>
<meta name="description" content="<?php $page_id = get_queried_object(); the_field('description',$page_id);?>" />
<meta name="keywords" content="<?php $page_id = get_queried_object(); the_field('keywords',$page_id);?>" />
<?php } ?>
<?php if ( is_tax() ) { ?>
<meta name="description" content="<?php $page_id = get_queried_object(); the_field('description',$page_id);?>" />
<meta name="keywords" content="<?php $page_id = get_queried_object();  the_field('keywords',$page_id); ?>" />
<?php } ?>
<?php if ( is_page() && !is_front_page() ) { ?>
<meta name="description" content="<?php $page_id = get_queried_object(); the_field('description',$page_id);?>" />
<meta name="keywords" content="<?php $page_id = get_queried_object(); the_field('keywords',$page_id);?>" />
<?php } ?>
<?php if ( is_category() ) { ?>
<meta name="description" content="<?php $page_id = get_queried_object(); the_field('description',$page_id);?>" />
<meta name="keywords" content="<?php $page_id = get_queried_object();  the_field('keywords',$page_id); ?>" />
<?php } ?>
<?php if ( is_tag() ) { ?>
<meta name="description" content="<?php $page_id = get_queried_object(); the_field('description',$page_id);?>" />
<meta name="keywords" content="<?php $page_id = get_queried_object();  the_field('keywords',$page_id); ?>" />
<?php } ?>