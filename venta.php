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

// LISTAR TODOS LOS VENTAS
$app->get('/ventas', function() use($app){
    $sql = "SELECT * FROM venta WHERE estado='1' ORDER BY id_cliente DESC;";
    $query = connect($sql);

    $ventas = array();
    while ($venta = $query->fetch_assoc()) {
        $ventas[] = $venta;
    }

    $result = array(
        'status' => 'success',
        'code'	 => 200,
        'data' => $ventas
    );

    echo json_encode($result);
});

// DEVOLVER UN SOLO VENTA
$app->get('/ventas/:id_venta', function($id_venta) use( $app){
    $sql = "SELECT * FROM venta WHERE  estado='1' AND id_venta = ".$id_venta;
    $query = connect($sql);

    $result = array(
        'status' 	=> 'error',
        'code'		=> 404,
        'message' 	=> 'venta no disponible'
    );

    if($query->num_rows == 1){
        $venta = $query->fetch_assoc();

        $result = array(
            'status' 	=> 'success',
            'code'		=> 200,
            'data' 	=> $venta
        );
    }

    echo json_encode($result);
});

// GUARDAR VENTAS
$app->post('/ventas', function() use($app){
    $result = array(
        'status' => 'error',
        'code'	 => 404,
        'message' => 'venta NO se ha creado'
    );

    $token = $app->request->headers('ApiKey');

    if($token=='1234567'){

        $json = $app->request->getBody('json');
        $data = json_decode($json, true);

        if(!isset($data['fecha'])){
            $data['fecha']=null;
        }

        if(!isset($data['id_cliente'])){
            $data['id_cliente']=null;
        }

        if(!isset($data['id_acceso_user'])){
            $data['id_acceso_user']=null;
        }

        $query = "INSERT INTO venta(fecha,id_cliente,id_acceso_user,estado) VALUES(".
            "'{$data['fecha']}',".
            "'{$data['id_cliente']}',".
            "'{$data['id_acceso_user']}',".
            "'1'".
            ");";
            //echo $query; 
        $insert = connect($query);
        
        if($insert){
            $result = array(
                'status' => 'success',
                'code'	 => 200,
                'message' => 'venta creado correctamente'
            );
        }
    }

    echo json_encode($result);

});

// ACTUALIZAR UN VENTA
$app->put('/ventas/:id_venta', function($id_venta) use($app){
    $json = $app->request->getBody('json');
    $data = json_decode($json, true);

    $sql = "UPDATE venta SET ".
        "fecha = '{$data["fecha"]}', ".
        "id_cliente = '{$data["id_cliente"]}', ".
        "id_acceso_user = '{$data["id_acceso_user"]}' ";

    $sql .=	" WHERE id_venta = {$id_venta}";

    //echo $sql;
    $query = connect($sql);

    if($query){
        $result = array(
            'status' 	=> 'success',
            'code'		=> 200,
            'message' 	=> 'El venta se ha actualizado correctamente!!'
        );
    }else{
        $result = array(
            'status' 	=> 'error',
            'code'		=> 404,
            'message' 	=> 'El venta no se ha actualizado!!'
        );
    }

    echo json_encode($result);

});

// ELIMINAR UN VENTA
$app->delete('/ventas/:id_venta', function($id_venta) use( $app){
    $sql = "UPDATE venta SET estado='0' WHERE id_venta = ".$id_venta;
    $query = connect($sql);

    if($query){
        $result = array(
            'status' 	=> 'success',
            'code'		=> 200,
            'message' 	=> 'El ventas se ha eliminado correctamente!!'
        );
    }else{
        $result = array(
            'status' 	=> 'error',
            'code'		=> 404,
            'message' 	=> 'El ventas no se ha eliminado!!'
        );
    }

    echo json_encode($result);
});

$app->run();