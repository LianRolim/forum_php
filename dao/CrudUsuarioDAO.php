<?php

final class CrudUsuarioDAO{

	// criação do novo usuário no forum - recebe um objeto usuario
	public function inserir($usuario){

		try {

    		$con = new PDO("mysql:host=localhost;dbname=forum", "root", "");
			$stmt = $con->prepare("INSERT INTO tb_usuario(nome,
		                                              	  email,
		                                             	  nickname,
		                                              	  senha, 
		                                             	  dataNascimento,
		                                            	  sexo,
		                                            	  foto,
		                                            	  dataRegistro,
		                                            	  perfil) 
		                                       	  VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)");

			$stmt->bindParam(1, $usuario->getNome());
			$stmt->bindParam(2, $usuario->getEmail());
			$stmt->bindParam(3, $usuario->getNickName());
			$stmt->bindParam(4, $usuario->getSenha());
			$stmt->bindParam(5, $usuario->getDataNascimento());
			$stmt->bindParam(6, $usuario->getSexo());
			$stmt->bindParam(7, $usuario->getFoto());
			$stmt->bindParam(8, date ("Y-m-d"));
			$stmt->bindParam(9, $usuario->getPerfil());
			$stmt->execute();
			

			Util::alerta("Obrigado por se cadastrar ". $usuario->getNickName() );
			Util::voltar();

    	}
    	catch (Exception $e) {
    		Util::alerta($e->getMessage());
    	}

	}

	// consulta de um usuário existente -- retorna um objeto com os dados do usuario da tabela tb_usuario
	public function consultarLogin($email){

		try {

			$con = new PDO("mysql:host=localhost;dbname=forum", "root", "");

    		$resultSet = $con->prepare("SELECT id_usuario, 
    										   nome,
    										   email,
    										   nickname,
    										   senha,
    										   perfil,
    										   date_format(dataNascimento, '%d/%m/%Y') as dataNascimento,
    										   assinatura,
    										   sexo,
    										   banido,
    										   biografia,
    										   localizacao,
    										   interesse,
    										   ocupacao,
    										   facebook,
    										   linkedin,
    										   twitter,
    										   foto
    									  FROM tb_usuario 
    								     WHERE email = ?");

			$resultSet->bindParam(1, $email); // parametro bind se quizesse utilizar like seria  // $resultSet->bindParam(1, $nome . “%”);

			if($resultSet->execute()){ // executa o select
				if($resultSet->rowCount() > 0){ // consulta retornou mais que 1 registro
					while($row = $resultSet->fetch(PDO::FETCH_OBJ)){
  						
  						// construo o objeto com email e senha
  						$usuario = New Usuario();
  						$usuario->setIdUsuario($row->id_usuario);
  						$usuario->setNome($row->nome);
						$usuario->setEmail($row->email);
						$usuario->setNickName($row->nickname);
						$usuario->setSenha($row->senha);
						$usuario->setPerfil($row->perfil);
						$usuario->setDataNascimento($row->dataNascimento);
						$usuario->setAssinatura($row->assinatura);
						$usuario->setSexo($row->sexo);
						$usuario->setBanido($row->banico);
						$usuario->setBiografia($row->biografia);
						$usuario->setLocalizacao($row->localizacao);
						$usuario->setInteresse($row->interesse);
						$usuario->setOcupacao($row->ocupacao);
						$usuario->setFacebook($row->facebook);
						$usuario->setLinkedin($row->linkedin);
						$usuario->setTwitter($row->twitter);
						$usuario->setFoto($row->foto);

				}
            }       
        }

        return $usuario;

    	}
    	catch (Exception $e) {
    		Util::alerta($e->getMessage());
    	}

	}

	// metodo para alterar o usuario
	public function alterarUsuario($objUsuario){

		try {

    		$con = new PDO("mysql:host=localhost;dbname=forum", "root", "");
			$stmt = $con->prepare("UPDATE tb_usuario 
				                      SET  nome = ?,
    									   email = ?,
    									   nickname = ?,
    									   senha = ?,
    									   perfil = ?,
    									   dataNascimento = ?,
    									   assinatura = ?,
    									   sexo = ?,
    									   banido = ?,
    									   biografia = ?,
    									   localizacao = ?,
    									   interesse = ?,
    									   ocupacao = ?,
   										   facebook = ?,
   										   linkedin = ?,
   										   twitter = ?,
   										   foto = ?
    								 WHERE id_usuario = ?");
			
			$stmt->bindParam(1, $objUsuario->getNome() );
			$stmt->bindParam(2, $objUsuario->getEmail() );
			$stmt->bindParam(3, $objUsuario->getNickName() );
			$stmt->bindParam(4, $objUsuario->getSenha() );
			$stmt->bindParam(5, $objUsuario->getPerfil() );
			$stmt->bindParam(6, $objUsuario->getDataNascimento() );
			$stmt->bindParam(7, $objUsuario->getAssinatura() );
			$stmt->bindParam(8, $objUsuario->getSexo() );
			$stmt->bindParam(9, $objUsuario->getBanido() );
			$stmt->bindParam(10, $objUsuario->getBiografia() );
			$stmt->bindParam(11, $objUsuario->getLocalizacao() );
			$stmt->bindParam(12, $objUsuario->getInteresse() );
			$stmt->bindParam(13, $objUsuario->getOcupacao() );
			$stmt->bindParam(14, $objUsuario->getFacebook() );
			$stmt->bindParam(15, $objUsuario->getLinkedin() );
			$stmt->bindParam(16, $objUsuario->getTwitter() );
			$stmt->bindParam(17, $objUsuario->getFoto() );
			$stmt->bindParam(18, $objUsuario->getIdUsuario() );
			$stmt->execute();

			Util::alerta(" Alterações realizadas com sucesso ");
			Util::voltar();

    	}
    	catch (Exception $e) {
    		Util::alerta($e->getMessage());
    	}

	}

	// retorna um array de objetos com todos os usuarios cadastrados no sistema
	public function buscaUsuarios(){

		$arrUsuarios = [];

		try {


			$con = new PDO("mysql:host=localhost;dbname=forum", "root", "");

    		$resultSet = $con->prepare("SELECT id_usuario, 
    										   nome,
    										   email,
    										   nickname,
    										   senha,
    										   perfil,
    										   date_format(dataNascimento, '%d/%m/%Y') as dataNascimento,
    										   assinatura,
    										   sexo,
    										   banido,
    										   biografia,
    										   localizacao,
    										   interesse,
    										   ocupacao,
    										   facebook,
    										   linkedin,
    										   twitter,
    										   foto
    									  FROM tb_usuario");

			if($resultSet->execute()){ // executa o select
				if($resultSet->rowCount() > 0){ // consulta retornou mais que 1 registro
					while($row = $resultSet->fetch(PDO::FETCH_OBJ)){
  						
  						// construo o objeto com email e senha
  						$userBanir = New Usuario();
  						$userBanir->setIdUsuario($row->id_usuario);
  						$userBanir->setNome($row->nome);
						$userBanir->setEmail($row->email);
						$userBanir->setNickName($row->nickname);
						$userBanir->setSenha($row->senha);
						$userBanir->setPerfil($row->perfil);
						$userBanir->setDataNascimento($row->dataNascimento);
						$userBanir->setAssinatura($row->assinatura);
						$userBanir->setSexo($row->sexo);
						$userBanir->setBanido($row->banido);
						$userBanir->setBiografia($row->biografia);
						$userBanir->setLocalizacao($row->localizacao);
						$userBanir->setInteresse($row->interesse);
						$userBanir->setOcupacao($row->ocupacao);
						$userBanir->setFacebook($row->facebook);
						$userBanir->setLinkedin($row->linkedin);
						$userBanir->setTwitter($row->twitter);
						$userBanir->setFoto($row->foto);

						array_push($arrUsuarios, $userBanir);

				}
            }       
        }

        return $arrUsuarios;

    	}
    	catch (Exception $e) {
    		Util::alerta($e->getMessage());
    	}

	}


	// bane um usuario do sistema ou ativa o mesmo conforme a acao...
	public function banirAtivar($idUser, $acao){

		try {

    		
    		$con = new PDO("mysql:host=localhost;dbname=forum", "root", "");
			
    		if($acao == "ATIVO"){

    			$stmt = $con->prepare("UPDATE tb_usuario 
				                      	  SET  banido = 'BANIDO'
    								 	WHERE id_usuario = ?");
			
				$stmt->bindParam(1, $idUser );
				$stmt->execute();

				Util::alerta(" Usuario banido ");
				Util::voltar();

    		}else{

    			$stmt = $con->prepare("UPDATE tb_usuario 
				                      	  SET  banido = 'ATIVO'
    								 	WHERE id_usuario = ?");
			
				$stmt->bindParam(1, $idUser );
				$stmt->execute();

				Util::alerta(" Usuário ativo novamente ");
				Util::voltar();

    		}
			

    	}
    	catch (Exception $e) {
    		Util::alerta($e->getMessage());
    	}

	}


	public function consultarDadosUsuario($idUsuario){

		try {

			$con = new PDO("mysql:host=localhost;dbname=forum", "root", "");

    		$resultSet = $con->prepare("SELECT id_usuario, 
    										   nome,
    										   email,
    										   nickname,
    										   senha,
    										   perfil,
    										   date_format(dataNascimento, '%d/%m/%Y') as dataNascimento,
    										   assinatura,
    										   sexo,
    										   banido,
    										   biografia,
    										   localizacao,
    										   interesse,
    										   ocupacao,
    										   facebook,
    										   linkedin,
    										   twitter,
    										   foto
    									  FROM tb_usuario 
    								     WHERE id_usuario = ?");

			$resultSet->bindParam(1, $idUsuario); // parametro bind se quizesse utilizar like seria  // $resultSet->bindParam(1, $nome . “%”);

			if($resultSet->execute()){ // executa o select
				if($resultSet->rowCount() > 0){ // consulta retornou mais que 1 registro
					while($row = $resultSet->fetch(PDO::FETCH_OBJ)){
  						
  						// construo o objeto com email e senha
  						$usuario = New Usuario();
  						$usuario->setIdUsuario($row->id_usuario);
  						$usuario->setNome($row->nome);
						$usuario->setEmail($row->email);
						$usuario->setNickName($row->nickname);
						$usuario->setSenha($row->senha);
						$usuario->setPerfil($row->perfil);
						$usuario->setDataNascimento($row->dataNascimento);
						$usuario->setAssinatura($row->assinatura);
						$usuario->setSexo($row->sexo);
						$usuario->setBanido($row->banido);
						$usuario->setBiografia($row->biografia);
						$usuario->setLocalizacao($row->localizacao);
						$usuario->setInteresse($row->interesse);
						$usuario->setOcupacao($row->ocupacao);
						$usuario->setFacebook($row->facebook);
						$usuario->setLinkedin($row->linkedin);
						$usuario->setTwitter($row->twitter);
						$usuario->setFoto($row->foto);

				}
            }       
        }

        return $usuario;

    	}
    	catch (Exception $e) {
    		Util::alerta($e->getMessage());
    	}

	}

}


?>