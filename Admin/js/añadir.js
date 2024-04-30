    import { validacion} from "./validar.js";
//declaracion de funcion 
window.addTipo = addTipo;
window.addColeccion = addColeccion;
window.addMarca = addMarca;
window.addUsuario = addUsuario;
window.addProducto = addProducto;
window.validacion = validacion;



//funciones 
function addTipo(){
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            try {
                alert("Tipo añadida con éxito");
                window.location.href = "../Admin/Index.php";

            } catch (e) {
                let mensaje = document.createElement("p");
                mensaje.innerHTML = "Se produjo un error, no se pudo añadir Categoría";
                contenido.innerHTML = "";
                contenido.appendChild(mensaje);
            }
        }
    };
    // recogemos la url para dividirla en segmentos y despues cogemos el ultimo para obtener el archivo y finalmente obtener el nombre sin variable
    let url = window.location.href;
    let archivoConExtension = url.substring(url.lastIndexOf('/')+1);
    let archivo = archivoConExtension.substring(0, archivoConExtension.lastIndexOf('.'));
    //extraccion de los datos introducido por pantalla
    let nombre = document.getElementById("nombre").value;
    let descripcion = document.getElementById("descripcion").value;
    let elementos=['nombre','descripcion'];
    let valores=[nombre,descripcion];
    
    if(validacion(elementos,valores)!=false){
        let params = "nombre=" + nombre + "&descripcion=" + descripcion;
        xhttp.open("POST", "../API/"+archivo+".php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send(params);
        return false;
    }

    
}

function addColeccion(){
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            try {
                alert("Coleccion añadida con éxito");
                window.location.href = "../Admin/Index.php";

            } catch (e) {
                let mensaje = document.createElement("p");
                mensaje.innerHTML = "Se produjo un error, no se pudo añadir Coleccion";
                contenido.innerHTML = "";
                contenido.appendChild(mensaje);
            }
        }
    };

    let url = window.location.href;
    let archivoConExtension = url.substring(url.lastIndexOf('/')+1);
    let archivo = archivoConExtension.substring(0, archivoConExtension.lastIndexOf('.'));

    let nombre = document.getElementById("nombre").value;
    let descripcion = document.getElementById("descripcion").value;
    let marca = document.getElementById("marca").value;
    let elementos=['nombre','descripcion'];
    let valores=[nombre,descripcion];
    
    if(validacion(elementos,valores)!=false){
    let params = "nombre=" + nombre + "&descripcion=" + descripcion+ "&marca=" + marca;
    xhttp.open("POST", "../API/"+archivo+".php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(params);
    return false;
}
}

function addMarca(){
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            try {
                alert("Marca añadida con éxito");
                window.location.href = "../Admin/Index.php";

            } catch (e) {
                let mensaje = document.createElement("p");
                mensaje.innerHTML = "Se produjo un error, no se pudo añadir Marca";
                contenido.innerHTML = "";
                contenido.appendChild(mensaje);
            }
        }
    };

    let url = window.location.href;
    let archivoConExtension = url.substring(url.lastIndexOf('/')+1);
    let archivo = archivoConExtension.substring(0, archivoConExtension.lastIndexOf('.'));

    let nombre = document.getElementById("nombre").value;
    let descripcion = document.getElementById("descripcion").value;
    let elementos=['nombre','descripcion'];
    let valores=[nombre,descripcion];
    
    if(validacion(elementos,valores)!=false){
    let params = "nombre=" + nombre + "&descripcion=" + descripcion;
    xhttp.open("POST", "../API/"+archivo+".php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(params);
    return false;
}
}

function addUsuario(){
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            try {
                alert("Usuario añadido con éxito");
                window.location.href = "../Admin/Index.php";

            } catch (e) {
                let mensaje = document.createElement("p");
                mensaje.innerHTML = "Se produjo un error, no se pudo crear el usuario";
                contenido.innerHTML = "";
                contenido.appendChild(mensaje);
            }
        }
    };

    let url = window.location.href;
    let archivoConExtension = url.substring(url.lastIndexOf('/')+1);
    let archivo = archivoConExtension.substring(0, archivoConExtension.lastIndexOf('.'));

    let nombre = document.getElementById("nombre").value;
    let apellidos = document.getElementById("apellidos").value;
    let email = document.getElementById("email").value;
    let direccion = document.getElementById("direccion").value;
    let telefono = document.getElementById("telefono").value;
    let contraseña = document.getElementById("contraseña").value;
    let repcontraseña = document.getElementById("repcontraseña").value;
    let elementos=['nombre',   'apellidos',   'email',   'direccion',   'telefono',   'contraseña'];
    let valores=[nombre,   apellidos,   email,   direccion,   telefono,   contraseña, repcontraseña];
    // validacion();
    if(validacion(elementos,valores)!=false){
    let params = "nombre=" + nombre + "&apellidos=" + apellidos+ "&email=" + email+ "&direccion=" + direccion+ "&telefono=" + telefono+ "&contraseña=" + contraseña+ "&permisos=admin&funcion=crear";
    xhttp.open("POST", "../API/"+archivo+".php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(params);
    return false;
}
}

function addProducto(){
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            try {
                alert("Usuario añadido con éxito");
                window.location.href = "../Admin/Index.php";

            } catch (e) {
                let mensaje = document.createElement("p");
                mensaje.innerHTML = "Se produjo un error, no se pudo crear el usuario";
                contenido.innerHTML = "";
                contenido.appendChild(mensaje);
            }
        }
    };

    let url = window.location.href;
    let archivoConExtension = url.substring(url.lastIndexOf('/')+1);
    let archivo = archivoConExtension.substring(0, archivoConExtension.lastIndexOf('.'));

    // let nombre = document.getElementById("nombre").value;
    // let descripcion = document.getElementById("descripcion").value;
    // let precio = document.getElementById("precio").value;
    // let stock = document.getElementById("stock").value;
    // let tipo = document.getElementById("tipo").value;
    // let coleccion = document.getElementById("coleccion").value;
    // let imagen = document.getElementById("img").files[0];
    
    // let params = "nombre=" + nombre + "&descripcion=" + descripcion+ "&precio=" + precio+ "&stock=" + stock+ "&tipo=" + tipo+ "&coleccion=" + coleccion+"&imagen="+imagen;

    let formulario = document.getElementById("formulario");
    let formData = new FormData(formulario);
    xhttp.open("POST", "../API/"+archivo+".php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(formData);
    return false;
}