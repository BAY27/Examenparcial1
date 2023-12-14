<?php
require_once('../Models/cls_estudiantes.models.php');
$estudiantes = new Clase_Estudiantes;
switch ($_GET["op"]) {
    case 'todos':
        $datos = array(); //defino un arreglo
        $datos = $estudiantes->todos(); //llamo al modelo de usuarios e invoco al procedimiento todos y almaceno en una variable
        while ($fila = mysqli_fetch_assoc($datos)) { //recorro el arreglo de datos
            $todos[] = $fila;
        }
        echo json_encode($todos); //devuelvo el arreglo en formato json
        break;
    case "uno":
        $id_estudiante = $_POST["id_estudiante"]; //defino una variable para almacenar el id del usuario, la variable se obtiene mediante POST
        $datos = array(); //defino un arreglo
        $datos = $estudiantes->uno($id_estudiante); //llamo al modelo de usuarios e invoco al procedimiento uno y almaceno en una variable
        $uno = mysqli_fetch_assoc($datos); //recorro el arreglo de datos
        echo json_encode($uno); //devuelvo el arreglo en formato json
        break;
    case 'insertar':
        $Nombre = $_POST["Nombre"];
        $Edad = $_POST["Edad"];
        $Curso = $_POST["Curso"];
        $GPA = $_POST["GPA"];
        $datos = array(); //defino un arreglo
        $datos = $estudiantes->insertar($Nombre, $Edad, $Curso, $GPA); //llamo al modelo de usuarios e invoco al procedimiento insertar
        echo json_encode($datos); //devuelvo el arreglo en formato json
        break;
    case 'actualizar':
        $id_estudiante = $_POST["id_estudiante"];
        $Nombre = $_POST["Nombre"];
        $Edad = $_POST["Edad"];
        $Curso = $_POST["Curso"];
        $GPA = $_POST["GPA"];
        $datos = array(); //defino un arreglo
        $datos = $estudiantes->actualizar($id_estudiante, $Nombre, $Edad, $Curso, $GPA); //llamo al modelo de usuarios e invoco al procedimiento actual
        echo json_encode($datos); //devuelvo el arreglo en formato json
        break;
    case 'eliminar':
        $id_estudiante = $_POST["id_estudiante"]; //defino una variable para almacenar el id del usuario, la variable se obtiene mediante POST
        $datos = array(); //defino un arreglo
        $datos = $estudiantes->eliminar($id_estudiante); //llamo al modelo de usuarios e invoco al procedimiento uno y almaceno en una variable
        echo json_encode($datos); //devuelvo el arreglo en formato json
        break;
    case 'verificar_estudiante':
        $Nombre = $_POST["Nombre"];
        $datos = array(); //defino un arreglo
        $datos = $estudiantes->verificar_estudiante($Nombre);
        $uno = mysqli_fetch_assoc($datos);
        echo json_encode($uno);
        break;
    case 'verificar_curso':
        $Curso = $_POST["Curso"];
        $datos = array(); //defino un arreglo
        $datos = $estudiantes->verificar_curso($Curso);
        $uno = mysqli_fetch_assoc($datos);
        echo json_encode($uno);
        break;
}
