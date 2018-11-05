<?php 
    //conexão
    session_start();

    if(!isset($_SESSION['login'])){
        header("Location: login.php");
    }

    $usuarioId = $_SESSION['id'];
    
    require_once("conexao/conexao.php"); 

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $servicoId = $_POST['id']; 

        $servico_query = "SELECT * FROM servicolistagem WHERE servicoID = $servicoId AND usuarioID = $usuarioId";
        $operacao_servico = mysqli_query($conecta, $servico_query);    

        if(!$operacao_servico){
            header("Location: index.php");
            //die("Erro no banco: " . mysqli_error($operacao_servico));
        } else {
            if (mysqli_num_rows($operacao_servico) > 0){
                $usuario = mysqli_fetch_assoc($operacao_servico);
            } else {
                header("Location: index.php");
            }
        }
    
        $nomeErro = "";
        $descricaoErro = "";

        if ($_POST['nome'] == ""){
            $nomeErro = "Digite o nome do Serviço";
            $usuario["nomeservico"] = "";
        } 

        if ($_POST["descricao"] == "") {
            $descricaoErro = "Digite a descrição do Serviço";
            $usuario["detalheservico"] = "";
        }

        $nome = $_POST["nome"];
        $descricao = $_POST["descricao"];
        
        $atualizar = "UPDATE servicolistagem SET nomeservico = '$nome', detalheservico = '$descricao' WHERE servicoID = $servicoId AND usuarioID = $usuarioId";
        $operacao_atualizar = mysqli_query($conecta,$atualizar);
                
        if(!$operacao_atualizar){
            die("Erro no banco: " . mysqli_error($operacao_atualizar));
        }

        header("Location: editar-perfil.php");

    } else if ($_SERVER['REQUEST_METHOD'] === 'GET') {

        if(!isset($_GET['id']) || $_GET['id'] == ''){
            header("Location: login.php");
        }

        $servicoId = $_GET['id']; 
        $servico_query = "SELECT * FROM servicolistagem WHERE servicoID = $servicoId AND usuarioID = $usuarioId";
        $operacao_servico = mysqli_query($conecta, $servico_query);    

        if(!$operacao_servico){
            die("Erro no banco: " . mysqli_error($operacao_servico));
        } else {
            if (mysqli_num_rows($operacao_servico) > 0){
                $usuario = mysqli_fetch_assoc($operacao_servico);
            } else {
                header("Location: index.php");
            }
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
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <link rel="stylesheet" href="content/css/editar-servico.css">
        <link rel="stylesheet" href="content/css/layout.css">
        <title> Workinit | Editar Serviço </title>
    </head>
    <body>
        <div class="topo">
            
        </div>

        <div class="container">

            <form  id="servicoForm" action="<?=$_SERVER['PHP_SELF'];?>" method="post"> 
            <input type="hidden" name="id" id="id" value="<?php echo $usuario["servicoID"]; ?>"/>
            <div class="row" style="margin-top: 20px;">
                <div class="col-md-6 col-sm-12">
                    <h1>Editar Serviço </h1>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8 col-sm-12 d-flex align-items-end" style="margin-bottom: 30px;">
                    <div id="imagens">
                        <img src="content/img/foto-icone.png" class="icone-foto" alt="ícone enviar foto" />
                    </div>
                    <input type="file" name="file" id="file" multiple class="file-personalizado" />
                    <label for="file"><i class="fas fa-pencil-alt"></i> Adicionar Imagem </label>
                </div>
                <div class="col-md-2 col-sm-2">

                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <input type="text" class="form-control" name="nome" id="nome" placeholder="Serviço" value="<?php echo $usuario["nomeservico"]; ?>">        
                        <?php echo (isset($nomeErro)) ?  "<span class=\"error-validation active\">" . $nomeErro ."</span>" : ""; ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <textarea class="form-control" name="descricao" id="descricao" placeholder="Descrição" rows="6"> <?php echo $usuario["detalheservico"]; ?> </textarea>        
                        <?php echo (isset($descricaoErro)) ?  "<span class=\"error-validation active\">" . $descricaoErro ."</span>" : ""; ?>
                    </div>
                </div>
            </div>
            <div class"row">
                <div class="col-md-6 col-sm-12">
                    <a href="/editar-perfil.php" class="btn btn-outline-primary"> Voltar </a> 
                    <input type="submit" class="btn btn-outline-success" value="Salvar"/>
                </div>
            </div>
            </form>
           
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