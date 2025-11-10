<?php
session_start();

$connection = mysqli_connect("localhost","root","","adminpanel");

// 1. Verificar la conexión
if (!$connection) {
    $_SESSION['status'] = "Error de conexión a la base de datos: " . mysqli_connect_error();
    header('Location: register.php');
    exit();
}

if(isset($_POST['registerbtn']))
{
    // Usamos el operador ?? para asegurar que todas las variables se definan
    // ¡IMPORTANTE! Usamos mysqli_real_escape_string para seguridad (Inyección SQL)
    $id = mysqli_real_escape_string($connection, $_POST['id'] ?? '');
    $unidad_administrativa = mysqli_real_escape_string($connection, $_POST['unidad administrativa'] ?? '');
    $codigo_interno_del_bien = mysqli_real_escape_string($connection, $_POST['codigo interno del bien'] ?? '');
    $descripcion = mysqli_real_escape_string($connection, $_POST['descripcion'] ?? '');
    $forma_adquisicion = mysqli_real_escape_string($connection, $_POST['forma adquisicion'] ?? '');
    $fecha_adquisicion = mysqli_real_escape_string($connection, $_POST['fecha adquisicion'] ?? '');
    $n_documento = mysqli_real_escape_string($connection, $_POST['n° documento'] ?? ''); 
    $valor_adquisicion = mysqli_real_escape_string($connection, $_POST['valor adquisicion'] ?? '');
    $moneda = mysqli_real_escape_string($connection, $_POST['moneda'] ?? '');
    $estado_del_uso_del_bien = mysqli_real_escape_string($connection, $_POST['estado del uso del bien'] ?? '');
    $condicion_fisica = mysqli_real_escape_string($connection, $_POST['condicion fisica'] ?? ''); 
    $marca = mysqli_real_escape_string($connection, $_POST['marca'] ?? '');
    $modelo = mysqli_real_escape_string($connection, $_POST['modelo'] ?? '');
    $color = mysqli_real_escape_string($connection, $_POST['color'] ?? '');
    $categoria_general = mysqli_real_escape_string($connection, $_POST['categoria general'] ?? '');
    $subcategoria = mysqli_real_escape_string($connection, $_POST['subcategoria'] ?? '');
    $categoria_especifica = mysqli_real_escape_string($connection, $_POST['categoria especifica'] ?? '');
    $sede = mysqli_real_escape_string($connection, $_POST['sede'] ?? '');


    // Consulta SQL
    // Se mantienen las comillas invertidas (backticks) para los nombres de columna con espacios.
    $query = "INSERT INTO register 
    (`id`, `unidad administrativa`, `codigo interno del bien`, `descripcion`, `forma adquisicion`, `fecha adquisicion`, 
    `n° documento`, `valor adquisicion`, `moneda`, `estado del uso del bien`, `condicion fisica`, `marca`, 
    `modelo`, `color`, `categoria general`, `subcategoria`, `categoria especifica`, `sede`) 
    VALUES 
    ('$id', '$unidad_administrativa', '$codigo_interno_del_bien', '$descripcion', '$forma_adquisicion', 
    '$fecha_adquisicion', '$n_documento', '$valor_adquisicion', '$moneda', '$estado_del_uso_del_bien', 
    '$condicion_fisica', '$marca', '$modelo', '$color', '$categoria_general', '$subcategoria', 
    '$categoria_especifica', '$sede')";
    
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
      $_SESSION['success'] = "Articulo de inventario añadido con éxito.";
      header('Location: register.php');
    }
    else
    {
      $_SESSION['status'] = "Error al añadir el artículo: " . mysqli_error($connection);
      header('Location: register.php');
    }
}
?>