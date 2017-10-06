<?php

final class CrudMensagemUsersDAO{

	public function carregaMensRecebidas($idUser){

    $arrMensRec = [];

    try {
      
      $con = new PDO("mysql:host=localhost;dbname=forum;charset=utf8", "root", "");

        $resultSet = $con->prepare("SELECT id_mensagem_usuario,
       									   id_user_env,
       									   id_user_rec,
       									   mensagem,
       									   (select nome from tb_usuario where id_usuario = id_user_env) as nome_enviante,
       									   (select nome from tb_usuario where id_usuario = id_user_rec) as nome_recebedor
  									  FROM tb_mensagem_usuario men
 									 WHERE id_user_rec = ?");
      
      $resultSet->bindParam(1, $idUser);

      if($resultSet->execute()){ // executa o select
        if($resultSet->rowCount() > 0){ // consulta retornou mais que 1 registro
          while($row = $resultSet->fetch(PDO::FETCH_OBJ)){
              
            $menRec = New MensagemUsuarios();
            $menRec->setIdMensUsuario($row->id_mensagem_usuario);
            $menRec->setIdUserEnv($row->id_user_env);
            $menRec->setIdUserRec($row->id_user_rec);
            $menRec->setMensagem($row->mensagem);
            $menRec->setNomeEnviante($row->nome_enviante);
            $menRec->setNomeRecebedor($row->nome_recebedor);

            array_push($arrMensRec, $menRec);

          }
        }       
      }
      
      return $arrMensRec;

      } 
      catch (Exception $e) {
        Util::alerta($e->getMessage());
      }
    }

    public function carregaMensEnviadas($idUsuario){

    $arrMensEnv = [];

    try {
      
      $con = new PDO("mysql:host=localhost;dbname=forum;charset=utf8", "root", "");

        $resultSet = $con->prepare("SELECT id_mensagem_usuario,
       									   id_user_env,
       									   id_user_rec,
       									   mensagem,
       									   (select nome from tb_usuario where id_usuario = id_user_env) as nome_enviante,
       									   (select nome from tb_usuario where id_usuario = id_user_rec) as nome_recebedor
  									  FROM tb_mensagem_usuario men
 									 WHERE id_user_env = ? ");
       
       $resultSet->bindParam(1, $idUsuario);

       if($resultSet->execute()){ // executa o select
        if($resultSet->rowCount() > 0){ // consulta retornou mais que 1 registro
          while($row = $resultSet->fetch(PDO::FETCH_OBJ)){
              
            $menEnv = New MensagemUsuarios();
            $menEnv->setIdMensUsuario($row->id_mensagem_usuario);
            $menEnv->setIdUserEnv($row->id_user_env);
            $menEnv->setIdUserRec($row->id_user_rec);
            $menEnv->setMensagem($row->mensagem);
            $menEnv->setNomeEnviante($row->nome_enviante);
            $menEnv->setNomeRecebedor($row->nome_recebedor);

            array_push($arrMensEnv, $menEnv);

          }
        }       
      }
      
      return $arrMensEnv;

      } 
      catch (Exception $e) {
        Util::alerta($e->getMessage());
      }
  }


  public function carregaMensagem($idMensagem){

    $arrMen = [];

    try {
      
      $con = new PDO("mysql:host=localhost;dbname=forum;charset=utf8", "root", "");

        $resultSet = $con->prepare("SELECT id_mensagem_usuario,
                                           id_user_env,
                                           id_user_rec,
                                           mensagem,
                                           (select nome from tb_usuario where id_usuario = id_user_env) as nome_enviante,
                                           (select nome from tb_usuario where id_usuario = id_user_rec) as nome_recebedor
                                      FROM tb_mensagem_usuario men
                                     WHERE id_mensagem_usuario = ?");
      
      $resultSet->bindParam(1, $idMensagem);

      if($resultSet->execute()){ // executa o select
        if($resultSet->rowCount() > 0){ // consulta retornou mais que 1 registro
          while($row = $resultSet->fetch(PDO::FETCH_OBJ)){
              
            $men = New MensagemUsuarios();
            $men->setIdMensUsuario($row->id_mensagem_usuario);
            $men->setIdUserEnv($row->id_user_env);
            $men->setIdUserRec($row->id_user_rec);
            $men->setMensagem($row->mensagem);
            $men->setNomeEnviante($row->nome_enviante);
            $men->setNomeRecebedor($row->nome_recebedor);

            array_push($arrMen, $men);

          }
        }       
      }
      
      return $arrMen;

      } 
      catch (Exception $e) {
        Util::alerta($e->getMessage());
      }
    }

    public function inserir($idUserEnv, $idUserRec, $mensagem){

    try {

        $con = new PDO("mysql:host=localhost;dbname=forum;charset=utf8", "root", "");
      $stmt = $con->prepare("INSERT INTO tb_mensagem_usuario(id_user_env, id_user_rec, mensagem)
                    VALUES (?, ?, ?)");

      $stmt->bindParam(1, $idUserEnv);
      $stmt->bindParam(2, $idUserRec);
      $stmt->bindParam(3, $mensagem);
      $stmt->execute();     

      Util::alerta("Obrigado pela sua mensagem");
          Util::voltar();
      
      }
      catch (Exception $e) {
        Util::alerta($e->getMessage());
      }

  }
}

?>