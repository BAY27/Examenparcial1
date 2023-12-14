<?php require_once('../html/head2.php') ?>

<div class="row">

    <div class="col-lg-8 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">Lista de Estudiantes</h5>

                <div class="table-responsive">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal_estudiantes">
                        Nuevo Estudiante
                    </button>
                    <table class="table text-nowrap mb-0 align-middle">
                        <thead class="text-dark fs-4">
                            <tr>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">#</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Nombres</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Edad</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Curso</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">GPA</h6>
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
<div class="modal fade" id="Modal_estudiantes" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="frm_estudiantes">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Estudiantes</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <input type="hidden" name="id_estudiante" id="id_estudiante">



                    <div class="form-group">
                        <label for="nombre">Nombre del Estudiante</label>
                        <input type="text" required onfocusout="verificar_estudiante()" class="form-control" id="Nombre" name="Nombre" placeholder="Ingrese el nombre del estudiante">
                        <div class="alert alert-danger d-none" role="alert" id="EstudianteRepetido"></div>
                    </div>
                    <div class="form-group">
                        <label for="edad">Edad del Estudiante</label>
                        <input type="text" required class="form-control" id="Edad" name="Edad" placeholder="Ingrese la edad del estudiante">
                    </div>
                    <div class="form-group">
                        <label for="curso">Curso del Estudiante</label>
                        <input type="text" required onfocusout="verificar_curso()" class="form-control" id="Curso" name="Curso" placeholder="Ingrese el curso del estudiante">
                        <div class="alert alert-danger d-none" role="alert" id="CursoRepetido"></div>
                    </div>
                    <div class="form-group">
                        <label for="gpa">GPA del Estudiante</label>
                        <input type="text" required class="form-control" id="GPA" name="GPA" placeholder="Ingrese el GPA del estudiante">
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

<script src="estudiantes.js"></script>