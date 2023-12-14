//aqui va a estar el codigo de usuarios.model.js

function init() {
  $("#frm_estudiantes").on("submit", function (e) {
    guardaryeditar(e);
  });
}


$().ready(() => {
  todos();
});

var todos = () => {
  var html = "";
  $.get("../../Controllers/estudiantes.controller.php?op=todos", (res) => {
    res = JSON.parse(res);
    $.each(res, (index, valor) => {

      html += `<tr>
                <td>${index + 1}</td>
                <td>${valor.Nombre}</td>                    
                    <td>${valor.Edad}</td>                    
                    <td>${valor.Curso}</td>                    
                    <td>${valor.GPA}</td>
            <td>
            <button class='btn btn-success' onclick='editar(${valor.id_estudiante
        })'>Editar</button>
            <button class='btn btn-danger' onclick='eliminar(${valor.id_estudiante
        })'>Eliminar</button>            
            </td></tr>
                `;
    });
    $("#tabla_estudiantes").html(html);
  });
};

var guardaryeditar = (e) => {
  e.preventDefault();
  var dato = new FormData($("#frm_estudiantes")[0]);
  var ruta = '';
  var id_estudiante = document.getElementById("id_estudiante").value
  if (id_estudiante > 0) {
    ruta = "../../Controllers/estudiantes.controller.php?op=actualizar"
  } else {
    ruta = "../../Controllers/estudiantes.controller.php?op=insertar"
  }
  $.ajax({
    url: ruta,
    type: "POST",
    data: dato,
    contentType: false,
    processData: false,
    success: function (res) {
      res = JSON.parse(res);
      if (res == "ok") {
        Swal.fire("Estudiantes", "Registrado con éxito", "success");
        todos();
        limpia_Cajas();
      } else {
        Swal.fire("Estudiantes", "Error al guardo, intente mas tarde", "error");
      }
    },
  });
}
var verificar_estudiante = () => {
  let Nombre = $('#Nombre').val()
  $.post(
    '../../Controllers/estudiantes.controller.php?op=verificar_estudiante',
    { Nombre: Nombre },
    (res) => {
      console.log(res);
      res = JSON.parse(res);
      if (parseInt(res.estudiante_repetido) > 0) {
        $("#EstudianteRepetido").removeClass("d-none");
        $("#EstudianteRepetido").html(
          "El estudiante ingresado, ya exite en la base de datos"
        );
        $("button").prop("disabled", true);
      } else {
        $("#EstudianteRepetido").addClass("d-none");
        $("button").prop("disabled", false);
      }
    }

  );

}

var verificar_curso = () => {
  let Curso = $('#Curso').val()
  $.post(
    '../../Controllers/estudiantes.controller.php?op=verificar_curso',
    { Curso: Curso },
    (res) => {
      console.log(res);
      res = JSON.parse(res);
      if (parseInt(res.curso_repetido) > 0) {
        $("#CursoRepetido").removeClass("d-none");
        $("#CursoRepetido").html(
          "El curso ingresado, ya exite en la base de datos"
        );
        $("button").prop("disabled", true);
      } else {
        $("#CursoRepetido").addClass("d-none");
        $("button").prop("disabled", false);
      }
    }

  );

}

var editar = (id_estudiante) => {

  $.post(
    "../../Controllers/estudiantes.controller.php?op=uno",
    { id_estudiante: id_estudiante },
    (res) => {
      res = JSON.parse(res);
      $("#id_estudiante").val(res.id_estudiante);
      $("#Nombre").val(res.Nombre);
      $("#Edad").val(res.Edad);
      $("#Curso").val(res.Curso);
      $("#GPA").val(res.GPA);

    }
  );
  $("#Modal_estudiantes").modal("show");
}


var eliminar = (id_estudiante) => {
  Swal.fire({
    title: "Estudiantes",
    text: "Esta seguro de eliminar al estudiante",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#d33",
    cancelButtonColor: "#3085d6",
    confirmButtonText: "Eliminar",
  }).then((result) => {
    if (result.isConfirmed) {
      $.post(
        "../../Controllers/estudiantes.controller.php?op=eliminar",
        { id_estudiante: id_estudiante },
        (res) => {
          res = JSON.parse(res);
          if (res === "ok") {
            Swal.fire("Estudiantes", "Estudiante Eliminado", "success");
            todos();
          } else {
            Swal.fire("Error", res, "error");
          }
        }
      );
    }
  });

  limpia_Cajas();
}

var limpia_Cajas = () => {
  document.getElementById("id_estudiante").value = "";
  document.getElementById("Nombre").value = "";
  document.getElementById("Edad").value = "";
  document.getElementById("Curso").value = "";
  document.getElementById("GPA").value = "";
  $("#Modal_estudiantes").modal("hide");

}
init();