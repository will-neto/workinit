<?php 
//conexão
require_once("conexao/conexao.php"); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Editar Perfil</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<style>

</style>
</head>
<body>
     <header>
     	     <h1> <img  src="imagens/logotipoworkint.jpg"></h1>
     	     <h2>Editar Perfil</h2>
     	     
     </header>
     <div>
     	
     </div>
     <div>
     	
     	<form action="#">
     	     <p> <label for="Nome Completo"> </label></p>
     	      <input type="text" name="Nome Completo" size="30" placeholder="Nome Completo" ><br>
     	     <p> <label for="Email"></label></p>
     	      <input type="text" name="E-mail" size="30" placeholder="E-mail"><br>
     	     <p> <label for="Endereço"></label></p>
     	      <input type="text" name="Endereço" size="30" placeholder="Endereço"><br>
     	     <p> <label for="Fone contato"></label></p>
     	      <input type="text" name="Fone Contato" size="30" placeholder="Fone Contato"><br>
     	      <p><label for="Cidade"></label></p>
     	      <input type="text" name="Cidade" size="30" placeholder="Cidade"><br>
     	      <p><label for="Resumo Perfil"></label></p>
              <p><textarea class="texto" name="ResumoPerfil" id="ResumoPerfil" cols="70" rows="10" placeholder="Resumo Perfil"></textarea></p>

     	       <button>Salvar Alterações</button>

     		 
     	</form>
     </div>
     <div>
     	
     	<img class="foto-perfil" src="imagens/perfil.jpg">
     </div>
     <div>
     	
     	<img class="foto-colaboradores" src="imagens/trabalhadores.jpg">
     </div>

</body>
</html>

<?php
    mysqli_close($conecta);
?>