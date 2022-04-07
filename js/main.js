const texts = document.querySelector(".texts");
let compatible = document.getElementById('compatible');
let potencia = document.getElementById('potencia');
let mensaje = document.getElementById('mensaje'); mensaje

window.SpeechRecognition =  window.SpeechRecognition || window.webkitSpeechRecognition;

const recognition = new SpeechRecognition();
let gramatica = ['POTENCIA', 0, 100];

recognition.interimResults = true;
recognition.lang = "es-MX";

/*compatibilidad*/
window.onload = (e) => {
    if (validateSpeechRecognition()) {
        compatible.innerHTML = "¡El navegador es compatible con Speech Recognition API!";
        recognition.start();
    } else
        compatible.innerHTML = "El navegador NO es compatible con Speech Recognition API";
}

recognition.onresult = (e) => {
    let text = Array.from(e.results)
        .map((result) => result[0])
        .map((result) => result.transcript)
        .join("");
    text = text.toUpperCase();

    //console.log(text);

    let arrayText = text.split(" ");
    let segundoValor = parseInt(arrayText[1], 10);
    //console.log(segundoValor);
    //console.log(arrayText);

    let dataString = "status=" + (segundoValor);
    e.preventDefault();

    if (e.results[0].isFinal) {
        //text.includes("potencia")
        if (validaGramatica(arrayText[0], segundoValor, gramatica[0], gramatica[1], gramatica[2])) {
           
            $.ajax
            ({
                type: "GET",
                url: "backend/setStatusHume.php",
                data: dataString,
                success: function (res) {
                    console.log(res);
                   // mensaje.innerHTML = "[Se guardó en el servidor " + res + "]";
              }
            });
            texts.innerText = "Potencia a: " + segundoValor + " Grados";
            potencia.value = segundoValor;
            mensaje.innerHTML = "Se envía la petición al servidor..."
            
        }

        /* else
            texts.innerText = ""; */
    }
};
/* recognition.addEventListener("end", () => {
    recognition.start();
}); */
// run when the speech recognition service has disconnected
// (automatically or forced with recognition.stop())
recognition.onend = () => {
    //console.log('Speech recognition service disconnected');
    recognition.start();
};

// will run when the speech recognition 
// service has began listening to incoming audio 

recognition.onstart = () => {
    console.log('Speech recognition service has started');

};
/* recognition.start(); */

function validateSpeechRecognition() {
    if (!('webkitSpeechRecognition' in window) ||
        !window.hasOwnProperty("webkitSpeechRecognition") ||
        typeof (webkitSpeechRecognition) != "function"
    ){
        return false;
    }
    else {
        return true;
    }
}
function validaGramatica(palabra1, palabra2, gramatica1, gramatica2, gramatica3) {
    if (palabra1 == gramatica1 &&  Number.isInteger(palabra2) &&
        palabra2 >= gramatica2 && palabra2 <= gramatica3) {
        return true;
    }
    else
        return false;
}
potencia.addEventListener('input', function (e) {
    let dataString = "status=" + (potencia.value);
    e.preventDefault();
    $.ajax
        ({
            type: "GET",
            url: "backend/setStatusHume.php",
            data: dataString,
            success: function (res) {
                console.log(res);
                console.log("Se guardó en el servidor");
            }
        });
        texts.innerText = "Potencia a: " + potencia.value + " Grados";
});
