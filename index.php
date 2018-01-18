<?php
require_once "header.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title"><i class="glyphicon glyphicon-home"></i> </h1>
            <h1 class="text-center login-title">Inicio de Sesion </h1>
            <div class="account-wall">                
                <form class="form-signin" action="auth.php" method="post">
                <input type="text" name="login" class="form-control" placeholder="Login" required autofocus>
                <input type="password" name="pass" class="form-control" placeholder="Password" required>
                <button class="btn btn-lg btn-primary btn-block" type="submit">
                    Ingresar
                </button>
                
                    <?php if ($_REQUEST && $_REQUEST["e"]){ ?>
                    <p class="text-center text-danger">
                        Acceso denegado!
                    </p>
                    <?php } ?>
                </form>
            </div>            
        </div>
    </div>
</div>
</body>
</html>
<?php
require_once "footer.php";
?>