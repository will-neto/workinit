<?php 
    $servidor   = "localhost";
    $usuario    = "root";
    $senha      = "";
    $banco      = "worknit";
    $port       = 3306; 
    $conecta    = mysqli_connect($servidor.':'.$port,$usuario,$senha,$banco);

    if(mysqli_connect_errno()){
      die("Conexão falhou: " . mysqli_connect_errno());
    }
?>