export function validacion(elementos,valores){
let regexCor = /^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/;




    for(let i=0; i<elementos.length;i++) {

        switch (elementos[i]) {
            case "email":
                if(!regexCor.test(valores[i])){
                    alert("error en el correo electronico")
                    return false;
                }
                break;
            case "telefono":
                if(!(/^\d{9}$/.test(valores[i]))){
                    alert("Error en el telefono") 
                    return false;
                }
                break;
            case "contraseña":
                if(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])\w{8,}$/.test(valores[i]) & valores['contraseña'] != valores['repcontraseña'] ){
                    alert("Error en la contraseña")
                    return false;
                }
                break;
            default:
                if(valores[i] == null || valores[i].length <= 0 || /^\s+$/.test(valores[i])){ 
                    alert("Error en "+elementos[i]);
                    return false;
                }
                break;
        }
    };
    




}