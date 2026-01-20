<?php 
require 'database/dbconfig.php'; 
date_default_timezone_set('America/Caracas'); 

include('security.php');
include ('includes/header.php'); 
include ('includes/navbar.php'); 

// Conteo de Registros
$count_users = mysqli_num_rows(mysqli_query($connection, "SELECT id FROM register3"));
$count_muebles = mysqli_num_rows(mysqli_query($connection, "SELECT id FROM register"));
$count_vehiculos = mysqli_num_rows(mysqli_query($connection, "SELECT id FROM register2"));

$data_chart = [$count_users, $count_muebles, $count_vehiculos]; 
$labels_chart = ["Inmuebles", "Muebles", "Vehículos"];

// Log de Auditoría
$query_ultimos_editados = "SELECT registro_id, descripcion_bien, tabla, fecha_modificacion, GROUP_CONCAT(campo_modificado SEPARATOR ', ') AS campos_modificados FROM log_ediciones GROUP BY registro_id, descripcion_bien, tabla, fecha_modificacion ORDER BY fecha_modificacion DESC LIMIT 10";
$query_run_editados = mysqli_query($connection, $query_ultimos_editados);
?>

<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3"><i class="fa fa-bars"></i></button>
            <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for...">
                    <div class="input-group-append"><button class="btn btn-primary" type="button"><i class="fas fa-search fa-sm"></i></button></div>
                </div>
            </form>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown">
                        <span class="mr-2 d-none d-lg-inline text-gray-900 large"><?php echo $_SESSION['username']; ?></span>
                        <img class="img-profile rounded-circle" src="img/icono.png">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in p-3">
                        <form action="logout.php" method="POST" class="d-grid mx-auto w-75"><button type="submit" name="logout_btn" class="btn btn-danger">Cerrar sesión</button></form>
                    </div>
                </li>
            </ul>
        </nav>

        <div class="container-fluid">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Sistema de Inventario Bienes Nacionales</h1>
            </div>

            <div class="row">
                <div class="col-xl-3 col-md-6 mb-4">
                    <a href="view_muebles.php" class="text-decoration-none">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">TOTAL REGISTRO DE MUEBLE</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo '<h1>'.$count_muebles.'</h1>'; ?></div>
                                    </div>
                                    <div class="col-auto"><i class="fas fa-cubes fa-3x text-gray-300"></i></div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                    <a href="view_vehiculos.php" class="text-decoration-none">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">TOTAL REGISTRO DE VEHICULOS</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-400"><?php echo '<h1>'.$count_vehiculos.'</h1>'; ?></div>
                                    </div>
                                    <div class="col-auto"><i class="fas fa-car fa-3x text-gray-300"></i></div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                    <a href="view_inmuebles.php" class="text-decoration-none">
                        <div class="card border-left-info shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">TOTAL REGISTRO DE INMUEBLE</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-400"><?php echo '<h1>'.$count_users.'</h1>'; ?></div>
                                    </div>
                                    <div class="col-auto"><i class="fas fa-building fa-3x text-gray-300"></i></div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                    <a href="audit_log.php" class="text-decoration-none">
                        <div class="card border-left-secondary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">VER REGISTRO DE AUDITORÍA COMPLETO</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">Historial de Cambios</div>
                                    </div>
                                    <div class="col-auto"><i class="fas fa-clipboard-list fa-3x text-gray-300"></i></div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Resumen de Registros (Inmuebles, Muebles, Vehículos)</h6>
                        </div>
                        <div class="card-body">
                            <div class="chart-pie pt-4"><canvas id="myDoughnutChart"></canvas></div>
                            <div class="mt-4 text-center small">
                                <span class="mr-2"><i class="fas fa-circle text-info"></i> Inmuebles</span>
                                <span class="mr-2"><i class="fas fa-circle text-primary"></i> Muebles</span>
                                <span class="mr-2"><i class="fas fa-circle text-success"></i> Vehículos</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 col-lg-6">
                    <div class="card border-left-warning shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-warning">Últimos 10 Registros Editados (Campos Modificados)</h6>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush small">
                                <?php
                                if ($query_run_editados && mysqli_num_rows($query_run_editados) > 0) {
                                    while ($row_editado = mysqli_fetch_assoc($query_run_editados)) {
                                        $date_time = new DateTime($row_editado['fecha_modificacion']);
                                        $es_eliminado = strpos($row_editado['campos_modificados'], 'Registro Completo') !== false;
                                        $color = ($row_editado['tabla'] == 'register3') ? 'text-info' : (($row_editado['tabla'] == 'register2') ? 'text-success' : 'text-primary');
                                        if($es_eliminado) $color = 'text-danger';
                                        
                                        echo '<li class="list-group-item p-1 border-0 d-flex justify-content-between align-items-start">
                                            <div>
                                                <strong class="'.$color.'">'.($es_eliminado ? "💥 ELIMINADO" : (($row_editado['tabla']=='register3'?"Inmueble":($row_editado['tabla']=='register2'?"Vehículo":"Mueble")))).'</strong>
                                                <span class="text-secondary"> '.htmlspecialchars(substr($row_editado['descripcion_bien'], 0, 35)).'</span><br>
                                                <small class="text-secondary">'.($es_eliminado ? "Borrado Permanentemente." : "Campos: ".htmlspecialchars($row_editado['campos_modificados'])).'</small>
                                            </div>
                                            <span class="text-muted small">'.$date_time->format('d/m H:i').'</span>
                                        </li>';
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include ('includes/script.php'); ?>
<script>
    var ctx = document.getElementById("myDoughnutChart");
    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: <?php echo json_encode($labels_chart); ?>,
            datasets: [{
                data: <?php echo json_encode($data_chart); ?>,
                backgroundColor: ['#36b9cc', '#4e73df', '#1cc88a'],
                hoverBackgroundColor: ['#2c9faf', '#2e59d9', '#17a673'],
            }],
        },
        options: { maintainAspectRatio: false, cutoutPercentage: 80, legend: {display: false} }
    });
</script>
<?php include ('includes/footer.php'); ?>