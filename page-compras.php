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
                        <?php
                        $sql_compras = "SELECT * FROM purchases";
                        $result_compras = $conexao->query($sql_compras);
                        ?>

                        <?php
                        if ($result_compras->num_rows > 0) {
                            while ($row_compra = $result_compras->fetch_assoc()) {
                                $id_purchase = $row_compra["id_purchase"];
                                $date_purchase = $row_compra["date_purchase"];
                                $total_purchase = $row_compra["total_purchase"];

                                $sql_itens = "SELECT purchases_items.*, products.description FROM purchases_items JOIN products ON purchases_items.id_product = products.id WHERE id_purchase = $id_purchase";
                                $result_itens = $conexao->query($sql_itens);
                        ?>
                                <div class="card">
                                    <div class="col-md-12 card-header d-flex justify-content-between">
                                        <h5 class="-b-0 text-white col-md-3">Compra #<?php echo $id_purchase; ?></h5>
                                        <h5 class="-b-0 text-white col-md-3 text-right"><?php echo $date_purchase; ?></h5>
                                    </div>

                                    <div class="table-responsive">
                                        <table id="product-table" class="table">
                                            <thead>
                                                <tr>
                                                    <th>Descrição</th>
                                                    <th>Qtd.</th>
                                                    <th>Valor Unitário</th>
                                                    <th>Total</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if ($result_itens->num_rows > 0) {
                                                    while ($row_item = $result_itens->fetch_assoc()) {
                                                        $description = $row_item["description"];
                                                        $quantity = $row_item["quantity"];
                                                        $price = $row_item["price"];
                                                        $total = $quantity * $price;

                                                        // float para R$
                                                        $price_formatted = "R$" . number_format($price, 2, ',', '.');
                                                        $total_formatted = "R$" . number_format($total, 2, ',', '.');
                                                        $total_purchase_formatted = "R$" . number_format($total_purchase, 2, ',', '.');

                                                ?>
                                                        <tr>
                                                            <td><?php echo $description; ?></td>
                                                            <td><?php echo $quantity; ?></td>
                                                            <td><?php echo $price_formatted; ?></td>
                                                            <td><?php echo $total_formatted; ?></td>
                                                            <th>
                                                                <span class="<?php
                                                                                if ($row_item['status'] == 'Em trânsito') {
                                                                                    echo 'text-success';
                                                                                } elseif ($row_item['status'] == 'Cancelado') {
                                                                                    echo 'text-danger';
                                                                                } else {
                                                                                    echo 'text-white';
                                                                                }
                                                                                ?>">
                                                                    <?php echo $row_item['status']; ?>
                                                                </span>
                                                            </th>


                                                        </tr>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="4" style="text-align:right">Total:</th>
                                                    <th><?php echo $total_purchase_formatted; ?></th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                        <?php
                            }
                        } else {
                            echo "<p>Nenhuma compra encontrada.</p>";
                        }
                        ?>



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