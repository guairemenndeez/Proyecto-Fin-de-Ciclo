let xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {

        let tipos = document.getElementById("tipos");
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

xhttp.open("GET", "../API/tipo.php?funcion=index", true);
xhttp.send();


function crearCartas(tipos) {
    let carrousel = document.createElement('div');
    carrousel.classList.add("row")
    carrousel.classList.add("m-4")
    tipos.forEach(tipo => {
        let carta = document.createElement('div');
        carta.className = "card";
        carta.style = "width:18rem"
        carta.innerHTML = `
        <div class="row"><h4>${tipo.Nombre}</h4></div>
        
        <div class="row"><p>${tipo.Descripcion}</p></div>
        `;
        carrousel.appendChild(carta);
    });
    return carrousel;
}

