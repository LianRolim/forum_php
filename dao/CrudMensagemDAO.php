<?php

final class CrudMensagemDAO{

	public function inserir($usuario, $idPostagem, $mensagem){

		try {

    		$con = new PDO("mysql:host=localhost;dbname=forum;charset=utf8", "root", "");
			$stmt = $con->prepare("INSERT INTO tb_mensagens(tb_usuario_id_usuario, tb_posts_id_post, descricao, dataHora)
				 						VALUES (?, ?, ?, ?)");

			$stmt->bindParam(1, $usuario);
			$stmt->bindParam(2, $idPostagem);
			$stmt->bindParam(3, $mensagem);
			$stmt->bindParam(4, date ("Y-m-d"));
			$stmt->execute();			

			Util::alerta("Obrigado pela sua mensagem");
      		Util::voltar();
			
    	}
    	catch (Exception $e) {
    		Util::alerta($e->getMessage());
    	}

	}

}

?>