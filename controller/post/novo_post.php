<?php

  $idForum = $_GET['idForum'];

  $nomePost = $_POST['nomePost'];
  $breveDescricao = $_POST['breveDescricao'];
  $descricaoCompleta = $_POST['descriCompleta'];


  if (empty($nomePost) || $nomePost == ""){

     Util::alerta("Nome da publicação deve ser preenchido");
     Util::voltar();

  }else if ( empty($breveDescricao) || $breveDescricao == ""){

    Util::alerta("Você deve preencher o campo Breve Descrição");
    Util::voltar();

  }else if (empty($descricaoCompleta) || $descricaoCompleta == ""){

    Util::alerta("Você precisa preencher a descrição completa");
    Util::voltar();

  }else if ( strlen($breveDescricao) > 50 ){

    Util::alerta("A breve descrição ultrapassa 50 caracteres, por favor diminua!");
    Util::voltar();

  }else{

    

    $arrDadosTopico = [ $idForum, 
                        $nomePost,
                        $breveDescricao,
                        $descricaoCompleta,
                        $usuario->getIdUsuario()
                      ];

    $idTopico = CrudTopicosDAO::inserirTopico($arrDadosTopico);
    if($idTopico > 0){
       array_push($arrDadosTopico, $idTopico);
       CrudPostsDAO::inserirPost($arrDadosTopico);
    }

  }

?>