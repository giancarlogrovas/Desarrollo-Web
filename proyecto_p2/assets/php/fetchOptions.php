<?php
include 'connection.php';

$filter = $_GET['filter'];

$options = "";
switch ($filter) {
    case 'medio_transporte':
        $query = "SELECT id, nombre FROM transporte ORDER BY nombre";
        $result = $conn->query($query);
        while ($row = $result->fetch_assoc()) {
            $options .= "<option value='{$row['id']}'>{$row['nombre']}</option>";
        }
        break;

    case 'tipo_grupo':
        $query = "SELECT id, nombre FROM relacion ORDER BY nombre";
        $result = $conn->query($query);
        while ($row = $result->fetch_assoc()) {
            $options .= "<option value='{$row['id']}'>{$row['nombre']}</option>";
        }
        break;

    case 'motivo':
        $query = "SELECT id, motivo FROM motivos ORDER BY motivo";
        $result = $conn->query($query);
        while ($row = $result->fetch_assoc()) {
            $options .= "<option value='{$row['id']}'>{$row['motivo']}</option>";
        }
        break;

    case 'pais_residencia':
        $query = "SELECT id, nombre FROM pais ORDER BY nombre";
        $result = $conn->query($query);
        while ($row = $result->fetch_assoc()) {
            $options .= "<option value='{$row['id']}'>{$row['nombre']}</option>";
        }
        break;

    case 'nacionalidad':
        $query = "SELECT id, gentilicio FROM pais ORDER BY gentilicio";
        $result = $conn->query($query);
        while ($row = $result->fetch_assoc()) {
            $options .= "<option value='{$row['id']}'>{$row['gentilicio']}</option>";
        }
        break;

    case 'lenguaje':
        $query = "SELECT id, nombre FROM lenguaje ORDER BY nombre";
        $result = $conn->query($query);
        while ($row = $result->fetch_assoc()) {
            $options .= "<option value='{$row['id']}'>{$row['nombre']}</option>";
        }
        break;

    case 'frecuencia_visita':
        $query = "SELECT id, rango FROM frec_visita ORDER BY rango";
        $result = $conn->query($query);
        while ($row = $result->fetch_assoc()) {
            $options .= "<option value='{$row['id']}'>{$row['rango']}</option>";
        }
        break;

    case 'estado':
        $query = "SELECT id, nombre FROM estado ORDER BY nombre";
        $result = $conn->query($query);
        while ($row = $result->fetch_assoc()) {
            $options .= "<option value='{$row['id']}'>{$row['nombre']}</option>";
        }
        break;

    case 'medio_comunicacion':
        $query = "SELECT id, medio FROM comunicacion ORDER BY medio";
        $result = $conn->query($query);
        while ($row = $result->fetch_assoc()) {
            $options .= "<option value='{$row['id']}'>{$row['medio']}</option>";
        }
        break;

    case 'grado_estudios':
        $query = "SELECT id, grado FROM escolaridad ORDER BY grado";
        $result = $conn->query($query);
        while ($row = $result->fetch_assoc()) {
            $options .= "<option value='{$row['id']}'>{$row['grado']}</option>";
        }
        break;

    case 'estado_escolar':
        $query = "SELECT id, estado_escolar FROM visitas ORDER BY estado_escolar";
        $result = $conn->query($query);
        while ($row = $result->fetch_assoc()) {
            $options .= "<option value='{$row['id']}'>{$row['estado_escolar']}</option>";
        }
        break;

    default:
        // Manejar caso por defecto
        break;
}

echo $options;
$conn->close();
?>