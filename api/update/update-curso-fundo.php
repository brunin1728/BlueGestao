<?php 
header("Content-type: text/html; charset=UTF-8");

include("../../database/conn.php");



$limitar_ext = true;
$extensoes_validas = array('.png', '.jpg');
$caminho_absoluto  = '../../../cursos/images/cursos/home';
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
		
		
		
		
	$ID = isset($_POST['ID']) ? $_POST['ID'] : '';


	$validate = true;
	$validate &= ! empty( $ID );



	if ( $validate ) {
		$stmt = $conn->prepare
		("UPDATE tbl_cursos SET IMAGEM_FUNDO = '".$nome_IMAGEM."' WHERE ID = '".$ID."'");
		
	

		if ( $stmt->execute() ) {
			 header(sprintf('location: %s', $_SERVER['HTTP_REFERER'].'&sucesso=1'));
		} else {
			echo "Erro 300, contacte o administrador";
			print_r($stmt->errorInfo());
		}
	
	} else {
		echo 'erro 200';
		
	}

		
		
	} else {
		echo "<p align=center>O IMAGEM não pode ser copiado para o servidor.</p>";
	}



} else {
	die( "Seleciona um IMAGEM a ser enviado ");
}

