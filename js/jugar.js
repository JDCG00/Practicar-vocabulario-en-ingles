const xhttp = new XMLHttpRequest
let value = document.getElementById("1").id
let datos = {
    test: 'sadas',
    id: value
}
xhttp.open("POST", "controlador.php?accion=jugar", true)
xhttp.send(JSON.stringify(datos)) 


console.log(value);

let formularioCodigo = document.getElementById("formCodigo")
let acceder = document.getElementById("acceder")
acceder.onclick = formularioCodigo.remove()
