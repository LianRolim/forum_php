<img src="imagens/msg.png" width = "50px" class="img-responsive" style="margin:0 auto;" />
<div class ="text-center"> 
   <h3>Mensagens Recebidas </h3><br />
</div>

<div class="list-group">
<?php
  
  $user = unserialize($_SESSION['usuario']);

	$arrMensRec = [];

	$arrMensRec = CrudMensagemUsersDAO::carregaMensRecebidas($user->getIdUsuario());
  
  $_SESSION['mensagem'] = $arrMensRec;

	if(!empty($arrMensRec)){

	   foreach ($arrMensRec as $menRec){
    
        
          $lista = "<a href=\"./?a=mens_dtl&acao=receive&idMenUsuario=". $menRec->getIdMensUsuario() ."\" class=\"list-group-item list-group-item-action flex-column align-items-start data-toggle=\"modal\" data-target=\"#myModal\"\">
    				    <div class=\"d-flex w-100 justify-content-between\">
                     <small>Mensagem recebida de <b>". $menRec->getNomeEnviante() ."</b></small>
    				   </div>
  				    </a>";
    
          echo $lista;

          $lista = "";        
        
       }
	}else{
    echo "Não existem mensagens recebidas";
  }
?>
<br /><br /><br />
<div class ="text-center"> 
   <h3>Mensagens Enviadas</h3><br />
</div>
<?php
  
  $arrMensEnv= [];

  $arrMensEnv = CrudMensagemUsersDAO::carregaMensEnviadas($user->getIdUsuario());

  if(!empty($arrMensEnv)){

     foreach ($arrMensEnv as $mensEnv){
    
        
          $lista = "<a href=\"./?a=mens_dtl&acao=enviado&idMenUsuario=". $mensEnv->getIdMensUsuario() ."\" class=\"list-group-item list-group-item-action flex-column align-items-start data-toggle=\"modal\" data-target=\"#myModal\"\">
                <div class=\"d-flex w-100 justify-content-between\">
                     <small>Mensagem enviada para <b>". $mensEnv->getNomeRecebedor() ."</b></small>
               </div>
              </a>";
    
          echo $lista;

          $lista = "";        
        
       }
  }else{
     echo "Não existem mensagens enviadas";
  }
  
?>
</div>
