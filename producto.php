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

// LISTAR TODOS LOS PRODUCTOS
$app->get('/productos', function() use($app){
    $sql = 'SELECT * FROM producto ORDER BY id_producto DESC;';
    $query = connect($sql);

    $productos = array();
    while ($producto = $query->fetch_assoc()) {
        $productos[] = $producto;
    }

    $result = array(
        'status' => 'success',
        'code'	 => 200,
        'data' => $productos
    );

    echo json_encode($result);
});

// DEVOLVER UN SOLO PRODUCTO
$app->get('/productos/:id', function($id) use($app){
    $sql = 'SELECT * FROM producto WHERE id_producto = '.$id;
    $query = connect($sql);

    $result = array(
        'status' 	=> 'error',
        'code'		=> 404,
        'message' 	=> 'Producto no disponible'
    );

    if($query->num_rows == 1){
        $producto = $query->fetch_assoc();

        $result = array(
            'status' 	=> 'success',
            'code'		=> 200,
            'data' 	=> $producto
        );
    }

    echo json_encode($result);
});

// GUARDAR PRODUCTOS
$app->post('/productos', function() use($app){
    $result = array(
        'status' => 'error',
        'code'	 => 404,
        'message' => 'producto NO se ha creado'
    );

    $token = $app->request->headers('ApiKey');

    if($token=='1234567'){

        $json = $app->request->getBody('json');
        $data = json_decode($json, true);

        if(!isset($data['nombre'])){
            $data['nombre']=null;
        }

        if(!isset($data['descripcion'])){
            $data['descripcion']=null;
        }
        
        if(!isset($data['id_categoria'])){
            $data['id_categoria']=null;
        }

        $query = "INSERT INTO producto(nombre,descripcion,estado,id_categoria) VALUES(".
        "'{$data['nombre']}',".
        "'{$data['descripcion']}',".
        "'1',".
        "'{$data['id_categoria']}'".
        ");";
            //echo $query; 
        $insert = connect($query);
        
        if($insert){
            $result = array(
                'status' => 'success',
                'code'	 => 200,
                'message' => 'producto creado correctamente'
            );
        }
    }

    echo json_encode($result);

});

// ACTUALIZAR UN PRODUCTO
$app->put('/productos/:id_producto', function($id_producto) use($app){
    $json = $app->request->getBody('json');
    $data = json_decode($json, true);

    $sql = "UPDATE producto SET ".
        "nombre = '{$data["nombre"]}', ".
        "descripcion = '{$data["descripcion"]}', ".
        "id_categoria = '{$data["id_categoria"]}' ";

    $sql .=	" WHERE id_producto = {$id_producto}";

    echo $sql;
    $query = connect($sql);

    if($query){
        $result = array(
            'status' 	=> 'success',
            'code'		=> 200,
            'message' 	=> 'El producto se ha actualizado correctamente!!'
        );
    }else{
        $result = array(
            'status' 	=> 'error',
            'code'		=> 404,
            'message' 	=> 'El producto no se ha actualizado!!'
        );
    }

    echo json_encode($result);

});

// ELIMINAR UN PRODUCTO
$app->delete('/productos/:id_producto', function($id_producto) use( $app){
    $sql = "UPDATE producto SET estado='0' WHERE id_producto = ".$id_producto;
    $query = connect($sql);

    if($query){
        $result = array(
            'status' 	=> 'success',
            'code'		=> 200,
            'message' 	=> 'El producto se ha eliminado correctamente!!'
        );
    }else{
        $result = array(
            'status' 	=> 'error',
            'code'		=> 404,
            'message' 	=> 'El producto no se ha eliminado!!'
        );
    }

    echo json_encode($result);
});

$app->run();