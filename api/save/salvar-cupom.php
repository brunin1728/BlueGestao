<?php 
include("../../database/conn.php");


    $CODIGO = isset($_POST['CODIGO']) ? $_POST['CODIGO'] : '';
    $VALOR = isset($_POST['VALOR']) ? $_POST['VALOR'] : '';
    $QTD = isset($_POST['QTD']) ? $_POST['QTD'] : '';
    $DATA_FINAL = isset($_POST['DATA_FINAL']) ? $_POST['DATA_FINAL'] : '';
    $STATUS = isset($_POST['STATUS']) ? $_POST['STATUS'] : '';


	$validate = true;
	$validate &= ! empty( $CODIGO );

$SENHA = md5($SENHA);

	if ( $validate ) {
		$stmt = $conn->prepare
		("INSERT INTO tbl_cupom (CODIGO, VALOR, QTD, DATA_FINAL, STATUS)
VALUES ('".$CODIGO."', '".$VALOR."', '".$QTD."', '".$DATA_FINAL."', '".$STATUS."')");
		
	

		if ( $stmt->execute() ) {
			 header(sprintf('location: %s', $_SERVER['HTTP_REFERER'].'?sucesso=1'));
		} else {
			echo "Erro 300, contacte o administrador";
			print_r($stmt->errorInfo());
		}
	
	} else {
		echo 'erro 200';
	}

