<?php

final class CrudForunsDAO{

	// consulto as categorias para montar os paineis
	public function buscarCategorias(){

		$arrCategorias = [];

		try {

			$con = new PDO("mysql:host=localhost;dbname=forum", "root", "");

    		$resultSet = $con->prepare("select id_categoria, 
    			                               nomeCategoria, 
    			                               imagem 
    			                          from forum.tb_categorias");

			if($resultSet->execute()){ // executa o select
				if($resultSet->rowCount() > 0){ // consulta retornou mais que 1 registro
					while($row = $resultSet->fetch(PDO::FETCH_OBJ)){
  						
  					// construo o objeto com email e senha
  					$categoria = New Categoria();
  					$categoria->setIdCategoria($row->id_categoria);
						$categoria->setNomeCategoria($row->nomeCategoria);
						$categoria->setImagem($row->imagem);

						array_push($arrCategorias, $categoria);

				  }
        }       
      }

      return $arrCategorias;

    	}
    	catch (Exception $e) {
    		Util::alerta($e->getMessage());
    	}

	}



	public function buscarForuns($idCategoria){

		$arrForums = [];

		try {

			$con = new PDO("mysql:host=localhost;dbname=forum", "root", "");

    		$resultSet = $con->prepare("select nomeForum, id_forum from forum.tb_forums where tb_categorias_id_categoria = ?");
    		$resultSet->bindParam(1, $idCategoria);

			if($resultSet->execute()){ // executa o select
				if($resultSet->rowCount() > 0){ // consulta retornou mais que 1 registro
					while($row = $resultSet->fetch(PDO::FETCH_OBJ)){
  						
  						// construo o objeto com email e senha
  						$forum = New Forum();
  						$forum->setNomeForum($row->nomeForum);
              $forum->setIdForum($row->id_forum);

						array_push($arrForums, $forum);

				}
            }       
        }

        return $arrForums;

    	}
    	catch (Exception $e) {
    		Util::alerta($e->getMessage());
    	}

	}

  public function inserirTopicoForum($idCategoria, $nomeCategoria){

    $retorno = 0;

    try {


        $con = new PDO("mysql:host=localhost;dbname=forum;charset=utf8", "root", "");
        $stmt = $con->prepare("INSERT INTO TB_FORUMS(tb_categorias_id_categoria, nomeForum)VALUES(?,?)");

        $stmt->bindParam(1, $idCategoria);
        $stmt->bindParam(2, $nomeCategoria);
        $stmt->execute();


        Util::alerta("Topico criado");
        Util::voltarDois();
      
      

      }
      catch (Exception $e) {
        Util::alerta($e->getMessage());
      }

  }

}

?>