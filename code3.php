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
    $sede = mysqli_real_escape_string($connection, $_POST['sede'] ?? '');
    $unidad_administrativa = mysqli_real_escape_string($connection, $_POST['unidad_administrativa'] ?? '');
    $codigo_interno_del_bien = mysqli_real_escape_string($connection, $_POST['codigo_interno_del_bien'] ?? '');
    $descripcion = mysqli_real_escape_string($connection, $_POST['descripcion'] ?? '');
    $forma_de_adquisicion = mysqli_real_escape_string($connection, $_POST['forma_de_adquisicion'] ?? '');
    $fecha_de_adquisicion = mysqli_real_escape_string($connection, $_POST['fecha_de_adquisicion'] ?? '');
    $n_documento = mysqli_real_escape_string($connection, $_POST['n_documento'] ?? '');
    $moneda = mysqli_real_escape_string($connection, $_POST['moneda'] ?? '');
    $valor_adquisicion = mysqli_real_escape_string($connection, $_POST['valor_adquisicion'] ?? '');
    $estado_del_uso_del_bien = mysqli_real_escape_string($connection, $_POST['estado_del_uso_del_bien'] ?? '');
    $año_de_construccion = mysqli_real_escape_string($connection, $_POST['año_de_construccion'] ?? '');
    $numero_del_contrato = mysqli_real_escape_string($connection, $_POST['numero_del_contrato'] ?? '');
    $rif_comodatorio = mysqli_real_escape_string($connection, $_POST['rif_comodatorio'] ?? '');
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

    
    // Consulta de inserción - ¡CORREGIDO a `N. Documento`!
    $query = "INSERT INTO register3 (`id`, `sede`, `unidad administrativa`, `codigo interno del bien`, `descripcion`, `forma adquisicion`, `fecha adquisicion`, `n° documento`, `moneda`, `valor adquisicion`, `estado del uso del bien`, `año de construccion`, `numero del contrato`, `rif comodatorio`, `estado de ocupacion`, `area de construccion`, `unidad de medida area`, `area del terreno`, `unidad medida area del terreno`, `magnitud`, `uso actual`, `fecha inicio contrato`, `fecha fin contrato`, `oficina de registro inmueble`, `fecha registro inmueble`, `numero registro inmueble`, `tomo`, `folio`, `pais`, `estado`, `municipio`, `parroquia`, `urbanizacion/sector`, `avenida/calle`, `casa/edificio`, `piso`, `localizacion`, `linderos norte`, `linderos sur`, `linderos este`, `linderos oeste`, `latitud coordenadas geograficas`, `longitud coordenadas geograficas`, `categoria general`, `subcategoria`, `categoria especifica`) 
        VALUES ('$id', '$sede', '$unidad_administrativa', '$codigo_interno_del_bien', '$descripcion', '$forma_adquisicion', '$fecha_adquisicion', '$n_documento', '$moneda', '$valor_adquisicion', '$estado_del_uso_del_bien', '$año_de_construccion', '$numero_del_contrato', '$rif_comodatorio', '$estado_de_ocupacion', '$area_de_construccion', '$unidad_de_medida_area', '$area_del_terreno', '$unidad_medida_area_del_terreno', '$magnitud', '$uso_actual', '$fecha_inicio_contrato', '$fecha_fin_contrato', '$oficina_de_registro_inmueble', '$fecha_registro_inmueble', '$numero_registro_inmueble', '$tomo', '$folio', '$pais', '$estado', '$municipio', '$parroquia', '$urbanizacion_sector', '$avenida_calle', '$casa_edificio', '$piso', '$localizacion', '$linderos_norte', '$linderos_sur', '$linderos_este', '$linderos_oeste', '$latitud_coordenadas_geograficas', '$longitud_coordenadas_geograficas', '$categoria_general', '$subcategoria', '$categoria_especifica') ";

    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['success'] = "El nuevo artículo (Vehículo) ha sido agregado con éxito.";
        header('Location: register3.php');
    }
    else 
    {
        $_SESSION['status'] = "No se pudo agregar el artículo. Error: " . mysqli_error($connection);
        header('Location: register3.php');
    }
}

// =========================================================================
// LÓGICA DE ACTUALIZACIÓN (UPDATE) - CON REGISTRO DE AUDITORÍA
// =========================================================================
if(isset($_POST['updatebtn']))
{
    $id = mysqli_real_escape_string($connection, $_POST['id'] ?? '');
    $sede = mysqli_real_escape_string($connection, $_POST['sede'] ?? '');
    $unidad_administrativa = mysqli_real_escape_string($connection, $_POST['unidad_administrativa'] ?? '');
    $codigo_interno_del_bien = mysqli_real_escape_string($connection, $_POST['codigo_interno_del_bien'] ?? '');
    $descripcion = mysqli_real_escape_string($connection, $_POST['descripcion'] ?? '');
    $forma_de_adquisicion = mysqli_real_escape_string($connection, $_POST['forma_de_adquisicion'] ?? '');
    $fecha_de_adquisicion = mysqli_real_escape_string($connection, $_POST['fecha_de_adquisicion'] ?? '');
    $n_documento = mysqli_real_escape_string($connection, $_POST['n_documento'] ?? '');
    $moneda = mysqli_real_escape_string($connection, $_POST['moneda'] ?? '');
    $valor_adquisicion = mysqli_real_escape_string($connection, $_POST['valor_adquisicion'] ?? '');
    $estado_del_uso_del_bien = mysqli_real_escape_string($connection, $_POST['estado_del_uso_del_bien'] ?? '');
    $año_de_construccion = mysqli_real_escape_string($connection, $_POST['año_de_construccion'] ?? '');
    $numero_del_contrato = mysqli_real_escape_string($connection, $_POST['numero_del_contrato'] ?? '');
    $rif_comodatorio = mysqli_real_escape_string($connection, $_POST['rif_comodatorio'] ?? '');
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

    // 2. OBTENER DATOS ACTUALES ANTES DE LA ACTUALIZACIÓN
    $current_query = "SELECT * FROM register3 WHERE id='$id' LIMIT 1";
    $current_run = mysqli_query($connection, $current_query);
    $old_data = $current_run ? mysqli_fetch_assoc($current_run) : [];

    // 3. OBTENER LA FECHA Y HORA ACTUAL PARA EL UPDATE Y EL LOG
    $current_datetime = date('Y-m-d H:i:s'); 

    // Mapeo de columnas de DB a nuevos valores POST (¡CORREGIDO a 'N. Documento'!)
    $new_data_map = [
      'sede'=> $sede,
      'unidad administrativa'=> $unidad_administrativa,
      'codigo interno del bien'=> $codigo_interno_del_bien,
      'descripcion'=> $descripcion,
      'forma adquisicion'=> $forma_adquisicion,
      'fecha adquisicion'=> $fecha_adquisicion,
      'n° documento'=> $n_documento,
      'moneda'=> $moneda,
      'valor adquisicion'=> $valor_adquisicion,
      'estado del uso del bien'=> $estado_del_uso_del_bien,
      'año de construccion'=> $año_de_construccion,
      'numero del contrato'=> $numero_del_contrato,
      'rif comodatorio'=> $rif_comodatorio,
      'estado de ocupacion'=> $estado_de_ocupacion,
      'area de construccion'=> $area_de_construccion,
      'unidad de medida area'=> $unidad_de_medida_area, 
      'area del terreno'=> $area_del_terreno,
      'unidad medida area del terreno'=> $unidad_medida_area_del_terreno,
      'magnitud'=> $magnitud,
      'uso actual'=> $uso_actual,
      'fecha inicio contrato'=> $fecha_inicio_contrato,
      'fecha fin contrato'=> $fecha_fin_contrato,
      'oficina de registro inmueble'=> $oficina_de_registro_inmueble,
      'fecha registro inmueble'=> $fecha_registro_inmueble,
      'numero registro inmueble' => $numero_registro_inmueble,
      'tomo'=> $tomo,
      'folio'=> $folio,
      'pais'=> $pais,
      'estado'=> $estado,
      'municipio'=> $municipio, 
      'parroquia'=> $parroquia,
      'urbanizacion/sector'=> $urbanizacion_sector,
      'avenida/calle'=> $avenida_calle,
      'casa/edificio'=> $casa_edificio,
      'piso'=> $piso,
      'localizacion'=> $localizacion,
      'linderos norte'=> $linderos_norte,
      'linderos sur'=> $linderos_sur,
      'linderos este'=> $linderos_este,
      'linderos oeste'=> $linderos_oeste,
      'latitud coordenadas geograficas'=> $latitud_coordenadas_geograficas,
      'longitud coordenadas geograficas'=> $longitud_coordenadas_geograficas,
      'categoria general'=> $categoria_general,
      'subcategoria'=> $subcategoria,
      'categoria especifica'=> $categoria_especifica,
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
                    ('register3', '$id', '$log_description', '$column_name', '$old_value', '$new_value_sanitized', '$current_datetime')";
                
                // Ejecutar la inserción en el log
                mysqli_query($connection, $log_query);
            }
        }
    }

    // 5. EJECUTAR LA CONSULTA DE ACTUALIZACIÓN ORIGINAL (¡CORREGIDO a `N. Documento` en el SQL!)
    $query = "UPDATE register3 SET 

      `sede`='$sede',
      `unidad administrativa`='$unidad_administrativa',
      `codigo interno del bien`='$codigo_interno_del_bien',
      `descripcion`='$descripcion',
      `forma adquisicion`='$forma_adquisicion',
      `fecha adquisicion`='$fecha_adquisicion',
      `n° documento`='$n_documento',
      `moneda`='$moneda',
      `valor adquisicion`='$valor_adquisicion',
      `estado del uso del bien`='$estado_del_uso_del_bien',
      `año de construccion`='$año_de_construccion',
      `numero del contrato`= '$numero_del_contrato',
      `rif comodatorio`='$rif_comodatorio',
      `estado de ocupacion`='$estado_de_ocupacion',
      `area de construccion`='$area_de_construccion',
      `unidad de medida area`='$unidad_de_medida_area', 
      `area del terreno`='$area_del_terreno',
      `unidad medida area del terreno`='$unidad_medida_area_del_terreno',
      `magnitud`='$magnitud',
      `uso actual`='$uso_actual',
      `fecha inicio contrato`='$fecha_inicio_contrato',
      `fecha fin contrato`='$fecha_fin_contrato',
      `oficina de registro inmueble`='$oficina_de_registro_inmueble',
      `fecha registro inmueble`='$fecha_registro_inmueble',
      `numero registro inmueble`='$numero_registro_inmueble',
      `tomo`='$tomo',
      `folio`='$folio',
      `pais`='$pais',
      `estado`='$estado',
      `municipio`='$municipio', 
      `parroquia`='$parroquia',
      `urbanizacion/sector`='$urbanizacion_sector',
      `avenida/calle`='$avenida_calle',
      `casa/edificio`='$casa_edificio',
      `piso`='$piso',
      `localizacion`='$localizacion',
      `linderos norte`='$linderos_norte',
      `linderos sur`='$linderos_sur',
      `linderos este`='$linderos_este',
      `linderos oeste`='$linderos_oeste',
      `latitud coordenadas geograficas`='$latitud_coordenadas_geograficas',
      `longitud coordenadas geograficas`='$longitud_coordenadas_geograficas',
      `categoria general`='$categoria_general',
      `subcategoria`='$subcategoria',
      `categoria especifica`='$categoria_especifica',

        
        fecha_edicion='$current_datetime'  
        
        WHERE id='$id'";

    $query_run = mysqli_query($connection, $query); // <--- ESTA ES APROXIMADAMENTE LA LÍNEA 170

    if($query_run)
    {
        $_SESSION['success'] = "Tus datos se han actualizado (Vehículos).";
        header('Location: register3.php');
    }
    else{
        $_SESSION['status'] = "Tus datos no están actualizados. Error: " . mysqli_error($connection);
        header('Location: register3.php');
    }
}

// =========================================================================
// LÓGICA DE BORRADO (DELETE)
// =========================================================================
if(isset($_POST['delete_btn']))
{
    $id = mysqli_real_escape_string($connection, $_POST['delete_id']);
    
    $query = "DELETE FROM register3 WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['delete_success'] = "El registro con ID *{$id}* ha sido eliminado.";
        header('Location: register3.php');
    }
    else
    {
        $_SESSION['status'] = "Error al intentar eliminar el registro: " . mysqli_error($connection);
        header('Location: register3.php');
    }
}
?>