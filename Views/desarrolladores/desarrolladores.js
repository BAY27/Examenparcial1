//aqui va a estar el codigo de usuarios.model.js

function init() {
  $("#frm_desarrolladores").on("submit", function (e) {
    guardaryeditar(e);
  });
}


$().ready(() => {
  todos();
});

var todos = () => {
  var html = "";
  $.get("../../Controllers/desarrolladores.controller.php?op=todos", (res) => {
    res = JSON.parse(res);
    $.each(res, (index, valor) => {

      html += `<tr>
                <td>${index + 1}</td>
                <td>${valor.Nombre}</td>                    
                    <td>${valor.Habilidades}</td>                    
                    <td>${valor.Salario}</td>                    
                    <td>${valor.Proyecto_asignado}</td>
            <td>
            <button class='btn btn-success' onclick='editar(${valor.ID_desarrollador
        })'>Editar</button>
            <button class='btn btn-danger' onclick='eliminar(${valor.ID_desarrollador
        })'>Eliminar</button>            
            </td></tr>
                `;
    });
    $("#tabla_desarrolladores").html(html);
  });
};

var guardaryeditar = (e) => {
  e.preventDefault();
  var dato = new FormData($("#frm_desarrolladores")[0]);
  var ruta = '';
  var ID_desarrollador = document.getElementById("ID_desarrollador").value
  if (ID_desarrollador > 0) {
    ruta = "../../Controllers/desarrolladores.controller.php?op=actualizar"
  } else {
    ruta = "../../Controllers/desarrolladores.controller.php?op=insertar"
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
        Swal.fire("Desarrolladores", "Registrado con éxito", "success");
        todos();
        limpia_Cajas();
      } else {
        Swal.fire("Desarrolladores", "Error al guardo, intente mas tarde", "error");
      }
    },
  });
}
var verificar_Habilidades = () => {
  let Nombre = $('#Nombre').val()
  $.post(
    '../../Controllers/desarrolladores.controller.php?op=verificar_Habilidades',
    { Nombre: Nombre },
    (res) => {
      console.log(res);
      res = JSON.parse(res);
      if (parseInt(res.Habilidades_repetido) > 0) {
        $("#HabilidadesRepetido").removeClass("d-none");
        $("#HabilidadesRepetido").html(
          "La Habilidad ingresada, ya exite en la base de datos"
        );
        $("button").prop("disabled", true);
      } else {
        $("#HabilidadesRepetido").addClass("d-none");
        $("button").prop("disabled", false);
      }
    }

  );

}


var editar = (ID_desarrollador) => {

  $.post(
    "../../Controllers/desarrolladores.controller.php?op=uno",
    { ID_desarrollador: ID_desarrollador },
    (res) => {
      res = JSON.parse(res);
      $("#ID_desarrollador").val(res.ID_desarrollador);
      $("#Nombre").val(res.Nombre);
      $("#Habilidades").val(res.Habilidades);
      $("#Salario").val(res.Salario);
      $("#Proyecto_asignado").val(res.Proyecto_asignado);

    }
  );
  $("#Modal_desarrolladores").modal("show");
}


var eliminar = (ID_desarrollador) => {
  Swal.fire({
    title: "Desarrolladores",
    text: "Esta seguro de eliminar al desarrollador",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#d33",
    cancelButtonColor: "#3085d6",
    confirmButtonText: "Eliminar",
  }).then((result) => {
    if (result.isConfirmed) {
      $.post(
        "../../Controllers/desarrolladores.controller.php?op=eliminar",
        { ID_desarrollador: ID_desarrollador },
        (res) => {
          res = JSON.parse(res);
          if (res === "ok") {
            Swal.fire("Desarrolladores", "Desarrollador Eliminado", "success");
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
  document.getElementById("ID_desarrollador").value = "";
  document.getElementById("Nombre").value = "";
  document.getElementById("Habilidades").value = "";
  document.getElementById("Salario").value = "";
  document.getElementById("Proyecto_asignado").value = "";
  $("#Modal_desarrolladores").modal("hide");

}
init();