<?php

session_start();
include('conexao.php');
// $nome = $_POST['nome'];
// $senha = $_POST['senha'];
// $email = $_POST['email'];
$nome = $mysqli->real_escape_string($_POST['nome']);
$email = $mysqli->real_escape_string($_POST['email']);
$senha = $mysqli->real_escape_string(md5($_POST['senha']));

try{
    //comando q faz validação no sql select count(*) as total from usuario where email=''
    $sql = "select count(*) as total from tb_usuario where usuario_email='$email' ";
    //variavel q executa a query
    $result = $mysqli->query($sql);

    $row = mysqli_fetch_assoc($result);

    if($row['total'] == 1){
        echo '<script>alert("Wemail já cadastrado")</script>';
    }
    $sql = "INSERT INTO bd_login.tb_usuario(usuario_nome,usuario_email,usuario_senha,usuario_data) VALUES ('$nome','$email','$senha',NOW() )";
    
    //tres iguais ele compara os dados, no caso com dois boleanos
    if($mysqli->query($sql) === true){
        $_SESSION['status_cadastro'] = true;
    }

    $mysqli->close();
    header('Location:login.html');
}
catch (PDOException $e){
    echo 'Error: ' . $e->getMessage();
}
?>
