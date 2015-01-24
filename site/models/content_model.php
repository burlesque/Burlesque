<?php

class Content_model extends CI_Model {

	public function __construct() {
		$this -> load -> database();
	}

	private $content_types = array();

	public function getContentTypes() {
		return $this -> config -> item('content_types');
	}

	public function get_content_title($id) {
		$content_id = substr($id, 2);
		if (substr($id, 0, 2) == '0.') {
			$static_pages = $this -> config -> item('static_pages');
			$static_page = str_replace('0.', '', $id);
			if (isset($static_pages[$static_page][$this -> config -> item('admin_language')])) {
				return $static_pages[$static_page][$this -> config -> item('admin_language')];
			} else {
				return false;
			}
		} else if (substr($id, 0, 2) == '1.') {
			$query = $this -> db -> query('SELECT * FROM content WHERE id = ' . $content_id . ' LIMIT 1');
			$content_data = $query -> row_array();
			if ($content_data) {
				$languages = $this->config->item('languages');
				$languages[$this -> config -> item('admin_language')]['signature'];
				$content_types = $this -> config -> item('content_types');
				$field = $content_types[$content_data['content_type']]['admin_title_field'];

				$title = $this -> get_custom_field_item($content_id, $field);
				if($title){
					return $title;
				} else {
					return false;
				}
			} else {
				return false;
			}
		} else {
			return false;
		}
	}

	public function get_content_item($id) {

		$query = $this -> db -> query('SELECT * FROM content WHERE id = ' . $id . ' LIMIT 1');
		$content_data = $query -> row_array();

		$query_fields = $this -> db -> query('SELECT field, data FROM fields_data WHERE content_id = ' . $id);
		$content_fields_array = array();
		if ($query_fields -> num_rows() > 0) {
			foreach ($query_fields->result() as $row) {
				$content_fields_array[$row -> field] = $row -> data;
			}
		}
		$content_data['content_fields'] = $content_fields_array;

		return $content_data;
	}

	public function get_custom_field_item($content_id, $field_name) {

		$query = $this -> db -> query('SELECT data FROM fields_data WHERE content_id = ' . $content_id . ' AND field = "' . $field_name . '" LIMIT 1');
		$result = $query -> row_array();
		return $result['data'];
	}

	public function get_content_type_admin_ui($type) {
		$custom_types = $this -> getContentTypes();
		$custom_type_fields = $custom_types[$type]['custom_fields'];
		$result = array();
		$result['custom_fields'] = array();
		$result['admin_title_field'] = $custom_types[$type]['admin_title_field'];
		$result['new_item_text'] = $custom_types[$type]['new_item_text'];
		$result['edit_item_text'] = $custom_types[$type]['edit_item_text'];
		$result['show_date_field'] = $custom_types[$type]['show_date_field'];
		foreach ($custom_type_fields as $field_name => $field_data) {
			array_push($result['custom_fields'], $field_data);
		}
		return $result;

	}

	public function get_contents_autocomplete($content_name, $allowed_types) {
		$custom_types = $this -> getContentTypes();
		$static_pages = $this -> config -> item('static_pages');
		$result = array();
		$allowed_types_array = array();
		if($allowed_types == '*'){
			$allow_all = true;	
		} else {
			$allow_all = false;	
			$allowed_types_array = array_map('trim', explode(',', $allowed_types));
		}
		
		foreach ($static_pages as $page_id => $page_data) {
			if ($page_data['show_in_admin'] && ($allow_all || in_array('static_'.$page_id, $allowed_types_array))) {
				$label = $page_data[$this -> config -> item('admin_language')];
				if (stristr($label, $content_name) != false || $content_name == '0.'.$page_id) {
					array_push($result, array('value' => '0.' . $page_id, 'label' => $label, 'content_type' => 'статична страница'));
				}
			}
		}
		foreach ($custom_types as $type_name => $type_data) {
			if ($custom_types[$type_name]['url_field'] != '' && ($allow_all || in_array($type_name, $allowed_types_array))) {
				$query = $this -> db -> query('SELECT CONCAT("1.", id) AS value, (SELECT data FROM fields_data WHERE content_id = content.id AND field = "' . $custom_types[$type_name]['admin_title_field'] . '") AS label FROM content WHERE content_type = "' . $type_name . '" AND published = 1 HAVING label LIKE "%' . $content_name . '%" OR value = "'.$content_name.'"');
				$found_array = $query -> result_array();
				foreach ($found_array as &$found_result) {
					$found_result['content_type'] = $custom_types[$type_name][$this -> config -> item('admin_language')];
				}
				$result = array_merge($result, $found_array);
			}
		}
		return $result;
	}

	public function get_contents_of_type($type, $sort_params='', $start, $limit) {
		$custom_types = $this -> getContentTypes();
		if ($custom_types[$type]['admin_dd_sort'] == 1) {
			$sort = 'order_num';
			$sort_direction = 'asc';
		} else {
			if ($sort_params) {
				$sort_data = json_decode($sort_params, true);
				$sort = $sort_data[0]['property'];
				$sort_direction = $sort_data[0]['direction'];
			} else {
				$sort = 'date';
				$sort_direction = 'desc';
			}

		}
		if (isset($custom_types[$type]['custom_fields'][$custom_types[$type]['admin_title_field']])) {
			$this -> db -> select('id, ( SELECT data FROM fields_data WHERE content_id = content.id AND field = "' . $custom_types[$type]['admin_title_field'] . '") AS name, content_type, order_num, date, last_edit_date, published, system');
		} else {
			$this -> db -> select('id, CONCAT("' . $custom_types[$type]['admin_title_field'] . '") AS name, content_type, order_num, date, last_edit_date, published, system');
		}
		$this -> db -> from('content');
		$this -> db -> where('content_type', $type);
		$this -> db -> limit($limit, $start);
		$this -> db -> order_by($sort, $sort_direction);
		$query = $this -> db -> get();
		$result = $query -> result_array();

		$this -> db -> select('id');
		$this -> db -> from('content');
		$this -> db -> where('content_type', $type);
		$total = $this -> db -> count_all_results();

		return array($result, $total);
	}

	public function get_content_types_names() {
		$result = array();
		foreach ($this->getContentTypes() as $content_type => $data) {
			$content_type_data = array();
			$content_type_data['id'] = $content_type;

			$content_type_data['lang1'] = isset($data['lang1']) ? $data['lang1'] : '';
			$content_type_data['lang1_plural'] = isset($data['lang1_plural']) ? $data['lang1_plural'] : '';

			$content_type_data['lang2'] = isset($data['lang2']) ? $data['lang2'] : '';
			$content_type_data['lang2_plural'] = isset($data['lang2_plural']) ? $data['lang2_plural'] : '';

			$content_type_data['lang3'] = isset($data['lang3']) ? $data['lang3'] : '';
			$content_type_data['lang3_plural'] = isset($data['lang3_plural']) ? $data['lang3_plural'] : '';

			$content_type_data['lang4'] = isset($data['lang4']) ? $data['lang4'] : '';
			$content_type_data['lang4_plural'] = isset($data['lang4_plural']) ? $data['lang4_plural'] : '';

			$content_type_data['lang5'] = isset($data['lang5']) ? $data['lang5'] : '';
			$content_type_data['lang5_plural'] = isset($data['lang5_plural']) ? $data['lang5_plural'] : '';

			$content_type_data['lang6'] = isset($data['lang6']) ? $data['lang6'] : '';
			$content_type_data['lang6_plural'] = isset($data['lang6_plural']) ? $data['lang6_plural'] : '';

			$content_type_data['name'] = $content_type_data[$this -> config -> item('admin_language') . '_plural'];

			$content_type_data['admin_dd_sort'] = $data['admin_dd_sort'];

			$content_type_data['only_edit'] = isset($data['only_edit']) ? $data['only_edit'] : false;

			array_push($result, $content_type_data);
		}
		return $result;
	}

	public function get_page($id) {
		$this -> db -> select('*');
		$this -> db -> from('content');
		$this -> db -> where('id', $id);
		$query = $this -> db -> get();
		$result = $query -> row_array();
		if ($result) {
			$cf_url_field = $result['url_field'];
			$page_id = $result['id'];
			$this -> db -> select('id, field, data');
			$this -> db -> from('fields_data');
			$this -> db -> where('content_id', $page_id);
			$query = $this -> db -> get();
			$fields = $query -> result_array();

			//$result['fields'] = array();
			foreach ($fields as $field_data) {
				$result[$field_data['field']] = $field_data['data'];
			}
			$lang = $this -> load -> get_var('lang');
			$content_types = $this -> config -> item('content_types');
			if ($cf_url_field) {
				$cf_url_field = str_replace('_*', '_' . $lang, $cf_url_field);
				$result['content_url'] = base_url() . $lang . '/' . $content_types[$result['content_type']][$this -> load -> get_var('lang_key') . '_plural'] . '/' . url_title($this -> menus_model -> strtolower_utf8($result[$cf_url_field])) . '-' . '1.' . $result['id'];
			}
			return $result;
		} else {
			return false;
		}
	}

	public function get_content_list($content_type, $where_array, $order, $limit) {
		if ($content_type == '*') {
			$where_clause = 'WHERE published = 1 ';
		} else {
			$where_clause = 'WHERE published = 1 AND c.content_type = "' . $content_type . '" ';
		}
		$having_clause = '';
		$content_fields = array('id', 'content_type', 'order_num', 'date', 'last_edit_date', 'published', 'system');
		if (count($where_array) > 0) {
			$where = '';

			foreach ($where_array as $where_obj) {
				if (in_array($where_obj[0], $content_fields)) {
					$where .= 'AND (c.' . $where_obj[0] . ' ' . $where_obj[1] . ' "' . $where_obj[2] . '") ';
				} else {
					$having_clause .= "HAVING (" . $where_obj[0] . " " . $where_obj[1] . " '" . $where_obj[2] . "') ";
				}
			}
			$where_clause .= $where;
		}

		$order_clause = '';
		if ($order) {
			$order_clause = 'ORDER BY ' . $order . ' ';
		}

		$limit_clause = '';
		if ($limit) {
			$limit_clause = 'LIMIT ' . $limit . ' ';
		}

		$content_types = $this -> config -> item('content_types');
		$content_type_fields = $content_types[$content_type]['custom_fields'];

		$query_sql = "SELECT c.id as id, c.content_type, c.url_field, c.order_num, DATE_FORMAT(c.date, '%d.%m.%Y %H:%i') as date, DATE_FORMAT(c.last_edit_date, '%d.%m.%Y %H:%i') as last_edit_date";

		foreach ($content_type_fields as $field_name => $field_data) {
			$query_sql .= ", MAX(CASE WHEN f.field = '" . $field_name . "' THEN f.data END) as " . $field_name;
		}

		$query_sql .= " FROM content c
						  left join fields_data f
							on c.id = f.content_id " . $where_clause . "group by c.id " . $having_clause . $order_clause . $limit_clause;
		$query = $this -> db -> query($query_sql);
		$content_list = $query -> result_array();
		foreach ($content_list as &$content) {
			$lang = $this -> load -> get_var('lang');
			$cf_url_field = $content['url_field'];
			if ($cf_url_field) {
				$cf_url_field = str_replace('_*', '_' . $lang, $cf_url_field);

				$content['content_url'] = base_url() . $lang . '/' . $content_types[$content_type][$this -> load -> get_var('lang_key') . '_plural'] . '/' . url_title($this -> menus_model -> strtolower_utf8($content[$cf_url_field])) . '-' . '1.' . $content['id'];
			}
		}

		return $content_list;
	}
	
	
	public function get_content_count($content_type, $where_array) {
		if ($content_type == '*') {
			$where_clause = 'WHERE published = 1 ';
		} else {
			$where_clause = 'WHERE published = 1 AND c.content_type = "' . $content_type . '" ';
		}
		$having_clause = '';
		$content_fields = array('id', 'content_type', 'order_num', 'date', 'last_edit_date', 'published', 'system');
		$select_fields = array();
		if (count($where_array) > 0) {
			$where = '';

			foreach ($where_array as $where_obj) {
				if (in_array($where_obj[0], $content_fields)) {
					$where .= 'AND (c.' . $where_obj[0] . ' ' . $where_obj[1] . ' "' . $where_obj[2] . '") ';
				} else {
					$having_clause .= "HAVING (" . $where_obj[0] . " " . $where_obj[1] . " '" . $where_obj[2] . "') ";
					array_push($select_fields, $where_obj[0]);
				}
			}
			$where_clause .= $where;
		}

		$content_types = $this -> config -> item('content_types');
		$content_type_fields = $content_types[$content_type]['custom_fields'];

		$query_sql = "SELECT c.id as count";
		
		foreach ($select_fields as $field_name) {
			$query_sql .= ", MAX(CASE WHEN f.field = '" . $field_name . "' THEN f.data END) as " . $field_name;
		}
		
		$query_sql .= " FROM content c
						  left join fields_data f
							on c.id = f.content_id " . $where_clause . "group by c.id " . $having_clause;
		$query = $this -> db -> query($query_sql);
		$content_list = $query -> result_array();

		return count($content_list);
	}
	
	

}
