<?php
include("../../configuration.php");


		
//ADICIONAR NO BANCO DE DADOS

    $TITULO = isset($_POST['TITULO_CONT']) ? $_POST['TITULO_CONT'] : '';
    $TEXTO = isset($_POST['TEXTO_CONT']) ? $_POST['TEXTO_CONT'] : '';
    $ID = isset($_POST['ID']) ? $_POST['ID'] : '';
	$S = isset($_POST['S']) ? $_POST['S'] : '';
	


	
	
	$validate = true;
	$validate &= ! empty( $TITULO );
	$validate &= ! empty( $TEXTO );
	$validate &= ! empty( $ID );
      
	  

	  
	  
	  
	  $TEXTO2 = base64_encode($TEXTO);

	if ( $validate ) {
		$stmt = $conn->prepare
		("UPDATE tbl_cursos_cont SET TITULO_CONT = '".$TITULO."', TEXTO_CONT = '".$TEXTO2."' WHERE ID_CONT = '".$ID."'");
		
	

		if ( $stmt->execute() ) {
			 header(sprintf('location: %s', $_SERVER['HTTP_REFERER'].'&sucesso=1'));
		} else {
			echo "Erro 300, contacte o administrador";
			print_r($stmt->errorInfo());
		}
	
	} else {
		echo 'erro 200';
	}




		