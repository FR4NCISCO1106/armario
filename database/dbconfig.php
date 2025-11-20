<?php

$server_name = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "adminpanel";

$connection = mysqli_connect($server_name,$db_username,$db_password);
$dbconfig = mysqli_select_db($connection,$db_name);

if(!$dbconfig) // Cambiado a !dbconfig para simplificar la lógica
{
  // Nota: Esto generará el HTML de error si la conexión falla.
  echo '
    <div class="container">
      <div class="row">
        <div class="col-md-6 mr-auto ml-auto text-center py-5 mt-5">
          <div class="card">
            <div class="card-body">
              <h1 class="card-title bg-warning">Database Connection Failed</h1>
              <h2 class="card-title"> </h2>
              <p class="card-text">The Page You are searching for is not Available</p>
              <a href="index.php" class="btn btn-primary">Go back to home page</a>
            </div>
          </div>
        </div>
      </div>
    </div>  
  ';

  exit(); 
}
?>