<?php 
header("Content-type: text/html; charset=UTF-8");

include("../../database/conn.php");
    $TEXTO_TITULO = isset($_POST['TEXTO_TITULO']) ? $_POST['TEXTO_TITULO'] : '';
	$TEXTO_SUB_TITULO = isset($_POST['TEXTO_SUB_TITULO']) ? $_POST['TEXTO_SUB_TITULO'] : '';
	$TEXTO_BOTAO = isset($_POST['TEXTO_BOTAO']) ? $_POST['TEXTO_BOTAO'] : '';
	$LINK_BOTAO = isset($_POST['LINK_BOTAO']) ? $_POST['LINK_BOTAO'] : '';
	$ID = isset($_POST['ID']) ? $_POST['ID'] : '';


	$validate = true;
	$validate &= ! empty( $TEXTO_TITULO );
	$validate &= ! empty( $ID );



	if ( $validate ) {
		$stmt = $conn->prepare
		("UPDATE tbl_slide SET TEXTO_TITULO = '".$TEXTO_TITULO."', TEXTO_SUB_TITULO = '".$TEXTO_SUB_TITULO."', TEXTO_BOTAO = '".$TEXTO_BOTAO."', LINK_BOTAO = '".$LINK_BOTAO."' WHERE ID = '".$ID."'");
		
	

		if ( $stmt->execute() ) {
			 header(sprintf('location: %s', $_SERVER['HTTP_REFERER'].'&sucesso=1'));
		} else {
			echo "Erro 300, contacte o administrador";
			print_r($stmt->errorInfo());
		}
	
	} else {
		echo 'erro 200';
		
	}

