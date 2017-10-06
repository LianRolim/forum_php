<!-- <script type="text/javascript">$('.teste').addClass('animated bounceOutLeft');</script> -->

<!-- <div class="container">
    <img href = "#" src="imagens/alien.png" width = "150px" class="img-responsive" style="margin:0 auto;"/>
	<h1 class="animated tada" > Bem Vindo ao Alien Cheats!</h1>
</div> -->
<br />
<br />
<?php
	
	$arrPosts = CrudPostsDAO::carregaPostsInicial();


?>
<br /><br />
<div class="panel panel-default">
<div class ="text-center">
    <br /><br />
	<img href = "#" class="animated fadeInDown" src="imagens/alien.png" width = "150px" class="img-responsive"/>
	<h4 class="animated bounceInLeft" > Bem Vindo ao Alien Cheats!</h4>
	<br />
	<h5 class="animated bounceInLeft" > Publicações recentes </h5>
</div>
<div class="row">
<br />
<?php 
if(!empty($arrPosts)){

   $cont = 0;
   $contAux = 1;
   foreach ($arrPosts as $ultimosPosts){

      $panel = "<div class=\"col-sm-4\">
                   <div class=\"flip\">
        		      <div class=\"card\"> 
          			     <div class=\"face front\"> 
            			   <div class=\"inner\">
            			     <br /><h6>Publicação de ". $ultimosPosts->getNome() ."</h6>
            			     <img href = \"#\" class=\"animated rotateIn\" src=\" ". $ultimosPosts->getFoto() ."\" style=\"margin:0 auto; border-radius: 50%; width: 120px; height: 120px;\" class=\"img-responsive\"/>
            			   </div><br />
          				 </div> 
          				<div class=\"face back\"> 
            		  		<div class=\"inner text-center\"> 
              					<h3>". $ultimosPosts->getNomePost() ."</h3>
              					<a href=\"./?a=post&idPost=". $ultimosPosts->getIdPost() ."\" class=\"btn btn-default\" role=\"button\">Ver Mais</a>
            				</div>
          				</div>
       				 </div>	 
      			   </div>
    			</div>";

    	echo $panel;

    }
}
?>
</div>
<br />
<br />
<br />
<br />
</div> 
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script>

<script src="./js/index.js"></script>
<!--
<div class="row">
<div class="col-sm-3">
      <div class="flip">
        <div class="card"> 
          <div class="face front"> 
            <div class="inner">   
              <img src="http://vinculumgroup.com/v2/wp-content/uploads/2015/08/nykaa.jpg">
            </div>
          </div> 
          <div class="face back"> 
            <div class="inner text-center"> 
              <h3>Improved efficiency through automation</h3>
              <button type="button" class="btn btn-default">Know More</button>
            </div>
          </div>
        </div>	 
      </div>
    </div>
  <div class="col-sm-3">
      <div class="flip">
        <div class="card"> 
          <div class="face front"> 
            <div class="inner">   
              <img src="http://vinculumgroup.com/v2/wp-content/uploads/2015/08/nykaa.jpg">
            </div>
          </div> 
          <div class="face back"> 
            <div class="inner text-center"> 
              <h3>Improved efficiency through automation</h3>
              <button type="button" class="btn btn-default">Know More</button>
            </div>
          </div>
        </div>	 
      </div>
    </div>
  <div class="col-sm-3">
      <div class="flip">
        <div class="card"> 
          <div class="face front"> 
            <div class="inner">   
              <img src="http://vinculumgroup.com/v2/wp-content/uploads/2015/08/nykaa.jpg">
            </div>
          </div> 
          <div class="face back"> 
            <div class="inner text-center"> 
              <h3>Improved efficiency through automation</h3>
              <button type="button" class="btn btn-default">Know More</button>
            </div>
          </div>
        </div>	 
      </div>
    </div>
  <div class="col-sm-3">
      <div class="flip">
        <div class="card"> 
          <div class="face front"> 
            <div class="inner">   
              <img src="http://vinculumgroup.com/v2/wp-content/uploads/2015/08/nykaa.jpg">
            </div>
          </div> 
          <div class="face back"> 
            <div class="inner text-center"> 
              <h3>Improved efficiency through automation</h3>
              <button type="button" class="btn btn-default">Know More</button>
            </div>
          </div>
        </div>	 
      </div>
    </div>
  </div> -->

