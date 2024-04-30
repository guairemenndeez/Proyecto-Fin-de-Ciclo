
window.formularioPagar = formularioPagar;
window.añadirProductos = añadirProductos;
window.eliminarProducto = eliminarProducto;


export function añadirProducto(id) {
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            let mensaje = this.responseText;
            alert(mensaje);
        }

    }
    let params = "Id=" + id + "&Cantidad=" + 1 + "&funcion=añadir";
    xhttp.open("POST", "../API/pedidos.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(params);
    return false;
}



function añadirProductos(id) {
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            let mensaje = this.responseText;
            alert(mensaje);
            location.reload();
        }

    }
    let cantidad = document.getElementById("cantidadProducto" + id).value;
    let params = "Id=" + id + "&Cantidad=" + cantidad + "&funcion=añadir";
    xhttp.open("POST", "../API/pedidos.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(params);
    return false;
}

function eliminarProducto(id) {
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            let mensaje = this.responseText;
            alert(mensaje);
            location.reload();
        }

    }
    let cantidad = document.getElementById("cantidadProducto" + id).value;
    xhttp.open("GET", "../API/pedidos.php?Id=" + id + "&Cantidad=" + cantidad + "&funcion=eliminar", true);
    xhttp.send();
    return false;
}


function formularioPagar() {
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            window.location.href = "./pago.php";

        }

    }
    xhttp.open("GET", "../API/pedidos.php?funcion=crear", true);
    xhttp.send();
    return false;





}