<?php

class Forum{

	public $nomeForum;
	public $idForum;
	
	public function setNomeForum($nomeForum) {
		$this->nomeForum = $nomeForum;
	}
	public function getNomeForum() {
		return $this->nomeForum;
	}
	
	public function setIdForum($idForum) {
		$this->idForum = $idForum;
	}
	public function getIdForum() {
		return $this->idForum;
	}
	
}
?>