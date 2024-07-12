/*
Gian Carlo Grovas Rodríguez
0232300
*/
let randomNumber = Math.floor(Math.random() * 100) + 1;
let attempts = 0;
const maxAttempts = 10;

console.log('Random Number:', randomNumber); // For debugging purposes

function checkGuess() {
    const guessInput = document.getElementById('guessInput');
    const result = document.getElementById('result');
    const message = document.getElementById('message');
    const alertBox = document.getElementById('alert');
    
    const userGuess = parseInt(guessInput.value);
    attempts++;

    if (attempts > maxAttempts) {
        alertBox.textContent = `Perdiste! Agotaste tus intentos. El número correcto era ${randomNumber}.`;
        alertBox.className = 'alert alert-danger';
        alertBox.style.display = 'block';
        guessInput.disabled = true;
    } else if (userGuess === randomNumber) {
        alertBox.textContent = `Felicidades! Adivinaste el número (${randomNumber}) correctamente.`;
        alertBox.className = 'alert alert-success';
        alertBox.style.display = 'block';
        guessInput.disabled = true;
    } else if (userGuess > randomNumber) {
        alertBox.textContent = 'Incorrecto! El número es menor. te quedan '+(maxAttempts-attempts)+" intentos";
        alertBox.className = 'alert alert-warning';
        alertBox.style.display = 'block';
    } else if (userGuess < randomNumber) {
        alertBox.textContent = 'Incorrecto! El número es mayor. te quedan '+(maxAttempts-attempts)+" intentos";
        alertBox.className = 'alert alert-warning';
        alertBox.style.display = 'block';
    } else {
        alertBox.textContent = 'Por favor, ingresa un número válido.';
        alertBox.className = 'alert alert-danger';
        alertBox.style.display = 'block';
    }

    guessInput.value = '';
    guessInput.focus();
}