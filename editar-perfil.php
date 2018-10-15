<?php 
//conexão
require_once("conexao/conexao.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Editar perfil</title>
	<link rel="stylesheet" type="text/css" href="styleeditar.css">

</head>
<body>
    <header>
      <h1>Editar Perfil</h1>
      <h2> + Adicionar Serviço</h2>
      <img class="iconePerfil" src="imagens/iconePerfil.jpg">
    
    </header>
               <div id="divvertical"></div>
               <div id="divhorizontal"></div>

    <div id= "principal"></div>

         <form action="#">
     	     <p> <label for="Nome Completo"> </label></p>
     	      <input type="text" name="Nome Completo" size="30" placeholder="Nome Completo" ><br>
     	       <p> <label for="CPF"> </label></p>
     	      <input type="text" name="CPF" size="30" placeholder="CPF" ><br>
             <p> <label for="Email"></label></p>
     	      <input type="text" name="E-mail" size="30" placeholder="E-mail"><br>
     	     <p> <label for="Endereço"></label></p>
     	      <input type="text" name="Endereço" size="30" placeholder="Endereço"><br>
     	     <p> <label for="Telefone"></label></p>
     	      <input type="text" name="Telefone" size="30" placeholder="Telefone"><br>
     	      <p><label for="Cidade"></label></p>
     	      <input type="text" name="Cidade" size="30" placeholder="Cidade"><br>
               <p><label for="Cep"></label></p>
     	      <input type="text" name="Cep" size="30" placeholder="Cep"><br>
              <p><label for="Loradouro"></label></p>
     	      <input type="text" name="Logradouro" size="30" placeholder="Logradouro"><br>
               <p><label for="Numero"></label></p>
     	      <input type="text" name="Numero" size="30" placeholder="Numero"><br>
              <p><label for="Bairro"></label></p>
     	      <input type="text" name="Bairro" size="30" placeholder="Bairro"><br>
     	       <p><label for="Senha"></label></p>
     	      <input type="password" name="senha" size="30" placeholder="Senha">
     	      <p><label for="Serviço1"></label></p>
              <p><textarea class="texto" name="Serviço1" id="serviço1" cols="50" rows="10" placeholder="Serviço1"></textarea></p>

     	      <button class="button1"> Salvar</button>
     	      <button class="button2"> Cancelar</button>

     	      

    </div>
   
    
</body>
</html>

<?php
     if(isset($_POST["nome"])){
                $_session       =$_POST["id"];
                $nome           =$_POST["nome"];
                $cpf            =$_POST["cpf"];
                $telefone       =$_POST["telefone"];
                $numero         =$_POST["numero"];
                $cidade         =$_POST["cidade"];
                $cep            =$_POST["cep"];
                $logradouro     =$_POST["logradouro"];
                $bairro         =$_POST["bairro"];
                if($senha==$senha){
                $alterar = "UPDATE usuario` SET `cep` = '022341', `numero` = '151', `bairro` = 'Almeida Prado', `cidade` = 'Tatui', `uf` = 'SP' WHERE `usuario`.`id` = 3";  
                $operacao_inserir = mysqli_query($conecta,$alterar);
                }
                
                
                if(!$operacao_alterar){
                    die("Erro no banco");
                }
            }       
    mysqli_close($conecta);
?>