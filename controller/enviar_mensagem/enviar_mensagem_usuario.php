<?php
  // pego os dados do formulario
  
  $mensagem = $_POST['mensagem'];
  
  if(empty($mensagem)){

  	Util::alerta("Você não pode enviar uma mensagem em branco");
	Util::voltar();

  }else{

    CrudMensagemUsersDAO::inserir($usuario->getIdUsuario(), $_SESSION["respMensagem"], $mensagem);
    
    unset($_SESSION['respMensagem']);
  }

?>