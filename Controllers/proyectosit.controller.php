<?php
require_once('../Models/cls_proyectosit.model.php');
$proyectosit = new Clase_Proyectosit;
switch ($_GET["op"]) {
    case 'todos':
        $datos = array(); //defino un arreglo
        $datos = $proyectosit->todos(); //llamo al modelo de usuarios e invoco al procedimiento todos y almaceno en una variable
        while ($fila = mysqli_fetch_assoc($datos)) { //recorro el arreglo de datos
            $todos[] = $fila;
        }
        echo json_encode($todos); //devuelvo el arreglo en formato json
        break;
    case "uno":
        $ID_proyecto = $_POST["ID_proyecto"]; //defino una variable para almacenar el id del usuario, la variable se obtiene mediante POST
        $datos = array(); //defino un arreglo
        $datos = $proyectosit->uno($ID_proyecto); //llamo al modelo de usuarios e invoco al procedimiento uno y almaceno en una variable
        $uno = mysqli_fetch_assoc($datos); //recorro el arreglo de datos
        echo json_encode($uno); //devuelvo el arreglo en formato json
        break;
    case 'insertar':
        $Nombre = $_POST["Nombre"];
        $Tecnologia = $_POST["Tecnologia"];
        $Fecha_inicio = $_POST["Fecha_inicio"];
        $Fecha_fin = $_POST["Fecha_fin"];
        $datos = array(); //defino un arreglo
        $datos = $proyectosit->insertar($Nombre, $Tecnologia, $Fecha_inicio, $Fecha_fin); //llamo al modelo de usuarios e invoco al procedimiento insertar
        echo json_encode($datos); //devuelvo el arreglo en formato json
        break;
    case 'actualizar':
        $ID_proyecto = $_POST["ID_proyecto"];
        $Nombre = $_POST["Nombre"];
        $Tecnologia = $_POST["Tecnologia"];
        $Fecha_inicio = $_POST["Fecha_inicio"];
        $Fecha_fin = $_POST["Fecha_fin"];
        $datos = array(); //defino un arreglo
        $datos = $proyectosit->actualizar($ID_proyecto, $Nombre, $Tecnologia, $Fecha_inicio, $Fecha_fin); //llamo al modelo de usuarios e invoco al procedimiento insertar
        echo json_encode($datos); //devuelvo el arreglo en formato json
        break;
    case 'eliminar':
        $ID_proyecto = $_POST["ID_proyecto"]; //defino una variable para almacenar el id del usuario, la variable se obtiene mediante POST
        $datos = array(); //defino un arreglo
        $datos = $proyectosit->eliminar($ID_proyecto); //llamo al modelo de usuarios e invoco al procedimiento uno y almaceno en una variable
        echo json_encode($datos); //devuelvo el arreglo en formato json
        break;
    case 'verificar_Tecnologia':
        $Tecnologia = $_POST["Tecnologia"];
        $ID_proyecto = $_POST["ID_proyecto"];
        $datos = array(); //defino un arreglo
        $datos = $proyectosit->verificar_Tecnologia($Tecnologia, $ID_proyecto);
        $uno = mysqli_fetch_assoc($datos);
        echo json_encode($uno);
        break;
}
