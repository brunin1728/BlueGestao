<?php
session_start(); 



$login = '';
$senha = '';
if ( isset($_SESSION['blue_data']) && is_array($_SESSION['blue_data']) ) {
	$user_data = $_SESSION['blue_data'];
	$login = $user_data['user_login'];
	$senha = $user_data['user_pass'];  
	
	
	
	$USUARIO = wcms_db_select('tbl_cliente', ['*'], ['EMAIL' => $login, 'SENHA' => $senha])[0];
	
}

if ( ! empty($login) && ! empty($senha) ) {
	$access = $conn->prepare("SELECT * FROM tbl_usuario WHERE EMAIL = :login AND SENHA = :senha"); 
	$access->BindValue(':login', $login);
	$access->BindValue(':senha', $senha);

	if ( $access->execute() ) {
		$result = $access->fetch(PDO::FETCH_OBJ);
		if ( ! $result ) {
			unset($_SESSION['blue_data']);
			//echo "Erro 1";
			header("Location: login.php");
		}
	}
} else {
	//echo "Erro 2";
	header("Location: login.php");
}