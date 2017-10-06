<?php

  $idUsuarioBan = $_GET['idUsuario'];
  $statusUser = $_GET['status'];

  CrudUsuarioDAO::banirAtivar($idUsuarioBan, $statusUser);


?>
