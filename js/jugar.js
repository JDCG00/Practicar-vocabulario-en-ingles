let acceder = document.getElementById("corregir")
let nPalabras = document.getElementsByClassName("draggable")


acceder.onclick = peticion

function peticion() {
    const url = new URLSearchParams(window.location.search);
    const id = url.get('id');
    const xhttp = new XMLHttpRequest
    

    
    let palabras = {
        id: id
    }
    for (let palabra of nPalabras) {
        let idPalabra = palabra.getAttribute("id")
        let padres = palabra.parentElement.getAttribute("id")
        palabras[idPalabra] = padres
    }
    console.log(palabras);
    xhttp.open("POST", "controladorPalabras.php", true)
    xhttp.send(JSON.stringify(palabras)) 
    
}