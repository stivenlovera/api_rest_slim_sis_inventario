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
 * @api {get} /recibos GET RECIBO
 * @apiGroup Recibo
 * @apiName Getrecibo
 *
 * @apiSuccess {string} status Estado de respuesta 
 * @apiSuccess {number} code  Codigo de servidor http
 * @apiSuccess {array} data Datos sacados de la tabla recibo
 *
 * @apiSuccess {string} data.nit Numero nit de la venta-cliente
 * @apiSuccess {string} data.codigo_control Codigo generado venta
 * @apiSuccess {string} data.id_venta Identificador unico de la venta
 *
 * @apiSuccessExample {json} Success-Response:
 *     HTTP/1.1 200 OK
 *    {
 *       "status": "success",
 *       "code": 200,
 *       "data":[
                    {
                        "nit": "string",
                        "codigo_control": "string",
                        "id_venta": "string"
                    }
                ]
      }
 */
// LISTAR TODOS LOS RECIBO
$app->get('/recibos', function() use($app){
    $sql = "SELECT * FROM recibo ORDER BY id_venta DESC;";
    $query = connect($sql);

    $recibos = array();
    while ($recibo = $query->fetch_assoc()) {
        $recibos[] = $recibo;
    }

    $result = array(
        'status' => 'success',
        'code'	 => 200,
        'data' => $recibos
    );

    echo json_encode($result);
});



/**
 * @api {get} /recibos/:ID_RECIBO GET ONE RECIBO 
 * @apiGroup Recibo
 * @apiName Getrecibo ID_RECIBO
 *
 * @apiParam {Number} ID_RECIBO identificador unico de la recibo
 *
 * @apiSuccess {string} status Estado de respuesta 
 * @apiSuccess {number} code  Codigo de servidor http
 * @apiSuccess {object} data Datos sacados de la tabla recibo
 *
 * @apiSuccess {string} data.nit Numero nit de la venta-cliente
 * @apiSuccess {string} data.codigo_control Codigo generado venta
 * @apiSuccess {string} data.id_venta Identificador unico de la venta
 *
 * @apiSuccessExample {json} Success-Response:
 *     HTTP/1.1 200 OK
 *    {
 *       "status": "success",
 *       "code": 200,
 *       "data":{
                "nit": "string",
                "codigo_control": "string",
                "id_venta": "string"
            }
      }
 */
// DEVOLVER UN SOLO RECIBO
$app->get('/recibos/:id_venta', function($id_venta) use( $app){
    $sql = "SELECT * FROM recibo AND id_venta = ".$id_venta;
    $query = connect($sql);

    $result = array(
        'status' 	=> 'error',
        'code'		=> 404,
        'message' 	=> 'recibo no disponible'
    );

    if($query->num_rows == 1){
        $recibo = $query->fetch_assoc();

        $result = array(
            'status' 	=> 'success',
            'code'		=> 200,
            'data' 	=> $recibo
        );
    }

    echo json_encode($result);
});



/**
 * @api {post} /recibos POST RECIBO  
 * @apiGroup Recibo
 * @apiName Postrecibo
 *
 * @apiParam (Request body) {string} Numero nit de la venta-cliente
 * @apiParam (Request body) {string} Codigo generado de la venta
 * @apiParam (Request body) {number} id_venta Identificador unico de la venta
 *
 * @apiExample {json} Request body:
    { 
        "nit": "string",
        "codigo_control": "string",
        "id_venta": number
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
 *       "message": "recibo creado correctamente"
 *    }
 */
// GUARDAR RECIBO
$app->post('/recibos', function() use($app){
    $result = array(
        'status' => 'error',
        'code'	 => 404,
        'message' => 'recibo NO se ha creado'
    );

    $token = $app->request->headers('ApiKey');

    if($token=='1234567'){

        $json = $app->request->getBody('json');
        $data = json_decode($json, true);

        if(!isset($data['nit'])){
            $data['nit']=null;
        }

        if(!isset($data['codigo_control'])){
            $data['codigo_control']=null;
        }

        if(!isset($data['id_venta'])){
            $data['id_venta']=null;
        }

        $query = "INSERT INTO recibo(
            nit,
            codigo_control,
            id_venta
            ) VALUES(".
            "'{$data['nit']}',".
            "'{$data['codigo_control']}',".
            "'{$data['id_venta']}'".
            ");";

        $insert = connect($query);
        
        if($insert){
            $result = array(
                'status' => 'success',
                'code'	 => 200,
                'message' => 'recibo creado correctamente'
            );
        }
    }

    echo json_encode($result);

});



/**
 * @api {put} /recibos/:ID_VENTA PUT RECIBO   
 * @apiGroup Recibo
 * @apiName Putrecibo
 *
 * @apiParam {Number} ID_RECIBO identificador unico de la recibo
 *
 * @apiParam (Request body) {string} Numero nit de la venta-cliente
 * @apiParam (Request body) {string} Codigo generado de la venta
 * @apiParam (Request body) {number} id_venta Identificador unico de la venta
 *
 * @apiExample {json} Request body:
    { 
        "nit": "string",
        "codigo_control": "string",
        "id_venta": number
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
 *       "message": "El recibo se ha actualizado correctamente!!"
 *    }
 */
// ACTUALIZAR UN RECIBO
$app->put('/recibos/:id_venta', function($id_venta) use($app){
    $json = $app->request->getBody('json');
    $data = json_decode($json, true);

    $sql = "UPDATE recibo SET ".
        "nit = '{$data["nit"]}', ".
        "codigo_control = '{$data["codigo_control"]}' ";

    $sql .=	" WHERE id_venta = {$id_venta}";

    echo $sql;
    $query = connect($sql);

    if($query){
        $result = array(
            'status' 	=> 'success',
            'code'		=> 200,
            'message' 	=> 'El recibo se ha actualizado correctamente!!'
        );
    }else{
        $result = array(
            'status' 	=> 'error',
            'code'		=> 404,
            'message' 	=> 'El recibo no se ha actualizado!!'
        );
    }

    echo json_encode($result);

});



/**
 * @api {delete} /recibos/:ID_RECIBO DELETE RECIBO   
 * @apiName Deleterecibo
 * @apiGroup Recibo
 *
 * @apiParam {Number} ID_RECIBO identificador unico de la recibo
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
 *       "message": "El recibo se ha eliminado correctamente!!"
 *    }
 */
// ELIMINAR UN RECIBO
$app->delete('/recibos/:id_venta', function($id_venta) use( $app){
    $sql = "DELETE FROM recibo WHERE id_venta = ".$id_venta;
    $query = connect($sql);

    if($query){
        $result = array(
            'status' 	=> 'success',
            'code'		=> 200,
            'message' 	=> 'El recibo se ha eliminado correctamente!!'
        );
    }else{
        $result = array(
            'status' 	=> 'error',
            'code'		=> 404,
            'message' 	=> 'El recibo no se ha eliminado!!'
        );
    }

    echo json_encode($result);
});

$app->run();