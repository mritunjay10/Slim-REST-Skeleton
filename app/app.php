<?php

session_start();

date_default_timezone_set("Asia/kolkata");

require __DIR__ . '/../vendor/autoload.php';

$app = new \Slim\App([
	'settings' => [
		'displayErrorDetails' => true,
		'development' => [
			'driver' 	=> 'mysql',
			'host' 		=> '192.168.1.50',
			'database' 	=> '',
			'username' 	=> '',
			'password' 	=> '',
			'charset' 	=> 'utf8',
			'collation'	=> 'utf8_general_ci'
		],
        'production' => [
            'driver' 	=> 'mysql',
            'host' 		=> 'localhost',
            'database' 	=> 'fillip_tracking',
            'username' 	=> '',
            'password' 	=> '',
            'charset' 	=> 'utf8',
            'collation'	=> 'utf8_general_ci'
        ]
	],
]);

$container = $app->getContainer();

// setup illuminate (Model generator)
$capsule = new Illuminate\Database\Capsule\Manager;
$capsule->addConnection($container['settings']['development']);
$capsule->setAsGlobal();
$capsule->bootEloquent();

// Illuminate package
$container['db'] = function ($container) use ($capsule){
	return $capsule;
};

// Error Handler
/*$container['errorHandler'] = function ($container) {
    return new \App\Helper\ExceptionHandler();
};*/

$container['AuthController'] = function($container){
    return new \App\Controllers\AuthController($container);
};

$container['Validator'] = function (){

    return new \App\Helper\Validator();
};

$container['Auth'] = function (){

    return new \App\Helper\Password();
};

$container['Opr'] = function (){

    return new \App\Helper\Operations();
};

$container['Mail'] = function (){

    return new \App\Helper\INDIMail();
};

require __DIR__ . '/../app/routes.php';