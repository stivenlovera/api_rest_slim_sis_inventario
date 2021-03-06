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
          },
          {
            "group": "Parameter",
            "optional": false,
            "field": "Request-body",
            "description": "<p>{ &quot;ci&quot;: &quot;string&quot;, &quot;nombre&quot;: &quot;string&quot;, &quot;apellido&quot;: &quot;string&quot;, &quot;celular&quot;: &quot;string&quot; }</p>"
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
            "type": "String",
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
    "url": "/clientes/:id_cliente",
    "title": "GET CLIENTES ID",
    "name": "GetClientesId",
    "group": "Clientes",
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
          "content": " HTTP/1.1 200 OK\n{\n   \"status\": \"success\",\n   \"code\": 200,\n   \"data\":{\n          \"id_cliente\": \"number\",\n             \"ci\": \"string\",\n             \"nombre\": \"string\",\n             \"apellido\": \"string\",\n             \"celular\": \"string\",\n             \"estado\": \"number\"\n      }\n}",
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
        "Parameter": [
          {
            "group": "Parameter",
            "optional": false,
            "field": "Request-body",
            "description": "<p>{ &quot;ci&quot;: &quot;string&quot;, &quot;nombre&quot;: &quot;string&quot;, &quot;apellido&quot;: &quot;string&quot;, &quot;celular&quot;: &quot;string&quot; }</p>"
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
    "url": "/clientes/:ci",
    "title": "PUT CLIENTE",
    "name": "Putclientes",
    "group": "Clientes",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "optional": false,
            "field": "Request-body",
            "description": "<p>{ &quot;ci&quot;: &quot;string&quot;, &quot;nombre&quot;: &quot;string&quot;, &quot;apellido&quot;: &quot;string&quot;, &quot;celular&quot;: &quot;string&quot; }</p>"
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
    "type": "get",
    "url": "/productos/:id",
    "title": "GET PRODUCTOS ID",
    "name": "GetProductosID",
    "group": "Productos",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "id",
            "description": "<p>Identificador unico de producto.</p>"
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
            "description": "<p>Dato sacado de la tabla productos</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.id",
            "description": "<p>Identificador de producto</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.nombre",
            "description": "<p>Nombre del producto</p>"
          },
          {
            "group": "Success 200",
            "type": "Float",
            "optional": false,
            "field": "data.description",
            "description": "<p>Descripcion del producto</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.precio",
            "description": "<p>Precio del producto</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.imagen",
            "description": "<p>Nombre de la imagen del producto</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": " HTTP/1.1 200 OK\n{\n   \"status\": \"success\",\n   \"code\": 200,\n   \"data\": {\n               \"id\": \"1\",\n               \"nombre\": \"Manzanas\",\n               \"description\": \"jodas\",\n               \"precio\": \"80\",\n               \"imagen\": \"pina.png\"\n           }\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "api/api-rest.php",
    "groupTitle": "Productos"
  },
  {
    "type": "post",
    "url": "/productos/",
    "title": "POST Persona",
    "name": "PostProductos",
    "group": "Productos",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "optional": false,
            "field": "jsonConsumo",
            "description": "<p>{ &quot;nombre&quot;: &quot;Peras&quot;,   &quot;description&quot;: &quot;frutas&quot;,   &quot;precio&quot;: &quot;60&quot;, *   &quot;imagen&quot;: null }</p>"
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
            "description": "<p>Mensaje de exito</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": " HTTP/1.1 200 OK\n{\n   \"status\": \"success\",\n   \"code\": 200,\n   \"message\": \"Producto creado correctamente\"\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "api/api-rest.php",
    "groupTitle": "Productos"
  },
  {
    "type": "post",
    "url": "/persona/",
    "title": "Get Persona",
    "name": "PostProductos",
    "group": "Productos",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "optional": false,
            "field": "jsonConsumo",
            "description": "<p>{ &quot;nombre&quot;: &quot;Peras&quot;,   &quot;description&quot;: &quot;frutas&quot;,   &quot;precio&quot;: &quot;60&quot;, *   &quot;imagen&quot;: null }</p>"
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
            "description": "<p>Mensaje de exito</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": " HTTP/1.1 200 OK\n{\n   \"status\": \"success\",\n   \"code\": 200,\n   \"message\": \"Producto creado correctamente\"\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "api/api-rest.php",
    "groupTitle": "Productos"
  }
] });
