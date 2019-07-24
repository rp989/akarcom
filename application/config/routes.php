<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

$route['default_controller'] = 'Welcome';
$route['index'] ='welcome';
$route['index/(:num)'] ='welcome/index/$1';
//$route['search/(:num)'] ='welcome/newSearch/$1';
//$route['search'] ='welcome/newSearch';
$route['search'] = 'welcome/ajax_search';
$route['search/(:num)'] = 'welcome/ajax_search/$1';
$route['addPost'] = 'MemberArea/addProduct';
$route['Posts'] = 'MemberArea/Posts';
$route['PostsData'] = 'MemberArea/PostsData';
$route['PostsData/(:any)'] = 'MemberArea/PostsData/$1';
$route['LogOut'] = 'MemberArea/LogOut';
$route['SignIn'] = 'Welcome/Signin';
$route['AllPosts'] = 'Welcome/AllPosts';
$route['Activation'] = 'Welcome/Activation';
$route['CodeActivation'] = 'Welcome/CodeActivation';
$route['Forgot'] = 'Welcome/Forgot';
$route['Register'] = 'Welcome/Register';
$route['Details/(:any)'] = 'Welcome/productDetails/$1';
$route['posts/(:any)'] = 'Welcome/productDetails/$1';
$route['post/(:any)'] = 'Welcome/productDetails/$1';
$route['singleBlog'] = 'Welcome/singleBlog/$1';
$route['get-pin'] = 'Welcome/getPin';
$route['profile'] = 'Welcome/profile';
$route['profile/(:any)'] = 'Welcome/profile/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
