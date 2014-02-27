<?php
// Login users
$route['login']  = "frontend/auth/login";

// Logout from system
$route['logout'] = "frontend/auth/logout";

// Forgoten password
$route['forgot'] = "frontend/auth/forgot_password";

// Page Contacts
$route['contacts'] = "frontend/contacts";

// Page Profile
$route['profile'] = "frontend/user_profile";

$route['registration/method'] = "frontend/users/registration_method";

// 404 Page
$route['404_override'] = '';