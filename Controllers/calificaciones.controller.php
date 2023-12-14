<?php
require_once('../Models/cls_calificaciones.model.php');
$calificaciones = new Clase_Calificaciones;
switch ($_GET["op"]) {
    case 'todos':
        $datos = array(); //defino un arreglo
        $datos = $calificaciones->todos(); //llamo al modelo de usuarios e invoco al procedimiento todos y almaceno en una variable
        while ($fila = mysqli_fetch_assoc($datos)) { //recorro el arreglo de datos
            $todos[] = $fila;
        }
        echo json_encode($todos); //devuelvo el arreglo en formato json
        break;
    case "uno":
        $id_calificaciones = $_POST["id_calificaciones"]; //defino una variable para almacenar el id del usuario, la variable se obtiene mediante POST
        $datos = array(); //defino un arreglo
        $datos = $calificaciones->uno($id_calificaciones); //llamo al modelo de usuarios e invoco al procedimiento uno y almaceno en una variable
        $uno = mysqli_fetch_assoc($datos); //recorro el arreglo de datos
        echo json_encode($uno); //devuelvo el arreglo en formato json
        break;
    case 'insertar':
        $id_estudiante = $_POST["id_estudiante"];
        $Materia = $_POST["Materia"];
        $Nota = $_POST["Nota"];
        $Fecha = $_POST["Fecha"];
        $datos = array(); //defino un arreglo
        $datos = $calificaciones->insertar($Materia, $id_estudiante, $Nota, $Fecha); //llamo al modelo de usuarios e invoco al procedimiento insertar
        echo json_encode($datos); //devuelvo el arreglo en formato json
        break;
    case 'actualizar':
        $id_calificaciones = $_POST["id_calificaciones"];
        $id_estudiante = $_POST["id_estudiante"];
        $Materia = $_POST["Materia"];
        $Nota = $_POST["Nota"];
        $Fecha = $_POST["Fecha"];
        $datos = array(); //defino un arreglo
        $datos = $calificaciones->actualizar($id_calificaciones, $id_estudiante, $Materia, $Nota, $Fecha); //llamo al modelo de usuarios e invoco al procedimiento actual
        echo json_encode($datos); //devuelvo el arreglo en formato json
        break;
    case 'eliminar':
        $id_calificaciones = $_POST["id_calificaciones"]; //defino una variable para almacenar el id del usuario, la variable se obtiene mediante POST
        $datos = array(); //defino un arreglo
        $datos = $calificaciones->eliminar($id_calificaciones); //llamo al modelo de usuarios e invoco al procedimiento uno y almaceno en una variable
        echo json_encode($datos); //devuelvo el arreglo en formato json
        break;
    case 'verificar_materia':
        $Materia = $_POST["Materia"];
        $id_estudiante = $_POST["id_estudiante"];
        $datos = array(); //defino un arreglo
        $datos = $calificaciones->verificar_materia($Materia, $id_estudiante);
        $uno = mysqli_fetch_assoc($datos);
        echo json_encode($uno);
        break;
}
