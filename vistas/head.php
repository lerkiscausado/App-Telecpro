<!DOCTYPE html>
<html lang="es">
    <head>
        <!-- Required meta tags -->
        <meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>App - Telecpro</title>
        <!-- plugins:css -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
        <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
        <!-- endinject -->
        <!-- Plugin css for this page -->        
        <link rel="stylesheet" href="assets/vendors/jquery-bar-rating/css-stars.css" />
        <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css" />
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <!-- endinject -->
        <!-- Layout styles -->
        <link rel="stylesheet" href="assets/css/demo_1/style.css" />
        <link rel="stylesheet" href="assets/css/estilos.css" />
        <!-- End layout styles -->
        <link rel="shortcut icon" href="assets/images/favicon.png" />
    </head>
    <body>
        <div class="container-scroller">
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item nav-profile border-bottom">
                        <a href="#" class="nav-link flex-column">
                            <div class="nav-profile-image">
                                <img src="assets/images/faces/face1.jpg" alt="profile" />
                                <!--change to offline or busy as needed-->
                            </div>
                            <div class="nav-profile-text d-flex ml-0 mb-3 flex-column">
                                <span class="font-weight-semibold mb-1 mt-2 text-center"><?php echo $usuario;?></span>                
                            </div>
                        </a>
                    </li>              
                    <li class="pt-2 pb-1">
                        <span class="nav-item-head">App - Telecpro</span>
                    </li>
                    <div class="dropdown-divider"></div>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">
                            <i class="mdi mdi-home menu-icon"></i>
                            <span class="menu-title">Inicio</span>
                        </a>
                    </li>          
                    <li class="nav-item">
                        <a class="nav-link" href="clientes_listar.php">
                            <i class="mdi mdi-account-multiple menu-icon"></i>
                            <span class="menu-title">Clientes</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="deco_listar.php">
                        <i class="mdi mdi-desktop-tower menu-icon"></i>
                            <span class="menu-title">Decodificadores</span>
                            </a>
                    </li>
                    <div class="dropdown-divider"></div>
                    <li class="nav-item">
                        <a class="nav-link" href="servicios_listar.php">
                            <i class="mdi mdi-server-network menu-icon"></i>
                            <span class="menu-title">Servicios</span>
                            </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Instalaciones_listar.php">
                        <i class="mdi mdi-import menu-icon"></i>
                            <span class="menu-title">Instalaciones</span>
                            </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="evento_listar.php">
                        <i class="mdi mdi-account-convert menu-icon"></i>
                            <span class="menu-title">Eventos</span>
                            </a>
                    </li>
                    <div class="dropdown-divider"></div>
                    <li class="nav-item">
                        <a class="nav-link" href="salir.php">
                            <i class="mdi mdi-close-circle-outline menu-icon"></i>
                            <span class="menu-title">Salir</span>
                        </a>
                    </li>                              
                </ul>
            </nav>
            <!-- partial -->
            <div class="container-fluid "> <!--page-body-wrapper-->      
                <!-- partial -->
                <!-- partial:partials/_navbar.html -->
                <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
                    <div class="navbar-menu-wrapper d-flex align-items-stretch">
                        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                            <span class="mdi mdi-chevron-double-left"></span>
                        </button>
                    </div>
                </nav>
                <!-- partial -->
                <div class="main-panel">
                    <!-- INICIO DE CONTENIDO-->                           
                    