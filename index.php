<?php
  error_reporting(E_ERROR | E_WARNING | E_PARSE);
  session_start();
  spl_autoload_register(function ($class_name) {
	try {
    	require_once 'dao/'.$class_name.'.php';
  }
  catch (Exception $e) {
    	print $e->getMessage();
    }
  });
	
	$_CONFIG = parse_ini_file("./config.ini", true);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>AlienCheats</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="js/sweetalert.min.js"></script>

  <!-- importacao css -->
  <link href="css/animate.css" rel="stylesheet">
  <link href="css/default.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
  <link rel="stylesheet" type="text/css" href="css/sweetalert.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<nav class="navbar navbar-inverse">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <img href = "#" src="imagens/alien.png" width = "49px"/>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
       <li class="active"><a href="./?a=inicio">Inicio</a></li>
       <li><a href="./?a=foruns">Fóruns</a></li>
        <!-- exemplo para inserção de dropDown no menu caso queira... vou verificar no futuro se vou me animar a organizar os menus
         <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Page 1-1</a></li>
            <li><a href="#">Page 1-2</a></li>
            <li><a href="#">Page 1-3</a></li>
          </ul>
        </li> -->
        <?php
        if(isset($_SESSION["usuario"])){
           $usuario = unserialize($_SESSION["usuario"]);
        }
       
/*        if(isset($_SESSION["usuario"] ) and ( $usuario->getPerfil() == "MODERADOR" or $usuario->getPerfil() == "ADMINISTRADOR" ) ) {
           echo '<li id="categoria"><a href="./?a=criar_categoria">Criar categoria</a></li>';
           echo '<li id="banir"><a href="./?a=banir">Banir Usuario</a></li>';
        }
       */
        /*if(isset($_SESSION["usuario"] ) and $usuario->getPerfil() == "ADMINISTRADOR"){
           echo '<li id="manUsu"><a href="./?a=manutencaoUsuarios">Manutenção de Usuários</a></li>';
        }*/

        if(isset($_SESSION["usuario"])){
           echo '<li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Perfil<span class="caret"></span></a>
                       <ul class="dropdown-menu">
                          <li><a href="./?a=meu_perfil" class="glyphicon glyphicon-user"> Meu Perfil</a></li>
                          <li><a href="./?a=mens_users" class="glyphicon glyphicon-comment"> Mensagens</a></li>
                          <li><a href="./?a=atividades_recentes" class="glyphicon glyphicon-eye-open"> Minhas atividades</a></li>
                          <li><a href="./?a=alterar_perfil" class="glyphicon glyphicon-edit"> Alterar minhas informações</a></li>
                        </ul>
                 </li>';
        }
        ?>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php
        if(isset($_SESSION["usuario"])){
           echo '<li><a href="./?a=logout"><span class="glyphicon glyphicon-log-out"></span> Sair</a></li>';

        }else{
           echo '<li><a href="./?a=login"><span class="glyphicon glyphicon-log-in"></span> Entrar</a></li>';
        }
        ?>
      </ul>
    </div>
  
</nav>
<div class="container">
<?php
if(!isset($_SESSION["usuario"])){ ?>
   <div class="panel panel-danger">
      <div class="panel-heading">Bem Vindo ao Alien Cheats!</div>
         <div class="panel-body">
            <div class ="text-center">
            <h6 text-color: red; >Não perca tempo, registre-se agora mesmo! Membros registrados tem acesso a muito mais conteúdos, além de poder participar de bate-papos, discussões e compartilhar novidades com a comunidade. Não perca essa oportunidade!</h6>
            <a href="./?a=cadastro" class="btn btn-danger btn-md" role="button">Registre-se</a>
            </div>
         </div>
   </div>
<?php
}
		$actions = $_CONFIG["webpath"];
		$pagina = (isset($_GET['a']) && array_key_exists($_GET["a"], $actions)) ? $_GET['a'] : 'principal';
		include_once("./".$actions[$pagina]);
?>
</div>
<div class="footer-bottom">
     <br /><br /><br />
        <div class="container">
        <hr><br />
            <div class ="text-center">
               <p class="pull-center"> © 2017 AlienCheats.com </p>
            </div>
        </div>
    </div>
</body>
</html>