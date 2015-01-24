<?php
class Menus_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	public function admin_get_menu($id = FALSE, $showUnpublished = FALSE, $depth = 0)
	{
	if ($id === FALSE)
	{
		return array();
	}
	
	$this->db->select('*');
	$this->db->from('menu_items');
	if($showUnpublished == false){
		$this->db->where('published', 1);
	}
	$this->db->where('parent_id', $id);
	$this->db->order_by("order_num", "asc"); 
	$query = $this->db->get();
	$menu_items = $query->result_array();
	
	for ($i=0; $i < count($menu_items); $i++){			
			$menu_items[$i]["item"] = $menu_items[$i][$this->config->item('admin_language')];
			$menu_items[$i]["type"] = 'menu_button_item';
			$menu_items[$i]["iconCls"] = 'menu_button_item';
			$menu_items[$i]["children"] = $this->admin_get_menu($menu_items[$i]["id"], true);
		}
	
	return $menu_items;
	
}


    public function admin_get_all_menus() {
		
		$this->db->select('*');
		$this->db->from('menu_items');
		$this->db->where('parent_id', 0);
		$this->db->order_by("order_num", "asc"); 
		$query = $this->db->get();

		$menu_items = $query->result_array();
		for ($i=0; $i < count($menu_items); $i++){
			$menu_items[$i]["item"] = $menu_items[$i][$this->config->item('admin_language')];
			$menu_items[$i]["type"] = 'menu_item';
			$menu_items[$i]["iconCls"] = 'menu_item';
			$menu_items[$i]["expanded"] = true;
			$menu_items[$i]["children"] = $this->admin_get_menu($menu_items[$i]["id"], true);
		}
		return $menu_items;
		
		
		
	}
	
	
	
	
	//------------
	
	
	public function get_submenu($id = FALSE, $lang, $lang_key)
	{
		
	if ($id === FALSE)
	{
		return array();
	}
	
	

	$this->db->select($lang_key . ' as title, menu_items.id as id, menu_items.parent_id, menu_items.resource, menu_items.target, content.id as content_id, content.content_type');
	$this->db->from('menu_items');
	$this->db->where('menu_items.published', 1);
	$this->db->where('parent_id', $id);
	$this->db->join('content', 'content.id = SUBSTRING(menu_items.resource FROM 3)', 'left');
	$this->db->order_by("menu_items.order_num", "asc");
	$query = $this->db->get();
	$menu_items = $query->result_array();
	
	for ($i=0; $i < count($menu_items); $i++){
		$menu_items[$i]["resource"] = substr($menu_items[$i]["resource"], 0, strpos($menu_items[$i]["resource"],'::'));
		$menu_items[$i]["content_id"] = $menu_items[$i]["resource"];
		$menu_items[$i]["resource"] = $this->generateURL($menu_items[$i]["resource"], $menu_items[$i]["content_type"], $lang, $lang_key);
		$menu_items[$i]["children"] = $this->get_submenu($menu_items[$i]["id"], $lang, $lang_key);
	}
	return $menu_items;
	
}

	public function generateURL($resource, $content_type, $lang, $lang_key){
		$content_types = $this -> config -> item('content_types');
		if($resource != ''){
			if(substr($resource, 0, 2) == '0.'){
				$page_id = substr($resource, 2);
				$static_pages = $this->config->item('static_pages');
				$resource = base_url() . $lang . '/' . url_title($this->strtolower_utf8($static_pages[$page_id][$lang_key])). '-' . $resource;
			} else if(substr($resource, 0, 2) == '1.'){
				$page_id = substr($resource, 2);
				if($content_type){
					$cf_url_field = $content_types[$content_type]['url_field'];
					$sql = "SELECT data FROM fields_data WHERE content_id = ? AND field = ? LIMIT 1";
					$cf_url_field = str_replace('_*', '_'.$lang, $cf_url_field);
					$url_query = $this->db->query($sql, array($page_id, $cf_url_field)); 
					if($url_query){
						$url_data = $url_query->row_array();
						//$content_types[$content_type][$lang_key.'_plural']  // може да се използва за категория преди заглавието на линка
						$resource = base_url() . $lang . '/' . $content_types[$content_type][$lang_key.'_plural']  . '/' . url_title($this->strtolower_utf8($url_data['data'])). '-' . $resource;
					} else {
						$resource = base_url() . $lang . '/';
					}
				}	
			} else {
				if(substr($resource, 0, 7) != 'http://'){
					$resource = base_url() . $lang . '/' . $resource;
				}
			}		
		} 
		return $resource; 
	}


    public function get_menus($lang, $lang_key) {
		$this->db->select($lang_key . ' as title, id, parent_id, main');
		$this->db->from('menu_items');
		$this->db->where('parent_id', 0);
		$query = $this->db->get();
		$menu_items = $query->result_array();
		$menus = array();
		for ($i=0; $i < count($menu_items); $i++){
			$menus['menu_'.$menu_items[$i]["id"]]['title'] = $menu_items[$i]["title"];
			$menus['menu_'.$menu_items[$i]["id"]]['main'] = $menu_items[$i]["main"];
			$menus['menu_'.$menu_items[$i]["id"]]['children'] = $this->get_submenu($menu_items[$i]["id"], $lang, $lang_key);
		}

		return $menus;
	}
	
	public function strtolower_utf8($string) {
      $convert_to = array(
           "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u",
           "v", "w", "x", "y", "z", "à", "á", "â", "ã", "ä", "å", "æ", "ç", "è", "é", "ê", "ë","ę", "ì", "í", "î", "ï",
           "ð", "ñ", "ò", "ó", "ô", "õ", "ö", "ø", "ù", "ú", "û", "ü", "ý", "а", "б", "в", "г", "д", "е", "ё", "ж",
           "з", "и", "й", "к", "л", "м", "н", "о", "п", "р", "с", "т", "у", "ф", "х", "ц", "ч", "ш", "щ", "ъ", "ы",
           "ь", "э", "ю", "я"
      );
      $convert_from = array(
           "A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U",
           "V", "W", "X", "Y", "Z", "À", "Á", "Â", "Ã", "Ä", "Å", "Æ", "Ç", "È", "É", "Ê", "Ë","Ę", "Ì", "Í", "Î", "Ï",
           "Ð", "Ñ", "Ò", "Ó", "Ô", "Õ", "Ö", "Ø", "Ù", "Ú", "Û", "Ü", "Ý", "А", "Б", "В", "Г", "Д", "Е", "Ё", "Ж",
           "З", "И", "Й", "К", "Л", "М", "Н", "О", "П", "Р", "С", "Т", "У", "Ф", "Х", "Ц", "Ч", "Ш", "Щ", "Ъ", "Ъ",
           "Ь", "Э", "Ю", "Я"
      );
      return str_replace($convert_from, $convert_to, $string);
 }
	
	
}