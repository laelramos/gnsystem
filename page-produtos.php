<?php
require_once('conexao.php');
require('_validacao.php');
?>

<!DOCTYPE html>
<html dir="ltr" lang="pt-br">

<head>
    <?php require('layout-head.php') ?>
    <!--This page CSS -->
    <link href="assets/libs/jsgrid/jsgrid.css" rel="stylesheet">
    <link href="assets/libs/jsgrid/jsgrid-theme.css" rel="stylesheet">

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
                <!-- <button id="addRow" class="btn btn-success mb-2" data-toggle="modal" data-target="#new-product-modal"><i class="fas fa-plus"></i>&nbsp; Adicionar</button> -->


                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <div class="table-responsive">
                                    <div id="jsgrid"></div>

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
    <script src="assets/libs/jsgrid/jsgrid.js"></script>
    <script src="dist/js/pages/tables/jsgrid-init.js"></script>

    <script>
        async function fetchProducts() {
            return new Promise((resolve, reject) => {
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        var data = JSON.parse(xhr.responseText);
                        resolve(data);
                    }
                };
                xhr.open("GET", "buscar_produtos.php");
                xhr.send();
            });
        }

        async function fetchCategories() {
            return new Promise((resolve, reject) => {
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        var data = JSON.parse(xhr.responseText);
                        resolve(data);
                    }
                };
                xhr.open("GET", "buscar_categorias.php");
                xhr.send();
            });
        }

        async function loadData() {
            const productsPromise = fetchProducts();
            const categoriesPromise = fetchCategories();

            const products = await productsPromise;
            const categories = await categoriesPromise;

            products.forEach(item => {
                const category = categories.find(cat => cat.id_categorie === item.id_categorie);
                item.category_name = category ? category.name : "";
            });

            return {
                products,
                categories
            };
        }





        document.addEventListener("DOMContentLoaded", async function() {
            const {
                products,
                categories
            } = await loadData();

            $("#jsgrid").jsGrid({
                width: "100%",
                inserting: true,
                editing: true,
                sorting: true,
                paging: false,
                data: products,
                fields: [{
                        name: "id",
                        title: "ID",
                        type: "number",
                        width: 50
                    },
                    {
                        name: "description",
                        title: "Descrição",
                        type: "text",
                        width: 150
                    },
                    {
                        name: "category_name",
                        title: "Categoria",
                        type: "select",
                        items: categories,
                        valueField: "id_categorie",
                        textField: "name",
                        itemTemplate: function(value, item) {
                            return item.category_name;
                        },
                        width: 100
                    },
                    {
                        name: "manufacturer",
                        title: "Fabricante",
                        type: "text",
                        width: 100
                    },
                    {
                        name: "franchise",
                        title: "Franquia",
                        type: "text",
                        width: 100
                    },
                    {
                        name: "ean",
                        title: "EAN",
                        type: "text",
                        width: 100
                    },
                    {
                        type: "control",
                        editButton: true,
                        deleteButton: true
                    }
                ],
                onItemUpdated: async function(args) {
                    const id = await salvarProduto(args.item);
                    args.item.id = id;
                    $("#jsgrid").jsGrid("updateItem", args.item);

                    updateGridHeight($("#jsgrid").jsGrid("option", "data").length);
                },
                onItemDeleted: function(args) {
                    excluirProduto(args.item.id);
                    $("#jsgrid").jsGrid("deleteItem", args.item);

                    updateGridHeight($("#jsgrid").jsGrid("option", "data").length);
                },
                onItemInserted: async function(args) {
                    const id = await salvarProduto(args.item);
                    args.item.id = id;

                    const {
                        products
                    } = await loadData();
                    $("#jsgrid").jsGrid("option", "data", products);

                    updateGridHeight(products.length);

                    $("#jsgrid").jsGrid("option", "inserting", false);
                }


            });

            async function salvarProduto(produto) {
                return new Promise((resolve, reject) => {
                    var xhr = new XMLHttpRequest();
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState === 4 && xhr.status === 200) {
                            resolve(JSON.parse(xhr.responseText));
                        }
                    };

                    const categoria = categories.find(cat => cat.id_categorie === produto.id_categorie);
                    const id_categorie = categoria ? categoria.id_categorie : '';

                    if (produto.id) { // Atualizar produto existente
                        xhr.open("POST", "atualizar_produto.php");
                    } else { // Inserir novo produto
                        xhr.open("POST", "criar_produto.php");
                    }
                    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    xhr.send("id=" + produto.id + "&descricao=" + produto.description + "&categoria=" + id_categorie + "&fabricante=" + produto.manufacturer + "&franquia=" + produto.franchise + "&ean=" + produto.ean);
                });
            }

        });

        function excluirProduto(id) {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "excluir_produto.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {}
            }
            xhr.send("id=" + id);
        }





        function updateGridHeight(rowCount) {
            const headerHeight = 50;
            const rowHeight = 50;
            const totalHeight = headerHeight + rowCount * rowHeight;
            $("#jsgrid").css("height", totalHeight + "px");
        }
    </script>



</body>

</html>