<?php

class MensagemUsuarios{

	public $idMensUsuario;
	public $idUserEnv;
	public $idUserRec;									 
    public $mensagem;	
    public $nomeEnviante;
    public $nomeRecebedor;					   



    public function setNomeRecebedor($nomeRecebedor) {
		$this->nomeRecebedor = $nomeRecebedor;
	}
	public function getNomeRecebedor() {
		return $this->nomeRecebedor;
	}

    public function setNomeEnviante($nomeEnviante) {
		$this->nomeEnviante = $nomeEnviante;
	}
	public function getNomeEnviante() {
		return $this->nomeEnviante;
	}
    
    public function setIdMensUsuario($idMensUsuario) {
		$this->idMensUsuario = $idMensUsuario;
	}
	public function getIdMensUsuario() {
		return $this->idMensUsuario;
	}

    public function setIdUserEnv($idUserEnv) {
		$this->idUserEnv = $idUserEnv;
	}
	public function getIdUserEnv() {
		return $this->idUserEnv;
	}

	public function setIdUserRec($idUserRec) {
		$this->idUserRec = $idUserRec;
	}
	public function getIdUserRec() {
		return $this->idUserRec;
	}
    
    public function setMensagem($mensagem) {
		$this->mensagem = $mensagem;
	}
	public function getMensagem() {
		return $this->mensagem;
	}

}
?>