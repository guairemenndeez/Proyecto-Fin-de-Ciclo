<?php
    session_start();
    if($_SESSION['permiso']==0){
        header("Location:./Usuario");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./bootstrap-5.3.3-dist/css/bootstrap.css" rel="stylesheet">
    <title>Panel de administrador</title>
    
</head>


<body class="bg-success p-2 text-dark bg-opacity-75">
    <div class="container ">
        <div class="row justify-content-center mt-8 p-2">
            <div class="col"></div>
            <div class="col-auto justify-content-center p-4 ">
                <div class="bg-white p-5">
                    <div class="row-3">
                    <img src="./fotos/Mendez_shop-Logo.png" class="img-fluid rounded mx-auto d-block" width="200vh">
                    </div>
                    <div class="row">
                        
                    <div class="col">
                            <div class="row-2 d-grid gap-4 d-md-flex justify-content-center">
                                <h2 class="mx-5 ">Administrador</h2>
                                <br/>
                            </div>
                            <div class="row">
                                <p class="mx-5 ">¿En que pagina quieres meterte?</p>
                            </div>
                        </div>
                    </div>
                    </br>
                    <div class="row-2 d-grid gap-4 d-md-flex justify-content-center">
                    <button type="button" class="btn btn-outline-dark" id="botonAdmin">Administrador</button>
                    <button type="button" class="btn btn-outline-info" id="botonUsuario" >Usuario</button>
                    </div>
                    
                </div>
                
            </div>
            <div class="col"></div>
        </div>
    </div>
</body>
<script>
        document.getElementById("botonAdmin").addEventListener("click",admin);
        document.getElementById("botonUsuario").addEventListener("click",usuario);

        function admin(){window.location="./Admin/Index.php"}
        function usuario(){window.location="./Usuario/Index.php"}


    </script>
</html>