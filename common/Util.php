<?php

class Util{

public function alerta($msg) {
	
	echo "<script type=\"text/javascript\">
	         alert(\" $msg \");
		  </script>";

}

public function voltar(){
	
	echo "<script type=\"text/javascript\"> history.go(-1) </script>"; 
}

}

?>