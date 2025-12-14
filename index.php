<?php 
require 'database/dbconfig.php'; 
// Asegúrate de que la fecha se establezca antes de usarla
date_default_timezone_set('America/Caracas'); 

include('security.php');
include ('includes/header.php'); 
include ('includes/navbar.php'); 


// =========================================================================
// Lógica PHP para el GRÁFICO DE PASTEL (Conteo de Registros)
// =========================================================================

// 1. Conteo de Usuarios (Tabla 'users')
$query_users = "SELECT id FROM users ORDER BY id";
$query_run_users = mysqli_query($connection, $query_users);
$count_users = $query_run_users ? mysqli_num_rows($query_run_users) : 0; 

// 2. Conteo de Muebles (Tabla 'register')
$query_muebles = "SELECT id FROM register ORDER BY id";
$query_run_muebles = mysqli_query($connection, $query_muebles);
$count_muebles = $query_run_muebles ? mysqli_num_rows($query_run_muebles) : 0;

// 3. Conteo de Vehículos (Tabla 'register2')
$query_vehiculos = "SELECT id FROM register2 ORDER BY id";
$query_run_vehiculos = mysqli_query($connection, $query_vehiculos);
$count_vehiculos = $query_run_vehiculos ? mysqli_num_rows($query_run_vehiculos) : 0;

// Arrays para el Gráfico de Pastel
$data_chart = [$count_users, $count_muebles, $count_vehiculos]; 
$labels_chart = ["Usuarios", "Muebles", "Vehículos"];


// =========================================================================
// Lógica PHP para Últimos 10 Registros Editados (Consultando el Log de Auditoría)
// =========================================================================
$query_ultimos_editados = "
    SELECT 
        registro_id,
        descripcion_bien,
        tabla,
        fecha_modificacion,
        -- Combina todos los campos modificados en una sola cadena.
        GROUP_CONCAT(campo_modificado SEPARATOR ', ') AS campos_modificados 
    FROM log_ediciones
    -- Agrupamos por los campos que definen la transacción de edición
    GROUP BY registro_id, descripcion_bien, tabla, fecha_modificacion
    ORDER BY fecha_modificacion DESC 
    LIMIT 10
";

$query_run_editados = mysqli_query($connection, $query_ultimos_editados);
?>

        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <ul class="navbar-nav ml-auto">

                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-900 large">
                                    <?php 
                                    echo $_SESSION['username']; 
                                    ?>
                                </span>
                                <img class="img-profile rounded-circle"
                                    src="img/icono.png">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in p-3"
                                aria-labelledby="userDropdown">
                                <div class="dropdown-divider"></div>
                                
                                <form action="logout.php" method="POST" class="d-grid mx-auto w-75"> 
                                    <button  type="submit" name="logout_btn" class="btn btn-danger">Cerrar sesión</button>
                                </form>
                            </div>
                        </li>

                    </ul>

                </nav>

                <div class="container-fluid">

                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard de Inventario</h1>
                    </div>

                    <div class="row">

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Muebles</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php echo '<h1>'.$count_muebles.'</h1>'; ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-cubes fa-3x text-gray-500"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Total registro de vehiculos</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-500">
                                                <?php echo '<h1>'.$count_vehiculos.'</h1>'; ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-car fa-3x text-gray-500"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                Total de Usuarios</div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-500">
                                                        <?php echo '<h1>'.$count_users.'</h1>'; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-3x text-gray-500"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="audit_log.php" class="text-decoration-none">
                                <div class="card border-left-secondary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                                    Ver Registro de Auditoría Completo</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">Historial de Cambios</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-clipboard-list fa-3x text-gray-400"></i>
                                            </div>
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
                                    <h6 class="m-0 font-weight-bold text-primary">Resumen de Registros (Usuarios, Muebles, Vehículos)</h6>
                                </div>
                                <div class="card-body">
                                    <div class="chart-pie pt-4">
                                        <canvas id="myDoughnutChart"></canvas>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-info"></i> Usuarios
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary"></i> Muebles
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i> Vehículos
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-6">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-warning">Últimos 10 Registros Editados (Campos Modificados)</h6>
                                </div>
                                <div class="card-body">
                                    <ul class="list-group list-group-flush small">
                                        <?php
                                        // === PRUEBA DE DIAGNÓSTICO: Verificar la conexión/consulta ===
                                        if (!$query_run_editados) {
                                            // Muestra un error si la consulta falló (ej: nombre de tabla incorrecto)
                                            echo '<li class="list-group-item p-1 border-0 text-danger"><strong>¡ERROR DE CONSULTA!</strong> Revisa la sintaxis SQL o el nombre de la tabla `log_ediciones`. Error: ' . mysqli_error($connection) . '</li>';
                                        }
                                        // === FIN PRUEBA DE DIAGNÓSTICO ===


                                        // Aquí aseguramos que la consulta se haya ejecutado y haya resultados
                                        if ($query_run_editados && mysqli_num_rows($query_run_editados) > 0) {
                                            while ($row_editado = mysqli_fetch_assoc($query_run_editados)) {
                                                
                                                $date_time = new DateTime($row_editado['fecha_modificacion']); 
                                                $tipo_registro = ($row_editado['tabla'] == 'register2') ? 'Vehículo' : 'Mueble';
                                                $color = ($row_editado['tabla'] == 'register2') ? 'text-success' : 'text-primary';
                                                
                                                // Limpia y formatea los nombres de los campos para mejor lectura
                                                $campos_formateados = str_replace(['_', '`', ' administrativa'], [' ', '', ' Administrativa'], $row_editado['campos_modificados']);

                                                echo '<li class="list-group-item p-1 border-0 d-flex justify-content-between align-items-start">';
                                                echo '<div>';
                                                echo '<strong class="' . $color . '">' . $tipo_registro . ' (ID ' . htmlspecialchars($row_editado['registro_id']) . '):</strong> ';
                                                // Muestra los primeros 35 caracteres de la descripción
                                                echo htmlspecialchars(substr($row_editado['descripcion_bien'], 0, 35)) . (strlen($row_editado['descripcion_bien']) > 35 ? '...' : ''); 
                                                echo '<br><small class="text-secondary">Campos: ' . htmlspecialchars($campos_formateados) . '</small>';
                                                echo '</div>';
                                                echo '<span class="text-muted small ml-2">' . $date_time->format('d/m H:i') . '</span>';
                                                echo '</li>';
                                            }
                                        } else {
                                            // Este mensaje se muestra si la consulta fue OK pero no encontró filas.
                                            echo '<li class="list-group-item p-1 border-0 text-muted">Aún no hay registros editados en el log. Por favor, edita un artículo en el inventario para generar un registro de auditoría.</li>';
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    </div>
                </div>
            <?php
    include ('includes/script.php'); 
    ?>
    
    <script>
    var ctx = document.getElementById("myDoughnutChart");
    var chartData = <?php echo json_encode($data_chart); ?>; 
    var chartLabels = <?php echo json_encode($labels_chart); ?>;

    if (typeof Chart !== 'undefined' && ctx) {
        var myDoughnutChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: chartLabels,
                datasets: [{
                    data: chartData,
                    // Colores para Info, Primary y Success (orden de etiquetas: Usuarios, Muebles, Vehículos)
                    backgroundColor: ['#36b9cc', '#4e73df', '#1cc88a'], 
                    hoverBackgroundColor: ['#2c9faf', '#2e59d9', '#17a673'],
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                }],
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: true,
                    caretPadding: 10,
                    callbacks: {
                        label: function(tooltipItem, data) {
                            var dataset = data.datasets[tooltipItem.datasetIndex];
                            var total = dataset.data.reduce(function(previousValue, currentValue, currentIndex, array) {
                                return previousValue + currentValue;
                            });
                            var currentValue = dataset.data[tooltipItem.index];
                            var percentage = Math.floor(((currentValue/total) * 100)+0.5); 
                            return data.labels[tooltipItem.index] + ': ' + currentValue.toLocaleString() + ' (' + percentage + '%)';
                        }
                    }
                },
                legend: {
                    display: false
                },
                cutoutPercentage: 80, 
            },
        });
    }
    </script>
    
    <?php
    include ('includes/footer.php');  
    ?>