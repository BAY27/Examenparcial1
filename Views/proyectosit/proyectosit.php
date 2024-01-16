<?php require_once('../html/head2.php') ?>




<div class="row">

    <div class="col-lg-8 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">Lista de Proyectos</h5>

                <div class="table-responsive">
                    <button type="button" onclick="cargaProyectosit()" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal_proyectosit">
                        Nuevo Poyecto
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
                                    <h6 class="fw-semibold mb-0">Tecnologia</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Fecha Inicio</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Fecha Fin</h6>
                                </th>
                                
                            </tr>
                        </thead>
                        <tbody id="tabla_proyectosit">

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
<div class="modal fade" id="Modal_proyectosit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="frm_proyectosit">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Proyectos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <input type="hidden" name="ID_proyecto" id="ID_proyecto">

                   
                    <div class="form-group">
                        <label for="Nombre">Nombre del proyecto</label>
                        <input type="text" required class="form-control" id="Nombre" name="Nombre" placeholder="Ingrese el Nombre de proyecto">
                    </div>
                    <div class="form-group">
                        <label for="Tecnologia">Nombre de la tecnologia</label>
                        <input type="text" required class="form-control" id="Tecnologia" name="Tecnologia" placeholder="Ingrese el Nombre de de Tecnologia">
                    </div>
                    
                    <div class="form-group">
                        <label for="Fecha_inicio">Fecha de inicio</label>
                        <input type="date" required class="form-control" id="Fecha_inicio" name="Fecha_inicio" placeholder="Seleccione la feche de inicio">
                    </div>
                    <div class="form-group">
                        <label for="Fecha_fin">Fecha de fin</label>
                        <input type="date" required class="form-control" id="Fecha_fin" name="Fecha_fin" placeholder="Ingrese la fecha de fin de proyecto">
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

<script src="proyectosit.js"></script>