<?php
require_once('../Models/cls_desarrolladores.model.php');
$desarrolladores = new Clase_Desarrolladores;

switch ($_GET["op"]) {
    case 'todos':
        $datos = array(); //defino un arreglo
        $datos = $desarrolladores->todos(); //llamo al modelo de usuarios e invoco al procedimiento todos y almaceno en una variable
        while ($fila = mysqli_fetch_assoc($datos)) { //recorro el arreglo de datos
            $todos[] = $fila;
        }
        echo json_encode($todos); //devuelvo el arreglo en formato json
        break;

    case "uno":
        $ID_desarrollador = $_POST["ID_desarrollador"]; //defino una variable para almacenar el id del usuario, la variable se obtiene mediante POST
        $datos = array(); //defino un arreglo
        $datos = $desarrolladores->uno($ID_desarrollador); //llamo al modelo de usuarios e invoco al procedimiento uno y almaceno en una variable
        $uno = mysqli_fetch_assoc($datos); //recorro el arreglo de datos
        echo json_encode($uno); //devuelvo el arreglo en formato json
        break;
    case 'insertar':
        $Nombre = $_POST["Nombre"];
        $Habilidades = $_POST["Habilidades"];
        $Salario = $_POST["Salario"];
        $Proyecto_asignado = $_POST["Proyecto_asignado"];
        $datos = array(); //defino un arreglo
        $datos = $desarrolladores->insertar($Nombre, $Habilidades, $Salario, $Proyecto_asignado); //llamo al modelo de usuarios e invoco al procedimiento insertar
        echo json_encode($datos); //devuelvo el arreglo en formato json
        break;

    case 'actualizar':
        $ID_desarrollador = $_POST["ID_desarrollador"];
        $Nombre = $_POST["Nombre"];
        $Habilidades = $_POST["Habilidades"];
        $Salario = $_POST["Salario"];
        $Proyecto_asignado = $_POST["Proyecto_asignado"];
        $datos = array(); //defino un arreglo
        $datos = $desarrolladores->actualizar($ID_desarrollador, $Nombre, $Habilidades, $Salario, $Proyecto_asignado); //llamo al modelo de usuarios e invoco al procedimiento insertar
        echo json_encode($datos); //devuelvo el arreglo en formato json
        break;
    case 'eliminar':
        $ID_desarrollador = $_POST["ID_desarrollador"]; //defino una variable para almacenar el id del usuario, la variable se obtiene mediante POST
        $datos = array(); //defino un arreglo
        $datos = $desarrollador->eliminar($ID_desarrollador); //llamo al modelo de usuarios e invoco al procedimiento uno y almaceno en una variable
        echo json_encode($datos); //devuelvo el arreglo en formato json
        break;
    case 'verificar_Habilidades':
        $Habilidades = $_POST["Habilidades"];
        $ID_desarrollador = $_POST["ID_desarrollador"];
        $datos = array(); //defino un arreglo
        $datos = $desarrolladores->verificar_Habilidades($Habilidades, $ID_desarrollador);
        $uno = mysqli_fetch_assoc($datos);
        echo json_encode($uno);
        break;
}
