<?php

	$arrCategorias = [];

	$arrCategorias = CrudForunsDAO::buscarCategorias();

    foreach ($arrCategorias as $categoria) {
    	
    	$panel = "<div class=\"row\">
                     <div class=\"col-lg-12\">
                        <div class = \"panel panel-danger\">
                        <div class = \"panel-heading\">
                        <img src=\" ". $categoria->getImagem() ." \" width = \"30px\"/>  <b>". $categoria->getNomeCategoria() ."</b></div>
                        <div class = \"panel-body\">
                  ";

        $arrForums = CrudForunsDAO::buscarForuns($categoria->getIdCategoria());

        if(!empty($arrForums)){
        foreach ($arrForums as $forums) {
    
           $panel .= "<a href=\"./?a=topicos&idForum=". $forums->getIdForum() ."&nomeForum=". $forums->getNomeForum() ." \" class=\"btn btn-link\" role=\"button\">". $forums->getNomeForum() ."</a><br />";
            
        }
        }else{
            $panel .= "<a href=\"./?a=cadastrar_topico&idCategoria=". $categoria->getIdCategoria() ."&nomeCat=". $categoria->getNomeCategoria() ." \" class=\"btn btn-link\" role=\"button\">Criar Tópico</a><br />";
        }

        $panel .= "</div></div></div></div>";

        echo $panel;

        $panel = "";

	}


?>
