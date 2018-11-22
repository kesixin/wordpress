<?php
require get_template_directory() . '/inc/helper.php';


add_filter('acf/settings/path', 'my_acf_settings_path');
 
function my_acf_settings_path( $path ) {
 
    $path = get_stylesheet_directory() . '/acf/';
    
    return $path;
    
}

add_filter('acf/settings/dir', 'my_acf_settings_dir');
 
function my_acf_settings_dir( $dir ) {
 
    $dir = get_stylesheet_directory_uri() . '/acf/';
    
    return $dir;
    
}
 
include_once( get_stylesheet_directory() . '/acf/acf.php' );
include_once( get_stylesheet_directory() . '/inc/acf.php' );

function admin_footer_text($text) {
       $text = '<span id="footer-thankyou"> <a href="http://www.namu66.com" target="_blank" style="font-size: 14px;color: red;">纳姆网络</a>一家有创意的互联网+营销服务公司，<a class="qq" rel="nofollow" target="_blank" href="tencent://message/?uin=448696976&Menu=yes" title="QQ咨询" style="font-size: 14px;color: red;">点击</a> 咨询售后问题。</span>';
    return $text;
}

add_filter('admin_footer_text', 'admin_footer_text',1);



require get_template_directory() . '/inc/widgets/index.php';
add_action( 'init', 'cptui_register_my_cpts_product' );
function cptui_register_my_cpts_product() {
	$labels = array(
		"name" => __( '产品', 'xs' ),
		"singular_name" => __( '产品列表', 'xs' ),
		'add_new'            => _x( '新建产品', '添加新内容的链接名称' ),
		'add_new_item'       => __( '新建一个产品' ),
		'edit_item'          => __( '编辑产品' ),
		'new_item'           => __( '新产品' ),
		'all_items'          => __( '所有产品' ),
		);

	$args = array(
		"label" => __( '产品', 'xs' ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"has_archive" => true,
		"show_in_menu" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "product", "with_front" => true ),
		"query_var" => true,
		"menu_position" => 5,
		"supports" => array( "title", "editor", "thumbnail", "excerpt", "custom-fields", "page-attributes" ),		
		"taxonomies" => array(  ),
			);
	register_post_type( "product", $args );

// End of cptui_register_my_cpts_product()
}
add_action( 'init', 'cptui_register_my_taxes_products' );
function cptui_register_my_taxes_products() {
	$labels = array(
		"name" => __( '产品分类', 'xs' ),
		"singular_name" => __( '产品分类', 'xs' ),
		);

	$args = array(
		"label" => __( '产品分类', 'xs' ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => true,
		"label" => "产品分类",
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'products', 'with_front' => true, ),
		"show_admin_column" => false,
		"show_in_rest" => false,
		"rest_base" => "",
		"show_in_quick_edit" => true,
	);
	register_taxonomy( "products", array( "product" ), $args );

}
add_filter('manage_product_posts_columns', 'add_new_product_columns');   
  
function add_new_product_columns($book_columns) {   
       
    $new_columns['cb'] = '<input type="checkbox" />';//这个是前面那个选框，不要丢了   
	$new_columns['id'] = __('ID');   
    $new_columns['title'] = '产品名称';   
    $new_columns['images'] = __('缩略图');   
       
    $new_columns['products'] =__('产品分类');    
    
    $new_columns['date'] = _x('Date', 'column name');   
  
    //直接返回一个新的数组   
    return $new_columns;   
}
add_action('manage_product_posts_custom_column', 'manage_product_columns', 10, 2);   
    
function manage_product_columns($column_name, $id) {   
    global $wpdb;   
    switch ($column_name) {   
    case 'id':   
        echo $id;   
        break;  
   case 'images':   
         echo the_post_thumbnail( array(125,80) );  
        break;  		
case 'products':
 echo get_the_term_list($post->ID,'products');
      break;
    
    default:   
        break;   
    }   
} 
 add_filter( 'manage_edit-product_sortable_columns', 'my_post_sortable_columns' );
function my_post_sortable_columns( $columns ) {
    $columns['products'] = '产品分类';
    return $columns;
}


// 跳转到设置
if (is_admin() && $_GET['activated'] == 'true') {
header("Location: admin.php?page=theme-general-settings");
}
function remove_dns_prefetch( $hints, $relation_type ) {
if ( 'dns-prefetch' === $relation_type ) {
return array_diff( wp_dependencies_unique_hosts(), $hints );
}
return $hints;
}
add_filter( 'wp_resource_hints', 'remove_dns_prefetch', 10, 2 );

/**
 * 引入必要的css和js文件
 */
add_action( 'wp_enqueue_scripts', 'xs_script_style' );

function xs_script_style(){
	wp_enqueue_script("jquery");
	wp_enqueue_script( 'superfish', get_template_directory_uri() . '/js/superfish.js' );
    wp_enqueue_script( 'slicknav', get_template_directory_uri() . '/js/jquery.slicknav.js');
    wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.js' ); 
    wp_enqueue_script( 'html5', get_template_directory_uri() . '/js/html5.js');
	wp_enqueue_script( 'jquery.fancybox', get_stylesheet_directory_uri() . '/js/jquery.fancybox.js');
	wp_enqueue_script( 'owl.carousel', get_stylesheet_directory_uri() . '/js/owl.carousel.js' );
	wp_enqueue_script( 'xs-js', get_stylesheet_directory_uri() . '/js/xs.js', array('jquery'),'1.0.0', true );
	
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css', array(), '1.0' ); 
	wp_enqueue_style( 'slicknav',get_template_directory_uri() . '/css/slicknav.min.css' );
	wp_enqueue_style( 'kefu',get_template_directory_uri() . '/css/kefu.css' );
	wp_enqueue_style( 'jquery.fancybox',get_template_directory_uri() . '/css/jquery.fancybox.css', array(), '1.0' );
	wp_enqueue_style( 'owl.carousel',get_template_directory_uri() . '/css/owl.carousel.css', array(), '1.0' );
	wp_enqueue_style( 'owl.theme.default',get_template_directory_uri() . '/css/owl.theme.default.css', array(), '1.0' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '1.0' ); 
	wp_enqueue_style( 'xs-style', get_stylesheet_uri() );
	wp_enqueue_style( 'responsive',get_template_directory_uri() . '/css/responsive.css', array(), '1.0' );

}

// 自定义菜单
register_nav_menus(
   array(
    'main-nav' => __( '主导航菜单' ),
   )
);
function default_menu() {
require get_template_directory() . '/inc/default-menu.php';
}

// 小工具
if (function_exists('register_sidebar')){
	register_sidebar( array(
		'name'          => '侧边栏',
		'id'            => 'sidebar-1',
		'description'   => '显示在左侧边栏',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div  class="widget-title"><h3>',
		'after_title'   => '</h3></div>',
	) );
}


/* 摘要去除短代码
/* ----------------- */
function tin_excerpt_delete_shortcode($excerpt){
	$r = "'\[button(.*?)+\](.*?)\[\/button]|\[toggle(.*?)+\](.*?)\[\/toggle]|\[callout(.*?)+\](.*?)\[\/callout]|\[infobg(.*?)+\](.*?)\[\/infobg]|\[tinl2v(.*?)+\](.*?)\[\/tinl2v]|\[tinr2v(.*?)+\](.*?)\[\/tinr2v]|\<pre(.*?)+\>(.*?)\<\/pre>|\[php(.*?)+\](.*?)\[\/php]|\[PHP(.*?)+\](.*?)\[\/PHP]'";
	return preg_replace($r, '', $excerpt);
}
add_filter( 'the_excerpt', 'tin_excerpt_delete_shortcode', 999 );


/* 文章图片自动添加alt和title信息
/* -------------------------------- */
function tin_image_alt($content){
	global $post;
	$pattern = "/<img(.*?)src=('|\")(.*?).(bmp|gif|jpeg|jpg|png)('|\")(.*?)>/i";
	$replacement = '<img$1src=$2$3.$4$5 alt="'.$post->post_title.'" title="'.$post->post_title.'"$6>';
	$content = preg_replace($pattern,$replacement,$content);
	return $content;
}
add_filter('the_content','tin_image_alt',15);


/* 中文名图片上传改名
/* ------------------- */
function tin_custom_upload_name($file){
	if(preg_match('/[一-龥]/u',$file['name'])):
	$ext=ltrim(strrchr($file['name'],'.'),'.');
	$file['name']=preg_replace('#^www\.#', '', strtolower($_SERVER['SERVER_NAME'])).'_'.date('Y-m-d_H-i-s').'.'.$ext;
	endif;
	return $file;
}
add_filter('wp_handle_upload_prefilter','tin_custom_upload_name',5,1);


// 去掉描述P标签
function deletehtml($description) {
	$description = trim($description);
	$description = strip_tags($description,"");
	return ($description);
}
add_filter('category_description', 'deletehtml');
add_filter('tag_description', 'deletehtml');
add_filter('term_description', 'deletehtml');
add_filter('the_excerpt', 'deletehtml');


remove_action('post_updated','wp_save_post_revision' );
function admin_mycss() {
    echo'<style type="text/css">
    #footer-thankyou,#toplevel_page_wpjam-topics,#tab-qiniutek p:nth-child(2){
        display: none;
    }
    </style>';
 }
add_action('admin_head', 'admin_mycss');
 //输出缩略图地址
function post_thumbnail_src(){
	global $post;
	if( $values = get_post_custom_values("thumb") ) {	//输出自定义域图片地址
		$values = get_post_custom_values("thumb");
		$post_thumbnail_src = $values [0];
	} elseif( has_post_thumbnail() ){    //如果有特色缩略图，则输出缩略图地址
		$thumbnail_src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'full');
		$post_thumbnail_src = $thumbnail_src [0];
	} else {
		$post_thumbnail_src = '';
		ob_start();
		ob_end_clean();
		$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
		if(!empty($matches[1][0])){
			$post_thumbnail_src = $matches[1][0];   //获取该图片 src
		}else{	//如果日志中没有图片，则显示随机图片
			//$random = mt_rand(1, 5);
			//$post_thumbnail_src = get_template_directory_uri().'/img/rand/'.$random.'.jpg';
			//如果日志中没有图片，则显示默认图片
			$post_thumbnail_src = get_template_directory_uri().'/images/1.jpg';
		}
	};
	echo $post_thumbnail_src;
}

function the_crumbs() {
	$delimiter = '>'; // 分隔符
	$before = '<span class="current">'; // 在当前链接前插入
	$after = '</span>'; // 在当前链接后插入
	if ( !is_home() && !is_front_page() || is_paged() ) {
		echo '<nav  class="crumbs"><div class="container"><div class="con">'.__( '现在位置:' , 'xs' );
		global $post;
		$homeLink = home_url();
		echo ' <a itemprop="breadcrumb" href="' . $homeLink . '">' . __( '首页' , 'xs' ) . '</a> ' . $delimiter . ' ';
		if ( is_category() ) { // 分类 存档
			global $wp_query;
			$cat_obj = $wp_query->get_queried_object();
			$thisCat = $cat_obj->term_id;
			$thisCat = get_category($thisCat);
			$parentCat = get_category($thisCat->parent);
			if ($thisCat->parent != 0){
				$cat_code = get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' ');
				echo $cat_code = str_replace ('<a','<a itemprop="breadcrumb"', $cat_code );
			}
			echo $before . '' . single_cat_title('', false) . '' . $after;
		}  elseif ( is_single() ) { // 文章
			if ( get_post_type() == 'product' ) { // 自定义文章类型	
	$terms = wp_get_post_terms($post->ID, 'products', array("fields" => "all"));$termsid = $terms[0]->term_taxonomy_id;
    echo get_term_parents_list( $termsid , 'products',array( 'inclusive' => false ,'separator'=>' > ')  );
	echo get_the_term_list( $post->ID, 'products' ,'','>',' > ');
				echo '<span>正文</span>';
			} 

			if ( get_post_type() == 'case' ) { // 自定义文章类型	
	$terms = wp_get_post_terms($post->ID, 'cases', array("fields" => "all"));$termsid = $terms[0]->term_taxonomy_id;
    echo get_term_parents_list( $termsid , 'cases',array( 'inclusive' => false ,'separator'=>' > ')  );
	echo get_the_term_list( $post->ID, 'cases' ,'','>',' > ');
				echo '<span>正文</span>';
			}
			if ( get_post_type() == 'forum' ) { // 自定义文章类型	

				echo get_the_title();
			} 
			if ( get_post_type() == 'topic' ) { // 自定义文章类型	

				echo get_the_title() ;
			} 
			if ( get_post_type() == 'post' ) { // 文章 post
				$cat = get_the_terms($id, 'category'); $cat = $cat[0];
				$cat_code = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
				echo $cat_code = str_replace ('<a','<a itemprop="breadcrumb"', $cat_code );
				echo '<span>正文</span>';
			}
		}

		elseif ( is_tax() )   
		{ // 分类 存档
			    $query_obj = get_queried_object();
				// var_dump( $query_obj );
				$term_id   = $query_obj->term_id;
				$taxonomy   = $query_obj->taxonomy;
		echo get_term_parents_list( $term_id, $taxonomy,array( 'inclusive' => false ,'separator'=>' > ')  );
			echo $before . '' . single_cat_title('', false) . '' . $after;
		}
		elseif ( is_page() && !$post->post_parent ) { // 页面
			echo $before . get_the_title() . $after;
		} elseif ( is_page() && $post->post_parent ) { // 父级页面
			$parent_id  = $post->post_parent;
			$breadcrumbs = array();
			while ($parent_id) {
				$page = get_page($parent_id);
				$breadcrumbs[] = '<a itemprop="breadcrumb" href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
				$parent_id  = $page->post_parent;
			}
			$breadcrumbs = array_reverse($breadcrumbs);
			foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
			echo $before . get_the_title() . $after;
		} elseif ( is_search() ) { // 搜索结果
			echo $before ;
			printf( __( '搜索结果是: %s', 'xs' ),  get_search_query() );
			echo  $after;
		} elseif ( is_404() ) { // 404 页面
			echo $before;
			_e( '您找的页面不存在', 'xs' );
			echo  $after;
		}
		if ( get_query_var('paged') ) { // 分页
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() )
				echo sprintf( __( '( 页面 %s )', 'xs' ), get_query_var('paged') );
		}
		
		echo '</div></div></nav>';
	}
}

//使WordPress支持post thumbnail
if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );
}

// 禁止后台加载谷歌字体
function wp_remove_open_sans_from_wp_core() {
	wp_deregister_style( 'open-sans' );
	wp_register_style( 'open-sans', false );
	wp_enqueue_style('open-sans','');
}
add_action( 'init', 'wp_remove_open_sans_from_wp_core' );

//设置让文章内链接单独页面打开
function autoblank($text) {
	$return = str_replace('<a', '<a target="_blank"', $text);
	return $return;
}
add_filter('the_content', 'autoblank');

// 移除头部冗余代码
remove_action( 'wp_head', 'wp_generator' );// WP版本信息
remove_action( 'wp_head', 'rsd_link' );// 离线编辑器接口
remove_action( 'wp_head', 'wlwmanifest_link' );// 同上
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );// 上下文章的url
remove_action( 'wp_head', 'feed_links', 2 );// 文章和评论feed
remove_action( 'wp_head', 'feed_links_extra', 3 );// 去除评论feed
remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );// 短链接

// 友情链接
add_filter( 'pre_option_link_manager_enabled', '__return_true' );

    /**
* Disable the emoji's
*/
function disable_emojis() {
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );
remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
}
add_action( 'init', 'disable_emojis' );
/**
* Filter function used to remove the tinymce emoji plugin.
*/
function disable_emojis_tinymce( $plugins ) {
if ( is_array( $plugins ) ) {
return array_diff( $plugins, array( 'wpemoji' ) );
} else {
return array();
}
}
//移除头部多余.recentcomments样式
function Fanly_remove_recentcomments_style() {
    global $wp_widget_factory;
    remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
}
add_action( 'widgets_init', 'Fanly_remove_recentcomments_style' );


// 后台预览
add_editor_style( '/css/editor-style.css' );

function wpdocs_remove_menus(){
   
  remove_menu_page( 'edit.php?post_type=acf-field-group' );    //Pages
  remove_menu_page( 'edit-comments.php' );          //Comments
  
}
add_action( 'admin_menu', 'wpdocs_remove_menus' );


if( function_exists('acf_add_options_page') ) {
    
    acf_add_options_page(array(
        'page_title'    => '网站设置',
        'menu_title'    => '网站设置',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'create_users',
        'redirect'      => false
    ));
     
}
?>