//aqui va a estar el codigo de usuarios.model.js

function init() {
  $("#frm_calificaciones").on("submit", function (e) {
    guardaryeditar(e);
  });
}

$().ready(() => {
  todos();
});

var todos = () => {
  var html = "";
  $.get("../../Controllers/calificaciones.controller.php?op=todos", (res) => {
    console.log(res);
    res = JSON.parse(res);
    $.each(res, (index, valor) => {
      html += `<tr>
                <td>${index + 1}</td>
                <td>${valor.estudiantes}</td>
                <td>${valor.materia}</td>
                <td>${valor.nota}</td>
                <td>${valor.fecha}</td>                
            <td>
            <button class='btn btn-success' onclick='editar(${valor.id_calificaciones
        })'>Editar</button>
            <button class='btn btn-danger' onclick='eliminar(${valor.id_calificaciones
        })'>Eliminar</button>           
            </td></tr>
                `;
    });
    $("#tabla_estudiantes").html(html);
  });
};

var guardaryeditar = (e) => {
  e.preventDefault();
  var dato = new FormData($("#frm_calificaciones")[0]);
  var ruta = "";
  var id_calificaciones = document.getElementById("id_calificaciones").value;
  if (id_calificaciones > 0) {
    ruta = "../../Controllers/calificaciones.controller.php?op=actualizar";
  } else {
    ruta = "../../Controllers/calificaciones.controller.php?op=insertar";
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
        Swal.fire("Calificaciones", "Registrado con éxito", "success");
        todos();
        limpia_Cajas();
      } else {
        Swal.fire("Calificaciones", "Error al guardo, intente mas tarde", "error");
      }
    },
  });
};

var cargaEstudiantes = () => {
  return new Promise((resolve, reject) => {
    $.post("../../Controllers/estudiantes.controller.php?op=todos", (res) => {
      res = JSON.parse(res);
      var html = "";
      $.each(res, (index, val) => {
        html += `<option value="${val.id_estudiante}"> ${val.Nombre}</option>`;
      });
      $("#id_estudiante").html(html);
      resolve();
    }).fail((error) => {
      reject(error);
    });
  });
};

var editar = async (id_calificaciones) => {
  await cargaEstudiantes();
  $.post(
    "../../Controllers/calificaciones.controller.php?op=uno",
    { id_calificaciones: id_calificaciones },
    (res) => {
      res = JSON.parse(res);

      $("#id_calificaciones").val(res.id_calificaciones);
      $("#id_estudiante").val(res.id_estudiante);
      $("#Materia").val(res.Materia);
      $("#Nota").val(res.Nota);
      $("#Fecha").val(res.Fecha);
    }
  );
  $("#Modal_calificaciones").modal("show");
};
var eliminar = (id_calificaciones) => {
  Swal.fire({
    title: "Calificaciones",
    text: "Esta seguro de eliminar la calificacion",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#d33",
    cancelButtonColor: "#3085d6",
    confirmButtonText: "Eliminar",
  }).then((result) => {
    if (result.isConfirmed) {
      $.post(
        "../../Controllers/calificaciones.controller.php?op=eliminar",
        { id_calificaciones: id_calificaciones },
        (res) => {
          res = JSON.parse(res);
          if (res === "ok") {
            Swal.fire("Calificaciones", "Calificacion Eliminada", "success");
            todos();
          } else {
            Swal.fire("Error", res, "error");
          }
        }
      );
    }
  });

  limpia_Cajas();
};
var verificar_materia = () => {
  let Materia = $('#Materia').val()
  let id_estudiante = $('#id_estudiante').val()
  $.post(
    '../../Controllers/calificaciones.controller.php?op=verificar_materia',
    { Materia: Materia , id_estudiante: id_estudiante},
    (res) => {
      console.log(res);
      res = JSON.parse(res);
      if (parseInt(res.materia_repetido) > 0) {
        $("#MateriaRepetido").removeClass("d-none");
        $("#MateriaRepetido").html(
          "La materia ingresada, ya exite en la base de datos"
        );
        $("button").prop("disabled", true);
      } else {
        $("#MateriaRepetido").addClass("d-none");
        $("button").prop("disabled", false);
      }
    }

  );

}

var limpia_Cajas = () => {
  document.getElementById("id_calificaciones").value = "";
  document.getElementById("id_estudiante").value = "";
  document.getElementById("Materia").value = "";
  document.getElementById("Nota").value = "";
  document.getElementById("Fecha").value = "";
  $("#Modal_calificaciones").modal("hide");
};
init();
