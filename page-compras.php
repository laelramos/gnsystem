<?php
require_once('conexao.php');
require('_validacao.php');
?>

<!DOCTYPE html>
<html dir="ltr" lang="pt-br">

<head>
    <?php require('layout-head.php') ?>
    <!--This page CSS -->
    <link href="assets/libs/footable/css/footable.bootstrap.min.css" rel="stylesheet">

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
                        <h4 class="page-title">Compras</h4>
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
                <!-- Column -->
                <div class="row show-grid">
                    <div class="col-12">
                        <div class="card">
                            <div class="col-md-12 card-header d-flex justify-content-between">
                                <h5 class="-b-0 text-white col-md-3">Compra #002</h5>
                                <h5 class="-b-0 text-white col-md-3 text-right">00/00/00 | Em trânsito</h5>
                            </div>

                            <div class="table-responsive">
                                <table id="product-table" class="table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Descrição</th>
                                            <th>Quantidade</th>
                                            <th>EAN</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>15</td>
                                            <td>Produto 1</td>
                                            <td>1</td>
                                            <td>000000000000</td>
                                            <td>R#150,00</td>
                                        </tr>
                                        <tr>
                                            <td>15</td>
                                            <td>Produto 2</td>
                                            <td>1</td>
                                            <td>000000000000</td>
                                            <td>R#150,00</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="card">
                            <div class="col-md-12 card-header d-flex justify-content-between">
                                <h5 class="-b-0 text-white col-md-3">Compra #001</h5>
                                <h5 class="-b-0 text-white col-md-3 text-right">00/00/00 | Finalizado</h5>
                            </div>

                            <div class="table-responsive">
                                <table id="product-table" class="table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Descrição</th>
                                            <th>Quantidade</th>
                                            <th>EAN</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>15</td>
                                            <td>Produto 1</td>
                                            <td>1</td>
                                            <td>000000000000</td>
                                            <td>R#150,00</td>
                                        </tr>
                                        <tr>
                                            <td>15</td>
                                            <td>Produto 2</td>
                                            <td>1</td>
                                            <td>000000000000</td>
                                            <td>R#150,00</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- Column -->
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

    </div> <!-- nao sei de onde vem essa div -->
    </div> <!-- nao sei de onde vem essa div -->


    <!-- ============================================================== -->
    <!-- customizer Panel -->
    <!-- ============================================================== -->

    <div class="chat-windows"></div>


    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <?php
    require('layout-jQuerry.php');
    ?>

    <!--This page JavaScript -->
    <script src="assets/libs/moment/moment.js" type="text/javascript"></script>
    <script src="assets/libs/footable/js/footable.min.js"></script>
    <script src="dist/js/pages/tables/footable-init.js"></script>

</body>

</html>