<?php
include("../../configuration.php");


		
//ADICIONAR NO BANCO DE DADOS

    $TITULO = isset($_POST['TITULO']) ? $_POST['TITULO'] : '';
    $ID = isset($_POST['ID']) ? $_POST['ID'] : '';
	$S = isset($_POST['S']) ? $_POST['S'] : '';
	


	
	
	$validate = true;
	$validate &= ! empty( $TITULO );
	$validate &= ! empty( $ID );
      
      
	  

	  
	  

	if ( $validate ) {
		$stmt = $conn->prepare
		("UPDATE tbl_cursos_per SET TITULO = '".$TITULO."' WHERE ID = '".$ID."'");
		
	

		if ( $stmt->execute() ) {
			 header(sprintf('location: %s', $_SERVER['HTTP_REFERER'].'&sucesso=1'));
		} else {
			echo "Erro 300, contacte o administrador";
			print_r($stmt->errorInfo());
		}
	
	} else {
		echo 'erro 200';
	}




		