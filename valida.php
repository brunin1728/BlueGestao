<?php
session_start();

include ('configuration.php');


$login = strip_tags( filter_input(INPUT_POST, 'USUARIO'));
$senha = strip_tags( filter_input(INPUT_POST, 'SENHA'));

$access = $conn->prepare("SELECT * FROM tbl_usuario WHERE EMAIL = :login AND SENHA = :senha"); 
$access->BindValue(':login', $login);
$access->BindValue(':senha', md5($senha));

if ( $access->execute() ) {
	$result = $access->fetch(PDO::FETCH_OBJ);
	if ( $result ) {
		$user_session = ['user_login' => $login, 'user_pass' => md5($senha) ];
		$_SESSION['blue_data'] = $user_session;

		header("Location: index.php");
	}else{
	header("Location: login.php?erro");
}
}else{
	header("Location: login.php?erro");
}
