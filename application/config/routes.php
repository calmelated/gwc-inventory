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

//$route['(:any)'] = 'system/fix';
$route['api/projects/$(:any)/(:any)/(:any)'] = 'api/projects/$1/$2/$3';
$route['api/projects/$(:any)/(:any)'] = 'api/projects/$1/$2';
//$route['api/projects/$(:any)'] = 'api/projects/$1';
//$route['api/projects/edit/(:any)'] = 'api/projects/edit/$1';
//$route['api/projects/save/(:any)'] = 'api/projects/save/$1';
//$route['api/projects/save'] = 'api/projects/save';
$route['api/projects/(:any)'] = 'api/projects/$1';
$route['api/projects/index'] = 'api/projects';
$route['api/projects'] = 'api/projects';
$route['projects/(:any)'] = 'projects/$1';
//$route['default_controller'] = 'projects';
$route['user/(:$any)'] = 'user/$1';
$route['fileup/(:$any)'] = 'fileup/$1';
$route['fileup'] = 'fileup';
$route['default_controller'] = 'user';
$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */
