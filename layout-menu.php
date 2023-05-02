<?php
?>
<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<div class="preloader">
    <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
    </div>
</div>

<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<div id="main-wrapper">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <header class="topbar">
        <nav class="navbar top-navbar navbar-expand-md navbar-dark">
            <div class="navbar-header">
                <!-- This is for the sidebar toggle which is visible on mobile only -->
                <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                <!-- ============================================================== -->
                <!-- Logo -->
                <a class="navbar-brand" href="index.html">
                    <!-- Logo icon -->
                    <b class="logo-icon">
                        <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                        <!-- Dark Logo icon -->
                        <img src="assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                        <!-- Light Logo icon -->
                        <img src="assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
                    </b>
                    <!--End Logo icon -->
                    <!-- Logo text -->
                    <span class="logo-text">
                        <!-- dark Logo text -->
                        <img src="assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                        <!-- Light Logo text -->
                        <img src="assets/images/logo-light-text.png" class="light-logo" alt="homepage" />
                    </span>
                </a>
                <!-- End Logo -->
                <!-- ============================================================== -->


                <!-- ============================================================== -->
                <!-- Toggle which is visible on mobile only -->
                <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
            </div>
            <!-- End Logo -->
            <!-- ============================================================== -->

            <div class="navbar-collapse collapse" id="navbarSupportedContent">
                <ul class="navbar-nav float-left mr-auto">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
                    <!-- End toggle and nav items -->
                    <!-- ============================================================== -->
                </ul>

                <ul class="navbar-nav float-right">
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="assets/images/users/1.jpg" alt="user" class="rounded-circle" width="31"></a>
                        <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                            <span class="with-arrow"><span class="bg-primary"></span></span>
                            <div class="d-flex no-block align-items-center p-15 bg-primary text-white m-b-10">
                                <div class=""><img src="assets/images/users/1.jpg" alt="user" class="img-circle" width="60"></div>
                                <div class="m-l-10">
                                    <h4 class="m-b-0"><?php echo $_SESSION['usuario']['user']; ?> </h4>
                                    <p class=" m-b-0"><?php echo $_SESSION['usuario']['email']; ?> </p>
                                </div>
                            </div>
                            <a class="dropdown-item" href="javascript:void(0)"><i class="ti-user m-r-5 m-l-5"></i> Meu Perfil</a>
                            <a class="dropdown-item" href="javascript:void(0)"><i class="ti-email m-r-5 m-l-5"></i> Inbox</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="javascript:void(0)"><i class="ti-settings m-r-5 m-l-5"></i> Configurações</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                            <div class="dropdown-divider"></div>
                            <div class="p-l-30 p-10"><a href="javascript:void(0)" class="btn btn-sm btn-success btn-rounded"> Ver Perfil</a></div>
                        </div>
                    </li>
                    <!-- End User profile and search -->
                    <!-- ============================================================== -->
                </ul>
            </div>

        </nav>
    </header>
    <!-- End Topbar header -->
    <!-- ============================================================== -->


    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <aside class="left-sidebar">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav">

                <?php
                $nivel = $_SESSION['usuario']['level'];
                ?>

                <ul id="sidebarnav">
                    <!-- User Profile-->
                    <li>
                        <!-- User Profile-->
                        <div class="user-profile d-flex no-block dropdown m-t-20">
                            <div class="user-pic"><img src="assets/images/users/1.jpg" alt="users" class="rounded-circle" width="40" /></div>
                            <div class="user-content hide-menu m-l-10">
                                <a href="javascript:void(0)" class="" id="Userdd" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <h5 class="m-b-0 user-name font-medium"><?php echo $_SESSION['usuario']['user']; ?> <i class="fa fa-angle-down"></i></h5>
                                    <span class="op-5 user-email"><?php echo $_SESSION['usuario']['email']; ?> </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="Userdd">
                                    <a class="dropdown-item" href="javascript:void(0)"><i class="ti-user m-r-5 m-l-5"></i> Meu Perfil </a>
                                    <a class="dropdown-item" href="javascript:void(0)"><i class="ti-email m-r-5 m-l-5"></i> Inbox </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="javascript:void(0)"><i class="ti-settings m-r-5 m-l-5"></i> Configurações </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="deslogar.php"><i class="fa fa-power-off m-r-5 m-l-5"></i> Logout </a>
                                </div>
                            </div>
                        </div>
                        <!-- End User Profile-->
                    </li>

                    <!-- Menu -->
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="index.php" aria-expanded="false">
                        <i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a>


                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="page-pdv.php" aria-expanded="false">
                            <i class="mdi mdi-cart"></i><span class="hide-menu">PDV</span></a></li>
                            
                    <?php //if ($nivel === 'dev') { ?>
                        <!-- <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark sidebar-link" href="page-pdv.php" aria-expanded="false">
                        <i class="mdi mdi-cart"></i><span class="hide-menu">PDV</span></a></li> -->
                    <?php //} ?>


                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="page-produtos.php" aria-expanded="false">
                        <i class="mdi mdi-tag"></i><span class="hide-menu">Produtos</span></a>

                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="page-pedidos.php" aria-expanded="false">
                            <i class="mdi mdi-cube-send"></i><span class="hide-menu">Pedidos</span></a></li>


                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="page-usuarios.php" aria-expanded="false">
                        <i class="mdi mdi-account-multiple"></i><span class="hide-menu">Usuários</span></a>


                    <li class="nav-small-cap"><i class="mdi mdi-dots-horizontal"></i> <span class="hide-menu">Relatórios</span></li>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="page-compras.php" aria-expanded="false">
                        <i class="mdi mdi-note"></i><span class="hide-menu">Compras</span></a></li>

                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="page-rel_vendas.php" aria-expanded="false">
                        <i class="mdi mdi-note"></i><span class="hide-menu">Vendas</span></a></li>
                    
                <!-- End Menu -->
            </li>
                </ul>
            </nav>
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
    </aside>
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->