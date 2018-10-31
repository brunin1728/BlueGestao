<!doctype html>
<html class="no-js" lang="pt-br"> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Blue Gestão</title>
    <meta name="description" content="Espaço de gestão de projetos do Blue Inteligência.">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/scss/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



</head>
<body class="bg-dark">


    <div class="sufee-login d-flex align-content-center flex-wrap" style="margin-top: 130px">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.html">
                        <!--<img class="align-content" src="images/logo.png" alt="">-->
						<h1 style="color: #fff">Blue Gestão</h1>
                    </a>
                </div>
                <div class="login-form">
                    <form action="valida.php" method="POST">
                        <div class="form-group">
                            <label>E-mail</label>
                            <input type="email" class="form-control" name="USUARIO" placeholder="E-mail" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label>Senha</label>
                            <input type="password" class="form-control" name="SENHA" placeholder="Senha" autocomplete="new-password" required>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> Lembrar
                            </label>
                            <label class="pull-right">
                                <a href="#">Esqueceu a senha?</a>
                            </label>

                        </div>
                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Entrar</button>
                   
                        
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>


</body>
</html>
