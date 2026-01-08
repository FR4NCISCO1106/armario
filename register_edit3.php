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
                
                // **CORRECCIÓN 1: Se cambió 'register2' a 'register3'**
                $query = "SELECT * FROM register3 WHERE id='$id' ";
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
                                
                                <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                                    <label>ID</label>
                                    <input type="text" name="id" class="form-control" value="<?php echo htmlspecialchars($row['id']);?>" readonly> 
                                </div>
                                
                                <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                                    <label>Sede</label>
                                    <select name="sede" class="form-control" required>
                                        <option value="">Seleccionar sede...</option>
                                        <option value="Sede Principal" <?php if(isset($row['sede']) && $row['sede'] == 'Sede Principal') echo 'selected'; ?>>Sede Principal</option>
                                        <option value="Sucursal Norte" <?php if(isset($row['sede']) && $row['sede'] == 'Sucursal Norte') echo 'selected'; ?>>Sucursal Norte</option>
                                        <option value="Sucursal Sur" <?php if(isset($row['sede']) && $row['sede'] == 'Sucursal Sur') echo 'selected'; ?>>Sucursal Sur</option>
                                    </select>
                                </div>
                                
                                <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                                    <label>Unidad administrativa</label>
                                    <select name="unidad_administrativa" class="form-control" required>
                                        <option value="">Seleccionar unidad...</option>
                                        <option value="Unidad A" <?php if(isset($row['unidad administrativa']) && $row['unidad administrativa'] == 'Unidad A') echo 'selected'; ?>>Unidad A</option>
                                        <option value="Unidad B" <?php if(isset($row['unidad administrativa']) && $row['unidad administrativa'] == 'Unidad B') echo 'selected'; ?>>Unidad B</option>
                                        <option value="Unidad C" <?php if(isset($row['unidad administrativa']) && $row['unidad administrativa'] == 'Unidad C') echo 'selected'; ?>>Unidad C</option>
                                    </select>
                                </div>

                                <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                                    <label>Codigo interno del bien</label>
                                    <input type="text" name="codigo_interno_del_bien" class="form-control" placeholder="Código interno (ej: BIEN123)" value="<?php echo htmlspecialchars($row['codigo interno del bien']);?>" required>
                                </div>

                                <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                                    <label>Descripción</label>
                                    <textarea name="descripcion" class="form-control" placeholder="Descripción del artículo" required><?php echo htmlspecialchars($row['descripcion']);?></textarea>
                                </div>

                                <h5 class="mt-4 mb-3 text-success">Clasificación</h5>

                                <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                                    <label>Categoria general</label>
                                    <select name="categoria_general" class="form-control" required>
                                        <option value="">Seleccionar categoría general...</option>
                                        <option value="Mobiliario" <?php if(isset($row['categoria general']) && $row['categoria general'] == 'Mobiliario') echo 'selected'; ?>>Mobiliario</option>
                                        <option value="Equipo IT" <?php if(isset($row['categoria general']) && $row['categoria general'] == 'Equipo IT') echo 'selected'; ?>>Equipo IT</option>
                                        <option value="Vehículo" <?php if(isset($row['categoria general']) && $row['categoria general'] == 'Vehículo') echo 'selected'; ?>>Vehículo</option>
                                        <option value="Inmueble" <?php if(isset($row['categoria general']) && $row['categoria general'] == 'Inmueble') echo 'selected'; ?>>Inmueble</option>
                                    </select>
                                </div>
                                
                                <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                                    <label>Subcategoria</label>
                                    <input type="text" name="subcategoria" class="form-control" placeholder="Subcategoría" value="<?php echo htmlspecialchars($row['subcategoria']);?>" required>
                                </div>
                                
                                <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                                    <label>Categoria especifica</label>
                                    <input type="text" name="categoria_especifica" class="form-control" placeholder="Categoría específica" value="<?php echo htmlspecialchars($row['categoria especifica']);?>" required>
                                </div>
                                
                                <h5 class="mt-4 mb-3 text-success">Detalles de Adquisición</h5>

                                <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                                    <label>Forma adquisición</label>
                                    <select name="forma_adquisicion" class="form-control" required>
                                        <option value="">Seleccionar forma...</option>
                                        <option value="Compra" <?php if(isset($row['forma adquisicion']) && $row['forma adquisicion'] == 'Compra') echo 'selected'; ?>>Compra</option>
                                        <option value="Donación" <?php if(isset($row['forma adquisicion']) && $row['forma adquisicion'] == 'Donación') echo 'selected'; ?>>Donación</option>
                                        <option value="Arrendamiento" <?php if(isset($row['forma adquisicion']) && $row['forma adquisicion'] == 'Arrendamiento') echo 'selected'; ?>>Arrendamiento</option>
                                    </select>
                                </div>
                                
                                <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                                    <label>Fecha adquisición</label>
                                    <input type="date" name="fecha_adquisicion" class="form-control" value="<?php echo htmlspecialchars($row['fecha adquisicion']);?>" required>
                                </div>
                                
                                <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                                    <label>N° documento</label>
                                    <input type="text" name="n_documento" class="form-control" placeholder="Número de factura/doc." value="<?php echo htmlspecialchars($row['n° documento']);?>" required>
                                </div>
                                
                                <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                                    <label>Moneda</label>
                                    <select name="moneda" class="form-control" required>
                                        <option value="">Seleccionar moneda...</option>
                                        <option value="USD" <?php if(isset($row['moneda']) && $row['moneda'] == 'USD') echo 'selected'; ?>>Dólar Americano (USD)</option>
                                        <option value="EUR" <?php if(isset($row['moneda']) && $row['moneda'] == 'EUR') echo 'selected'; ?>>Euro (EUR)</option>
                                        <option value="Local" <?php if(isset($row['moneda']) && $row['moneda'] == 'Local') echo 'selected'; ?>>Moneda Local</option>
                                    </select>
                                </div>

                                <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                                    <label>Valor adquisición</label>
                                    <input type="number" name="valor_adquisicion" class="form-control" step="0.01" placeholder="Valor (ej: 1500.00)" value="<?php echo htmlspecialchars($row['valor adquisicion']);?>" required>
                                </div>
                                
                                <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                                    <label>Estado del uso del bien</label>
                                    <select name="estado_del_uso_del_bien" class="form-control" required>
                                        <option value="">Seleccionar estado...</option>
                                        <option value="En uso" <?php if(isset($row['estado del uso del bien']) && $row['estado del uso del bien'] == 'En uso') echo 'selected'; ?>>En uso</option>
                                        <option value="Almacenado" <?php if(isset($row['estado del uso del bien']) && $row['estado del uso del bien'] == 'Almacenado') echo 'selected'; ?>>Almacenado</option>
                                        <option value="Baja" <?php if(isset($row['estado del uso del bien']) && $row['estado del uso del bien'] == 'Baja') echo 'selected'; ?>>En proceso de baja</option>
                                    </select>
                                </div>

                                <h5 class="mt-4 mb-3- text-warning">Detalles del Inmueble (I)</h5>

                                <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                                    <label>Año de construcción</label>
                                    <input type="text" name="año_de_construccion" class="form-control" placeholder="Año (ej: 2001)" value="<?php echo htmlspecialchars($row['año de construccion'] ?? '');?>" required>
                                </div>

                                <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                                    <label>Número del contrato</label>
                                    <input type="text" name="numero_del_contrato" class="form-control" placeholder="Número del Contrato" value="<?php echo htmlspecialchars($row['numero del contrato'] ?? '');?>" required>
                                </div>

                                <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                                    <label>Rif comodatario</label>
                                    <input type="text" name="rif_comodatario" class="form-control" placeholder="RIF Comodatario" value="<?php echo htmlspecialchars($row['rif comodatario'] ?? '');?>" required>
                                </div>
                                
                                <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                                    <label>Estado de ocupación</label>
                                    <input type="text" name="estado_de_ocupacion" class="form-control" placeholder="Estado de Ocupación" value="<?php echo htmlspecialchars($row['estado de ocupacion'] ?? '');?>" required>
                                </div>
                                
                                <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                                    <label>Área de construcción</label>
                                    <input type="number" name="area_de_construccion" class="form-control" step="0.01" placeholder="Área de Construcción" value="<?php echo htmlspecialchars($row['area de construccion'] ?? '');?>" required>
                                </div>

                                <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                                    <label>Unidad de medida área</label>
                                    <input type="text" name="unidad_de_medida_area" class="form-control" placeholder="Unidad de Medida Área" value="<?php echo htmlspecialchars($row['unidad de medida area'] ?? '');?>" required>
                                </div>

                                <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                                    <label>Área del terreno</label>
                                    <input type="number" name="area_del_terreno" class="form-control" step="0.01" placeholder="Área del Terreno" value="<?php echo htmlspecialchars($row['area del terreno'] ?? '');?>" required>
                                </div>

                                <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                                    <label>Unidad medida área del terreno</label>
                                    <input type="text" name="unidad_medida_area_del_terreno" class="form-control" placeholder="Unidad de Medida Área Terreno" value="<?php echo htmlspecialchars($row['unidad medida area del terreno'] ?? '');?>" required>
                                </div>

                                <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                                    <label>Magnitud</label>
                                    <input type="text" name="magnitud" class="form-control" placeholder="Magnitud (ej: 1000m²)" value="<?php echo htmlspecialchars($row['magnitud'] ?? '');?>" required>
                                </div>

                                <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                                    <label>Uso actual</label>
                                    <input type="text" name="uso_actual" class="form-control" placeholder="Uso Actual (ej: Oficinas)" value="<?php echo htmlspecialchars($row['uso actual'] ?? '');?>" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                
                                <h5 class="mb-3 text-warning">Detalles del Inmueble (II)</h5>

                                <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                                    <label>Fecha inicio contrato</label>
                                    <input type="date" name="fecha_inicio_contrato" class="form-control" value="<?php echo htmlspecialchars($row['fecha inicio contrato'] ?? '');?>" required>
                                </div>

                                <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                                    <label>Fecha fin contrato</label>
                                    <input type="date" name="fecha_fin_contrato" class="form-control" value="<?php echo htmlspecialchars($row['fecha fin contrato'] ?? '');?>" required>
                                </div>

                                <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                                    <label>Oficina de registro inmueble</label>
                                    <input type="text" name="oficina_de_registro_inmueble" class="form-control" placeholder="Oficina de Registro" value="<?php echo htmlspecialchars($row['oficina de registro inmueble'] ?? '');?>" required>
                                </div>

                                <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                                    <label>Fecha registro inmueble</label>
                                    <input type="date" name="fecha_registro_inmueble" class="form-control" value="<?php echo htmlspecialchars($row['fecha registro inmueble'] ?? '');?>" required>
                                </div>

                                <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                                    <label>Número registro inmueble</label>
                                    <input type="text" name="numero_registro_inmueble" class="form-control" placeholder="Número de Registro" value="<?php echo htmlspecialchars($row['numero registro inmueble'] ?? '');?>" required>
                                </div>
                                
                                <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                                    <label>Tomo</label>
                                    <input type="text" name="tomo" class="form-control" placeholder="Tomo" value="<?php echo htmlspecialchars($row['tomo'] ?? '');?>" required>
                                </div>

                                <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                                    <label>Folio</label>
                                    <input type="text" name="folio" class="form-control" placeholder="Folio" value="<?php echo htmlspecialchars($row['folio'] ?? '');?>" required>
                                </div>

                                <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                                    <label>País</label>
                                    <input type="text" name="pais" class="form-control" placeholder="País" value="<?php echo htmlspecialchars($row['pais'] ?? '');?>" required>
                                </div>

                                <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                                    <label>Estado</label>
                                    <input type="text" name="estado" class="form-control" placeholder="Estado" value="<?php echo htmlspecialchars($row['estado'] ?? '');?>" required>
                                </div>

                                <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                                    <label>Municipio</label>
                                    <input type="text" name="municipio" class="form-control" placeholder="Municipio" value="<?php echo htmlspecialchars($row['municipio'] ?? '');?>" required>
                                </div>

                                <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                                    <label>Parroquia</label>
                                    <input type="text" name="parroquia" class="form-control" placeholder="Parroquia" value="<?php echo htmlspecialchars($row['parroquia'] ?? '');?>" required>
                                </div>

                                <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                                    <label>Urbanización/Sector</label>
                                    <input type="text" name="urbanizacion_sector" class="form-control" placeholder="Urbanización/Sector" value="<?php echo htmlspecialchars($row['urbanizacion/sector'] ?? '');?>" required>
                                </div>

                                <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                                    <label>Avenida/Calle</label>
                                    <input type="text" name="avenida_calle" class="form-control" placeholder="Avenida/Calle" value="<?php echo htmlspecialchars($row['avenida/calle'] ?? '');?>" required>
                                </div>

                                <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                                    <label>Casa/Edificio</label>
                                    <input type="text" name="casa_edificio" class="form-control" placeholder="Casa/Edificio" value="<?php echo htmlspecialchars($row['casa/edificio'] ?? '');?>" required>
                                </div>

                                <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                                    <label>Piso</label>
                                    <input type="text" name="piso" class="form-control" placeholder="Piso" value="<?php echo htmlspecialchars($row['piso'] ?? '');?>" required>
                                </div>

                                <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                                    <label>Localización</label>
                                    <input type="text" name="localizacion" class="form-control" placeholder="Localización" value="<?php echo htmlspecialchars($row['localizacion'] ?? '');?>" required>
                                </div>

                                <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                                    <label>Linderos norte</label>
                                    <input type="text" name="linderos_norte" class="form-control" placeholder="Linderos Norte" value="<?php echo htmlspecialchars($row['linderos norte'] ?? '');?>" required>
                                </div>

                                <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                                    <label>Linderos sur</label>
                                    <input type="text" name="linderos_sur" class="form-control" placeholder="Linderos Sur" value="<?php echo htmlspecialchars($row['linderos sur'] ?? '');?>" required>
                                </div>

                                <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                                    <label>Linderos este</label>
                                    <input type="text" name="linderos_este" class="form-control" placeholder="Linderos Este" value="<?php echo htmlspecialchars($row['linderos este'] ?? '');?>" required>
                                </div>

                                <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                                    <label>Linderos oeste</label>
                                    <input type="text" name="linderos_oeste" class="form-control" placeholder="Linderos Oeste" value="<?php echo htmlspecialchars($row['linderos oeste'] ?? '');?>" required>
                                </div>

                                <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                                    <label>Latitud coordenadas geograficas</label>
                                    <input type="text" name="latitud_coordenadas_geograficas" class="form-control" placeholder="Latitud" value="<?php echo htmlspecialchars($row['latitud coordenadas geograficas'] ?? '');?>" required>
                                </div>

                                <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                                    <label>Longitud coordenadas geograficas</label>
                                    <input type="text" name="longitud_coordenadas_geograficas" class="form-control" placeholder="Longitud" value="<?php echo htmlspecialchars($row['longitud coordenadas geograficas'] ?? '');?>" required>
                                </div>
                                
                            </div>
                        </div>
                        
                        <div class="mt-3">
                            <a href="register3.php" class="btn btn-danger"> Cancelar </a>
                            <button type="submit" name="updatebtn" class="btn btn-primary"> Actualizar </button>
                        </div>
                    
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
                echo '<a href="register3.php" class="btn btn-primary mt-3"> Volver a Registros </a>';
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