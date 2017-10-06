<div class ="text-center"> 
   <img src="imagens/atividades.png" width = "150px" class="img-responsive" style="margin:0 auto;" />
   <h3> Atividades recentes </h3><br />
</div>

<div class="list-group">
<?php
  
  $usuario = unserialize($_SESSION["usuario"]);

  $arrAtividades = CrudPostsDAO::carregaPostsUsuario($usuario->getIdUsuario());

	if(!empty($arrAtividades)){

	   foreach ($arrAtividades as $atividade){
    
        
          $lista = "<a href=\"./?a=post&idPost=". $atividade->getIdPost() ."\" class=\"list-group-item list-group-item-action flex-column align-items-start\">
                <div class=\"d-flex w-100 justify-content-between\">
                     <h5 class=\"mb-1\"><b>". $atividade->getNomePost() ."</b></h5>
               </div>
                   <p class=\"mb-1\">". $atividade->getDescricao() ."</p>
              </a>";
    
          echo $lista;

          $lista = "";        
        
       }
	}else{
    echo "Você ainda não possui nenhuma atividade";
  }
?>
</div>
