<?php
include("../../configuration.php");



		
//ADICIONAR NO BANCO DE DADOS

    $ID = isset($_POST['ID']) ? $_POST['ID'] : '';
    $TITULO_TL = isset($_POST['TITULO_TL']) ? $_POST['TITULO_TL'] : '';
	$SUB_TITULO_TL = isset($_POST['SUB_TITULO_TL']) ? $_POST['SUB_TITULO_TL'] : '';
	$DATA_TEXTO_TL = isset($_POST['DATA_TEXTO_TL']) ? $_POST['DATA_TEXTO_TL'] : '';
	$DATA_TL = isset($_POST['DATA_TL']) ? $_POST['DATA_TL'] : '';
	$TEXTO = isset($_POST['TEXTO2']) ? $_POST['TEXTO2'] : '';
	$ID_USER_CAD = isset($_POST['ID_USER_CAD']) ? $_POST['ID_USER_CAD'] : '';


	$validate = true;
	$validate &= ! empty( $ID );
	$validate &= ! empty( $TITULO_TL );
	$validate &= ! empty( $SUB_TITULO_TL );
	$validate &= ! empty( $DATA_TEXTO_TL );
	$validate &= ! empty( $DATA_TL );
	$validate &= ! empty( $TEXTO );



$TEXTO2 = base64_encode($TEXTO);

	if ( $validate ) {
		$stmt = $conn->prepare
		("UPDATE tbl_timeline SET TITULO_TL = '".$TITULO_TL."', SUB_TITULO_TL ='".$SUB_TITULO_TL."', DATA_TEXTO_TL = '".$DATA_TEXTO_TL."', DATA_TL = '".$DATA_TL."', TEXTO = '".$TEXTO2."' WHERE ID = '".$ID."'");
		
	

		if ( $stmt->execute() ) {
			 header(sprintf('location: %s', $_SERVER['HTTP_REFERER'].'&sucesso=1'));
		} else {
			echo "Erro 300, contacte o administrador";
			print_r($stmt->errorInfo());
		}
	
	} else {
		echo 'erro 200';
	}


// ADICIONAR NO BANCO DE DADOS //

		
		
		
		
		
		
		
		
		

