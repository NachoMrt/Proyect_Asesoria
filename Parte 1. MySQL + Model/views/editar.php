<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= isset($item) ? 'Editar' : 'Nuevo' ?> Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4><?= isset($item) ? 'Modificar Datos del Cliente' : 'Registrar Nuevo Cliente' ?></h4>
        </div>
        <div class="card-body">
            <form action="index.php?controller=cliente&action=guardar" method="POST">
                <?php if(isset($item)): ?>
                    <input type="hidden" name="id_cliente" value="<?= $item['id_cliente'] ?>">
                <?php endif; ?>

                <div class="mb-3">
                    <label class="form-label">Nombre Completo</label>
                    <input type="text" name="nombre" class="form-control" value="<?= $item['nombre'] ?? '' ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">DNI/E</label>
                    <input type="text" name="dnie" class="form-control" value="<?= $item['dnie'] ?? '' ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Correo Electrónico</label>
                    <input type="email" name="email" class="form-control" value="<?= $item['email'] ?? '' ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Teléfono</label>
                    <input type="text" name="telefono" class="form-control" value="<?= $item['telefono'] ?? '' ?>">
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-success">Guardar Cambios</button>
                    <a href="index.php?controller=cliente&action=index" class="btn btn-secondary">Volver al listado</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>