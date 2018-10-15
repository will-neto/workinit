<?php 
//conexão variavel $coneta
require_once("conexao/conexao.php"); ?>

        <?php
            if(isset($_POST["nome"])){
                $nome           =$_POST["nome"];
                $nomeusuario    =$_POST["nomeusuario"];
                $cpf            =$_POST["cpf"];
                $telefone       =$_POST["telefone"];
                $profissao      =$_POST["profissao"];
                $email          =$_POST["email"];
                $senha          =$_POST["senha"];
                $confirmarsenha =$_POST["confirmasenha"];
                if($senha==$confirmarsenha){
                $inserir = "INSERT INTO usuario(nome,nomedeusuario,cpf,telefone,profissao,email,senha) VALUES ('$nome', '$nomeusuario', '$cpf', '$telefone', '$profissao', '$email', '$senha')";
                $operacao_inserir = mysqli_query($conecta,$inserir);
                }
                
                
                if(!$operacao_inserir){
                    die("Erro no banco: " . mysqli_error($operacao_inserir));
                } else {
                    header("Location: login.php");
                }
            }       
        ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link rel="stylesheet" href="lib/css/index.css">
        <link rel="stylesheet" href="lib/css/layout.css">
        <title> Workinit | Cadastro </title>
    </head>
    <body>
        
        
            <div class="row h-100">
                <div class="col-md-6 col-sm-12 col-formulario">

                <img src="lib/img/logo.jpg" class="rounded mx-auto d-block" alt="Workinit">
        
                    <form action = "cadastro.php" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">        
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="nome" name="nomeusuario" placeholder="Nome de Usuário">        
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="cpf" name="cpf" placeholder="CPF">        
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="telefone" name = "telefone" placeholder="Telefone">        
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="profissao" name = "profissao" placeholder="Profissão">        
                        </div> 
                        <div class="form-group">
                            <input type="email" class="form-control" id="email" name = "email" placeholder="E-mail">        
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="senha" name ="senha" placeholder="Senha">        
                        </div>             
                        <div class="form-group">
                            <input type="password" class="form-control" id="confirmarSenha" name = "confirmasenha" placeholder="Confirme sua senha">        
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-12 text-right">
                                <input type="submit" class="btn btn-outline-success" value="Cadastrar">
                            </div>
                            <div class="col-12 col-sm-12 text-center">
                                <small id="emailHelp" class="form-text text-muted">Já possui cadastro? <a href="login.html"> Faça o login agora!</a></small>
                            </div>
                        </div>
                    </form>    
                </div>
                <div class="col-md-6 col-bg">
                    <h1> Cadastro </h1>
                </div>
            </div>
        

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>

<?php
    mysqli_close($conecta);
?>