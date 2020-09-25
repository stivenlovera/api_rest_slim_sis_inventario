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
 * @api {get} /clientes GET CLIENTES
 * @apiGroup Clientes
 * @apiName GetClientes
 *
 * @apiSuccess {String} status Estado de respuesta 
 * @apiSuccess {Number} code  Codigo de servidor http
 * @apiSuccess {array} data Datos sacados de la tabla cliente
 *
 * @apiSuccess {String} data.id_cliente Identificador del cliente
 * @apiSuccess {String} data.ci Cedula de identidad
 * @apiSuccess {String} data.nombre Nombre del cliente
 * @apiSuccess {String} data.apellido Apellido de cliente
 * @apiSuccess {String} data.celular Celular de referencia
 * @apiSuccess {String} data.estado Estado actual del cliente
 *
 * @apiSuccessExample {json} Success-Response:
 *     HTTP/1.1 200 OK
 *    {
 *       "status": "success",
 *       "code": 200,
 *       "data": [
 *                   {
 *                      "id_cliente": "number",
                        "ci": "string",
                        "nombre": "string",
                        "apellido": "string",
                        "celular": "string",
                        "estado": "number"
 *                    }
 *               ]
 *    }
 */
// LISTAR TODOS LOS CLIENTE
$app->get('/clientes', function() use($app){
    $sql = 'SELECT * FROM cliente WHERE estado ="1" ORDER BY id_cliente DESC;';
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


/**
 * @api {get} /clientes/:CI GET ONE CLIENTES
 * @apiName GetClientesId
 * @apiGroup Clientes
 * @apiParam {Number} CI identificador unico del cliente CI
 * @apiSuccess {String} status Estado de respuesta 
 * @apiSuccess {Number} code  Codigo de servidor http
 * @apiSuccess {Object} data Dato sacados de la tabla cliente
 *
 * @apiSuccess {String} data.id_cliente Identificador del cliente
 * @apiSuccess {String} data.ci Cedula de identidad
 * @apiSuccess {String} data.nombre Nombre del cliente
 * @apiSuccess {String} data.apellido Apellido de cliente
 * @apiSuccess {String} data.celular Celular de referencia
 * @apiSuccess {String} data.estado Estado actual del cliente
 *
 * @apiSuccessExample {json} Success-Response:
 *     HTTP/1.1 200 OK
 *    {
 *       "status": "success",
 *       "code": 200,
 *       "data":{
 *              "id_cliente": "string",
                "ci": "string",
                "nombre": "string",
                "apellido": "string",
                "celular": "string",
                "estado": "number"
 *          }
 *    }
 */
// DEVOLVER UN SOLO CLIENTE
$app->get('/clientes/:ci', function($ci) use( $app){
    $sql = "SELECT * FROM cliente WHERE estado='1' AND ci = ".$ci;
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


/**
 * @api {post} /clientes POST CLIENTE
 * @apiName Postclientes
 * @apiGroup Clientes
 * @apiParam (Request body) {string} ci CI de cliente
 * @apiParam (Request body) {string} nombre Nombres de clientes
 * @apiParam (Request body) {string} apellido Apellido de clientes
 * @apiParam (Request body) {string} telefono Telefono de cliente
 * @apiExample {json} Request body:
 *   { 
 *      "ci": "string",
 *      "nombre": "string",
 *      "apellido": "string",
 *      "celular": "string"
 *   }
 * @apiSuccess {string} status Estado de respuesta 
 * @apiSuccess {Number} code  Codigo de servidor http
 * @apiSuccess {String} message Mensaje de exito
 *
 * @apiSuccessExample {json} Success-Response:
 *     HTTP/1.1 200 OK
 *    {
 *       "status": "success",
 *       "code": 200,
 *       "message": "Cliente creado correctamente"
 *    }
 */
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



/**
 * @api {put} /clientes/:CI PUT CLIENTE
 * @apiName Putclientes
 * @apiGroup Clientes
 * @apiParam {Number} CI identificador unico del cliente CI
 * @apiParam (Request body) {number} ci CI de cliente
 * @apiParam (Request body) {string} nombre Nombres de clientes
 * @apiParam (Request body) {string} apellido Apellido de clientes
 * @apiParam (Request body) {string} telefono Telefono de cliente
 * @apiExample {json} Request body:
 *   { 
 *      "ci": "string",
 *      "nombre": "string",
 *      "apellido": "string",
 *      "celular": "string"
 *   }
 * @apiSuccess {string} status Estado de respuesta 
 * @apiSuccess {Number} code  Codigo de servidor http
 * @apiSuccess {string} message Mensaje de exito
 *
 * @apiSuccessExample {json} Success-Response:
 *     HTTP/1.1 200 OK
 *    {
 *       "status": "success",
 *       "code": 200,
 *       "message": "El cliente se ha actualizado!!"
 *    }
 */
// ACTUALIZAR UN CLIENTE
$app->put('/clientes/:id', function($id) use($app){
    $json = $app->request->getBody('json');
    $data = json_decode($json, true);

    $sql = "UPDATE cliente SET ".
        "ci = '{$data["ci"]}', ".
        "nombre = '{$data["nombre"]}', ".
        "apellido = '{$data["apellido"]}', ".
        "celular = '{$data["celular"]}' ";

    $sql .=	" WHERE ci = {$id}";

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


/**
 * @api {delete} /clientes/:CI DELETE CLIENTE
 * @apiParam {Number} CI identificador unico del cliente CI.
 * @apiName Deleteclientes
 * @apiGroup Clientes
 * @apiSuccess {string} status Estado de respuesta 
 * @apiSuccess {Number} code  Codigo de servidor http
 * @apiSuccess {string} message Mensaje de exito
 *
 * @apiSuccessExample {json} Success-Response:
 *     HTTP/1.1 200 OK
 *    {
 *       "status": "success",
 *       "code": 200,
 *       "message": "El cliente no se ha eliminado!!"
 *    }
 */

// ELIMINAR UN CLIENTE
$app->delete('/clientes/:id', function($id) use( $app){
    $sql = "UPDATE cliente SET estado='0' WHERE ci = ".$id;
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