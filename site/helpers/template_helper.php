<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

$GLOBALS['breadcrumbs'] = array();

function render_menu($id, $depth = 0, $active_cls = 'active', $title = true, $ul_id = '', $ul_levels_cls = array()) {
	$CI = &get_instance();
	$menu_data = $CI -> load -> get_var('menus');
	$menu_items = $menu_data['menu_'.$id]['children'];
	$html = '';
	if ($title) {
		$html .= '<h1>' . $menu_data['menu_'.$id]['title'] . '</h1>';
	}
	$submenu_data = render_submenu($menu_items, $active_cls, $ul_id, $ul_levels_cls, 0, $menu_data['menu_'.$id]['main']);
	
	$html .= $submenu_data['html'];
	return $html;
}


function render_submenu($menu_items, $active_cls, $ul_id, $ul_levels_cls, $depth, $is_main){
	$html = '';
	$active = false;
	if ($menu_items) {
		$CI = &get_instance();
		$current_page = $CI -> load -> get_var('current_page');
		$content_type = $CI -> load -> get_var('content_type');
		$content_types = $CI -> config -> item('content_types');
		$idvalue = '';
		if($ul_id && $depth == 0){
			$idvalue = ' id="' . $ul_id . '"';
		}

		if(array_key_exists($depth, $ul_levels_cls)){
			$ulclass = $ul_levels_cls[$depth];
		} else {
			$ulclass = '';
		}
		$html .= '<ul'.$idvalue.' class="' . $ulclass . '">';
		for ($i = 0; $i < count($menu_items); $i++) {
			$liclass = '';
			$submenu_data = render_submenu($menu_items[$i]["children"], $active_cls, $ul_id, $ul_levels_cls, $depth+1, $is_main);
			if(isset($content_types[$content_type]['parent_page'])){
				if($menu_items[$i]["content_id"] == $content_types[$content_type]['parent_page']){
					$active = true;
					array_push($GLOBALS['breadcrumbs'], array($menu_items[$i]["title"], $menu_items[$i]["resource"]));
				}
			}
			if ($menu_items[$i]["content_id"] != '' && ($current_page == $menu_items[$i]["content_id"] || $submenu_data['active'])) {
				$liclass = $active_cls;
				$active = true;
				
				if($is_main){
					array_push($GLOBALS['breadcrumbs'], array($menu_items[$i]["title"], $menu_items[$i]["resource"]));
				}
			}
			
			$html .= '<li class="' . $liclass . '"><a href="' . $menu_items[$i]["resource"] . '" target="' . $menu_items[$i]["target"] . '">' . $menu_items[$i]["title"] . '</a>';
			$html .= $submenu_data['html'];
			
			$html .= '</li>';
		}
		$html .= '</ul>';
	}
	return array('html' => $html, 'active' => $active);
}

function render_breadcrumbs($separator = ' >> '){
	$CI = &get_instance();
	$current_page = $CI -> load -> get_var('current_page');
	if($current_page){
		
		$lang = $CI -> load -> get_var('lang');
		$html = '<a href="'.base_url() . $lang . '/'.'">'.lang('home').'</a>';
		
		$breadcrumbs = $GLOBALS['breadcrumbs'];
		$last_breadcrumb_url = $breadcrumbs[0];
		$last_breadcrumb_page_id = str_replace('a', '', end(explode('-', $last_breadcrumb_url[1])));
		if($current_page != $last_breadcrumb_page_id){
			array_unshift($breadcrumbs, array($CI -> load -> get_var('page_title'), ''));
		}

		
		for($i = count($breadcrumbs)-1; $i >= 0; $i--){
			if($i == 0){
				$html .= $separator . $breadcrumbs[$i][0];
			} else {
				$html .= $separator . '<a href="'.$breadcrumbs[$i][1].'">'.$breadcrumbs[$i][0].'</a>';
			}
		}
	} else {
		$html = '';
	}
	return $html;
}

function render_content_list($content_type, $template = '', $separator = '', $where = array(), $order = '', $limit = '') {
	$CI = &get_instance();
	$content_data = $CI -> content_model -> get_content_list($content_type, $where, $order, $limit);
	$html = '';
	$CI -> load -> library('parser');
	$contents_num = count($content_data);
	for ($i = 0; $i < $contents_num; $i++) {
		$content = $content_data[$i];
		$html .= $CI -> parser -> parse_string($template, $content, true);
		if ($i < $contents_num - 1) {
			$html .= $separator;
		}
	}
	return $html;
}


function render_pagination($content_type, $template = '', $separator = '', $where = array(), $items_per_page = 12, $page = 1, $show_prev_next = true) {
	$CI = &get_instance();
	$content_count = $CI -> content_model -> get_content_count($content_type, $where);
	$html = '';
	$CI -> load -> library('parser');
	
	$pages = ceil($content_count/$items_per_page);
	
	if($show_prev_next){
		$content = array('page' => $page-1, 'view' => '','class' => 'prev');
		$templ = $template;
		if($page <= 1){
			$templ = preg_replace("/\<a([^>]*)\>([^<]*)\<\/a\>/i", "", $template);
		}
		$html .= $CI -> parser -> parse_string($templ, $content, true);
	}
	for ($i = 1; $i <= $pages; $i++) {
		$class = '';
		if($i == $page){
			$class = 'current';
		}
		$content = array('page' => $i, 'view' => $i, 'class' => $class);
		$html .= $CI -> parser -> parse_string($template, $content, true);
		if ($i < $pages - 1) {
			$html .= $separator;
		}
	}
	if($show_prev_next){
		$content = array('page' => $page+1, 'view' => '','class' => 'next');
		$templ = $template;
		if($page >= $pages){
			$templ = preg_replace("/\<a([^>]*)\>([^<]*)\<\/a\>/i", "", $template);
		}
		$html .= $CI -> parser -> parse_string($templ, $content, true);
	}
	return $html;
}



function render_content($content_id, $template = '') {
	$CI = &get_instance();
	if(strpos($content_id,'::') !== false){
		$content_id = substr($content_id, 0, strpos($content_id,'::'));
	}
	
	$content_data = $CI -> content_model -> get_page($content_id);
	
	return $CI -> parser -> parse_string($template, $content_data, true);
}

function get_content($content_id) {
	$CI = &get_instance();
	$content_data = $CI -> content_model -> get_page($content_id);
	
	return $content_data;
}


function render_language_switcher($template = ''){
	$html = '';
	$CI = &get_instance();
	$languages = $CI -> load -> get_var('languages');
	foreach($languages as $lang => $lang_data){
		$html .= $CI -> parser -> parse_string($template, $lang_data, true);
	}
	return $html;
}

function get_limit_from_pagination($current_page, $items_per_page){
	$from = ($current_page-1)*$items_per_page;
	$to = $items_per_page;
	return $from .', ' . $to;
}

function add_url_parameter($url, $paramName, $paramValue) {
    // first check whether the parameter is already
    // defined in the URL so that we can just update
    // the value if that's the case.

    if (preg_match('/[?&]('.$paramName.')=[^&]*/', $url)) {

        // parameter is already defined in the URL, so
        // replace the parameter value, rather than
        // append it to the end.
        $url = preg_replace('/([?&]'.$paramName.')=[^&]*/', '$1='.$paramValue, $url) ;
    } else {
        // can simply append to the end of the URL, once
        // we know whether this is the only parameter in
        // there or not.
        $url .= strpos($url, '?') ? '&' : '?';
        $url .= $paramName . '=' . $paramValue;
    }
    return $url ;
}

