<h1>Registro</h1>

<?php if (isset($_SESSION['register']) && $_SESSION['register'] == 'completed'): ?>
    <strong>Registro completado correctamente</strong>
<?php elseif (isset($_SESSION['register']) && $_SESSION['register'] == 'failed'):?>
    <strong>Registro fallido</strong>
<?php endif;?>
<?php Utils::deleteSession('register'); ?>

<form action="<?=base_url?>usuario/save" method="post">
    <label for="name">Nombre</label>
    <input type="text" name="name" />

    <label for="surname">Apellidos</label>
    <input type="text" name="surname" />

    <label for="email">Email</label>
    <input type="email" name="email" />

    <label for="pass">Password</label>
    <input type="password" name="pass" />
    
    <input type="submit" value="Enviar" />


</form>