<section id="footer">
<div class="container">
<div class="copyr p20">
<p>Copyright © <?php the_time('Y');?> <a href="<?php bloginfo('url')?>"><?php bloginfo('name')?></a> All Rights Reserved &nbsp;&nbsp;<a target="_blank" href="http://www.miibeian.gov.cn/" rel="nofollow"><?php the_field('btm-icp','option') ?></a><?php the_field('tjgj','option') ?>&nbsp;&nbsp;<a href="<?php bloginfo("url");?>/sitemap.xml" target="_blank"><?php _e('网站地图','xs')?></a></p>
</div>
</div>
</section>
<?php wp_footer(); ?>
<div class="rtbar hidden-xs">
<div class="rtbar-box">
<div class="box-left"> 
<a style="display: block;"  class="btno" title="查看在线客服" href="javascript:void(0);">展开</a> 
<a style="display: none;"  class="btnc" title="关闭在线客服" href="javascript:void(0);">收缩</a> 
</div>
<div class="box-right">
<div class="cn">
<h4>客服部门</h4>
<ul>
<li>
<span><?php the_field('aliname','option') ?></span>
<a target="_blank" href="https://amos.alicdn.com/msg.aw?v=2&amp;uid=<?php the_field('aliid','option') ?>&amp;site=cnalichn&amp;s=10&amp;charset=UTF-8"><img border="0" src="https://amos.alicdn.com/online.aw?v=2&amp;uid=<?php the_field('aliid','option') ?>&amp;site=cnalichn&amp;s=10&amp;charset=UTF-8" alt="阿里旺旺" title="阿里旺旺"></a>
</li>
<li>
<span><?php the_field('qqname1','option') ?></span>
<a target="_blank" href="https://wpa.qq.com/msgrd?v=3&amp;uin=<?php the_field('qq1','option') ?>&amp;site=qq&amp;menu=yes"><img border="0" src="https://pub.idqqimg.com/qconn/wpa/button/button_old_11.gif" alt="<?php the_field('qq1','option') ?>" title="<?php the_field('qq1','option') ?>"></a><br>
</li>
<li>
<span><?php the_field('qqname2','option') ?></span>
<a target="_blank" href="https://wpa.qq.com/msgrd?v=3&amp;uin=<?php the_field('qq2','option') ?>&amp;site=qq&amp;menu=yes"><img border="0" src="https://pub.idqqimg.com/qconn/wpa/button/button_old_11.gif" alt="<?php the_field('qq2','option') ?>" title="<?php the_field('qq2','option') ?>"></a><br>
</li>
</ul>
<div class="kf-tel">
<p><b>手机号码</b><br><?php the_field('phone','option') ?></p>
<p><b>工作时间</b><br>8:30~12:00<br>14:00~18：00</p>
</div>
</div>
</div>
</div>
</div>
<div class="side-top hidden-xs">
<a title="回到顶部" href="javascript:;" class="gotop" style="display: block;"><i class="f_top fa fa-chevron-up"></i></a>
</div>
<script>
(function(){
    var bp = document.createElement('script');
    var curProtocol = window.location.protocol.split(':')[0];
    if (curProtocol === 'https') {
        bp.src = 'https://zz.bdstatic.com/linksubmit/push.js';
    }
    else {
        bp.src = 'http://push.zhanzhang.baidu.com/push.js';
    }
    var s = document.getElementsByTagName("script")[0];
    s.parentNode.insertBefore(bp, s);
})();
</script>
<?php if ( is_singular() ){ ?>
<!-- Baidu Button BEGIN -->
<script>
window._bd_share_config = {
    "common": {
        "bdSnsKey": {},
        "bdText": "",
        "bdMini": "2",
        "bdMiniList": false,
        "bdPic": "",
        "bdStyle": "0",
        "bdSize": "12"
    },
    "share": {}
};
with(document) 0[(getElementsByTagName('head')[0] || body).appendChild(createElement('script')).src = 'http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion=' + ~ ( - new Date() / 36e5)];
<?php } ?>
</body>
</html>