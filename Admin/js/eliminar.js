//declaracion de funcion 
window.eliminarTipo = eliminarTipo;
window.eliminarProductos = eliminarProductos;
window.eliminarPedidos = eliminarPedidos;
//funciones.
export function eliminarTipo(id) {
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            try {

                alert("Tipo elimnado con éxito");
                window.location.href = "../Admin/Index.php";

            } catch (e) {
                let mensaje = document.createElement("p");
                mensaje.innerHTML = "Se produjo un error, no se pudo eliminar Tipo";
                contenido.innerHTML = "";
                contenido.appendChild(mensaje);
            }
        }
    };

    xhttp.open("GET", "../API/tipo.php?funcion=eliminar&id=" + id, true);
    xhttp.send();
    return false;
}
export function eliminarColeccion(id) {
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            try {

                alert("coleccion eliminada con éxito");
                window.location.href = "../Admin/Index.php";

            } catch (e) {
                let mensaje = document.createElement("p");
                mensaje.innerHTML = "Se produjo un error, no se pudo eliminar coleccion";
                contenido.innerHTML = "";
                contenido.appendChild(mensaje);
            }
        }
    };

    xhttp.open("GET", "../API/coleccion.php?funcion=eliminar&id=" + id, true);
    xhttp.send();
    return false;
}
export function eliminarProductos(id) {
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            try {

                alert("productos eliminado con éxito");
                window.location.href = "../Admin/Index.php";

            } catch (e) {
                let mensaje = document.createElement("p");
                mensaje.innerHTML = "Se produjo un error, no se pudo eliminar productos";
                contenido.innerHTML = "";
                contenido.appendChild(mensaje);
            }
        }
    };

    xhttp.open("GET", "../API/productos.php?funcion=eliminar&id=" + id, true);
    xhttp.send();
    return false;
}
export function eliminarPedidos(id) {
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            try {

                alert("pedido eliminado con éxito");
                window.location.href = "../Admin/Index.php";

            } catch (e) {
                let mensaje = document.createElement("p");
                mensaje.innerHTML = "Se produjo un error, no se pudo eliminar pedido";
                contenido.innerHTML = "";
                contenido.appendChild(mensaje);
            }
        }
    };

    xhttp.open("GET", "../API/pedidos.php?funcion=eliminar&id=" + id, true);
    xhttp.send();
    return false;
}
export function eliminarMarca(id) {
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            try {

                alert("Marca eliminada con éxito");
                window.location.href = "../Admin/Index.php";

            } catch (e) {
                let mensaje = document.createElement("p");
                mensaje.innerHTML = "Se produjo un error, no se pudo eliminar Marca";
                contenido.innerHTML = "";
                contenido.appendChild(mensaje);
            }
        }
    };

    xhttp.open("GET", "../API/marca.php?funcion=eliminar&id=" + id, true);
    xhttp.send();
    return false;
}
export function eliminarToken(id) {
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            try {

                alert("Token eliminado con éxito");
                window.location.href = "../Admin/Index.php";

            } catch (e) {
                let mensaje = document.createElement("p");
                mensaje.innerHTML = "Se produjo un error, no se pudo eliminar Token";
                contenido.innerHTML = "";
                contenido.appendChild(mensaje);
            }
        }
    };

    xhttp.open("GET", "../API/token.php?funcion=eliminar&id=" + id, true);
    xhttp.send();
    return false;
}
export function eliminarUsuario(id) {
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            try {

                alert("Usuario eliminado con éxito");
                window.location.href = "../Admin/Index.php";

            } catch (e) {
                let mensaje = document.createElement("p");
                mensaje.innerHTML = "Se produjo un error, no se pudo eliminar Usuario";
                contenido.innerHTML = "";
                contenido.appendChild(mensaje);
            }
        }
    };

    xhttp.open("GET", "../API/usuario.php?funcion=eliminar&id=" + id, true);
    xhttp.send();
    return false;
}