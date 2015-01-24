<?php

class Page extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

    public function memphis($lang='bg'){
        $this->index($lang);
    }

	public function index($lang='bg') {
		//$this->output->enable_profiler(TRUE);
		$langs = $this->config->item('languages');
		$languages = array();
		foreach($langs as $lang_key => $lang_data)  {
			if($lang_data['enabled']){
				$active = '';
				if($lang_data['signature'] == $lang){
					$active = 'active';
				}
				$languages[$lang_data['signature']] = array('language_signature' => $lang_data['signature'], 'language_lang_key' => $lang_key, 'language_active' => $active, 'language_link' => base_url() . $lang_data['signature'] . '/');
			}
		}

		if(array_key_exists($lang,$languages)){
				$page_vars = array();
				$uri_string = urldecode(str_replace($lang, '', uri_string()));
				$current_page = '';
				$lastChar = '';
				if(substr($uri_string, 0, 1) == '/'){
					$uri_string = str_replace('/', '', $uri_string);
				}
				if($uri_string == '' || $uri_string == '/')	{
					$template = 'home_page';
				} else {
					$url_segments = explode('-', $uri_string);
					$current_page = end($url_segments);
					$static_pages = $this->config->item('static_pages');

					$lastChar = substr($current_page, strlen($current_page)-1, 1);
					$static_page = str_replace('a', '', $current_page);	
					if(substr($current_page, 0, 2) == '0.'){
						$content_type = 'static_page';
						$static_page = str_replace('0.', '', $static_page);
						if(array_key_exists($static_page, $static_pages)){
							$template = $static_pages[$static_page]['template_file'];
							$page_title = $static_pages[$static_page][$languages[$lang]['language_lang_key']];
							$page_vars['content_type'] = $content_type;
							$page_vars['page_title'] = $page_title;
							$page_data['page_title'] = $page_title;
							
							foreach($languages as &$language){
								//url_title($static_pages[$static_page][$language['language_lang_key']])
								$language['language_link'] = base_url() . $language['language_signature'] . '/' . url_title($this -> menus_model -> strtolower_utf8($static_pages[$static_page][$language['language_lang_key']])). '-' . $current_page;
							}
						} else {
							$template = 'error_404';
							//show_404($lang);
						}
					} else if(substr($current_page, 0, 2) == '1.'){
						$static_page = str_replace('1.', '', $static_page);
						$page_vars['lang_key'] = $languages[$lang]['language_lang_key'];
						$page_vars['lang'] = $lang;
						$this->load->vars($page_vars);

						$page_data = $this -> content_model -> get_page(substr($current_page, 2));
						
						if($page_data){
							$content_types = $this -> config -> item('content_types');
							foreach($languages as &$language){
								$cf_url_field = $page_data['url_field'];
								$cf_url_field = str_replace('_*', '_'.$language['language_signature'], $cf_url_field);

								$language['language_link'] = base_url() . $language['language_signature'] . '/' . $content_types[$page_data['content_type']][$language['language_lang_key'].'_plural'] . '/' . url_title($this -> menus_model -> strtolower_utf8($page_data[$cf_url_field])). '-' . $current_page;
							}
							
							$page_title = $page_data[str_replace('_*', '_'.$lang, $page_data['url_field'])] ;
							$template = $content_types[$page_data['content_type']]['template_file'];
							
						} else {
							$template = 'error_404';
							//show_404();
						}
						$content_type = $page_data['content_type'];
						$page_vars['content_type'] = $content_type;
						$page_vars['page_title'] = $page_title;
						$page_data['page_title'] = $page_title;
						
					} else {
						$template = 'error_404';
						//show_404();
					}
					
				}
				$page_vars['uri_string'] = $uri_string;
				$page_vars['lang_key'] = $languages[$lang]['language_lang_key'];
				$page_vars['languages'] = $languages;
				$page_vars['current_page'] = $current_page;
				$page_data['base_url'] = base_url();
				$page_data['lang'] = $lang;
				$this->load->driver('cache', array('adapter' => 'file'));

				if (!$site_menus = $this->cache->get('menu_'.$lang))
				{
				     $site_menus = $this -> menus_model ->get_menus($lang, $languages[$lang]['language_lang_key']);
				
				     //print_r($site_menus);
				     $this->cache->save('menu_'.$lang, $site_menus, 9999999999);
				}			
				$page_vars['menus'] = $site_menus;
				$this->load->vars($page_vars);
				$this->load->library('parser');
				$this->lang->load('texts', $lang);
				$this->load->helper('language');
				
				//$this->output->cache(30);


				if($lastChar != 'a'){
					$this->parser->parse('../../theme/header', $page_data);
				}
				$this->parser->parse('../../theme/templates/'.$template, $page_data);
				if($lastChar != 'a'){
					$this->parser->parse('../../theme/footer', $page_data);		
				}	
		} else {
			//redirect(base_url().'bg/');
		}
	}


}