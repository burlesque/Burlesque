<?php

/**

 * Created by JetBrains PhpStorm.

 * User: User

 * Date: 13-9-26

 * Time: 17:13

 * To change this template use File | Settings | File Templates.

 */



class ASUController extends CI_Controller{



    public function index($lang='bg'){

        //if (isset($_COOKIE["broadway_splash"])) 

            redirect("/home/$lang");

        


    }



    public function intro(){

        get_instance()->load->view('asu/content/intro/intro');

    }



    public function home($lang = 'bg')
    {
        if (($lang != 'bg') && ($lang!= 'en')) $lang='bg';

        get_instance()->lang->load('texts', $lang);

        $data = array();

        $data['lang']=$lang;

        $data['title'] = lang('home') . ' - All Shook Up!';

        $data['fade_in_lights'] = TRUE;

        $data['slide_pictures'] = get_instance()->data_model->get_content_of_type('slide_picture');



        $data['content'] = get_instance()->load->view('asu/content/home/home',$data ,TRUE);

        get_instance()->load->view('asu/master_layout', $data);

    }







    public function previous_musicals($lang = 'bg'){

        if (($lang != 'bg') && ($lang!= 'en')) $lang='bg';

        $data['lang'] = $lang;

        $this->load->helper('language');get_instance()->lang->load('texts', $lang);

        $data['title'] = lang('previous_musical');



        get_instance()->load->model('data_model');

        $data['container_title'] = $data['title'];

        $data['musicals'] = get_instance()->data_model->get_all_musicals();



        $data['content'] = get_instance()->load->view('asu/content/previous_musicals/previous_musicals', $data, TRUE);



        get_instance()->load->view('asu/master_layout', $data);

    }



    public function musical($musical_name, $lang='bg'){

        $musical_name = strtolower($musical_name);

        if (($lang != 'bg') && ($lang!= 'en')) $lang='bg';

        $data['lang'] = $lang;

        $this->load->helper('language');get_instance()->lang->load('texts', $lang);







        if ($musical_name == 'all-shook-up') redirect('home');



        get_instance()->load->model('data_model');

        $data['musical'] = get_instance()->data_model->get_old_musical($musical_name);



        if (is_null($data['musical'])) redirect('home');

        $data['title'] = lang('previous_musical'). ' - ' . $data['musical']['name_'.$lang];

        $data['container_title'] = $data['musical']['name_'.$lang] . '<br>' . $data['musical']['year'];



        $data['musicals'] = get_instance()->data_model->get_all_musicals();





        $data['content'] = get_instance()->load->view('asu/content/musical/musical', $data, true);

        get_instance()->load->view('asu/master_layout', $data);

    }



    public function tour($lang = 'bg'){

        if (($lang != 'bg') && ($lang!= 'en')) $lang='bg';

        $data['lang'] = $lang;

        $this->load->helper('language');get_instance()->lang->load('texts', $lang);



        $data['page'] = get_instance()->data_model->get_page('tour');

        $data['title'] = lang('tour dates');



        $data['content'] = get_instance()->load->view('asu/content/tour/tour',$data, true);

        get_instance()->load->view('asu/master_layout', $data);

    }



    public function about_allshookup($lang = 'bg'){

        if (($lang != 'bg') && ($lang!= 'en')) $lang='bg';

        $data['lang'] = $lang;

        $this->load->helper('language');get_instance()->lang->load('texts', $lang);





        $data['title'] = $data['container_title'] = "About All Shook Up!";



        $data['content'] = get_instance()->load->view('asu/content/about_allshookup/about_allshookup',$data, true);

        get_instance()->load->view('asu/master_layout', $data);

    }



    public function about_us($lang = 'bg'){

        if (($lang != 'bg') && ($lang!= 'en')) $lang='bg';

        $data['lang'] = $lang;

        $this->load->helper('language');get_instance()->lang->load('texts', $lang);



        $data['title'] = lang('about');

        $data['content'] = get_instance()->load->view('asu/content/about_us/about_us',$data, true);

        get_instance()->load->view('asu/master_layout', $data);

    }



    public function contact($lang = 'bg'){

        if (($lang != 'bg') && ($lang!= 'en')) $lang='bg';

        $data['lang'] = $lang;

        $this->load->helper('language');get_instance()->lang->load('texts', $lang);

        get_instance()->load->model('data_model');



        $data['page'] = get_instance()->data_model->get_page('contact');

        $data['title'] = $data['container_title'] = lang('contact_us');



        $data['content'] = get_instance()->load->view('asu/content/contact/contact',$data, true);

        get_instance()->load->view('asu/master_layout', $data);

    }



    public function crew($current_group,$lang = 'bg'){

        if (($lang != 'bg') && ($lang!= 'en')) $lang='bg';

        $data['lang'] = $lang;

        $this->load->helper('language');get_instance()->lang->load('texts', $lang);

        get_instance()->load->model('data_model');

        $data['title'] =  lang('the_crew');



        $data['current_group'] = $current_group;

        $data['group'] = get_instance()->data_model->get_crew_of_type($current_group);



        $data['content'] = get_instance()->load->view('asu/content/crew/crew', $data,true);

        get_instance()->load->view('asu/master_layout', $data);

    }



    public function archive($musical = 'memphis', $lang='bg'){





  //      get_instance()->ion_auth->register('rusata', 'umnica', 'vasdasd@as.sd') ;

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

            $template = 'home_page';

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



                    }

                    $content_type = $page_data['content_type'];

                    $page_vars['content_type'] = $content_type;

                    $page_vars['page_title'] = $page_title;

                    $page_data['page_title'] = $page_title;



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



    public function json_dates(){

       header('Content-Type: text/html; charset=utf-8');

       echo get_instance()->data_model->get_asu_dates_JSON();

    }



    public function json_map_dates(){

        header('Content-Type: text/html; charset=utf-8');

        echo get_instance()->data_model->get_asu_map_dates_JSON();

    }



}