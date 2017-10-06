<?php
  
  // pego os dados do login
  $email = $_POST['email'];
  $senha = $_POST['senha'];
  
  
  // testo o formulario
  if ($email == ""){

     Util::alerta("Email não preenchido");
	   Util::voltar();

  }else if ($senha == ""){

    Util::alerta("Senha não preenchida");
    Util::voltar();

  }else{

     $usuario = CrudUsuarioDAO::consultarLogin($email);

     if ($senha == $usuario->getSenha() and $email == $usuario->getEmail()){

        session_start();
        $_SESSION['usuario'] = serialize($usuario);
        Util::alerta("Bem vindo ao Alien Cheats ". $usuario->getNickName());
        Util::redireciona("inicio");
        $usuario = "";
        
     }else{
        Util::alerta("Usuário ou senha inválidos, tente novamente!");
        Util::voltar();
     }


     
  }
  
  
  

?>