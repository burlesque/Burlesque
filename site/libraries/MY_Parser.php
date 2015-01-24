<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class MY_Parser extends CI_Parser {

	function My_Parser() {

	}
	
	function parse($template, $data, $return = FALSE, $include = FALSE)
	{	
		$CI =& get_instance();

		if ($template == '')
		{
			return FALSE;
		}

		if ($include === FALSE)
		{		
			$template = $CI->load->view($template, $data, TRUE);
		}

		if (isset($data) && $data != '')
		{
			foreach ($data as $key => $val)
			{
				if (is_array($val))
				{
					$template = $this->_parse_pair($key, $val, $template);		
				}
				else
				{
					$template = $this->_parse_single($key, (string)$val, $template);
				}
			}
		}

		// Check for conditional statments
		$template = $this->conditionals($template, $data);

		// populate form tags
		preg_match_all('/{form:(.+)}/i', $template, $posts);
		if ($posts)
		{
			foreach ($posts[1] as $post => $value)
			{
				if ($postValue = $CI->input->post($value))
				{
					$template = str_replace('{form:'.$value.'}', $postValue, $template);
				}
				else
				{
					$template = str_replace('{form:'.$value.'}', '', $template);
				}
			}
		}

		//$template = preg_replace('/{(.+)}/i', '', $template);

		if ($return == FALSE)
		{
			$CI->output->append_output($template);
		}

		return $template;
	}

	// --------------------------------------------------------------------

	/**
	 *  Parse conditional statments
	 * 
	 * @access    public
	 * @param    string
	 * @param    bool
	 * @return    string
	*/

	function conditionals($template, $data)
	{
		if (preg_match_all('/'.$this->l_delim.'if (.+)'.$this->r_delim.'(.+)'.$this->l_delim.'\/if'.$this->r_delim.'/siU', $template, $conditionals, PREG_SET_ORDER))
		{
			if (count($conditionals) > 0)
			{
				// filter through conditionals
				foreach($conditionals as $condition)
				{
					// get conditional and the string inside
					$code = (isset($condition[0])) ? $condition[0] : FALSE;
					$condString = (isset($condition[1])) ? str_replace(' ', '', $condition[1]) : FALSE;
					$insert = (isset($condition[2])) ? $condition[2] : '';

					// check code is valid
					if (!preg_match('/('.$this->l_delim.'|'.$this->r_delim.')/', $condString, $condProblem))
					{
						if (!empty($code) || $condString != FALSE || !empty($insert))
						{
							if (preg_match("/^!(.*)$/", $condString, $matches))
							{
								$condVar = (@!$data[trim($matches[1])]) ? 0 : $data[trim($matches[1])];

								@$result = (!$condVar) ? TRUE : FALSE;
							}
							elseif (preg_match("/([a-z0-9\-_:\(\)]+)(\!=|=|==|>|<)([a-z0-9\-_\/]+)/", $condString, $matches))
							{
								$condVar = (@!$data[$matches[1]]) ? 0 : $data[trim($matches[1])];

								if ($matches[2] == '==' || $matches[2] == '=')
								{
									@$result = ($condVar === $matches[3]) ? TRUE : FALSE;
								}
								elseif ($matches[2] == '!=')
								{
									@$result = ($condVar !== $matches[3]) ? TRUE : FALSE;
								}
								elseif ($matches[2] == '>')
								{
									@$result = ($condVar > $matches[3]) ? TRUE : FALSE;
								}
								elseif ($matches[2] == '<')
								{
									@$result = ($condVar < $matches[3]) ? TRUE : FALSE;
								}							
							}
							else
							{
								// if the variable is set
								if (isset($data[$condString]) && is_array($data[$condString]))
								{
									$result = (count($data[$condString]) > 0) ? TRUE : FALSE;							
								}
								else
								{
									$result = (isset($data[$condString]) && $data[$condString] != '') ? TRUE : FALSE;
								}
							}

							// filter for else
							$insert = preg_split('/'.$this->l_delim.'else'.$this->r_delim.'/siU', $insert);

							if ($result == TRUE)
							{
								// show the string inside
								$template = str_replace($code, $insert[0], $template);
							}
							else
							{
								if (is_array($insert))
								{
									$insert = (isset($insert[1])) ? $insert[1] : '';
									$template = str_replace($code, $insert, $template);
								}
								else
								{
									$template = str_replace($code, '', $template);
								}
							}
						}
					}
					else
					{
						// remove any conditionals we cant process
						$template = str_replace($code, '', $template);
					}
				}
			}					

			//print_r($conditionals);
		}

		return $template;
	}

	// --------------------------------------------------------------------

	/**
	 *  Matches a variable pair
	 *
	 * @access	private
	 * @param	string
	 * @param	string
	 * @return	mixed
	 */ 

	function _match_pair($string, $variable)
	{
		$variable = str_replace('(', '\(', $variable);
		$variable = str_replace(')', '\)', $variable);		

		if ( ! preg_match("|".$this->l_delim . $variable . $this->r_delim."(.+?)".$this->l_delim . '/' . $variable . $this->r_delim."|s", $string, $match))
		{
			return FALSE;
		}

		return $match;
	}	
	
	
	function _parse_single($key, $val, $string) {
		$newval = $val;
		$find = "/" . $this -> l_delim . "" . $key . ".*" . $this -> r_delim . "/U";
		preg_match($find, $string, $matches);
		if (!empty($matches)) {
			$temp = trim($matches[0], $this -> l_delim . $this -> r_delim);
			$commands = explode(":", $temp);
			
			if (count($commands) > 1) {

				for ($i = 1; $i < count($commands); $i++) {
					$res = explode("@", $commands[$i]);
					switch($res[0]) {
						case "allcaps" :
							$newval = strtoupper($newval);
							break;
						case "addslashes" :
							$newval = addslashes($newval);
							break;
						case "money" :
							$newval = number_format((int)$newval, 2, ".", ",");
							break;
						case "caps" :
							$newval = ucwords(strtolower($newval));
							break;
						case "nocaps" :
							$newval = strtolower($newval);
							break;
						case "ucfirst" :
							$newval = ucfirst($newval);
							break;
						case "bool1" :
							$newval = ($newval == 1) ? "True" : "False";
							break;
						case "bool2" :
							$newval = ($newval == 1) ? "Yes" : "No";
							break;
						case "bool3" :
							$newval = ($newval == 1) ? "Active" : "Inactive";
							break;
						case "climit" :
							$int = (count($res) < 2) ? 128 : $res[1];
							$newval = character_limiter($newval, $int);
							break;
						case "htmlchars" :
							$newval = quotes_to_entities($newval);
							break;
						case "wlimit" :
							$int = (count($res) < 2) ? 25 : $res[1];
							$newval = word_limiter($newval, $int);
							break;
						case "wrap" :
							$int = (count($res) < 2) ? 76 : $res[1];
							$newval = word_wrap($newval, $int);
							break;
						case "hilite" :
							$str = (count($res) < 2) ? "" : $res[1];
							$color = (count($res) < 3) ? "#990000" : $res[2];
							$newval = highlight_phrase($newval, $str, "<span style=\"color:{$color}\">", "</span>");
							break;
						case "safe_mailto" :
							$alt_text = (count($res) < 2) ? "" : $res[1];
							$newval = safe_mailto($newval, $alt_text);
							break;
						case "url_title" :
							$sep = (count($res) < 2) ? "dash" : $res[1];
							$newval = url_title($newval, $sep);
							break;
						case "remove_img" :
							$newval = strip_image_tags($newval);
							break;
						case "hash" :
							$hash = (count($res) < 2) ? "md5" : $res[1];
							$newval = dohash($newval, $hash);
							break;
						case "stripslashes" :
							$newval = stripslashes($newval);
							break;
						case "strip_tags" :
							$allowed = (count($res) < 2) ? "" : $res[1];
							$newval = strip_tags($newval, $allowed);
							break;
						case "date" :
							$date_format = (count($res) < 2) ? " H:i" : $res[1];
							$dateval = new DateTime($newval);
							$newval = $dateval->format($date_format);
							break;	
						/** other output string format options here **/
					}
				}
				return str_replace($matches[0], $newval, $string);
			}
		}
		return parent::_parse_single($key, $val, $string);
	}

}
