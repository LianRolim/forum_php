<?php

final class Util{

public function alerta($msg) {
	
	echo "<script type=\"text/javascript\">
	         alert(\" $msg \");
		  </script>";

}

public function voltar(){
	echo "<script type=\"text/javascript\"> history.go(-1) </script>"; 
}

public function voltarDois(){
	echo "<script type=\"text/javascript\"> history.go(-2) </script>"; 
}


public function redireciona($pagina){
	echo "<script type=\"text/javascript\">window.location.href = \"./?a=". $pagina ."\"</script>";
}

//retorno um array com todas as imagens de um diretorio...
public function consultaImgEmUmDiretorio(){

	$arrFiles = [];

	$files = glob("imagens/categorias/*.*");

	for ($i=1; $i<count($files); $i++) { 
		
		$num = $files[$i]; 
		
		if($num <> "imagens/categorias/alien.png"){ // alien eh o default entao nao aparece para selecioanr...
			array_push($arrFiles,$num);
		}
		

	} 

	return $arrFiles;
}

}

?>