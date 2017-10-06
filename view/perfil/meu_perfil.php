<?php 

   if(!isset($_GET['idPerf'])){
      $usuario = unserialize($_SESSION["usuario"]);
   }else{
      $usuario = CrudUsuarioDAO::consultarDadosUsuario($_GET['idPerf']);
      $_SESSION['respMensagem'] = $_GET['idPerf'];
   }

?>
<script type="text/javascript">
    //controla os menus com ajax, carregando o corpo das divs
    function abreMensagem() {
       $('#abreMensagem').load('view/mensagem_usuario/enviar_mensagem.php'); // carrega o form de mensagem
    }
</script>
<div class="row"><br />
  <div class="col-md-4">
     <div class="panel panel-default">
        <div class="panel-heading">
           <div class ="text-center"><b>Perfil de <?php echo $usuario->getNickName(); ?></b>
        </div></div>
           <div class="panel-body">
              <img href = "#" src="<?php echo $usuario->getFoto(); ?>" class="img-responsive" style="margin:0 auto; border-radius: 50%; width: 150px; height: 150px;"/>
            </div>
            <div class="row">
               <div class="col-md-12"><br /> 
                  <div class ="text-center">
                     <?php echo $usuario->getNome(); echo "<br />"; ?>
                     <?php echo $usuario->getDataNascimento(); echo "<br />"; ?>
                     <?php echo $usuario->getPerfil(); echo "<br />"; ?>
                  </div>
                </div>
            </div>
            <br />
            <?php 

            if(!isset($_GET['idPerf'])){
            ?>
            <div class="row">
               <div class="col-md-12">
                  <div class ="text-center">
                     <a href="./?a=mens_users"><h6>Minhas Mensagens</a>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class ="text-center">
                     <a href="./?a=atividades_recentes"><h6>Minhas atividades</a>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class ="text-center">
                     <a href="./?a=alterar_perfil"><h6>Alterar minhas informações</a>
                  </div>
            </div>
            </div>
            <?php
            }else{ ?>
             <div class="row">
               <div class="col-md-12">
                  <div class ="text-center">
                     <?php
                     if(isset($_SESSION["usuario"])){
                        echo "<a href=\"#\" onclick='abreMensagem()'><h6>Enviar Mensagem</a>";
                     } ?>
                  </div>
               </div>
            </div>
            <?php
            }
            ?>
     </div>
</div>
<div class="row">
  <div class="col-md-7">
     <div class="panel panel-default">
        <div class="panel-heading"><b><div class ="text-center">Informações básicas</b></div></div>
           <div class="panel-body">
              <b>Biografia:</b> <br />
              <?php echo $usuario->getBiografia(); ?>
              <br /><br />

              <b>Localização:</b> <br />
              <?php echo $usuario->getLocalizacao(); ?>
              
              <br /><br />

              <b>Interesse:</b> <br />
              <?php echo $usuario->getInteresse(); ?>
              
              <br /><br />

              <b>Ocupação:</b> <br />
              <?php echo $usuario->getOcupacao(); ?>
            </div>
      </div>
</div>
<div class="row">
  <div class="col-md-7">
     <div class="panel panel-default">
        <div class="panel-heading"><b><div class ="text-center">Contato</b></div></div>
           <div class="panel-body">
              <b>Facebook:</b> <br />
              <?php echo $usuario->getFacebook(); ?>
              
              <br /><br />

              <b>Linkedin:</b> <br />
              <?php echo $usuario->getLinkedin(); ?>
              
              <br /><br />

              <b>Twitter:</b> <br />
              <?php echo $usuario->getTwitter(); ?>
            </div>
      </div>
</div>
<div id="abreMensagem">
   
</div>