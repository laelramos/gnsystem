<?php
// Conecte-se ao banco de dados
require_once('conexao.php');

// Receba o ID do produto a ser excluído
$id = $_POST["id"];

// Execute a consulta SQL para excluir o produto
$sql = "DELETE FROM products WHERE id = $id";

if ($conexao->query($sql) === TRUE) {
  echo "Produto excluído com sucesso!";
  header("location: page-produtos.php");
} else {
  echo "Erro ao excluir o produto: " . $conexao->error;
}

// Feche a conexão com o banco de dados
$conexao->close();
?>
