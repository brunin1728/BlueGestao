<?php 
session_start();
include("../../database/conn.php");


    $ID_VENDEDOR = isset($_POST['ID_VENDEDOR']) ? $_POST['ID_VENDEDOR'] : '';
    $NOME = isset($_POST['NOME']) ? $_POST['NOME'] : '';
    $DATA_NASCIMENTO = isset($_POST['DATA_NASCIMENTO']) ? $_POST['DATA_NASCIMENTO'] : '';
    $DDD = isset($_POST['DDD']) ? $_POST['DDD'] : '';
    $TELEFONE = isset($_POST['TELEFONE']) ? $_POST['TELEFONE'] : '';
	$EMAIL = isset($_POST['EMAIL']) ? $_POST['EMAIL'] : '';
	$SENHA = isset($_POST['SENHA']) ? $_POST['SENHA'] : '';
	$CPF = isset($_POST['CPF']) ? $_POST['CPF'] : '';
	$ID_CIDADE = isset($_POST['CIDADE']) ? $_POST['CIDADE'] : '';


	$validate = true;
	$validate &= ! empty( $NOME );
	$validate &= ! empty( $DATA_NASCIMENTO );
	$validate &= ! empty( $DDD );
	$validate &= ! empty( $TELEFONE );
	$validate &= ! empty( $EMAIL );
	$validate &= ! empty( $SENHA );
	$validate &= ! empty( $CPF );
	$validate &= ! empty( $ID_CIDADE );

$SENHA = md5($SENHA);

	if ( $validate ) {
		$stmt = $conn->prepare
		("INSERT INTO tbl_cliente (NOME_COMPLETO, DATA_NASCIMENTO, DDD, TELEFONE, EMAIL, SENHA, CPF, ID_CIDADE, ID_VENDEDOR)
VALUES ('".$NOME."', '".$DATA_NASCIMENTO."', '".$DDD."', '".$TELEFONE."', '".$EMAIL."', '".$SENHA."', '".$CPF."', '".$ID_CIDADE."', '1')");
		
	

		if ( $stmt->execute() ) {
	    $user_session = ['user_login' => $CPF, 'user_pass' => $SENHA ];
		$_SESSION['cliente_data'] = $user_session;
			 header("location:../../empresas.php");
		} else {
			echo "Erro 300, contacte o administrador";
			print_r($stmt->errorInfo());
		}
	
	} else {
		echo 'erro 200';
	}

