import { validacion } from "../JavaScript/validar.js";

window.formularioPagar = formularioPagar;
window.validacion = validacion;


function formularioPagar() {
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            if (JSON.parse(this.responseText) == true) {
                alert("Su pedido esta en preparacion");
                window.location.href = "../Index.php";
            };

        }

    }
    let nombre = document.getElementById("nombrePedido").value;
    let apellido = document.getElementById("apellidoPedido").value;
    let correo = document.getElementById("correoPedido").value;
    let metodoPago = document.getElementById("metodoPagoPedido").value;
    let direccion = document.getElementById("direccionPedido").value;
    let elementos = ["nombre", "apellido", "email", "metodoPago", "direccion"];
    let valores = [nombre, apellido, correo, metodoPago, direccion];
    if (metodoPago == "Tarjeta") {
        let tarjetaNum = document.getElementById("tajetaNumPedido").value;
        let fechaCad = document.getElementById("fechaCadPedido").value;
        let Cvv = document.getElementById("CVVPedido").value;
        elementos = ["nombre", "apellido", "email", "metodoPago", "direccion", "tarjetaNum", "fechaCad", "Cvv"];
        valores = [nombre, apellido, correo, metodoPago, direccion, tarjetaNum, fechaCad, Cvv];

    }

    if (validacion(elementos, valores) != false) {
        let params = "valores=" + valores + "&funcion=completarPedido";
        xhttp.open("POST", "../API/pedidos.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send(params);
        return false;
    }

}