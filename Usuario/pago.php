



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../bootstrap-5.3.3-dist/css/bootstrap.css" rel="stylesheet">
    <script href="../bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <script type="module" src="../JavaScript/usuario.js"></script>
    <script type="module" src="../JavaScript/pago.js"></script>

    <title>Document</title>
    <?php 
    
    require "../controlador/usuario_controller.php";
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
           ?>
</head>
<body>
<?php require "./cabecera.php"?> 
<div class="container">
    <h2>Formulario de Pago</h2>
    <form onsubmit="return formularioPagar()" method="POST">
    <div class="row">
        <div class="col-md-3">
            <label for="nombrePedido" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombrePedido">
        </div>
        <div class="col-md-3">
            <label for="apellidoPedido" class="form-label">Apellido</label>
            <input type="text" class="form-control" id="apellidoPedido">
        </div>
        <div class="col-md-3">
            <label for="correoPedido" class="form-label">Correo:</label>
            <input type="email" class="form-control" id="correoPedido">
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <label for="metodoPagoPedido" class="form-label">Método de Pago</label>
            <select id="metodoPagoPedido" class="form-select" aria-label="Default select">
                <option selected>Selecciona el método de pago que deseas</option>
                <option value="Tarjeta">Tarjeta de crédito/débito</option>
                <option value="Contra-reembolso">Contra reembolso</option>
                <option value="Tienda">Recogida en Tienda</option>
            </select>
        </div>       
        <div class="col-md-3">
            <label for="direccionPedido" class="form-label">Dirección</label>
            <input type="text" class="form-control" id="direccionPedido">
        </div>
        <p> </p>
    </div>
    <div class="row">
    <h5>Tarjeta de credito</h5>
        <p>Solo escriba aqui si va a pagar con tarjeta de credito.</p>
        <div class="col-md-3">
            <label for="tajetaNumPedido" class="form-label">Numero de Tarjeta</label>
            <input type="text" class="form-control" id="tajetaNumPedido" aria-label="xxxx-xxxx-xxxx-xxxx" placeholder="xxxx-xxxx-xxxx-xxxx">
        </div>       
        <div class="col-md-3">
            <label for="fechaCadPedido" class="form-label">Fecha Caducidad:</label>
            <input type="text" class="form-control" id="fechaCadPedido"aria-label="mm/aaaa"placeholder="mm/aaaa">
        </div>
        <div class="col-md-3">
            <label for="CVVPedido" class="form-label">CVV:</label>
            <input type="text" class="form-control" id="CVVPedido">
        </div>
    </div>
    <div class="row">
        <div class="col-3 mt-5">
            <button type="submit" class="btn btn-primary">Completar pedido</button>
        </div>
    
    </div>
    </form>
</div>
<?php require "./footer.php"?>
</body>
</html>