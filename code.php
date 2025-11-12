<?php
session_start();

$connection = mysqli_connect("localhost","root","","adminpanel");

// 1. Verificar la conexión
if (!$connection) {
    $_SESSION['status'] = "Error de conexión a la base de datos: " . mysqli_connect_error();
    header('Location: register.php');
    exit();
}

// LÓGICA DE REGISTRO (INSERT)
if(isset($_POST['registerbtn']))
{
    // Limpieza de datos
    $id = mysqli_real_escape_string($connection, $_POST['id'] ?? '');
    $unidad_administrativa = mysqli_real_escape_string($connection, $_POST['unidad_administrativa'] ?? '');
    $codigo_interno_del_bien = mysqli_real_escape_string($connection, $_POST['codigo_interno_del_bien'] ?? '');
    $descripcion = mysqli_real_escape_string($connection, $_POST['descripcion'] ?? '');
    $forma_adquisicion = mysqli_real_escape_string($connection, $_POST['forma_adquisicion'] ?? '');
    $fecha_adquisicion = mysqli_real_escape_string($connection, $_POST['fecha_adquisicion'] ?? '');
    $n_documento = mysqli_real_escape_string($connection, $_POST['n_documento'] ?? '');
    $valor_adquisicion = mysqli_real_escape_string($connection, $_POST['valor_adquisicion'] ?? '');
    $moneda = mysqli_real_escape_string($connection, $_POST['moneda'] ?? '');
    $estado_del_uso_del_bien = mysqli_real_escape_string($connection, $_POST['estado_del_uso_del_bien'] ?? '');
    $condicion_fisica = mysqli_real_escape_string($connection, $_POST['condicion_fisica'] ?? ''); 
    $marca = mysqli_real_escape_string($connection, $_POST['marca'] ?? '');
    $modelo = mysqli_real_escape_string($connection, $_POST['modelo'] ?? '');
    $color = mysqli_real_escape_string($connection, $_POST['color'] ?? '');
    $categoria_general = mysqli_real_escape_string($connection, $_POST['categoria_general'] ?? '');
    $subcategoria = mysqli_real_escape_string($connection, $_POST['subcategoria'] ?? '');
    $categoria_especifica = mysqli_real_escape_string($connection, $_POST['categoria_especifica'] ?? '');
    $sede = mysqli_real_escape_string($connection, $_POST['sede'] ?? '');


    // 1. VERIFICAR DUPLICIDAD DEL ID
    $check_query = "SELECT id FROM register WHERE id='$id'";
    $check_run = mysqli_query($connection, $check_query);

    if (mysqli_num_rows($check_run) > 0) {
        // ID DUPLICADO DETECTADO
        $_SESSION['status'] = "Error: Ya existe un registro con el ID **{$id}**. Por favor, ingrese uno diferente.";
        header('Location: register.php');
        exit();
    } 
    // Si no es duplicado, procede al INSERT
    else 
    {
        // Consulta SQL INSERT (usando backticks en columnas con espacios)
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
          // Éxito: Añadir (verde)
          $_SESSION['success'] = "Articulo de inventario añadido con éxito.";
          header('Location: register.php');
        }
        else
        {
          // Este ELSE manejará cualquier otro error SQL (ej. error de sintaxis)
          $_SESSION['status'] = "Error al añadir el artículo: " . mysqli_error($connection);
          header('Location: register.php');
        }
    }
}


// LÓGICA DE ACTUALIZACIÓN (UPDATE)
if(isset($_POST['updatebtn']))
{
  // Limpieza de datos (usando $_POST['edit_...'])
  $id = mysqli_real_escape_string($connection, $_POST['edit_id'] ?? '');
  $unidad_administrativa = mysqli_real_escape_string($connection, $_POST['edit_unidad_administrativa'] ?? '');
  $codigo_interno_del_bien = mysqli_real_escape_string($connection, $_POST['edit_codigo_interno_del_bien'] ?? '');
  $descripcion = mysqli_real_escape_string($connection, $_POST['edit_descripcion'] ?? '');
  $forma_adquisicion = mysqli_real_escape_string($connection, $_POST['edit_forma_adquisicion'] ?? '');
  $fecha_adquisicion = mysqli_real_escape_string($connection, $_POST['edit_fecha_adquisicion'] ?? '');
  $n_documento = mysqli_real_escape_string($connection, $_POST['edit_n_documento'] ?? '');
  $valor_adquisicion = mysqli_real_escape_string($connection, $_POST['edit_valor_adquisicion'] ?? '');
  $moneda = mysqli_real_escape_string($connection, $_POST['edit_moneda'] ?? '');
  $estado_del_uso_del_bien = mysqli_real_escape_string($connection, $_POST['edit_estado_del_uso_del_bien'] ?? '');
  $condicion_fisica = mysqli_real_escape_string($connection, $_POST['edit_condicion_fisica'] ?? '');
  $marca = mysqli_real_escape_string($connection, $_POST['edit_marca'] ?? '');
  $modelo = mysqli_real_escape_string($connection, $_POST['edit_modelo'] ?? '');
  $color = mysqli_real_escape_string($connection, $_POST['edit_color'] ?? '');
  $categoria_general = mysqli_real_escape_string($connection, $_POST['edit_categoria_general'] ?? '');
  $subcategoria = mysqli_real_escape_string($connection, $_POST['edit_subcategoria'] ?? '');
  $categoria_especifica = mysqli_real_escape_string($connection, $_POST['edit_categoria_especifica'] ?? '');
  $sede = mysqli_real_escape_string($connection, $_POST['edit_sede'] ?? '');
  

  // Consulta SQL UPDATE (CORREGIDA con backticks y nombres de columna correctos)
  $query = "UPDATE register SET 
    `unidad administrativa`='$unidad_administrativa', 
    `codigo interno del bien`='$codigo_interno_del_bien', 
    `descripcion`='$descripcion', 
    `forma adquisicion`='$forma_adquisicion', 
    `fecha adquisicion`='$fecha_adquisicion', 
    `n° documento`='$n_documento', 
    `valor adquisicion`='$valor_adquisicion', 
    `moneda`='$moneda', 
    `estado del uso del bien`='$estado_del_uso_del_bien', 
    `condicion fisica`='$condicion_fisica', 
    `marca`='$marca', 
    `modelo`='$modelo', 
    `color`='$color', 
    `categoria general`='$categoria_general', 
    `subcategoria`='$subcategoria', 
    `categoria especifica`='$categoria_especifica', 
    `sede`='$sede' 
    WHERE id='$id'";
    
  $query_run = mysqli_query($connection, $query);

  if($query_run)
  {
    // Éxito: Actualizar (verde)
    $_SESSION['success'] = "Tus datos se han actualizado.";
    header('Location: register.php');
  }
  else{
    $_SESSION['status'] = "Tus datos no están actualizados. Error: " . mysqli_error($connection);
    header('Location: register.php');
  }
}

// LÓGICA DE BORRADO (DELETE) - ***MODIFICACIÓN AQUÍ***
if(isset($_POST['delete_btn']))
{
    $id = mysqli_real_escape_string($connection, $_POST['delete_id']);
    
    $query = "DELETE FROM register WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        // *** CAMBIO CLAVE: Usar 'delete_success' para el borrado (lo mostrará en azul) ***
        $_SESSION['delete_success'] = "El registro con ID *{$id}* ha sido eliminado.";
        header('Location: register.php');
    }
    else
    {
        $_SESSION['status'] = "Error al intentar eliminar el registro: " . mysqli_error($connection);
        header('Location: register.php');
    }
}


if(isset($_POST['delete_btn']))
{

}
?>