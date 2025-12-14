<?php

include('security.php');
    include('includes/header.php');
    include('includes/navbar.php');
    ?>

<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> EDITAR Artículo </h6>
        </div>
        <div class="card-body">
        <?php

            // **Condición crucial:** Solo se ejecuta si se ha pulsado el botón 'edit_btn'
            if(isset($_POST['edit_btn']))
            {
                // Limpieza de datos
                $id = mysqli_real_escape_string($connection, $_POST['edit_id']);
                
                // Los nombres de columna deben coincidir exactamente con la base de datos
                $query = "SELECT * FROM register2 WHERE id='$id' ";
                $query_run = mysqli_query($connection, $query);

                if (mysqli_num_rows($query_run) > 0)
                {
                    foreach($query_run as $row)
                    {
                        ?>

                        <form action="code3.php" method="POST">
                            
                        <div class="row">
                            <div class="col-md-6 border-right">
                                
                                <h5 class="mb-3 text-primary">Datos del Bien</h5>
                                
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
                        <a href="register3.php" class="btn btn-danger mt-3"> Cancelar </a>
                        <button type="submit" name="updatebtn" class="btn btn-primary mt-3"> Actualizar </button>
                    
                        </form>
                        <?php
                    }
                } else {
                    echo "<h5>ERROR: No se encontró ningún registro con el ID proporcionado.</h5>";
                }
            }
            else // ESTE BLOQUE SE MUESTRA SI ACCEDES A LA PÁGINA SIN CLICAR EN EDITAR
            {
                echo '<div class="alert alert-warning" role="alert">';
                echo '<h4>Acceso no autorizado o ID de registro faltante.</h4>';
                echo '<p>Debe acceder a esta página haciendo clic en el botón **"EDITAR"** de la tabla de registros en la página principal.</p>';
                echo '<a href="register2.php" class="btn btn-primary mt-3"> Volver a Registros </a>';
                echo '</div>';
            }
            ?>
        </div>
    </div>
</div>

<?php
    include('includes/script.php');
    include('includes/footer.php');
?>