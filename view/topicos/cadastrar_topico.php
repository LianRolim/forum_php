<?php
   $idCategoria = $_GET['idCategoria'];
   $nomeCat = $_GET['nomeCat'];
   echo "<form class=\"formCadastra\" method=\"post\" action=\"./?a=novo_topico&idCategoria=". $idCategoria ."&nomeCat=". $nomeCat ." \"/>";
?>
    <img src="imagens/alien.png" width = "150px" class="img-responsive" style="margin:0 auto;" />
	<div class ="text-center"> 
     <h3> Cadastro de novo tópico na categoria <?php echo $nomeCat; ?></h3>
	</div>
  <hr>
  <div class="form-group">
     <div class ="text-center"> 
         <label for="nomeTop">Nome do tópico</label>
     </div>
      <input class="form-control input-lg" name="nomeTop" id="nomeTop" placeholder="esse será o nome do seu tópico" />
  </div>
   <div class="form-group">
      <div class ="text-center">
         <input type="submit" name="submit" class="btn btn-danger btn-lg" value="Criar o tópico" />
      </div>
   </div>
  </form>
