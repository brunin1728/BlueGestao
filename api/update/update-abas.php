<?php
include("../../configuration.php");


		
//ADICIONAR NO BANCO DE DADOS

    $TITULO = isset($_POST['TITULO']) ? $_POST['TITULO'] : '';
	
	$ID = isset($_POST['ID']) ? $_POST['ID'] : '';
	$S = isset($_POST['S']) ? $_POST['S'] : '';
	

  if($S === '1'){
	  $TEXTO = isset($_POST['TEXTO']) ? $_POST['TEXTO'] : '';
  }elseif($S === '2'){
	  $TEXTO = isset($_POST['TEXTO1']) ? $_POST['TEXTO1'] : '';
  }elseif($S === '3'){
	  $TEXTO = isset($_POST['TEXTO2']) ? $_POST['TEXTO2'] : '';
  }
	
	
	
	$validate = true;
	$validate &= ! empty( $TITULO );
	$validate &= ! empty( $TEXTO );
	$validate &= ! empty( $ID );
      
	  
	  
	  $VALOR1 = "TITULO_ABA_".$S;
	  $VALOR2 = "TEXTO_ABA_".$S;
	  
	  
	  
	  $TEXTO2 = base64_encode($TEXTO);

	if ( $validate ) {
		$stmt = $conn->prepare
		("UPDATE tbl_cursos SET ".$VALOR1." = '".$TITULO."', ".$VALOR2." = '".$TEXTO2."' WHERE ID = '".$ID."'");
		
	

		if ( $stmt->execute() ) {
			 header(sprintf('location: %s', $_SERVER['HTTP_REFERER'].'&sucesso=1'));
		} else {
			echo "Erro 300, contacte o administrador";
			print_r($stmt->errorInfo());
		}
	
	} else {
		echo 'erro 200';
	}




		