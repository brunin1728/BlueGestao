<?php 
include("../../database/conn.php");
    $TITULO = isset($_POST['TITULO']) ? $_POST['TITULO'] : '';
	$META_DESCRICAO = isset($_POST['META_DESCRICAO']) ? $_POST['META_DESCRICAO'] : '';
	$ID = isset($_POST['ID']) ? $_POST['ID'] : '';


	$validate = true;
	$validate &= ! empty( $TITULO );
	$validate &= ! empty( $META_DESCRICAO );
	$validate &= ! empty( $ID );



	if ( $validate ) {
		$stmt = $conn->prepare
		("UPDATE tbl_pagina SET META_DESCRICAO = '".$META_DESCRICAO."', TITULO = '".$TITULO."' WHERE ID = '".$ID."'");
		
	

		if ( $stmt->execute() ) {
			 header(sprintf('location: %s', $_SERVER['HTTP_REFERER'].'&sucesso=1'));
		} else {
			echo "Erro 300, contacte o administrador";
			print_r($stmt->errorInfo());
		}
	
	} else {
		echo 'erro 200';
	}

