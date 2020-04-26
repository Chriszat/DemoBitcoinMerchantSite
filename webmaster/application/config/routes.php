<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'dashboard';

$route['oauth/signin'] = 'auth/admin_login';


$route[''] = 'dashboard';
$route['users'] = 'users/usersList';
$route['users/(:num)'] = 'users/userDetails/$1';
;
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
