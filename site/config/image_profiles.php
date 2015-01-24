<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
* IMAGE PROFILES
*/

//------ system -------
$config['image_profiles']['thumb']['width'] = 100;
$config['image_profiles']['thumb']['height'] = 100;
$config['image_profiles']['thumb']['maintain_ratio'] = true;
$config['image_profiles']['thumb']['fit'] = false;
$config['image_profiles']['thumb']['quality'] = 85;
$config['image_profiles']['thumb']['show_in_admin'] = false;
$config['image_profiles']['thumb']['admin_name'] = 'тъмб 100px';
//------ system -------


$config['image_profiles']['big_thumb']['width'] = 244;
$config['image_profiles']['big_thumb']['height'] = 145;
$config['image_profiles']['big_thumb']['maintain_ratio'] = true;
$config['image_profiles']['big_thumb']['fit'] = true;
$config['image_profiles']['big_thumb']['quality'] = 95;
$config['image_profiles']['big_thumb']['show_in_admin'] = true;
$config['image_profiles']['big_thumb']['admin_name'] = 'голям тъмбнейл';

$config['image_profiles']['large']['width'] = 640;
$config['image_profiles']['large']['height'] = 640;
$config['image_profiles']['large']['maintain_ratio'] = true;
$config['image_profiles']['large']['fit'] = false;
$config['image_profiles']['large']['quality'] = 99;
$config['image_profiles']['large']['show_in_admin'] = true;
$config['image_profiles']['large']['admin_name'] = 'голям размер';

$config['image_profiles']['actor_picture']['width'] = 220;
$config['image_profiles']['actor_picture']['height'] = 280;
$config['image_profiles']['actor_picture']['maintain_ratio'] = true;
$config['image_profiles']['actor_picture']['fit'] = false;
$config['image_profiles']['actor_picture']['quality'] = 99;
$config['image_profiles']['actor_picture']['show_in_admin'] = false;
$config['image_profiles']['actor_picture']['admin_name'] = 'голям размер';

$config['image_profiles']['crew_picture']['width'] = 59;
$config['image_profiles']['crew_picture']['height'] = 59;
$config['image_profiles']['crew_picture']['maintain_ratio'] = true;
$config['image_profiles']['crew_picture']['fit'] = true;
$config['image_profiles']['crew_picture']['quality'] = 99;
$config['image_profiles']['crew_picture']['show_in_admin'] = false;
$config['image_profiles']['crew_picture']['admin_name'] = 'голям размер';

$config['image_profiles']['news_picture']['width'] = 117;
$config['image_profiles']['news_picture']['height'] = 117;
$config['image_profiles']['news_picture']['maintain_ratio'] = true;
$config['image_profiles']['news_picture']['fit'] = true;
$config['image_profiles']['news_picture']['quality'] = 99;
$config['image_profiles']['news_picture']['show_in_admin'] = false;
$config['image_profiles']['news_picture']['admin_name'] = 'голям размер';
