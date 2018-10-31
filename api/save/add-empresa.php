<?php 
include("../../database/conn.php");


    $ID_CLIENTE = isset($_POST['ID_CLIENTE']) ? $_POST['ID_CLIENTE'] : '';
    $CIDADE = isset($_POST['CIDADE']) ? $_POST['CIDADE'] : '';
    $NOME_FANTASIA = isset($_POST['NOME_FANTASIA']) ? $_POST['NOME_FANTASIA'] : '';
	$RAZAO_SOCIAL = isset($_POST['RAZAO_SOCIAL']) ? $_POST['RAZAO_SOCIAL'] : '';
	$ENDERECO = isset($_POST['ENDERECO']) ? $_POST['ENDERECO'] : '';
	$CNPJ = isset($_POST['CNPJ']) ? $_POST['CNPJ'] : '';
	$CEP = isset($_POST['CEP']) ? $_POST['CEP'] : '';


	$validate = true;
	$validate &= ! empty( $NOME_FANTASIA );

$CHAVE = md5($CNPJ);

	if ( $validate ) {
		$stmt = $conn->prepare
		("INSERT INTO tbl_empresas (ID_CLIENTE, ID_CIDADE, EMPRESA, NOME_FANTASIA, RAZAO_SOCIAL, CNPJ, ENDERECO, CEP, CHAVE_ID)
VALUES ('".$ID_CLIENTE."', '".$CIDADE."', '1', '".$NOME_FANTASIA."', '".$RAZAO_SOCIAL."', '".$CNPJ."', '".$ENDERECO."', '".$CEP."', '".$CHAVE."')");
		
	

		if ( $stmt->execute() ) {
			 header(sprintf('location: %s', $_SERVER['HTTP_REFERER'].'?sucesso=1'));
		} else {
			echo "Erro 300, contacte o administrador";
			print_r($stmt->errorInfo());
		}
	
	} else {
		echo 'erro 200';
	}

