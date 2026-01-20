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
    $sede = mysqli_real_escape_string($connection, $_POST['sede'] ?? '');
    $unidad_administrativa = mysqli_real_escape_string($connection, $_POST['unidad_administrativa'] ?? '');
    $codigo_interno_del_bien = mysqli_real_escape_string($connection, $_POST['codigo_interno_del_bien'] ?? '');
    $descripcion = mysqli_real_escape_string($connection, $_POST['descripcion'] ?? '');
    $forma_adquisicion = mysqli_real_escape_string($connection, $_POST['forma_adquisicion'] ?? '');
    $fecha_adquisicion = mysqli_real_escape_string($connection, $_POST['fecha_adquisicion'] ?? '');
    $n_documento = mysqli_real_escape_string($connection, $_POST['n_documento'] ?? '');
    $moneda = mysqli_real_escape_string($connection, $_POST['moneda'] ?? '');
    $valor_adquisicion = mysqli_real_escape_string($connection, $_POST['valor_adquisicion'] ?? '');
    $estado_del_uso_del_bien = mysqli_real_escape_string($connection, $_POST['estado_del_uso_del_bien'] ?? '');
    $año_de_construccion = mysqli_real_escape_string($connection, $_POST['año_de_construccion'] ?? '');
    $numero_del_contrato = mysqli_real_escape_string($connection, $_POST['numero_del_contrato'] ?? '');
    $rif_comodatario = mysqli_real_escape_string($connection, $_POST['rif_comodatario'] ?? '');
    $estado_de_ocupacion = mysqli_real_escape_string($connection, $_POST['estado_de_ocupacion'] ?? '');
    $area_de_construccion = mysqli_real_escape_string($connection, $_POST['area_de_construccion'] ?? '');
    $unidad_de_medida_area = mysqli_real_escape_string($connection, $_POST['unidad_de_medida_area'] ?? '');
    $area_del_terreno = mysqli_real_escape_string($connection, $_POST['area_del_terreno'] ?? '');
    $unidad_medida_area_del_terreno = mysqli_real_escape_string($connection, $_POST['unidad_medida_area_del_terreno'] ?? '');
    $magnitud = mysqli_real_escape_string($connection, $_POST['magnitud'] ?? '');
    $uso_actual = mysqli_real_escape_string($connection, $_POST['uso_actual'] ?? '');
    $fecha_inicio_contrato = mysqli_real_escape_string($connection, $_POST['fecha_inicio_contrato'] ?? '');
    $fecha_fin_contrato = mysqli_real_escape_string($connection, $_POST['fecha_fin_contrato'] ?? '');
    $oficina_de_registro_inmueble = mysqli_real_escape_string($connection, $_POST['oficina_de_registro_inmueble'] ?? '');
    $fecha_registro_inmueble = mysqli_real_escape_string($connection, $_POST['fecha_registro_inmueble'] ?? '');
    $numero_registro_inmueble = mysqli_real_escape_string($connection, $_POST['numero_registro_inmueble'] ?? '');
    $tomo = mysqli_real_escape_string($connection, $_POST['tomo'] ?? '');
    $folio = mysqli_real_escape_string($connection, $_POST['folio'] ?? '');
    $pais = mysqli_real_escape_string($connection, $_POST['pais'] ?? '');
    $estado = mysqli_real_escape_string($connection, $_POST['estado'] ?? '');
    $municipio = mysqli_real_escape_string($connection, $_POST['municipio'] ?? '');
    $parroquia = mysqli_real_escape_string($connection, $_POST['parroquia'] ?? '');
    $urbanizacion_sector = mysqli_real_escape_string($connection, $_POST['urbanizacion_sector'] ?? '');
    $avenida_calle = mysqli_real_escape_string($connection, $_POST['avenida_calle'] ?? '');
    $casa_edificio = mysqli_real_escape_string($connection, $_POST['casa_edificio'] ?? '');
    $piso = mysqli_real_escape_string($connection, $_POST['piso'] ?? '');
    $localizacion = mysqli_real_escape_string($connection, $_POST['localizacion'] ?? '');
    $linderos_norte = mysqli_real_escape_string($connection, $_POST['linderos_norte'] ?? '');
    $linderos_sur = mysqli_real_escape_string($connection, $_POST['linderos_sur'] ?? '');
    $linderos_este = mysqli_real_escape_string($connection, $_POST['linderos_este'] ?? '');
    $linderos_oeste = mysqli_real_escape_string($connection, $_POST['linderos_oeste'] ?? '');
    $latitud_coordenadas_geograficas = mysqli_real_escape_string($connection, $_POST['latitud_coordenadas_geograficas'] ?? '');
    $longitud_coordenadas_geograficas = mysqli_real_escape_string($connection, $_POST['longitud_coordenadas_geograficas'] ?? '');
    $categoria_general = mysqli_real_escape_string($connection, $_POST['categoria_general'] ?? '');
    $subcategoria = mysqli_real_escape_string($connection, $_POST['subcategoria'] ?? '');
    $categoria_especifica = mysqli_real_escape_string($connection, $_POST['categoria_especifica'] ?? '');

    $query = "INSERT INTO register3 (`id`, `sede`, `unidad administrativa`, `codigo interno del bien`, `descripcion`, `forma adquisicion`, `fecha adquisicion`, `n° documento`, `moneda`, `valor adquisicion`, `estado del uso del bien`, `año de construccion`, `numero del contrato`, `rif comodatario`, `estado de ocupacion`, `area de construccion`, `unidad de medida area`, `area del terreno`, `unidad medida area del terreno`, `magnitud`, `uso actual`, `fecha inicio contrato`, `fecha fin contrato`, `oficina de registro inmueble`, `fecha registro inmueble`, `numero registro inmueble`, `tomo`, `folio`, `pais`, `estado`, `municipio`, `parroquia`, `urbanizacion/sector`, `avenida/calle`, `casa/edificio`, `piso`, `localizacion`, `linderos norte`, `linderos sur`, `linderos este`, `linderos oeste`, `latitud coordenadas geograficas`, `longitud coordenadas geograficas`, `categoria general`, `subcategoria`, `categoria especifica`) 
        VALUES ('$id', '$sede', '$unidad_administrativa', '$codigo_interno_del_bien', '$descripcion', '$forma_adquisicion', '$fecha_adquisicion', '$n_documento', '$moneda', '$valor_adquisicion', '$estado_del_uso_del_bien', '$año_de_construccion', '$numero_del_contrato', '$rif_comodatario', '$estado_de_ocupacion', '$area_de_construccion', '$unidad_de_medida_area', '$area_del_terreno', '$unidad_medida_area_del_terreno', '$magnitud', '$uso_actual', '$fecha_inicio_contrato', '$fecha_fin_contrato', '$oficina_de_registro_inmueble', '$fecha_registro_inmueble', '$numero_registro_inmueble', '$tomo', '$folio', '$pais', '$estado', '$municipio', '$parroquia', '$urbanizacion_sector', '$avenida_calle', '$casa_edificio', '$piso', '$localizacion', '$linderos_norte', '$linderos_sur', '$linderos_este', '$linderos_oeste', '$latitud_coordenadas_geograficas', '$longitud_coordenadas_geograficas', '$categoria_general', '$subcategoria', '$categoria_especifica')";

    $query_run = mysqli_query($connection, $query);

    if($query_run) {
        $_SESSION['success'] = "El nuevo inmueble ha sido agregado con éxito.";
        header('Location: register3.php');
    } else {
        $_SESSION['status'] = "No se pudo agregar el inmueble. Error: " . mysqli_error($connection);
        header('Location: register3.php');
    }
}

// =========================================================================
// LÓGICA DE ACTUALIZACIÓN (UPDATE) - CON REGISTRO DE AUDITORÍA
// =========================================================================
if(isset($_POST['updatebtn']))
{
    $id = mysqli_real_escape_string($connection, $_POST['id'] ?? '');
    // ... (Saneamiento de todas las variables post)
    $sede = mysqli_real_escape_string($connection, $_POST['sede'] ?? '');
    $unidad_administrativa = mysqli_real_escape_string($connection, $_POST['unidad_administrativa'] ?? '');
    $codigo_interno_del_bien = mysqli_real_escape_string($connection, $_POST['codigo_interno_del_bien'] ?? '');
    $descripcion = mysqli_real_escape_string($connection, $_POST['descripcion'] ?? '');
    $forma_adquisicion = mysqli_real_escape_string($connection, $_POST['forma_adquisicion'] ?? '');
    $fecha_adquisicion = mysqli_real_escape_string($connection, $_POST['fecha_adquisicion'] ?? '');
    $n_documento = mysqli_real_escape_string($connection, $_POST['n_documento'] ?? '');
    $moneda = mysqli_real_escape_string($connection, $_POST['moneda'] ?? '');
    $valor_adquisicion = mysqli_real_escape_string($connection, $_POST['valor_adquisicion'] ?? '');
    $estado_del_uso_del_bien = mysqli_real_escape_string($connection, $_POST['estado_del_uso_del_bien'] ?? '');
    $año_de_construccion = mysqli_real_escape_string($connection, $_POST['año_de_construccion'] ?? '');
    $numero_del_contrato = mysqli_real_escape_string($connection, $_POST['numero_del_contrato'] ?? '');
    $rif_comodatario = mysqli_real_escape_string($connection, $_POST['rif_comodatario'] ?? '');
    $estado_de_ocupacion = mysqli_real_escape_string($connection, $_POST['estado_de_ocupacion'] ?? '');
    $area_de_construccion = mysqli_real_escape_string($connection, $_POST['area_de_construccion'] ?? '');
    $unidad_de_medida_area = mysqli_real_escape_string($connection, $_POST['unidad_de_medida_area'] ?? '');
    $area_del_terreno = mysqli_real_escape_string($connection, $_POST['area_del_terreno'] ?? '');
    $unidad_medida_area_del_terreno = mysqli_real_escape_string($connection, $_POST['unidad_medida_area_del_terreno'] ?? '');
    $magnitud = mysqli_real_escape_string($connection, $_POST['magnitud'] ?? '');
    $uso_actual = mysqli_real_escape_string($connection, $_POST['uso_actual'] ?? '');
    $fecha_inicio_contrato = mysqli_real_escape_string($connection, $_POST['fecha_inicio_contrato'] ?? '');
    $fecha_fin_contrato = mysqli_real_escape_string($connection, $_POST['fecha_fin_contrato'] ?? '');
    $oficina_de_registro_inmueble = mysqli_real_escape_string($connection, $_POST['oficina_de_registro_inmueble'] ?? '');
    $fecha_registro_inmueble = mysqli_real_escape_string($connection, $_POST['fecha_registro_inmueble'] ?? '');
    $numero_registro_inmueble = mysqli_real_escape_string($connection, $_POST['numero_registro_inmueble'] ?? '');
    $tomo = mysqli_real_escape_string($connection, $_POST['tomo'] ?? '');
    $folio = mysqli_real_escape_string($connection, $_POST['folio'] ?? '');
    $pais = mysqli_real_escape_string($connection, $_POST['pais'] ?? '');
    $estado = mysqli_real_escape_string($connection, $_POST['estado'] ?? '');
    $municipio = mysqli_real_escape_string($connection, $_POST['municipio'] ?? '');
    $parroquia = mysqli_real_escape_string($connection, $_POST['parroquia'] ?? '');
    $urbanizacion_sector = mysqli_real_escape_string($connection, $_POST['urbanizacion_sector'] ?? '');
    $avenida_calle = mysqli_real_escape_string($connection, $_POST['avenida_calle'] ?? '');
    $casa_edificio = mysqli_real_escape_string($connection, $_POST['casa_edificio'] ?? '');
    $piso = mysqli_real_escape_string($connection, $_POST['piso'] ?? '');
    $localizacion = mysqli_real_escape_string($connection, $_POST['localizacion'] ?? '');
    $linderos_norte = mysqli_real_escape_string($connection, $_POST['linderos_norte'] ?? '');
    $linderos_sur = mysqli_real_escape_string($connection, $_POST['linderos_sur'] ?? '');
    $linderos_este = mysqli_real_escape_string($connection, $_POST['linderos_este'] ?? '');
    $linderos_oeste = mysqli_real_escape_string($connection, $_POST['linderos_oeste'] ?? '');
    $latitud_coordenadas_geograficas = mysqli_real_escape_string($connection, $_POST['latitud_coordenadas_geograficas'] ?? '');
    $longitud_coordenadas_geograficas = mysqli_real_escape_string($connection, $_POST['longitud_coordenadas_geograficas'] ?? '');
    $categoria_general = mysqli_real_escape_string($connection, $_POST['categoria_general'] ?? '');
    $subcategoria = mysqli_real_escape_string($connection, $_POST['subcategoria'] ?? '');
    $categoria_especifica = mysqli_real_escape_string($connection, $_POST['categoria_especifica'] ?? '');

    // 1. Obtener datos actuales antes de actualizar
    $current_query = "SELECT * FROM register3 WHERE id='$id' LIMIT 1";
    $current_run = mysqli_query($connection, $current_query);
    $old_data = $current_run ? mysqli_fetch_assoc($current_run) : [];
    $current_datetime = date('Y-m-d H:i:s'); 

    // 2. Mapeo de columnas para comparación
    $new_data_map = [
        'sede'=> $sede, 'unidad administrativa'=> $unidad_administrativa, 'codigo interno del bien'=> $codigo_interno_del_bien,
        'descripcion'=> $descripcion, 'forma adquisicion'=> $forma_adquisicion, 'fecha adquisicion'=> $fecha_adquisicion,
        'n° documento'=> $n_documento, 'moneda'=> $moneda, 'valor adquisicion'=> $valor_adquisicion,
        'estado del uso del bien'=> $estado_del_uso_del_bien, 'año de construccion'=> $año_de_construccion,
        'numero del contrato'=> $numero_del_contrato, 'rif comodatario'=> $rif_comodatario, 'estado de ocupacion'=> $estado_de_ocupacion,
        'area de construccion'=> $area_de_construccion, 'unidad de medida area'=> $unidad_de_medida_area, 
        'area del terreno'=> $area_del_terreno, 'unidad medida area del terreno'=> $unidad_medida_area_del_terreno,
        'magnitud'=> $magnitud, 'uso actual'=> $uso_actual, 'fecha inicio contrato'=> $fecha_inicio_contrato,
        'fecha fin contrato'=> $fecha_fin_contrato, 'oficina de registro inmueble'=> $oficina_de_registro_inmueble,
        'fecha registro inmueble'=> $fecha_registro_inmueble, 'numero registro inmueble' => $numero_registro_inmueble,
        'tomo'=> $tomo, 'folio'=> $folio, 'pais'=> $pais, 'estado'=> $estado, 'municipio'=> $municipio, 
        'parroquia'=> $parroquia, 'urbanizacion/sector'=> $urbanizacion_sector, 'avenida/calle'=> $avenida_calle,
        'casa/edificio'=> $casa_edificio, 'piso'=> $piso, 'localizacion'=> $localizacion, 'linderos norte'=> $linderos_norte,
        'linderos sur'=> $linderos_sur, 'linderos este'=> $linderos_este, 'linderos oeste'=> $linderos_oeste,
        'latitud coordenadas geograficas'=> $latitud_coordenadas_geograficas, 'longitud coordenadas geograficas'=> $longitud_coordenadas_geograficas,
        'categoria general'=> $categoria_general, 'subcategoria'=> $subcategoria, 'categoria especifica'=> $categoria_especifica,
    ];

    // 3. Auditoría de Edición
    if (!empty($old_data)) {
        $usuario_responsable = $_SESSION['username']; // CAPTURA EL USUARIO
        foreach ($new_data_map as $column_name => $new_value) {
            if (isset($old_data[$column_name]) && $old_data[$column_name] != $new_value) {
                $old_value = mysqli_real_escape_string($connection, $old_data[$column_name]);
                $new_value_sanitized = mysqli_real_escape_string($connection, $new_value);

                $log_query = "INSERT INTO log_ediciones 
                    (tabla, registro_id, descripcion_bien, usuario_responsable, campo_modificado, valor_anterior, valor_nuevo, fecha_modificacion)
                    VALUES 
                    ('register3', '$id', '$descripcion', '$usuario_responsable', '$column_name', '$old_value', '$new_value_sanitized', '$current_datetime')";
                mysqli_query($connection, $log_query);
            }
        }
    }

    // 4. Ejecutar Actualización
    $query = "UPDATE register3 SET 
        `sede`='$sede', `unidad administrativa`='$unidad_administrativa', `codigo interno del bien`='$codigo_interno_del_bien',
        `descripcion`='$descripcion', `forma adquisicion`='$forma_adquisicion', `fecha adquisicion`='$fecha_adquisicion',
        `n° documento`='$n_documento', `moneda`='$moneda', `valor adquisicion`='$valor_adquisicion',
        `estado del uso del bien`='$estado_del_uso_del_bien', `año de construccion`='$año_de_construccion',
        `numero del contrato`= '$numero_del_contrato', `rif comodatario`='$rif_comodatario',
        `estado de ocupacion`='$estado_de_ocupacion', `area de construccion`='$area_de_construccion',
        `unidad de medida area`='$unidad_de_medida_area', `area del terreno`='$area_del_terreno',
        `unidad medida area del terreno`='$unidad_medida_area_del_terreno', `magnitud`='$magnitud',
        `uso actual`='$uso_actual', `fecha inicio contrato`='$fecha_inicio_contrato',
        `fecha fin contrato`='$fecha_fin_contrato', `oficina de registro inmueble`='$oficina_de_registro_inmueble',
        `fecha registro inmueble`='$fecha_registro_inmueble', `numero registro inmueble`='$numero_registro_inmueble',
        `tomo`='$tomo', `folio`='$folio', `pais`='$pais', `estado`='$estado', `municipio`='$municipio', 
        `parroquia`='$parroquia', `urbanizacion/sector`='$urbanizacion_sector', `avenida/calle`='$avenida_calle',
        `casa/edificio`='$casa_edificio', `piso`='$piso', `localizacion`='$localizacion',
        `linderos norte`='$linderos_norte', `linderos sur`='$linderos_sur', `linderos este`='$linderos_este',
        `linderos oeste`='$linderos_oeste', `latitud coordenadas geograficas`='$latitud_coordenadas_geograficas',
        `longitud coordenadas geograficas`='$longitud_coordenadas_geograficas', `categoria general`='$categoria_general',
        `subcategoria`='$subcategoria', `categoria especifica`='$categoria_especifica',
        fecha_edicion='$current_datetime' WHERE id='$id'";

    $query_run = mysqli_query($connection, $query);
    if($query_run) {
        $_SESSION['success'] = "Tus datos se han actualizado (Inmuebles).";
        header('Location: register3.php');
    } else {
        $_SESSION['status'] = "Error al actualizar: " . mysqli_error($connection);
        header('Location: register3.php');
    }
}

// =========================================================================
// LÓGICA DE BORRADO (DELETE) - CON AUDITORÍA
// =========================================================================
if(isset($_POST['delete_btn']))
{
    $id = mysqli_real_escape_string($connection, $_POST['delete_id']);
    $usuario_responsable = $_SESSION['username']; // CAPTURA EL USUARIO

    // Obtener datos antes de borrar
    $fetch_query = "SELECT `descripcion` FROM register3 WHERE id='$id' LIMIT 1";
    $fetch_run = mysqli_query($connection, $fetch_query);
    $item_data = mysqli_fetch_assoc($fetch_run);
    $descripcion_bien = mysqli_real_escape_string($connection, $item_data['descripcion'] ?? 'Registro ID ' . $id);
    $current_datetime = date('Y-m-d H:i:s'); 
    
    $query = "DELETE FROM register3 WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);

    if($query_run) {
        // Log de Borrado Completo
        $log_query = "INSERT INTO log_ediciones 
                    (tabla, registro_id, descripcion_bien, usuario_responsable, campo_modificado, valor_anterior, valor_nuevo, fecha_modificacion) 
                    VALUES 
                    ('register3', '$id', '$descripcion_bien', '$usuario_responsable', 'Registro Completo', 'ID $id', 'ELIMINADO', '$current_datetime')";
        mysqli_query($connection, $log_query);

        $_SESSION['delete_success'] = "El inmueble ha sido eliminado.";
        header('Location: register3.php');
    } else {
        $_SESSION['status'] = "Error al eliminar: " . mysqli_error($connection);
        header('Location: register3.php');
    }
}
?>