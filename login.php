<?php
// MUY IMPORTANTE: Inicia la sesión al comienzo del archivo
session_start();
include('includes/header.php');
?>
<style>

    body {
        background-color: #4400ffff !important; /
    }
    .card {

        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.99) !important;

    }
</style>
<div class="container">

        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg" style="margin-top: 25vh; margin-bottom: 5vh;">
                    <div class="card-body p-0">
                        <div class="row">

                            <div class="col-lg-6 d-none d-lg-block imagen-login-ajuste">
                                <img src="img/bicentenario.png" alt="Imagen del Sistema" class="img-fluid my-5 p-3">
                            </div>

                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">¡Bienvenido de nuevo!</h1>
                                    </div>

                                    <?php

                                    if (isset($_SESSION['status']) && $_SESSION['status'] != '') {

                                        echo '<div class="alert alert-danger" role="alert">
                                                  ' . $_SESSION['status'] . '
                                              </div>';
                                        unset($_SESSION['status']);
                                    }
                                    ?>
                                    <form class="user" action="code.php" method="POST">
                                        <div class="form-group">
                                            <input type="username" name="username" class="form-control form-control-user"
                                                placeholder="Ingrese el usuario..." required
                                                style="height: 3.7rem;">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user" placeholder="Contraseña" required
                                                style="height: 3.7rem;">
                                        </div>

                                        <button type="submit" name="login_btn" class="btn btn-success btn-user btn-block btn-iniciar-personalizado"
                                            style="padding: 0.75rem 1rem; font-size: 1.7rem;">
                                            Iniciar
                                        </button>
                                        <hr>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


<?php
include('includes/script.php');

?>