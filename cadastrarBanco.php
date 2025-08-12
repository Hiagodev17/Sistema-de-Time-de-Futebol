<?php

$hostname = "127.0.0.1";
$user = "root";
$password = "root";
$database = "timeFutebol";

$conexao = new mysqli($hostname, $user, $password, $database);

if($conexao->connect_errno) {
    echo "Failed to connect to MySQL: " . $conexao->connect_error;
    exit();
} else{
    // Evita caracteres especiais (SQL Inject)
    $nome = $conexao->real_escape_string($_POST['nome']);
    $posicao = $conexao->real_escape_string($_POST['posicao']);
    $camisa = $conexao->real_escape_string($_POST['camisa']);
    $salario = $conexao->real_escape_string($_POST['salario']);

    $sql = "INSERT INTO jogadores (`nome`, `posicao`, `camisa`, `salario`) 
            VALUES ('".$nome."', '".$posicao."' , '".$camisa."', '".$salario."');";
   
    $resultado = $conexao->query($sql);

    $conexao->close();
    header('Location: index.php', true, 301);

}

?>