<?php
    error_reporting(E_ERROR | E_PARSE | E_NOTICE);
    session_start();
    require_once '../../app/conexion.php';
    $conexion = conexion_xzunun_gestor_evidencias();
    if(isset($_SESSION['usuario'])) {
        $usuario = $_SESSION['usuario'];
        $sql = "SELECT nombres, apellido_paterno, foto_perfil FROM tabla_profesores WHERE email_institucional = '$usuario'";
        $consulta_consultada = $conexion->query($sql);
        $datos = mysqli_fetch_assoc($consulta_consultada);
?>
        <!DOCTYPE html>
        <html lang="es-MX">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>
                    <?php 
                        $nombre_completo = '';
                        $nombres_divididos = explode(' ', $datos['nombres']);
                        for($i = 0; $i < sizeof($nombres_divididos); $i++) {
                            $nombre_completo = $nombre_completo . ucfirst($nombres_divididos[$i]) . ' ';
                        }
                        echo 'Profesor | ' . $nombre_completo . ucfirst($datos['apellido_paterno']);
                    ?>
                </title>
                <?php
                    include_once '../../app/config.php';
                    include_once '../../app/dependencias.php';
                ?>
            </head>
            <body class="hold-transition sidebar-mini layout-fixed">
                <div class="wrapper">
                    <!-- Preloader -->
                    <div class="preloader flex-column justify-content-center align-items-center bg-dark">
                        <div class="text-center">
                            <h1 class="">Xzunun</h1>
                            <div class="spinner-border text-white mt-3" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                            
                        </div>
                    </div>
                    <!-- Navbar -->
                    <nav class="main-header navbar navbar-expand border-0">
                        <!-- Left navbar links -->
                        <ul class="navbar-nav">
                            <li class="nav-item rounded efecto_blur">
                                <a class="nav-link text-white" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                            </li>
                        </ul>
                    </nav>
                    <!-- /.navbar -->
                    <!-- Main Sidebar Container -->
                    <aside class="main-sidebar sidebar-dark-primary elevation-4 efecto_blur">
                        <!-- Brand Logo -->
                        <a href="xzunun" class="brand-link text-center">
                            <span class="brand-text font-weight-light">Xzunun</span>
                        </a>
                        <!-- Sidebar -->
                        <div class="sidebar">
                            <!-- Sidebar user panel (optional) -->
                            <div class="user-panel mt-3">
                                <div class="image p-0 text-center mb-2">
                                    <img src="<?php echo '../../' . $datos['foto_perfil'];?>" class="img-circle elevation-2 w-50" alt="foto perfil">
                                </div>
                                <br>
                                <div class="info text-center w-100 mb-2">
                                    <p class="display-5 m-0 text-light"><?php echo $nombre_completo . ' ' . ucfirst($datos['apellido_paterno']);?></p>
                                </div>
                            </div>
                            <!-- Sidebar Menu -->
                            <nav class="mt-2">
                                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                                    <li class="nav-item">
                                        <a href="dashboard" class="nav-link rounded-pill" id="boton_dashboard">
                                            <i class="nav-icon fas fa-tachometer-alt"></i>
                                            <p>Dashboard</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="evidencias" class="nav-link rounded-pill" id="boton_evidencias">
                                            <i class="nav-icon fas fa-cloud-download-alt"></i>
                                            <p>Evidencias</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="configuracion" class="nav-link rounded-pill" id="boton_configuracion">
                                            <i class="nav-icon fas fa-cogs"></i>
                                            <p>Configuración</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="salir" class="nav-link rounded-pill" id="boton_salir">
                                            <i class="nav-icon fas fa-sign-out-alt"></i>
                                            <p>Salir</p>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                            <!-- /.sidebar-menu -->
                        </div>
                    </aside>
                    <div class="content-wrapper bg-transparent">
                        <section class="content">
                            <div class="container-fluid">
                                <div class="row justify-content-center mt-5">
                                    <div class="col-lg-10 connectedSortable" id="vistas">
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
                <script src="../../manager/profesor/plantilla-barra-lateral.js"></script>
            </body>
        </html>
<?php
    } else {
        header('location:../../profesor');
    }
?>