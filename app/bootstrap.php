<?php

require __DIR__ . '/../vendor/autoload.php';

$configurator = new Nette\Configurator;

//$configurator->setDebugMode('23.75.345.200'); // enable for your remote IP
$configurator->enableDebugger(__DIR__ . '/../log');

$configurator->setTempDirectory(__DIR__ . '/../temp');

// Enable RobotLoader - this will load all classes automatically
$robotLoader = $configurator->createRobotLoader()
	->addDirectory(__DIR__)
	->addDirectory(__DIR__ . '/../vendor/others')
	->register();

$configurator->addConfig(__DIR__ . '/config/config.neon');
if($_SERVER['REMOTE_ADDR']=="::1" || $_SERVER['REMOTE_ADDR']=="127.0.0.1"){ //jde o localhost?
    $configurator->addConfig(__DIR__ . '/config/config.local.neon');
}
else{
    $configurator->addConfig(__DIR__ . '/config/config.prod.neon');
}

//add robotLoader to DIC
$configurator->addServices(array('robotLoader' => $robotLoader));

//$configurator->addParameters(array(
//    'appDir' => __DIR__ . '/../app',
//));

$container = $configurator->createContainer();

return $container;
