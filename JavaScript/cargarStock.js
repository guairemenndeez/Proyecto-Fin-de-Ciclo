import { crearCartas } from "./cargarProductos.js";

let stocks = document.getElementById("stock");
try {
    let stock = ["En Stock", "Sin Stock"]
    let tabla = actualizarStockNav(stock);
    stocks.innerHTML = "";
    stocks.appendChild(tabla);
} catch (e) {
    let mensaje = document.createElement("p");
    mensaje.innerHTML = "No se ha podido cargar";
    stocks.innerHTML = "";
    stocks.appendChild(mensaje);
}

function actualizarStockNav(stocks) {
    var lista = document.createElement("ul");
    lista.classList.add("btn-toggle-nav", "list-unstyled", "fw-normal", "pb-1", "small");
    stocks.forEach(stock => {
        var stockLista = document.createElement("li");
        let enlace = document.createElement("a");
        enlace.onclick = () => cargarProductosStock(stock)
        enlace.classList.add("link-body-emphasis", "d-inline-flex", "text-decoration-none");
        enlace.innerText = stock;
        stockLista.appendChild(enlace);
        lista.appendChild(stockLista);
    });
    return lista;
}

function cargarProductosStock(stock) {
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            let prod = document.getElementById("productos");
            let titulo = document.getElementById("Titulo");
            titulo.innerHTML = " ";
            titulo.innerHTML = "Productos " + stock;
            try {
                let filas = JSON.parse(this.responseText);
                if (filas.length == 0) {
                    alert("Este stock no tiene productos");
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
    xhttp.open("GET", "../API/productos.php?funcion=indexstock&stock=" + stock, true);
    xhttp.send();
    return false;
}