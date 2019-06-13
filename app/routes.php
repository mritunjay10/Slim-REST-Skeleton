<?php


$app->any('/', function ($request, $response, $args) {

});

$app->group('/v1/login', function (){

    $this->post('/employee', 'AuthController:employeeLogin');

});

