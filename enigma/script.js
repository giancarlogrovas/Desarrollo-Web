let selectedCircle = null;

$(document).ready(function() {
    const iconClasses = [
        'fa fa-star',
        'fa fa-heart',
        'fa fa-circle',
        'fa fa-square',
        'fa fa-triangle',
        'fa fa-diamond'
    ];

    function addIcons(circleId, numIcons) {
        const $circle = $(`#${circleId}`);
        const radius = $circle.width() / 2; // radio del círculo
    
        for (let i = 0; i < numIcons; i++) {
            const angle = (360 / numIcons) * i; // ángulo de cada icono
            const radians = angle * (Math.PI / 180); // convertir a radianes
    
            // posición del icono en el borde del círculo
            const x = radius + radius * Math.cos(radians) - 10; // ajuste para el tamaño del icono
            const y = radius + radius * Math.sin(radians) - 10;
    
            const $icon = $('<i class="icon"></i>').addClass(iconClasses[i % iconClasses.length]);
            $icon.css({
                left: x + 'px',
                top: y + 'px'
            });
    
            $circle.append($icon);
        }
    }
    

    addIcons('circle5', 6);
    addIcons('circle4', 8);
    addIcons('circle3', 10);
    addIcons('circle2', 12);
    addIcons('circle1', 14);

    $('.circle').on('click', function() {
        if (selectedCircle) {
            $(selectedCircle).removeClass('selected');
        }
        $(this).addClass('selected');
        selectedCircle = this;
    });
});

function rotateCircle(direction) {
    if (!selectedCircle) return;

    let currentRotation = parseInt($(selectedCircle).attr('data-rotation') || 0);
    const rotationChange = direction === 'up' ? 2 : -2;
    const newRotation = currentRotation + rotationChange;

    $(selectedCircle).css('transform', `rotate(${newRotation}deg)`);
    $(selectedCircle).attr('data-rotation', newRotation);
}

$(document).ready(function() {
    // Crear la línea roja
    const $line = $('<div class="line"></div>');
    $('.circle-container').append($line);

    // Función para verificar la combinación de símbolos
    function checkCombination() {
        const $circles = $('.circle');
        let symbols = [];

        $circles.each(function() {
            const $icon = $(this).find('.icon').first();
            const symbolClass = $icon.attr('class').split(' ')[1]; // obtener la clase del símbolo
            symbols.push(symbolClass);
        });

        const uniqueSymbols = new Set(symbols);

        // Si hay más de un símbolo único en los círculos
        if (uniqueSymbols.size > 1) {
            // Pintar los círculos de morado
            $circles.css('background-color', 'purple');
            // Mostrar una alerta
            alert('¡Combinación incorrecta de símbolos!');
        }
    }

    // Evento para verificar la combinación al hacer clic en la línea roja
    $('.line').on('click', function() {
        checkCombination();
    });
});



