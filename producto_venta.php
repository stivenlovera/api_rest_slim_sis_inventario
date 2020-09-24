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

// LISTAR TODOS LOS PRODUCTO-VENTA
$app->get('/producto-ventas', function() use($app){
    $sql = 'SELECT * FROM producto_venta ORDER BY id_venta DESC;';
    $query = connect($sql);

    $producto_ventas = array();
    while ($producto_venta = $query->fetch_assoc()) {
        $producto_ventas[] = $producto_venta;
    }

    $result = array(
        'status' => 'success',
        'code'	 => 200,
        'data' => $producto_ventas
    );
    //$app->response()->setBody(json_encode($result,200));
    echo json_encode($result);
});

// DEVOLVER UN SOLO PRODUCTO-VENTA
$app->get('/producto-ventas/:id_venta', function($id_venta) use( $app){
    //$producto = $app->request()->params('producto');
    //echo $producto;
    $sql = 'SELECT * FROM producto_venta WHERE id_producto_venta = '.$id_venta.';';
    $query = connect($sql);
    
    $result = array(
        'status' 	=> 'error',
        'code'		=> 404,
        'message' 	=> 'producto-ventas no disponible'
    );

    if($query->num_rows == 1){
        $producto_venta = $query->fetch_assoc();

        $result = array(
            'status' 	=> 'success',
            'code'		=> 200,
            'data' 	=> $producto_venta
        );
    }

    echo json_encode($result);
});

// GUARDAR PRODUCTO-VENTA
$app->post('/producto-ventas', function() use($app){
    $result = array(
        'status' => 'error',
        'code'	 => 404,
        'message' => 'Producto-venta  NO se ha creado'
    );

    $token = $app->request->headers('ApiKey');

    if($token=='1234567'){

        $json = $app->request->getBody('json');
        $data = json_decode($json, true);

        if(!isset($data['id_venta'])){
            $data['id_venta']=null;
        }

        if(!isset($data['cantidad'])){
            $data['cantidad']=null;
        }

        if(!isset($data['precio_unitario'])){
            $data['precio_unitario']=null;
        }

        if(!isset($data['precio_total'])){
            $data['precio_total']=null;
        }

        if(!isset($data['id_producto'])){
            $data['id_producto']=null;
        }

        $query = "INSERT INTO producto_venta(
            id_venta,
            cantidad,
            precio_unitario,
            precio_total,
            id_producto
            ) VALUES(".
            "'{$data['id_venta']}',".
            "'{$data['cantidad']}',".
            "'{$data['precio_unitario']}',".
            "'{$data['precio_total']}',".
            "'{$data['id_producto']}'".
            ");";
            //echo $query;
        $insert = connect($query);

        if($insert){
            $result = array(
                'status' => 'success',
                'code'	 => 200,
                'message' => 'Producto-venta creado correctamente'
            );
        }
    }

    echo json_encode($result);

});

// ACTUALIZAR UN PRODUCTO-VENTA
$app->put('/producto-venta/:id_producto_venta', function($id_producto_venta) use($app){
    $json = $app->request->getBody('json');
    $data = json_decode($json, true);

    $sql = "UPDATE producto_venta SET ".
        "id_venta = '{$data["id_venta"]}', ".
        "cantidad = '{$data["cantidad"]}', ".
        "precio_unitario = '{$data["precio_unitario"]}', ".
        "precio_total = '{$data["precio_total"]}', ".
        "id_producto = '{$data["id_producto"]}' ";

    $sql .=	" WHERE id_producto_venta = {$id_producto_venta}";

    //echo $sql;
    $query = connect($sql);

    if($query){
        $result = array(
            'status' 	=> 'success',
            'code'		=> 200,
            'message' 	=> 'El producto-venta se ha actualizado correctamente!!'
        );
    }else{
        $result = array(
            'status' 	=> 'error',
            'code'		=> 404,
            'message' 	=> 'El producto-venta no se ha actualizado!!'
        );
    }

    echo json_encode($result);

});

// ELIMINAR UN PRODUCTO-VENTA
$app->delete('/producto-ventas/:id_producto_venta', function($id_producto_venta) use( $app){
    $sql = 'DELETE FROM producto_venta WHERE id_producto_venta = '.$id_producto_venta;
    $query = connect($sql);
    if($query){
        $result = array(
            'status' 	=> 'success',
            'code'		=> 200,
            'message' 	=> 'El producto-venta se ha eliminado correctamente!!'
        );
    }else{
        $result = array(
            'status' 	=> 'error',
            'code'		=> 404,
            'message' 	=> 'El producto-venta no se ha eliminado!!'
        );
    }

    echo json_encode($result);
});

$app->run();