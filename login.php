<?php
session_start();
include('includes/header.php');
?>
<style>
    
    body {
        background-color: #E0F2F1 !important;
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
        margin: 0;
    }

    .main-login-wrapper {
        display: flex;
        flex-direction: column;
        align-items: center;
        max-width: 800px; /* MODIFICADO: Aumenta el ancho máximo del contenedor principal */
        width: 90%;
    }

    /* Estilo del Cuadro Blanco (Ajuste de Bordes y Sombra) */
    .card {
        background-color: #FFFFFF !important;
        border-radius: 40px !important; /* Bordes muy redondeados */
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.77) !important; /* Sombra suave y difusa */
        border: none !important; 
        margin-top: 20px !important; 
        margin-left: -81px;
        width: 150%;
        max-width: 900px; 
    }

    .form-control-user {
        height: 50px !important;
        border: 1px solid #CFD8DC !important; 
        border-radius: 8px !important; 
        padding: 10px 15px !important;
        font-size: 16px !important;
        transition: border-color 0.3s;
    }

    .form-control-user:focus {
        border-color: #26A69A !important; 
        box-shadow: none !important;
    }

    .btn-success,
    .btn-iniciar-personalizado {
        background-color: #036b08ff !important; 
        border-color: #ffffffff !important;
        color: white !important;
        padding: 12px 20px !important;
        font-size: 18px !important;
        border-radius: 25px !important; 
        transition: background-color 0.3s ease;
    }

    .btn-success:hover,
    .btn-iniciar-personalizado:hover {
        background-color: #0d9903ff !important; 
        border-color: #00897B !important;
    }

    .h4.text-gray-900.mb-4 {
        color: #37474F !important; 
        font-size: 28px !important;
        font-weight: 600 !important;
        margin-top: 15px !important; 
    }
    
    .p-5 {
        padding: 3rem !important; 
    }

    .logo-fuera {
        display: block;
        width: 500px; /* MODIFICADO: Un poco más ancho para coincidir con la tarjeta */
        max-width: 90%;
        margin-bottom: 20px; 
        margin-left: -35px;
    }

</style>

<div class="main-login-wrapper">

    <img src="img/bicentenario.png" alt="Red de Abastos Bicentenario S.A." class="logo-fuera">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-12"> 

                <div class="card o-hidden border-0 shadow-lg"> 
                    <div class="card-body p-0">
                        <div class="row">
                            
                            <div class="col-lg-12"> 
                                <div class="p-5">
                                    <div class="text-center">
                                        
                                        <h1 class="h4 text-gray-900 mb-4">¡Bienvenido de nuevo!</h1>
                                    </div>

                                    <?php
                                    if(isset($_SESSION['status']) && $_SESSION['status'] !='') 
                                    {
                                        echo '<div class="alert alert-danger text-center"> '.$_SESSION['status'].' </div>';
                                        unset($_SESSION['status']);
                                    }
                                    ?>
                                    <form class="user" action="code.php" method="POST">
                                        <div class="form-group">
                                            <input type="username" name="username" class="form-control form-control-user"
                                                placeholder="Ingrese el usuario..." required> 
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user" placeholder="Contraseña" required> 
                                        </div>

                                        <button type="submit" name="login_btn" class="btn btn-success btn-user btn-block btn-iniciar-personalizado"> 
                                            Iniciar
                                        </button>
                                        <hr>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include('includes/script.php');

?>