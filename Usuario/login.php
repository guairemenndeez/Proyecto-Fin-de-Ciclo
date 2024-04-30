<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
        <link href="../bootstrap-5.3.3-dist/css/bootstrap.css" rel="stylesheet">
        <script   type="module" src="../JavaScript/usuario.js"></script>
</head>
<body class="bg-success p-2 text-dark bg-opacity-75">
    <div class="container ">
        <div class="row justify-content-center mt-8 p-2">
            <div class="col"></div>
            <div class="col-auto justify-content-center p-4 ">
                <div class="bg-white">
                    <div class="row-3">
                    <img src="../fotos/Mendez_shop-Logo.png" class="img-fluid rounded mx-auto d-block" width="200vh">
                    </div>
                    <div class="row">
                        <div class="col"></div>
                        <div class="col">
                            <h2 class="mx-5 ">Login</h2>
                        </div>
                        <div class="col"></div>
                    </div>
                    </br>
                <form class="row m-3 pb-5" onsubmit="return login()" method="POST">
                    <div class="row-2">
                        <label for="correo" class="visually">Correo</label>
                        <input type="email" class="form-control" id="correo" placeholder="nombre@email.com" >
                    </div>
                    <div class="row-2">
                        <label for="contraseña" class="visually">Password</label>
                        <input type="password" class="form-control" id="contraseña" placeholder="Password">
                    </div>
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <br/>
                        <button type="submit" class="btn btn-primary mb-3">Entrar</button>
                    </div>
                </form>
                </div>
                
            </div>
            <div class="col"></div>
        </div>
    </div>
</body>
</html>