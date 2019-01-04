<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['berita/detail_berita/(:any)'] = 'berita/detail_berita/$1';
$route['default_controller'] = 'home';
$route['404_override'] = 'error/error_404';
$route['translate_uri_dashes'] = FALSE;
