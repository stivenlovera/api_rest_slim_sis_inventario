<?php
function connect($consulta){
    $db = new mysqli('localhost', 'root', '', 'sistema_inventario');
    $query = $db->query($consulta);
    return $query;
}

?>