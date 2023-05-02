<?php
require_once('conexao.php');
require('_validacao.php');
?>

<!DOCTYPE html>
<html dir="ltr" lang="pt-br">

<head>
    <?php require('layout-head.php') ?>
    <!--This page CSS -->
    <style>
        #search-results {
            position: absolute !important;
            z-index: 1000 !important;
            /* background-color: white !important; */
            width: 80% !important;
            //*border: 1px solid #ccc !important;*//
        }
  </style>

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
                    <h4 class="page-title">PDV</h4>
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
                            <div class="row align-items-center">
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
                                        </div>
                                        <input type="text" id="product-search" class="form-control" placeholder="buscar" aria-label="Recipient's username" aria-describedby="button-addon2">
                                    </div>
                                    <div id="search-results" class="list-group mt-2" style="display: none;">
                                    </div>
                                </div>   
                            </div>
                        </div>
                    </div>
                </div>
    
                <!-- Column -->
                <div class="col-md-9 col-lg-9">
                    <div class="card">
                        <div class="card-header bg-cyan">
                            <h5 class="m-b-0 text-white">Carrinho (4 items)</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            <table id="product-table" class="table product-overview">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Descrição</th>
                                        <th>Quantidade</th>
                                        <th>EAN</th>
                                        <th>Total</th>
                                        <th style="text-align:center">Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                                <!-- <hr> -->
                            </div>
                        </div>
                    </div>
                </div>
                    
                <!-- Column -->
                <div class="col-md-3 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">RESUMO</h5>
                            <hr>
                            <small>Valor Total</small>
                            <h2 id="total-value">R$0,00</h2>
                            <hr>
                            <button class="btn btn-success">Finalizar</button>
                            <button class="btn btn-secondary btn-danger"><i class="fa fa fa-trash"></i> Limpar</button>
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
    <script>
        $(document).ready(function () {
            console.log("Script carregado");
            let searchTimeout;

            $('#product-search').on('input keyup', function () {
                console.log("Evento input/keyup acionado");
                clearTimeout(searchTimeout);

                searchTimeout = setTimeout(function () {
                    let searchText = $('#product-search').val();
                    console.log("Texto de pesquisa: " + searchText);

                    if (searchText.length > 0) {
                        $.ajax({
                            url: 'buscar_produtos_pdv.php',
                            type: 'GET',
                            data: {
                                search: searchText
                            },
                            dataType: 'json',
                            success: function (data) {
                                console.log("Dados recebidos: ", data);
                                $('#search-results').empty();

                                if (data.length > 0) {
                                    data.forEach(function (item) {
                                        $('#search-results').append('<a href="#" class="list-group-item list-group-item-action" data-id="' + item.id + '" data-description="' + item.description + '" data-quantity="' + item.quantity + '" data-ean="' + item.ean + '">' + item.description + '</a>');
                                    });

                                    $('#search-results').show();
                                } else {
                                    $('#search-results').hide();
                                }
                            },
                            error: function (jqXHR, textStatus, errorThrown) {
                                console.log("Erro na requisição AJAX: ", textStatus, errorThrown);
                                console.log("Resposta do servidor: ", jqXHR.responseText); // Adicione essa linha
                            }
                        });
                    } else {
                        $('#search-results').hide();
                    }
                }, 300);
            });

            $('#search-results').on('click', '.list-group-item', function () {
                let productId = $(this).data('id');
                let productDescription = $(this).data('description');
                let productQuantity = $(this).data('quantity');
                let productEan = $(this).data('ean');
                let productTotal = productId * productQuantity;

                // Altere esta linha para adicionar uma nova linha em vez de sobrescrever a linha existente
                $('#product-table tbody').append('<tr><td>' + productId + '</td><td>' + productDescription + '</td><td>' + productQuantity + '</td><td>' + productEan + '</td><td>' + productTotal + '</td><td align="center"><a href="javascript:void(0)" class="text-inverse" title="" data-toggle="tooltip" data-original-title="Delete"><i class="ti-trash text-dark"></i></a></td></tr>');

                $('#search-results').hide();
            });

            function updateTotal() {
            let total = 0;

            // Percorre todas as linhas da tabela e calcula a soma dos valores na coluna total (coluna 4)
            $('#product-table tbody tr').each(function () {
                total += parseFloat($(this).find('td:eq(4)').text());
            });

            // Formata o valor total como uma string com duas casas decimais e insere no elemento com o ID 'total-value'
            $('#total-value').text('R$' + total.toFixed(2));
        }

        $('#search-results').on('click', '.list-group-item', function () {
            // ... código existente ...

            // Chama a função updateTotal para atualizar o valor total sempre que um produto for adicionado à tabela
            updateTotal();
        });

        });

    </script>



</body>

</html>