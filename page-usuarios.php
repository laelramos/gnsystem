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
                <h4 class="page-title">Usuários</h4>
            </div>
        </div>
    </div>
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->


    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <div class="container-fluid">
    <button id="addRow2" class="btn btn-success mb-2" data-toggle="modal" data-target="#modal"><i class="fas fa-plus"></i>&nbsp; Adicionar</button>
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        
                        <div class="table-responsive">
                        
                            <?php
                            // consulta SQL para recuperar os dados da tabela
                            $sql = "SELECT user, email, level FROM users";

                            // executa a consulta
                            $result = $conexao->query($sql);

                            // verifica se há resultados
                            if ($result->num_rows > 0) {
                                // gera a tabela HTML com base nos resultados da consulta
                                echo '<table class="table">';
                                echo '<thead class=".bg-dark .text-white">';
                                echo '<tr>';
                                echo '<th>Nome</th>';
                                echo '<th>Email</th>';
                                echo '<th>Nível</th>';
                                echo '<th>Ações</th>';
                                echo '</tr>';
                                echo '</thead>';
                                echo '<tbody>';

                                // itera sobre cada linha de resultado e gera uma nova linha na tabela HTML
                                while ($row = $result->fetch_assoc()) {
                                    echo '<tr>';
                                    echo '<td>' . $row["user"] . '</td>';
                                    echo '<td>' . $row["email"] . '</td>';
                                    echo '<td>' . $row["level"] . '</td>';
                                    echo '<td><button type="button" class="btn waves-effect waves-light btn-info"><i class="mdi mdi-pen"></i></button>
                                                                        <button type="button" class="btn waves-effect waves-light btn-danger"><i class="mdi mdi-delete"></i></button></td>';
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
        </div>
    </div>
        <!-- End Container fluid  -->
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


</script>


</body>

</html>