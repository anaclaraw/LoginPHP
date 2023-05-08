<?php
session_start();
require("conexao.php");
// $email = $_POST['email'];
// $senha = $_POST['senha'];


    //string anti hack no banco, para limpar a caixa de texto
    $email = $mysqli->real_escape_string($_POST['email']);
    $senha = $mysqli->real_escape_string(md5($_POST['senha']));

    $sql_code = "SELECT usuario_id,usuario_email,usuario_senha FROM `bd_login`.`tb_usuario` WHERE usuario_email = '$email' AND usuario_senha ='$senha'";
    
    //executar e OR para se falhar
    $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL:" . $mysqli->error);
  
   //se der certo a ação de cima resposta do numero de resultados deve ser 1
   if($sql_query->num_rows > 0){
        $user = $sql_query->fetch_assoc();//acessa os dados do usuario

        session_start();
        $_SESSION['email'] = $email;
        $_SESSION['senha'] =$senha;
        
        header('location:menu.html');
        //SESSION,diferente de GET, contunua valida até se a pessoa muda de pagina, por um detreminado tempo
       
   }
   else{
    echo "email invalido";
    header('location:login.html');
   }


?>
<!-- SQL DO BANCO bd_login

create database bd_login;

CREATE TABLE `bd_login`.`tb_usuario` (
  `usuario_id` INT NOT NULL AUTO_INCREMENT,
  `usuario_senha` VARCHAR(64) NOT NULL,
  `usuario_email` VARCHAR(128) NOT NULL,
  `usuario_data` DATETIME NOT NULL,
  `usuario_nome` VARCHAR(128) NOT NULL,
  PRIMARY KEY (`usuario_id`));

select * from tb_usuario; -->
