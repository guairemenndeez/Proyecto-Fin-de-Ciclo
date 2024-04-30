import { crearCartas } from "./cargarProductos.js";


let xhttp_coleccion = new XMLHttpRequest();
xhttp_coleccion.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {

        let colecciones = document.getElementById("coleccion");
        try {
            let coleccion = JSON.parse(this.responseText);
            let tabla = actualizarColeccionNav(coleccion);
            colecciones.innerHTML = "";
            colecciones.appendChild(tabla);
        } catch (e) {
            let mensaje = document.createElement("p");
            mensaje.innerHTML = "No se ha podido cargar";
            colecciones.innerHTML = "";
            colecciones.appendChild(mensaje);
        }
    }
};

xhttp_coleccion.open("GET", "../API/coleccion.php?funcion=index", true);
xhttp_coleccion.send();


function actualizarColeccionNav(coleccions) {
    let lista = document.createElement("ul");
    lista.classList.add("btn-toggle-nav", "list-unstyled", "fw-normal", "pb-1", "small");
    coleccions.forEach(coleccion => {
        var coleccionLista = document.createElement("li");
        let enlace = document.createElement("a");
        enlace.onclick = () => cargarProductoscoleccion(coleccion.Id, coleccion.Nombre)
        enlace.classList.add("link-body-emphasis", "d-inline-flex", "text-decoration-none");
        enlace.innerText = coleccion.Nombre;
        coleccionLista.appendChild(enlace);
        lista.appendChild(coleccionLista);
    });
    return lista;
}
function cargarProductoscoleccion(id, nombre) {
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            let prod = document.getElementById("productos");
            let titulo = document.getElementById("Titulo");
            titulo.innerHTML = " ";
            titulo.innerHTML = "Productos de " + nombre;
            try {
                let filas = JSON.parse(this.responseText);
                if (filas.length == 0) {
                    alert("Esta coleccion no tiene productos");
                    location.reload();
                } else {
                    let tabla = crearCartas(filas);
                    prod.innerHTML = "";
                    prod.appendChild(tabla);
                }


            } catch (e) {
                let mensaje = document.createElement("p");
                mensaje.innerHTML = "Error de recogida.";
                prod.innerHTML = "";
                prod.appendChild(mensaje);
            }
        }
    };
    xhttp.open("GET", "../API/productos.php?funcion=indexColeccion&id=" + id, true);
    xhttp.send();
    return false;
}
