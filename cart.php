
<?php require 'inc/head.php'; ?>
<?php require 'inc/data/products.php'; ?>



<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['name'])) {
    header('location: login.php');
}

if (isset($_SESSION['add_to_cart'])) {
    $cart = $_SESSION['add_to_cart'];
}


?>

<section class="cookies container-fluid">
    <div class="row">
        <ul>
            <?php foreach ($cart as $id => $qty) : ?>

               <li>Produit: <?= $id; ?> </li>
               <li>Quantité: <?= $qty; ?> </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>
<?php require 'inc/foot.php'; ?>