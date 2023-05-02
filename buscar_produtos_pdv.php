<?php

require('conexao.php');

$search = isset($_GET['search']) ? $_GET['search'] : '';

if (!empty($search)) {
    $query = "SELECT * FROM products WHERE description LIKE '%$search%'";

    $result = mysqli_query($conexao, $query);
    $data = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    header('Content-Type: application/json');
    echo json_encode($data);
} else {
    header('Content-Type: application/json');
    echo json_encode(array());
}
?>
