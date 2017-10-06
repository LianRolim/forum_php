<?php

final class CrudCategoriaDAO{

	// consulto as categorias para montar os paineis
	public function inserirCategoria($categoria){

		try {

       $con = new PDO("mysql:host=localhost;dbname=forum", "root", "");

       $stmt = $con->prepare("INSERT INTO tb_categorias(nomeCategoria,
                                                        imagem) 
                                                 VALUES(?, ?)");

       $stmt->bindParam(1, $categoria->getNomeCategoria());
       $stmt->bindParam(2, $categoria->getImagem());
       $stmt->execute();

       Util::alerta("Categoria cadastrada com sucesso");
       Util::voltar();

    	}
    	catch (Exception $e) {
    		Util::alerta($e->getMessage());
    	}

	}

}

?>