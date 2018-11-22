<section id="slider">
<div class="owl-carousel owl-theme">
<?php $terms = get_field('sliders');if( $terms ): ?>
<?php foreach( $terms as $value ): ?>
<div class="item">
<a href="<?php echo $value['url']?>" target="_blank"><img src="<?php echo $value['images']?>" alt="<?php echo $value['title']?>" title="<?php echo $value['title']?>"></a>
</div>
<?php endforeach;?>
<?php else : ?>
<div class="item">
<img src="<?php bloginfo('template_url')?>/images/index.jpg">
</div>
<?php  endif; ?>
</div>
</section>