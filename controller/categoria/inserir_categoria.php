<?php
  
  // pego os dados do formulario
  $nomeCat = $_POST['nomeCat'];
  $nomeImagem = $_POST['img'];

  // testo o formulario

  if (empty($nomeCat) || $nomeCat == ""){

     Util::alerta("Nome da categoria deve ser informado");
	   Util::voltar();

  }else{

     // construo o objeto usuario
     $categoria = New Categoria();

     if(empty($nomeImagem) || $nomeImagem = ""){
        $categoria->setImagem("imagens/categorias/alien.png");
     }else{
        
        $categoria->setImagem($_POST['img']);
     }

     $categoria->setNomeCategoria($nomeCat);
     CrudCategoriaDAO::inserirCategoria($categoria);

  }
?>