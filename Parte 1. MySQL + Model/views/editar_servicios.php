<form action="index.php?controller=servicio&action=guardar" method="POST">
    <?php if(isset($item)): ?>
        <input type="hidden" name="id_servicio" value="<?= $item['id_servicio'] ?>">
    <?php endif; ?>

    <div class="mb-3">
        <label>Nombre del Servicio</label>
        <input type="text" name="nombre" class="form-control" value="<?= $item['nombre_servicio'] ?? '' ?>" required>
    </div>
    <div class="mb-3">
        <label>Precio (€)</label>
        <input type="number" step="0.01" name="precio" class="form-control" value="<?= $item['precio'] ?? '' ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Actualizar</button>
</form>