<?php
// src/views/VCategoria.php

class VCategoria
{
    public function render($categorias, $editingCategoria = null)
    {
        include(__DIR__ . '/index.php');

        ?>
        <div class="container mt-5">
            <h1>Categorías</h1>
            <form method="post" action="">
                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo $editingCategoria ? $editingCategoria->descripcion : ''; ?>" required>
                    <?php if ($editingCategoria): ?>
                        <input type="hidden" name="id" value="<?php echo $editingCategoria->id; ?>">
                    <?php endif; ?>
                </div>
                <?php if ($editingCategoria): ?>
                    <button type="submit" name="update" class="btn btn-primary">Actualizar</button>
                <?php else: ?>
                    <button type="submit" name="create" class="btn btn-primary">Crear</button>
                <?php endif; ?>
            </form>

            <table class="table mt-4">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Descripción</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($categorias as $categoria): ?>
                        <tr>
                            <td><?php echo $categoria->id; ?></td>
                            <td><?php echo $categoria->descripcion; ?></td>
                            <td>
                                <a href="?controller=categoria&edit=<?php echo $categoria->id; ?>" class="btn btn-warning">Editar</a>
                                <form method="post" action="" style="display:inline;">
                                    <input type="hidden" name="id" value="<?php echo $categoria->id; ?>">
                                    <button type="submit" name="delete" class="btn btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php
    }
}
?>
