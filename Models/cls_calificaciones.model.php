<?php
require_once('cls_conexion.model.php');
class Clase_Calificaciones
{
    public function todos()
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "SELECT calificaciones.id_calificaciones, calificaciones.materia, calificaciones.nota, calificaciones.fecha, estudiantes.Nombre as estudiantes FROM `calificaciones` inner JOIN estudiantes on estudiantes.id_estudiante = calificaciones.id_estudiante;";
            $result = mysqli_query($con, $cadena);
            return $result;
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function uno($id_calificaciones)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "SELECT * FROM `calificaciones` WHERE id_calificaciones=$id_calificaciones";
            $result = mysqli_query($con, $cadena);
            return $result;
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function insertar($Materia, $id_estudiante, $Nota, $Fecha)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "INSERT INTO `calificaciones`(`Materia`,`id_estudiante`,`Nota`,`Fecha`) VALUES ('$Materia', '$id_estudiante','$Nota','$Fecha')";
            $result = mysqli_query($con, $cadena);
            return 'ok';
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function actualizar($id_calificaciones, $id_estudiante, $Materia, $Nota, $Fecha)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "UPDATE `calificaciones` SET `id_estudiante`='$id_estudiante',`Materia`='$Materia', `Nota`='$Nota',`Fecha`='$Fecha' WHERE `id_calificaciones`='$id_calificaciones'";
            $result = mysqli_query($con, $cadena);
            return "ok";
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function eliminar($id_calificaciones)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "DELETE FROM `calificaciones` WHERE `id_calificaciones`='$id_calificaciones'";
            $result = mysqli_query($con, $cadena);
            return "ok";
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function verificar_materia($Materia, $id_estudiante)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "SELECT count(*) as materia_repetido FROM `calificaciones` WHERE `Materia`= '$Materia' and `id_estudiante` = '$id_estudiante'";
            //echo $cadena;
            $result = mysqli_query($con, $cadena);
            return $result;
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
}
