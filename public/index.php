<?php
    session_start();

    require '../lib/functions.php';

    $category = $_GET['category'];

    $products = get_products($category);

    $products = array_reverse($products);

    $cleverWelcomeMessage = 'Your one-stop dino shop!';

    $productCount = count_products();
?>

<?php require 'layout/header.php';?>

<div class="jumbotron">
    <div class="container">
        <h1><?php echo strtoupper(strtolower($cleverWelcomeMessage)); ?></h1>

        <p>With over <?php echo $productCount ?> dinosaur-related goodies!</p>
    </div>
</div>

<div class="container">
    <div class="row">
        <?php foreach ($products as $product) { ?>
            <div class="col-lg-3 product-list-item">
                <h3>
                    <a href="show.php?id=<?php echo $product['id'] ?>">
                    <?php echo $product['name']; ?>
                    </a>
                </h3>

                <a href="show.php?id=<?php echo $product['id'] ?>">
                    <div class="image-box">
                    <img src="images/<?php echo $product['image']; ?>" class="img-rounded">
                    </div>
                </a>

                <blockquote class="product-details">
                    €<?php echo $product['price']; ?>
                    <form action="addtobasket.php" method="post" name="Basket_Form" class="form-basket">
                        <button name="addtobasket" value=<?php echo $product['id'] ?> class="button" type="submit">
                        Add to basket</button>
                    </form>
                </blockquote>

                <p>
                    <?php echo $product['bio']; ?>
                </p>
            </div>
        <?php } ?>
    </div>

    <hr>

<?php require 'layout/footer.php'; ?>