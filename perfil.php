<?php

    if(!isset($_GET['id']) || $_GET['id'] == ''){
        header("Location: index.php");
    }

    $usuarioId = $_GET['id']; 

    require_once("conexao/conexao.php"); 
      
    $usuario_query = "SELECT * FROM usuario WHERE id = $usuarioId";
    $operacao_usuario = mysqli_query($conecta, $usuario_query);
    
    if(!$operacao_usuario){
        die("Erro no banco: " . mysqli_error($operacao_usuario));
    } else {
        if (mysqli_num_rows($operacao_usuario) > 0){
            $usuario = mysqli_fetch_assoc($operacao_usuario);
        } else {
            header("Location: index.php");
        }
    }

    
    $consulta_servicos = "SELECT * FROM servicolistagem WHERE servicolistagem.usuarioID = $usuarioId";

    $servicos = mysqli_query($conecta, $consulta_servicos);
    
    if(!$servicos){
        die("Falha na consulta ao banco de dados");
    }

?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link rel="stylesheet" href="content/css/perfil.css">
        <link rel="stylesheet" href="content/css/layout.css">
        <title> Workinit | <?php echo $usuario["nome"] ?> </title>
    </head>
    <body>
        <div class="container">
            <div class="cartao">
                <div class="row">
                    <a href="/index.php" class="voltar"> ← Voltar </a>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <img src="lib/img/user.png" class="foto" alt="foto do usuario"/>
                    </div>
                    <div class="col-md-9" style="margin-bottom: 40px">
                        <h1> <?php echo $usuario["nome"] ?></h1>
                        <h2> <?php echo $usuario["profissao"] ?></h2>
                        
                        <h6> <b>E-mail: </b> <?php echo $usuario["email"] ?> </h6>
                        <h6> <b>Telefone: </b> <?php echo $usuario["telefone"] ?> </h6>
                        <h6> <b>Localização: </b> <span class="text-uppercase"> <?php echo $usuario["bairro"] . ' / ' . $usuario["uf"] ?> </span> </h6>
                    </div>

                    <h2> Serviços do Usuário </h2>

                    <div class="row row-servicos">
                    <?php
                    while($registro = mysqli_fetch_assoc($servicos)){
                    ?>  
                        <div class="col-3">
                            
                            <h5> <?php echo $registro["nomeservico"] ?> </h5>
                            <img src="<?php echo $registro["imagemservico"];?>" class="img-servico"/>
                            <a href="#"> Visualizar Serviço </a>
                        </div>
                        
                    <?php 
                    }
                    ?>
                        
                    </div>
                </div>
            </div>
        </div> 
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>

    <?php
        mysqli_close($conecta);
    ?>
</html>