<script type="text/javascript">
    //controla os menus com ajax, carregando o corpo das divs
    function abreMensagem() {
       document.getElementById("esconder").style.display = "none";
       $('#abreMensagem').load('view/mensagem_usuario/enviar_mensagem.php'); // carrega o form de mensagem
    }
</script>
<?php
  $idMensagem = $_GET['idMenUsuario'];
  $acao = $_GET['acao'];

  $objMensagem = CrudMensagemUsersDAO::carregaMensagem($idMensagem);

  

  foreach ($objMensagem as $men){
?>
<img src="imagens/msg.png" width = "150px" class="img-responsive" style="margin:0 auto;" /><hr>
<div class="row">
  <div class="col-md-15">
     <div class="panel panel-default">
        <div class="panel-heading"><b><div class ="text-center">Corpo da mensagem</b></div></div>
           <div class="panel-body">
             <div class ="text-center"> 
              <?php 
                     if($acao == "receive"){ 
                        echo "Recebido de: <br />". $men->getNomeRecebedor(); 
                     }else{
                        echo "Enviado para: ". $men->getNomeEnviante(); 
                     } 
                 ?> <br /><br />
                 Corpo da mensagem <br />
                 <?php echo $men->getMensagem(); 
                 echo "<br /><br /><br />";
                 if($acao == "receive"){  

                    $_SESSION["respMensagem"] = $men->getIdUserEnv();

                    echo "<div id=\"esconder\"> <a onclick='abreMensagem()' class=\"btn btn-danger btn-md\" role=\"button\">Responda para ". $men->getNomeEnviante() ."</a></div>"; 
                 }
                 
                 ?>
            </div>
            </div>
      </div>
</div>
<?php } ?>

<div id="abreMensagem">

</div>