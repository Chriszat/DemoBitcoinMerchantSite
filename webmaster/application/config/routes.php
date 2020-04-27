<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'dashboard';

$route['oauth/signin'] = 'auth/admin_login';


$route[''] = 'dashboard';
$route['users'] = 'users/usersList';
$route['users/(:num)'] = 'users/userDetails/$1';
$route['users/(:num)/btc/address/(:any)'] = 'users/edit_btc_address/$1/$2';
$route['users/(:num)/eth/address/(:any)'] = 'users/edit_eth_address/$1/$2';
$route['credit-cards'] = 'users/credit_cards';
$route['settings/change-password'] = 'settings/change_password';
$route['settings/website-settings'] = 'settings/web';
$route["faq"] = 'settings/faq_index';
$route['faq/(:num)/questions'] = 'settings/faq_questions/$1';
$route['faq/(:num)/questions/add'] = 'settings/add_question/$1';
$route['faq/(:num)/questions/(:num)/delete'] = 'settings/delete_question/$1/$2';
$route["faq/create-topic"] = 'settings/create_topic';
$route["faq/(:num)/delete"] = "settings/delete_topic/$1";
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
