//Importaciones
    import {crearTablaProductos,crearTablaColeccion,crearTablaMarca,crearTablaTipo,crearTablaPedidos,crearTablaToken,crearTablaUsuario,eliminar,editar} from "./crearTabla.js";
   
//Llamada de funcion
    window.inicio = inicio;
    window.tienda = tienda;
    window.mostrar = mostrar;
    window.mostrarLista = mostrarLista;
    window.mostrarCrear = mostrarCrear;
    window.mostrarUsuarios = mostrarUsuarios;
    window.eliminar = eliminar;
    window.editar = editar;




//Funciones
function inicio(){
    window.location.href = "../Admin/Index.php";

}

function tienda(){
    window.location.href = "../Index.php";
}

function mostrarLista(){
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            let busqueda = document.getElementById("busqueda");
            busqueda.style.display ='block'; 
            let prod = document.getElementById("contenido");
            let inicio = document.getElementById("inicio").style.display ='none';;
            let titulo = document.getElementById("titulo");
            titulo.innerHTML = "Tablas de la base de datos";
            try {
                let tablas = JSON.parse(this.responseText);
                let tabla = crearPaneles(tablas,mostrar);
                prod.innerHTML = "";
                prod.appendChild(tabla);
            } catch (e) {
                let mensaje = document.createElement("p");
                mensaje.innerHTML = "No se encuentran tablas";
                prod.innerHTML = "";
                prod.appendChild(mensaje);
            }
        }
    };
   
    xhttp.open("GET", "../base_de_datos/tablas.php?funcion=cargarTablas", true);
    xhttp.send();
    return false;
}

function crearPaneles(paneles,funcion){
    let linea = 1;
    let divprin = document.createElement("div");
    let filapanel;
    paneles.forEach(panel => {
        linea++
        
        if (linea % 2 == 0 || linea == 1) {
        filapanel = document.createElement("div");
        filapanel.className = "row mb-2";
        }
        // Crea los paneles
        let columna = document.createElement("div");
        columna.className = "col-md-5";
    
        let fila = document.createElement("div");
        fila.className = "row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative";
    
        let panelAcciones = document.createElement("div");
        panelAcciones.className = "col p-4 d-flex flex-column position-static";
    
        let h3 = document.createElement("h3");
        h3.className = "mb-0";
        h3.textContent = panel;
    
        let divTextBody = document.createElement("div");
        divTextBody.className = "mb-1 text-body-secondary";
        divTextBody.textContent = "Lorem ipsum";
    
        let p = document.createElement("p");
        p.className = "card-text mb-auto";
        p.textContent = "Listado de la tabla "+panel;
    
        let button = document.createElement("button");
        button.className = "btn btn-primary align-items-center";
        button.type = "button";
        button.textContent = "Continuar";
        button.onclick = function() {
            funcion(panel);
        };
    
        // Añadir los elementos en la estructura del DOM(Document Object Model)
        panelAcciones.appendChild(h3);
        panelAcciones.appendChild(divTextBody);
        panelAcciones.appendChild(p);
        panelAcciones.appendChild(button);
    
        fila.appendChild(panelAcciones);
        columna.appendChild(fila);

        filapanel.appendChild(columna); 
        
        if(linea%2 != 0 && linea> 1 ||linea == paneles.length+1) {
            divprin.appendChild(filapanel);
        }
    });
    return divprin;
}


function mostrarCrear(){
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            let busqueda = document.getElementById("busqueda");
            busqueda.style.display ='block'; 
            let prod = document.getElementById("contenido");
            document.getElementById("inicio").style.display ='none';
            let titulo = document.getElementById("titulo");
            titulo.innerHTML = "Crear en tabla";
            try {
                let tablas = JSON.parse(this.responseText);
                let tabla = crearPaneles(tablas,crear);
                prod.innerHTML = "";
                prod.appendChild(tabla);
            } catch (e) {
                let mensaje = document.createElement("p");
                mensaje.innerHTML = "No se encuentran tablas";
                prod.innerHTML = "";
                prod.appendChild(mensaje);
            }
        }
    };
   
    xhttp.open("GET", "../base_de_datos/tablas.php?funcion=cargarTablas", true);
    xhttp.send();
    return false;

}


function mostrarUsuarios(){
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("busqueda").style.display ='block'; 
            let prod = document.getElementById("contenido");
            document.getElementById("inicio").style.display ='none';
            let titulo = document.getElementById("titulo");
            titulo.innerHTML = "Tabla de usuario";
            try {
                let filas = JSON.parse(this.responseText);
                let tabla = crearTabla(filas,"usuario");
                prod.innerHTML = "";
                prod.appendChild(tabla);
            } catch (e) {
                let mensaje = document.createElement("p");
                mensaje.innerHTML = "Esta categoria no tiene Usuarios.";
                prod.innerHTML = "";
                prod.appendChild(mensaje);
            }
        }
    };
    xhttp.open("GET", "../API/usuario.php?funcion=index", true);
    xhttp.send();
    return false;

}

function mostrar(tablas){
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            let prod = document.getElementById("contenido");
            let titulo = document.getElementById("titulo");
            titulo.innerHTML = "Tabla de "+tablas;
            try {
                let filas = JSON.parse(this.responseText);
                let tabla = crearTabla(filas,tablas);
                prod.innerHTML = "";
                prod.appendChild(tabla);
            } catch (e) {
                let mensaje = document.createElement("p");
                mensaje.innerHTML = "Esta categoria no tiene "+tablas+".";
                prod.innerHTML = "";
                prod.appendChild(mensaje);
            }
        }
    };
    xhttp.open("GET", "../API/"+tablas+".php?funcion=index", true);
    xhttp.send();
    return false;
}

function crearTabla(datos,tabla){
    let tablacreada;
    switch (tabla) {
        case "coleccion":
            tablacreada= crearTablaColeccion(datos);
            break;
        case "marca":
            tablacreada= crearTablaMarca(datos);
            break;
        case "productos":
            tablacreada= crearTablaProductos(datos)
            break;
        case "tipo":
            tablacreada= crearTablaTipo(datos);
            break;    
        case "pedidos":
            tablacreada= crearTablaPedidos(datos);
            break;    
        case "token":
            tablacreada= crearTablaToken(datos);
            break;    
        case "usuario":
            tablacreada = crearTablaUsuario(datos);
            break;    
    }
return tablacreada;
}
function crear(tablas){
    switch (tablas) {
        case "coleccion":
            window.location.href = "../Admin/coleccion.php";
            break;
        case "marca":
            window.location.href = "../Admin/marca.php";
            break;
        case "productos":
            window.location.href = "../Admin/productos.php";
            break;
        case "tipo":
            window.location.href = "../Admin/tipo.php";
            break;    
        case "pedidos":
            document.write("no se puede crear un formulario de pedido");
            break;    
        case "token":
            document.write("no se puede crear un formulario de pedido");
            break;    
        case "usuario":
            window.location.href = "../Admin/usuario.php";
            break;    
 
    }
    
}




