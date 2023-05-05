<?php
require_once('conexao.php');
require('_validacao.php');
?>

<!DOCTYPE html>
<html dir="ltr" lang="pt-br">

<head>
    <?php require('layout-head.php') ?>
    <!--This page CSS -->

</head>

<body>

    <div id="main-wrapper">

        <?php require('layout-menu.php'); ?>


        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <div class="page-wrapper">

            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Produtos</h4>
                    </div>
                </div>
            </div>
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->


            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <button id="addRow" class="btn btn-success mb-2" data-toggle="modal" data-target="#new-product-modal"><i class="fas fa-plus"></i>&nbsp; Adicionar</button>


                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <div class="table-responsive">
                                    <?php
                                    // consulta SQL para recuperar os dados da tabela
                                    $sql = "SELECT p.id, p.description, c.name as categorie, p.manufacturer, p.franchise, p.ean
                                            FROM products p
                                            LEFT JOIN categories c ON p.id_categorie = c.id_categorie";

                                    // executa a consulta
                                    $result = $conexao->query($sql);

                                    // verifica se há resultados
                                    if ($result->num_rows > 0) {
                                        // gera a tabela com base nos resultados da consulta
                                        echo '<table class="table">';
                                        echo '<thead class=".bg-dark .text-white">';
                                        echo '<tr>';
                                        echo '<th>ID</th>';
                                        echo '<th>Descrição</th>';
                                        echo '<th>Categoria</th>';
                                        echo '<th>Fabricante</th>';
                                        echo '<th>Franquia</th>';
                                        echo '<th>EAN</th>';
                                        echo '<th>Ações</th>';
                                        echo '</tr>';
                                        echo '</thead>';
                                        echo '<tbody>';

                                        // itera sobre cada linha de resultado e gera uma nova linha na tabela HTML
                                        while ($row = $result->fetch_assoc()) {
                                            echo '<tr>';
                                            echo '<td>' . $row["id"] . '</td>';
                                            echo '<td>' . $row["description"] . '</td>';
                                            echo '<td>' . $row["categorie"] . '</td>';
                                            echo '<td>' . $row["manufacturer"] . '</td>';
                                            echo '<td>' . $row["franchise"] . '</td>';
                                            echo '<td>' . $row["ean"] . '</td>';
                                            echo '<td>
                                                    <button type="button" class="btn waves-effect waves-light btn-info" data-id="' . $row["id"] . '" onclick="editarProduto(this)"><i class="mdi mdi-pencil"></i> </button>
                                                    <button type="button" class="btn waves-effect waves-light btn-danger" onclick="excluirProduto(' . $row['id'] . ')"><i class="mdi mdi-delete"></i> </button>
                                                  </td>';

                                            echo '</tr>';
                                        }

                                        echo '</tbody>';
                                        echo '</table>';
                                    } else {
                                        echo 'Não há resultados para exibir.';
                                    }

                                    // fecha a conexão com o banco de dados
                                    $conexao->close();
                                    ?>
                                </div>


                            </div>
                        </div>
                    </div>
                    <!-- End Page Content -->
                    <!-- ============================================================== -->
                </div>
                <!-- End Container fluid  -->
                <!-- ============================================================== -->
            </div>
            <!-- End Page wrapper  -->
            <!-- ============================================================== -->



            <!-- ============================================================== -->
            <!-- footer -->
            <?php require('layout-footer.php'); ?>
            <!-- End footer -->
            <!-- ============================================================== -->

        </div>
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->

    </div>


    <!-- ============================================================== -->
    <!-- customizer Panel -->
    <!-- End customizer Panel -->
    <!-- ============================================================== -->

    <div class="chat-windows"></div>

    <?php
    require('modals.php');
    ?>

    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <?php
    require('layout-jQuerry.php');
    ?>


    <!--This page JavaScript -->
    <!-- excluir produto -->
    <script>
        function excluirProduto(id) {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "excluir_produto.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    location.reload(); // recarrega a página após a exclusão
                }
            }
            xhr.send("id=" + id);
        }
    </script>


    <script>
        function salvarProduto() {
            // obtém os valores dos campos do modal
            var id = document.getElementById("modal-id").value;
            var descricao = document.getElementById("modal-descricao").value;
            var categoria = document.getElementById("modal-categoria").value;
            var fabricante = document.getElementById("modal-fabricante").value;
            var franquia = document.getElementById("modal-franquia").value;
            var ean = document.getElementById("modal-ean").value;

            // faz uma requisição AJAX para atualizar o produto no banco de dados
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // recarrega a página para exibir os dados atualizados
                    location.reload();
                }
            };
            xhr.open("POST", "atualizar_produto.php");
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send("id=" + id + "&descricao=" + descricao + "&categoria=" + categoria + "&fabricante=" + fabricante + "&franquia=" + franquia + "&ean=" + ean);
        }
    </script>


    <script>
        function editarProduto(botao) {
            var id = botao.getAttribute("data-id");

            // faz uma requisição AJAX para buscar os dados do produto
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    console.log(xhr.responseText);
                    var produto = JSON.parse(xhr.responseText);

                    // preenche os campos do modal com os dados do produto
                    document.getElementById("modal-id").value = produto.id;
                    document.getElementById("modal-descricao").value = produto.description;
                    document.getElementById("modal-categoria").value = produto.category_name;
                    document.getElementById("modal-fabricante").value = produto.manufacturer;
                    document.getElementById("modal-franquia").value = produto.franchise;
                    document.getElementById("modal-ean").value = produto.ean;

                    // abre o modal do Bootstrap
                    $("#modal-editar").modal("show");
                }
            };
            xhr.open("GET", "buscar_produtos_editar.php?id=" + id);
            xhr.send();
        }
    </script>



</body>

</html>