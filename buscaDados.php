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
    $nomeJogador = $conexao->real_escape_string($_POST['nomeJogador']);

    $sql="SELECT * FROM `timeFutebol`.`jogadores` where `nome` = '".$nomeJogador."';";
                 
			$resultado = $conexao->query($sql);
			
			echo '<hr>';
			if($resultado->num_rows !=0){
                $row = $resultado -> fetch_array();
                $conexao -> close();
                echo 'Nome do Jogador: ';
				echo $row[1];
				echo '<br>';
				echo 'Posição: ';
				echo $row[2];
				echo '<br>';
				echo 'Camisa: ';
				echo $row[3];
				echo '<br>';
				echo 'Salário: R$';
				echo $row[4];

            } else{
                $conexao -> close();
                echo 'Jogador não encontrado!';
            }	
			echo "<br>";
		    echo "<a href='sair.php' class='sair'>Sair</a>";

}

?>