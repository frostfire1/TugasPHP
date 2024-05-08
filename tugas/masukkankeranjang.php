<?php
include "koneksi.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_produk = $_GET['id_produk'];
    $kuantitas = $_POST['kuantitas'];

    if ($kuantitas <= 0) {
        echo "Invalid quantity.";
        exit(); 
    }

    $qry_check_stock = mysqli_query($con, "SELECT stok FROM produk WHERE id_produk = '$id_produk'");
    $data_stock = mysqli_fetch_assoc($qry_check_stock);
    $stock_produk = $data_stock['stok'];
    if ($stock_produk < $kuantitas) {
        echo "Sorry, the product is out of stock.";
        exit();
    }

    $qry_get_cart = mysqli_query($con, "SELECT * FROM keranjang WHERE id_pelanggan = '".$_SESSION['id']."'");
    if (mysqli_num_rows($qry_get_cart) > 0) {
        $row = mysqli_fetch_assoc($qry_get_cart);
        $cart_items = json_decode($row['list_keranjang'], true);

        $product_found = false;
        foreach ($cart_items as &$item) {
            if ($item['id_produk'] == $id_produk) {
                $item['kuantitas'] += $kuantitas;
                $product_found = true;
                break;
            }
        }
        unset($item);

        if (!$product_found) {
            $new_item = array("id_produk" => $id_produk, "kuantitas" => $kuantitas);
            $cart_items[] = $new_item;
        }

        $json_cart_items = json_encode($cart_items);
        $update_cart_query = "UPDATE keranjang SET list_keranjang = '$json_cart_items' WHERE id_pelanggan = '".$_SESSION['id']."'";
        $update_result = mysqli_query($con, $update_cart_query);
        if ($update_result) {
            echo "Product successfully added to the cart.";
        } else {
            echo "Failed to update the cart: " . mysqli_error($con);
        }
    } else {
        $new_item = array("id_produk" => $id_produk, "kuantitas" => $kuantitas);
        $new_cart_items = array($new_item);
        $json_new_cart_items = json_encode($new_cart_items);
        $insert_cart_query = "INSERT INTO keranjang (list_keranjang, id_pelanggan) VALUES ('$json_new_cart_items', '".$_SESSION['id']."')";
        $insert_result = mysqli_query($con, $insert_cart_query);
        if ($insert_result) {
            echo "Product successfully added to the cart.";
        } else {
            echo "Failed to add product to the cart: " . mysqli_error($con);
        }
    }
} else {
    echo "Invalid access method.";
}
header("Location: keranjang.php")
?>
