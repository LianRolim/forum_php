  <form class="formCadastra" method="post" action="./?a=inserir_usuario">
    <img src="imagens/alien.png" width = "150px" class="img-responsive" style="margin:0 auto;" />
	<div class ="text-center"> 
     <h3>Faça parte do maior fórum de Cheats</h3>
	</div>
  <hr>
  <div class="form-group">
     <div class ="text-center"> 
         <label for="nickName">Nick Name</label>
     </div>
      <input class="form-control input-lg" name="nickName" id="nickName" placeholder="esse vai ser seu nome no fórum" />
  </div>
  <div class="form-group">
     <div class ="text-center"> 
         <label for="nome">Nome</label>
      </div>
      <input class="form-control input-lg" name="nome" id="nome" placeholder="digite seu nome" />
  </div>
	<div class="form-group">
      <div class ="text-center">
         <label for="email">Email</label>
      </div>
      <input class="form-control input-lg" name="email" id="email" placeholder="qual seu email" />
    </div>
    <div class="form-group">
      <div class ="text-center">
         <label for="senha">Senha</label>
      </div>
      <input class="form-control input-lg" type = "password" name="senha" id="senha" placeholder="*****" />
    </div>
	<div class="form-group">
      <div class ="text-center">
         <label for="confSenha">Confirme a senha</label>
      </div>
      <input class="form-control input-lg" type = "password" name="confSenha" id="confSenha" placeholder="*****" />
  </div>
  <div class="form-group">
      <div class ="text-center"> 
         <label for="dataNasc">Data nascimento</label> 
      </div>
      <input class="form-control input-lg" type = "date" name="dataNasc" />
  </div>
	<div class="form-group">
      <div class ="text-center">
         <label for="sexo">Sexo</label><br />
         <label class="radio-inline">
            <input type="radio" name="sexo" value = "Masculino">Masculino
         </label>
         <label class="radio-inline">
            <input type="radio" name="sexo" value = "Feminino">Feminino
         </label>
      </div>
    </div>
    <div class="form-group">
       <div class ="text-center">
          <input type="submit" name="submit" class="btn btn-danger btn-lg" value="Criar conta" />
       </div>
    </div>
  </form>
