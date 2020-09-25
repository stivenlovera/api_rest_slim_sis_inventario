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