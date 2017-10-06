<?php

  $idCategoria = $_GET['idCategoria'];
  $nomeTopico = $_POST['nomeTop']; 

  if (empty($idCategoria) || $idCategoria == ""){

     Util::voltar();

  }else if ( empty($nomeTopico) || $nomeTopico == ""){

    Util::alerta("Nome da categoria deve ser informado");
    Util::voltar();

  }else{

    CrudForunsDAO::inserirTopicoForum($idCategoria,$nomeTopico);

  }

?>