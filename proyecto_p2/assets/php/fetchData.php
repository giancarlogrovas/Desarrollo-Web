<?php
include 'connection.php';

// Obtener los filtros
$filtros = $_POST;

// Consulta principal para obtener las visitas
$query = "SELECT
        v.estado,
        v.sexo,
        v.edad,
        estado.nombre AS estado,
        p.nombre AS pais_residencia,
        p.gentilicio AS nacionalidad,
        e.grado AS escolaridad,
        v.estado_escolar,
        l1.nombre AS primera_leng,
        l2.nombre AS segunda_leng,
        f.rango AS frecuencia_visita,
        c.medio AS medio_com,
        m.motivo,
        t.nombre AS medio_transporte,
        r.nombre AS tipo_grupo,
        v.tamaño_grupo,
        v.menores_grupo,
        v.duracion
    FROM
        visitas v
        LEFT JOIN pais p ON v.residencia = p.id
        LEFT JOIN escolaridad e ON v.escolaridad = e.id
        LEFT JOIN lenguaje l1 ON v.primera_leng = l1.id
        LEFT JOIN lenguaje l2 ON v.segunda_leng = l2.id
        LEFT JOIN frec_visita f ON v.frecuencia_visita = f.id
        LEFT JOIN comunicacion c ON v.medio_com = c.id
        LEFT JOIN motivos m ON v.motivo = m.id
        LEFT JOIN transporte t ON v.medio_transporte = t.id
        LEFT JOIN relacion r ON v.tipo_grupo = r.id
        LEFT JOIN estado ON v.estado = estado.id
    WHERE 1=1";

// Aplicar filtros
if (!empty($filtros['estado'])) {
    $query .= " AND v.estado = " . intval($filtros['estado']);
}
if (!empty($filtros['sexo'])) {
    $query .= " AND v.sexo = '" . $conn->real_escape_string($filtros['sexo']) . "'";
}
if (!empty($filtros['edad'])) {
    $query .= " AND v.edad = " . intval($filtros['edad']);
}
if (!empty($filtros['pais_residencia'])) {
    $query .= " AND v.residencia = " . intval($filtros['pais_residencia']);
}
if (!empty($filtros['nacionalidad'])) {
    $query .= " AND p.gentilicio = '" . $conn->real_escape_string($filtros['nacionalidad']) . "'";
}
if (!empty($filtros['escolaridad'])) {
    $query .= " AND v.escolaridad = " . intval($filtros['escolaridad']);
}
if (!empty($filtros['primera_lengua'])) {
    $query .= " AND v.primera_leng = " . intval($filtros['primera_lengua']);
}
if (!empty($filtros['segunda_lengua'])) {
    $query .= " AND v.segunda_leng = " . intval($filtros['segunda_lengua']);
}
if (!empty($filtros['frecuencia_visita'])) {
    $query .= " AND v.frecuencia_visita = " . intval($filtros['frecuencia_visita']);
}
if (!empty($filtros['medio_com'])) {
    $query .= " AND v.medio_com = " . intval($filtros['medio_com']);
}
if (!empty($filtros['motivo'])) {
    $query .= " AND v.motivo = " . intval($filtros['motivo']);
}
if (!empty($filtros['medio_transporte'])) {
    $query .= " AND v.medio_transporte = " . intval($filtros['medio_transporte']);
}
if (!empty($filtros['tipo_grupo'])) {
    $query .= " AND v.tipo_grupo = " . intval($filtros['tipo_grupo']);
}
if (!empty($filtros['estado_escolar'])) {
    $query .= " AND v.estado_escolar = " . intval($filtros['estado_escolar']);
}

$result = $conn->query($query);

$data = [];
$total_visitas = $result->num_rows;
$visitas_nacionales = 0;
$visitas_extranjeros = 0;
$primera_lenguas = [];
$segunda_lenguas = [];

while ($row = $result->fetch_assoc()) {
    if ($row['nacionalidad'] == 'mexicano') {
        $visitas_nacionales++;
    } else {
        $visitas_extranjeros++;
    }
    if (!empty($row['primera_leng'])) {
        if (isset($primera_lenguas[$row['primera_leng']])) {
            $primera_lenguas[$row['primera_leng']]++;
        } else {
            $primera_lenguas[$row['primera_leng']] = 1;
        }
    }
    if (!empty($row['segunda_leng'])) {
        if (isset($segunda_lenguas[$row['segunda_leng']])) {
            $segunda_lenguas[$row['segunda_leng']]++;
        } else {
            $segunda_lenguas[$row['segunda_leng']] = 1;
        }
    }
}

$primera_lengua_mas_hablada = array_search(max($primera_lenguas), $primera_lenguas);
$segunda_lengua_mas_hablada = array_search(max($segunda_lenguas), $segunda_lenguas);

$data['total_visitas'] = $total_visitas;
$data['visitas_nacionales'] = $visitas_nacionales;
$data['visitas_extranjeros'] = $visitas_extranjeros;
$data['primera_lengua_mas_hablada'] = $primera_lengua_mas_hablada;
$data['segunda_lengua_mas_hablada'] = $segunda_lengua_mas_hablada;

$resumen = "
    <div class='resumen'>
        <p>Total de visitas: {$data['total_visitas']}</p>
        <p>Visitas nacionales: {$data['visitas_nacionales']}</p>
        <p>Visitas extranjeras: {$data['visitas_extranjeros']}</p>
        <p>Primera lengua más hablada: {$data['primera_lengua_mas_hablada']}</p>
        <p>Segunda lengua más hablada: {$data['segunda_lengua_mas_hablada']}</p>
    </div>
";

$table = "<table class='table table-bordered'>
            <thead>
                <tr>
                    <th>Estado</th>
                    <th>Sexo</th>
                    <th>Edad</th>
                    <th>País de residencia</th>
                    <th>Nacionalidad</th>
                    <th>Estudios</th>
                    <th>Grado</th>
                    <th>1ra Lengua</th>
                    <th>2da Lengua</th>
                    <th>Frecuencia</th>
                    <th>Medio de Comunicación</th>
                    <th>Motivo de Visita</th>
                    <th>Medio de Transporte</th>
                    <th>Tipo de Acompañantes</th>
                    <th>Tamaño del Grupo</th>
                    <th>Menores de 12 en el grupo</th>
                    <th>Duración de visita [min]</th>
                </tr>
            </thead>
            <tbody>";

$result->data_seek(0); // Reiniciar el puntero del resultado para iterar de nuevo

while ($row = $result->fetch_assoc()) {
    $table .= "<tr>
                <td>{$row['estado']}</td>
                <td>{$row['sexo']}</td>
                <td>{$row['edad']}</td>
                <td>{$row['pais_residencia']}</td>
                <td>{$row['nacionalidad']}</td>
                <td>{$row['escolaridad']}</td>
                <td>{$row['estado_escolar']}</td>
                <td>{$row['primera_leng']}</td>
                <td>{$row['segunda_leng']}</td>
                <td>{$row['frecuencia_visita']}</td>
                <td>{$row['medio_com']}</td>
                <td>{$row['motivo']}</td>
                <td>{$row['medio_transporte']}</td>
                <td>{$row['tipo_grupo']}</td>
                <td>{$row['tamaño_grupo']}</td>
                <td>{$row['menores_grupo']}</td>
                <td>{$row['duracion']}</td>
              </tr>";
}

$table .= "</tbody></table>";

echo $resumen;
echo $table;

$conn->close();
?>
