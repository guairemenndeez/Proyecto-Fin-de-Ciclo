import { validacion } from "../JavaScript/validar.js";

window.validacion = validacion;
window.modificarInformacion = modificarInformacion;
window.actualizarDatos = actualizarDatos;


mostrar();
infoUsuario();



function crearTablaPedidos(datos) {
    let tablaPedido = document.createElement("table");
    tablaPedido.classList.add("table");
    // tablaColeccion.classList.add("table-primary");
    let cabeceraPedido = crear_fila(["Id", "estado", "Metodo de Pago", "Direccion", "Fecha de pedido", "Total"], "th");
    tablaPedido.appendChild(cabeceraPedido);
    for (let i = 0; i < datos.length; i++) {
        /*formulario*/
        //let mostrarPedido;
        let fila = crear_fila([datos[i]['Id'], datos[i]['Estado'], datos[i]['Metodo_Pago'], datos[i]['Direccion'], datos[i]['FechaPedido'], datos[i]['TotalPedido']], "td");
        tablaPedido.appendChild(fila);
    }
    return tablaPedido;
}
function crear_fila(campos, tipo) {
    var fila = document.createElement("tr");
    for (var i = 0; i < campos.length; i++) {
        var celda = document.createElement(tipo);
        celda.innerHTML = campos[i];
        celda.style.textAlign = "center";
        fila.appendChild(celda);
    }
    return fila;
}
function mostrar() {
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            let prod = document.getElementById("contenido");

            try {
                let filas = JSON.parse(this.responseText);
                let tabla = crearTablaPedidos(filas);
                prod.innerHTML = "";
                prod.appendChild(tabla);
            } catch (e) {
                let mensaje = document.createElement("p");
                mensaje.innerHTML = "Este usuario no tiene pedidos.";
                prod.innerHTML = "";
                prod.appendChild(mensaje);
            }
        }
    };
    xhttp.open("GET", "../API/pedidos.php?funcion=pedidosUsuario", true);
    xhttp.send();
    return false;
}



function infoUsuario() {
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            let dato = JSON.parse(this.responseText);
            datosUsuario(dato[0]);

        }
    };


    xhttp.open("GET", "../API/usuario.php?funcion=obtenerUsuarioCorreo", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send();
    return false;

}
function datosUsuario(datos) {

    document.getElementById("nombreUsuario").value = datos.Nombre
    document.getElementById("apellidoUsuario").value = datos.Apellidos
    document.getElementById("correoUsuario").value = datos.Correo
    document.getElementById("direccionUsuario").value = datos.Direccion
    document.getElementById("telefonoUsuario").value = datos.Telefono

}

function modificarInformacion() {

    let imputs = Array.from(document.getElementsByTagName("input"));
    imputs.forEach(imput => {
        imput.removeAttribute("disabled");
        imput.removeAttribute("readonly");
    });
}

function actualizarDatos() {
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            try {
                if (JSON.stringify(this.readyState) == true) {
                    alert("Marca añadida con éxito");
                    window.location.href = "../Index.php";
                }


            } catch (e) {
                let mensaje = document.createElement("p");
                mensaje.innerHTML = "Se produjo un error, no se pudo modificar el usuario";
                contenido.innerHTML = "";
                contenido.appendChild(mensaje);
            }
        }
    };


    let nombre = document.getElementById("nombreUsuario").value;
    let apellidos = document.getElementById("apellidoUsuario").value;
    let email = document.getElementById("correoUsuario").value;
    let direccion = document.getElementById("direccionUsuario").value;
    let telefono = document.getElementById("telefonoUsuario").value;

    let elementos = ['nombre', 'apellidos', 'email', 'direccion', 'telefono'];
    let valores = [nombre, apellidos, email, direccion, telefono];

    if (validacion(elementos, valores) != false) {
        let params = "nombre=" + nombre + "&apellidos=" + apellidos + "&email=" + email + "&direccion=" + direccion + "&telefono=" + telefono + "&funcion=actualizarUsuario";
        xhttp.open("POST", "../API/usuario.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send(params);
        return false;
    }
}
