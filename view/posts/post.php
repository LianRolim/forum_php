<?php
	
	// controller da pagina da publicacao
	require_once 'controller/post/controla_publicacao.php';

	// pego o id do post para carregar 
	$idPost = $_GET['idPost'];
	
  

	// faço o autoload da postagem
	$dadosPostagem = carregaPost($idPost);

  $_SESSION["post"] = $dadosPostagem->getIdPost();

	// carrego a quantidade de postagens do usuario que fez a publicação...
	$nQuantPostagens = buscaQuantPosts($dadosPostagem->getIdUsuario());

?>
<script type="text/javascript">
    //controla os menus com ajax, carregando o corpo das divs
    function abreMensagem() {
       document.getElementById("esconder").style.display = "none"; // esconde a div
       $('#abreMensagem').load('view/mensagem_post/mensagem.php'); // carrega o form de mensagem
    }
    </script>
<div class="row"><br />
  <div class="col-md-4">
     <div class="panel panel-default">
        <div class="panel-heading">
           <div class ="text-center"><b><?php echo $dadosPostagem->getNickName(); ?></b>
        </div></div>
           <div class="panel-body">
              <img href = "#" src="<?php echo $dadosPostagem->getFoto(); ?>" class="img-responsive" style="margin:0 auto; border-radius: 50%; width: 150px; height: 150px;"/>
            </div>
            <div class="row">
               <div class="col-md-12"><br /> 
                  <div class ="text-center">
                      <?php echo "<a href=\"./?a=meu_perfil&idPerf=". $dadosPostagem->getIdUsuario() ."\">Ver perfil</a><br />"; ?>
                     Registrado em <br /><?php echo $dadosPostagem->getDataRegistro(); echo "<br />"; ?>
                     Perfil <br /><?php echo $dadosPostagem->getPerfil(); ?> <br />
                  </div>
                </div>
            </div>
            <div class="row">
               <div class="col-md-12">
               <br /> <div class ="text-center">Posts <?php echo $nQuantPostagens; ?></div></div>
            </div>
     </div>
</div>
<div class="row">
  <div class="col-md-7">
     <div class="panel panel-default">
        <div class="panel-heading"><b><div class ="text-center"><?php echo $dadosPostagem->getNomePost(); ?></b></div></div>
           <div class="panel-body">
              <?php
                   ///////////////////////////////////////////////
              	  // AQUI EH O CORPO DA PUBLICAO DO POST
              	 ///////////////////////////////////////////////
              	 echo $dadosPostagem->getDescricao();
              ?>
            </div>
      </div>
</div>
<?php
  /////////////////////////////////////////////////////
 //CARREGO AS MENSAGENS DO POST
//////////////////////////////////////////////////////
$arrDadosComentario = [];

$arrDadosComentario = buscaMensagens($idPost);

if(!empty($arrDadosComentario)){
   
   foreach ($arrDadosComentario as $comentario){
   	 
   	   $msgComenta = "<div class=\"row\">
   	   				     <div class=\"col-md-12\">
   	   				        <div class=\"panel panel-default\">
   	   				           <div class=\"panel-body\">
   	   				              <div class=\"col-md-2\">
   	   				                 <div class =\"text-center\">
   	   				                    <b>". $comentario->getNick() ."</b><hr>
   	   				                    <img href = \"#\" src=\" ". $comentario->getFoto() ." \" class=\"img-responsive\" style=\"margin:0 auto; border-radius: 50%; width: 150px; height: 150px;\"/>
   	   				                    <br />". $comentario->getPerfil() ."
   	   				                    <br />Registrado em ". $comentario->getDataRegistro() ."
   	   				                    <br />". $comentario->getQuantPosts() ." Posts
   	   				                 </div>
   	   				              </div>
   	   				              &nbsp;&nbsp;<div class=\"col-md-10\"> ". $comentario->getDescricao() ."
   	   				";
   	    if(empty($comentario->getAssinatura())){
   	    	$msgComenta .= "<br /><br /><br /> </div> </div></div></div></div>";
   	    }else{
   	    	$msgComenta .= "<br /><br /><br /><br /><br /><br />
   	    					<img src=\"".$comentario->getAssinatura()."\" class=\"img-responsive\" style=\"margin:0 auto; width: 500px; height: 300px;\"/>
   	    					</div> </div></div></div></div>
   	    	               ";
   	    }

   	    print $msgComenta;

   	    $msgComenta = "";
   }

}
?>

<div id="abreMensagem">

</div>

<div id="esconder">
<?php 
   if(isset($_SESSION["usuario"])){
      echo "<a onclick='abreMensagem()' class=\"btn btn-danger btn-md\" role=\"button\">Nova Mensagem</a>"; 
   }
?>
</div>