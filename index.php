<?php
header('Access-Control-Allow-Origin: *');

error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once 'php-rest-services/bin/wlRestService.php';
require_once 'php-rest-services/bin/wlRestAuth.php';
require_once 'php-rest-services/bin/triggers/wlRestTriggerAddTimestamp.php';
require_once 'php-rest-services/bin/triggers/wlRestTriggerAntiSpam.php';
require_once 'php-rest-services/bin/triggers/wlRestTriggerBanByIp.php';
require_once 'php-rest-services/bin/triggers/wlRestTriggerError.php';
require_once 'php-rest-services/bin/triggers/wlRestTriggerServiceKey.php';


// include 'dao/include_dao.php';

$service = new wlRestService();
//$service->loadSettings('/custom-rest-settings.ini');
$service->loadSettings(dirname(__FILE__) . '/custom-rest-settings.ini');

// load ORM Classes
require 'orm/vendor/autoload.php'; 
require_once 'orm/generated-conf/config.php';

//MAT 20180820, implementacion de seguridad
//use Firebase\JWT\JWT;
//require_once '../../php-jwt-master/src/JWT.php';

require 'controller/autoload.php'; 
require 'controller/Util.php'; 
// use \Propel\Runtime\Propel;

//    var_dump($service); 

//    $reflection_class = new ReflectionClass($service);
//    return $reflection_class->newInstanceArgs($params);
//    
//var_dump($service);
//require_once 'controller/dictacionRestControllerV1.php';
//require_once 'inscripcionRestControllerV1.php';
//require_once 'relatorRestControllerV1.php';
//require_once 'institucionRestControllerV1.php';
//require_once 'facilitadorRestControllerV1.php';
//require_once 'trabajadorRestControllerV1.php';
////require_once 'inscripcionRestControllerV1.php';
////require_once 'personaRestControllerV1.php';
//require_once 'especialidadRestControllerV1.php';
//require_once 'cargoRestControllerV1.php';

//    $var = "dictacionRestControllerV1";
//$service->registerController(new $var );
//$service->registerController(new inscripcionRestControllerV1());
//$service->registerController(new relatorRestControllerV1());
//$service->registerController(new institucionRestControllerV1());
//$service->registerController(new facilitadorRestControllerV1());
//$service->registerController(new trabajadorRestControllerV1());
////$service->registerController(new inscripcionRestControllerV1());
////$service->registerController(new personaRestControllerV1());
//$service->registerController(new especialidadRestControllerV1());
//$service->registerController(new cargoRestControllerV1());
//$service->registerController(new sampleHelloRestControllerV2());
//$service->registerOutputHandler(new csvSampleOutputHandler('csv'));
//register custom output handlers
//$service->registerOutputHandler(new sampleOutputHandler('custom'));
//sets the default output handler
$service->setDefaultOutputHandlerByExtension(wlRestUtils::RESPONSE_TYPE_JSON);
$service->registerTrigger(new wlRestTriggerServiceKey(), wlRestTrigger::ON_REQUEST_EVENT);

//$service->registerTrigger(new ipRejectSampleTrigger(), wlRestTrigger::ON_REQUEST_EVENT);
$service->setCacheDir(__DIR__ . '/cache', 10);
$service->setLogDir(__DIR__);
$service->run();

