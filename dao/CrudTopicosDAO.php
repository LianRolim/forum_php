<?php

final class CrudTopicosDAO{

	// retorna um array com a lista de tópicos para o fórum solicitado
	public function consultarTopicos($idForum){

		$arrTopicos = [];

		try {

			$con = new PDO("mysql:host=localhost;dbname=forum;charset=utf8", "root", "");
			

    		$resultSet = $con->prepare("SELECT id_topico, 
	   										   nomeTopico, 
       										   date_format(dataCriacao, '%d/%m/%Y') as dataCriacao,
       										   ultimaPostagem,
       										   descricaoTopico,
       										   lpad(DATE_FORMAT(SYSDATE(), '%d') - date_format(dataCriacao, '%d'),2,0) as quantDias,
       										   tb_forums_id_forum
  										  FROM tb_topicos 
  										 WHERE tb_forums_id_forum = ? ");

			$resultSet->bindParam(1, $idForum); 

			if($resultSet->execute()){ 
				if($resultSet->rowCount() > 0){
					while($row = $resultSet->fetch(PDO::FETCH_OBJ)){
  						
  						// construo o objeto topico
  						$topico = New Topico();
  						$topico->setIdTopico($row->id_topico);
						$topico->setNomeTopico($row->nomeTopico);
						$topico->setDataCriacao($row->dataCriacao);
						$topico->setUltimaPostagem($row->ultimaPostagem);
						$topico->setDescricaoTopico($row->descricaoTopico);
						$topico->setQuantDias($row->quantDias);

						array_push($arrTopicos, $topico);
				}
            }       
        }

        return $arrTopicos;

    	}
    	catch (Exception $e) {
    		Util::alerta($e->getMessage());
    	}

	}



	// insere um novo tópico na base de dados...
	public function inserirTopico($arrDadosTopico){

		$retorno = 0;

		try {


    		$con = new PDO("mysql:host=localhost;dbname=forum;charset=utf8", "root", "");
			$stmt = $con->prepare("INSERT INTO tb_topicos(tb_forums_id_forum,
					   									  nomeTopico,
                      	 								  dataCriacao,
                       									  descricaoTopico)
				 								   VALUES(?, ?, ?, ?)");

			$stmt->bindParam(1, $arrDadosTopico[0]);
			$stmt->bindParam(2, $arrDadosTopico[1]);
			$stmt->bindParam (3,  date("Y-m-d"));
			$stmt->bindParam(4, $arrDadosTopico[2]);
			$stmt->execute();

			$retorno = $con->lastInsertId();

			return $retorno;
			
			

    	}
    	catch (Exception $e) {
    		Util::alerta($e->getMessage());
    	}

	}

}

?>