<?php require_once('../html/head2.php') ?>




<div class="row">

    <div class="col-lg-8 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">Lista de Calificaciones</h5>

                <div class="table-responsive">
                    <button type="button" onclick="cargaEstudiantes()" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal_calificaciones">
                        Nueva Calificacion
                    </button>
                    <table class="table text-nowrap mb-0 align-middle">
                        <thead class="text-dark fs-4">
                            <tr>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">#</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Nombre</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Materia</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Nota</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Fecha</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Opciones</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody id="tabla_estudiantes">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Ventana Modal-->

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="Modal_calificaciones" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="frm_calificaciones">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Estudiantes</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <input type="hidden" name="id_calificaciones" id="id_calificaciones">

                    <div class="form-group">
                        <label for="id_estudiante">Estudiante</label>
                        <select name="id_estudiante" id="id_estudiante" class="form-control">
                            <option value="0">Seleccione un Estudiante</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="materia">Nombre de la Materia</label>
                        <input type="text" required onfocusout="verificar_materia()" class="form-control" id="Materia" name="Materia" placeholder="Ingrese el nombre de la materia">
                        <div class="alert alert-danger d-none" role="alert" id="MateriaRepetido"></div>
                    </div>
                    <div class="form-group">
                        <label for="nota">Nota</label>
                        <input type="text" required class="form-control" id="Nota" name="Nota" placeholder="Ingrese la nota">
                    </div>
                    <div class="form-group">
                        <label for="fecha">Fecha</label>
                        <input type="date" required class="form-control" id="Fecha" name="Fecha" placeholder="Ingrese la fecha">
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once('../html/script2.php') ?>

<script src="calificaciones.js"></script>