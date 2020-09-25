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



/**
 * @api {get} /ventas GET VENTA
 * @apiGroup Ventas
 * @apiName Getventas
 *
 * @apiSuccess {string} status Estado de respuesta 
 * @apiSuccess {number} code  Codigo de servidor http
 * @apiSuccess {array} data Datos sacados de la tabla venta
 *
 * @apiSuccess {string} data.id_venta Identificador de la venta
 * @apiSuccess {string} data.fecha Fecha de registro de la venta
 * @apiSuccess {string} data.estado Estado de la venta
 * @apiSuccess {string} data.id_cliente Identificador unico del cliente
 * @apiSuccess {string} data.id_acceso_user Identificador unico del usuario
 *
 * @apiSuccessExample {json} Success-Response:
 *     HTTP/1.1 200 OK
 *    {
 *       "status": "success",
 *       "code": 200,
 *       "data":[
                    {
                        "id_venta": "string",
                        "fecha": "string",
                        "estado": "string",
                        "id_cliente": "string",
                        "id_acceso_user": "string"
                    }
                ]
      }
 */
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



/**
 * @api {get} /producto-ventas/:ID_VENTA GET ONE VENTA 
 * @apiGroup Ventas
 * @apiName Getventas ID_VENTA
 *
 * @apiParam {Number} ID_VENTA identificador unico de la venta
 *
 * @apiSuccess {string} status Estado de respuesta 
 * @apiSuccess {number} code  Codigo de servidor http
 * @apiSuccess {object} data Datos sacados de la tabla venta
 *
 * @apiSuccess {string} data.id_venta Identificador de la venta
 * @apiSuccess {string} data.fecha Fecha de registro de la venta
 * @apiSuccess {string} data.estado Estado de la venta
 * @apiSuccess {string} data.id_cliente Identificador unico del cliente
 * @apiSuccess {string} data.id_acceso_user Identificador unico del usuario
 *
 * @apiSuccessExample {json} Success-Response:
 *     HTTP/1.1 200 OK
 *    {
 *       "status": "success",
 *       "code": 200,
 *       "data":{
                "id_venta": "string",
                "fecha": "string",
                "estado": "string",
                "id_cliente": "string",
                "id_acceso_user": "string"
            }
 *    }
 */
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



/**
 * @api {post} /ventas POST VENTA 
 * @apiGroup Ventas
 * @apiName Postventas
 *
 * @apiParam (Request body) {number} fecha Fecha de registro
 * @apiParam (Request body) {string} id_cliente Identificador unico del cliente
 * @apiParam (Request body) {string} id_acceso_user Identificador unico del usuario
 *
 * @apiExample {json} Request body:
    { 
        "fecha": "string",
        "id_cliente": number,
        "id_acceso_user": number
    }
 * @apiSuccess {string} status Estado de respuesta 
 * @apiSuccess {Number} code  Codigo de servidor http
 * @apiSuccess {String} message Mensaje de exito
 *
 * @apiSuccessExample {json} Success-Response:
 *     HTTP/1.1 200 OK
 *    {
 *       "status": "success",
 *       "code": 200,
 *       "message": "venta creado correctamente"
 *    }
 */
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



/**
 * @api {put} /producto-ventas/:ID_VENTA PUT VENTA 
 * @apiGroup Ventas
 * @apiName Putventas
 *
 * @apiParam {Number} ID_VENTA identificador unico de la venta
 *
 * @apiParam (Request body) {number} fecha Fecha de registro
 * @apiParam (Request body) {string} id_cliente Identificador unico del cliente
 * @apiParam (Request body) {string} id_acceso_user Identificador unico del usuario
 *
 * @apiExample {json} Request body:
    { 
        "fecha": "string",
        "id_cliente": number,
        "id_acceso_user": number
    }
 * @apiSuccess {string} status Estado de respuesta 
 * @apiSuccess {Number} code  Codigo de servidor http
 * @apiSuccess {string} message Mensaje de exito
 *
 * @apiSuccessExample {json} Success-Response:
 *     HTTP/1.1 200 OK
 *    {
 *       "status": "success",
 *       "code": 200,
 *       "message": "El venta se ha actualizado correctamente!!"
 *    }
 */
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



/**
 * @api {delete} /producto-ventas/:ID_VENTA DELETE VENTA 
 * @apiName Deleteventas
 * @apiGroup Ventas
 *
 * @apiParam {Number} ID_VENTA identificador unico de la venta
 *  
 * @apiSuccess {string} status Estado de respuesta 
 * @apiSuccess {Number} code  Codigo de servidor http
 * @apiSuccess {string} message Mensaje de exito
 *
 * @apiSuccessExample {json} Success-Response:
 *     HTTP/1.1 200 OK
 *    {
 *       "status": "success",
 *       "code": 200,
 *       "message": "El ventas se ha eliminado correctamente!!"
 *    }
 */
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