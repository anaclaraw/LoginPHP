<?php 
//variaveis para conexão
$host="localhost";
$user="root";
$password="ana123";
$bd="bd_login";


$mysqli= new mysqli($host,$user,$password,$bd);

if($mysqli->connect_errno){
    echo "Falha ao conectar: (" . $mysqli->connect_errno . ")" . $mysqli->connect_errno;
}
else {
    echo "conexão bem sucedida";
}
    
?>