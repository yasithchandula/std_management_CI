<?php

namespace Config;

use App\Controllers\StudentController;
use App\Controllers\userController;
use App\Controllers\CourseController;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->get('/', 'Home::index');

/**
 * Student Routes
 */
$routes->get('student','StudentController::index');
$routes->get('student_add','studentController::create');
$routes->post('student_store','studentController::store');
$routes->get('student/edit/(:num)','StudentController::edit/$1');
$routes->post('student/update/(:num)','studentController::update/$1');
$routes->get('student/delete/(:num)','studentController::delete/$1');

/**
 * User Routes
 */
$routes->get('userreg','userController::regView');
$routes->post('user_store','userController::saveUser');
$routes->get('user_login','userController::loginController');
$routes->get('user_index','userController::userIndex');
$routes->get('/','userController::loginController');
$routes->post('user_logger','LoginController::login');
$routes->get('user_logout','LoginController::logout');

/**
 * Course Routes
 */
$routes->get('course','CourseController::index');
$routes->get('course_add','CourseController::create');
$routes->post('course_store','CourseController::store');
$routes->get('course_edit/(:any)','CourseController::edit/$1');
$routes->post('course_update/(:any)','CourseController::update/$1');
$routes->get('course_delete/(:any)','CourseController::delete/$1');

/**
 * Search Routes
 */
$routes->post('std_search','studentController::stdsearch');
$routes->post('cr_search','CourseController::crsearch');



/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
