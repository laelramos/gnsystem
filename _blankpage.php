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

            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h1>eu sou uma pagina em branco</h1>
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

    </div>  <!-- nao sei de onde vem essa div -->
    </div>  <!-- nao sei de onde vem essa div -->


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


</body>

</html>