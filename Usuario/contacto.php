<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../bootstrap-5.3.3-dist/css/bootstrap.css" rel="stylesheet">
    <script href="../bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- Iconos googleapis -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />


    <link href="./style.css" rel="stylesheet">

    <?php

    require "../controlador/usuario_controller.php";
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    ?>
    <title>Document</title>
</head>

<body>
    <?php require "./cabecera.php" ?>
    <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center img-fluid" id="bannerContacto">
        <div class="col-md-6 p-lg-5 mx-auto my-1">
            <h1 class="display-3 fw-bold"> Contacto</h1>


        </div>

    </div>
    <div class="container">
        <div class="text text-center">
            <p style="font-size:medium;">Si tienes algun problema o si quieres un perdido personalizado, hablanos al correo o llamanos </p>
            <br />
        </div>
    </div>
    <div class="container ">
        <div class="row">
            <div class="col-5 align-items-center justify-content-center text-center">

                <h4>Telefono y correo</h4>
                <div class="border  my-3 p-2">
                    <p><span class="material-symbols-outlined">call</span> :692384057 / 928362468</p>
                    <p><span class="material-symbols-outlined">mail</span> :info@mendezShop.com</p>
                    <p>WhatsApp: 658260584</p>
                </div>

            </div>
            <div class="col-2"></div>

            <div class="col-5 align-items-center justify-content-center text-center">
                <h4>Horario y ubicacion</h4>
                <div class="border  my-3 p-2">
                    <p><span class="material-symbols-outlined">calendar_clock</span> : Lunes a viernes: 09:30 - 13:30/14:30-20:00 <br/>Sabado: 9:30 - 13-30</p>
                    <p><span class="material-symbols-outlined">pin_drop</span> Calle Guillermo del Toro n8</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container bg-success">
        <br />



    </div>
    </div>

    <?php require "./footer.php" ?>
</body>

</html>