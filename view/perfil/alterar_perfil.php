<?php
  // usuario ja esta na sessao apenas pego ele
  $usuario = unserialize($_SESSION["usuario"]);

?>
  <form class="formLog" method="post" action="./?a=altera_usuario" enctype="multipart/form-data">
    <img src="imagens/alterar_infos.png" width = "150px" class="img-responsive" style="margin:0 auto;" /><hr>
    <div class="form-group">
       <div class ="text-center"> 
          <label for="nome">Nome</label>
       </div>
       <input class="form-control input-lg" type="nome" name="nome" id="nome" placeholder="Seu nome" value="<?php echo $usuario->getNome();?>" />
    </div>
    <div class="form-group">
       <div class ="text-center"> 
          <label for="email">Email</label>
       </div>
       <input class="form-control input-lg" type="email" name="email" placeholder="Seu Email" value="<?php echo $usuario->getEmail();?>"/>
    </div>
    <div class="form-group">
       <div class ="text-center"> 
          <label for="nickname">NickName</label>
       </div>
       <input class="form-control input-lg" type="nickname" name="nickname" placeholder="Esse é seu nome no site" value="<?php echo $usuario->getNickName();?>"/>
    </div>
    <div class="form-group">
       <div class ="text-center"> 
          <label for="localizacao">Localização</label>
       </div>
       <input class="form-control input-lg" type="localizacao" name="localizacao" placeholder="Porto Alegre" value="<?php echo $usuario->getLocalizacao();?>"/>
    </div>
    <div class="form-group">
       <div class ="text-center"> 
          <label for="interesse">Interesse</label>
       </div>
       <input class="form-control input-lg" type="interesse" name="interesse" placeholder="Amigos, Relacionamento, Networking" value="<?php echo $usuario->getInteresse();?>"/>
    </div>
    <div class="form-group">
       <div class ="text-center"> 
          <label for="ocupacao">Ocupacao</label>
       </div>
       <input class="form-control input-lg" type="ocupacao" name="ocupacao" placeholder="Programador, Analista de sistemas, Vendedor" value="<?php echo $usuario->getOcupacao();?>" />
    </div>
    <div class="form-group">
      <div class ="text-center"> 
         <label for="dataNasc">Data nascimento</label> 
      </div>
      <input class="form-control input-lg" type = "date" name="dataNasc" value="<?php echo $usuario->getDataNascimento(); ?>" />
    </div>
    <div class="form-group">
       <div class ="text-center"> 
          <label for="facebook">Facebook</label>
       </div>
       <input class="form-control input-lg" type="facebook" name="facebook" placeholder="URL do perfil do facebook" value="<?php echo $usuario->getFacebook();?>"/>
    </div>
    <div class="form-group">
       <div class ="text-center"> 
          <label for="linkedin">Linkedin</label>
       </div>
       <input class="form-control input-lg" type="linkedin" name="linkedin" placeholder="URL do perfil do linkedin" value="<?php echo $usuario->getLinkedin();?>"/>
    </div>
    <div class="form-group">
       <div class ="text-center"> 
          <label for="twitter">Twitter</label>
       </div>
       <input class="form-control input-lg" type="twitter" name="twitter" placeholder="URL do perfil do twitter" value="<?php echo $usuario->getTwitter();?>"/>
    </div>
    <div class="form-group">
       <div class ="text-center">
          <label for="biografia">Biografia</label>
       </div>
       <textarea class="form-control" id="biografia" name="biografia" rows="3"><?php echo $usuario->getBiografia();?></textarea>
     </div>
    <div class="form-group">
      <div class ="text-center">
         <label for="sexo">Sexo</label><br />
         <label class="radio-inline">
            <input type="radio" name="sexo" value = "Masculino" <?php if($usuario->getSexo() == "M"){ echo 'checked="checked"'; } ?>>Masculino
         </label>
         <label class="radio-inline">
            <input type="radio" name="sexo" value = "Feminino" <?php if($usuario->getSexo() == "F"){ echo 'checked="checked"'; } ?>>Feminino
         </label>
      </div>
    </div>
    <div class="form-group">
       <div class ="text-center"> 
          <label class="btn btn-default btn-file">
             Selecione a foto do perfil <input type="file" name="foto">
          </label>
       </div>
    </div>
    <div class="form-group">
       <div class ="text-center"> 
          <label class="btn btn-default btn-file">
             Selecione a imagem de assinatura <input type="file" name="assinatura" hidden>
          </label>
       </div>
    </div>
    <div class="form-group">
       <div class ="text-center"> 
          <input type="submit" name="submit" class="btn btn-danger btn-lg" value="Savar dados" />
    </div>
  </form>