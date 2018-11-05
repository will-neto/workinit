<?php

    session_start();

    $usuarioId = $_SESSION['id']; 

    require_once("conexao/conexao.php"); 
    
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
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <link rel="stylesheet" href="content/css/editar-perfil.css">
        <link rel="stylesheet" href="content/css/layout.css">
        <title> Workinit | Editar Perfil </title>
    </head>
    <body>
    <div class="topo">
        <a href="/">        <img src="lib/img/logo-png.png" class="logo">  </a>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-6">        
                <form  id="servicoForm" action="<?=$_SERVER['PHP_SELF'];?>" method="post"> 
                        <div class="row" style="margin-top: 20px;">
                            <div class="col-md-12 col-sm-12">
                                <h1>Editar Perfil </h1>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome">        
                                </div>
                            </div>
                        </div>    
                        
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="telefone" id="telefone" placeholder="Telefone">        
                                </div>
                            </div>
                        </div>    
                        
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="email" id="email" placeholder="E-mail">        
                                </div>
                            </div>
                        </div>    
                        
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="profissao" id="profissão" placeholder="Profissão">        
                                </div>
                            </div>
                        </div>    
                        
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="cep" id="cep" placeholder="CEP">        
                                </div>
                            </div>
                        </div>    
                        
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="logradouro" id="logradouro" placeholder="Logradouro">        
                                </div>
                            </div>
                        </div>                

                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="numero" id="numero" placeholder="Número">        
                                </div>
                            </div>
                        </div>                

                    <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="complemento" id="complemento" placeholder="Complemento">        
                                </div>
                            </div>    
                    </div>                
                    
                    <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="bairro" id="bairro" placeholder="Bairro">        
                                </div>
                            </div>
                    </div>                
                    
                    <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="cidade" id="cidade" placeholder="Cidade">        
                                </div>
                            </div>
                    </div>                
                                
                    <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="uf" id="uf" placeholder="UF">        
                                </div>
                            </div>
                    </div>                
                    
                    <div class"row">
                            <div class="col-md-12 col-sm-12">
                                <a href="/" class="btn btn-outline-primary"> Voltar </a> 
                                <input type="submit" class="btn btn-outline-success" value="Salvar"/>
                            </div>
                    </div>
                </form>
            </div>   
            <div class="col-md-6"  style="padding-top: 80px; font-size: 18px;">
                <a href="/alterar-senha.php"> Alterar Senha </a>
            </div>                 
        </div>
    </div>
        
    <h2 class="servicos"> Serviços do Usuário </h2>

    <div class="row row-servicos">
        <div class="col-3" style="padding-top: 100px">            
            <a href="/adicionar-servico.php"> Adicionar Serviço </a>
        </div>
        
            <?php
            while($registro = mysqli_fetch_assoc($servicos)){
            ?>  
                <div class="col-3">
                    
                    <h5> <?php echo $registro["nomeservico"] ?> </h5>
                    <img src="<?php echo $registro["imagemservico"];?>" class="img-servico"/>
                    <a href="/editar-servico.php?id=<?php echo $registro["servicoID"];?>"> Editar Serviço </a>
                </div>
                
            <?php 
            }
            ?>
    </div>


        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="content/js/adicionar-servico.js"></script>
    </body>
</html>