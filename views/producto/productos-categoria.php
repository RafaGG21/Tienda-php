<?php while ($producto = $productos->fetch_object()): ?>
    <div class="product">
        <img src="<?=base_url?>\uploads\images\<?=$producto->imagen?>" />
        <h2><?= $producto->nombre?></h2>
        <p><?=$producto-> descripcion?> €</p>
        <p><?=$producto-> precio?> €</p>
        <p><?=$producto-> stock?></p>
        <p><?=$producto-> oferta?> </p>
        <a href="" class="button" style="width: 120px; margin: 0 auto;">Comprar</a>
        <a href="<?= base_url?>producto/ver&id=<?=$producto->id?>">Ver </a>
    </div>
<?php endwhile; ?>