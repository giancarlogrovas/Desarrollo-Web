var timer = [0, 0, 0];


function updateTimer() {
    let h = "0" + timer[0];
    let m = "0" + timer[1];
    let s = "0" + timer[2];

    h = h.substring(h.length - 2, h.length);
    m = m.substring(m.length - 2, m.length);
    s = s.substring(s.length - 2, s.length);

    document.getElementById("hr").innerHTML = h;
    document.getElementById("min").innerHTML = m;
    document.getElementById("seg").innerHTML = s;
}

function setTimer(mod, pos) {
    if (pos === 0) { // Si se está modificando la posición de las horas
        if (timer[pos] + mod < 0) {
            timer[pos] = 23;
        } else if (timer[pos] + mod > 23) {
            timer[pos] = 0;
        } else {
            timer[pos] += mod;
        }
    } else if (pos === 1) { // Si se está modificando la posición de los minutos
        if (timer[pos] + mod < 0) {
            timer[pos] = 59;
            setTimer(-1, 0); // Restar 1 hora
        } else if (timer[pos] + mod > 59) {
            timer[pos] = 0;
            setTimer(1, 0); // Sumar 1 hora
        } else {
            timer[pos] += mod;
        }
    } else if (pos === 2) { // Si se está modificando la posición de los segundos
        if (timer[pos] + mod < 0) {
            timer[pos] = 59;
            setTimer(-1, 1); // Restar 1 minuto
        } else if (timer[pos] + mod > 59) {
            timer[pos] = 0;
            setTimer(1, 1); // Sumar 1 minuto
        } else {
            timer[pos] += mod;
        }
    }
    updateTimer();
}

var timerRunning = false;

function timerClock(){
    if(timerClock){
        setTimer(-1,2);
        if(timerRunning){
            setTimeout(()=>{
                timerClock();
            }, 1000)
        }
    }
}

function iniciarTimer() {
    timerRunning = true;
    timerClock();
}

function detenerTimer() {
    timerRunning = false;
}

function reiniciarTimer() {
    timer = [0, 0, 0];
    detenerTimer();
    updateTimer();
}

updateTimer();
