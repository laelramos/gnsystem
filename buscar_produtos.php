<?php
require_once('conexao.php');

try {
    $sql = "SELECT p.id, p.description, c.name as category_name, p.id_categorie, p.manufacturer, p.franchise, p.ean FROM products p INNER JOIN categories c ON p.id_categorie = c.id_categorie";
    $result = $conexao->query($sql);

    if ($result->num_rows > 0) {
        $products = array();
        while ($row = $result->fetch_assoc()) {
            $products[] = array(
                "id" => $row["id"],
                "description" => $row["description"],
                "category_name" => $row["category_name"],
                "id_categorie" => $row["id_categorie"],
                "manufacturer" => $row["manufacturer"],
                "franchise" => $row["franchise"],
                "ean" => $row["ean"]
            );
        }
        echo json_encode($products);
    } else {
        echo json_encode(array());
    }
} catch (Exception $e) {
    echo json_encode(array("error" => $e->getMessage()));
}

$conexao->close();
?>
