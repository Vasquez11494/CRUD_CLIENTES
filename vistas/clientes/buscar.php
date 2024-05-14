<?php include_once '../templates/header.php'; ?>

<h1 class="text-center">Buscar Clientes</h1>
<div class="row justify-content-center">
    <form action="../../controladores/clientes/buscar.php" method="GET" class="border bg-light shadow rounded p-4 col-lg-6">
    <div class="row mb-3">
            <div class="col">
                <label for="cli_nombre">Nombre del Cliente</label>
                <input type="text" name="cli_nombre" id="cli_nombre" class="form-control">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="cli_apellido">Apellidos del Cliente</label>
                <input type="text" name="cli_apellido" id="cli_apellido" class="form-control">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="cli_nit">No. de NIT</label>
                <input type="number" name="cli_nit" id="cli_nit" min="0" step="0.01" class="form-control">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <button type="submit" class="btn btn-info w-100"><i class="bi bi-search me-2"></i>Buscar</button>
            </div>
        </div>
    </form>
</div>

<?php include_once '../templates/footer.php'; ?>
