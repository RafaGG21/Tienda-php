<?php while ($product = $products->fetch_object()): ?>
    <div class="product">
        <img src="<?=base_url?>\uploads\images\<?=$product->imagen?>" />
        <h2><?= $product->nombre?></h2>
        <p><?=$product-> descripcion?> €</p>
        <p><?=$product-> precio?> €</p>
        <p><?=$product-> stock?></p>
        <p><?=$product-> oferta?> </p>
        <a href="" class="button" style="width: 120px; margin: 0 auto;">Comprar</a>
        <a href="<?= base_url?>product/ver&id=<?=$product->id?>">Ver </a>
    </div>
<?php endwhile; ?>