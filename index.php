
<?php

require_once 'vendor/autoload.php';

$app = new \Slim\Slim();

// Configuración de cabeceras
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
header("Content-Type: application/json");

$method = $_SERVER['REQUEST_METHOD'];
if($method == "OPTIONS") {
    die();
}

$app->get("/pruebas", function() use($app){
    echo "Hola mundo desde Slim PHP";
});

$app->get("/probando", function() use($app){
    echo "OTRO TEXTO CUALQUIERA";
});
$app->get("/modelado", function() use($app){
    echo "mi metodo";
});

function Connect($consulta){
    $db = new mysqli('localhost', 'root', '', 'backendapi');
    $query = $db->query($consulta);
    return $query;
}


$app->run();