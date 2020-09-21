<?php
require_once 'connect.php';
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

/*$loginToken = function (){
    $app = \Slim\Slim::getInstance();
    $token = $app->request->headers('ApiKey');
    if($token=='1234567'){

    }else{
        throw new Exception("Usuario no valido");
    }
}*/

// LISTAR TODOS LOS CLIENTE
$app->get('/clientes', function() use($app){
    $sql = 'SELECT * FROM cliente ORDER BY id_cliente DESC;';
    $query = connect($sql);

    $clientes = array();
    while ($cliente = $query->fetch_assoc()) {
        $clientes[] = $cliente;
    }

    $result = array(
        'status' => 'success',
        'code'	 => 200,
        'data' => $clientes
    );

    echo json_encode($result);
});

// DEVOLVER UN SOLO CLIENTE
$app->get('/clientes/:id', function($id) use( $app){
    $sql = 'SELECT * FROM cliente WHERE ci = '.$id;
    $query = connect($sql);

    $result = array(
        'status' 	=> 'error',
        'code'		=> 404,
        'message' 	=> 'Cliente no disponible'
    );

    if($query->num_rows == 1){
        $cliente = $query->fetch_assoc();

        $result = array(
            'status' 	=> 'success',
            'code'		=> 200,
            'data' 	=> $cliente
        );
    }

    echo json_encode($result);
});

// GUARDAR CLIENTE
$app->post('/clientes', function() use($app){
    $result = array(
        'status' => 'error',
        'code'	 => 404,
        'message' => 'cliente NO se ha creado'
    );

    $token = $app->request->headers('ApiKey');

    if($token=='1234567'){

        $json = $app->request->getBody('json');
        $data = json_decode($json, true);

        if(!isset($data['ci'])){
            $data['ci']=null;
        }

        if(!isset($data['nombre'])){
            $data['nombre']=null;
        }

        if(!isset($data['apellido'])){
            $data['apellido']=null;
        }

        if(!isset($data['celular'])){
            $data['celular']=null;
        }

        $query = "INSERT INTO cliente(ci,nombre,apellido,celular,estado) VALUES(".
            "'{$data['ci']}',".
            "'{$data['nombre']}',".
            "'{$data['apellido']}',".
            "'{$data['celular']}',".
            "'1'".
            ");";
            //echo $query;
        $insert = connect($query);

        if($insert){
            $result = array(
                'status' => 'success',
                'code'	 => 200,
                'message' => 'Cliente creado correctamente'
            );
        }
    }

    echo json_encode($result);

});

// ACTUALIZAR UN PRODUCTO
$app->put('/clientes/:id', function($id) use($app){
    $json = $app->request->getBody('json');
    $data = json_decode($json, true);

    $sql = "UPDATE cliente SET ".
        "ci = '{$data["ci"]}', ".
        "nombre = '{$data["nombre"]}', ".
        "apellido = '{$data["apellido"]}', ".
        "celular = '{$data["celular"]}' ";

    /*if(isset($data['imagen'])){
        $sql .= "imagen = '{$data["imagen"]}', ";
    }*/

    $sql .=	" WHERE id_cliente = {$id}";

    echo $sql;
    $query = connect($sql);

    if($query){
        $result = array(
            'status' 	=> 'success',
            'code'		=> 200,
            'message' 	=> 'El cliente se ha actualizado correctamente!!'
        );
    }else{
        $result = array(
            'status' 	=> 'error',
            'code'		=> 404,
            'message' 	=> 'El cliente no se ha actualizado!!'
        );
    }

    echo json_encode($result);

});

// ELIMINAR UN PRODUCTO
$app->delete('/clientes/:id', function($id) use( $app){
    $sql = 'DELETE FROM cliente WHERE id_cliente = '.$id;
    $query = connect($sql);

    if($query){
        $result = array(
            'status' 	=> 'success',
            'code'		=> 200,
            'message' 	=> 'El cliente se ha eliminado correctamente!!'
        );
    }else{
        $result = array(
            'status' 	=> 'error',
            'code'		=> 404,
            'message' 	=> 'El cliente no se ha eliminado!!'
        );
    }

    echo json_encode($result);
});

$app->run();