$(document).ready(function() {
    // Inicializar los filtros
    initializeFilters();

    // Toggle para mostrar/ocultar los filtros
    $('#toggleFilters').click(function() {
        $('#filters').toggle();
        $(this).text($(this).text() === 'Ocultar Filtros' ? 'Mostrar Filtros' : 'Ocultar Filtros');
    });

    // Función para inicializar los filtros
    function initializeFilters() {
        const filters = [
            'medio_transporte', 'tipo_grupo', 'motivo', 'pais_residencia', 'nacionalidad',
            'lenguaje', 'frecuencia_visita', 'estado', 'medio_comunicacion', 'grado_estudios',
            'estado_escolar'
        ];

        filters.forEach(filter => {
            loadFilterOptions(filter);
        });
    }

    // Función para cargar las opciones de los filtros desde la base de datos
    function loadFilterOptions(filter) {
        $.ajax({
            url: 'assets/php/fetchOptions.php',
            type: 'GET',
            data: { filter: filter },
            success: function(data) {
                $(`#${filter}`).append(data);
            }
        });
    }
});


    // Evento para buscar con los filtros seleccionados
    $('#filters select').change(function() {
        fetchResults();
    });

    // Función para buscar y mostrar los resultados
    function fetchResults() {
        let query = 'SELECT * FROM visitas WHERE 1=1';
    
        $('#filters select').each(function() {
            if ($(this).val() !== '') {
                query +=  `AND ${$(this).attr('id')} = '${$(this).val()}'`;
            }
        });

        $.ajax({
            url: 'assets/php/fetchData.php',
            type: 'POST',
            data: { query: query },
            success: function(data) {
                $('#results').html(data);
                updateSummary(data);
            }
        });
    }

    // Función para actualizar el resumen
    function updateSummary(data) {
        // Aquí puedes actualizar los elementos del resumen con los datos obtenidos
        // Ejemplo:
        $('#total_visitas').text(data.total_visitas);
        $('#visitas_transporte').text(data.visitas_transporte);
        $('#visitas_grupo').text(data.visitas_grupo);
        $('#visitas_motivo').text(data.visitas_motivo);
        // Añade más actualizaciones según los datos necesarios
    }

