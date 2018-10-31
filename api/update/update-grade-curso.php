<?php
include("../../configuration.php");


		
//ADICIONAR NO BANCO DE DADOS

    $DISCIPLINA = isset($_POST['DISCIPLINA']) ? $_POST['DISCIPLINA'] : '';
    $DOCENTE = isset($_POST['DOCENTE']) ? $_POST['DOCENTE'] : '';
    $CARGA_HORARIA = isset($_POST['CARGA_HORARIA']) ? $_POST['CARGA_HORARIA'] : '';
    $ID = isset($_POST['ID']) ? $_POST['ID'] : '';
	$S = isset($_POST['S']) ? $_POST['S'] : '';
	

	$validate = true;
	$validate &= ! empty( $DISCIPLINA);
	$validate &= ! empty( $ID );
      
      
	if ( $validate ) {
		$stmt = $conn->prepare
		("UPDATE tbl_cursos_grade SET DISCIPLINA = '".$DISCIPLINA."', DOCENTE = '".$DOCENTE."', CARGA_HORARIA = '".$CARGA_HORARIA."' WHERE ID = '".$ID."'");
		
	

		if ( $stmt->execute() ) {
			 header(sprintf('location: %s', $_SERVER['HTTP_REFERER'].'&sucesso=1'));
		} else {
			echo "Erro 300, contacte o administrador";
			print_r($stmt->errorInfo());
		}
	
	} else {
		echo 'erro 200';
	}




		