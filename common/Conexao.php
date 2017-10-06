<?php

class Conexao{

public function Open() {
	
	$con = new PDO("mysql:host=localhost;dbname=forum", "", "");

}


}

?>