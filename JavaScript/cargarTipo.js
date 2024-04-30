import { crearCartas } from "./cargarProductos.js";


let xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {

        let tipos = document.getElementById("tipo");
        try {
            let tipo = JSON.parse(this.responseText);
            let tabla = actualizarTipoNav(tipo);
            tipos.innerHTML = "";
            tipos.appendChild(tabla);
        } catch (e) {
            let mensaje = document.createElement("p");
            mensaje.innerHTML = "No se ha podido cargar";
            tipos.innerHTML = "";
            tipos.appendChild(mensaje);
        }
    }
};

xhttp.open("GET", "../API/tipo.php?funcion=index", true);
xhttp.send();


function actualizarTipoNav(tipos) {
    let Lista = document.createElement("ul");
    Lista.classList.add("btn-toggle-nav", "list-unstyled", "fw-normal", "pb-1", "small");
    tipos.forEach(tipo => {
        var tipoLista = document.createElement("li");
        let enlace = document.createElement("a");
        enlace.onclick = () => cargarProductosTipo(tipo.Id, tipo.Nombre)
        enlace.classList.add("link-body-emphasis", "d-inline-flex", "text-decoration-none");
        enlace.innerText = tipo.Nombre;
        tipoLista.appendChild(enlace);
        Lista.appendChild(tipoLista);
    });
    return Lista;
}

function cargarProductosTipo(id, nombre) {
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
                    alert("Este tipo no tiene productos");
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
    xhttp.open("GET", "../API/productos.php?funcion=indextipo&id=" + id, true);
    xhttp.send();
    return false;
}