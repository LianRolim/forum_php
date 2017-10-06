<?php
  
  // pego os dados do formulario
  $nickName = $_POST['nickName'];
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $senha = $_POST['senha'];
  $confSenha = $_POST['confSenha'];
  $sexo = $_POST['sexo'];
  $dataNascimento = $_POST['dataNasc'];
  
  // testo o formulario
  if ($nome == ""){

     Util::alerta("Nome deve ser preenchido");
	   Util::voltar();

  }else if ($email == ""){

    Util::alerta("Email deve ser preenchido");
    Util::voltar();

  }else if ($nickName == ""){

  	Util::alerta("Defina seu nickName");
	  Util::voltar();

  }else if ($senha == ""){

  	Util::alerta("Senha deve ser preenchida");
	  Util::voltar();

  }else if ($confSenha == ""){

  	Util::alerta("Campo de conferência de senha deve ser preenchido");
	  Util::voltar();

  }else if ($sexo == ""){

  	Util::alerta("Sexo deve ser marcado");
	  Util::voltar();

  }else if ($dataNascimento == ""){

  	Util::alerta("Data de nascimento deve ser preenchida");
	  Util::voltar();

  }else if ($senha <> $confSenha){

  	Util::alerta("Senhas não coincidem");
	  Util::voltar();

  }else{

    // construo o objeto usuario
    $user = New Usuario();

    $user->setNickName($nickName);
    $user->setNome($nome);
    $user->setEmail($email);
    $user->setSenha($senha);
    if($sexo == "Masculino"){
       $user->setSexo("M");
    }else if($sexo = "Feminino"){
       $user->setSexo("F");
    }
    $user->setDataNascimento($dataNascimento);
    $user->setFoto("./imagens/usuarios/alien.png");
    $user->setPerfil("USUARIO");
    
    CrudUsuarioDAO::inserir($user);
  
  }

?>