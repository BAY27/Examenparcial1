<?php require_once('../html/head2.php') ?>

<div class="row">

    <div class="col-lg-8 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">Lista de Desarrolladores</h5>

                <div class="table-responsive">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal_desarrolladores">
                        Nuevo Desarrollador
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
                                    <h6 class="fw-semibold mb-0">Habilidades</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Salario</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Proyecto_asignado</h6>
                                </th>
                               
                            </tr>
                        </thead>
                        <tbody id="tabla_desarrolladores">

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
<div class="modal fade" id="Modal_desarrolladores" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="frm_desarrolladores">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Desarrolladores</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <input type="hidden" name="ID_desarrollador" id="ID_desarrollador">



                    <div class="form-group">
                        <label for="Nombre">Nombre del Desarrollador</label>
                        <input type="text" required class="form-control" id="Nombre" name="Nombre" placeholder="Nombre">

                    </div>
                    <div class="form-group">
                        <label for="Habilidades">Habilidad del desarrollador</label>
                        <input type="text" required class="form-control" id="Habilidades" name="Habilidades" placeholder="Ingrese la habilidad del desarrollador">
                                               
                    </div>
                    <div class="form-group">
                        <label for="Salario">Ingrese el salario</label>
                        <input type="text" required class="form-control" id="Salario" name="Salario" placeholder="Ingrese el salario del desarrollador">               
                    </div>
                    <div class="form-group">
                        <label for="Proyecto_asignado">Ingrese el proyecto asignado</label>
                        <input type="text" required class="form-control" id="Proyecto_asignado" name="Proyecto_asignado" placeholder="Ingrese el proyecto asignado">
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

<script src="desarrolladores.js"></script>