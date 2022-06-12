let acceder = document.getElementById("corregir")
let nPalabras = document.getElementsByClassName("draggable")


acceder.onclick = peticion

function peticion() {
    const url = new URLSearchParams(window.location.search);
    const id = url.get('id');
    const xhttp = new XMLHttpRequest()
    
    
    
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
    
    
    setTimeout(validacionGET, 20)

    function validacionGET() {
        const xhttp2 = new XMLHttpRequest()
        xhttp2.onload = function(){
            let datos = JSON.parse(xhttp2.responseText)
            
            for (const dato in datos) {
                let pPalabra = document.getElementsByName("palabra"+dato)
                let imagen = document.createElement("img")
                imagen.setAttribute("id", `imgValidar${dato}`)
                imagen.setAttribute("class", "imgValidar")
                let imgValidar = document.getElementById(`imgValidar${dato}`)
                if(pPalabra[0].contains(imgValidar)){
                    imgValidar.remove()
                    pPalabra[0].appendChild(imagen)
                }else{
                    pPalabra[0].appendChild(imagen)
                }

                if (datos[dato] == "correcto") {
                    imagen.setAttribute("src", "../../imgs/correcto.png")
                    console.log("correcto");
                }else{
                    imagen.setAttribute("src", "../../imgs/incorrecto.png")
                    console.log("incorrecto");
                }
            }
            
        }
        xhttp2.open("GET", "../../js/validacion.json", true)
        xhttp2.setRequestHeader('Content-type', 'applications/json')
        xhttp2.send() 
        console.log(xhttp2);
    }
}