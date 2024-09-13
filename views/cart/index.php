<h1>Carrito</h1>

<table>
    <tr>
        <th>Imagen</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Unidades</th>    
    
    </tr>
    <?php if(!empty($cart)): ?>
        <?php 
         foreach ($cart  as $key => $element) : 
            $product = $element['product'];
        ?> 
            <tr>
                <td><img width="80px" height="80px" src="<?=base_url ?>uploads/images/<?=$product->imagen?>" ?></td>
                <td><?= $product->precio ?></td>
                <td><?= $product->nombre ?></td>
                <td><?= $element['number'] ?></td>
            </tr>
        
        <?php endforeach; ?>
    <?php endif; ?>
        
</table>
