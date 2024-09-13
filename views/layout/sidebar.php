<aside id="lateral" style="width: 12%;">
    <div id="login" class="block_aside">

        <?php if (!isset($_SESSION['identity'])): ?>
            <form action="<?= base_url ?>usuario/login" method="post">
                <label for="email">Email</label>
                <input type="email" name="email" />
                <label for="password">Password</label>
                <input type="password" name="contra" />
                <input type="submit" value="Enviar" />
            </form>

            <ul>
                <li>
                    <a href="<?= base_url ?>usuario/registro">Registro</a>
                </li>
            </ul>
        <?php else: ?>
            <?= $_SESSION['identity']->nombre ?>
            <ul>
                <li>
                    <a href="">Mis pedidos</a>
                </li>
                <li>
                    <a href="">Gestionar pedidos</a>
                </li>
                <li>
                    <a href="<?= base_url ?>producto/add">Gestionar productos</a>
                </li>
                <li>
                    <a href="<?= base_url ?>categoria/add">Gestionar categorías</a>
                </li>
                <li>
                    <a href="<?= base_url ?>usuario/logout">Cerrar sesión</a>
                </li>
            </ul>


        <?php endif; ?>


    </div>


</aside>
<div id="central" style="width: 82%; ">