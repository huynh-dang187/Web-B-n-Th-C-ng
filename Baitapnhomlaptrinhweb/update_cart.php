<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['product_id'], $_POST['action'])) {
    $product_id = $_POST['product_id'];
    $action = $_POST['action'];

    if (isset($_SESSION['cart'][$product_id])) {
        switch ($action) {
            case 'increase':
                $_SESSION['cart'][$product_id]['quantity'] += 1;
                break;
            case 'decrease':
                if ($_SESSION['cart'][$product_id]['quantity'] > 1) {
                    $_SESSION['cart'][$product_id]['quantity'] -= 1;
                } else {
                    unset($_SESSION['cart'][$product_id]); 
                }
                break;
        }
    }
}

header('Location: cart.php');
exit();
?>
