//aqui va a estar el codigo de usuarios.model.js

function init() {
  $("#frm_proyectosit").on("submit", function (e) {
    guardaryeditar(e);
  });
}

$().ready(() => {
  todos();
});

var todos = () => {
  var html = "";
  $.get("../../Controllers/proyectosit.controller.php?op=todos", (res) => {
    console.log(res);
    res = JSON.parse(res);
    $.each(res, (index, valor) => {
      html += `<tr>
                <td>${index + 1}</td>
                <td>${valor.Nombre}</td>
                <td>${valor.Tecnologia}</td>
                <td>${valor.Fecha_inicio}</td>
                <td>${valor.Fecha_fin}</td>                
            <td>
            <button class='btn btn-success' onclick='editar(${valor.ID_proyecto
        })'>Editar</button>
            <button class='btn btn-danger' onclick='eliminar(${valor.ID_proyecto
        })'>Eliminar</button>           
            </td></tr>
                `;
    });
    $("#tabla_proyectosit").html(html);
  });
};

var guardaryeditar = (e) => {
  e.preventDefault();
  var dato = new FormData($("#frm_proyectosit")[0]);
  var ruta = "";
  var ID_proyecto = document.getElementById("ID_proyecto").value;
  if (ID_proyecto > 0) {
    ruta = "../../Controllers/proyectosit.controller.php?op=actualizar";
  } else {
    ruta = "../../Controllers/proyectosit.controller.php?op=insertar";
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
        Swal.fire("Proyectos", "Registrado con éxito", "success");
        todos();
        limpia_Cajas();
      } else {
        Swal.fire("Proyectos", "Error al guardo, intente mas tarde", "error");
      }
    },
  });
};

var cargaProyectosit = () => {
  return new Promise((resolve, reject) => {
    $.post("../../Controllers/proyectosit.controller.php?op=todos", (res) => {
      res = JSON.parse(res);
      var html = "";
      $.each(res, (index, val) => {
        html += `<option value="${val.ID_proyecto}"> ${val.Nombre}</option>`;
      });
      $("#ID_proyecto").html(html);
      resolve();
    }).fail((error) => {
      reject(error);
    });
  });
};

var editar = async (ID_proyecto) => {
  await cargaProyectosit();
  $.post(
    "../../Controllers/proyectosit.controller.php?op=uno",
    { ID_proyecto: ID_proyecto },
    (res) => {
      res = JSON.parse(res);

      $("#ID_proyecto").val(res.ID_proyecto);
      $("#Nombre").val(res.Nombre);
      $("#Tecnologia").val(res.Tecnologia);
      $("#Fecha_inicio").val(res.Fecha_inicio);
      $("#Fecha_fin").val(res.Fecha_fin);
    }
  );
  $("#Modal_proyectosit").modal("show");
};
var eliminar = (ID_proyecto) => {
  Swal.fire({
    title: "Proyectos",
    text: "Esta seguro de eliminar el proyecto",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#d33",
    cancelButtonColor: "#3085d6",
    confirmButtonText: "Eliminar",
  }).then((result) => {
    if (result.isConfirmed) {
      $.post(
        "../../Controllers/proyectosit.controller.php?op=eliminar",
        { ID_proyecto: ID_proyecto },
        (res) => {
          res = JSON.parse(res);
          if (res === "ok") {
            Swal.fire("proyectosit", "Proyecto Eliminado", "success");
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
var verificar_Tecnologia = () => {
  let Tecnologia = $('#Tecnologia').val()
  let ID_proyecto = $('#ID_proyecto').val()
  $.post(
    '../../Controllers/proyectosit.controller.php?op=verificar_Tecnologia',
    { Tecnologia: Tecnologia , ID_proyecto: ID_proyecto},
    (res) => {
      console.log(res);
      res = JSON.parse(res);
      if (parseInt(res.Tecnologia_repetido) > 0) {
        $("#TecnologiaRepetido").removeClass("d-none");
        $("#TecnologiaRepetido").html(
          "La tecnologia ingresada, ya exite en la base de datos"
        );
        $("button").prop("disabled", true);
      } else {
        $("#TecnologiaRepetido").addClass("d-none");
        $("button").prop("disabled", false);
      }
    }

  );

}

var limpia_Cajas = () => {
  document.getElementById("ID_proyecto").value = "";
  document.getElementById("Nombre").value = "";
  document.getElementById("Tecnologia").value = "";
  document.getElementById("Fecha_inicio").value = "";
  document.getElementById("Fecha_fin").value = "";
  $("#Modal_proyectosit").modal("hide");
};
init();
