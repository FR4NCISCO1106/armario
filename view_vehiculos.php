<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-success">
                <i class="fas fa-car mr-2"></i> Listado de Vehículos
            </h6>
            
            <form class="d-none d-sm-inline-block form-inline ml-auto mr-0 my-2 my-md-0 mw-100 navbar-search" method="GET" action="view_vehiculos.php">
                <div class="input-group">
                    <input type="text" name="search_query" class="form-control bg-light border-0 small" placeholder="Buscar vehículo..." value="<?php echo htmlspecialchars($_GET['search_query'] ?? ''); ?>">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <?php
                    // Usamos la tabla register2 que es la de vehículos
                    $query = "SELECT * FROM register2";
                    if(isset($_GET['search_query']) && !empty($_GET['search_query'])) {
                        $search = mysqli_real_escape_string($connection, $_GET['search_query']);
                        $query .= " WHERE `id` LIKE '%$search%' OR `placas` LIKE '%$search%' OR `marca` LIKE '%$search%' OR `descripcion` LIKE '%$search%'";
                    }
                    $query_run = mysqli_query($connection, $query);
                ?>
                <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-light text-secondary">
                        <tr>
                            <th>ID</th>
                            <th>Unidad Administrativa</th>
                            <th>Código Interno</th>
                            <th>Descripción</th>
                            <th>Forma Adquisición</th>
                            <th>Fecha Adquisición</th>
                            <th>N° Documento</th>
                            <th>Valor Adquisición</th>
                            <th>Moneda</th>
                            <th>Estado Uso</th>
                            <th>Condición Física</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Color</th>
                            <th>Año Fab.</th>
                            <th>Serial Carrocería</th>
                            <th>Serial Motor</th>
                            <th>Placas</th>
                            <th>Categoría General</th>
                            <th>Subcategoría</th>
                            <th>Categoría Específica</th>
                            <th>Sede</th>
                            <th>Fecha Edición</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if($query_run && mysqli_num_rows($query_run) > 0) {
                            foreach($query_run as $row) {
                                ?>
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['unidad administrativa']; ?></td>
                                    <td><?php echo $row['codigo interno del bien']; ?></td>
                                    <td><?php echo $row['descripcion']; ?></td>
                                    <td><?php echo $row['forma adquisicion']; ?></td>
                                    <td><?php echo $row['fecha adquisicion']; ?></td>
                                    <td><?php echo $row['n° documento']; ?></td>
                                    <td><?php echo number_format((float)($row['valor adquisicion'] ?? 0), 2, '.', ','); ?></td>
                                    <td><?php echo $row['moneda']; ?></td>
                                    <td><?php echo $row['estado del uso del bien']; ?></td>
                                    <td><?php echo $row['condicion fisica']; ?></td>
                                    <td><?php echo $row['marca']; ?></td>
                                    <td><?php echo $row['modelo']; ?></td>
                                    <td><?php echo $row['color']; ?></td>
                                    <td><?php echo $row['año fabricacion']; ?></td>
                                    <td><?php echo $row['serial carroceria']; ?></td>
                                    <td><?php echo $row['serial motor']; ?></td>
                                    <td><?php echo $row['placas']; ?></td>
                                    <td><?php echo $row['categoria general']; ?></td>
                                    <td><?php echo $row['subcategoria']; ?></td>
                                    <td><?php echo $row['categoria especifica']; ?></td>
                                    <td><?php echo $row['sede']; ?></td>
                                    <td>
                                        <?php 
                                            echo !empty($row['fecha_edicion']) ? date('d/m/Y h:i A', strtotime($row['fecha_edicion'])) : 'N/A'; 
                                        ?>
                                    </td>
                                </tr>
                                <?php
                            }
                        } else {
                            echo "<tr><td colspan='23' class='text-center'>No se encontraron registros de vehículos</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="mt-3">
                <a href="index.php" class="btn btn-secondary shadow-sm">
                    <i class="fas fa-arrow-left fa-sm text-white-50"></i> Regresar al Dashboard
                </a>
            </div>
        </div>
    </div>
</div>

<?php
include('includes/script.php');
include('includes/footer.php');
?>