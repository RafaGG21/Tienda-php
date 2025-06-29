
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Tienda de camisetas</title>
        <link rel="stylesheet" href="<?=base_url?>assets/css/styles.css">
    </head>
    <body>
        <header id="header">
            <div id="logo">
                <img src="<?=base_url?>assets/img/camiseta.png" alt="camiseta logo"/>
                <a href="index.php">Tienda de camisetas </a>
            </div>
        </header>
        <nav id="menu">
        <?php  session_start(); ?>
            <ul>
                <li>
                    <a href="">Inicio</a>
                </li>
                <?php  $categories = Utils::getCategories(); ?>
               
                <?php while ($category = $categories->fetch_object()): ?>
                    <li>
                     <a href="<?= base_url ?>product/getProductsByCategory&category=<?= $category->nombre?>"><?= $category->nombre?></a> 
                    </li>
                <?php endwhile; ?>
            </ul>
        </nav>
        <div id="content">