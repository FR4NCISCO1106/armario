<?php
session_start();
  include('includes/header.php');
  include('includes/navbar.php');
?>


<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar datos de administrador</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">

        

        <div class="modal-body">

            <div class="form-group">
                <label> Usuario </label>
                <input type="text" name="username" class="form-control" placeholder="Enter Username">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control checking_email" placeholder="Enter Email">
                <small class="error_email" style="color: red;"></small>
            </div>
            <div class="form-group">
                <label>Contraseña</label>
                <input type="password" name="password" class="form-control" placeholder="Enter Password">
            </div>
            <div class="form-group">
                <label>Confirmar contraseña</label>
                <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password">
            </div>


        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" name="registerbtn" class="btn btn-primary">Salvar</button>
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
    <button class="btn btn-primary" type="submit">
      <i class="fas fa-search fa-sm"></i>
      </button>
      </div>
      </div>
      </form>
      <br>
      <br>
        <h6 class="m-0 font-weight-bold text-primary" >
          
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
      Agregar productos de inventario
</button>
</h6>
</div>
<div class="card-body">

<?php
  if(isset($_SESSION['success']) && $_SESSION['success'] !='' )
  {
    echo '<h2>'.$_SESSION['success'].'</h2>';
    unset($_SESSION['success']);
  }

    if(isset($_SESSION['status']) && $_SESSION['status'] !='' )
  {
    echo '<h2 class="bg-info">'.$_SESSION['status'].'</h2>';
    unset($_SESSION['status']);
  }

?>

  <div class="table-responsive">

<?php
    $connection = mysqli_connect("localhost","root","","adminpanel");

    $search = "";
    $query = "SELECT * FROM register"; 

    if(isset($_GET['search_query']) && !empty($_GET['search_query'])) {
        $search = mysqli_real_escape_string($connection, $_GET['search_query']); 
        $query = "SELECT * FROM register 
        WHERE username LIKE '%$search%' 
        OR email LIKE '%$search%' 
        OR id LIKE '%$search%'"; 
    }
    $query_run = mysqli_query($connection, $query);
    
?>

    <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th>ID</th>
          <th style="width: 100px;">Unidad administrativa</th>
          <th style="width: 100px;">Codigo interno del bien</th>
          <th>Descripción</th>
          <th style="width: 100px;">Forma adquisición</th>
          <th style="width: 100px;">Fecha adquisición</th>
          <th style="width: 100px;">Valor adquisición</th>
          <th style="width: 90px;">N° documento</th>
          <th>Moneda</th>
          <th style="width: 100px;">Estado del uso del bien</th>
          <th style="width: 100px;">Condición física</th>
          <th>Marca</th>
          <th>Modelo</th>
          <th>Color</th>
          <th style="width: 100px;">Categoria general</th>
          <th style="width: 100px;">Subcategoria</th>
          <th style="width: 100px;">Categoria especifica</th>
          <th>Sede</th>
          <th>Editar</th>
          <th>Borrar</th>
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
          <td><?php echo $row['id'];?></td>
          <td><?php echo $row['unidad administrativa'];?></td>
          <td><?php echo $row['codigo interno del bien'];?></td>
          <td><?php echo $row['descripcion'];?></td>
          <td><?php echo $row['forma adquisicion'];?></td>
          <td><?php echo $row['fecha adquisicion'];?></td>
          <td><?php echo $row['n° documento'];?></td>
          <td><?php echo $row['valor adquisicion'];?></td>
          <td><?php echo $row['moneda'];?></td>
          <td><?php echo $row['estado del uso del bien'];?></td>
          <td><?php echo $row['condicion fisica'];?></td>
          <td><?php echo $row['marca'];?></td>
          <td><?php echo $row['modelo'];?></td>
          <td><?php echo $row['color'];?></td>
          <td><?php echo $row['categoria general'];?></td>
          <td><?php echo $row['subcategoria'];?></td>
          <td><?php echo $row['categoria especifica'];?></td>
          <td><?php echo $row['sede'];?></td>
          <td>
            <button type="submit" class="btn btn-success btn-sm" >EDITAR</button>
          </td>
          <td>
            <button type="submit" class="btn btn-danger btn-sm" >BORRAR</button>
          </td>
        </tr>
      <?php
        } 
      } 
      else
      {
        echo "No record Found";
      }

        ?>
      </tbody>
    </table>
    </div>
  </div>
</div>

</div> 
</div> 
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