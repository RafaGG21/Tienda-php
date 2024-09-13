<form action="<?= base_url ?>producto/save" method="post" enctype="multipart/form-data">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" />

    <label for="descripcion">Descripción</label>
    <textarea  name="descripcion" ></textarea>

    <label for="precio">Precio</label>
    <input type="text" name="precio" />

    <label for="oferta">¿Está en oferta? </label>
    <input type="radio" name="oferta" value="1">
    Sí
    </label>
    <label>
        <input type="radio" name="oferta" value="0">
        No
    </label>
    <label for="stock">Cuantos items en stock?</label>
    <input type="number" name="stock" />
    <label for="categoria">Categoria</label>
    <?php $categorias = Utils::getCategorias(); ?>
    <select name="categoria">
    <?php while ($categoria = $categorias->fetch_object()): ?>
        <option value="<?=$categoria->id?>" >
        <?=$categoria->nombre?>
        </option>
    <?php endWhile; ?>
    </select>
    <input type="file" name="imagen" style="margin-top:10px;" />
    <input type="submit" value="Enviar" />
</form>



</form>