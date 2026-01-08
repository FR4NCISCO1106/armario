<?php
        include('security.php');

        include('includes/header.php');
        include('includes/navbar.php');
        ?>


        <div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document"> 
            <div class="modal-content">
            <div class="modal-header bg-success text-white"> <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-box-open mr-2"></i> Registro de Nuevo Artículo</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="code3.php" method="POST">
                
                <div class="modal-body row bg-light p-4"> 

                    <div class="col-md-6 border-right"> <h5 class="mb-3 text-success">Información Básica</h5>
                        
                        <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                            <label>ID</label>
                            <input type="text" name="id" class="form-control" placeholder="ID (ej: 001)" required>
                        </div>
                        
                        <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                            <label>Sede</label>
                            <select name="sede" class="form-control" required>
                                <option value="">Seleccionar sede...</option>
                                <option value="Sede Principal">Sede Principal</option>
                                <option value="Sucursal Norte">Sucursal Norte</option>
                                <option value="Sucursal Sur">Sucursal Sur</option>
                            </select>
                        </div>

                        <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                            <label>Unidad administrativa</label>
                            <select name="unidad_administrativa" class="form-control" required>
                                <option value="">Seleccionar unidad...</option>
                                <option value="Unidad A">Unidad A</option>
                                <option value="Unidad B">Unidad B</option>
                                <option value="Unidad C">Unidad C</option>
                            </select>
                        </div>

                        <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                            <label>Codigo interno del bien</label>
                            <input type="text" name="codigo_interno_del_bien" class="form-control" placeholder="Código interno (ej: BIEN123)" required>
                        </div>

                        <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                            <label>Descripción</label>
                            <textarea name="descripcion" class="form-control" placeholder="Descripción del artículo" required></textarea>
                        </div>
                        
                        <h5 class="mt-4 mb-3 text-success">Detalles de Adquisición</h5>

                        <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                            <label>Forma adquisición</label>
                            <select name="forma_adquisicion" class="form-control" required>
                                <option value="">Seleccionar forma...</option>
                                <option value="Compra">Compra</option>
                                <option value="Donación">Donación</option>
                                <option value="Arrendamiento">Arrendamiento</option>
                            </select>
                        </div>
                        
                        <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                            <label>Fecha adquisición</label>
                            <input type="date" name="fecha_adquisicion" class="form-control" required>
                        </div>

                        <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                            <label>N° documento</label>
                            <input type="text" name="n_documento" class="form-control" placeholder="Número de factura/doc." required>
                        </div>

                        <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                            <label>Moneda</label>
                            <select name="moneda" class="form-control" required>
                                <option value="">Seleccionar moneda...</option>
                                <option value="USD">Dólar Americano (USD)</option>
                                <option value="EUR">Euro (EUR)</option>
                                <option value="Local">Moneda Local</option>
                            </select>
                        </div>
                        
                        <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                            <label>Valor adquisición</label>
                            <input type="number" name="valor_adquisicion" class="form-control" step="0.01" placeholder="Valor (ej: 1500.00)" required>
                        </div>
                        
                        <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                            <label>Estado del uso del bien</label>
                            <select name="estado_del_uso_del_bien" class="form-control" required>
                                <option value="">Seleccionar estado...</option>
                                <option value="En uso">En uso</option>
                                <option value="Almacenado">Almacenado</option>
                                <option value="En proceso de baja">En proceso de baja</option> 
                            </select>
                        </div>
                        
                        <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                            <label>Año de Construcción</label>
                            <input type="date" name="fecha_adquisicion" class="form-control" required>
                        </div>

                        <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                            <label>Numero del contrato</label>
                            <input type="text" name="marca" class="form-control" placeholder="Marca (ej: Dell, HP)" required>
                        </div>

                        <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                            <label>Rif comodatorio</label>
                            <input type="text" name="marca" class="form-control" placeholder="Marca (ej: Dell, HP)" required>
                        </div>

                        <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                            <label>Estado de ocupación</label>
                            <input type="text" name="marca" class="form-control" placeholder="Marca (ej: Dell, HP)" required>
                        </div>

                                                <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                            <label>Area de Construcción</label>
                            <input type="text" name="marca" class="form-control" placeholder="Marca (ej: Dell, HP)" required>
                        </div>

                        <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                            <label>Unidad de medida area</label>
                            <input type="text" name="marca" class="form-control" placeholder="Marca (ej: Dell, HP)" required>
                        </div>

                        <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                            <label>Area del terreno</label>
                            <input type="text" name="marca" class="form-control" placeholder="Marca (ej: Dell, HP)" required>
                        </div>

                        <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                            <label>Unidad de medida area del terreno</label>
                            <input type="text" name="marca" class="form-control" placeholder="Marca (ej: Dell, HP)" required>
                        </div>

                        <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                            <label>Magnitud</label>
                            <input type="text" name="marca" class="form-control" placeholder="Marca (ej: Dell, HP)" required>
                        </div>

                        <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                            <label>Uso actual</label>
                            <input type="text" name="marca" class="form-control" placeholder="Marca (ej: Dell, HP)" required>
                        </div>


                    </div>

                    <div class="col-md-6">
                        <h5 class="mb-3 text-success">Características del Bien</h5>


                        <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                            <label>Fecha inicio contrato</label>
                            <input type="date" name="fecha_adquisicion" class="form-control" required>
                        </div>

                        <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                            <label>Fecha fin contrato</label>
                            <input type="date" name="fecha_adquisicion" class="form-control" required>
                        </div>

                        <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                            <label>Oficina de registro inmueble</label>
                            <input type="text" name="marca" class="form-control" placeholder="Marca (ej: Dell, HP)" required>
                        </div>

                        <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                            <label>Fecha registro inmueble</label>
                            <input type="date" name="fecha_adquisicion" class="form-control" required>
                        </div>

                        <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                            <label>Numero registro inmueble</label>
                            <input type="text" name="marca" class="form-control" placeholder="Marca (ej: Dell, HP)" required>
                        </div>

                        <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                            <label>Tomo</label>
                            <input type="text" name="marca" class="form-control" placeholder="Marca (ej: Dell, HP)" required>
                        </div>

                        <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                            <label>Folio</label>
                            <input type="text" name="marca" class="form-control" placeholder="Marca (ej: Dell, HP)" required>
                        </div>

                        <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                            <label>País</label>
                            <input type="text" name="marca" class="form-control" placeholder="Marca (ej: Dell, HP)" required>
                        </div>

                        <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                            <label>Estado</label>
                            <input type="text" name="marca" class="form-control" placeholder="Marca (ej: Dell, HP)" required>
                        </div>


                        <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                            <label>Municipio</label>
                            <input type="text" name="marca" class="form-control" placeholder="Marca (ej: Dell, HP)" required>
                        </div>

                        <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                            <label>Parroquia</label>
                            <input type="text" name="marca" class="form-control" placeholder="Marca (ej: Dell, HP)" required>
                        </div>

                        <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                            <label>Urbanización/Sector</label>
                            <input type="text" name="marca" class="form-control" placeholder="Marca (ej: Dell, HP)" required>
                        </div>

                        <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                            <label>Avenida/Calle</label>
                            <input type="text" name="marca" class="form-control" placeholder="Marca (ej: Dell, HP)" required>
                        </div>


                        <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                            <label>Casa/Edificio</label>
                            <input type="text" name="marca" class="form-control" placeholder="Marca (ej: Dell, HP)" required>
                        </div>


                        <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                            <label>Piso</label>
                            <input type="text" name="marca" class="form-control" placeholder="Marca (ej: Dell, HP)" required>
                        </div>

                        <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                            <label>Localización</label>
                            <input type="text" name="marca" class="form-control" placeholder="Marca (ej: Dell, HP)" required>
                        </div>

                        <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                            <label>Linderos norte</label>
                            <input type="text" name="marca" class="form-control" placeholder="Marca (ej: Dell, HP)" required>
                        </div>

                        <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                            <label>Linderos sur</label>
                            <input type="text" name="marca" class="form-control" placeholder="Marca (ej: Dell, HP)" required>
                        </div>

                        <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                            <label>Linderos este</label>
                            <input type="text" name="marca" class="form-control" placeholder="Marca (ej: Dell, HP)" required>
                        </div>

                        
                        <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                            <label>Linderos oeste</label>
                            <input type="text" name="marca" class="form-control" placeholder="Marca (ej: Dell, HP)" required>
                        </div>

                        <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                            <label>Latitud coordenadas geograficas</label>
                            <input type="text" name="marca" class="form-control" placeholder="Marca (ej: Dell, HP)" required>
                        </div>

                        <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                            <label>Longitud coordenadas geograficas</label>
                            <input type="text" name="marca" class="form-control" placeholder="Marca (ej: Dell, HP)" required>
                        </div>

                        
                        <h5 class="mt-4 mb-3 text-success">Clasificación y Ubicación</h5>

                        <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                            <label>Categoria general</label>
                            <select name="categoria_general" class="form-control" required>
                                <option value="">Seleccionar categoría general...</option>
                                <option value="Mobiliario">Mobiliario</option>
                                <option value="Equipo IT">Equipo IT</option>
                                <option value="Vehículo">Vehículo</option>
                            </select>
                        </div>
                        
                        <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                            <label>Subcategoria</label>
                            <input type="text" name="subcategoria" class="form-control" placeholder="Subcategoría" required>
                        </div>
                        
                        <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                            <label>Categoria especifica</label>
                            <input type="text" name="categoria_especifica" class="form-control" placeholder="Categoría específica" required>
                        </div>


                        

                    </div>

                </div>

                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i> Cerrar</button>
                <button type="submit" name="registerbtn" class="btn btn-success"><i class="fas fa-plus-circle mr-1"></i> Salvar Artículo</button>
                </div>
            </form>

            </div>
        </div>
        </div>

        <div class="container-fluid">

        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            
                <h6 class="m-0 font-weight-bold text-success flex-shrink-0 d-flex align-items-center">
                <button type="button" class="btn btn-info mr-2" onclick="generarPDF('reporte inventario inmueble')"> 
                    <i class="fas fa-file-pdf mr-1"></i> Generar Reporte
                </button>
                    
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addadminprofile">
                        <i class="fas fa-plus mr-1"></i> Agregar productos de inventario
                    </button>
                </h6>


            <form class="d-none d-sm-inline-block form-inline ml-auto mr-0 my-2 my-md-0 mw-100 navbar-search" method="GET" action="register3.php">
                <div class="input-group">
                    <input type="text" name="search_query" class="form-control bg-light border-0 small" placeholder="Buscar producto..." aria-label="Search" aria-describedby="basic-addon2" value="<?php echo htmlspecialchars($_GET['search_query'] ?? ''); ?>">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>
            </div>

            <div class="card-body">

            <?php
            // Mensajes de estado (SUCCESS/STATUS)
            if(isset($_SESSION['success']) && $_SESSION['success'] !='' ) {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert"> <strong>¡Éxito!</strong> '.$_SESSION['success'].' <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> </div>';
                unset($_SESSION['success']);
            }
            
            if(isset($_SESSION['delete_success']) && $_SESSION['delete_success'] !='' ) {
                // Se usa alert-warning/alert-primary como alternativa al rojo para indicar borrado exitoso
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert"> <strong>Eliminado:</strong> '.$_SESSION['delete_success'].' <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> </div>';
                unset($_SESSION['delete_success']);
            }

            if(isset($_SESSION['status']) && $_SESSION['status'] !='' ) {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert"> <strong>Error:</strong> '.$_SESSION['status'].' <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> </div>';
                unset($_SESSION['status']);
            }
            ?>

            <style>
            .text-wrap-fix {
                white-space: normal;
                word-wrap: break-word;
                vertical-align: top;
            }
            </style>

            <div class="table-responsive">
            <?php
                $query = "SELECT * FROM register3";

                // INICIO: Lógica de Búsqueda
                if(isset($_GET['search_query']) && !empty($_GET['search_query'])) {
                    $search = mysqli_real_escape_string($connection, $_GET['search_query']);
                    // Consulta para buscar en campos relevantes
                    $query .= " WHERE `id` LIKE '%$search%' OR `unidad administrativa` LIKE '%$search%' OR `codigo interno del bien` LIKE '%$search%' OR `descripcion` LIKE '%$search%' OR `marca` LIKE '%$search%' OR `modelo` LIKE '%$search%' OR `placas` LIKE '%$search%' OR `estado del uso del bien` LIKE '%$search%' OR `condicion fisica` LIKE '%$search%'";
                }
                // FIN: Lógica de Búsqueda

                $query_run = mysqli_query($connection, $query);
            ?>
            <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                <thead class="bg-light text-secondary">
                <tr>
                    <th>ID</th>
                    <th>Sede</th>
                    <th>Unidad Administrativa</th>
                    <th>Codigo interno del bien</th>
                    <th>Descripción</th>
                    <th>Forma de adquisición</th>
                    <th>Fecha de adquisición</th>
                    <th>N° documento</th>
                    <th>Moneda</th>
                    <th>Valor adquisición</th>
                    <th>Estado del uso del bien</th>
                    <th>Año de consrtucción</th>
                    <th>Numero del contrato</th>
                    <th>rif comodatario</th>
                    <th>Estado de ocupación</th>
                    <th>Area de Construcción</th>
                    <th>Unidad de medida area</th>
                    <th>Area del terreno</th>
                    <th>Unidad medida area del terreno</th>
                    <th>Magnitud</th>
                    <th>Uso actual</th>
                    <th>Fecha inicio contrato</th>
                    <th>Fecha fin contrato</th>
                    <th>Oficina de registro inmueble</th>
                    <th>Fecha registro inmueble</th>
                    <th>Numero registro inmueble</th>
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
                    <th>linderos oeste</th>
                    <th>Latitud coordenadas geograficas</th>
                    <th>Longitud coordenadas geograficas</th>
                    <th>Categoria general</th>
                    <th>Subcategoria</th>
                    <th>Categoria especifica</th>
                    <th>Fecha Edición</th> 
                    <th>EDITAR</th>
                    <th>BORRAR</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if($query_run && mysqli_num_rows($query_run) > 0)
                {
                foreach($query_run as $row)
                {
                    // Ajuste para evitar el error 'Undefined index' si el campo es NULL en la DB
                    $u_admin = $row['unidad administrativa'] ?? '';
                    $codigo_bien = $row['codigo interno del bien'] ?? '';
                    $descripcion = $row['descripcion'] ?? '';
                    $condicion_fisica = $row['condicion fisica'] ?? '';
                    $valor_adquisicion = $row['valor adquisicion'] ?? '0.00';
                    $moneda = $row['moneda'] ?? '';
                    
                    // Formatear el valor de adquisición a moneda
                    $valor_formateado = $moneda . ' ' . number_format((float)$valor_adquisicion, 2, '.', ',');

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
                if (!empty($row['fecha_edicion'])) {
                    // **CAMBIAR ESTA LÍNEA** para incluir AM/PM
                    echo date('d/m/Y h:i A', strtotime($row['fecha_edicion'])); 
                } else {
                    echo 'N/A';
                }
            ?>
        </td>
        <td>
                        <form action="register_edit3.php" method="post">
                            <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                            <button type="submit" name="edit_btn" class="btn btn-success btn-sm"><i class="fas fa-edit"></i>EDITAR</button>
                        </form>
                    </td>
                    <td>
                        <form action="code3.php" method="post">
                            <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                            <button type="submit" name="delete_btn" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que quieres eliminar este registro?');"><i class="fas fa-trash-alt"></i>BORRAR</button>
                        </form>
                    </td>
                    </tr>
                <?php
                    } 
                } 
                else
                {
                    echo "<tr><td colspan='24' class='text-center'>No se encontraron registros</td></tr>";
                }

                    ?>
                </tbody>
                </table>
                </div>
            </div>
            </div>
        </div> 

        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-primary" href="logout.php">Logout</a>
                        </div>
                    </div>
                </div>
            </div>


        <?php
        include('includes/script.php');
        include('includes/footer.php');
        ?>