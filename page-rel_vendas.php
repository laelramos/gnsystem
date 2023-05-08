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
                        <h4 class="page-title">Vendas</h4>
                    </div>
                </div>
            </div>
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->


            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <div class="container-fluid">

                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <div class="table-responsive">
                                    <table class="table">
                                        <div class="card-header bg-dark">
                                            <h5 class="m-b-0 text-white">Compra #id_sale</h5>
                                            <h5 class="m-b-0 text-right">08/05/2023 | Finalizado</h5>
                                        </div>
                                        <thead class=".bg-dark .text-white">
                                            <th>ID</th>
                                            <th>Descrição</th>
                                            <th>Categoria</th>
                                            <th>Fabricante</th>
                                            <th>Franquia</th>
                                            <th>EAN</th>
                                            <th>Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>

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

    </script>



</body>

</html>