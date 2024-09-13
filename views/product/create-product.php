<form action="<?= base_url ?>producto/save" method="post" enctype="multipart/form-data">
    <label for="name">Nombre</label>
    <input type="text" name="name" />

    <label for="description">Descripción</label>
    <textarea  name="description" ></textarea>

    <label for="price">Precio</label>
    <input type="text" name="price" />

    <label for="offer">¿Está en oferta? </label>
    <input type="radio" name="offer" value="1">
    Sí
    </label>
    <label>
        <input type="radio" name="offer" value="0">
        No
    </label>
    <label for="stock">Cuantos items en stock?</label>
    <input type="number" name="stock" />
    <label for="category">Categoria</label>
    <?php $categories = Utils::getCategories(); ?>
    <select name="categoria">
    <?php while ($category = $categories->fetch_object()): ?>
        <option value="<?=$category->id?>" >
        <?=$category->nombre?>
        </option>
    <?php endWhile; ?>
    </select>
    <input type="file" name="image" style="margin-top:10px;" />
    <input type="submit" value="Enviar" />
</form>



</form>