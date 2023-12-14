<?php
    session_start();

    require '../lib/functions.php';

    if(isset($_POST['product_id']))
        update_basket($_POST['product_id'], $_POST['quantity']);
?>

<?php require 'layout/header.php';?>

<div class="container">

    <?php if(count_basket() == 0)
        echo('<br><h4>The basket is empty</h4>');?>
    <div class="row">
        <?php
            $basket_total = 0;
            foreach ($_SESSION['basket'] as $product_id => $quantity) {
            if($quantity > 0) {
            $product = get_product($product_id);
            $basket_total += $product['price'] * $quantity;
            ?>

            <div class="basket-list-item">
                <h4>
                    <a href="show.php?id=<?php echo $product['id'] ?>">
                    <?php echo $product['name']; ?>
                    </a>
                </h4>

                <a href="show.php?id=<?php echo $product['id'] ?>">
                    <img src="images/<?php echo $product['image']; ?>" class="img-rounded">
                </a>
                    €<?php echo $product['price']; ?>
                    <form action="" method="post" name="Basket_Form" class="form-basket">
                        <input name="quantity" type="number" min=0 step=1 value="<?php echo $quantity?>" class="form-group">
                        <button name="product_id" value=<?php echo $product_id?> class="button" type="submit">
                        Update</button>
                    </form>
            </div>
        <?php }} ?>
    </div>
    <p>Total: €<?php echo $basket_total?></p>

    <hr>

<?php require 'layout/footer.php'; ?>