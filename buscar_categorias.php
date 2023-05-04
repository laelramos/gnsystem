<?php
require_once('conexao.php');

$sql = "SELECT * FROM categories";
$result = $conexao->query($sql);

if ($result->num_rows > 0) {
    $categories = array();
    while ($row = $result->fetch_assoc()) {
        $categories[] = array(
            "id_categorie" => $row["id_categorie"],
            "name" => $row["name"]
        );
    }
    echo json_encode($categories);
} else {
    echo json_encode(array());
}

$conexao->close();
?>
