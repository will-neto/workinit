<?php 
//conexão
require_once("conexao/conexao.php");

session_start();

if(!isset($_SESSION['login'])){
    header("Location: login.php");
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
        <link rel="stylesheet" href="content/css/chat.css">
        <link rel="stylesheet" href="content/css/layout.css">
        <title> Workinit | Chat </title>
    </head>
    <body>
        <div class="row h-100 corpo">
            <div class="col-md-3 col-sm-12 d-flex align-items-center">
                <div class="usuario-infos">
                    <h4>Nome do Usuário</h4>
                    <h5>Serviço disponibilizado</h5>
                    <span>São Paulo, SP</span> <br/>
                    <span><b>Contato: </b> (11) 99999-9999 / teste@email.com.br </span>
                    <img src="content/img/usuario-foto.png" class="icone-foto" id="icone-foto" alt="Foto do Usuário" />
                </div>
            </div>
            <div class="col-md-9 col-sm-12 d-flex align-items-center">
                <div class="chat">
                    <div class="row d-flex align-items-end">
                        <div class="col-md-6"><i class="far fa-comments"></i> <span> Minhas Mensagens </span></div>
                        <div class="col-md-6 text-right"> <a href="#">Bloquear</a> | <a href="#">Excluir Mensagens</a></div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 painel">
                            <div class="foto-painel d-flex align-items-end">
                                <img src="content/img/usuario-foto.png"/> <span>Usuário</span>
                            </div>
                            <div class="mensagem-contato">
                                Olá, estou interessado no serviços X ....
                            </div>
                            <div class="mensagem">
                                Oi, tudo bem. Então, a vaga X ....
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10 col-sm-10">
                            <input type="text" class="form-control" placeholder="Digite sua mensagem..."/>
                        </div>
                        <div class="col-md-2 col-sm-2">
                            <input type="button" value="Enviar" class="btn btn-success"/>
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