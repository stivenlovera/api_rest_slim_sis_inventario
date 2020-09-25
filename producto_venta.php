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
 * @api {get} /producto-ventas GET PRODUCTO-VENTA
 * @apiGroup Producto-ventas
 * @apiName Getproducto-ventas
 *
 * @apiSuccess {string} status Estado de respuesta 
 * @apiSuccess {number} code  Codigo de servidor http
 * @apiSuccess {array} data Datos sacados de la tabla producto-ventas
 *
 * @apiSuccess {string} data.id_producto_venta Identificador unico
 * @apiSuccess {string} data.cantidad Cantidad del producto
 * @apiSuccess {string} data.id_venta Identificador unico de una venta
 * @apiSuccess {string} data.precio_unitario Precio unitario de producto
 * @apiSuccess {string} data.precio_total Precio total de producto
 * @apiSuccess {string} data.id_producto Identificador unico de un producto
 *
 * @apiSuccessExample {json} Success-Response:
 *     HTTP/1.1 200 OK
 *    {
 *       "status": "success",
 *       "code": 200,
 *       "data":[
                    {
                       "id_producto_venta": "string",
                        "cantidad": "string",
                        "id_venta": "string",
                        "precio_unitario": "string",
                        "precio_total": "string",
                        "id_producto": "string"
                    }
                ]
      }
 */
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


/**
 * @api {get} /producto-ventas/:ID_PRODUCTO_VENTA GET ONE PRODUCTO-VENTA 
 * @apiGroup Producto-ventas
 * @apiName Getproducto-ventasID_PRODUCTO_VENTA
 *
 * @apiParam {Number} ID_PRODUCTO_VENTA identificador unico de la informacion
 *
 * @apiSuccess {string} status Estado de respuesta 
 * @apiSuccess {number} code  Codigo de servidor http
 * @apiSuccess {object} data Datos sacados de la tabla producto-venta
 *
 * @apiSuccess {string} data.id_producto_venta Identificador unico
 * @apiSuccess {string} data.cantidad Cantidad del producto
 * @apiSuccess {string} data.id_venta Identificador unico de una venta
 * @apiSuccess {string} data.precio_unitario Precio unitario de producto
 * @apiSuccess {string} data.precio_total Precio total de producto
 * @apiSuccess {string} data.id_producto Identificador unico de un producto
 *
 * @apiSuccessExample {json} Success-Response:
 *     HTTP/1.1 200 OK
 *    {
 *       "status": "success",
 *       "code": 200,
 *       "data":{
                "id_producto_venta": "string",
                "cantidad": "string",
                "id_venta": "string",
                "precio_unitario": "string",
                "precio_total": "string",
                "id_producto": "string"
 *          }
 *    }
 */
// DEVOLVER UN SOLO PRODUCTO-VENTA
$app->get('/producto-ventas/:id_producto_venta', function($id_producto_venta) use( $app){
    //$producto = $app->request()->params('producto');
    //echo $producto;
    $sql = 'SELECT * FROM producto_venta WHERE id_producto_venta = '.$id_producto_venta.';';
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


/**
 * @api {post} /producto-ventas POST PRODUCTO-VENTA 
  * @apiName Postproducto-ventas
 * @apiGroup Producto-ventas
 *
 * @apiParam (Request body) {number} cantidad Cantidad del producto
 * @apiParam (Request body) {string} precio_unitario  Precio unitario de producto
 * @apiParam (Request body) {string} precio_total Precio total de producto
 * @apiParam (Request body) {number} id_venta Telefono de cliente
 * @apiParam (Request body) {number} id_producto Identificador unico de un producto
 * @apiExample {json} Request body:
    { 
        "cantidad":number,
        "precio_unitario": "string",
        "precio_total": "string",
        "id_venta": number,
        "id_producto": number
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
 *       "message": "Producto-venta creado correctamente"
 *    }
 */
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



/**
 * @api {put} /producto-ventas/:ID_PRODUCTO_VENTA PUT PRODUCTO-VENTA 
 * @apiName Putproducto-ventas
 * @apiGroup Producto-ventas
 *
 * @apiParam {Number} ID_PRODUCTO_VENTA identificador unico de la informacion
 *
 * @apiParam (Request body) {number} cantidad Cantidad del producto
 * @apiParam (Request body) {string} precio_unitario  Precio unitario de producto
 * @apiParam (Request body) {string} precio_total Precio total de producto
 * @apiParam (Request body) {number} id_venta Telefono de cliente
 * @apiParam (Request body) {number} id_producto Identificador unico de un producto
 * @apiExample {json} Request body:
    { 
        "cantidad":number,
        "precio_unitario": "string",
        "precio_total": "string",
        "id_venta": number,
        "id_producto": number
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
 *       "message": "El producto-venta se ha actualizado correctamente!!"
 *    }
 */
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



 /**
 * @api {delete} /producto-ventas/:ID_PRODUCTO_VENTA DELETE PRODUCTO-VENTA 
 * @apiName Deleteproducto-ventas
 * @apiGroup Producto-ventas
 *
 * @apiParam {Number} ID_PRODUCTO_VENTA identificador unico de la informacion
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
 *       "message": "El producto-venta no se ha eliminado!!"
 *    }
 */
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