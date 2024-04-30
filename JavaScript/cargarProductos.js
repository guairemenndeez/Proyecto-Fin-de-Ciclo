import { añadirProducto } from "./carrito.js";

window.añadirProducto = añadirProducto;

let xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {

        let tipos = document.getElementById("productos");
        try {
            let tipo = JSON.parse(this.responseText);

            let tabla = crearCartas(tipo);
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

xhttp.open("GET", "../API/productos.php?funcion=index", true);
xhttp.send();


export function crearCartas(productos) {
    let carrousel = document.createElement('div');
    carrousel.classList.add("m-4");

    let fila = document.createElement('div');
    fila.classList.add("row");
    let productosfila = 0;

    productos.forEach(producto => {
        if (productosfila === 4) {
            carrousel.appendChild(fila);
            fila = document.createElement('div');
            fila.classList.add("row");
            productosfila = 0;
        }

        let carta = document.createElement('div');
        carta.className = "card";
        carta.style.width = "18rem";

        let imagen = document.createElement('img');
        imagen.src = producto.Imagen;
        imagen.classList.add("card-img-top");
        imagen.style.width = "6vw";
        carta.appendChild(imagen);

        let cuerpoCarta = document.createElement("div");
        cuerpoCarta.className = "card-body";

        let tituloCarta = document.createElement('h4');
        tituloCarta.className = "card-title";
        tituloCarta.innerText = producto.Nombre;
        cuerpoCarta.appendChild(tituloCarta);

        let descripcionCarta = document.createElement('p');
        descripcionCarta.className = "card-text";
        descripcionCarta.innerText = producto.Descripcion;
        cuerpoCarta.appendChild(descripcionCarta);

        let botonCarta = document.createElement('button');
        botonCarta.type = "button";
        botonCarta.classList.add("btn", "btn-primary");
        botonCarta.onclick = () => añadirProducto(producto.Id);
        botonCarta.innerHTML = "Añadir al Carrito";
        cuerpoCarta.appendChild(botonCarta);

        carta.appendChild(cuerpoCarta);
        fila.appendChild(carta);

        productosfila++;
    });

    // Agregar la última fila si es necesario
    if (productosfila > 0) {
        carrousel.appendChild(fila);
    }

    return carrousel;
}
