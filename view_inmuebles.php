<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-info">
                <i class="fas fa-building mr-2"></i> Listado de Inmuebles
            </h6>
            <form class="d-none d-sm-inline-block form-inline ml-auto mr-0 my-2 my-md-0 mw-100 navbar-search" method="GET" action="view_inmuebles.php">
                <div class="input-group">
                    <input type="text" name="search_query" class="form-control bg-light border-0 small" placeholder="Buscar inmueble..." value="<?php echo htmlspecialchars($_GET['search_query'] ?? ''); ?>">
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
                    $query = "SELECT * FROM register3";
                    if(isset($_GET['search_query']) && !empty($_GET['search_query'])) {
                        $search = mysqli_real_escape_string($connection, $_GET['search_query']);
                        $query .= " WHERE `id` LIKE '%$search%' OR `unidad administrativa` LIKE '%$search%' OR `descripcion` LIKE '%$search%'";
                    }
                    $query_run = mysqli_query($connection, $query);
                ?>
                <table class="table table-bordered table-sm table-hover text-dark" id="dataTable" width="100%" cellspacing="0" style="font-size: 0.75rem;">
                    <thead class="bg-light text-secondary">
                        <tr>
                            <th>ID</th>
                            <th>Sede</th>
                            <th>Unidad Administrativa</th>
                            <th>Codigo interno</th>
                            <th>Descripción</th>
                            <th>Forma adquisición</th>
                            <th>Fecha adquisición</th>
                            <th>N° documento</th>
                            <th>Moneda</th>
                            <th>Valor adquisición</th>
                            <th>Estado uso</th>
                            <th>Año construcción</th>
                            <th>N° contrato</th>
                            <th>RIF comodatario</th>
                            <th>Estado ocupación</th>
                            <th>Area Construcción</th>
                            <th>Unidad medida area</th>
                            <th>Area terreno</th>
                            <th>Unidad medida terreno</th>
                            <th>Magnitud</th>
                            <th>Uso actual</th>
                            <th>Inicio contrato</th>
                            <th>Fin contrato</th>
                            <th>Oficina registro</th>
                            <th>Fecha registro</th>
                            <th>N° registro</th>
                            <th>Tomo</th>
                            <th>Folio</th>
                            <th>País</th>
                            <th>Estado</th>
                            <th>Municipio</th>
                            <th>Parroquia</th>
                            <th>Urbanización/Sector</th>
                            <th>Avenida/Calle</th>
                            <th>Casa/Edificio</th>
                            <th>Piso</th>
                            <th>Localización</th>
                            <th>Linderos norte</th>
                            <th>Linderos sur</th>
                            <th>Linderos este</th>
                            <th>Linderos oeste</th>
                            <th>Latitud</th>
                            <th>Longitud</th>
                            <th>Categoria general</th>
                            <th>Subcategoria</th>
                            <th>Categoria especifica</th>
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
                                    <td><?php echo $row['sede']; ?></td>
                                    <td><?php echo $row['unidad administrativa']; ?></td>
                                    <td><?php echo $row['codigo interno del bien']; ?></td>
                                    <td><?php echo $row['descripcion']; ?></td>
                                    <td><?php echo $row['forma adquisicion']; ?></td>
                                    <td><?php echo $row['fecha adquisicion']; ?></td>
                                    <td><?php echo $row['n° documento']; ?></td>
                                    <td><?php echo $row['moneda']; ?></td>
                                    <td><?php echo $row['valor adquisicion']; ?></td>
                                    <td><?php echo $row['estado del uso del bien']; ?></td>
                                    <td><?php echo $row['año de construccion']; ?></td>
                                    <td><?php echo $row['numero del contrato']; ?></td>
                                    <td><?php echo $row['rif comodatario']; ?></td>
                                    <td><?php echo $row['estado de ocupacion']; ?></td>
                                    <td><?php echo $row['area de construccion']; ?></td>
                                    <td><?php echo $row['unidad de medida area']; ?></td>
                                    <td><?php echo $row['area del terreno']; ?></td>
                                    <td><?php echo $row['unidad medida area del terreno']; ?></td>
                                    <td><?php echo $row['magnitud']; ?></td>
                                    <td><?php echo $row['uso actual']; ?></td>
                                    <td><?php echo $row['fecha inicio contrato']; ?></td>
                                    <td><?php echo $row['fecha fin contrato']; ?></td>
                                    <td><?php echo $row['oficina de registro inmueble']; ?></td>
                                    <td><?php echo $row['fecha registro inmueble']; ?></td>
                                    <td><?php echo $row['numero registro inmueble']; ?></td>
                                    <td><?php echo $row['tomo']; ?></td>
                                    <td><?php echo $row['folio']; ?></td>
                                    <td><?php echo $row['pais']; ?></td>
                                    <td><?php echo $row['estado']; ?></td>
                                    <td><?php echo $row['municipio']; ?></td>
                                    <td><?php echo $row['parroquia']; ?></td>
                                    <td><?php echo $row['urbanizacion/sector']; ?></td>
                                    <td><?php echo $row['avenida/calle']; ?></td>
                                    <td><?php echo $row['casa/edificio']; ?></td>
                                    <td><?php echo $row['piso']; ?></td>
                                    <td><?php echo $row['localizacion']; ?></td>
                                    <td><?php echo $row['linderos norte']; ?></td>
                                    <td><?php echo $row['linderos sur']; ?></td>
                                    <td><?php echo $row['linderos este']; ?></td>
                                    <td><?php echo $row['linderos oeste']; ?></td>
                                    <td><?php echo $row['latitud coordenadas geograficas']; ?></td>
                                    <td><?php echo $row['longitud coordenadas geograficas']; ?></td>
                                    <td><?php echo $row['categoria general']; ?></td>
                                    <td><?php echo $row['subcategoria']; ?></td>
                                    <td><?php echo $row['categoria especifica']; ?></td>
                                    <td>
                                        <?php 
                                            echo !empty($row['fecha_edicion']) ? date('d/m/Y h:i A', strtotime($row['fecha_edicion'])) : 'N/A'; 
                                        ?>
                                    </td>
                                </tr>
                                <?php
                            }
                        } else {
                            echo "<tr><td colspan='47' class='text-center'>No se encontraron registros</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="mt-3">
                <a href="index.php" class="btn btn-secondary shadow-sm">
                    <i class="fas fa-arrow-left fa-sm"></i> Regresar al Dashboard
                </a>
            </div>
        </div>
    </div>
</div>

<?php
include('includes/script.php');
include('includes/footer.php');
?>