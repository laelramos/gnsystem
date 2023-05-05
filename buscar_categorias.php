<?php

require_once('conexao.php');

$sql = "SELECT id_categorie, name FROM categories";
$result = $conexao->query($sql);

$categorias = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $categorias[] = $row;
    }
}

echo json_encode($categorias);

$conexao->close();

?>
