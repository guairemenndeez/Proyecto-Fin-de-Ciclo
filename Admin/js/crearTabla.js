//importacion
import { eliminarTipo,eliminarColeccion, eliminarProductos, eliminarPedidos,eliminarMarca, eliminarToken, eliminarUsuario } from "./eliminar.js";
import { editarColeccion,editarMarca,editarProducto,editarTipo, editarUsuario} from "./editar.js";

//Eliminar
window.eliminarTipo = eliminarTipo;
window.eliminarPedidos = eliminarPedidos;
window.eliminarMarca = eliminarMarca;
window.eliminarToken = eliminarToken;
window.eliminarUsuario = eliminarUsuario;
//Editar
window.editarColeccion = editarColeccion;
window.editarMarca = editarMarca;
window.editarProducto = editarProducto;
window.editarTipo = editarTipo;
window.editarUsuario = editarUsuario;

export function crearTablaProductos(productos) {
    let tabla = document.createElement("table");
    let cabecera = crear_fila(["Id", "Nombre", "Descripción", "Precio", "Stock", "Tipo_id", "Coleccion_id", "Imagen", "Acciones"], "th");
    tabla.appendChild(cabecera);
    for (let i = 0; i < productos.length; i++) {
        /*Formulario*/
        let imagen = "<img src='/imagenProyecto/"  + productos[i]['Id'] + ".jpg'  width='60' height='90' />";
        let editar = "<button onclick='editar(" + productos[i]['Id'] + ",`Productos`);' class='btn btn-primary'>Editar Productos</button>";
        let eliminar = "<button onclick=' eliminar(" + productos[i]['Id'] + ",`Productos`);' class='btn btn-danger'>Eliminar Producto</button>";
        let acciones = editar + eliminar;

        let fila = crear_fila([productos[i]['Id'], productos[i]['Nombre'], productos[i]['Descripcion'], productos[i]['Precio'] + "€", productos[i]['Stock'], productos[i]['Tipo_id'], productos[i]['Coleccion_id'], imagen, acciones], "td");

        tabla.appendChild(fila);

    }
    return tabla;

}

function crear_fila(campos, tipo) {

    var fila = document.createElement("tr");
    for (var i = 0; i < campos.length; i++) {
        var celda = document.createElement(tipo);
        celda.innerHTML = campos[i];
        celda.style.textAlign = "center";
        fila.appendChild(celda);
    }
    return fila;

}

export function crearTablaColeccion(datos){

    let tablaColeccion = document.createElement("table");
    tablaColeccion.classList.add("table");

    let cabeceraColeccion = crear_fila(["Id", "Nombre", "Descripción","Marca", "Acciones"], "th");
    tablaColeccion.appendChild(cabeceraColeccion);

    for (let i = 0; i < datos.length; i++) {
        /*Formulario*/
        let editar = "<button onclick='editar(" + datos[i]['Id'] + ",`Coleccion`);' class='btn btn-primary'>Editar Coleccion</button>";
        let eliminar = "<button onclick='eliminar(" + datos[i]['Id']+ ",`Coleccion`);' class='btn btn-danger'>Eliminar Coleccion</button>";
        let acciones = editar + eliminar;

        let fila = crear_fila([datos[i]['Id'], datos[i]['Nombre'],  datos[i]['Descripcion'],datos[i]['Marca_id'], acciones], "td");
        tablaColeccion.appendChild(fila);
    }
    return tablaColeccion;

}

export function crearTablaMarca(datos){
    let tablaMarca = document.createElement("table");
    tablaMarca.classList.add("table");
   let cabeceraMarca = crear_fila(["Id", "Nombre", "Descripción", "Acciones"], "th");
   tablaMarca.appendChild(cabeceraMarca);
   for (let i = 0; i < datos.length; i++) {
       /*Formulario*/
       let editar = "<button onclick='editar(" + datos[i]['Id'] + ",`Marca`);' class='btn btn-primary'>Editar Marca</button>";
       let eliminar = "<button onclick=' eliminar(" + datos[i]['Id'] + ",`Marca`);' class='btn btn-danger'>Eliminar Marca</button>";
       let acciones = editar + eliminar;

       let fila = crear_fila([datos[i]['Id'], datos[i]['Nombre'],  datos[i]['Descripcion'],  acciones], "td");
       tablaMarca.appendChild(fila);
   }
   return tablaMarca;

}

export function crearTablaTipo(datos){
    let tablaTipo = document.createElement("table");
    tablaTipo.classList.add("table");
   let cabeceraTipo = crear_fila(["Id", "Nombre", "Descripción", "Acciones"], "th");
   tablaTipo.appendChild(cabeceraTipo);

   for (let i = 0; i < datos.length; i++) {
       /*Formulario*/
       let editar = "<button onclick='editar(" + datos[i]['Id'] + " ,`Tipo`);' class='btn btn-primary'>Editar Tipo</button>";
       let eliminar = "<button onclick='eliminar("+ datos[i]['Id']  + " ,`Tipo`);' class='btn btn-danger'>Eliminar Tipo</button>";
       let acciones = editar + eliminar;

       let fila = crear_fila([datos[i]['Id'], datos[i]['Nombre'],  datos[i]['Descripcion'],  acciones], "td");
       tablaTipo.appendChild(fila);

   }
   return tablaTipo;

}

export function crearTablaPedidos(datos){
    let tablaPedido = document.createElement("table");
    tablaPedido.classList.add("table");
   let cabeceraPedido = crear_fila(["Id", "Token", "Id producto","cantidad","precio", "estado", "Metodo de Pago", "Direccion", "Fecha de pedido", "Total",  "Acciones"], "th");
   tablaPedido.appendChild(cabeceraPedido);

   for (let i = 0; i < datos.length; i++) {
       /*Formulario*/
       let editar = "<button onclick='editar(" + datos[i]['Id']  + ",`Pedido`);' class='btn btn-primary'>Editar Pedido</button>";
       let eliminar = "<button onclick=' eliminar(" + datos[i]['Id'] + ",`Pedido`);' class='btn btn-danger'>Eliminar Pedido</button>";
       let acciones = editar + eliminar;

       let fila = crear_fila([datos[i]['Id'], datos[i]['Num_Token'],  datos[i]['Id_Producto'],datos[i]['Cantidad'],datos[i]['Precio'],datos[i]['Estado'],datos[i]['Metodo_Pago'],datos[i]['Direccion'],datos[i]['FechaPedido'],datos[i]['TotalPedido'],  acciones], "td");
       tablaPedido.appendChild(fila);
   }
   return tablaPedido;

}

export function crearTablaToken(datos){

    let tablaToken = document.createElement("table");
    tablaToken.classList.add("table");
   let cabeceraToken = crear_fila(["Id", "Id Usuario", "Token","Fecha Creacion","Fecha Expiracion", "Acciones"], "th");
   tablaToken.appendChild(cabeceraToken);

   for (let i = 0; i < datos.length; i++) {
       /*Formulario*/

       let editar = "<button onclick='editar(" + datos[i]['Id'] + ",`Token`);' class='btn btn-primary'>Editar Token</button>";
       let eliminar = "<button onclick='eliminar(" + datos[i]['Id'] + ",`Token`);' class='btn btn-danger'>Eliminar Token</button>";
       let acciones = editar + eliminar;

       let fila = crear_fila([datos[i]['Id'], datos[i]['Id_Usuario'],  datos[i]['Token_Num'],datos[i]['Fecha_Creacion'],datos[i]['Fecha_expiracion'],  acciones], "td");
       tablaToken.appendChild(fila);
   }

   return tablaToken;

}

export function crearTablaUsuario(datos){
    let tablaUsuario = document.createElement("table");
    tablaUsuario.classList.add("table");
    let cabeceraUsuario = crear_fila(["Id", "Nombre", "Apellidos","Correo","Direccion","Telefono","Contraseña","Token", "Acciones"], "th");
    tablaUsuario.appendChild(cabeceraUsuario);
    for (let i = 0; i < datos.length; i++) {
       /*Formulario*/

       let editar = "<button onclick='editar(" + datos[i]['Id'] + ",`Usuario`);' class='btn btn-primary'>Editar Usuario</button>";
       let eliminar = "<button onclick='eliminar(" + datos[i]['Id']+ ",`Usuario`);' class='btn btn-danger'>Eliminar Usuario</button>";
       let acciones = editar + eliminar;

       let fila = crear_fila([datos[i]['Id'], datos[i]['Nombre'],  datos[i]['Apellidos'],datos[i]['Correo'],datos[i]['Direccion'],datos[i]['Telefono'],datos[i]['Contraseña'],datos[i]['Token'],  acciones], "td");
       tablaUsuario.appendChild(fila);
   
    }
   return tablaUsuario;

}

export function eliminar(id,tabla){
    let tablacreada;
    switch (tabla) {
        case "Coleccion":
            tablacreada= eliminarColeccion(id);
            break;
        case "Marca":
            tablacreada= eliminarMarca(id);
            break;
        case "Productos":
            tablacreada= eliminarProductos(id);
            break;
        case "Tipo":
            tablacreada= eliminarTipo(id);
            break;    
        case "Pedido":
            tablacreada= eliminarPedidos(id);
            break;    
        case "Token":
            tablacreada= eliminarToken(id);
            break;    
        case "Usuario":
            tablacreada = eliminarUsuario(id);
            break;    
    
    }

}

export function editar(id,tabla){
    let tablacreada;
    switch (tabla) {
        case "Coleccion":
            tablacreada= editarColeccion(id);
            break;
        case "Marca":
            tablacreada= editarMarca(id);
            break;
        case "Productos":
            tablacreada= editarProducto(id)
            break;
        case "Tipo":
            tablacreada= editarTipo(id);
            break;    
        case "Pedido":
            tablacreada= editarPedidos(id);
            break;    
        case "Token":
            tablacreada= editarToken(id);
            break;    
        case "Usuario":
            tablacreada = editarUsuario(id);
            break;    
    }
    
}
