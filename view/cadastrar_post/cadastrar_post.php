<?php
   $idForum = $_GET['idForum'];
   $nomeForum = $_GET['nomeForum'];

  echo "<form class=\"formCadastra\" method=\"post\" action=\"./?a=cadastrar_novo_post&idForum=".$idForum."\">"; ?>
    <img src="imagens/alien.png" width = "150px" class="img-responsive" style="margin:0 auto;" />
	<div class ="text-center"> 
     <h3>Você está criando uma nova publicação em <?php echo $nomeForum; ?></h3>
	</div>
  <hr>
  <div class="form-group">
     <div class ="text-center"> 
         <label for="nomePost">Nome do Post</label>
     </div>
      <input class="form-control input-lg" name="nomePost" id="nomePost" placeholder="esse será o nome do seu post" />
  </div>
  <div class="form-group">
     <div class ="text-center"> 
         <label for="breveDescricao">Breve descrição</label>
      </div>
      <input class="form-control input-lg" name="breveDescricao" id="breveDescricao" placeholder="essa será uma breve descrição máximo 50 caracteres" />
  </div>
	<div class="form-group">
       <div class ="text-center">
          <label for="descriCompleta">Descrição completada</label>
       </div>
       <textarea class="form-control" id="descriCompleta" name="descriCompleta" rows="15"></textarea>
   </div>
   <div class="form-group">
      <div class ="text-center">
         <input type="submit" name="submit" class="btn btn-danger btn-lg" value="Criar Publicação" />
      </div>
   </div>
  </form>
