<?php

final class CrudPostsDAO{

	// consulta de um post para montar a tela da postagem a partir destes dados
	public function consultarPost($idPost){

		try {
      
			$con = new PDO("mysql:host=localhost;dbname=forum;charset=utf8", "root", "");

    		$resultSet = $con->prepare("SELECT pos.nomePost,
       										   pos.descricao,
       										   date_format(pos.dataPost, '%d/%m/%Y') as dataPost,
       										   usu.nickname,
       										   usu.nome,
       										   usu.perfil,
       										   usu.foto,
       										   usu.assinatura,
       										   date_format(usu.dataRegistro, '%d/%m/%Y') as dataRegistro,
       										   usu.id_usuario,
                             pos.id_post
  										  FROM tb_posts pos, 
	   										     tb_usuario usu
 										   WHERE pos.tb_usuario_id_usuario = usu.id_usuario
   										   AND pos.tb_topicos_id_topico = ?" );

			$resultSet->bindParam(1, $idPost); // parametro bind se quizesse utilizar like seria  // $resultSet->bindParam(1, $nome . “%”);

			if($resultSet->execute()){ // executa o select
				if($resultSet->rowCount() > 0){ // consulta retornou mais que 1 registro
					while($row = $resultSet->fetch(PDO::FETCH_OBJ)){
  						
  					$postagem = New Postagem();
  					$postagem->setNomePost($row->nomePost);
  					$postagem->setDescricao($row->descricao);
						$postagem->setDataPost($row->dataPost);
						$postagem->setNickName($row->nickname);
						$postagem->setNome($row->nome);
						$postagem->setPerfil($row->perfil);
						$postagem->setAssinatura($row->assinatura);
						$postagem->setDataRegistro($row->dataRegistro);
						$postagem->setIdUsuario($row->id_usuario);
						if(empty($row->foto)){
							$postagem->setFoto('./imagens/usuarios/alien.png');
						}else{
						   $postagem->setFoto($row->foto);
						}
            $postagem->setIdPost($row->id_post);

					}
        }       
      }
      
      return $postagem;

    	} 
    	catch (Exception $e) {
    		Util::alerta($e->getMessage());
    	}

	}

	public function buscaQuantPostsPorUsuario($idUsuario){

		$quantidadePosts = 0;

		try {

			$con = new PDO("mysql:host=localhost;dbname=forum;charset=utf8", "root", "");

    	$resultSet = $con->prepare("SELECT count(1) as quant FROM tb_posts where tb_usuario_id_usuario = ?" );

			$resultSet->bindParam(1, $idUsuario); // parametro bind se quizesse utilizar like seria  // $resultSet->bindParam(1, $nome . “%”);

			if($resultSet->execute()){ // executa o select
				if($resultSet->rowCount() > 0){ // consulta retornou mais que 1 registro
					while($row = $resultSet->fetch(PDO::FETCH_OBJ)){
  						
  						$quantidadePosts = $row->quant;

					}
        }       
      }

      return $quantidadePosts;
    	
      }
    	catch (Exception $e) {
    		Util::alerta($e->getMessage());
    	}

	}

	public function consultarMsgsPost($idPost){

		$arrMensagens = [];

		try {

			$con = new PDO("mysql:host=localhost;dbname=forum;charset=utf8", "root", "");

    		$resultSet = $con->prepare("SELECT men.descricao,
       								                     date_format(men.dataHora, '%d/%m/%Y') as dataHora,
       										                 usu.nome,
       										                 usu.nickname,
       										                 usu.perfil,
       										                 usu.foto,
       										                 usu.assinatura,
       										                 date_format(usu.dataRegistro, '%d/%m/%Y') as dataRegistro,
       										                 (select count(1) from tb_posts where tb_usuario_id_usuario = usu.id_usuario) as quantPosts
  									                  FROM tb_posts pos,
	   										                   tb_mensagens men,
       										                 tb_usuario usu
 									                   WHERE pos.id_post = men.tb_posts_id_post
   										                 AND usu.id_usuario = men.tb_usuario_id_usuario
   										                 AND pos.tb_topicos_id_topico = ?
                                    ORDER BY men.id_mensagem, men.dataHora DESC" );

			$resultSet->bindParam(1, $idPost); // parametro bind se quizesse utilizar like seria  // $resultSet->bindParam(1, $nome . “%”);

			if($resultSet->execute()){ // executa o select
				if($resultSet->rowCount() > 0){ // consulta retornou mais que 1 registro
					while($row = $resultSet->fetch(PDO::FETCH_OBJ)){
  					
  					$mensagemPost = New MensagemPost();
  					$mensagemPost->setDescricao($row->descricao);
  					$mensagemPost->setDataHora($row->dataHora);
						$mensagemPost->setNome($row->nome);
						$mensagemPost->setNick($row->nickname);
						$mensagemPost->setPerfil($row->perfil);
						if(empty($row->foto) || $row->foto == null || $row->foto == ""){
							$mensagemPost->setFoto('./imagens/usuarios/alien.png');
						}else{
							$mensagemPost->setFoto($row->foto);
						}
						$mensagemPost->setFoto($row->foto);
						$mensagemPost->setAssinatura($row->assinatura);
						$mensagemPost->setDataRegistro($row->dataRegistro);
						$mensagemPost->setQuantPosts($row->quantPosts);

						array_push($arrMensagens, $mensagemPost);


					}
        }       
      }
      
      return $arrMensagens;
    	
      }
    	catch (Exception $e) {
    		Util::alerta($e->getMessage());
    	}

	}

  // insere um novo post...
  public function inserirPost($arrDadosPost){

    try {

      $con = new PDO("mysql:host=localhost;dbname=forum;charset=utf8", "root", "");
      $stmt = $con->prepare("INSERT INTO tb_posts(tb_usuario_id_usuario, tb_topicos_id_topico, nomePost, descricao, dataPost)
                                  VALUES (?, ?, ?, ?, ?)");

      $stmt->bindParam(1, $arrDadosPost[4]);
      $stmt->bindParam(2, $arrDadosPost[5]);
      $stmt->bindParam(3, $arrDadosPost[2]);
      $stmt->bindParam(4, $arrDadosPost[3]);
      $stmt->bindParam(5, date ("Y-m-d"));
      $stmt->execute();
      
      Util::alerta("Post cadastrado com sucesso ");
      Util::voltarDois();

      }
      catch (Exception $e) {
        Util::alerta($e->getMessage());
      }

  }


  public function carregaPostsInicial(){

    $arrPosts = [];

    try {
      
      $con = new PDO("mysql:host=localhost;dbname=forum;charset=utf8", "root", "");

        $resultSet = $con->prepare("SELECT pos.nomePost,
                                           substr(pos.descricao,1,200) as descricao,
                                           pos.dataPost,
                                           usu.nome,
                                           usu.perfil,
                                           usu.foto,
                                           pos.tb_topicos_id_topico
                                      FROM tb_posts pos, 
                                           tb_usuario usu
                                     WHERE pos.tb_usuario_id_usuario = usu.id_usuario
                                     ORDER BY pos.dataPost DESC
                                     LIMIT 9");

      if($resultSet->execute()){ // executa o select
        if($resultSet->rowCount() > 0){ // consulta retornou mais que 1 registro
          while($row = $resultSet->fetch(PDO::FETCH_OBJ)){
              
            $postagem = New Postagem();
            $postagem->setNomePost($row->nomePost);
            $postagem->setDescricao($row->descricao);
            $postagem->setDataPost($row->dataPost);
            $postagem->setNome($row->nome);
            $postagem->setPerfil($row->perfil);
            if(empty($row->foto)){
              $postagem->setFoto('./imagens/usuarios/alien.png');
            }else{
               $postagem->setFoto($row->foto);
            }
            $postagem->setIdPost($row->tb_topicos_id_topico);

            array_push($arrPosts, $postagem);

          }
        }       
      }
      
      return $arrPosts;

      } 
      catch (Exception $e) {
        Util::alerta($e->getMessage());
      }

  }

  public function carregaPostsUsuario($idUsu){

    $arrPosts = [];

    try {
      
      $con = new PDO("mysql:host=localhost;dbname=forum;charset=utf8", "root", "");

        $resultSet = $con->prepare("SELECT pos.nomePost,
                                           substr(pos.descricao,1,200) as descricao,
                                           pos.dataPost,
                                           usu.nome,
                                           usu.perfil,
                                           usu.foto,
                                           pos.tb_topicos_id_topico
                                      FROM tb_posts pos, 
                                           tb_usuario usu
                                     WHERE pos.tb_usuario_id_usuario = usu.id_usuario
                                       AND usu.id_usuario = ?
                                     ORDER BY pos.dataPost DESC
                                     ");

      $resultSet->bindParam(1, $idUsu);

      if($resultSet->execute()){ // executa o select
        if($resultSet->rowCount() > 0){ // consulta retornou mais que 1 registro
          while($row = $resultSet->fetch(PDO::FETCH_OBJ)){
              
            $postagem = New Postagem();
            $postagem->setNomePost($row->nomePost);
            $postagem->setDescricao($row->descricao);
            $postagem->setDataPost($row->dataPost);
            $postagem->setNome($row->nome);
            $postagem->setPerfil($row->perfil);
            if(empty($row->setFoto)){
              $postagem->setFoto('./imagens/usuarios/alien.png');
            }else{
               $postagem->setFoto($row->foto);
            }
            $postagem->setIdPost($row->tb_topicos_id_topico);

            array_push($arrPosts, $postagem);

          }
        }       
      }
      
      return $arrPosts;

      } 
      catch (Exception $e) {
        Util::alerta($e->getMessage());
      }

  }

}


?>