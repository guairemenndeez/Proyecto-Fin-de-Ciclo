<header class="p-3 mb-3 border-bottom bg-white ">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="./Index.php" class="d-flex align-items-start mb-2 mb-lg-0 text-dark text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><img src="../fotos/Mendez_shop-Logo.png"width="77" height="68" class="rounded">  </svg>
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="./Index.php" class="nav-link px-2 link-success">Home</a></li>
                <li><a href="./contacto.php" class="nav-link px-2 link-dark">Contacto</a></li>
                <li><a href="./productos.php" class="nav-link px-2 link-dark">Productos</a></li>
                <li><a href="./carrito.php" class="nav-link px-2 link-dark">Carrito</a></li>
            </ul>

            

            <!--  -->

            <?php 
           
           
                if(!isset($_SESSION['usuario'])){
                echo"<div class='text-end'>
                <a  role='button' class='btn btn-outline-primary me-2'  href='./login.php'>Login</a>
                <a  role='button' class='btn btn-warning'href='./crearUsuario.php'>Sign-up</a>
            </div>";
            }else{
                echo"<div class='dropdown text-end'>
                <a href='#' class='d-block link-dark text-decoration-none dropdown-toggle' id='dropdownUser1' data-bs-toggle='dropdown' aria-expanded='false'>
                    <img src='../fotos/perfil.png' alt='mdo' width='32' height='32' class='rounded-circle'>
                </a>
                <ul class='dropdown-menu text-small' aria-labelledby='dropdownUser1'>
                    <li><a class='dropdown-item' href='./carrito.php'>Carrito</a></li>
                    <li><a class='dropdown-item' href='./perfil.php'>Perfil</a></li>
                    <li><hr class='dropdown-divider'></li>";
                    $permiso= New Usuario_controller;
                    // $permiso->permiso();
                    
                    if($permiso->permiso()==True){
                        echo " <li><a class='dropdown-item' onclick='admin()'>Admin</a></li>";
                    }
                echo "<li><a class='dropdown-item' onclick='cerrarSesion()'>Sign out</a></li>
                        </ul></div>";
            }
            



            ?>

            
        </div>
    </div>
</header>