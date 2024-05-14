<?php

require './modelos/cliente.php';

// consulta
try {
    $_GET['cli_nombre'] = htmlspecialchars($_GET['cli_nombre']);
    $_GET['cli_apellido'] = filter_var($_GET['cli_apellido']);
    $_GET['cli_nit'] = filter_var($_GET['cli_nit'], FILTER_VALIDATE_INT);

    $Cli_Consulta = new Cliente($_GET);
    $clienteConsulta = $Cli_Consulta->buscar();
    $resultado = [
        'mensaje' => 'Datos encontrados',
        'datos' => $clienteConsulta,
        'codigo' => 1
    ];
} catch (Exception $e) {
    $resultado = [
        'mensaje' => 'OCURRIO UN ERROR EN LA EJECUCIÓN',
        'detalle' => $e->getMessage(),
        'codigo' => 0
    ];
}
$alertas = ['danger', 'success', 'warning'];

include_once '../../vistas/templates/header.php'; ?>

<div class="row justify-content-center">
    <div class="col-lg-6 alert alert-<?=$alertas[$resultado['codigo']] ?>" role="alert">
        <?= $resultado['mensaje'] ?>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-lg-6">
        <a href="../../vistas/clientes/index.php" class="btn btn-primary w-100">Regresar</a>
    </div>
</div>
<!-- Se imprime los resultados -->
<h1 class="text-center">Clientes Ingresados </h1>
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <table class="table table-bordered table-hover">
                <thead> 
                    <tr>
                        <th>No.</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>NIT</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($resultado['codigo'] == 1 && count($clienteConsulta) > 0) : ?>
                        <?php foreach ($clienteConsulta as $key => $producto) : ?>
                            <tr>
                                <td><?= $key + 1?></td>
                                <td><?= $clienteConsulta['cli_nombre'] ?></td>
                                <td><?= $clienteConsulta['cli_apellido'] ?></td>
                                <td><?= $clienteConsulta['cli_nit'] ?></td>
                                <td class="text-center">
                                <div class="dropdown">
                                    <button class="btn btn-info dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Acciones
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#"><i class="bi bi-pencil-square me-2"></i>Modificar</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="bi bi-trash me-2"></i>Eliminar</a></li>
                                    </ul>
                                </div>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="4">No hay productos registrados</td>
                        </tr>  
                    <?php endif ?>
                </tbody>
                        
            </table>
        </div>        
    </div>        

<?php include_once '../../vistas/templates/footer.php'; ?>  
