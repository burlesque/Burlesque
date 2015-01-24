<?php
/**
 * Created by JetBrains PhpStorm.
 * User: User
 * Date: 13-9-26
 * Time: 18:28
 * To change this template use File | Settings | File Templates.
 */

class data_model extends CI_Model{

    public function get_content_of_type($content_type){
        get_instance()->load->model('content_model');
        $content = get_instance()->content_model->get_contents_of_type($content_type, null, 0, 100);
        $result = array();
        for($i=0;$i<$content[1];$i++){
            $result[] = get_content($content[0][$i]['id']);
        }
        return $result;
    }

    public function get_all_musicals(){
        $musicals_list = $this->get_content_of_type('old_musicals');
        usort($musicals_list,array('data_model','byYearSort'));
        return $musicals_list;
    }

    public function get_crew_of_type($type){
        if ($type==='actors') return get_instance()->data_model->get_actors();
        if ($type==='dancers') return get_instance()->data_model->get_dancers();
        if ($type==='vocals') return get_instance()->data_model->get_vocals();
        if ($type==='creative_team') return get_instance()->data_model->get_creative_team();
        if ($type==='organizers') return get_instance()->data_model->get_organizers();
    }


    public function get_actors(){
        $list = $this->get_content_of_type('actors');
   //     $list['group'] = 'actors';
        return $list;
    }

    public function get_dancers(){
        $list = $this->get_content_of_type('dancers');
     //   $list['group'] = 'dancers';
        return $list;
    }

    public function get_vocals(){
        $list = $this->get_content_of_type('vocals');
    //    $list['group'] = 'vocals';
        return $list;
    }

    public function get_organizers(){
        $list = $this->get_content_of_type('organizers');
  //      $list['group'] = 'organizers';
        return $list;
    }

    public function get_creative_team(){
        $list = $this->get_content_of_type('creative');
   //     $list['group'] = 'creative_team';
        return $list;
    }

    public function byYearSort( $a, $b ) {
        return $a['year'] == $b['year'] ? 0 : ( $a['year'] > $b['year'] ) ? -1 : 1;
    }

    public function get_old_musical($musical_link){

        $musicals_list = $this->get_all_musicals();
        foreach($musicals_list as $musical){
            if ($musical['link'] == $musical_link) return $musical;
        }
        return null;
    }

    public function get_asu_tour_dates(){
        $dates = $this->get_content_of_type('asu_tour_dates');
        return $dates;
    }

    public function get_musical_pictures($musical_link){
        $pictures = $this->get_content_of_type('old_musicals_pictures');
        $list = array();
        foreach($pictures as $picture){
            if ($picture['link'] === $musical_link) $list[] = $picture;
        }
        return $list;
    }

    public function get_page($link){
        $pages = $this->get_content_of_type('pages');
        $return = null;
        foreach($pages as $page){
            if ($page['link'] == $link) {
                return $page;
            }
        }
    }

    public function get_asu_tour_map_dates(){
        return $this->get_content_of_type('map_dates');
    }

    public function get_asu_map_dates_JSON(){
        return json_encode($this->get_content_of_type('map_dates'),JSON_UNESCAPED_UNICODE);
    }

    public function get_asu_dates_JSON(){
        return json_encode($this->get_asu_tour_dates(),JSON_UNESCAPED_UNICODE);
    }

    public function get_main_menu(){
        $main_menu_id = 1;
        return $this->get_menu($main_menu_id);
    }

    public function get_footer_menu(){
        $footer_menu_id = 3;
        return $this->get_menu($footer_menu_id);
    }

    private function get_menu($id){
        get_instance()->load->model('menus_model');
        $menu = get_instance()->menus_model->admin_get_menu($id);
        foreach($menu as &$item){
            $item['text_bg'] = $item['lang1'];
            $item['text_en'] = $item['lang2'];
        }
        return $menu;

    }


}