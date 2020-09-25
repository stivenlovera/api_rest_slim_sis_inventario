define({ "api": [
  {
    "type": "delete",
    "url": "/clientes/:CI",
    "title": "DELETE CLIENTE",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "CI",
            "description": "<p>identificador unico del cliente CI.</p>"
          }
        ]
      }
    },
    "name": "Deleteclientes",
    "group": "Clientes",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "status",
            "description": "<p>Estado de respuesta</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "code",
            "description": "<p>Codigo de servidor http</p>"
          },
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "message",
            "description": "<p>Mensaje de exito</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": " HTTP/1.1 200 OK\n{\n   \"status\": \"success\",\n   \"code\": 200,\n   \"message\": \"El cliente no se ha eliminado!!\"\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "api/api-rest.php",
    "groupTitle": "Clientes"
  },
  {
    "type": "get",
    "url": "/clientes",
    "title": "GET CLIENTES",
    "group": "Clientes",
    "name": "GetClientes",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>Estado de respuesta</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "code",
            "description": "<p>Codigo de servidor http</p>"
          },
          {
            "group": "Success 200",
            "type": "array",
            "optional": false,
            "field": "data",
            "description": "<p>Datos sacados de la tabla cliente</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.id_cliente",
            "description": "<p>Identificador del cliente</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.ci",
            "description": "<p>Cedula de identidad</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.nombre",
            "description": "<p>Nombre del cliente</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.apellido",
            "description": "<p>Apellido de cliente</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.celular",
            "description": "<p>Celular de referencia</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.estado",
            "description": "<p>Estado actual del cliente</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": " HTTP/1.1 200 OK\n{\n   \"status\": \"success\",\n   \"code\": 200,\n   \"data\": [\n               {\n                  \"id_cliente\": \"number\",\n                     \"ci\": \"string\",\n                     \"nombre\": \"string\",\n                     \"apellido\": \"string\",\n                     \"celular\": \"string\",\n                     \"estado\": \"number\"\n                }\n           ]\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "api/api-rest.php",
    "groupTitle": "Clientes"
  },
  {
    "type": "get",
    "url": "/clientes/:CI",
    "title": "GET ONE CLIENTES",
    "name": "GetClientesId",
    "group": "Clientes",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "CI",
            "description": "<p>identificador unico del cliente CI</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>Estado de respuesta</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "code",
            "description": "<p>Codigo de servidor http</p>"
          },
          {
            "group": "Success 200",
            "type": "Object",
            "optional": false,
            "field": "data",
            "description": "<p>Dato sacados de la tabla cliente</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.id_cliente",
            "description": "<p>Identificador del cliente</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.ci",
            "description": "<p>Cedula de identidad</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.nombre",
            "description": "<p>Nombre del cliente</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.apellido",
            "description": "<p>Apellido de cliente</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.celular",
            "description": "<p>Celular de referencia</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.estado",
            "description": "<p>Estado actual del cliente</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": " HTTP/1.1 200 OK\n{\n   \"status\": \"success\",\n   \"code\": 200,\n   \"data\":{\n          \"id_cliente\": \"string\",\n             \"ci\": \"string\",\n             \"nombre\": \"string\",\n             \"apellido\": \"string\",\n             \"celular\": \"string\",\n             \"estado\": \"number\"\n      }\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "api/api-rest.php",
    "groupTitle": "Clientes"
  },
  {
    "type": "post",
    "url": "/clientes",
    "title": "POST CLIENTE",
    "name": "Postclientes",
    "group": "Clientes",
    "parameter": {
      "fields": {
        "Request body": [
          {
            "group": "Request body",
            "type": "string",
            "optional": false,
            "field": "ci",
            "description": "<p>CI de cliente</p>"
          },
          {
            "group": "Request body",
            "type": "string",
            "optional": false,
            "field": "nombre",
            "description": "<p>Nombres de clientes</p>"
          },
          {
            "group": "Request body",
            "type": "string",
            "optional": false,
            "field": "apellido",
            "description": "<p>Apellido de clientes</p>"
          },
          {
            "group": "Request body",
            "type": "string",
            "optional": false,
            "field": "telefono",
            "description": "<p>Telefono de cliente</p>"
          }
        ]
      }
    },
    "examples": [
      {
        "title": "Request body:",
        "content": "{ \n   \"ci\": \"string\",\n   \"nombre\": \"string\",\n   \"apellido\": \"string\",\n   \"celular\": \"string\"\n}",
        "type": "json"
      }
    ],
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "status",
            "description": "<p>Estado de respuesta</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "code",
            "description": "<p>Codigo de servidor http</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "message",
            "description": "<p>Mensaje de exito</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": " HTTP/1.1 200 OK\n{\n   \"status\": \"success\",\n   \"code\": 200,\n   \"message\": \"Cliente creado correctamente\"\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "api/api-rest.php",
    "groupTitle": "Clientes"
  },
  {
    "type": "put",
    "url": "/clientes/:CI",
    "title": "PUT CLIENTE",
    "name": "Putclientes",
    "group": "Clientes",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "CI",
            "description": "<p>identificador unico del cliente CI</p>"
          }
        ],
        "Request body": [
          {
            "group": "Request body",
            "type": "number",
            "optional": false,
            "field": "ci",
            "description": "<p>CI de cliente</p>"
          },
          {
            "group": "Request body",
            "type": "string",
            "optional": false,
            "field": "nombre",
            "description": "<p>Nombres de clientes</p>"
          },
          {
            "group": "Request body",
            "type": "string",
            "optional": false,
            "field": "apellido",
            "description": "<p>Apellido de clientes</p>"
          },
          {
            "group": "Request body",
            "type": "string",
            "optional": false,
            "field": "telefono",
            "description": "<p>Telefono de cliente</p>"
          }
        ]
      }
    },
    "examples": [
      {
        "title": "Request body:",
        "content": "{ \n   \"ci\": \"string\",\n   \"nombre\": \"string\",\n   \"apellido\": \"string\",\n   \"celular\": \"string\"\n}",
        "type": "json"
      }
    ],
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "status",
            "description": "<p>Estado de respuesta</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "code",
            "description": "<p>Codigo de servidor http</p>"
          },
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "message",
            "description": "<p>Mensaje de exito</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": " HTTP/1.1 200 OK\n{\n   \"status\": \"success\",\n   \"code\": 200,\n   \"message\": \"El cliente se ha actualizado!!\"\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "api/api-rest.php",
    "groupTitle": "Clientes"
  },
  {
    "type": "delete",
    "url": "/producto-ventas/:ID_PRODUCTO_VENTA",
    "title": "DELETE PRODUCTO-VENTA",
    "name": "Deleteproducto-ventas",
    "group": "Producto-ventas",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "ID_PRODUCTO_VENTA",
            "description": "<p>identificador unico de la informacion</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "status",
            "description": "<p>Estado de respuesta</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "code",
            "description": "<p>Codigo de servidor http</p>"
          },
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "message",
            "description": "<p>Mensaje de exito</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": " HTTP/1.1 200 OK\n{\n   \"status\": \"success\",\n   \"code\": 200,\n   \"message\": \"El producto-venta no se ha eliminado!!\"\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "api/api-rest.php",
    "groupTitle": "Producto-ventas"
  },
  {
    "type": "get",
    "url": "/producto-ventas",
    "title": "GET PRODUCTO-VENTA",
    "group": "Producto-ventas",
    "name": "Getproducto-ventas",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "status",
            "description": "<p>Estado de respuesta</p>"
          },
          {
            "group": "Success 200",
            "type": "number",
            "optional": false,
            "field": "code",
            "description": "<p>Codigo de servidor http</p>"
          },
          {
            "group": "Success 200",
            "type": "array",
            "optional": false,
            "field": "data",
            "description": "<p>Datos sacados de la tabla producto-ventas</p>"
          },
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "data.id_producto_venta",
            "description": "<p>Identificador unico</p>"
          },
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "data.cantidad",
            "description": "<p>Cantidad del producto</p>"
          },
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "data.id_venta",
            "description": "<p>Identificador unico de una venta</p>"
          },
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "data.precio_unitario",
            "description": "<p>Precio unitario de producto</p>"
          },
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "data.precio_total",
            "description": "<p>Precio total de producto</p>"
          },
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "data.id_producto",
            "description": "<p>Identificador unico de un producto</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": " HTTP/1.1 200 OK\n{\n   \"status\": \"success\",\n   \"code\": 200,\n   \"data\":[\n                 {\n                    \"id_producto_venta\": \"string\",\n                     \"cantidad\": \"string\",\n                     \"id_venta\": \"string\",\n                     \"precio_unitario\": \"string\",\n                     \"precio_total\": \"string\",\n                     \"id_producto\": \"string\"\n                 }\n             ]\n   }",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "api/api-rest.php",
    "groupTitle": "Producto-ventas"
  },
  {
    "type": "get",
    "url": "/producto-ventas/:ID_PRODUCTO_VENTA",
    "title": "GET ONE PRODUCTO-VENTA",
    "group": "Producto-ventas",
    "name": "Getproducto-ventasID_PRODUCTO_VENTA",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "ID_PRODUCTO_VENTA",
            "description": "<p>identificador unico de la informacion</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "status",
            "description": "<p>Estado de respuesta</p>"
          },
          {
            "group": "Success 200",
            "type": "number",
            "optional": false,
            "field": "code",
            "description": "<p>Codigo de servidor http</p>"
          },
          {
            "group": "Success 200",
            "type": "object",
            "optional": false,
            "field": "data",
            "description": "<p>Datos sacados de la tabla producto-venta</p>"
          },
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "data.id_producto_venta",
            "description": "<p>Identificador unico</p>"
          },
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "data.cantidad",
            "description": "<p>Cantidad del producto</p>"
          },
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "data.id_venta",
            "description": "<p>Identificador unico de una venta</p>"
          },
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "data.precio_unitario",
            "description": "<p>Precio unitario de producto</p>"
          },
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "data.precio_total",
            "description": "<p>Precio total de producto</p>"
          },
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "data.id_producto",
            "description": "<p>Identificador unico de un producto</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": " HTTP/1.1 200 OK\n{\n   \"status\": \"success\",\n   \"code\": 200,\n   \"data\":{\n             \"id_producto_venta\": \"string\",\n             \"cantidad\": \"string\",\n             \"id_venta\": \"string\",\n             \"precio_unitario\": \"string\",\n             \"precio_total\": \"string\",\n             \"id_producto\": \"string\"\n      }\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "api/api-rest.php",
    "groupTitle": "Producto-ventas"
  },
  {
    "type": "post",
    "url": "/producto-ventas",
    "title": "POST PRODUCTO-VENTA",
    "name": "Postproducto-ventas",
    "group": "Producto-ventas",
    "parameter": {
      "fields": {
        "Request body": [
          {
            "group": "Request body",
            "type": "number",
            "optional": false,
            "field": "cantidad",
            "description": "<p>Cantidad del producto</p>"
          },
          {
            "group": "Request body",
            "type": "string",
            "optional": false,
            "field": "precio_unitario",
            "description": "<p>Precio unitario de producto</p>"
          },
          {
            "group": "Request body",
            "type": "string",
            "optional": false,
            "field": "precio_total",
            "description": "<p>Precio total de producto</p>"
          },
          {
            "group": "Request body",
            "type": "number",
            "optional": false,
            "field": "id_venta",
            "description": "<p>Telefono de cliente</p>"
          },
          {
            "group": "Request body",
            "type": "number",
            "optional": false,
            "field": "id_producto",
            "description": "<p>Identificador unico de un producto</p>"
          }
        ]
      }
    },
    "examples": [
      {
        "title": "Request body:",
        "content": "{ \n    \"cantidad\":number,\n    \"precio_unitario\": \"string\",\n    \"precio_total\": \"string\",\n    \"id_venta\": number,\n    \"id_producto\": number\n}",
        "type": "json"
      }
    ],
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "status",
            "description": "<p>Estado de respuesta</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "code",
            "description": "<p>Codigo de servidor http</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "message",
            "description": "<p>Mensaje de exito</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": " HTTP/1.1 200 OK\n{\n   \"status\": \"success\",\n   \"code\": 200,\n   \"message\": \"Producto-venta creado correctamente\"\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "api/api-rest.php",
    "groupTitle": "Producto-ventas"
  },
  {
    "type": "put",
    "url": "/producto-ventas/:ID_PRODUCTO_VENTA",
    "title": "PUT PRODUCTO-VENTA",
    "name": "Putproducto-ventas",
    "group": "Producto-ventas",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "ID_PRODUCTO_VENTA",
            "description": "<p>identificador unico de la informacion</p>"
          }
        ],
        "Request body": [
          {
            "group": "Request body",
            "type": "number",
            "optional": false,
            "field": "cantidad",
            "description": "<p>Cantidad del producto</p>"
          },
          {
            "group": "Request body",
            "type": "string",
            "optional": false,
            "field": "precio_unitario",
            "description": "<p>Precio unitario de producto</p>"
          },
          {
            "group": "Request body",
            "type": "string",
            "optional": false,
            "field": "precio_total",
            "description": "<p>Precio total de producto</p>"
          },
          {
            "group": "Request body",
            "type": "number",
            "optional": false,
            "field": "id_venta",
            "description": "<p>Telefono de cliente</p>"
          },
          {
            "group": "Request body",
            "type": "number",
            "optional": false,
            "field": "id_producto",
            "description": "<p>Identificador unico de un producto</p>"
          }
        ]
      }
    },
    "examples": [
      {
        "title": "Request body:",
        "content": "{ \n    \"cantidad\":number,\n    \"precio_unitario\": \"string\",\n    \"precio_total\": \"string\",\n    \"id_venta\": number,\n    \"id_producto\": number\n}",
        "type": "json"
      }
    ],
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "status",
            "description": "<p>Estado de respuesta</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "code",
            "description": "<p>Codigo de servidor http</p>"
          },
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "message",
            "description": "<p>Mensaje de exito</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": " HTTP/1.1 200 OK\n{\n   \"status\": \"success\",\n   \"code\": 200,\n   \"message\": \"El producto-venta se ha actualizado correctamente!!\"\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "api/api-rest.php",
    "groupTitle": "Producto-ventas"
  },
  {
    "type": "delete",
    "url": "/recibos/:ID_RECIBO",
    "title": "DELETE RECIBO",
    "name": "Deleterecibo",
    "group": "Recibo",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "ID_RECIBO",
            "description": "<p>identificador unico de la recibo</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "status",
            "description": "<p>Estado de respuesta</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "code",
            "description": "<p>Codigo de servidor http</p>"
          },
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "message",
            "description": "<p>Mensaje de exito</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": " HTTP/1.1 200 OK\n{\n   \"status\": \"success\",\n   \"code\": 200,\n   \"message\": \"El recibo se ha eliminado correctamente!!\"\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "api/api-rest.php",
    "groupTitle": "Recibo"
  },
  {
    "type": "get",
    "url": "/recibos",
    "title": "GET RECIBO",
    "group": "Recibo",
    "name": "Getrecibo",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "status",
            "description": "<p>Estado de respuesta</p>"
          },
          {
            "group": "Success 200",
            "type": "number",
            "optional": false,
            "field": "code",
            "description": "<p>Codigo de servidor http</p>"
          },
          {
            "group": "Success 200",
            "type": "array",
            "optional": false,
            "field": "data",
            "description": "<p>Datos sacados de la tabla recibo</p>"
          },
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "data.nit",
            "description": "<p>Numero nit de la venta-cliente</p>"
          },
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "data.codigo_control",
            "description": "<p>Codigo generado venta</p>"
          },
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "data.id_venta",
            "description": "<p>Identificador unico de la venta</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": " HTTP/1.1 200 OK\n{\n   \"status\": \"success\",\n   \"code\": 200,\n   \"data\":[\n                 {\n                     \"nit\": \"string\",\n                     \"codigo_control\": \"string\",\n                     \"id_venta\": \"string\"\n                 }\n             ]\n   }",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "api/api-rest.php",
    "groupTitle": "Recibo"
  },
  {
    "type": "get",
    "url": "/recibos/:ID_RECIBO",
    "title": "GET ONE RECIBO",
    "group": "Recibo",
    "name": "Getrecibo_ID_RECIBO",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "ID_RECIBO",
            "description": "<p>identificador unico de la recibo</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "status",
            "description": "<p>Estado de respuesta</p>"
          },
          {
            "group": "Success 200",
            "type": "number",
            "optional": false,
            "field": "code",
            "description": "<p>Codigo de servidor http</p>"
          },
          {
            "group": "Success 200",
            "type": "object",
            "optional": false,
            "field": "data",
            "description": "<p>Datos sacados de la tabla recibo</p>"
          },
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "data.nit",
            "description": "<p>Numero nit de la venta-cliente</p>"
          },
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "data.codigo_control",
            "description": "<p>Codigo generado venta</p>"
          },
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "data.id_venta",
            "description": "<p>Identificador unico de la venta</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": " HTTP/1.1 200 OK\n{\n   \"status\": \"success\",\n   \"code\": 200,\n   \"data\":{\n             \"nit\": \"string\",\n             \"codigo_control\": \"string\",\n             \"id_venta\": \"string\"\n         }\n   }",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "api/api-rest.php",
    "groupTitle": "Recibo"
  },
  {
    "type": "post",
    "url": "/recibos",
    "title": "POST RECIBO",
    "group": "Recibo",
    "name": "Postrecibo",
    "parameter": {
      "fields": {
        "Request body": [
          {
            "group": "Request body",
            "type": "string",
            "optional": false,
            "field": "Numero",
            "description": "<p>nit de la venta-cliente</p>"
          },
          {
            "group": "Request body",
            "type": "string",
            "optional": false,
            "field": "Codigo",
            "description": "<p>generado de la venta</p>"
          },
          {
            "group": "Request body",
            "type": "number",
            "optional": false,
            "field": "id_venta",
            "description": "<p>Identificador unico de la venta</p>"
          }
        ]
      }
    },
    "examples": [
      {
        "title": "Request body:",
        "content": "{ \n    \"nit\": \"string\",\n    \"codigo_control\": \"string\",\n    \"id_venta\": number\n}",
        "type": "json"
      }
    ],
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "status",
            "description": "<p>Estado de respuesta</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "code",
            "description": "<p>Codigo de servidor http</p>"
          },
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "message",
            "description": "<p>Mensaje de exito</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": " HTTP/1.1 200 OK\n{\n   \"status\": \"success\",\n   \"code\": 200,\n   \"message\": \"recibo creado correctamente\"\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "api/api-rest.php",
    "groupTitle": "Recibo"
  },
  {
    "type": "put",
    "url": "/recibos/:ID_VENTA",
    "title": "PUT RECIBO",
    "group": "Recibo",
    "name": "Putrecibo",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "ID_RECIBO",
            "description": "<p>identificador unico de la recibo</p>"
          }
        ],
        "Request body": [
          {
            "group": "Request body",
            "type": "string",
            "optional": false,
            "field": "Numero",
            "description": "<p>nit de la venta-cliente</p>"
          },
          {
            "group": "Request body",
            "type": "string",
            "optional": false,
            "field": "Codigo",
            "description": "<p>generado de la venta</p>"
          },
          {
            "group": "Request body",
            "type": "number",
            "optional": false,
            "field": "id_venta",
            "description": "<p>Identificador unico de la venta</p>"
          }
        ]
      }
    },
    "examples": [
      {
        "title": "Request body:",
        "content": "{ \n    \"nit\": \"string\",\n    \"codigo_control\": \"string\",\n    \"id_venta\": number\n}",
        "type": "json"
      }
    ],
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "status",
            "description": "<p>Estado de respuesta</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "code",
            "description": "<p>Codigo de servidor http</p>"
          },
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "message",
            "description": "<p>Mensaje de exito</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": " HTTP/1.1 200 OK\n{\n   \"status\": \"success\",\n   \"code\": 200,\n   \"message\": \"El recibo se ha actualizado correctamente!!\"\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "api/api-rest.php",
    "groupTitle": "Recibo"
  },
  {
    "type": "delete",
    "url": "/producto-ventas/:ID_VENTA",
    "title": "DELETE VENTA",
    "name": "Deleteventas",
    "group": "Ventas",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "ID_VENTA",
            "description": "<p>identificador unico de la venta</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "status",
            "description": "<p>Estado de respuesta</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "code",
            "description": "<p>Codigo de servidor http</p>"
          },
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "message",
            "description": "<p>Mensaje de exito</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": " HTTP/1.1 200 OK\n{\n   \"status\": \"success\",\n   \"code\": 200,\n   \"message\": \"El ventas se ha eliminado correctamente!!\"\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "api/api-rest.php",
    "groupTitle": "Ventas"
  },
  {
    "type": "get",
    "url": "/ventas",
    "title": "GET VENTA",
    "group": "Ventas",
    "name": "Getventas",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "status",
            "description": "<p>Estado de respuesta</p>"
          },
          {
            "group": "Success 200",
            "type": "number",
            "optional": false,
            "field": "code",
            "description": "<p>Codigo de servidor http</p>"
          },
          {
            "group": "Success 200",
            "type": "array",
            "optional": false,
            "field": "data",
            "description": "<p>Datos sacados de la tabla venta</p>"
          },
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "data.id_venta",
            "description": "<p>Identificador de la venta</p>"
          },
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "data.fecha",
            "description": "<p>Fecha de registro de la venta</p>"
          },
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "data.estado",
            "description": "<p>Estado de la venta</p>"
          },
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "data.id_cliente",
            "description": "<p>Identificador unico del cliente</p>"
          },
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "data.id_acceso_user",
            "description": "<p>Identificador unico del usuario</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": " HTTP/1.1 200 OK\n{\n   \"status\": \"success\",\n   \"code\": 200,\n   \"data\":[\n                 {\n                     \"id_venta\": \"string\",\n                     \"fecha\": \"string\",\n                     \"estado\": \"string\",\n                     \"id_cliente\": \"string\",\n                     \"id_acceso_user\": \"string\"\n                 }\n             ]\n   }",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "api/api-rest.php",
    "groupTitle": "Ventas"
  },
  {
    "type": "get",
    "url": "/producto-ventas/:ID_VENTA",
    "title": "GET ONE VENTA",
    "group": "Ventas",
    "name": "Getventas_ID_VENTA",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "ID_VENTA",
            "description": "<p>identificador unico de la venta</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "status",
            "description": "<p>Estado de respuesta</p>"
          },
          {
            "group": "Success 200",
            "type": "number",
            "optional": false,
            "field": "code",
            "description": "<p>Codigo de servidor http</p>"
          },
          {
            "group": "Success 200",
            "type": "object",
            "optional": false,
            "field": "data",
            "description": "<p>Datos sacados de la tabla venta</p>"
          },
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "data.id_venta",
            "description": "<p>Identificador de la venta</p>"
          },
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "data.fecha",
            "description": "<p>Fecha de registro de la venta</p>"
          },
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "data.estado",
            "description": "<p>Estado de la venta</p>"
          },
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "data.id_cliente",
            "description": "<p>Identificador unico del cliente</p>"
          },
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "data.id_acceso_user",
            "description": "<p>Identificador unico del usuario</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": " HTTP/1.1 200 OK\n{\n   \"status\": \"success\",\n   \"code\": 200,\n   \"data\":{\n             \"id_venta\": \"string\",\n             \"fecha\": \"string\",\n             \"estado\": \"string\",\n             \"id_cliente\": \"string\",\n             \"id_acceso_user\": \"string\"\n         }\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "api/api-rest.php",
    "groupTitle": "Ventas"
  },
  {
    "type": "post",
    "url": "/ventas",
    "title": "POST VENTA",
    "group": "Ventas",
    "name": "Postventas",
    "parameter": {
      "fields": {
        "Request body": [
          {
            "group": "Request body",
            "type": "number",
            "optional": false,
            "field": "fecha",
            "description": "<p>Fecha de registro</p>"
          },
          {
            "group": "Request body",
            "type": "string",
            "optional": false,
            "field": "id_cliente",
            "description": "<p>Identificador unico del cliente</p>"
          },
          {
            "group": "Request body",
            "type": "string",
            "optional": false,
            "field": "id_acceso_user",
            "description": "<p>Identificador unico del usuario</p>"
          }
        ]
      }
    },
    "examples": [
      {
        "title": "Request body:",
        "content": "{ \n    \"fecha\": \"string\",\n    \"id_cliente\": number,\n    \"id_acceso_user\": number\n}",
        "type": "json"
      }
    ],
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "status",
            "description": "<p>Estado de respuesta</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "code",
            "description": "<p>Codigo de servidor http</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "message",
            "description": "<p>Mensaje de exito</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": " HTTP/1.1 200 OK\n{\n   \"status\": \"success\",\n   \"code\": 200,\n   \"message\": \"venta creado correctamente\"\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "api/api-rest.php",
    "groupTitle": "Ventas"
  },
  {
    "type": "put",
    "url": "/producto-ventas/:ID_VENTA",
    "title": "PUT VENTA",
    "group": "Ventas",
    "name": "Putventas",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "ID_VENTA",
            "description": "<p>identificador unico de la venta</p>"
          }
        ],
        "Request body": [
          {
            "group": "Request body",
            "type": "number",
            "optional": false,
            "field": "fecha",
            "description": "<p>Fecha de registro</p>"
          },
          {
            "group": "Request body",
            "type": "string",
            "optional": false,
            "field": "id_cliente",
            "description": "<p>Identificador unico del cliente</p>"
          },
          {
            "group": "Request body",
            "type": "string",
            "optional": false,
            "field": "id_acceso_user",
            "description": "<p>Identificador unico del usuario</p>"
          }
        ]
      }
    },
    "examples": [
      {
        "title": "Request body:",
        "content": "{ \n    \"fecha\": \"string\",\n    \"id_cliente\": number,\n    \"id_acceso_user\": number\n}",
        "type": "json"
      }
    ],
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "status",
            "description": "<p>Estado de respuesta</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "code",
            "description": "<p>Codigo de servidor http</p>"
          },
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "message",
            "description": "<p>Mensaje de exito</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": " HTTP/1.1 200 OK\n{\n   \"status\": \"success\",\n   \"code\": 200,\n   \"message\": \"El venta se ha actualizado correctamente!!\"\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "api/api-rest.php",
    "groupTitle": "Ventas"
  }
] });
