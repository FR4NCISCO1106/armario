<?php
session_start();

// Deshabilitar la verificación de conexión en el servidor si no es estrictamente necesario,
// ya que si falla la conexión, el script terminará.
$connection = mysqli_connect("localhost","root","","adminpanel");

// 1. Verificar la conexión
if (!$connection) {
    $_SESSION['status'] = "Error de conexión a la base de datos: " . mysqli_connect_error();
    header('Location: register2.php');
    exit();
}

// LÓGICA DE REGISTRO (INSERT)
if(isset($_POST['registerbtn']))
{
    // Limpieza de datos (Asegúrate de que estas variables coincidan con los nombres del formulario)
    $id = mysqli_real_escape_string($connection, $_POST['id'] ?? '');
    // ... [Otras variables, que no se muestran para brevedad] ...
    $serial_carroceria = mysqli_real_escape_string($connection, $_POST['serial_carroceria'] ?? '');
    $serial_motor = mysqli_real_escape_string($connection, $_POST['serial_motor'] ?? '');
    $placas = mysqli_real_escape_string($connection, $_POST['placas'] ?? '');
    // ... [Resto de variables] ...
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
    $año_fabricacion = mysqli_real_escape_string($connection, $_POST['año_fabricacion'] ?? '');
    $categoria_general = mysqli_real_escape_string($connection, $_POST['categoria_general'] ?? '');
    $subcategoria = mysqli_real_escape_string($connection, $_POST['subcategoria'] ?? '');
    $categoria_especifica = mysqli_real_escape_string($connection, $_POST['categoria_especifica'] ?? '');
    $sede = mysqli_real_escape_string($connection, $_POST['sede'] ?? '');
    // FIN DE LIMPIEZA DE DATOS


    // 1. VERIFICAR DUPLICIDAD DE TODOS LOS CAMPOS ÚNICOS EN UNA SOLA CONSULTA
    $check_query = "SELECT id, `serial carroceria`, `serial motor`, placas FROM register2 
                    WHERE id='$id' 
                    OR `serial carroceria`='$serial_carroceria'
                    OR `serial motor`='$serial_motor'
                    OR placas='$placas'
                    LIMIT 1"; // LIMIT 1 hace que sea más eficiente
                    
    $check_run = mysqli_query($connection, $check_query);

    if (mysqli_num_rows($check_run) > 0) {
        $existing_row = mysqli_fetch_assoc($check_run);
        
        // Determinar qué campo es el duplicado para el mensaje de error
        $error_message = "Error: El registro no pudo ser creado. ";
        
        if ($existing_row['id'] === $id) {
            $error_message = "Error: Ya existe un registro con el **ID ({$id})**. Por favor, ingrese uno diferente.";
        } elseif ($existing_row['serial carroceria'] === $serial_carroceria) {
            $error_message = "Error: El **Serial Carrocería ({$serial_carroceria})** ya está registrado en otro artículo.";
        } elseif ($existing_row['serial motor'] === $serial_motor) {
            $error_message = "Error: El **Serial Motor ({$serial_motor})** ya está registrado en otro artículo.";
        } elseif ($existing_row['placas'] === $placas) {
            $error_message = "Error: La **Placa ({$placas})** ya está registrada en otro artículo.";
        } else {
            // Este caso es de respaldo si la lógica de comparación falla, aunque es raro.
            $error_message = "Error: Uno de los campos únicos (ID, Serial Carrocería, Serial Motor o Placas) ya existe en la base de datos.";
        }
        
        $_SESSION['status'] = $error_message;
        header('Location: register2.php');
        exit();
    } 
    // Si no es duplicado, procede al INSERT
    else 
    {
        // Consulta SQL INSERT
        $query = "INSERT INTO register2 
        (`id`, `unidad administrativa`, `codigo interno del bien`, `descripcion`, `forma adquisicion`, `fecha adquisicion`, 
        `n° documento`, `valor adquisicion`, `moneda`, `estado del uso del bien`, `condicion fisica`, `marca`, 
        `modelo`, `color`, `año fabricacion`, `serial carroceria`, `serial motor`, `placas`, `categoria general`, `subcategoria`, `categoria especifica`, `sede`) 
        VALUES 
        ('$id', '$unidad_administrativa', '$codigo_interno_del_bien', '$descripcion', '$forma_adquisicion', 
        '$fecha_adquisicion', '$n_documento', '$valor_adquisicion', '$moneda', '$estado_del_uso_del_bien', 
        '$condicion_fisica', '$marca', '$modelo', '$color', '$año_fabricacion', '$serial_carroceria', '$serial_motor', '$placas', '$categoria_general', '$subcategoria', 
        '$categoria_especifica', '$sede')";
        
        $query_run = mysqli_query($connection, $query);

        if($query_run)
        {
          // Éxito: Añadir (verde)
          $_SESSION['success'] = "Articulo de inventario añadido con éxito.";
          header('Location: register2.php');
        }
        else
        {
          // Este ELSE captura errores si MySQL, como respaldo final, rechaza la inserción.
          $_SESSION['status'] = "Error al añadir el artículo. (Verificación MySQL): " . mysqli_error($connection);
          header('Location: register2.php');
        }
    }
}

// LÓGICA DE ACTUALIZACIÓN (UPDATE)
if(isset($_POST['updatebtn']))
{
    // Limpieza de datos (usando $_POST['edit_...'] para coincidir con el formulario de edición)
    $id = mysqli_real_escape_string($connection, $_POST['edit_id'] ?? '');
    // ... [Otras variables del formulario de edición] ...
    $serial_carroceria = mysqli_real_escape_string($connection, $_POST['edit_serial_carroceria'] ?? '');
    $serial_motor = mysqli_real_escape_string($connection, $_POST['edit_serial_motor'] ?? '');
    $placas = mysqli_real_escape_string($connection, $_POST['edit_placas'] ?? '');
    
    // 2. VERIFICAR DUPLICIDAD EN UPDATE (Solo para los campos que NO son el ID actual)
    $check_update_query = "SELECT id, `serial carroceria`, `serial motor`, placas FROM register2 
                          WHERE (
                                `serial carroceria`='$serial_carroceria'
                                OR `serial motor`='$serial_motor'
                                OR placas='$placas'
                          ) AND id != '$id' LIMIT 1";
    
    $check_update_run = mysqli_query($connection, $check_update_query);

    if (mysqli_num_rows($check_update_run) > 0) {
        $existing_row = mysqli_fetch_assoc($check_update_run);
        
        // Determinar qué campo es el duplicado para el mensaje de error
        $error_message = "Error al actualizar. ";
        
        if ($existing_row['serial carroceria'] === $serial_carroceria) {
            $error_message = "Error: El **Serial Carrocería ({$serial_carroceria})** ya está registrado en otro artículo.";
        } elseif ($existing_row['serial motor'] === $serial_motor) {
            $error_message = "Error: El **Serial Motor ({$serial_motor})** ya está registrado en otro artículo.";
        } elseif ($existing_row['placas'] === $placas) {
            $error_message = "Error: La **Placa ({$placas})** ya está registrada en otro artículo.";
        } 

        $_SESSION['status'] = $error_message;
        header('Location: register_edit2.php?edit_id=' . $id); // Regresa al formulario de edición
        exit();
    }
    // Si no hay duplicados con OTROS registros, procede al UPDATE
    else
    {
        // Consulta SQL UPDATE (Se omite el resto del código UPDATE para brevedad, pero debe ir aquí)
        // ... [Asegúrate de copiar aquí tu consulta UPDATE completa]
        // ...
        
        // A continuación el código que estaba en tu archivo
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
        $año_fabricacion = mysqli_real_escape_string($connection, $_POST['edit_año_fabricacion'] ?? '');
        $categoria_general = mysqli_real_escape_string($connection, $_POST['edit_categoria_general'] ?? '');
        $subcategoria = mysqli_real_escape_string($connection, $_POST['edit_subcategoria'] ?? '');
        $categoria_especifica = mysqli_real_escape_string($connection, $_POST['edit_categoria_especifica'] ?? '');
        $sede = mysqli_real_escape_string($connection, $_POST['edit_sede'] ?? '');
      

      // Consulta SQL UPDATE
      $query = "UPDATE register2 SET 
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
        `año fabricacion`='$año_fabricacion', 
        `serial carroceria`='$serial_carroceria', 
        `serial motor`='$serial_motor', 
        `placas`='$placas', 
        `categoria general`='$categoria_general', 
        `subcategoria`='$subcategoria', 
        `categoria especifica`='$categoria_especifica', 
        `sede`='$sede' 
        WHERE id='$id'"; 
        
      $query_run = mysqli_query($connection, $query);

      if($query_run)
      {
        $_SESSION['success'] = "Tus datos se han actualizado.";
        header('Location: register2.php');
      }
      else{
        $_SESSION['status'] = "Tus datos no están actualizados. Error: " . mysqli_error($connection);
        header('Location: register2.php');
      }
    }
}

// LÓGICA DE BORRADO (DELETE)
if(isset($_POST['delete_btn']))
{
    // ... [Tu código de DELETE se mantiene igual] ...
    $id = mysqli_real_escape_string($connection, $_POST['delete_id']);
    
    $query = "DELETE FROM register2 WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        // Usar 'delete_success' para el mensaje de borrado
        $_SESSION['delete_success'] = "El registro con ID *{$id}* ha sido eliminado.";
        header('Location: register2.php');
    }
    else
    {
        $_SESSION['status'] = "Error al intentar eliminar el registro: " . mysqli_error($connection);
        header('Location: register2.php');
    }
}

?>