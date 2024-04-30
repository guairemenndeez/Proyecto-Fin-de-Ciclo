<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Usuario</title>
    <link href="../bootstrap-5.3.3-dist/css/bootstrap.css" rel="stylesheet">
        <script  type="module" src="../JavaScript/usuario.js"></script>
</head>
<body class="bg-success p-2 text-dark bg-opacity-75">
<div class="container ">
        <div class="row justify-content-center mt-8 p-2">
            <div class="col"></div>
            <div class="col-auto justify-content-center p-4  ">
                <div class="bg-white p-3">
                    <div class="row-3 d-flex flex-wrap align-items-center justify-content-between justify-content-lg-start">
                    <img src="../fotos/Mendez_shop-Logo.png" class="img-fluid rounded ms-5  me-5 d-block" width="150vh">
                    <h2 class="ms-3 me-5">Crear Usuario</h2>
                    </div>
                
                    <div class="row align-items-center "><form onsubmit="return addUsuario()" method="POST">
                        <div class="row align-items-center ms-5">
                            <div class="col-auto"><label for="nombre" class="col-form-label fs-4">Nombre:</label></div>
                            <div class="col-auto"><input type="text" class="form-control" id="nombre" name="nombre" required></div>
                        </div>
                        <div class="row align-items-center ms-5">
                            <div class="col-auto"><label for="apellidos" class="col-form-label fs-4">Apellidos:</label></div>
                            <div class="col-auto"><input type="text" class="form-control" id="apellidos" name="apellidos" required></div>
                        </div>
                        <div class="row align-items-center ms-5">
                            <div class="col-auto"><label for="email" class="col-form-label fs-4">Correo electronico:</label></div>
                            <div class="col-auto"><input type="email" class="form-control" id="email" name="email" required></div>
                        </div>
                        <div class="row align-items-center ms-5">
                            <div class="col-auto"><label for="direccion" class="col-form-label fs-4">Direccion:</label></div>
                            <div class="col-auto"><input type="text" class="form-control" id="direccion" name="direccion"></div>
                        </div>
                        <div class="row align-items-center ms-5">
                            <div class="col-auto"><label for="telefono" class="col-form-label fs-4">Telefono:</label></div>
                            <div class="col-auto"><input type="tel" class="form-control" id="telefono" name="telefono" required></div>
                        </div>
                        <div class="row align-items-center ms-5">
                            <div class="col-auto"><label for="contraseña" class="col-form-label fs-4">Contraseña:</label></div>
                            <div class="col-auto"><input type="password" class="form-control" id="contraseña" name="contraseña"placeholder="Usa numeros, mayusculas y al menos 8 caracteres" required></div>
                        </div>
                        <div class="row align-items-center ms-5">
                            <div class="col-auto"><label for="repcontraseña" class="col-form-label fs-4">Repetir Contraseña:</label></div>
                            <div class="col-auto"><input type="password" class="form-control" id="repcontraseña" name="repcontraseña" required></div>
                        </div></br>
                        <div class=" row justify-content-center">
                            <div class="col"></div>
                            <div class="col"><button type="submit" class="btn btn-primary mb-3">Crear Usuario</button></div>
                            <div class="col"></div>
                        </div>
                        </form>
                    </div>
                    

                </div>
                
            </div>
            <div class="col"></div>
        </div>
        



    </div>
</body>
</html>