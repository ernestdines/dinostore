<?php
session_start();
require '../lib/functions.php';
$id = $_GET['id'];
$product = get_product($id);
?>
<?php require 'layout/header.php'; ?>

<h1><?php echo $product['name']; ?></h1>

<div class="container">
    <div class="row">
        <div class="col-xs-3 product-list-item">
            <img src="images/<?php echo $product['image'] ?>" class="pull-left img-rounded" />
        </div>
        <div class="col-xs-6">
            <p>
                <?php echo $product['description']; ?>
            </p>

            <table class="table">
                <tbody>
                    <tr>
                        <th>Price</th>
                        <td><?php echo $product['price']; ?></td>
                    </tr>
                </tbody>
            </table>
            <form action="addtobasket.php" method="post" name="Basket_Form" class="form-basket">
                <input type="number" min=1 step=1  name="quantity" value=1>
                <button name="addtobasket" value=<?php echo $product['id'] ?> class="button" type="submit">
                        Add to basket</button>
            </form>
        </div>
    </div>
</div>


<?php require 'layout/footer.php'; ?>