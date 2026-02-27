<head>
    <meta charset="UTF-8">
    <title>Acceso a API-REST</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
</head>


<nav class="nav-api sticky-top bg-dark p-3">
    <div class="container d-flex justify-content-between text-white">
        <span class="fw-bold">API-REST Home</span>
        <ul class="d-flex gap-3 list-unstyled mb-0">
            <li><a href="asesores" class="text-white">Asesores</a></li>
            <li><a href="#clientes" class="text-white">Clientes</a></li>
            <li><a href="#servicios" class="text-white">Servicios</a></li>
            <li><a href="#facturas" class="text-white">Facturas</a></li>
        </ul>
    </div>
</nav>

<div class="container mt-5">
    <section id="servicios" class="mb-5">
        <div class="card p-4 shadow-sm">
            <h3><i class="bi bi-gear-fill"></i> Servicios</h3>
            <table class="table">
                <thead><tr><th>ID</th><th>Nombre</th><th>Precio</th><th>Opciones</th></tr></thead>
                <tbody class="tbody_container"></tbody>
            </table>
        </div>
    </section>

    <section id="facturas" class="mb-5">
        <div class="card p-4 shadow-sm border-primary">
            <h2 class="text-primary mb-4"><i class="bi bi-file-earmark-spreadsheet"></i> Gestión de Facturas</h2>
            <div class="row">
                <div class="col-md-8">
                    <h5>Historial de Facturación</h5>
                    <div class="table-responsive">
                        <table class="table table-sm">
                            <thead><tr><th>ID</th><th>Cliente</th><th>Total</th><th>Acciones</th></tr></thead>
                            <tbody id="lista-facturas"></tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="bg-light p-3 rounded">
                        <h6>Nueva Factura</h6>
                        <form id="form-factura">
                            <input type="number" id="f-id_cliente" class="form-control mb-2" placeholder="ID Cliente" required>
                            <input type="number" id="f-id_asesor" class="form-control mb-2" placeholder="ID Asesor" required>
                            <input type="number" id="f-id_servicio" class="form-control mb-2" placeholder="ID Servicio" required>
                            <input type="number" step="0.01" id="f-costo" class="form-control mb-2" placeholder="Costo (€)" required>
                            <button type="submit" class="btn btn-success w-100">Emitir Factura</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script type="module">
    import { cargarAsesores } from './assets/js/asesor.js';
    import { cargarClientes } from './assets/js/cliente.js';
    import { cargarServicios } from './assets/js/servicio.js';
    import { cargarFacturas } from './assets/js/factura.js';

    document.addEventListener('DOMContentLoaded', () => {
        cargarAsesores();
        cargarClientes();
        cargarServicios();
        cargarFacturas();
    });
</script>