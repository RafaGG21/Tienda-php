<h1>Registro</h1>

<?php if (isset($_SESSION['register']) && $_SESSION['register'] == 'completed'): ?>
    <strong>Registro completado correctamente</strong>
<?php elseif (isset($_SESSION['register']) && $_SESSION['register'] == 'failed'):?>
    <strong>Registro fallido</strong>
<?php endif;?>
<?php Utils::deleteSession('register'); ?>

<form action="<?=base_url?>usuario/save" method="post">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" />

    <label for="apellidos">Apellidos</label>
    <input type="text" name="apellidos" />

    <label for="email">Email</label>
    <input type="email" name="email" />

    <label for="contra">Password</label>
    <input type="password" name="contra" />
    
    <input type="submit" value="Enviar" />


</form>