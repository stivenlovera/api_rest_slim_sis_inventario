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

// LISTAR USUARIO
$app->get('/usuario', function() use($app){
    $sql = 'SELECT au.id_acceso_user, au.id, au.ci AS CI, p.nombre AS Nombre, p.apellido AS Apellido
    FROM acceso_user au, persona p
    WHERE au.ci=p.ci and au.estado="1"
    ORDER BY au.id DESC;';
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

// DEVOLVER UN SOLO USUARIO
$app->get('/usuario/:id', function($id) use( $app){
    $sql = "SELECT au.id_acceso_user, au.id, au.ci AS CI, p.nombre AS Nombre, p.apellido AS Apellido
    FROM acceso_user au, persona p
    WHERE au.ci=p.ci and au.estado='1' and au.ci=".$id;
    $query = connect($sql);

    //echo $sql;
    $result = array(
        'status' 	=> 'error',
        'code'		=> 404,
        'message' 	=> 'Usuario no disponible'
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
$app->post('/usuario_save', function() use($app){
    $result = array(
        'status' => 'error',
        'code'	 => 404,
        'message' => 'Usuario no se ha creado'
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
$app->put('/clientesPersona/:id', function($id) use($app){
    $json = $app->request->getBody('json');
    $data = json_decode($json, true);

    $sql = "UPDATE Persona SET ".
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
            'message' 	=> 'La Personas se ha actualizado correctamente!!'
        );
    }else{
        $result = array(
            'status' 	=> 'error',
            'code'		=> 404,
            'message' 	=> 'La Persona no se ha actualizado!!'
        );
    }

    echo json_encode($result);

});

// ELIMINAR UN Personas
$app->delete('/Persona/:id', function($id) use( $app){
    $sql = "UPDATE persona SET estado='0' WHERE ci = ".$id;
    $query = connect($sql);

    if($query){
        $result = array(
            'status' 	=> 'success',
            'code'		=> 200,
            'message' 	=> 'La personas se ha eliminado correctamente!!'
        );
    }else{
        $result = array(
            'status' 	=> 'error',
            'code'		=> 404,
            'message' 	=> 'La Persona no se ha eliminado!!'
        );
    }

    echo json_encode($result);
});

$app->run();