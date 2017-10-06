<?php

  function carregaPost($idPost){

     $buscaPost = CrudPostsDAO::consultarPost($idPost);

     return $buscaPost;
  }

  function buscaMensagens($idPost){

     $dadosMensagens = CrudPostsDAO::consultarMsgsPost($idPost);

     return $dadosMensagens;
  }

  //retorna a quantidade de postagens de um usuario
  function buscaQuantPosts($idUsuario){

     $quantPosts = CrudPostsDAO::buscaQuantPostsPorUsuario($idUsuario);

     return $quantPosts;
  }

?>