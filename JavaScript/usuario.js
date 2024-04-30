import { validacion } from "../JavaScript/validar.js";



window.addUsuario = addUsuario;
window.login = login;
window.admin = admin;
window.cerrarSesion = cerrarSesion;
// window.validacion = validacion;

function login() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            //alert(this.responseText);
            try {
                if (this.responseText == false) {
                    alert("Revise usuario y contraseña");
                } else {
                    window.location.href = "./Index.php";

                }
            } catch (e) {
                alert(e);
            }

        }
    }
    var correo = document.getElementById("correo").value;
    var contraseña = document.getElementById("contraseña").value;
    var params = "correo=" + correo + "&contraseña=" + contraseña + "&funcion=login";
    xhttp.open("POST", "../API/usuario.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(params);
    return false;
}



function admin() {

    window.location.href = "../Admin";
}




function cerrarSesion() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            /*cambiar visibilidades de las secciones*/
            location.reload();
            alert("Sesion cerrada con éxito");
        }
    };
    xhttp.open("GET", "../API/usuario.php?funcion=cerrarsesion", true);
    xhttp.send();
    return false;
}





function addUsuario() {
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            try {
                alert("Usuario creado con éxito");
                window.location.href = "../Admin/Index.php";

            } catch (e) {
                let mensaje = document.createElement("p");
                mensaje.innerHTML = "Se produjo un error, no se pudo crear el usuario";
                contenido.innerHTML = "";
                contenido.appendChild(mensaje);
            }
        }
    };
    let nombre = document.getElementById("nombre").value;
    let apellidos = document.getElementById("apellidos").value;
    let email = document.getElementById("email").value;
    let direccion = document.getElementById("direccion").value;
    let telefono = document.getElementById("telefono").value;
    let contraseña = document.getElementById("contraseña").value;
    let repcontraseña = document.getElementById("repcontraseña").value;
    let elementos = ['nombre', 'apellidos', 'email', 'direccion', 'telefono', 'contraseña'];
    let valores = [nombre, apellidos, email, direccion, telefono, contraseña, repcontraseña];
    // validacion();
    if (validacion(elementos, valores) != false) {
        let params = "nombre=" + nombre + "&apellidos=" + apellidos + "&email=" + email + "&direccion=" + direccion + "&telefono=" + telefono + "&contraseña=" + contraseña + "&permisos=usuario&funcion=crear";
        xhttp.open("POST", "../API/usuario.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send(params);
        return false;
    }
}