<?php
include('security.php');
date_default_timezone_set('America/Caracas'); // Asegura la hora correcta para el log

// =========================================================================
// LÓGICA DE ACTUALIZACIÓN (UPDATE) - CON REGISTRO DE AUDITORÍA
// =========================================================================

if(isset($_POST['updatebtn']))
{
    // 1. Saneamiento de datos
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
    $categoria_general = mysqli_real_escape_string($connection, $_POST['edit_categoria_general'] ?? '');
    $subcategoria = mysqli_real_escape_string($connection, $_POST['edit_subcategoria'] ?? '');
    $categoria_especifica = mysqli_real_escape_string($connection, $_POST['edit_categoria_especifica'] ?? '');
    $sede = mysqli_real_escape_string($connection, $_POST['edit_sede'] ?? '');
    
    // 2. OBTENER DATOS ACTUALES ANTES DE LA ACTUALIZACIÓN
    $current_query = "SELECT * FROM register WHERE id='$id' LIMIT 1";
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
        'categoria general' => $categoria_general,
        'subcategoria' => $subcategoria,
        'categoria especifica' => $categoria_especifica,
        'sede' => $sede,
    ];

    // 3. COMPARAR E INSERTAR REGISTROS DE AUDITORÍA
    if (!empty($old_data)) {
        $tabla = 'register';
        $usuario_responsable = $_SESSION['username']; // Captura el usuario de la sesión

        foreach ($new_data_map as $column_name => $new_value) {
            if (isset($old_data[$column_name]) && $old_data[$column_name] != $new_value) {
                
                $old_value = mysqli_real_escape_string($connection, $old_data[$column_name]);
                $new_value_sanitized = mysqli_real_escape_string($connection, $new_value);

                // Inserción corregida con las variables del loop y el usuario
                $log_query = "INSERT INTO log_ediciones 
                            (tabla, registro_id, descripcion_bien, usuario_responsable, campo_modificado, valor_anterior, valor_nuevo, fecha_modificacion) 
                            VALUES 
                            ('$tabla', '$id', '$descripcion', '$usuario_responsable', '$column_name', '$old_value', '$new_value_sanitized', '$current_datetime')";
                mysqli_query($connection, $log_query);
            }
        }
    }

    // 4. EJECUTAR LA ACTUALIZACIÓN
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

    $query_run = mysqli_query($connection, $query);

    if($query_run) {
        $_SESSION['success'] = "Datos actualizados correctamente.";
        header('Location: register.php');
    } else {
        $_SESSION['status'] = "Error al actualizar: " . mysqli_error($connection);
        header('Location: register.php');
    }
}

// =========================================================================
// LÓGICA DE BORRADO (DELETE) - CON REGISTRO DE AUDITORÍA
// =========================================================================

if(isset($_POST['delete_btn']))
{
    $id = mysqli_real_escape_string($connection, $_POST['delete_id']);
    $tabla = 'register';
    $usuario_responsable = $_SESSION['username']; // Captura el usuario

    $fetch_query = "SELECT `descripcion` FROM $tabla WHERE id='$id' LIMIT 1";
    $fetch_run = mysqli_query($connection, $fetch_query);
    $item_data = mysqli_fetch_assoc($fetch_run);
    $descripcion_bien = mysqli_real_escape_string($connection, $item_data['descripcion'] ?? 'Registro ID ' . $id);
    $current_datetime = date('Y-m-d H:i:s'); 

    $query = "DELETE FROM $tabla WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        // Registro de auditoría incluyendo al usuario
        $log_query = "INSERT INTO log_ediciones 
                    (tabla, registro_id, descripcion_bien, usuario_responsable, campo_modificado, valor_anterior, valor_nuevo, fecha_modificacion) 
                    VALUES 
                    ('$tabla', '$id', '$descripcion_bien', '$usuario_responsable', 'Registro Completo', 'ID $id', 'ELIMINADO', '$current_datetime')";
        mysqli_query($connection, $log_query);
        
        $_SESSION['delete_success'] = "Registro eliminado con éxito.";
        header('Location: register.php');
    }
}
?>