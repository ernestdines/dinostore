<?php
function get_connection()
{
    $config = require 'config.php';

    $pdo = new PDO(
        $config['database_dsn'],
        $config['database_user'],
        $config['database_pass']
    );

    return $pdo;
}

function get_products($category = null, $limit=null)
{
    $pdo = get_connection();
    $query = 'SELECT * FROM product';
    if ($limit) {
        $query = $query .' LIMIT :resultLimit';
    }
    $stmt = $pdo->prepare($query);
    if ($limit) {
        $stmt->bindParam('resultLimit', $limit, PDO::PARAM_INT);
    }
    if ($category) {
        $query = $query .' WHERE category = :categoryVal';
    }
    $stmt = $pdo->prepare($query);
    if ($category) {
        $stmt->bindParam('categoryVal', $category);
    }
    $stmt->execute();

    return $stmt->fetchAll();
}

function get_product($id)
{
    $pdo = get_connection();
    $query = 'SELECT * FROM product WHERE id = :idVal';
    $stmt = $pdo->prepare($query);
    $stmt->bindParam('idVal', $id);
    $stmt->execute();

    return $stmt->fetch();
}

function count_products()
{
    $pdo = get_connection();
    $query = 'SELECT COUNT(*) FROM product';
    $stmt = $pdo->prepare($query);
    $stmt->bindParam('idVal', $id);
    $stmt->execute();

    $result = $stmt->fetch();
    $product_count = $result[0];
    $product_count = floor($product_count / 10) * 10;

    return $product_count;
}

function count_basket()
{
    $basket_total = 0;
    foreach($_SESSION['basket'] as $quantity)
        $basket_total += $quantity;

    return $basket_total;
}

function addtobasket($product_id, $quantity = 1)
{
    if(isset($_SESSION['basket'][$product_id]))
        $_SESSION['basket'][$product_id]+= $quantity;
    else
        $_SESSION['basket'][$product_id] = $quantity;
}

function update_basket($product_id, $quantity)
{
    $_SESSION['basket'][$product_id] = $quantity;
}

function check_password($username, $password)
{
    $pdo = get_connection();
    $query = 'SELECT password FROM user WHERE username = :USER';
    $statement = $pdo->prepare($query);
    $statement->bindParam('USER', $username, PDO::PARAM_STR);
    $statement->execute();
    $result = $statement->fetchAll();
    $is_correct = false;
    if($result[0]['password'] == $password) {
        $is_correct = true;
    }
    return $is_correct;
}

function user_exists($username)
{
    $pdo = get_connection();
    $query = 'SELECT COUNT(*) FROM user WHERE username = :USER';
    $statement = $pdo->prepare($query);
    $statement->bindParam('USER', $username, PDO::PARAM_STR);
    $statement->execute();
    $result = $statement->fetch();
    $exists = false;
    if($result[0] > 0) {
        $exists = true;
    }
    return $exists;
}

function escape($data) {
    $data = htmlspecialchars($data, ENT_QUOTES | ENT_SUBSTITUTE, "UTF-8");
    $data = trim($data);
    $data = stripslashes($data);
        return ($data);
}

function add_user($username, $password)
{
    $success = false;
    if(!user_exists($username)) {
        $pdo = get_connection();

        $new_user = array(
            "username" => escape($username),
            "password" => escape($password)
        );

        $query = sprintf("INSERT INTO %s (%s) values (%s)", "user",
            implode(", ", array_keys($new_user)),
            ":" . implode(", :", array_keys($new_user)));

        $statement = $pdo->prepare($query);
        $statement->execute($new_user);
        $success = true;
    }

    return $success;
}

function delete_user($username, $password)
{
    $success = false;
    if(check_password($username, $password)) {
        $pdo = get_connection();

        $query = 'DELETE FROM user WHERE username = :USER';
        $statement = $pdo->prepare($query);
        $statement->bindParam('USER', escape($username), PDO::PARAM_STR);

        $statement->execute();
        $success = true;
    }

    return $success;
}

function change_password($username, $password)
{
    $pdo = get_connection();

    $query = 'UPDATE user SET password = :PASSWORD WHERE username = :USER';
    $statement = $pdo->prepare($query);
    $statement->bindParam('USER', escape($username), PDO::PARAM_STR);
    $statement->bindParam('PASSWORD', escape($password), PDO::PARAM_STR);

    $statement->execute();
}