<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*

| -------------------------------------------------------------------------

| URI ROUTING

| -------------------------------------------------------------------------

| This file lets you re-map URI requests to specific controller functions.

|

| Typically there is a one-to-one relationship between a URL string

| and its corresponding controller class/method. The segments in a

| URL normally follow this pattern:

|

|	example.com/class/method/id/

|

| In some instances, however, you may want to remap this relationship

| so that a different class/function is called than the one

| corresponding to the URL.

|

| Please see the user guide for complete details:

|

|	http://codeigniter.com/user_guide/general/routing.html

|

| -------------------------------------------------------------------------

| RESERVED ROUTES

| -------------------------------------------------------------------------

|

| There area two reserved routes:

|

|	$route['default_controller'] = 'welcome';

|

| This route indicates which controller class should be loaded if the

| URI contains no data. In the above example, the "welcome" class

| would be loaded.

|

|	$route['404_override'] = 'errors/page_missing';

|

| This route will tell the Router what URI segments to use if those provided

| in the URL cannot be matched to a valid route.

|

*/







$route['intro'] = 'asucontroller/intro';

$route['home'] = 'asucontroller/home/bg';

$route['home/(:any)'] = 'asucontroller/home/$1';

$route['musicals'] = 'asucontroller/previous_musicals/bg';

$route['musicals/(:any)'] = 'asucontroller/previous_musicals/$1';

$route['tour'] = 'asucontroller/tour/bg';

$route['tour/(:any)'] = 'asucontroller/tour/$1';

$route['musical/(:any)'] = 'asucontroller/musical/$1/bg';

$route['musical/(:any)/(:any)'] = 'asucontroller/musical/$1/$2';

$route['contact'] = 'asucontroller/contact/bg';

$route['contact/(:any)'] = 'asucontroller/contact/$1';

$route['about_allshookup/(:any)'] = 'asucontroller/about_allshookup/$1';

$route['about_us/(:any)'] = 'asucontroller/about_us/$1';



$route['crew/(actors|creative_team|vocals|organizers|dancers)/(:any)'] = 'asucontroller/crew/$1/$2';

$route['crew/(:any)'] = 'asucontroller/crew/actors/$1';



$route['archive/memphis'] = 'asucontroller/archive/memphis';

$route['memphis'] = "page/index";

$route['json/dates'] = 'asucontroller/json_dates';

$route['json/map_dates'] = 'asucontroller/json_map_dates';



$route[''] = 'asucontroller/home';

$route['en'] = 'asucontroller/home/en';



$route['admin'] = 'admin';

$route['content/(:any)'] = 'content/$1';

$route['file'] = 'file';

$route['mail'] = 'mail';

$route['image'] = 'image';

$route['auth'] = 'auth/index';

$route['auth/(:any)'] = 'auth/$1';

$route['auth/(:any)/(:any)'] = 'auth/$1/$2';

$route['menus/(:any)'] = 'menus/$1';

$route['default_controller'] = "asucontroller";

$route['404_override'] = "page/index/error_404";

$route['(:any)/(:any)'] = 'page/index/$1';

$route['(:any)'] = 'asucontroller/home/bg';



//$route['pages/(:any)'] = 'pages/view/$1';

//$route['pages'] = 'pages';

//$route['default_controller'] = 'pages/index';





/* End of file routes.php */

/* Location: ./application/config/routes.php */