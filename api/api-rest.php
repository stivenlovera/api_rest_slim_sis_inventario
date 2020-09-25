/**
 * @api {get} /clientes GET CLIENTES
 * @apiGroup Clientes
 * @apiName GetClientes
 *
 * @apiSuccess {String} status Estado de respuesta 
 * @apiSuccess {Number} code  Codigo de servidor http
 * @apiSuccess {String} data Datos sacados de la tabla cliente
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
 
/**
 * @api {get} /clientes/:id_cliente GET CLIENTES ID
 * @apiName GetClientesId
 * @apiGroup Clientes
 *
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
 *              "id_cliente": "number",
                "ci": "string",
                "nombre": "string",
                "apellido": "string",
                "celular": "string",
                "estado": "number"
 *          }
 *    }
 */

/**
 * @api {post} /clientes POST CLIENTE
 * @apiName Postclientes
 * @apiGroup Clientes
 *
 * @apiParam Request-body { 
     "ci": "string",
     "nombre": "string",
     "apellido": "string",
     "celular": "string"
     }
 *
 * @apiSuccess {String} status Estado de respuesta 
 * @apiSuccess {Number} code  Codigo de servidor http
 * @apiSuccess {Object} data Mensaje de exito
 *
 * @apiSuccessExample {json} Success-Response:
 *     HTTP/1.1 200 OK
 *    {
 *       "status": "success",
 *       "code": 200,
 *       "message": "Cliente creado correctamente"
 *    }
 */
 
/**
 * @api {put} /clientes/:ci PUT CLIENTE
 * @apiName Putclientes
 * @apiGroup Clientes
 *
 * @apiParam Request-body { 
     "ci": "string",
     "nombre": "string",
     "apellido": "string",
     "celular": "string"
     }
 *
 * @apiSuccess {String} status Estado de respuesta 
 * @apiSuccess {Number} code  Codigo de servidor http
 * @apiSuccess {Object} data Mensaje de exito
 *
 * @apiSuccessExample {json} Success-Response:
 *     HTTP/1.1 200 OK
 *    {
 *       "status": "success",
 *       "code": 200,
 *       "message": "El cliente se ha actualizado!!"
 *    }
 */

 /**
 * @api {delete} /clientes/:CI DELETE CLIENTE
 * @apiParam {Number} CI identificador unico del cliente CI.
 * @apiName Deleteclientes
 * @apiGroup Clientes
 *
 * @apiParam Request-body { 
     "ci": "string",
     "nombre": "string",
     "apellido": "string",
     "celular": "string"
     }
 *
 * @apiSuccess {String} status Estado de respuesta 
 * @apiSuccess {Number} code  Codigo de servidor http
 * @apiSuccess {Object} data Mensaje de exito
 *
 * @apiSuccessExample {json} Success-Response:
 *     HTTP/1.1 200 OK
 *    {
 *       "status": "success",
 *       "code": 200,
 *       "message": "El cliente no se ha eliminado!!"
 *    }
 */

 /**
 * @api {get} /productos/:id GET PRODUCTOS ID
 * @apiName GetProductosID
 * @apiGroup Productos
 *
 * @apiParam {Number} id Identificador unico de producto.
 *
 * @apiSuccess {String} status Estado de respuesta 
 * @apiSuccess {Number} code  Codigo de servidor http
 * @apiSuccess {Object} data Dato sacado de la tabla productos
 *
 * @apiSuccess {String} data.id Identificador de producto
 * @apiSuccess {String} data.nombre Nombre del producto
 * @apiSuccess {Float} data.description Descripcion del producto
 * @apiSuccess {String} data.precio Precio del producto
 * @apiSuccess {String} data.imagen Nombre de la imagen del producto
 *
 * @apiSuccessExample {json} Success-Response:
 *     HTTP/1.1 200 OK
 *    {
 *       "status": "success",
 *       "code": 200,
 *       "data": {
 *                   "id": "1",
 *                   "nombre": "Manzanas",
 *                   "description": "jodas",
 *                   "precio": "80",
 *                   "imagen": "pina.png"
 *               }
 *    }
 */
 
 /**
 * @api {post} /productos/ POST Persona
 * @apiName PostProductos
 * @apiGroup Productos
 *
 * @apiParam jsonConsumo { "nombre": "Peras",   "description": "frutas",   "precio": "60", *   "imagen": null }
 *
 * @apiSuccess {String} status Estado de respuesta 
 * @apiSuccess {Number} code  Codigo de servidor http
 * @apiSuccess {Object} data Mensaje de exito
 *
 * @apiSuccessExample {json} Success-Response:
 *     HTTP/1.1 200 OK
 *    {
 *       "status": "success",
 *       "code": 200,
 *       "message": "Producto creado correctamente"
 *    }
 */

/**
 * @api {post} /persona/ Get Persona
 * @apiName PostProductos
 * @apiGroup Productos
 *
 * @apiParam jsonConsumo { "nombre": "Peras",   "description": "frutas",   "precio": "60", *   "imagen": null }
 *
 * @apiSuccess {String} status Estado de respuesta 
 * @apiSuccess {Number} code  Codigo de servidor http
 * @apiSuccess {Object} data Mensaje de exito
 *
 * @apiSuccessExample {json} Success-Response:
 *     HTTP/1.1 200 OK
 *    {
 *       "status": "success",
 *       "code": 200,
 *       "message": "Producto creado correctamente"
 *    }
 */