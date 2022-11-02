<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['name'])) {
    header('location: login.php');
}

if (!isset($_SESSION['add_to_cart'])) {
    $_SESSION['add_to_cart'] = array();
}

if (isset($_GET['add_to_cart'])){
    $currentQuantity = 0;
    if (isset($_SESSION['add_to_cart'][$_GET['add_to_cart']])){
        $currentQuantity = $_SESSION['add_to_cart'][$_GET['add_to_cart']];
    }
    $_SESSION['add_to_cart'][$_GET['add_to_cart']] = $currentQuantity +1;
}

?>

<?php require 'inc/data/products.php'; ?>
<?php require 'inc/head.php'; ?>

<section class="cookies container-fluid">
    <div class="row">
        <?php foreach ($catalog as $id => $cookie) { ?>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <figure class="thumbnail text-center">
                    <img src="assets/img/product-<?= $id; ?>.jpg" alt="<?= $cookie['name']; ?>" class="img-responsive">
                    <figcaption class="caption">
                        <h3><?= $cookie['name']; ?></h3>
                        <p><?= $cookie['description']; ?></p>
                        <a href="?add_to_cart=<?= $id ?>" class="btn btn-primary">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add to cart
                        </a>
                    </figcaption>
                </figure>
            </div>
        <?php } ?>
    </div>
</section>
<?php require 'inc/foot.php'; ?>
