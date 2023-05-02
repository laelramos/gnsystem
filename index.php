<?php
    require_once('conexao.php');
    require_once('_validacao.php');
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
                <h4 class="page-title">Home</h4>
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
        
        <?php require_once('buscar_dashboard.php');?>
            <div class="col-lg-3 col-md-6">
                <div class="card bg-success">
                    <div class="card-body">
                        <div class="d-flex no-block align-items-center">
                            <div class="text-white">
                                <h2><?php echo $total_produtos; ?></h2>
                                <h6>Produtos</h6>
                            </div>
                            <div class="ml-auto">
                                <span class="text-white display-6"><i class="ti-tag"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card bg-cyan">
                    <div class="card-body">
                        <div class="d-flex no-block align-items-center">
                            <div class="text-white">
                                <h2><?php echo $total_usuarios; ?></h2>
                                <h6>Usuários</h6>
                            </div>
                            <div class="ml-auto">
                                <span class="text-white display-6"><i class="ti-user"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
 
        </div>
        <!-- End PAge Content -->
        <!-- ============================================================== -->
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


<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<?php
    require('layout-jQuerry.php');
?>
<!--This page JavaScript -->


</body>

</html>