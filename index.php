<?php 
//conexão
require_once("conexao/conexao.php"); ?>

<?php
//consulta servicos
    $consulta_servicos = "SELECT nomeservico,detalheservico,nome, cidade, imagemservico, nomedeusuario FROM servicolistagem,usuario WHERE servicolistagem.usuarioID = usuario.id";
    $servicos = mysqli_query($conecta, $consulta_servicos);
    
    if(!$servicos){
        die("Falha na consulta ao banco de dados");
    }
?>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link rel="stylesheet" href="lib/css/index.css">
        <link rel="stylesheet" href="lib/css/index_design.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <title> Workinit | Bem vindo </title>
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
                        <tr>
                            <td><?php echo utf8_encode($registro["nome"]);?></td>
                        </tr>
                        <tr>
                            <td><?php echo utf8_encode($registro["nomeservico"]);?></td>
                        </tr>
                        <tr>
                            <td><?php echo utf8_encode($registro["cidade"]);?></td>
                        </tr>
                        <tr>
                            <td><a class="btn-contato" data-usuario="<?php echo utf8_encode($registro["nomedeusuario"]);?>" > Adicionar Contato + </a></td>
                        </tr>
                    </table>
        
                </td></tr>
        </table>
        <?php   
        }
        ?>
        </section>
        
            
        
        
        <section class="tela-mensagens">
            <h2><i class="material-icons">chat</i>Minhas mensagens</h2>  
                <div class="notificacao">
                    <img src="lib/img/user.png" class="usuario3" alt="perfil"/>
                    <h6>Usuario X</h6>
                    <p>Olá, vi seu anuncio e estou interessado no serviço X, gostaria de fazer uma solicitação.</p>
                </div><br>
                <div class="notificacao">
                    <img src="lib/img/user.png" class="usuario3" alt="perfil"/>
                    <h6>Usuario X</h6>
                    <p>Olá, vi seu anuncio e estou interessado no serviço X, gostaria de fazer uma solicitação.</p>
                </div><br>
                <div class="notificacao">
                    <img src="lib/img/user.png" class="usuario3" alt="perfil"/>
                    <h6>Usuario X</h6>
                    <p>Olá, vi seu anuncio e estou interessado no serviço X, gostaria de fazer uma solicitação.</p>
                </div><br>
                <div class="notificacao">
                    <img src="lib/img/user.png" class="usuario3" alt="perfil"/>
                    <h6>Usuario X</h6>
                    <p>Olá, vi seu anuncio e estou interessado no serviço X, gostaria de fazer uma solicitação.</p>
                </div><br>
        </section>
        
        <section class="menu">
            <img src="lib/img/user.png" class="usuario" alt="perfil" title="perfil"/>

            <div class="dados">
                <h3>Nome de usuario</h3>
                <h5>Serviço Disponibilizado</h5>
                <h6>Localização</h6>
                <h6>Contato: (xx) 9xxx-xxxx/xxxx-xxxx</h6>
                <h6>E-mail: usuario@exemplo.com</h6>
            </div>

            <nav>
                <ul>
                    <li>Editar perfil</li>
                    <li>Sair</li>
                </ul>
            </nav>
        </section>
        <?php
            mysqli_free_result($servicos);
        ?>
    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script>
        
        $(".notificacao").on('click', function(){

        });

        $(".btn-contato").on('click', function(){
            
            var nomedousuario = $(this).data('usuario');

            $.ajax({
                url: 'ajax/funcoes.php',
                type: 'post',
                data: { "funcao": "adicionar-contato", "usuario": nomedousuario },
                success: function(data) { 
                    
                    console.log(data); 

                    if (data === ''){
                        toastr.success('Solicitação de amizade enviada com sucesso. Aguarde a resposta do usuário.', 'Solicitação de Amizade Enviado!');
                    } else {
                        toastr.error(data, 'Ocorreu um erro...');
                    }

                }
            });

            //alert(nomedousuario);
        });
        
    </script>

</body>
</html>

<?php
    mysqli_close($conecta);
?>

