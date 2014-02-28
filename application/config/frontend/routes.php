<?php
// Login users
$route['login']  = "frontend/auth/login";

// Logout from system
$route['logout'] = "frontend/auth/logout";

// Forgoten password
$route['forgot'] = "frontend/auth/forgot_password";

// Page Contacts
$route['contacts'] = "frontend/contacts";

$route['registration/method'] = "frontend/users/registration_method";

$route['registration/(user|victim|client)'] = "frontend/users/registration/$1";

$route['victim'] = "frontend/profile/victim/index";

$route['user'] = "frontend/user_profile";

$route['advertiser'] = "frontend/advertiser_profile";

$route['victim'] = "frontend/victim_profile";

// 404 Page
$route['404_override'] = '';