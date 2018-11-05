<?php 
//conexão
require_once("conexao/conexao.php"); 

session_start();

if(!isset($_SESSION['login'])){
    header("Location: index-unautenticated.php");
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <link rel="stylesheet" href="content/css/detalhes-servico.css">
        <link rel="stylesheet" href="content/css/layout.css">
        <title> Workinit | Detalhes do Serviço </title>
    </head>
    <body>
        <div class="topo">
            
        </div>
        <div class="container">
            <div class="row row-detalhes">
                <div class="col-md-8 col-sm-12">
                    <div class="row">
                        <img src="content/img/foto-icone.png" class="icone-foto" alt="foto serviço" />
                        <img src="content/img/foto-icone.png" class="icone-foto" alt="foto serviço" />
                        <img src="content/img/foto-icone.png" class="icone-foto" alt="foto serviço" />
                    </div>               
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                                <textarea class="form-control" id="descricao" placeholder="Descrição do serviço" rows="6" readonly></textarea>        
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 text-right">
                            <a href = "index.php"><input type="submit" class="btn btn-outline-primary" value="Voltar"/></a> <a href = "chat.php"><input type="submit" class="btn btn-outline-success" value="Chat"/></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <h1> Serviço XPTO </h1>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 d-flex aling-items-center">
                            <img src="content/img/usuario-foto.png" class="icone-usuario" alt="foto do usuário"/>
                        </div>
                        <div class="col-md-12 col-sm-12 text-center">
                            <div class="usuario-infos">
                                <h4>Nome do Usuário</h4>
                                <h5>Serviço disponibilizado</h5>
                                <span>São Paulo, SP</span> <br/>
                                <span><b>Contato: </b> (11) 99999-9999 / teste@email.com.br </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="content/js/adicionar-servico.js"></script>
    </body>
</html>

<?php
    mysqli_close($conecta);
?>