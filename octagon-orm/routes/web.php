<?php

 /*
 |--------------------------------------------------------------------------
 | Файл маршрутизации
 |--------------------------------------------------------------------------
 */

namespace SDFramework\Routes;
$route->before('GET', '/.*', function() {
  //
 });
$route->get('/', function() {
  echo \SDFramework\Controllers\DefaultController::welcome();
});

$route->get('/api/from:(\w+)', function($table) {
  echo \SDFramework\Controllers\DefaultController::rq($table);
});

$route->get('/api/rqusers', function() {
  echo \SDFramework\Controllers\DefaultController::rqusers();
});

$route->post('/api/registration', function() {
  echo \SDFramework\Controllers\DefaultController::registration();
});

$route->post('/api/service', function() {
  echo \SDFramework\Controllers\DefaultController::service();
});

$route->post('/api/update', function() {
  echo \SDFramework\Controllers\DefaultController::update();
});

$route->post('/api/delete', function() {
  echo \SDFramework\Controllers\DefaultController::delete();
});

$route->get('/api/root:(\w+)', function($root) {
  echo \SDFramework\Controllers\DefaultController::getUserByRoot($root);
});
?>