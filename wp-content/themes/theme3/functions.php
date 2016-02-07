<?php

function load_style_script(){
	wp_enqueue_script('jquery-google', 'http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js' );
	wp_enqueue_script('jquery-flexslider', get_template_directory_uri() . '/js/jquery.flexslider.js');
	wp_enqueue_script('jquery-easing', get_template_directory_uri() . '/js/jquery.easing.js');
	wp_enqueue_script('jquery-mousewheel', get_template_directory_uri() . '/js/jquery.mousewheel.js');
	wp_enqueue_script('jquery-demo', get_template_directory_uri() . '/js/demo.js');
	wp_enqueue_script('jquery-ui', get_template_directory_uri() . '/js/jquery-ui-1.9.2.custom.js');

	wp_enqueue_style('style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style('style-flexslider', get_template_directory_uri() . '/flexslider.css' );
	wp_enqueue_style('style-jquery', get_template_directory_uri() . '/css/jquery-ui-1.9.2.custom.css' );
};

add_action('wp_enqueue_scripts', 'load_style_script');

function my_more_options(){
	// $id, $title, $callback, $page, $section, $args
	add_settings_field('phone_number', 'Телефон', 'phone_cb', 'general');

	// $option_group, $option_name, $sanitize_callback
	register_setting('general', 'my_phone');
}

add_action('admin_init', 'my_more_options');

function phone_cb(){
	?>
	<p>
		<input type="text" name="my_phone" id="" value="<?php echo esc_attr( get_option('my_phone')) ?>" class="regular-text">
	</p>
	<?php
}

register_sidebar(array(
	'name' => 'Иконки в шапке',
	'id'   => 'soc-ico',
	'description' =>'Используйте виджет Текст для добавления HTML-кода иконок',
	'before_widget' => '',
	'after_widget'  => ''
	));

register_nav_menus(array(
	'header_menu' => 'Меню в шапке',
	'footer_menu' => 'Меню в подвале'
	));

/**
* Registers a new post type
* @uses $wp_post_types Inserts new post type object into the list
*
* @param string  Post type key, must not exceed 20 characters
* @param array|string  See optional args description above.
* @return object|WP_Error the registered post type object, or an error object
*/
function slider_index() {

	$labels = array(
		'name'                => __( 'Слайды', 'text-domain' ),
		'singular_name'       => __( 'Слайдеры', 'text-domain' ),
		'add_new'             => _x( 'Добавить новый слайд', 'text-domain', 'text-domain' ),
		'add_new_item'        => __( 'Добавить новый слайд', 'text-domain' ),
		'edit_item'           => __( 'Редактировать слайд', 'text-domain' ),
		'new_item'            => __( 'Новый слайд', 'text-domain' ),
		'view_item'           => __( 'View Singular Name', 'text-domain' ),
		'search_items'        => __( 'Найти слайды', 'text-domain' ),
		'not_found'           => __( 'Слайды не найдены', 'text-domain' ),
		'not_found_in_trash'  => __( 'No Plural Name found in Trash', 'text-domain' ),
		'parent_item_colon'   => __( 'Parent Singular Name:', 'text-domain' ),
		'menu_name'           => __( 'Слайдер', 'text-domain' ),
	);

	$args = array(
		'labels'              => $labels,
		'public'              => true,
		'description'         => 'Слайдер на главной',
		'menu_icon'           => admin_url() . 'images/media-button-video.gif',
		'supports'            => array('title', 'editor', 'thumbnail')
	);

	register_post_type( 'slider', $args );
}

add_action( 'init', 'slider_index' );

add_theme_support('post-thumbnails' );

function my_list_tags($echo = true){

	$tags = get_the_tags();
	$tag_str = null;
	if($tags){
		$tag_str = '<p>';
		foreach ($tags as $tag) {
			$tag_str .= $tag->name . ', ';
		}
		$tag_str = rtrim($tag_str, ', ');
		$tag_str .= '</p>';
	}
	if($echo) echo $tag_str;
	else return  $tag_str;
}

register_sidebar(array(
 	'name' => 'Клиенты',
 	'id'  => 'clients',
 	'description' => 'Создаем клиентов с помощью текстового виджета'
	) );


function get_tags_in_cat($cat_id){
	$posts = get_posts( array('category' => $cat_id, 'numberposts' => -1) );
	$tags = array();

	foreach ($posts as $post) {
		$post_tags = get_the_tags($post->ID);
		if(!empty($post_tags)){
			foreach ($post_tags as $tag) {
				$tags[$tag->term_id] = $tag->name;
			}
		}
	}
	asort($tags);
	return $tags;
}

/**
* пагинация
**/
function wp_corenavi(){
	global $wp_query, $wp_rewrite;
	$pages = '';
	$max = $wp_query->max_num_pages;
	if (!$current = get_query_var('paged')) $current = 1;
	$a['base'] = str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999)));
	$a['total'] = $max;
	$a['current'] = $current;

	$total = 0; //1 - выводить текст "Страница N из N", 0 - не выводить
	$a['mid_size'] = 2; //сколько ссылок показывать слева и справа от текущей
	$a['end_size'] = 1; //сколько ссылок показывать в начале и в конце
	$a['prev_text'] = '';//'&laquo;'; //текст ссылки "Предыдущая страница"
	$a['next_text'] = '';//'&raquo;'; //текст ссылки "Следующая страница"

	if ($max > 1) echo '<div class="pager">';
	if ($total == 1 && $max > 1) $pages = '<span class="pages">Страница ' . $current . ' из ' . $max . '</span>'."\r\n";
	echo $pages . paginate_links($a);
	if ($max > 1) echo '</div>';
}

register_sidebar(array(
	'name'  => 'Сайдбар в сингле портфолио',
	'id'  =>  'single_portfolio',
	'description' => 'Виджеты в сингле портфолио',
	'before_widget' => '',
	'before_title' => '<h3><span>',
	'after_title' => '</span></h3>',
	) );
	
function usage() { printf(('%d / %s'), get_num_queries(), timer_stop(0, 3)); if ( function_exists('memory_get_usage') ) echo ' / ' . round(memory_get_usage()/1024/1024, 2) . 'mb '; } add_action('admin_footer_text', 'usage');

?>