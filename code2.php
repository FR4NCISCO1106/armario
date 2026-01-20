<?php
include('security.php');
date_default_timezone_set('America/Caracas'); // Asegura la hora correcta para el log

// =========================================================================
// LÓGICA DE REGISTRO (INSERT)
// =========================================================================
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
    $año_fabricacion = mysqli_real_escape_string($connection, $_POST['año_fabricacion'] ?? '');
    $serial_carroceria = mysqli_real_escape_string($connection, $_POST['serial_carroceria'] ?? '');
    $serial_motor = mysqli_real_escape_string($connection, $_POST['serial_motor'] ?? '');
    $placas = mysqli_real_escape_string($connection, $_POST['placas'] ?? '');
    $categoria_general = mysqli_real_escape_string($connection, $_POST['categoria_general'] ?? '');
    $subcategoria = mysqli_real_escape_string($connection, $_POST['subcategoria'] ?? '');
    $categoria_especifica = mysqli_real_escape_string($connection, $_POST['categoria_especifica'] ?? '');
    $sede = mysqli_real_escape_string($connection, $_POST['sede'] ?? '');
    
    $query = "INSERT INTO register2 (`id`, `unidad administrativa`, `codigo interno del bien`, `descripcion`, `forma adquisicion`, `fecha adquisicion`, `N° Documento`, `valor adquisicion`, `moneda`, `estado del uso del bien`, `condicion fisica`, `marca`, `modelo`, `color`, `año fabricacion`, `serial carroceria`, `serial motor`, `placas`, `categoria general`, `subcategoria`, `categoria específica`, `sede`) 
        VALUES ('$id', '$unidad_administrativa', '$codigo_interno_del_bien', '$descripcion', '$forma_adquisicion', '$fecha_adquisicion', '$n_documento', '$valor_adquisicion', '$moneda', '$estado_del_uso_del_bien', '$condicion_fisica', '$marca', '$modelo', '$color', '$año_fabricacion', '$serial_carroceria', '$serial_motor', '$placas', '$categoria_general', '$subcategoria', '$categoria_especifica', '$sede')";

    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['success'] = "El nuevo vehículo ha sido agregado con éxito.";
        header('Location: register2.php');
    }
    else 
    {
        $_SESSION['status'] = "No se pudo agregar el artículo. Error: " . mysqli_error($connection);
        header('Location: register2.php');
    }
}

// =========================================================================
// LÓGICA DE ACTUALIZACIÓN (UPDATE) - CON REGISTRO DE AUDITORÍA
// =========================================================================
if(isset($_POST['updatebtn']))
{
    $id = mysqli_real_escape_string($connection, $_POST['edit_id'] ?? $_POST['id'] ?? '');

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
    $serial_carroceria = mysqli_real_escape_string($connection, $_POST['edit_serial_carroceria'] ?? '');
    $serial_motor = mysqli_real_escape_string($connection, $_POST['edit_serial_motor'] ?? '');
    $placas = mysqli_real_escape_string($connection, $_POST['edit_placas'] ?? '');
    $categoria_general = mysqli_real_escape_string($connection, $_POST['edit_categoria_general'] ?? '');
    $subcategoria = mysqli_real_escape_string($connection, $_POST['edit_subcategoria'] ?? '');
    $categoria_especifica = mysqli_real_escape_string($connection, $_POST['edit_categoria_especifica'] ?? '');
    $sede = mysqli_real_escape_string($connection, $_POST['edit_sede'] ?? '');

    // 1. OBTENER DATOS ACTUALES
    $current_query = "SELECT * FROM register2 WHERE id='$id' LIMIT 1";
    $current_run = mysqli_query($connection, $current_query);
    $old_data = $current_run ? mysqli_fetch_assoc($current_run) : [];

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
        'marca' => $marca,
        'modelo' => $modelo,
        'color' => $color,
        'año fabricacion' => $año_fabricacion,
        'serial carroceria' => $serial_carroceria,
        'serial motor' => $serial_motor,
        'placas' => $placas,
        'categoria general' => $categoria_general,
        'subcategoria' => $subcategoria,
        'categoria especifica' => $categoria_especifica,
        'sede' => $sede,
    ];

    // 2. REGISTRO DE AUDITORÍA (CAMBIOS INDIVIDUALES)
    if (!empty($old_data)) {
        $tabla = 'register2';
        $usuario_responsable = $_SESSION['username']; 

        foreach ($new_data_map as $column_name => $new_value) {
            if (isset($old_data[$column_name]) && $old_data[$column_name] != $new_value) {
                
                $old_value = mysqli_real_escape_string($connection, $old_data[$column_name]);
                $new_value_sanitized = mysqli_real_escape_string($connection, $new_value);

                $log_query = "INSERT INTO log_ediciones 
                            (tabla, registro_id, descripcion_bien, usuario_responsable, campo_modificado, valor_anterior, valor_nuevo, fecha_modificacion) 
                            VALUES 
                            ('$tabla', '$id', '$descripcion', '$usuario_responsable', '$column_name', '$old_value', '$new_value_sanitized', '$current_datetime')";
                mysqli_query($connection, $log_query);
            }
        }
    }

    // 3. EJECUTAR ACTUALIZACIÓN
    $query = "UPDATE register2 SET 
        `unidad administrativa`='$unidad_administrativa', 
        `codigo interno del bien`='$codigo_interno_del_bien', 
        `descripcion`='$descripcion',
        `forma adquisicion`='$forma_adquisicion', 
        `fecha adquisicion`='$fecha_adquisicion', 
        `N° Documento`='$n_documento', 
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
        `sede`='$sede',
        fecha_edicion='$current_datetime'  
        WHERE id='$id'";

    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['success'] = "Tus datos se han actualizado (Vehículos).";
        header('Location: register2.php');
    }
    else{
        $_SESSION['status'] = "Error al actualizar: " . mysqli_error($connection);
        header('Location: register2.php');
    }
}

// =========================================================================
// LÓGICA DE BORRADO (DELETE) - CON REGISTRO DE AUDITORÍA
// =========================================================================
if(isset($_POST['delete_btn']))
{
    $id = mysqli_real_escape_string($connection, $_POST['delete_id']);
    $tabla = 'register2'; 
    $usuario_responsable = $_SESSION['username']; // CAPTURADO PARA EL LOG
    
    $fetch_query = "SELECT `descripcion` FROM $tabla WHERE id='$id' LIMIT 1";
    $fetch_run = mysqli_query($connection, $fetch_query);
    $item_data = mysqli_fetch_assoc($fetch_run);
    $descripcion_bien = mysqli_real_escape_string($connection, $item_data['descripcion'] ?? 'Registro ID ' . $id);
    $current_datetime = date('Y-m-d H:i:s'); 
    
    $query = "DELETE FROM $tabla WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        // LOG DE BORRADO INCLUYENDO EL USUARIO RESPONSABLE
        $log_query = "INSERT INTO log_ediciones 
                    (tabla, registro_id, descripcion_bien, usuario_responsable, campo_modificado, valor_anterior, valor_nuevo, fecha_modificacion) 
                    VALUES 
                    ('$tabla', '$id', '$descripcion_bien', '$usuario_responsable', 'Registro Completo', 'ID $id', 'ELIMINADO', '$current_datetime')";
        mysqli_query($connection, $log_query);

        $_SESSION['delete_success'] = "El vehículo con ID *{$id}* ha sido eliminado.";
        header('Location: register2.php');
    }
    else
    {
        $_SESSION['status'] = "Error al eliminar: " . mysqli_error($connection);
        header('Location: register2.php');
    }
}
?>