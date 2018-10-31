<?php 
include("../../database/conn.php");


    $CODIGO = isset($_POST['CODIGO']) ? $_POST['CODIGO'] : '';
    $VALOR = isset($_POST['VALOR']) ? $_POST['VALOR'] : '';
    $QTD = isset($_POST['QTD']) ? $_POST['QTD'] : '';
    $DATA_FINAL = isset($_POST['DATA_FINAL']) ? $_POST['DATA_FINAL'] : '';
    $STATUS = isset($_POST['STATUS']) ? $_POST['STATUS'] : '';
    $ID = isset($_POST['ID']) ? $_POST['ID'] : '';


	$validate = true;
	$validate &= ! empty( $ID);
	$validate &= ! empty( $CODIGO );

$SENHA = md5($SENHA);

	if ( $validate ) {
		$stmt = $conn->prepare
		("UPDATE tbl_cupom SET CODIGO = '".$CODIGO."', VALOR = '".$VALOR."', QTD = '".$QTD."', DATA_FINAL = '".$DATA_FINAL."', STATUS = '".$STATUS."' WHERE ID_CUP = '".$ID."'");
		
	

		if ( $stmt->execute() ) {
			 header(sprintf('location: %s', $_SERVER['HTTP_REFERER'].'?sucesso=1'));
		} else {
			echo "Erro 300, contacte o administrador";
			print_r($stmt->errorInfo());
		}
	
	} else {
		echo 'erro 200';
	}

