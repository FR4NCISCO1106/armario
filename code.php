<?php
session_start();

$connection = mysqli_connect("localhost","root","","adminpanel");

if(isset($_POST['registerbtn']))
{
    $id = $_POST['id'];
    $unidad_administrativa = $_POST['unidad administrativa'];
    $codigo_interno_del_bien = $_POST['codigo interno del bien'];
    $descripcion = $_POST['descripcion'];
    $forma_adquisicion = $_POST['forma adquisicion'];
    $fecha_adquisicion = $_POST['fecha adquisicion'];
    $n°_documento = $_POST['n° documento'];
    $valor_adquisicion = $_POST['valor adquisicion'];
    $moneda = $_POST['moneda'];
    $estado_del_uso_del_bien = $_POST['estado del uso del bien'];
    $condicion_fisica = $_POST['condicion fisica'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $color = $_POST['color'];
    $categoria_general = $_POST['categoria general'];
    $subcategoria = $_POST['subcategoria'];
    $categoria_especifica = $_POST['categoria especifica'];
    $sede = $_POST['sede'];

    if($password === $cpassword)
    {
        $query = "INSERT INTO register 
        (`id`, `unidad administrativa`, `codigo interno del bien`, `descripcion`, `forma adquisición`, `fecha adquisicion`, 
        `n° documento`, `valor adquisicion`, `moneda`, `estado del uso del bien`, `condicion fisica`, `marca`, 
        `modelo`, `color`, `categoria general`, `subcategoria`, `categoria especifica`, `sede`) 
        VALUES 
        ('$id', '$unidad_administrativa', '$codigo_interno_del_bien', '$descripcion', '$forma_adquisicion', 
        '$fecha_adquisicion', '$n°_documento', '$valor_adquisicion', '$moneda', '$estado_del_uso_del_bien', 
        '$condición_fisica', '$marca', '$modelo', '$color', '$categoria_general', '$subcategoria', 
        '$categoria_especifica', '$sede')";
        
        $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
      //echo "Guardar"
      $_SESSION['success'] = "Perfil de administrador añadido";
      header('Location: register.php');
    }
    else
    {
      $_SESSION['status'] = "Perfil de administrador no añadido";
      header('Location: register.php');
    }
    }
else
{
  $_SESSION['status'] = "La contraseña y la confirmación de contraseña no coinciden.";
  header('Location: register.php'); 
}

}
?>