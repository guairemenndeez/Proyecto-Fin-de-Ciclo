let xhttp = new XMLHttpRequest();
let tipos = document.getElementById("productos");
let total = document.getElementById("resumenTotal");

xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {

        try {
            let productos = JSON.parse(this.responseText);
            let tabla = crearTablaCarrito(productos);
            tipos.innerHTML = "";
            tipos.appendChild(tabla);
            let totalP = cargarTotal(productos);
            total.appendChild(totalP);
        } catch (e) {
            let mensaje = document.createElement("h1");
            mensaje.innerHTML = "No tienes nada en el carrito";
            tipos.appendChild(mensaje);
        }
    }
};

xhttp.open("GET", "../API/pedidos.php?funcion=carrito", true);
xhttp.send();

function crearTablaCarrito(datos) {
    let productos = document.createElement("div");
    for (let i = 0; i < datos[0].length; i++) {
        let producto = JSON.parse(datos[0][i])

        let divCarta = document.createElement("div");
        divCarta.classList.add("card", "mb-3");
        divCarta.style = "max-width: 540px";
        let contenido = document.createElement("div");
        contenido.classList.add("row", "g-0");
        let imagenCol = document.createElement("div");
        imagenCol.classList.add("col-md-4");

        let imagen = document.createElement("img")
        imagen.src = producto[0].Imagen;
        imagen.classList.add("img-fluid", "rounded-start");
        imagenCol.appendChild(imagen);
        contenido.appendChild(imagenCol);

        let cuerpoCol = document.createElement("div");
        cuerpoCol.classList.add("col-md-8");

        let cuerpo = document.createElement("div");
        cuerpo.classList.add("card-body");

        let nombrePro = document.createElement("h4");
        nombrePro.classList.add("card-title");
        nombrePro.textContent = producto[0].Nombre;
        cuerpo.appendChild(nombrePro);

        let descripcionPro = document.createElement('p');
        descripcionPro.className = "card-text";
        descripcionPro.innerText = producto[0].Descripcion;
        cuerpo.appendChild(descripcionPro);
        let infoPrecioPro = document.createElement('p');
        infoPrecioPro.className = "card-text";
        infoPrecioPro.innerText = "Precio: " + producto[0].Precio + "€  Unidades: " + datos[1][i] + "  Total: " + (producto[0].Precio * datos[1][i]) + "€";
        cuerpo.appendChild(infoPrecioPro);

        let inputPro = document.createElement('input');
        inputPro.type = "number";
        inputPro.min = 1;
        inputPro.style = "max-width: 150px;"
        inputPro.name = "cantidadProducto";
        inputPro.id = "cantidadProducto" + producto[0].Id;
        cuerpo.appendChild(inputPro);

        let botonAñadir = document.createElement("button");
        botonAñadir.type = "button";
        botonAñadir.classList.add("btn", "btn-primary");
        botonAñadir.onclick = () => añadirProductos(producto[0].Id);
        botonAñadir.innerHTML = "Añadir";
        cuerpo.appendChild(botonAñadir);

        let botonEliminar = document.createElement("button");
        botonEliminar.type = "button";
        botonEliminar.classList.add("btn", "btn-danger");
        botonEliminar.onclick = () => eliminarProducto(producto[0].Id);
        botonEliminar.innerHTML = "Eliminar";
        cuerpo.appendChild(botonEliminar);
        cuerpoCol.appendChild(cuerpo);
        contenido.appendChild(cuerpoCol);
        divCarta.appendChild(contenido);
        productos.appendChild(divCarta);
    }
    return productos;

}

function cargarTotal(productos) {
    let total = 0;
    let productosPrecio = productos[0];

    // Itera sobre los productos
    for (let i = 0; i < productosPrecio.length; i++) {
        let productoPrecio = JSON.parse(productosPrecio[i]);
        total += (productoPrecio[0].Precio * productos[1][i]);
    }




    let totalDiv = document.createElement("div");

    let totalCarta = document.createElement("div");
    totalCarta.classList.add("card", "mb-3");
    totalCarta.style.maxWidth = "540px";

    let totalDatos = document.createElement("div");
    totalDatos.classList.add("card-body");

    let totalTitulo = document.createElement('h4');
    totalTitulo.className = "card-text";
    totalTitulo.innerText = "Total:";
    totalDatos.appendChild(totalTitulo);

    let totalDinero = document.createElement('p');
    totalDinero.className = "card-text";
    totalDinero.innerText = "Total: " + total + "€";
    totalDatos.appendChild(totalDinero);

    let botonForm = document.createElement("button");
    botonForm.type = "submit";
    botonForm.classList.add("btn", "btn-primary");
    botonForm.innerHTML = "Pagar";
    totalDatos.appendChild(botonForm);

    totalCarta.appendChild(totalDatos);
    totalDiv.appendChild(totalCarta);

    return totalDiv;
}
