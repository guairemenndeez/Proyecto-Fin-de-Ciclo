export function validacion(elementos, valores) {
    let regexCor = /^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/;
    let regexContra = /^(?=.*\d)(?=.*[\u0021-\u002b\u003c-\u0040])(?=.*[A-Z])(?=.*[a-z])\S{8,16}$/;
    let regexTarjeta = /^(?:4\d([\- ])?\d{6}\1\d{5}|(?:4\d{3}|5[1-5]\d{2}|6011)([\- ])?\d{4}\2\d{4}\2\d{4})$/;




    for (let i = 0; i < elementos.length; i++) {

        switch (elementos[i]) {
            case "email":
                if (!regexCor.test(valores[i])) {
                    alert("error en el correo electronico")
                    return false;
                }
                break;
            case "telefono":
                if (!(/^\d{9}$/.test(valores[i]))) {
                    alert("Error en el telefono")
                    return false;
                }
                break;
            case "contraseña":
                if (!regexContra.test(valores[i]) || valores[5] != valores[6]) {
                    alert("Error en la contraseña");
                    return false;
                }
                break;
            case "contraseña":
                if (!regexTarjeta.test(valores[i])) {
                    alert("Error en la tarjeta de credito");
                    return false;
                }
                break;
            default:
                if (valores[i] == null || valores[i].length <= 0 || /^\s+$/.test(valores[i])) {
                    alert("Error en " + elementos[i]);
                    return false;
                }
                break;
        }
    };





}