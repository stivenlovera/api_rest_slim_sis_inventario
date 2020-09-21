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
$app->get('/stocks', function() use($app){
    $sql = 'SELECT * FROM stock ORDER BY id_producto DESC;';
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
$app->get('/stocks/:id', function($id) use( $app){
    $sql = 'SELECT * FROM stock WHERE id_producto = '.$id;
    $query = connect($sql);

    $result = array(
        'status' 	=> 'error',
        'code'		=> 404,
        'message' 	=> 'stock no disponible'
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
$app->post('/stocks', function() use($app){
    $result = array(
        'status' => 'error',
        'code'	 => 404,
        'message' => 'stock NO se ha creado'
    );

    //$token = $app->request->headers('ApiKey');

    //if($token=='1234567'){

        $json = $app->request->getBody('json');
        $data = json_decode($json, true);

        if(!isset($data['descripcion'])){
            $data['descripcion']=null;
        }
        if(!isset($data['cantidad'])){
            $data['cantidad']=null;
        }

        if(!isset($data['estado'])){
            $data['estado']=null;
        }

        $query = "INSERT INTO stock(descripcion,cantidad,estado) VALUES(".
            "'{$data['descripcion']}',".
            "'{$data['cantidad']}',".
            "'1'".
            ");";
            //echo $query;
        $insert = connect($query);

        if($insert){
            $result = array(
                'status' => 'success',
                'code'	 => 200,
                'message' => 'stock creado correctamente'
            );
        }
    //}

    echo json_encode($result);

});

// ACTUALIZAR UN PRODUCTO
$app->put('/stocks/:id', function($id) use($app){
    $json = $app->request->getBody('json');
    $data = json_decode($json, true);

    $sql = "UPDATE stock SET ".
        "descripcion = '{$data["descripcion"]}', ".
        "cantidad = '{$data["cantidad"]}', ".
        "estado = '{$data["estado"]}' ";

    /*if(isset($data['imagen'])){
        $sql .= "imagen = '{$data["imagen"]}', ";
    }*/

    $sql .=	" WHERE id_categoria = {$id}";

    echo $sql;
    $query = connect($sql);

    if($query){
        $result = array(
            'status' 	=> 'success',
            'code'		=> 200,
            'message' 	=> 'La Categoria se ha actualizado correctamente!!'
        );
    }else{
        $result = array(
            'status' 	=> 'error',
            'code'		=> 404,
            'message' 	=> 'La Categoria no se ha actualizado!!'
        );
    }

    echo json_encode($result);

});

// ELIMINAR UN PRODUCTO
$app->delete('/categorias/:id', function($id) use( $app){
    $sql = 'DELETE FROM categoria WHERE id_categoria = '.$id;
    $query = connect($sql);

    if($query){
        $result = array(
            'status' 	=> 'success',
            'code'		=> 200,
            'message' 	=> 'La categoria se ha eliminado correctamente!!'
        );
    }else{
        $result = array(
            'status' 	=> 'error',
            'code'		=> 404,
            'message' 	=> 'La categoria no se ha eliminado!!'
        );
    }

    echo json_encode($result);
});

$app->run();