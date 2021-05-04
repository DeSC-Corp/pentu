<?php 

include("conexao.php");
// $con = mysqli_connect("localhost", "root", "", "pentu")or die("Erro na Conexão");
// 	mysqli_set_charset($con, "utf-8");

if(isset($_POST['register'])) {
	$nome = $_POST['name'];
	$email = $_POST['email'];
	$senha = md5($_POST['pass']);
	$telefone = $_POST['tel'];
	$dataNasc = $_POST['nasc'];
	
	$registros = mysqli_num_rows(mysqli_query($con, "SELECT * FROM usuario WHERE email = '$email'"));
	if($registros == 0) {
		$insert = mysqli_query($con, "INSERT INTO usuario(nome, email, senha, telefone, dataNasc) VALUES ('$nome', '$email', '$senha', '$telefone', '$dataNasc')");
		
		if($insert) {
			echo "success";
		} 
		else {
			echo "error";
		}
	} 
	else {
		echo "exist";
	}
}

mysqli_close($con);

?>