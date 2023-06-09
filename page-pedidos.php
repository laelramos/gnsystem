<?php
require_once('conexao.php');
require('_validacao.php');
?>

<!DOCTYPE html>
<html dir="ltr" lang="pt-br">

<head>
    <?php require('layout-head.php') ?>
    <!--This page CSS -->
    <link href="assets/libs/toastr/build/toastr.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

    <style>
        #search-results {
            position: absolute !important;
            z-index: 1000 !important;
            /* background-color: white !important; */
            width: 80% !important;
            /*border: 1px solid #ccc !important;*/
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
                        <h4 class="page-title">Pedidos</h4>
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

                <!-- ============================================================== -->
                <!-- Row cart-->
                <div class="row" id="row-cart">

                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-sm-11">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                                            </div>
                                            <input type="text" id="product-search" class="form-control" placeholder="buscar" aria-label="Recipient's username" aria-describedby="button-addon2">
                                        </div>
                                        <div id="search-results" class="list-group mt-2" style="display: none;">
                                        </div>
                                    </div>
                                    <button id="add-to-cart_search" class="btn btn-success">Adiconar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Column -->
                    <div class="col-md-9 col-lg-9">
                        <div class="card">
                            <div class="card-header bg-dark">
                                <h5 class="m-b-0 text-white cart-quantity">Carrinho (0 items)</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="product-table" class="table product-overview">
                                        <thead>
                                            <tr>
                                                <th>Descrição</th>
                                                <th>Quantidade</th>
                                                <th>Valor Unitário</th>
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
                                <button id="clear-cart" class="btn btn-danger"><i class="fa fa fa-trash"></i> Limpar</button>
                                <button class="btn btn-success" id="btn-detalhes-venda">Continuar</button>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- Row -->
                <!-- ============================================================== -->


                <!-- ============================================================== -->
                <!-- Row form-->
                <div class="row" id="row-form" style="display: none;">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header bg-info">
                                <h4 class="m-b-0 text-white">Detalhes do Pedido</h4>
                            </div>
                            <form class="form-horizontal r-separator">
                                <div class="form-body">
                                    <div class="card-body">
                                        <h4 class="card-title">Itens</h4>

                                    </div>


                                    <div class="card-body bg-light">
                                        <h4 class="card-title m-t-10 p-b-20">Dados adicionais</h4>

                                        <div class="form-group row p-b-15 fixed">
                                            <?php
                                            // Query para buscar todos os fornecedores na tabela 'methods_payments'
                                            $query = "SELECT name FROM methods_payment";
                                            $result = mysqli_query($conexao, $query);

                                            // Verifica se a query foi bem sucedida
                                            if (!$result) {
                                                die("Falha na consulta ao banco de dados: " . mysqli_error($conexao));
                                            }
                                            ?>
                                            <label class="col-sm-1 text-right control-label col-form-label">Pagamento:</label>
                                            <div class="col-sm-2">
                                                <select class="form-control">
                                                    <?php
                                                    // Loop através dos resultados e adiciona cada um como uma opção no dropdown
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        echo "<option>" . $row['name'] . "</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <?php
                                            // Query para buscar todos os fornecedores na tabela 'vendors'
                                            $query = "SELECT name FROM vendors";
                                            $result = mysqli_query($conexao, $query);

                                            // Verifica se a query foi bem sucedida
                                            if (!$result) {
                                                die("Falha na consulta ao banco de dados: " . mysqli_error($conexao));
                                            }
                                            ?>

                                            <label class="col-sm-1 text-right control-label col-form-label">Fornecedor:</label>
                                            <div class="col-sm-2">
                                                <select class="form-control">
                                                    <?php
                                                    // Loop através dos resultados e adiciona cada um como uma opção no dropdown
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        echo "<option>" . $row['name'] . "</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <label class="col-sm-1 text-right control-label col-form-label">Data:</label>
                                            <div class="col-sm-2">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="datepicker-autoclose" placeholder="mm/dd/yyyy">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"><i class="icon-calender"></i></span>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <!-- total -->
                                    <div class="card-body bg-light">
                                        <div class="form-group row p-b-15 fixed">
                                            <div class="col-md-11 text-right">
                                                <h3 class="card-title m-t-10 p-b-20">Total: </h4>
                                            </div>

                                            <div class="col-md-1 text-right">
                                                <h3 class="card-title m-t-10 p-b-20">R$00,00</h4>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>
                                    <div class="form-actions">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-offset-3 col-md-9">
                                                            <button type="button" class="btn btn-secondary" id="btn-fecha-detalhes">Voltar</button>
                                                            <button type="button" class="btn btn-success" id="btn-finaliza_venda">Finalizar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6"> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Row -->
                <!-- ============================================================== -->

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
    <script src="dist/js/custom.min.js"></script>
    <script src="assets/libs/toastr/build/toastr.min.js"></script>
    <script src="assets/extra-libs/toastr/toastr-init.js"></script>
    <script src="assets/libs/moment/moment.js"></script>
    <script src="assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script>
        // Date Picker
        jQuery('.mydatepicker, #datepicker, .input-group.date').datepicker();
        jQuery('#datepicker-autoclose').datepicker({
            autoclose: true,
            todayHighlight: true
        });
        jQuery('#date-range').datepicker({
            toggleActive: true
        });
        jQuery('#datepicker-inline').datepicker({
            todayHighlight: true
        });
    </script>


    <script>
        $(document).ready(function() {
            loadTableData();

            // Carrega os dados da tabela e a quantidade total do localStorage
            if (localStorage.getItem('tableData')) {
                $('#product-table tbody').html(JSON.parse(localStorage.getItem('tableData')));
                $('.cart-quantity').text('(' + JSON.parse(localStorage.getItem('cartQuantity')) + ' items)');
                updateTotal();
            }


            let searchTimeout;

            $('#product-search').on('input keyup', function() {
                if (event.which === 27) {
                    return;
                }
                clearTimeout(searchTimeout);

                searchTimeout = setTimeout(function() {
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
                            success: function(data) {
                                console.log("Dados recebidos: ", data);
                                $('#search-results').empty();

                                if (data.length > 0) {
                                    data.forEach(function(item) {
                                        $('#search-results').append('<a href="#" class="list-group-item list-group-item-action" data-id="' + item.id + '" data-description="' + item.description + '" data-quantity="' + item.quantity + '" data-ean="' + item.ean + '">' + item.description + '</a>');
                                    });

                                    $('#search-results').show();
                                } else {
                                    $('#search-results').hide();
                                }
                            },
                            error: function(jqXHR, textStatus, errorThrown) {
                                console.log("Erro na requisição AJAX: ", textStatus, errorThrown);
                                console.log("Resposta do servidor: ", jqXHR.responseText);
                            }
                        });
                    } else {
                        $('#search-results').hide();
                    }
                }, 300);
            });


            $(document).on('mousedown', '#search-results .list-group-item', function(e) {
                e.preventDefault();
                console.log('Clicou em um item');
                let productDescription = $(this).data('description');

                // Preenche os campos do modal com as informações do produto selecionado
                $('#product-description').val(productDescription);

                // Abre o modal
                $('#add-cart-modal').modal('show');
            });


            $('#add-to-cart').on('click', function() {
                let productDescription = $('#product-description').val();
                let productQuantity = $('#product-quantity').val();
                let productValue = $('#product-value').val().replace('R$', '').replace(',', '.');

                if (productValue === "") {
                    $("#product-value").addClass("is-invalid");
                } else {
                    $("#product-value").removeClass("is-invalid");

                    let productTotal = parseFloat(productQuantity) * parseFloat(productValue);

                    // Adiciona o produto à tabela
                    $('#product-table tbody').append('<tr><td>' + productDescription + '</td><td>' + productQuantity + '</td><td>R$' + parseFloat(productValue).toFixed(2).replace('.', ',') + '</td><td>R$' + productTotal.toFixed(2).replace('.', ',') + '</td><td align="center"><a href="javascript:void(0)" class="text-inverse" title="" data-toggle="tooltip" data-original-title="Delete"><i class="ti-trash text-dark"></i></a></td></tr>');

                    // Atualiza o valor total
                    updateTotal();
                    updateCartItems();

                    // Limpa os campos e oculta os resultados da pesquisa
                    $('#product-search').val('');
                    $('#search-results').hide();
                    $('#product-value').val('');
                    $('#product-quantity').val('1');

                    // Fecha o modal com um pequeno atraso para garantir que tudo foi atualizado corretamente
                    setTimeout(function() {
                        $('#add-cart-modal').modal('hide');
                    }, 100);

                    toastr.success('Produto adicionado ao carrinho!');
                }
            });


            function updateTotal() {
                let total = 0;
                let totalQuantity = 0;

                // Percorre todas as linhas da tabela e calcula a soma dos valores na coluna total (coluna 3) e a quantidade total
                $('#product-table tbody tr').each(function() {
                    total += parseFloat($(this).find('td:eq(3)').text().replace('R$', '').replace(',', '.'));
                    totalQuantity += parseInt($(this).find('td:eq(1)').text());
                });

                // Formata o valor total como uma string com duas casas decimais e insere no elemento com o ID 'total-value'
                $('#total-value').html('R$' + total.toFixed(2).replace('.', ','));

                // Atualiza a quantidade de itens no carrinho
                $('.cart-quantity').html('Carrinho (' + totalQuantity + ' items)');

                // Salva os dados da tabela e a quantidade total no localStorage
                localStorage.setItem('tableData', JSON.stringify($('#product-table tbody').html()));
                localStorage.setItem('cartQuantity', JSON.stringify(totalQuantity));
            }


            // Remover item do carrinho
            $('#product-table').on('click', '.ti-trash', function() {
                $(this).closest('tr').remove();
                updateTotal();
                saveTableData();
                updateCartItems();
            });


            function saveTableData() {
                let tableData = [];
                $('#product-table tbody tr').each(function() {
                    let rowData = {
                        description: $(this).find('td:eq(0)').text(),
                        quantity: $(this).find('td:eq(1)').text(),
                        value: $(this).find('td:eq(2)').text(),
                        total: $(this).find('td:eq(3)').text()
                    };
                    tableData.push(rowData);
                });
                localStorage.setItem('tableData', JSON.stringify(tableData));
            }


            function loadTableData() {
                console.log("loadTableData chamada");
                let tableData = JSON.parse(localStorage.getItem('tableData'));
                if (Array.isArray(tableData)) { // Verifica se tableData é um array
                    tableData.forEach(function(item) {
                        $('#product-table tbody').append('<tr><td>' + item.description + '</td><td>' + item.quantity + '</td><td>' + item.value + '</td><td>' + item.total + '</td><td align="center"><a href="javascript:void(0)" class="text-inverse" title="" data-toggle="tooltip" data-original-title="Delete"><i class="ti-trash text-dark"></i></a></td></tr>');
                    });
                    updateTotal();
                    updateCartItems();
                }
            }


            $('#clear-cart').on('click', function() {
                // Remove todas as linhas da tabela
                $('#product-table tbody tr').remove();

                // Atualiza o valor total
                updateTotal();

                // Salva os dados da tabela no localStorage
                saveTableData();
                updateCartItems();
            });


            function updateCartItems() {
                let totalItems = 0;

                // Percorre todas as linhas da tabela e calcula a soma dos valores na coluna quantidade (coluna 1)
                $('#product-table tbody tr').each(function() {
                    totalItems += parseInt($(this).find('td:eq(1)').text());
                });

                // Atualiza a quantidade de itens no título do carrinho
                $('.m-b-0.text-white').text('Carrinho (' + totalItems + ' items)');
            }

            function formatCurrency(value) {
                return new Intl.NumberFormat('pt-BR', {
                    style: 'currency',
                    currency: 'BRL'
                }).format(value);
            }


            function formatInputValue(value) {
                let formattedValue = value.replace(/[^\d]/g, ''); // Remove caracteres não numéricos
                let numberValue = parseInt(formattedValue) || 0;
                let decimalValue = (numberValue / 100).toFixed(2);
                let commaSeparatedValue = decimalValue.replace('.', ','); // Substitui o ponto por vírgula
                return 'R$' + commaSeparatedValue; // Adiciona o prefixo "R$" antes do valor
            }


            $('#product-value').on('input keyup', function() {
                let currentValue = $(this).val();
                let formattedValue = formatInputValue(currentValue);
                $(this).val(formattedValue);
            });


            $('#product-search').on('blur', function() {
                setTimeout(function() {
                    $('#search-results').hide();
                }, 100);
            });


            $(document).on('keydown', function(event) {
                // Verifica se a tecla pressionada é ESC (código de tecla 27)
                if (event.which === 27) {
                    $('#search-results').hide();
                }
            });


            $('#add-cart-modal').modal({
                show: false
            });


            // Botão "Adicionar"
            $('#add-to-cart_search').on('click', function() {
                let productName = $('#product-search').val();

                if ($('#search-results').is(':visible')) {
                    // Se houver resultados na lista, abra o modal normalmente
                    $('#add-cart-modal').modal('show');
                } else {
                    // Se não houver resultados na lista, abra o modal "Nenhum produto encontrado"
                    $('#no-product-found-modal').modal('show');
                }
            });


            // Botão "Sim" no modal "Nenhum produto encontrado"
            $('#add-new-product').on('click', function() {
                let productName = $('#product-search').val();

                // Preencha o campo de descrição do produto no modal de cadastro
                $('#descricaoProduto').val(productName);

                // Feche o modal "Produto não encontrado"
                $('#no-product-found-modal').modal('hide');

                // Abra o modal de cadastro de produtos
                $('#new-product-modal').modal('show');
            });


            // Evento de clique no botão "Continuar"
            $('#btn-finaliza-venda').on('click', function() {
                $('#row-cart').hide();
                $('#row-form').show();
            });

            // Evento de clique no botão "Cancelar"
            $('#btn-fecha-detalhes').on('click', function() {
                $('#row-form').hide();
                $('#row-cart').show();
            });


        });
    </script>

    <script>
        $('#btn-detalhes-venda').click(function() {
            // Limpe os detalhes do pedido existentes
            $('#row-form .form-group.row.p-b-15').not('.fixed').remove();
            $('#row-cart').hide();
            $('#row-form').show();

            // Para cada linha na tabela do carrinho
            $('#product-table tbody tr').each(function() {
                // Extraia as informações do produto da linha
                let productDescription = $(this).find('td:nth-child(1)').text();
                let productQuantity = $(this).find('td:nth-child(2)').text();
                let productPrice = $(this).find('td:nth-child(4)').text();

                // Crie um novo elemento de linha para os detalhes do pedido
                let orderDetailRow = `
            <div class="form-group row p-b-15">
                <div class="col-sm-2"></div>
                <div class="col-sm-6">
                    <p class="form-control-static">${productDescription}</p>
                </div>
                <div class="col-sm-1">
                    <p class="form-control-static text-right">x${productQuantity}</p>
                </div>
                <div class="col-sm-3">
                    <p class="form-control-static text-right">${productPrice}</p>
                </div>
            </div>`;

                // Adicione a nova linha aos detalhes do pedido
                $('#row-form .card-body:first').append(orderDetailRow);
            });

            // Mostre os detalhes do pedido
            $('#row-form').show();

            // Copie o total
            let total = $('#total-value').text();
            $('#row-form .card-title:contains("Total:")').next().text(total);
        });
    </script>

    <script>
        function getCartArray() {
            let cart = localStorage.getItem('cart');
            return cart ? JSON.parse(cart) : [];
        }

        function setCartArray(cart) {
            localStorage.setItem('cart', JSON.stringify(cart));
        }
        s
        $('#btn-finaliza_venda').on('click', function() {
            var paymentMethod = $('#payment-method').val();
            var vendor = $('#vendor').val();
            var date = $('#datepicker-autoclose').val();
            var cartItems = cart.getCartArray();

            $.ajax({
                url: 'finalizar_pedido.php',
                type: 'POST',
                data: {
                    paymentMethod: paymentMethod,
                    vendor: vendor,
                    date: date,
                    cartItems: JSON.stringify(cartItems)
                },
                success: function(response) {
                    console.log(response);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        });
    </script>

</body>

</html>