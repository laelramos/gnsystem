<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('conexao.php');

if (isset($_GET["id"])) {
    $id = intval($_GET["id"]);

    // Consulta SQL para buscar os dados do produto junto com a coluna 'name' da tabela 'categories'
    $sql = "SELECT products.id, products.description, categories.name as category_name, products.manufacturer, products.franchise, products.ean
    FROM products
    JOIN categories ON products.id_category = categories.id_category
    WHERE products.id = ?";


    $stmt = $conexao->prepare($sql);
    if ($stmt === false) {
        die("Erro ao preparar a consulta: " . $conexao->error);
    }

    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Retorna o resultado como um objeto JSON
        $produto = $result->fetch_assoc();
        echo json_encode($produto);
    } else {
        echo "Produto não encontrado";
    }

    $stmt->close();
} else {
    echo "ID do produto não fornecido";
}

$conexao->close();

?>
