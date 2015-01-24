<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('url_title'))
{
	function url_title($str, $separator = '-', $lowercase = FALSE)
	{
		return trim(str_replace(array('!', '@', '$', '-', ',', '>', '<', '&', '"', '\'', '^', '?', '(', ')', '*', '%', '#', '~', '{', '}', '_', ':', ';', ',', ' '), $separator, $str));
		
	}
}