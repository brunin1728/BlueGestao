<?php
include("../../configuration.php");



		
//ADICIONAR NO BANCO DE DADOS

    $ID = isset($_POST['ID']) ? $_POST['ID'] : '';
    $LINK = isset($_POST['LINK']) ? $_POST['LINK'] : '';



	$validate = true;
	$validate &= ! empty( $ID );
	$validate &= ! empty( $LINK );



	if ( $validate ) {
		$stmt = $conn->prepare
		("UPDATE tbl_cursos SET LINK_VIDEO = '".$LINK."' WHERE ID = '".$ID."'");
		
	

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

		
		
		
		
		
		
		
		
		

