<?php
include("../../configuration.php");


    $SENHA = isset($_POST['SENHA']) ? $_POST['SENHA'] : '';
    $ID_P = isset($_POST['IDP']) ? $_POST['IDP'] : '';
    $ID = isset($_POST['ID']) ? $_POST['ID'] : '';
    $ID_S = isset($_POST['IDS']) ? $_POST['IDS'] : '';



	$validate = true;
	$validate &= ! empty( $ID );
	$validate &= ! empty( $ID_S );
	$validate &= ! empty( $SENHA );
	
	
$USER = wcms_db_select('tbl_usuario', ['*'], ['ID' => $ID])[0];
$SENHA2 = md5($SENHA);
if($USER->SENHA === $SENHA2){

	if ( $validate ) {
		$stmt = $conn->prepare
		("UPDATE tbl_cursos_cont SET STATUS_CONT = '10' WHERE ID_CONT = '".$ID_S."'");
		
	

		if ( $stmt->execute() ) {
			 //header(sprintf('location: %s', $_SERVER['HTTP_REFERER'].'&sucesso=1'));
			 header("Location: ../../paginas.php?action=page&i=".$ID_P."&op=testemunhas&sucesso=1");
		} else {
			echo "Erro 300, contacte o administrador";
			print_r($stmt->errorInfo());
		}
	
	} else {
		echo 'erro 200';
	}
}else{
	//header(sprintf('location: %s', $_SERVER['HTTP_REFERER'].'&serro=1'));
    header("Location: ../../paginas.php?action=page&i=".$ID_P."&op=testemunhas&serro=1");
}


		
		
		
		
		
		
		