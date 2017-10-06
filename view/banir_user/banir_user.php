<div class ="text-center"> 
   <h3>Manutenção de usuário</h3><br />
</div>

<div class="list-group">
<?php

	$arrUsuariosBanir = [];

	$arrUsuariosBanir = CrudUsuarioDAO::buscaUsuarios();
  
	if(!empty($arrUsuariosBanir)){

	   foreach ($arrUsuariosBanir as $usuarioBan){
    
        
          $lista = "<a href=\"./?a=banirCtl&idUsuario=". $usuarioBan->getIdUsuario() ."&status=". $usuarioBan->getBanido() ."\" class=\"list-group-item list-group-item-action flex-column align-items-start data-toggle=\"modal\" data-target=\"#myModal\"\">
    			        <h5 class=\"badge badge-warning badge-pill\">". $usuarioBan->getBanido() ."</h5>
    				    <div class=\"d-flex w-100 justify-content-between\">
      				       <h5 class=\"mb-1\"><b>Nome: ". $usuarioBan->getNome() ."</b></h5>
      				       <small>Email: ". $usuarioBan->getEmail() ."</small>
    				   </div>
  				    </a>";
    
       echo $lista;

       $lista = "";        
        
       }
	}else{
    echo "Não existem usuários no sistema";
  }
  
?>
</div>
