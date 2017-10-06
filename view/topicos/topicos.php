<?php
   $idForum = $_GET['idForum'];
   $nomeForum = $_GET['nomeForum'];
?>
<?php if(isset($_SESSION["usuario"])){ ?>
<div class="panel panel-danger">
      <div class="panel-heading">Crie um novo post em <?php echo $nomeForum ?></div>
         <div class="panel-body">
            <div class ="text-center">
            <h6 text-color: red; >Não perca tempo, compartilhe conhecimento com a comunidade, ou tire suas dúvidas criando um novo post agora mesmo! </h6>
            <?php echo "<a href=\"./?a=novo_post&idForum=".$idForum."&nomeForum=".$nomeForum."\" class=\"btn btn-danger btn-md\" role=\"button\">Novo Post</a>"; ?>
            </div>
         </div>
   </div>
<br />
<?php } ?>
<div class ="text-center"> 
   <h3>Tópicos de <?php echo $nomeForum ?></h3><br />
</div>

<div class="list-group">
<?php

	$arrTopicos = [];

	$arrTopicos = CrudTopicosDAO::consultarTopicos($idForum);
  
	if(!empty($arrTopicos)){

	   foreach ($arrTopicos as $topico){
    
        
          $lista = "<a href=\"./?a=post&idForum=". $idForum ."&idPost=". $topico->getIdTopico() ."\" class=\"list-group-item list-group-item-action flex-column align-items-start\">
    			        <h5 class=\"badge badge-warning badge-pill\">10 respostas</h5>
    				    <div class=\"d-flex w-100 justify-content-between\">
      				       <h5 class=\"mb-1\"><b>". $topico->getNomeTopico() ."</b></h5>
      				       <small>publicado há ". $topico->getQuantDias() ." dias</small>
    				   </div>
    		           <p class=\"mb-1\">". $topico->getDescricaoTopico() ."</p>
  				    </a>";
    
       echo $lista;

       $lista = "";        
        
       }
	}
  
?>
</div>