<?php


    session_start();

    if(!isset($_SESSION['login'])){
        header("Location: index-unautenticated.php");
    }

    if(isset($_POST['senha'])) 
    {
        require_once("conexao/conexao.php"); 

        $sucesso = false;
        $senhaErro = "";
        $confirmarErro = "";

        if ($_POST['senha'] == ""){
            $senhaErro = "Digite a Senha";
        } 

        if ($_POST["confirmarsenha"] == "") {
            $confirmarErro = "Confirme a Senha";
        }

        if ($_POST["confirmarsenha"] != $_POST['senha']){
            $confirmarErro = "Confirme a Senha corretamente";
        }

        if($senhaErro === '' && $confirmarErro === ''){     

            

            $senha = $_POST['senha'];
            $usuarioId = $_SESSION['id'];
            
            $alterarSenha = "UPDATE usuario SET senha = '$senha' WHERE id = '$usuarioId'";
            $operacao_alterarSenha = mysqli_query($conecta,$alterarSenha);
                    
            if(!$operacao_alterarSenha){
                die("Erro no banco: " . mysqli_error($operacao_inserir));
            } else {
                $sucesso = true;
            }
        }

    }

?>


<!DOCTYPE html>
<body>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link rel="stylesheet" href="content/css/alterar-senha.css">
        <link rel="stylesheet" href="content/css/layout.css">
        <title>Workinit | Alterar Senha</title>
    </head>
    <body>
        <img src="lib/img/logo-png.png" class="logo">

        <div class="container">
            <div class="cartao">
                <div class="row">
                    <div class="col-md-6">
                        <h1> Alteração de Senha </h1>
                        <h2> Após a alteração da senha, você poderá utilizá-la no próximo login </h2>
                    </div>
                </div>

                <form action="alterar-senha.php" method="post"> 
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" value="<?php echo (isset($_POST['senha']) ? $_POST['senha'] : "") ?>">        
                                <?php echo (isset($senhaErro)) ?  "<span class=\"error-validation active\">" . $senhaErro ."</span>" : ""; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="password" class="form-control" id="confirmarsenha" name="confirmarsenha" placeholder="Confirme sua Senha" value="<?php echo (isset($_POST['confirmarsenha']) ? $_POST['confirmarsenha'] : "") ?>">        
                                <?php echo (isset($confirmarErro)) ?  "<span class=\"error-validation active\">" . $confirmarErro ."</span>" : ""; ?>
                            </div>
                        </div>
                    </div>
                    <?php echo (isset($sucesso) && $sucesso) ? "<div class=\"row\"> <div class=\"col-md-6\"> <div class=\"senha-alterada\"> Senha alterada com sucesso! </div> </div></div> " : ""; ?>
                    <div class="row">
                        <div class="col-md-6 text-right">
                            <a href="/editar-perfil.php" class="btn btn-outline-primary"> Voltar </a>
                            <input type="submit" class="btn btn-outline-success" value="Alterar"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
</body>