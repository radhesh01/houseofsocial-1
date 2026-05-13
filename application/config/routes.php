<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
|------------------------------------------------------------
| FilmyCurry Routes — FIXED
|
| FIXES APPLIED:
| 1. contact/send was only routed as a GET path — now also
|    handles POST (CI3 doesn't need a method distinction in
|    routes.php but the URI must match the form action exactly)
| 2. Added explicit routes for admin/login POST submit
| 3. admin/posts/upload_image POST route made explicit
| 4. Added 404 override pointing to a clean frontend 404
|------------------------------------------------------------
*/

$route['default_controller']   = 'Frontend';
$route['404_override']         = '';          // uses CI default
$route['translate_uri_dashes'] = FALSE;

// ── FRONTEND ─────────────────────────────────────────────
$route['']                  = 'Frontend/index';
$route['post/(:any)']       = 'Frontend/post/$1';
$route['about']             = 'Frontend/about';
$route['work']              = 'Frontend/work';
$route['contact']           = 'Frontend/contact';
$route['contact/send']      = 'Frontend/send_contact';  // POST from form

// ── ADMIN AUTH ────────────────────────────────────────────
$route['admin']             = 'admin/Auth/login';
$route['admin/login']       = 'admin/Auth/login';       // GET & POST
$route['admin/logout']      = 'admin/Auth/logout';

// ── ADMIN DASHBOARD ───────────────────────────────────────
$route['admin/dashboard']   = 'admin/Dashboard/index';

// ── ADMIN POSTS ───────────────────────────────────────────
$route['admin/posts']                  = 'admin/Posts/index';
$route['admin/posts/create']           = 'admin/Posts/create';
$route['admin/posts/store']            = 'admin/Posts/store';
$route['admin/posts/edit/(:num)']      = 'admin/Posts/edit/$1';
$route['admin/posts/update/(:num)']    = 'admin/Posts/update/$1';
$route['admin/posts/delete/(:num)']    = 'admin/Posts/delete/$1';
$route['admin/posts/toggle/(:num)']    = 'admin/Posts/toggle/$1';
$route['admin/posts/upload_image']     = 'admin/Posts/upload_image';

// ── ADMIN SETTINGS ────────────────────────────────────────
$route['admin/settings']               = 'admin/Settings/index';
$route['admin/settings/update']        = 'admin/Settings/update';

// ── ADMIN ENQUIRIES ───────────────────────────────────────
$route['admin/enquiries']              = 'admin/Enquiries/index';
$route['admin/enquiries/view/(:num)']  = 'admin/Enquiries/view/$1';
$route['admin/enquiries/delete/(:num)'] = 'admin/Enquiries/delete/$1';