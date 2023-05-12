<?php
require_once('conexao.php');

$paymentMethod = $_POST['paymentMethod'];
$vendor = $_POST['vendor'];
$date = $_POST['date'];
$cartItems = json_decode($_POST['cartItems'], true);

$query = "INSERT INTO purchases (date_purchase, id_vendor, total_purchase, id_method) VALUES ('$date', '$vendor', '$total', '$paymentMethod')";
$result = mysqli_query($conexao, $query);

if (!$result) {
    die("Falha na consulta ao banco de dados: " . mysqli_error($conexao));
}

$id_purchase = mysqli_insert_id($conexao);

foreach ($cartItems as $item) {
    $id_product = $item['id_product'];
    $quantity = $item['quantity'];
    $price = $item['price'];
    $status = "Em Trânsito";

    $query = "INSERT INTO purchases_items (id_purchase, id_product, quantity, price, status) VALUES ('$id_purchase', '$id_product', '$quantity', '$price', '$status')";
    $result = mysqli_query($conexao, $query);

    if (!$result) {
        die("Falha na consulta ao banco de dados: " . mysqli_error($conexao));
    }
}

echo "Pedido finalizado com sucesso!";

?>
