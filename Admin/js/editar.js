
window.updateColeccion = updateColeccion;
window.updateMarca = updateMarca;
window.updateProducto = updateProducto;
window.updateTipo = updateTipo;
window.updateUsuario = updateUsuario;


export function editarColeccion(id) {
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            let dato = JSON.parse(this.responseText);
            window.location.href = "../Admin/coleccion.php?id=" + dato[0].Id + "&nombre=" + dato[0].Nombre + "&descripcion=" + dato[0].Descripcion + "&marca=" + dato[0].marca_Id;
        }
    };

    xhttp.open("GET", "../API/coleccion.php?funcion=obtenerProducto&id=" + id, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send();
    return false;

}
function updateColeccion(id) {
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
    let archivoConExtension = url.substring(url.lastIndexOf('/') + 1);
    let archivo = archivoConExtension.substring(0, archivoConExtension.lastIndexOf('.'));

    let Id = document.getElementById("Id").value;
    let nombre = document.getElementById("nombreAcualizar").value;
    let descripcion = document.getElementById("descripcionAcualizar").value;
    let marca = document.getElementById("marcaAcualizar").value;
    let elementos = ['nombre', 'descripcion'];
    let valores = [nombre, descripcion];

    if (validacion(elementos, valores) != false) {
        let params = "Id=" + Id + "&nombre=" + nombre + "&descripcion=" + descripcion + "&marca=" + marca + "&funcion=actualizar";
        xhttp.open("POST", "../API/" + archivo + ".php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send(params);
        return false;
    }
}

export function editarMarca(id) {
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {

            let dato = JSON.parse(this.responseText);
            window.location.href = "../Admin/marca.php?id=" + dato[0].Id + "&nombre=" + dato[0].Nombre + "&descripcion=" + dato[0].Descripcion;
        }
    };




    xhttp.open("GET", "../API/marca.php?funcion=obtenerMarca&id=" + id, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send();
    return false;

}
function updateMarca(id) {
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
    let archivoConExtension = url.substring(url.lastIndexOf('/') + 1);
    let archivo = archivoConExtension.substring(0, archivoConExtension.lastIndexOf('.'));

    let Id = document.getElementById("Id").value;
    let nombre = document.getElementById("nombreActualizar").value;
    let descripcion = document.getElementById("descripcionActualizar").value;
    let elementos = ['nombre', 'descripcion'];
    let valores = [nombre, descripcion];

    if (validacion(elementos, valores) != false) {
        let params = "Id=" + Id + "&nombre=" + nombre + "&descripcion=" + descripcion + "&funcion=actualizar";
        xhttp.open("POST", "../API/" + archivo + ".php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send(params);
        return false;
    }
}

export function editarProducto(id) {
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {

            let dato = JSON.parse(this.responseText);
            window.location.href = "../Admin/productos.php?id=" + dato[0].Id + "&nombre=" + dato[0].Nombre + "&descripcion=" + dato[0].Descripcion + "&precio=" + dato[0].Precio + "&stock=" + dato[0].Stock + "&Tipo=" + dato[0].Tipo_id + "&coleccion=" + dato[0].coleccion_id + "&Imagen=" + dato[0].Imagen;
            ;
        }
    };



    xhttp.open("GET", "../API/productos.php?funcion=obtenerProducto&id=" + id, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send();
    return false;

}
function updateProducto(id) {
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            try {
                alert("Producto añadida con éxito");
                window.location.href = "../Admin/Index.php";

            } catch (e) {
                let mensaje = document.createElement("p");
                mensaje.innerHTML = "Se produjo un error, no se pudo añadir Producto";
                contenido.innerHTML = "";
                contenido.appendChild(mensaje);
            }
        }
    };

    let url = window.location.href;
    let archivoConExtension = url.substring(url.lastIndexOf('/') + 1);
    let archivo = archivoConExtension.substring(0, archivoConExtension.lastIndexOf('.'));

    let Id = document.getElementById("Id").value;
    let nombre = document.getElementById("nombreActualizar").value;
    let descripcion = document.getElementById("descripcionActualizar").value;
    let precio = document.getElementById("precioActualizar").value;
    let stock = document.getElementById("stockActualizar").value;
    let tipo = document.getElementById("tipoActualizar").value;
    let coleccion = document.getElementById("coleccionActualizar").value;
    let img = document.getElementById("imgActualizar").files[0];




    let elementos = ['nombre', 'descripcion', 'precio', 'stock'];
    let valores = [nombre, descripcion, precio, stock,];

    if (validacion(elementos, valores) != false) {
        let params = "Id=" + Id + "&nombre=" + nombre + "&descripcion=" + descripcion + "&precio=" + precio + "&stock=" + stock + "&tipo=" + tipo + "&coleccion=" + coleccion + "&imagen=" + img + "&funcion=actualizar";
        xhttp.open("POST", "../API/productos.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send(params);
        return false;
    }
}

export function editarTipo(id) {
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {

            let dato = JSON.parse(this.responseText);
            window.location.href = "../Admin/tipo.php?id=" + dato[0].Id + "&nombre=" + dato[0].Nombre + "&descripcion=" + dato[0].Descripcion;
        }
    };




    xhttp.open("GET", "../API/tipo.php?funcion=obtenerTipo&id=" + id, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send();
    return false;

}
function updateTipo(id) {
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


    let Id = document.getElementById("Id").value;
    let nombre = document.getElementById("nombreActualizar").value;
    let descripcion = document.getElementById("descripcionActualizar").value;
    let elementos = ['nombre', 'descripcion'];
    let valores = [nombre, descripcion];

    if (validacion(elementos, valores) != false) {
        let params = "Id=" + Id + "&nombre=" + nombre + "&descripcion=" + descripcion + "&funcion=actualizar";
        xhttp.open("POST", "../API/tipo.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send(params);
        return false;
    }
}

export function editarUsuario(id) {
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            let dato = JSON.parse(this.responseText);
            window.location.href = "../Admin/usuario.php?id=" + dato[0].Id + "&nombre=" + dato[0].Nombre + "&apellidos=" + dato[0].Apellidos + "&correo=" + dato[0].Correo + "&direccion=" + dato[0].Direccion + "&telefono=" + dato[0].Telefono + "&conteseña=" + dato[0].Contraseña;
        }
    };


    xhttp.open("GET", "../API/usuario.php?funcion=obtenerUsuario&id=" + id, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send();
    return false;

}
function updateUsuario() {
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


    let Id = document.getElementById("Id").value;
    let nombre = document.getElementById("nombreActualizar").value;
    let apellidos = document.getElementById("apellidosActualizar").value;
    let email = document.getElementById("correoActualizar").value;
    let direccion = document.getElementById("direccionActualizar").value;
    let telefono = document.getElementById("telefonoActualizar").value;
    let contraseña = document.getElementById("contraseñaActualizar").value;
    let elementos = ['nombre', 'apellidos', 'email', 'direccion', 'telefono'];
    let valores = [nombre, apellidos, email, direccion, telefono];

    if (validacion(elementos, valores) != false) {
        let params = "Id=" + Id + "&nombre=" + nombre + "&apellidos=" + apellidos + "&email=" + email + "&direccion=" + direccion + "&telefono=" + telefono + "&contraseña=" + contraseña + "&funcion=actualizar";
        xhttp.open("POST", "../API/usuario.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send(params);
        return false;
    }
}