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
$app->get('/categorias', function() use($app){
    $sql = 'SELECT * FROM categoria ORDER BY id_categoria DESC;';
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
$app->get('/categorias/:id', function($id) use( $app){
    $sql = 'SELECT * FROM categoria WHERE id_categoria = '.$id;
    $query = connect($sql);

    $result = array(
        'status' 	=> 'error',
        'code'		=> 404,
        'message' 	=> 'Categoria no disponible'
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
$app->post('/categorias', function() use($app){
    $result = array(
        'status' => 'error',
        'code'	 => 404,
        'message' => 'categoria NO se ha creado'
    );

    //$token = $app->request->headers('ApiKey');

    //if($token=='1234567'){

        $json = $app->request->getBody('json');
        $data = json_decode($json, true);

        if(!isset($data['descripcion'])){
            $data['descripcion']=null;
        }

        if(!isset($data['estado'])){
            $data['estado']=null;
        }

        $query = "INSERT INTO categoria(descripcion,estado) VALUES(".
            "'{$data['descripcion']}',".
            "'1'".
            ");";
            //echo $query;
        $insert = connect($query);

        if($insert){
            $result = array(
                'status' => 'success',
                'code'	 => 200,
                'message' => 'categoria creada correctamente'
            );
        }
    //}

    echo json_encode($result);

});

// ACTUALIZAR UN PRODUCTO
$app->put('/categorias/:id', function($id) use($app){
    $json = $app->request->getBody('json');
    $data = json_decode($json, true);

    $sql = "UPDATE categoria SET ".
        "descripcion = '{$data["descripcion"]}', ".
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