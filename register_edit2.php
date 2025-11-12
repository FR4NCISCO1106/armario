<?php
  session_start();
  
  // Conexión a la base de datos (CRUCIAL para cargar los datos)
  $connection = mysqli_connect("localhost","root","","adminpanel");
  if (!$connection) {
      die("Error de conexión a la base de datos: " . mysqli_connect_error());
  }

  include('includes/header.php');
  include('includes/navbar.php');
?>

<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> EDIT Admin Profile </h6>
        </div>
        <div class="card-body">
        <?php

            // **Condición crucial:** Solo se ejecuta si se ha pulsado el botón 'edit_btn'
            if(isset($_POST['edit_btn']))
            {
                $id = $_POST['edit_id'];
                
                // Los nombres de columna deben coincidir exactamente con la base de datos
                $query = "SELECT * FROM register2 WHERE id='$id' ";
                $query_run = mysqli_query($connection, $query);

                if (mysqli_num_rows($query_run) > 0)
                {
                    foreach($query_run as $row)
                    {
                        ?>

                        <form action="code2.php" method="POST">
                            
                        <div class="row">
                            <div class="col-md-6">
                                
                                <h5 class="mb-3 text-primary">Datos del Bien</h5>

                                <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                                    <label>ID</label>
                                    <input type="text" name="edit_id" class="form-control" value="<?php echo htmlspecialchars($row['id']);?>" readonly> 
                                </div>
                                
                                <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                                    <label>Unidad administrativa</label>
                                    <select name="edit_unidad_administrativa" class="form-control" required>
                                        <option value="">Seleccionar unidad...</option>
                                        <option value="Unidad A" <?php if(isset($row['unidad administrativa']) && $row['unidad administrativa'] == 'Unidad A') echo 'selected'; ?>>Unidad A</option>
                                        <option value="Unidad B" <?php if(isset($row['unidad administrativa']) && $row['unidad administrativa'] == 'Unidad B') echo 'selected'; ?>>Unidad B</option>
                                        <option value="Unidad C" <?php if(isset($row['unidad administrativa']) && $row['unidad administrativa'] == 'Unidad C') echo 'selected'; ?>>Unidad C</option>
                                    </select>
                                </div>

                                <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                                    <label>Codigo interno del bien</label>
                                    <input type="text" name="edit_codigo_interno_del_bien" class="form-control" placeholder="Código interno (ej: BIEN123)" value="<?php echo htmlspecialchars($row['codigo interno del bien']);?>" required>
                                </div>

                                <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                                    <label>Descripción</label>
                                    <textarea name="edit_descripcion" class="form-control" placeholder="Descripción del artículo" required><?php echo htmlspecialchars($row['descripcion']);?></textarea>
                                </div>
                                
                                <h5 class="mt-4 mb-3 text-success">Detalles de Adquisición</h5>

                                <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                                    <label>Forma adquisición</label>
                                    <select name="edit_forma_adquisicion" class="form-control" required>
                                        <option value="">Seleccionar forma...</option>
                                        <option value="Compra" <?php if(isset($row['forma adquisicion']) && $row['forma adquisicion'] == 'Compra') echo 'selected'; ?>>Compra</option>
                                        <option value="Donación" <?php if(isset($row['forma adquisicion']) && $row['forma adquisicion'] == 'Donación') echo 'selected'; ?>>Donación</option>
                                        <option value="Arrendamiento" <?php if(isset($row['forma adquisicion']) && $row['forma adquisicion'] == 'Arrendamiento') echo 'selected'; ?>>Arrendamiento</option>
                                    </select>
                                </div>
                                
                                <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                                    <label>Fecha adquisición</label>
                                    <input type="date" name="edit_fecha_adquisicion" class="form-control" value="<?php echo htmlspecialchars($row['fecha adquisicion']);?>" required>
                                </div>
                                
                                <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                                    <label>Valor adquisición</label>
                                    <input type="number" name="edit_valor_adquisicion" class="form-control" step="0.01" placeholder="Valor (ej: 1500.00)" value="<?php echo htmlspecialchars($row['valor adquisicion']);?>" required>
                                </div>
                                
                                <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                                    <label>N° documento</label>
                                    <input type="text" name="edit_n_documento" class="form-control" placeholder="Número de factura/doc." value="<?php echo htmlspecialchars($row['n° documento']);?>" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <h5 class="mb-3 text-success">Características del Bien</h5>

                                <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                                    <label>Moneda</label>
                                    <select name="edit_moneda" class="form-control" required>
                                        <option value="">Seleccionar moneda...</option>
                                        <option value="USD" <?php if(isset($row['moneda']) && $row['moneda'] == 'USD') echo 'selected'; ?>>Dólar Americano (USD)</option>
                                        <option value="EUR" <?php if(isset($row['moneda']) && $row['moneda'] == 'EUR') echo 'selected'; ?>>Euro (EUR)</option>
                                        <option value="Local" <?php if(isset($row['moneda']) && $row['moneda'] == 'Local') echo 'selected'; ?>>Moneda Local</option>
                                    </select>
                                </div>

                                <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                                    <label>Estado del uso del bien</label>
                                    <select name="edit_estado_del_uso_del_bien" class="form-control" required>
                                        <option value="">Seleccionar estado...</option>
                                        <option value="En uso" <?php if(isset($row['estado del uso del bien']) && $row['estado del uso del bien'] == 'En uso') echo 'selected'; ?>>En uso</option>
                                        <option value="Almacenado" <?php if(isset($row['estado del uso del bien']) && $row['estado del uso del bien'] == 'Almacenado') echo 'selected'; ?>>Almacenado</option>
                                        <option value="Baja" <?php if(isset($row['estado del uso del bien']) && $row['estado del uso del bien'] == 'Baja') echo 'selected'; ?>>En proceso de baja</option>
                                    </select>
                                </div>

                                <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                                    <label>Condición física</label>
                                    <select name="edit_condicion_fisica" class="form-control" required>
                                        <option value="">Seleccionar condición...</option>
                                        <option value="Excelente" <?php if(isset($row['condicion fisica']) && $row['condicion fisica'] == 'Excelente') echo 'selected'; ?>>Excelente</option>
                                        <option value="Buena" <?php if(isset($row['condicion fisica']) && $row['condicion fisica'] == 'Buena') echo 'selected'; ?>>Buena</option>
                                        <option value="Regular" <?php if(isset($row['condicion fisica']) && $row['condicion fisica'] == 'Regular') echo 'selected'; ?>>Regular</option>
                                        <option value="Mala" <?php if(isset($row['condicion fisica']) && $row['condicion fisica'] == 'Mala') echo 'selected'; ?>>Mala</option>
                                    </select>
                                </div>

                                <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                                    <label>Marca</label>
                                    <input type="text" name="edit_marca" class="form-control" placeholder="Marca (ej: Dell, HP)" value="<?php echo htmlspecialchars($row['marca']);?>" required>
                                </div>

                                <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                                    <label>Modelo</label>
                                    <input type="text" name="edit_modelo" class="form-control" placeholder="Modelo (ej: Latitude 5400)" value="<?php echo htmlspecialchars($row['modelo']);?>" required>
                                </div>

                                <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                                    <label>Color</label>
                                    <input type="text" name="edit_color" class="form-control" placeholder="Color (ej: Negro)" value="<?php echo htmlspecialchars($row['color']);?>" required>
                                </div>
                                
                                <h5 class="mt-4 mb-3 text-success">Clasificación y Ubicación</h5>

                                <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                                    <label>Categoria general</label>
                                    <select name="edit_categoria_general" class="form-control" required>
                                        <option value="">Seleccionar categoría general...</option>
                                        <option value="Mobiliario" <?php if(isset($row['categoria general']) && $row['categoria general'] == 'Mobiliario') echo 'selected'; ?>>Mobiliario</option>
                                        <option value="Equipo IT" <?php if(isset($row['categoria general']) && $row['categoria general'] == 'Equipo IT') echo 'selected'; ?>>Equipo IT</option>
                                        <option value="Vehículo" <?php if(isset($row['categoria general']) && $row['categoria general'] == 'Vehículo') echo 'selected'; ?>>Vehículo</option>
                                    </select>
                                </div>
                                
                                <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                                    <label>Subcategoria</label>
                                    <input type="text" name="edit_subcategoria" class="form-control" placeholder="Subcategoría" value="<?php echo htmlspecialchars($row['subcategoria']);?>" required>
                                </div>
                                
                                <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                                    <label>Categoria especifica</label>
                                    <input type="text" name="edit_categoria_especifica" class="form-control" placeholder="Categoría específica" value="<?php echo htmlspecialchars($row['categoria especifica']);?>" required>
                                </div>
                                
                                <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                                    <label>Sede</label>
                                    <select name="edit_sede" class="form-control" required>
                                        <option value="">Seleccionar sede...</option>
                                        <option value="Sede Principal" <?php if(isset($row['sede']) && $row['sede'] == 'Sede Principal') echo 'selected'; ?>>Sede Principal</option>
                                        <option value="Sucursal Norte" <?php if(isset($row['sede']) && $row['sede'] == 'Sucursal Norte') echo 'selected'; ?>>Sucursal Norte</option>
                                        <option value="Sucursal Sur" <?php if(isset($row['sede']) && $row['sede'] == 'Sucursal Sur') echo 'selected'; ?>>Sucursal Sur</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <a href="register2.php" class="btn btn-danger mt-3"> Cancelar </a>
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