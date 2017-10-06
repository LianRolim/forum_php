<?php
  // usuario ja esta na sessao apenas pego o ID
  $usuario = unserialize($_SESSION["usuario"]);

  // pego os dados do formulario
  $nome          = $_POST['nome'];
  $email         = $_POST['email'];
  $nickname      = $_POST['nickname'];
  $localizacao   = $_POST['localizacao'];
  $interesse     = $_POST['interesse'];
  $ocupacao      = $_POST['ocupacao'];
  $dataNasc      = $_POST['dataNasc'];
  $facebook      = $_POST['facebook'];
  $linkedin      = $_POST['linkedin'];
  $twitter       = $_POST['twitter'];
  $biografia     = $_POST['biografia'];
  $sexo          = $_POST['sexo'];
  $foto          = $_POST['foto'];
  $assinatura    = $_POST['assinatura'];

  // testo o formulario
  if ($nome == ""){

     Util::alerta("Nome deve ser preenchido");
	   Util::voltar();

  }else if ($email == ""){

    Util::alerta("Email deve ser preenchido");
    Util::voltar();

  }else if ($nickname == ""){

  	Util::alerta("Defina seu nickName");
	  Util::voltar();

  }else if ($sexo == ""){

  	Util::alerta("Sexo deve ser marcado");
	  Util::voltar();

  }else if ($dataNasc == ""){

  	Util::alerta("Data de nascimento deve ser preenchida");
	  Util::voltar();

  }

  $novoNome = "";

  // mover a assinatura e a foto do perfil se tiver setado...
  if ( isset( $_FILES[ 'foto' ][ 'name' ] ) && $_FILES[ 'foto' ][ 'error' ] == 0 ) {
 
    $arquivo_tmp = $_FILES[ 'foto' ][ 'tmp_name' ];
    $nomeFoto = $_FILES[ 'foto' ][ 'name' ];
 
    // Pega a extensão
    $extensao = pathinfo ( $nomeFoto, PATHINFO_EXTENSION );
 
    // Converte a extensão para minúsculo
    $extensao = strtolower ( $extensao );
 
    // Somente imagens, .jpg;.jpeg;.gif;.png
    // Aqui eu enfileiro as extensões permitidas e separo por ';'
    // Isso serve apenas para eu poder pesquisar dentro desta String
    if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {
        // Cria um nome único para esta imagem
        // Evita que duplique as imagens no servidor.
        // Evita nomes com acentos, espaços e caracteres não alfanuméricos
        $novoNome = $usuario->getIdUsuario().'.'.$extensao;
 
        // Concatena a pasta com o nome
        $destino = 'imagens/usuarios/' . $novoNome;

        // tenta mover o arquivo para o destino
        if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {
            echo 'Arquivo salvo com sucesso';
        }
    }
  }

  // move assinatura se existir assinatura importada...
  if ( isset( $_FILES[ 'assinatura' ][ 'name' ] ) && $_FILES[ 'assinatura' ][ 'error' ] == 0 ) {
 
    $arquivo_tmp = $_FILES[ 'assinatura' ][ 'tmp_name' ];
    $nomeSign = $_FILES[ 'assinatura' ][ 'name' ];
 
    // Pega a extensão
    $extensao = pathinfo ( $nomeSign, PATHINFO_EXTENSION );
 
    // Converte a extensão para minúsculo
    $extensao = strtolower ( $extensao );
 
    // Somente imagens, .jpg;.jpeg;.gif;.png
    // Aqui eu enfileiro as extensões permitidas e separo por ';'
    // Isso serve apenas para eu poder pesquisar dentro desta String
    if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {
        // Cria um nome único para esta imagem
        // Evita que duplique as imagens no servidor.
        // Evita nomes com acentos, espaços e caracteres não alfanuméricos
        $novoNome = $usuario->getIdUsuario().'.'.$extensao;
 
        // Concatena a pasta com o nome
        $destinoSign = 'imagens/assinaturas/' . $novoNome;

        // tenta mover o arquivo para o destino
        if ( @move_uploaded_file ( $arquivo_tmp, $destinoSign ) ) {
            echo 'Arquivo salvo com sucesso';
        }
    }
  }

  // construo o objeto usuario
  $user = New Usuario();

  $user->setNome($nome);
  $user->setNickName($nickname);
  $user->setEmail($email);
  $user->setSenha($usuario->getSenha());
  if($sexo == "Masculino"){
     $user->setSexo("M");
  }else if($sexo = "Feminino"){
     $user->setSexo("F");
  }
  $user->setDataNascimento($dataNasc);
  $user->setPerfil($usuario->getPerfil());
  if($destinoSign == "" || empty($destinoSign)){
     $user->setAssinatura($usuario->getAssinatura());
  }else{
     $user->setAssinatura($destinoSign);
  }
  $user->setBanido($usuario->getBanido());
  $user->setBiografia($biografia);
  $user->setLocalizacao($localizacao);
  $user->setInteresse($interesse);
  $user->setOcupacao($ocupacao);
  $user->setFacebook($facebook);
  $user->setLinkedin($linkedin);
  $user->setTwitter($twitter);
  
  if($destino  == "" || empty($destino )){
     $user->setFoto($usuario->getFoto());
  }else{
     $user->setFoto($destino);
  }
  
  $user->setIdUsuario($usuario->getIdUsuario());

  CrudUsuarioDAO::alterarUsuario($user);
  
  $_SESSION["usuario"] = serialize($user);

?>