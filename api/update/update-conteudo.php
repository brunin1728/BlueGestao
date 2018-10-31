<?php
include("../../configuration.php");


if (!empty($_FILES['IMAGEM']['name']) ) {
$limitar_ext = true;
$extensoes_validas = array('.png');
$caminho_absoluto  = '../../../images';
$limitar_tamanho = true;
$tamanho_bytes = 1000000000000000000000000000000000;
$sobrescrever = true;

if ( isset($_FILES['IMAGEM']) ) {
	$nome_IMAGEM = $_FILES['IMAGEM']['name'];
	$tamanho_IMAGEM = $_FILES['IMAGEM']['size'];
	$IMAGEM_temporario = $_FILES['IMAGEM']['tmp_name']; 
}

if ( isset($nome_IMAGEM) ) {
	if ( !$sobrescrever && file_exists("$caminho_absoluto/$nome_IMAGEM") )
		die("IMAGEM já existe");

	if ( $limitar_tamanho && $tamanho_IMAGEM > $tamanho_bytes )
		die("IMAGEM deve ter no máximo $tamanho_bytes bytes");

	$ext = strrchr($nome_IMAGEM, '.');

	if ( $limitar_ext && ! in_array($ext, $extensoes_validas) )
		die("Extensão inválida para upload.");

	if ( move_uploaded_file($IMAGEM_temporario, "$caminho_absoluto/$nome_IMAGEM") ) {
		
		
		
		
//ADICIONAR NO BANCO DE DADOS

    $TITULO = isset($_POST['TITULO']) ? $_POST['TITULO'] : '';
	$TEXTO = isset($_POST['TEXTO']) ? $_POST['TEXTO'] : '';
	$ID = isset($_POST['ID']) ? $_POST['ID'] : '';
	$S = isset($_POST['S']) ? $_POST['S'] : '';
	


	$validate = true;
	$validate &= ! empty( $TITULO );
	$validate &= ! empty( $TEXTO );
	$validate &= ! empty( $ID );
      
	  
	  
	  $VALOR1 = "TITULO_DESTAQUE_".$S;
	  $VALOR2 = "TEXTO_DESTAQUE_".$S;
	  $VALOR3 = "IMAGEM_DESTAQUE_".$S;
	  
	  
	  
	  

	if ( $validate ) {
		$stmt = $conn->prepare
		("UPDATE tbl_destaque_cont SET '".$VALOR1."', = '".$TITULO."', '".$VALOR2."' = '".$TEXTO."', '".$VALOR3."' = '".$nome_IMAGEM."' WHERE ID_DESTAQUE = '".$ID."'");
		
	

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

		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
	} else {
		echo "<p align=center>O IMAGEM não pode ser copiado para o servidor.</p>";
	}



} else {
	die( "Seleciona um IMAGEM a ser enviado ");
}




}else{
	
    $TITULO = isset($_POST['TITULO']) ? $_POST['TITULO'] : '';
	$TEXTO = isset($_POST['TEXTO']) ? $_POST['TEXTO'] : '';
	$ID = isset($_POST['ID']) ? $_POST['ID'] : '';
	$S = isset($_POST['S']) ? $_POST['S'] : '';
	


	$validate = true;
	$validate &= ! empty( $TITULO );
	$validate &= ! empty( $TEXTO );
	$validate &= ! empty( $ID );
      

	  
	  
	   $TEXTO2 = base64_encode($TEXTO);

	if ( $validate ) {
		$stmt = $conn->prepare
		("UPDATE tbl_conteudo SET TITULO = '".$TITULO."', TEXTO = '".$TEXTO2."' WHERE ID_PAGINA = '".$ID."'");
		
	

		if ( $stmt->execute() ) {
			 header(sprintf('location: %s', $_SERVER['HTTP_REFERER'].'&sucesso=1'));
		} else {
			echo "Erro 300, contacte o administrador";
			print_r($stmt->errorInfo());
		}
	
	} else {
		echo 'erro 200';
	}

	
}
