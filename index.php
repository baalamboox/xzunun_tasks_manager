<!DOCTYPE html>
<html lang="es-MX">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo ucfirst($_GET['vista_solicitada']);?></title>
        <?php
            include_once 'app/config.php';
            include_once 'app/dependencias.php';
        ?>
    </head>
    <body>
        <div class="container">
            <div class="row justify-content-center my-5">
                <div class="col-md-4">
                    <!-- Preloader -->
                    <div class="preloader flex-column justify-content-center align-items-center bg-dark">
                        <div class="text-center">
                            <h1 class="">Xzunun</h1>
                            <div class="spinner-border text-white mt-3" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                            
                        </div>
                    </div>
                    <?php
                        if(isset($_GET['vista_solicitada'])) {
                            switch($_GET['vista_solicitada']) {
                                case 'administrador': {
                                    include_once 'view/administrador/inicio-sesion.php';
                                    break;
                                }
                                case 'profesor': {
                                    include_once 'view/profesor/inicio-sesion.php';
                                    break;
                                }
                                case 'alumno': {
                                    include_once 'view/alumno/inicio-sesion.php';
                                    break;
                                }
                                default: {
                                    header('location:administrador');
                                }
                            }
                        } else {
                            header('location:administrador');
                        }
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>