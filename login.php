<?php 
//conexão variavel $coneta

    session_start();

    if(isset($_SESSION['login']) && $_SESSION['login'] === true){
        header("Location: index.php");
    }

    if(isset($_POST['submit'])) 
    {
        require_once("conexao/conexao.php"); 

        $emailErro = "";
        $senhaErro = "";

        if ($_POST['email'] == ""){
            $emailErro = "Digite o E-mail";
        } 

        if ($_POST["senha"] == "") {
            $senhaErro = "Digite a Senha";
        }

        if($emailErro === '' && $senhaErro === ''){

            $email = $_POST['email'];
            $senha = $_POST['senha'];
            $login = "SELECT * FROM usuario WHERE email = '$email' AND senha = '$senha' LIMIT 1";
            $operacao_login = mysqli_query($conecta,$login);
            if(!$operacao_login){
                die("Erro no banco: " . mysqli_error($operacao_login));
            } else {
                if (mysqli_num_rows($operacao_login) > 0){

                    while ($usuario = mysqli_fetch_assoc($operacao_login)) {
                        $_SESSION['login'] = true;
                        $_SESSION['id'] = $usuario['id'];
                        $_SESSION['nome'] = $usuario['nome'];
                        $_SESSION['email'] = $usuario['email'];
                        $_SESSION['nomedeusuario'] = $usuario['nomedeusuario'];
                        break;
                    }

                    header("Location: index.php");
                } else {
                    $loginInvalido = true;
                }
            }
         
        }



        //$username = '$_POST[nome]';
        //$password = '$_POST[senha]';
    
    
        // if ($_SESSION['login']==true || ($_POST['email']=="admin" && $_POST['senha']=="password")){
    
        //     echo "password accepted";
        //     $_SESSION['login']=true;
            
        // } else {
        //     echo "incorrect login";   
        // }
    }
    else               
    {
        // Display the Form and the Submit Button
    }
 




?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link rel="stylesheet" href="lib/css/login.css">
        <link rel="stylesheet" href="lib/css/layout.css">
        <title> Workinit | Login </title>
    </head>
    <body>
            <div class="row h-100">
                <div class="col-md-6 col-bg">
                    <h1> Login </h1>
                </div>
                <div class="col-md-6 col-sm-12 col-formulario">

                <img src="lib/img/logo.jpg" class="rounded mx-auto d-block" alt="Workinit">
        
                    <form id="loginForm" action="<?=$_SERVER['PHP_SELF'];?>"method="post">
                        <?php echo (isset($loginInvalido)) ?  "<span class=\"error-validation active\"> E-mail ou senha inválida. </span>" : ""; ?>      
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" id="email" placeholder="E-mail" value="<?php echo (isset($_POST['email']) ? $_POST['email'] : "") ?>">        
                            <?php echo (isset($emailErro)) ?  "<span class=\"error-validation active\">" . $emailErro ."</span>" : ""; ?>
                        </div>
                        <div class="form-group">
                            <input type="password" name="senha" class="form-control" id="senha" placeholder="Senha" value="<?php echo (isset($_POST['senha']) ? $_POST['senha'] : "") ?>"> 
                            <?php echo (isset($senhaErro)) ?  "<span class=\"error-validation active\">" . $senhaErro ."</span>" : ""; ?>      
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-12 text-right">
                                <input type="submit" name="submit" class="btn btn-outline-success" value="Logar">
                            </div>
                            <div class="col-12 col-sm-12 text-center">
                                <small id="emailHelp" class="form-text text-muted">Ainda não possui cadastro? <a href="cadastro.html"> Cadastre-se agora!</a></small>
                            </div>
                        </div>
                    </form>    
                </div>
            </div>
        

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script>

        </script>
    </body>

    <?php
    mysqli_close($conecta);
?>
</html>