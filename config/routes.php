<?php
use Cake\Routing\Router;

Router::plugin('CakeEmailSender', function ($routes) {
    $routes->fallbacks('InflectedRoute');
});
