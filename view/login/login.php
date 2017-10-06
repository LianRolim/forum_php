  <form class="formLog" method="post" action="./?a=valida_acesso">
    <img src="imagens/alien.png" width = "150px" class="img-responsive" style="margin:0 auto;" /><hr>
    <div class="form-group">
       <div class ="text-center"> 
          <label for="email">Email</label>
       </div>
       <input class="form-control input-lg" type="email" name="email" id="email" placeholder="email"/>
    </div>
    <div class="form-group">
       <div class ="text-center"> 
          <label for="password">Senha</label>
       </div>
       <input class="form-control input-lg" type="password" name="senha" placeholder="senha" />
    </div>
    <div class="form-group">
       <div class ="text-center"> 
          <input type="submit" name="submit" class="btn btn-danger btn-lg" value="Entrar" />
          <h6> ou
	        <a href="./?a=cadastro"><h6>Cadastre-se</a>
       </h6>
    </div>
  </form>