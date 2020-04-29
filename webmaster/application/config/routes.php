<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'dashboard';

$route['oauth/signin'] = 'auth/admin_login';


$route[''] = 'dashboard';
$route['users'] = 'users/usersList';
$route['users/(:num)'] = 'users/userDetails/$1';
$route['users/(:num)/kyc'] = 'users/kyc_view/$1';
$route['users/(:num)/login'] = 'users/login_as_user/$1';
$route['users/(:num)/delete'] = 'users/delete_user/$1';
$route['users/(:num)/confirm'] = 'users/confirm_account/$1';
$route['users/(:num)/block'] = 'users/block_user_account/$1';
$route['users/(:num)/unblock'] = 'users/unblock_user_account/$1';
$route['users/(:num)/referals'] = 'users/referals_list/$1';
$route['users/(:num)/update-wallet'] = 'users/update_wallet/$1';
$route['users/(:num)/referals/(:num)/delete'] = 'users/delete_referal/$1/$2';
$route['users/(:num)/btc/address/(:any)'] = 'users/edit_btc_address/$1/$2';
$route['users/(:num)/eth/address/(:any)'] = 'users/edit_eth_address/$1/$2';
$route['credit-cards'] = 'users/credit_cards';
$route['settings/change-password'] = 'settings/change_password';
$route['settings/website-settings'] = 'settings/web';
$route['settings/payments'] = 'settings/payment_settings';
$route["faq"] = 'settings/faq_index';
$route['faq/(:num)/questions'] = 'settings/faq_questions/$1';
$route['faq/(:num)/questions/add'] = 'settings/add_question/$1';
$route['faq/(:num)/questions/(:num)/delete'] = 'settings/delete_question/$1/$2';
$route["faq/create-topic"] = 'settings/create_topic';
$route["faq/(:num)/delete"] = "settings/delete_topic/$1";
$route["payments-requests"] = "users/payment_request";
$route["payments-requests/(:num)/delete"] = "users/delete_payment_request/$1";
$route["payments-proof"] = "users/payments_proof";
$route["payments-proof/(:num)/delete"] = "users/delete_payment_proof/$1";
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
