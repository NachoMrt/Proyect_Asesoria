<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <div class="d-flex justify-content-between mb-4">
        <h2>Listado de Clientes</h2>
        <a href="index.php?controller=cliente&action=crear" class="btn btn-primary">Nuevo Cliente</a>
    </div>
    <table class="table table-striped border">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>DNI</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($datos as $f): ?>
            <tr>
                <td><?= $f['id_cliente'] ?></td>
                <td><?= $f['nombre'] ?></td>
                <td><?= $f['dnie'] ?></td>
                <td><?= $f['email'] ?></td>
                <td><?= $f['telefono'] ?></td>
                <td>
                    <a href="index.php?controller=cliente&action=editar&id=<?= $f['id_cliente'] ?>" class="btn btn-warning btn-sm">Editar</a>
                    <a href="index.php?controller=cliente&action=eliminar&id=<?= $f['id_cliente'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro?')">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>