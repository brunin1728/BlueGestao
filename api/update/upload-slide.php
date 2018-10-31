<?php
include("../../configuration.php");



$limitar_ext = true;
$extensoes_validas = array('.jpg');
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

    $TITULO = isset($_POST['TEXTO_TITULO']) ? $_POST['TEXTO_TITULO'] : '';
    $SUB_TITULO = isset($_POST['TEXTO_SUB_TITULO']) ? $_POST['TEXTO_SUB_TITULO'] : '';
	$TEXTO_BOTAO = isset($_POST['TEXTO_BOTAO']) ? $_POST['TEXTO_BOTAO'] : '';
	$LINK_BOTAO = isset($_POST['LINK_BOTAO']) ? $_POST['LINK_BOTAO'] : '';
	$ID_USER_CAD = isset($_POST['ID_USER_CAD']) ? $_POST['ID_USER_CAD'] : '';
	$ID_PAGINA = isset($_POST['ID_PAGINA']) ? $_POST['ID_PAGINA'] : '';
	$DATA_VIGENCIA = isset($_POST['DATA_VIGENCIA']) ? $_POST['DATA_VIGENCIA'] : '';


	$validate = true;
	$validate &= ! empty( $TITULO );
	$validate &= ! empty( $SUB_TITULO );
	$validate &= ! empty( $TEXTO_BOTAO );
	$validate &= ! empty( $LINK_BOTAO );
	$validate &= ! empty( $ID_USER_CAD );
	$validate &= ! empty( $ID_PAGINA );



	if ( $validate ) {
		$stmt = $conn->prepare
		("INSERT INTO tbl_slide
		(DATA_VIGENCIA, IMAGEM,  STATUS_CONT, TEXTO_TITULO, TEXTO_SUB_TITULO, TEXTO_BOTAO, LINK_BOTAO, ID_USER_CAD, ID_PAGINA)
         VALUES ('".$DATA_VIGENCIA."', '".$nome_IMAGEM."',  '7', '".$TITULO."', '".$SUB_TITULO."', '".$TEXTO_BOTAO."', '".$LINK_BOTAO."', '".$ID_USER_CAD."', '".$ID_PAGINA."')");
		
	

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





