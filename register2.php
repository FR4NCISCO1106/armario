<?php
session_start();
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
      <form action="code2.php" method="POST">
        
        <div class="modal-body row bg-light p-4"> 

            <div class="col-md-6 border-right"> <h5 class="mb-3 text-success">Información Básica</h5>
                
                <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                    <label>ID</label>
                    <input type="text" name="id" class="form-control" placeholder="ID (ej: 001)" required>
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
                    <label>Valor adquisición</label>
                    <input type="number" name="valor_adquisicion" class="form-control" step="0.01" placeholder="Valor (ej: 1500.00)" required>
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
                
            </div>

            <div class="col-md-6">
                <h5 class="mb-3 text-success">Características del Bien</h5>

                <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                    <label>Estado del uso del bien</label>
                    <select name="estado_del_uso_del_bien" class="form-control" required>
                        <option value="">Seleccionar estado...</option>
                        <option value="En uso">En uso</option>
                        <option value="Almacenado">Almacenado</option>
                        <option value="Proceso de baja">Proceso de baja</option>
                    </select>
                </div>

                <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                    <label>Condición física</label>
                    <select name="condicion_fisica" class="form-control" required>
                        <option value="">Seleccionar condición...</option>
                        <option value="Excelente">Excelente</option>
                        <option value="Buena">Buena</option>
                        <option value="Regular">Regular</option>
                        <option value="Mala">Mala</option>
                    </select>
                </div>

                <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                    <label>Marca</label>
                    <input type="text" name="marca" class="form-control" placeholder="Marca (ej: Dell, HP)" required>
                </div>

                <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                    <label>Modelo</label>
                    <input type="text" name="modelo" class="form-control" placeholder="Modelo (ej: Latitude 5400)" required>
                </div>

                <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                    <label>Color</label>
                    <input type="text" name="color" class="form-control" placeholder="Color (ej: Negro)" required>
                </div>
                
                <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                    <label>Año fabricación</label>
                    <input type="text" name="año_fabricacion" class="form-control" placeholder="Año (ej: 2001)" required>
                </div> 

                <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                    <label>Serial carroceria</label>
                    <input type="text" name="serial_carroceria" class="form-control" placeholder="Serial Carrocería (ej: 1GCHEVYABC1234567)" required>
                </div>

                <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                    <label>Serial motor</label>
                    <input type="text" name="serial_motor" class="form-control" placeholder="Serial Motor (ej: 1GCHEVYABC1234567)" required>
                </div>

                <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                    <label>Placas</label>
                    <input type="text" name="placas" class="form-control" placeholder="Placas (ej: AA00001)" required>
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
                
                <div class="form-group mb-3 p-2 bg-white rounded shadow-sm border border-light">
                    <label>Sede</label>
                    <select name="sede" class="form-control" required>
                        <option value="">Seleccionar sede...</option>
                        <option value="Sede Principal">Sede Principal</option>
                        <option value="Sucursal Norte">Sucursal Norte</option>
                        <option value="Sucursal Sur">Sucursal Sur</option>
                    </select>
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

<div class="card shadaow mb-4">
  <div class="card-header py-3">
    <br>
        <form
class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
<div class="input-group">
<input type="text" name="search_query" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
<div class="input-group-append">
<button class="btn btn-success" type="submit">
  <i class="fas fa-search fa-sm"></i>
  </button>
  </div>
  </div>
  </form>
  <br>
  <br>
    <h6 class="m-0 font-weight-bold text-success" >
      
      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addadminprofile">
  Agregar productos de inventario
</button>
</h6>
</div>

  <div class="card-body">
    <?php
      if(isset($_SESSION['success']) && $_SESSION['success'] !='')
      {
        echo '<div class="alert alert-success" role="alert">'.$_SESSION['success'].'</div>';
        unset($_SESSION['success']);
      }

      if(isset($_SESSION['status']) && $_SESSION['status'] !='')
      {
        echo '<div class="alert alert-danger" role="alert">'.$_SESSION['status'].'</div>';
        unset($_SESSION['status']);
      }
      
      if(isset($_SESSION['delete_success']) && $_SESSION['delete_success'] !='')
      {
        echo '<div class="alert alert-warning" role="alert">'.$_SESSION['delete_success'].'</div>';
        unset($_SESSION['delete_success']);
      }
    ?>

    <style>
      .text-wrap-fix {
        white-space: normal;
        word-wrap: break-word;
      }
    </style>
    <div class="table-responsive">
      <?php
        $connection = mysqli_connect("localhost","root","","adminpanel");

        $query = "SELECT * FROM register2";
        $query_run = mysqli_query($connection, $query);
      ?>

    <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th>ID</th>
          <th class="text-wrap-fix" style="width: 120px;">Unidad administrativa</th>
          <th class="text-wrap-fix" style="width: 80px;">Codigo interno del bien</th>
          <th>Descripcion</th>
          <th class="text-wrap-fix" style="width: 80px;">Forma adquisicion</th>
          <th class="text-wrap-fix" style="width: 80px;">Fecha adquisicion</th>
          <th class="text-wrap-fix" style="width: 80px;">N° documento</th>
          <th class="text-wrap-fix" style="width: 80px;">Valor adquisicion</th>
          <th>Moneda</th>
          <th class="text-wrap-fix" style="width: 120px;">Estado del uso del bien</th>
          <th class="text-wrap-fix" style="width: 120px;">Condicion fisica</th>
          <th>Marca</th>
          <th>Modelo</th>
          <th>Color</th>
          <th class="text-wrap-fix" style="width: 80px;">Año fabricacion</th>
          <th class="text-wrap-fix" style="width: 100px;">Serial carroceria</th>
          <th class="text-wrap-fix" style="width: 100px;">Serial motor</th>
          <th>Placas</th>
          <th class="text-wrap-fix" style="width: 120px;">Categoria general</th>
          <th class="text-wrap-fix" style="width: 80px;">Subcategoria</th>
          <th class="text-wrap-fix" style="width: 80px;">Categoria especifica</th>
          <th>Sede</th>
          <th>EDITAR</th>
          <th>BORRAR</th>
        </tr>
      </thead>
      <tbody>
      <?php
      if(mysqli_num_rows($query_run) > 0)
      {
        while($row = mysqli_fetch_assoc($query_run))
        {
      ?>
        <tr>
          <td><?php echo $row['id']; ?></td>
          <td><?php echo $row['unidad administrativa']; ?></td>
          <td><?php echo $row['codigo interno del bien']; ?></td>
          <td><?php echo $row['descripcion']; ?></td>
          <td><?php echo $row['forma adquisicion']; ?></td>
          <td><?php echo $row['fecha adquisicion']; ?></td>
          <td><?php echo $row['n° documento']; ?></td>
          <td><?php echo $row['valor adquisicion']; ?></td>
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
            <form action="register_edit2.php" method="post">
              <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
              <button type="submit" name="edit_btn" class="btn btn-success btn-sm"><i class="fas fa-edit"></i>EDITAR</button>
            </form>
          </td>
          <td>
            <form action="code2.php" method="post">
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
<a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
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
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>


<?php
  include('includes/script.php');
  include('includes/footer.php');
?>