<?php 
include("../../database/conn.php");


    $NOME = isset($_POST['NOME']) ? $_POST['NOME'] : '';
    $SOBRENOME = isset($_POST['SOBRENOME']) ? $_POST['SOBRENOME'] : '';
    $DDD = isset($_POST['DDD']) ? $_POST['DDD'] : '';
    $TELEFONE = isset($_POST['TELEFONE']) ? $_POST['TELEFONE'] : '';
	$EMAIL = isset($_POST['EMAIL']) ? $_POST['EMAIL'] : '';
	$SENHA = isset($_POST['SENHA']) ? $_POST['SENHA'] : '';
	$CNPJ_CPF = isset($_POST['CNPJ_CPF']) ? $_POST['CNPJ_CPF'] : '';
	$CAD_NACIONAL = isset($_POST['CAD_NACIONAL']) ? $_POST['CAD_NACIONAL'] : '';
	$RAZAO_SOCIAL = isset($_POST['RAZAO_SOCIAL']) ? $_POST['RAZAO_SOCIAL'] : '';
	$ENDERECO = isset($_POST['ENDERECO']) ? $_POST['ENDERECO'] : '';
	$ID_VENDEDOR = isset($_POST['ID_VENDEDOR']) ? $_POST['ID_VENDEDOR'] : '';
	$ID_CIDADE = isset($_POST['ID_CIDADE']) ? $_POST['ID_CIDADE'] : '';
	$EMPRESA = isset($_POST['EMPRESA']) ? $_POST['EMPRESA'] : '';


	$validate = true;
	$validate &= ! empty( $NOME );

$SENHA = md5($SENHA);

	if ( $validate ) {
		$stmt = $conn->prepare
		("INSERT INTO tbl_cliente (EMPRESA, NOME, SOBRENOME, DDD, TELEFONE, EMAIL, SENHA, CNPJ_CPF, CAD_NACIONAL, RAZAO_SOCIAL, ID_CIDADE, ID_VENDEDOR, ENDERECO)
VALUES ('".$EMPRESA."', '".$NOME."', '".$SOBRENOME."', '".$DDD."', '".$TELEFONE."', '".$EMAIL."', '".$SENHA."', '".$CNPJ_CPF."', '".$CAD_NACIONAL."', '".$RAZAO_SOCIAL."', '".$ID_CIDADE."', '".$ID_VENDEDOR."', '".$ENDERECO."')");
		
	

		if ( $stmt->execute() ) {
			 header(sprintf('location: %s', $_SERVER['HTTP_REFERER'].'?sucesso=1'));
		} else {
			echo "Erro 300, contacte o administrador";
			print_r($stmt->errorInfo());
		}
	
	} else {
		echo 'erro 200';
	}

