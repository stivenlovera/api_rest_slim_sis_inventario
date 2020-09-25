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

// LISTAR PERSONAS
$app->get('/Persona', function() use($app){
    $sql = 'SELECT * FROM Persona WHERE estado ="1" ORDER BY ci DESC;';
    $query = connect($sql);

    //echo  $sql;
    $Personas = array();
    while ($Persona = $query->fetch_assoc()) {
        $Personas[] = $Persona;
    }

    $result = array(
        'status' => 'success',
        'code'	 => 200,
        'data' => $Personas
    );

    echo json_encode($result);
});

// DEVOLVER UN SOLO CLIENTE
$app->get('/Persona/:id', function($id) use( $app){
    $sql = "SELECT * FROM persona WHERE estado='1' AND ci = ".$id;
    $query = connect($sql);
    //echo $sql;
    $result = array(
        'status' 	=> 'error',
        'code'		=> 404,
        'message' 	=> 'Persona no disponible'
    );

    if($query->num_rows == 1){
        $persona = $query->fetch_assoc();

        $result = array(
            'status' 	=> 'success',
            'code'		=> 200,
            'data' 	=> $persona
        );
    }

    echo json_encode($result);
});

// GUARDAR PERSONA
$app->post('/Persona', function() use($app){
    $result = array(
        'status' => 'error',
        'code'	 => 404,
        'message' => 'Persona NO se ha creado'
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

        if(!isset($data['dirrecion'])){
            $data['dirrecion']=null;

        }
        if(!isset($data['telefono'])){
            $data['telefono']=null;
        } 

        $query = "INSERT INTO Persona(ci,nombre,apellido,celular,dirrecion,telefono,estado) VALUES(".
            "'{$data['ci']}',".
            "'{$data['nombre']}',".
            "'{$data['apellido']}',".
            "'{$data['celular']}',".
            "'{$data['dirrecion']}',".
            "'{$data['telefono']}',".
            "'1'".
            ");";
            //echo $query;
        $insert = connect($query);
        //echo  $query
        if($insert){
            $result = array(
                'status' => 'success',
                'code'	 => 200,
                'message' => 'Persona creado correctamente'
            );
        }
    }

    echo json_encode($result);

});

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