<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="<?php the_field('fav','option')?>" type="image/x-icon" />
<link rel="shortcut icon" href="<?php the_field('fav','option')?>" type="image/x-icon" />
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Cache-Control" content="no-transform" /> 
<meta http-equiv="Cache-Control" content="no-siteapp" />
<meta name="applicable-device" content="pc,mobile">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<?php get_template_part( 'content/seo' ); ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header id="header">
<div class="header-top mt20 mb20 clearfix">
<div class="container">
<?php if ( is_front_page() ) { ?><h1 style="height:0;overflow:hidden;"><?php the_field('keywords');?></h1><?php } ?>
<div class="header-logo">
<?php if( get_field('logo','option') ): ?>
<a title="<?php bloginfo('description')?>" class="logo-url" href="<?php bloginfo('url')?>">
<img src="<?php the_field('logo','option'); ?>" alt="<?php bloginfo('name')?>"  title="<?php bloginfo('name')?>"/>
</a>
<?php else : ?>
<a title="<?php bloginfo('description')?>" class="logo-url" href="<?php bloginfo('url')?>">
<img src="<?php bloginfo('template_url'); ?>/images/logo.png" alt="<?php bloginfo('name')?>" />
</a>
<?php endif; ?>
<div class="slogen hidden-xs">
<h2><?php bloginfo('name')?></h2>
<p><?php bloginfo('description')?></p>
</div>
</div>
<div class="header-right hidden-xs">
<div class="header-phone mb10">
<p><i class="fa fa-qq" aria-hidden="true"></i><?php the_field('qq1','option'); ?></p>
<p><i class="fa fa-phone" aria-hidden="true"></i><?php the_field('mini','option'); ?></p>
</div>
<div class="sea-key">
<span><?php _e( '热门搜索', 'xs' ); ?>： </span>
<a href="<?php the_field('url1','option')?>" target="_blank"><?php the_field('keywords1','option')?></a>
<a href="<?php the_field('url2','option')?>" target="_blank"><?php the_field('keywords2','option')?></a>
<a href="<?php the_field('url3','option')?>" target="_blank"><?php the_field('keywords3','option')?></a>
</div>
</div>
<div id="slick-mobile-menu"></div>
</div>
</div>
<div class="header-menu">
<?php wp_nav_menu( array( 'theme_location' => 'main-nav', 'menu_class' => 'header-menu-con  container sf-menu', 'container'=>'','fallback_cb' => 'default_menu',) ); ?>
</div>
</header>