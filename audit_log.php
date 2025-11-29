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
    <p class="mb-4">Este listado muestra todos los cambios realizados a los registros de Muebles/Inmuebles y Vehículos, detallando el campo modificado y su valor anterior y nuevo.</p>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Historial de Ediciones</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
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
                    <tfoot>
                        <tr>
                            <th>Fecha/Hora</th>
                            <th>Tipo de Registro</th>
                            <th>ID de Registro</th>
                            <th>Descripción del Bien</th>
                            <th>Campo Modificado</th>
                            <th>Valor Anterior</th>
                            <th>Valor Nuevo</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM log_ediciones ORDER BY fecha_modificacion DESC";
                        $query_run = mysqli_query($connection, $query);
                        
                        // Diagnóstico
                        if (!$query_run) {
                            echo "<tr><td colspan='7' class='text-center text-danger'><strong>Error en la consulta SQL:</strong> " . mysqli_error($connection) . "</td></tr>";
                        }
                        
                        if ($query_run && mysqli_num_rows($query_run) > 0) 
                        {
                            while ($row = mysqli_fetch_assoc($query_run)) 
                            {
                                // Determinar tipo y color para la fila
                                $tipo_registro = ($row['tabla'] == 'register2') ? '<span class="badge badge-success">Vehículo</span>' : '<span class="badge badge-primary">Mueble/Inmueble</span>';
                                
                                // Formatear la fecha
                                $date_time = new DateTime($row['fecha_modificacion']); 
                                $fecha_formateada = $date_time->format('d/m/Y H:i:s');
                                
                                // Formatear el nombre del campo para mejor lectura
                                $campo_formateado = str_replace(['_', '`', ' administrativa'], [' ', '', ' Administrativa'], $row['campo_modificado']);

                                echo '<tr>';
                                echo '<td>' . htmlspecialchars($fecha_formateada) . '</td>';
                                echo '<td>' . $tipo_registro . '</td>';
                                echo '<td>' . htmlspecialchars($row['registro_id']) . '</td>';
                                echo '<td>' . htmlspecialchars($row['descripcion_bien']) . '</td>';
                                echo '<td><strong>' . htmlspecialchars($campo_formateado) . '</strong></td>';
                                echo '<td class="text-danger">' . htmlspecialchars($row['valor_anterior']) . '</td>'; // El valor viejo en rojo
                                echo '<td class="text-success">' . htmlspecialchars($row['valor_nuevo']) . '</td>';   // El valor nuevo en verde
                                echo '</tr>';
                            }
                        } 
                        else if ($query_run) // Solo si la consulta se ejecutó sin error pero no devolvió filas
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