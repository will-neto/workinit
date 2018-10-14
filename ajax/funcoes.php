<?php

    if (isset($_POST['funcao'])) {

        session_start();

        if($_POST["funcao"] === "adicionar-contato"){
            if (isset($_POST['usuario'])){
                echo adicionarContato($_POST['usuario']);
                //echo $_POST['usuario'];
            }
        }

    }

    function adicionarContato($nomedeusuario){


        require_once("../conexao/conexao.php"); 

        $usuarioLogadoId = $_SESSION['id'];
        $resultado = '';        
        $operacao_contato = mysqli_query($conecta, "SELECT * FROM usuario WHERE nomedeusuario = '$nomedeusuario' LIMIT 1");
        
        if(!$operacao_contato){
            $resultado = mysqli_error($operacao_contato);
        } else {
            if (mysqli_num_rows($operacao_contato) > 0){
                
                $contatoid = 0;

                while ($registro = mysqli_fetch_assoc($operacao_contato)) {      
                    $contatoid = $registro['id'];
                }

                if ($contatoid === $usuarioLogadoId) {
                    $resultado = 'Você não pode adicionar você mesmo!';
                }
                else if ($contatoid > 0){

                    $operacao_possui_contato_ja_adicionado = mysqli_query($conecta, "SELECT usuario1Id FROM contato WHERE (usuario1Id = '$usuarioLogadoId' AND usuario2Id = '$contatoid') OR (usuario1Id = '$contatoid' AND usuario2Id = '$usuarioLogadoId') LIMIT 1");

                    if(!$operacao_possui_contato_ja_adicionado){
                        $resultado = mysqli_error($operacao_possui_contato_ja_adicionado);
                    } else{
                        if (mysqli_num_rows($operacao_possui_contato_ja_adicionado) > 0) {
                            $resultado = 'Você já enviou uma solicitação de amizade para este usuário!';
                        } else {

                            $dataCorrente = date('Y-m-d H:i:s');

                            $inserir = "INSERT INTO contato(`usuario1Id`,  `usuario2Id`,  `dataSolicitacao`, `status`) VALUES ('$usuarioLogadoId', '$contatoid', '$dataCorrente', 'A')";

                            $operacao_solicitar_amizade = mysqli_query($conecta, $inserir);
                            
                            if(!$operacao_solicitar_amizade){
                                $resultado = mysqli_error($operacao_solicitar_amizade);
                            }
                        }
                    }
                }
            }
        }

        mysqli_close($conecta);

        return $resultado;
    }

?>
