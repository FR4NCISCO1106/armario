<?php
include('security.php');
date_default_timezone_set('America/Caracas'); // Zona horaria para la visualización

include('includes/header.php');
include('includes/navbar.php');
?>

<div class="container-fluid">
    <br>
    <br>
    <h1 class="h3 mb-2 text-gray-800">📜 Registro Completo de Auditoría</h1>
    <p class="mb-4">Este listado muestra todos los cambios realizados a los registros de Muebles, Vehículos e Inmuebles, incluyendo eliminaciones, detallando el campo modificado y su valor anterior y nuevo.</p>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Historial de Ediciones y Eliminaciones</h6>
            
            <button type="button" class="btn btn-info shadow-sm" onclick="generarPDF('reporte auditoria')"> 
                <i class="fas fa-file-pdf fa-sm text-white-50 mr-1"></i> Generar Reporte de Auditoría
            </button>
        </div>
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-light">
                        <tr>
                            <th>Fecha/Hora</th>
                            <th>Tipo de Registro</th>
                            <th>ID de Registro</th>
                            <th>Descripción del Bien</th>
                            <th>Campo Modificado</th>
                            <th>Valor Anterior</th>
                            <th>Valor Nuevo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM log_ediciones ORDER BY fecha_modificacion DESC";
                        $query_run = mysqli_query($connection, $query);
                        
                        if (!$query_run) {
                            echo "<tr><td colspan='7' class='text-center text-danger'><strong>Error en la consulta SQL:</strong> " . mysqli_error($connection) . "</td></tr>";
                        }
                        
                        if ($query_run && mysqli_num_rows($query_run) > 0) 
                        {
                            while ($row = mysqli_fetch_assoc($query_run)) 
                            {
                                $tabla = $row['tabla'];
                                $row_class = ''; 
                                $campo_modificado_display = htmlspecialchars($row['campo_modificado']);
                                $valor_anterior_display = htmlspecialchars($row['valor_anterior']);
                                $valor_nuevo_display = htmlspecialchars($row['valor_nuevo']);
                                $valor_anterior_class = 'text-danger';
                                $valor_nuevo_class = 'text-success';
                                
                                // Lógica de etiquetas
                                $tipo_registro = '<span class="badge badge-primary">Mueble</span>'; 
                                if ($tabla == 'register3') {
                                    $tipo_registro = '<span class="badge badge-info">Inmueble</span>';
                                } elseif ($tabla == 'register2') {
                                    $tipo_registro = '<span class="badge badge-success">Vehículo</span>';
                                }

                                // Resaltar eliminación
                                if (strtoupper($valor_nuevo_display) === 'ELIMINADO' && $campo_modificado_display === 'Registro Completo') {
                                    $row_class = 'table-danger'; 
                                    $campo_modificado_display = '💥 Registro ELIMINADO';
                                    $valor_anterior_display = 'ID ' . htmlspecialchars($row['registro_id']);
                                    $valor_nuevo_display = 'BORRADO PERMANENTE';
                                    $valor_anterior_class = 'text-secondary';
                                    $valor_nuevo_class = 'text-danger font-weight-bold';
                                } else {
                                    $campo_modificado_display = ucwords(str_replace(['_', '`'], [' ', ''], $row['campo_modificado']));
                                }
                                
                                $date_time = new DateTime($row['fecha_modificacion']); 
                                $fecha_formateada = $date_time->format('d/m/Y H:i:s');

                                echo '<tr class="' . $row_class . '">';
                                echo '<td>' . htmlspecialchars($fecha_formateada) . '</td>';
                                echo '<td>' . $tipo_registro . '</td>';
                                echo '<td>' . htmlspecialchars($row['registro_id']) . '</td>';
                                echo '<td>' . htmlspecialchars($row['descripcion_bien']) . '</td>';
                                echo '<td><strong>' . htmlspecialchars($campo_modificado_display) . '</strong></td>';
                                echo '<td class="' . $valor_anterior_class . '">' . htmlspecialchars($valor_anterior_display) . '</td>'; 
                                echo '<td class="' . $valor_nuevo_class . '">' . htmlspecialchars($valor_nuevo_display) . '</td>';
                                echo '</tr>';
                            }
                        } 
                        else if ($query_run)
                        {
                            echo "<tr><td colspan='7' class='text-center text-muted'>No hay registros de ediciones en el historial.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php
include('includes/script.php');
include('includes/footer.php');
?>