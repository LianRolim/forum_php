  <form class="formCadastra" method="post" action="./?a=inserir_categoria">
    <img src="imagens/alien.png" width = "150px" class="img-responsive" style="margin:0 auto;" />
  <div class ="text-center"> 
     <h3>Crie a nova categoria do forum</h3>
  </div>
  <hr>
  <div class="form-group">
     <div class ="text-center"> 
         <label for="nomeCat">Nome da categoria</label>
     </div>
      <input class="form-control input-lg" name="nomeCat" id="nomeCat" placeholder="esse será o nome da nova categoria" />
  </div>

  <div class="form-group">
     <div class ="text-center"> 
         <label for="nomeCat">Selecione a imagem</label><br />
    
     <?php 
        
        $checkBoxImg = "";

        foreach (Util::consultaImgEmUmDiretorio() as $topico){
           $checkBoxImg = "<label for=\"img\">
                             <img src=\"". $topico ."\" height=\"100px\" width=\"100px\">
                          </label>&nbsp;&nbsp;
                          <input type=\"radio\" id=\"".$topico."\" name=\"img\" value = \"".$topico."\" />&nbsp;&nbsp;&nbsp;&nbsp;
           ";

           print $checkBoxImg;
        }

     ?>
  </div>

  </div>
  <div class="form-group">
     <div class ="text-center">
        <input type="submit" name="submit" class="btn btn-danger btn-lg" value="Cadastrar Categoria" />
     </div>
  </div>
  </form>
