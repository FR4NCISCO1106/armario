<?php
include('security.php');
date_default_timezone_set('America/Caracas'); // Asegura la hora correcta para el log

// =========================================================================
// LÓGICA DE REGISTRO (INSERT)
// =========================================================================
if(isset($_POST['registerbtn']))
{
    // Limpieza de datos (Asegúrate de que estas variables coincidan con tu formulario)
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
    $ubicacion_del_bien = mysqli_real_escape_string($connection, $_POST['ubicacion_del_bien'] ?? '');
    $categoria_general = mysqli_real_escape_string($connection, $_POST['categoria_general'] ?? '');
    $subcategoria = mysqli_real_escape_string($connection, $_POST['subcategoria'] ?? '');
    $categoria_especifica = mysqli_real_escape_string($connection, $_POST['categoria_especifica'] ?? '');
    $sede = mysqli_real_escape_string($connection, $_POST['sede'] ?? '');
    
    // Consulta de inserción - CORREGIDO a `ubicaciondelbien`
    $query = "INSERT INTO register (`id`, `unidad administrativa`, `codigo interno del bien`, `descripcion`, `forma adquisicion`, `fecha adquisicion`, `N. Documento`, `valor adquisicion`, `moneda`, `estado del uso del bien`, `condicion fisica`, `ubicaciondelbien`, `categoria general`, `subcategoria`, `categoria especifica`, `sede`) 
        VALUES ('$id', '$unidad_administrativa', '$codigo_interno_del_bien', '$descripcion', '$forma_adquisicion', '$fecha_adquisicion', '$n_documento', '$valor_adquisicion', '$moneda', '$estado_del_uso_del_bien', '$condicion_fisica', '$ubicacion_del_bien', '$categoria_general', '$subcategoria', '$categoria_especifica', '$sede')";

    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['success'] = "El nuevo artículo ha sido agregado con éxito.";
        header('Location: register.php');
    }
    else 
    {
        $_SESSION['status'] = "No se pudo agregar el artículo. Error: " . mysqli_error($connection);
        header('Location: register.php');
    }
}

// =========================================================================
// LÓGICA DE ACTUALIZACIÓN (UPDATE) - CON REGISTRO DE AUDITORÍA
// =========================================================================

if(isset($_POST['updatebtn']))
{
    // 1. Saneamiento de datos
    $id = mysqli_real_escape_string($connection, $_POST['edit_id'] ?? $_POST['id'] ?? '');

    // Variables de todos los campos del formulario, limpias y listas para usar
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
    $ubicacion_del_bien = mysqli_real_escape_string($connection, $_POST['edit_ubicacion_del_bien'] ?? '');

    // 🚩 CORRECCIÓN: Inicialización de variables para evitar "Undefined variable"
    $marca = mysqli_real_escape_string($connection, $_POST['edit_marca'] ?? ''); 
    $modelo = mysqli_real_escape_string($connection, $_POST['edit_modelo'] ?? ''); 
    $color = mysqli_real_escape_string($connection, $_POST['edit_color'] ?? '');
    
    $categoria_general = mysqli_real_escape_string($connection, $_POST['edit_categoria_general'] ?? '');
    $subcategoria = mysqli_real_escape_string($connection, $_POST['edit_subcategoria'] ?? '');
    $categoria_especifica = mysqli_real_escape_string($connection, $_POST['edit_categoria_especifica'] ?? '');
    $sede = mysqli_real_escape_string($connection, $_POST['edit_sede'] ?? '');
    
    // 2. OBTENER DATOS ACTUALES ANTES DE LA ACTUALIZACIÓN
    $current_query = "SELECT * FROM register WHERE id='$id' LIMIT 1";
    $current_run = mysqli_query($connection, $current_query);
    $old_data = $current_run ? mysqli_fetch_assoc($current_run) : [];

    // 3. OBTENER LA FECHA Y HORA ACTUAL PARA EL UPDATE Y EL LOG
    $current_datetime = date('Y-m-d H:i:s'); 


    $new_data_map = [
        'unidad administrativa' => $unidad_administrativa,
        'codigo interno del bien' => $codigo_interno_del_bien,
        'descripcion' => $descripcion,
        'forma adquisicion' => $forma_adquisicion,
        'fecha adquisicion' => $fecha_adquisicion,
        'N° Documento' => $n_documento, 
        'valor adquisicion' => $valor_adquisicion,
        'moneda' => $moneda,
        'estado del uso del bien' => $estado_del_uso_del_bien,
        'condicion fisica' => $condicion_fisica,
        'marca' => $marca, // CORREGIDO
        'modelo' => $modelo, // CORREGIDO
        'color' => $color, // CORREGIDO
        'categoria general' => $categoria_general,
        'subcategoria' => $subcategoria,
        'categoria especifica' => $categoria_especifica,
        'sede' => $sede,
    ];

    $log_description = $descripcion; 

    // 4. COMPARAR E INSERTAR REGISTROS DE AUDITORÍA
    if (!empty($old_data)) {
        foreach ($new_data_map as $column_name => $new_value) {
            
            // Verifica si la columna existe en los datos viejos y si el valor cambió
            if (isset($old_data[$column_name]) && $old_data[$column_name] != $new_value) {
                
                $old_value = mysqli_real_escape_string($connection, $old_data[$column_name]);
                $new_value_sanitized = mysqli_real_escape_string($connection, $new_value);

                // Insertar el cambio en la tabla de log
                $log_query = "INSERT INTO log_ediciones 
                    (tabla, registro_id, descripcion_bien, campo_modificado, valor_anterior, valor_nuevo, fecha_modificacion)
                    VALUES 
                    ('register', '$id', '$log_description', '$column_name', '$old_value', '$new_value_sanitized', '$current_datetime')";
                
                // Ejecutar la inserción en el log
                mysqli_query($connection, $log_query);
            }
        }
    }

    // 5. EJECUTAR LA CONSULTA DE ACTUALIZACIÓN ORIGINAL (¡Sintaxis SQL CORREGIDA!)
    $query = "UPDATE register SET 
        `unidad administrativa` = '$unidad_administrativa',
        `codigo interno del bien` = '$codigo_interno_del_bien',
        `descripcion` = '$descripcion',
        `forma adquisicion` = '$forma_adquisicion',
        `fecha adquisicion` = '$fecha_adquisicion',
        `N° Documento` = '$n_documento', 
        `valor adquisicion` = '$valor_adquisicion',
        `moneda` = '$moneda',
        `estado del uso del bien` = '$estado_del_uso_del_bien',
        `condicion fisica` = '$condicion_fisica',
        `marca` = '$marca',
        `modelo` = '$modelo',
        `color` = '$color',
        `categoria general` = '$categoria_general',
        `subcategoria` = '$subcategoria',
        `categoria especifica` = '$categoria_especifica',
        `sede` = '$sede',
        
        fecha_edicion='$current_datetime'  
        
        WHERE id='$id'";

    $query_run = mysqli_query($connection, $query); // <--- LÍNEA 145/149 APROX.

    if($query_run)
    {
        $_SESSION['success'] = "Tus datos se han actualizado (Muebles/Inmuebles).";
        header('Location: register.php');
    }
    else{
        $_SESSION['status'] = "Tus datos no están actualizados. Error: " . mysqli_error($connection);
        header('Location: register.php');
    }
}

// =========================================================================
// LÓGICA DE BORRADO (DELETE) y LOGIN (se mantienen)
// =========================================================================

if(isset($_POST['delete_btn']))
{
    $id = mysqli_real_escape_string($connection, $_POST['delete_id']);
    
    $query = "DELETE FROM register WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['delete_success'] = "El registro con ID *{$id}* ha sido eliminado.";
        header('Location: register.php');
    }
    else
    {
        $_SESSION['status'] = "Error al intentar eliminar el registro: " . mysqli_error($connection);
        header('Location: register.php');
    }
}


if(isset($_POST['login_btn']))
{
  $username_login = mysqli_real_escape_string($connection, $_POST['username'] ?? ''); 
  $password_login = mysqli_real_escape_string($connection, $_POST['password'] ?? '');


  if (empty($username_login) || empty($password_login)) {
      $_SESSION['status'] = "Por favor, complete ambos campos (Usuario y Contraseña).";
      header('Location: login.php');
      exit(); 
  }


  $query = "SELECT * FROM users WHERE usuario='$username_login' AND contraseña='$password_login' ";
  $query_run = mysqli_query($connection, $query);
  
  if($query_run) 
  {
      if(mysqli_num_rows($query_run) > 0)
      {

          $_SESSION['username'] = $username_login;
          $_SESSION['success'] = "¡Bienvenido de nuevo!";
          header('Location: index.php'); 
      }
      else
      {
          $_SESSION['status'] = "Usuario o Contraseña Inválidos";
          header('Location: login.php');
      }
  }
}
?>