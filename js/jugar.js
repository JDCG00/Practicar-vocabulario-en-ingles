let acceder = document.getElementById("corregir")
let nPalabras = document.getElementsByClassName("draggable")

acceder.onclick = peticion

function peticion() {
    const xhttp = new XMLHttpRequest
    
    let idPalabra = []
    for (let index = 0; index < nPalabras.length; index++) {
        idPalabra[index] = nPalabras[index].getAttribute("id");
    }
    
    xhttp.open("POST", "controlador.php?accion=jugar", true)
    xhttp.send(JSON.stringify(idPalabra)) 
}