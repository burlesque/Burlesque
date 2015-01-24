<?php 
header('Cache-Control: no-cache, must-rechoidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('content-type: application/json; charset=utf-8');


if($lang == 'bg'){
	$title = $title_bg;
	$text = $text_bg;
} else if($lang == 'en'){
	$title = $title_en;
	$text = $text_en;
}

$json = array('title' => $title, 'text' => $text);
echo(json_encode($json)); ?>