<?php 
//conexão
require_once("conexao/conexao.php"); ?>

<?php
//consulta servicos
    $consulta_servicos = "SELECT nomeservico,detalheservico,nome, cidade, imagemservico FROM servicolistagem,usuario WHERE servicolistagem.usuarioID = usuario.id";
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
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link rel="stylesheet" href="lib/css/index.css">
        <link rel="stylesheet" href="lib/css/index_design.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <title> Workinit | Bem vindo </title>
        
        <style>
            h1{
                font-family: roboto;
                color:#09a00c;
            }
        </style>
    </head>
<body>
    <main>
        <header>       
            <input type=search name="pesquisa" id="pesquisador" placeholder="pesquise aqui"/>
            <img src="lib/img/logo-png.png" class="logo">
        </header>
        
        <section class="conteudo">
        <?php
        while($registro = mysqli_fetch_assoc($servicos)){
        ?>  
            <table class="usuario-caixa">
                <tr>
                <td class="foto">
                    <img src="<?php echo $registro["imagemservico"];?>" class="usuario2" alt="perfil"/>
                </td>
                <td>
                    <table style="border:solid 0px;">
                        <tr><td><?php echo utf8_encode($registro["nome"]);?></td></tr>
                        <tr><td><?php echo utf8_encode($registro["nomeservico"]);?></td></tr>
                        <tr><td><?php echo utf8_encode($registro["cidade"]);?></td></tr>
                    </table>
        
                </td></tr>
        </table>
        <?php   
        }
        ?>
        </section>
        
        
        
        <section class="menu">
            <div style="position: relative;top:100px;">
                <h1>Login</h1>
                <form>
                        <div class="form-group">
                            <input type="email" class="form-control" id="nome" placeholder="E-mail">        
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="cpf" placeholder="Senha">        
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-12 text-right">
                                <input type="submit" class="btn btn-outline-success" value="Login">
                            </div>
                            <div class="col-12 col-sm-12 text-center">
                                    <small id="emailHelp" class="form-text text-muted">Ainda não possui cadastro? <a href="cadastro.php"> Cadastre-se agora!</a></small>
                            </div>
                        </div>
            </form>
            </div>
        </section>
    </main>
    
        <?php
            mysqli_free_result($servicos);
        ?>
</body>
</html>

<?php
    mysqli_close($conecta);
?>