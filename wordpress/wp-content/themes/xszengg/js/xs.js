jQuery(document).ready(function($) {
			 var example = $('.sf-menu').superfish({
            //add options here if required
            delay:       100,
            speed:       'fast',
            autoArrows:  false  
        }); 
      $('.header-menu-con').slicknav({
            prependTo: '#slick-mobile-menu',
            allowParentLinks: true,
            label: '导航'
        }); 
	 
$('#slider .owl-carousel').owlCarousel({
    loop:true,
	items: 1,
	autoplay:true,
	autoplayTimeout:5000,
	autoplayHoverPause:true,
})

	$('.entry-content img').parent("a").addClass("fancybox").attr("data-fancybox-group","gallery");
	$('.fancybox').fancybox();	

$(function(){
	$(window).scroll(function(){
	if($(window).scrollTop()>120){
	$(".side-top .gotop").fadeIn();
	}
	else{
	$(".side-top .gotop").fadeOut();
	}
	});
	$(".side-top .gotop").click(function(){
	$('html,body').animate({'scrollTop':0},500);
	});
	});
	function tabs(tabTit,on,tabCon,event){
        $(tabTit).children().on(event,function(){
            $(this).addClass(on).siblings().removeClass(on);
            var index = $(tabTit).children().index(this);
            $(tabCon).children().eq(index).show().siblings().hide();
        });
    };
	tabs(".pro-cat .filters","on",".pro-list",'click'); 
	
		$(".btno").click(function(){
				
				    $(".btnc").show();
                $(".btno").hide();
				$(".box-right").show();
				});
				
				$(".btnc").click(function(){
					
				    $(".btnc").hide();
                $(".btno").show();
				$(".box-right").hide();
				});

});