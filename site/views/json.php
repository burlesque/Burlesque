<?php 
header('Cache-Control: no-cache, must-rechoidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('content-type: application/json; charset=utf-8');


echo(json_encode($data)); ?>