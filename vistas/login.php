<?php
class VistaLogin
{
    public function estilos()
    {
        return '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css">
        <style>
            html,
            body {
                height: 100%;
            }

            .global-container {
                height: 100%;
                display: flex;
                align-items: center;
                justify-content: center;
                background-color: #f5f5f5;
            }

            form {
                padding-top: 10px;
                font-size: 14px;
                margin-top: 30px;
            }

            .card-title {
                font-weight: 300;
            }

            .btn {
                font-size: 14px;
                margin-top: 20px;
            }


            .login-form {
                width: 330px;
                margin: 20px;
            }

            .sign-up {
                text-align: center;
                padding: 20px 0 0;
            }

            .alert {
                margin-bottom: -30px;
                font-size: 13px;
                margin-top: 20px;
            }
        </style>';
    }

    public function formularioLogin()
    {
?>
        <div class="global-container">
            <div class="card login-form">
                <div class="card-body">
                    <h3 class="card-title text-center">Iniciar Sesión</h3>
                    <?php
                    global $mensaje;
                    if (isset($mensaje)) {
                    ?>
                        <p style="text-align: center;color:red;"><?= $mensaje ?></p>
                    <?php
                    } ?>
                    <div class="card-text">
                        <!--
			<div class="alert alert-danger alert-dismissible fade show" role="alert">Incorrect username or password.</div> -->
                        <form action="" method="POST">
                            <!-- to error: add class "has-danger" -->
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" name="mail" class="form-control form-control-sm" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <a href="#" style="float:right;font-size:12px;">Forgot password?</a>
                                <input type="password" name="password" class="form-control form-control-sm" id="exampleInputPassword1">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block" name="iniciar">Iniciar</button>

                            <div class="sign-up">
                                Don't have an account? <a href="registro.php">Create One</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }

    public function formularioRegistro()
    {
    ?>
        <div class="global-container">
            <div class="card login-form">
                <div class="card-body">
                    <h3 class="card-title text-center">Registro</h3>
                    <?php
                    global $mensaje;
                    if (isset($mensaje)) {
                    ?>
                        <p style="text-align: center;color:red;"><?= $mensaje ?></p>
                    <?php
                    } ?>
                    <div class="card-text">
                        <!--
			<div class="alert alert-danger alert-dismissible fade show" role="alert">Incorrect username or password.</div> -->
                        <form action="" method="POST">
                            <!-- to error: add class "has-danger" -->
                            <div class="form-group">
                                <label for="exampleInputNombre">Nombre</label>
                                <input type="text" name="nombre" class="form-control form-control-sm" id="exampleInputNombre" aria-describedby="emailHelp">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" name="mail" class="form-control form-control-sm" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" name="password" class="form-control form-control-sm" id="exampleInputPassword1">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block" name="registro">Registrar</button>

                            <div class="sign-up">
                                ¿Ya tienes una cuenta? <a href="login.php">Inicia Sesión</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
}
?>