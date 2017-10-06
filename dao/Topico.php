<?php

class Topico{

	public $idTopico;
	public $nomeTopico;
	public $dataCriacao;
	public $ultimaPostagem;
	public $descricaoTopico;
	public $quantDias;
	
	public function setIdTopico($idTopico) {
		$this->idTopico = $idTopico;
	}
	public function getIdTopico() {
		return $this->idTopico;
	}
	
	public function setNomeTopico($nomeTopico) {
		$this->nomeTopico = $nomeTopico;
	}
	public function getNomeTopico() {
		return $this->nomeTopico;
	}
	
	public function setDataCriacao($dataCriacao) {
		$this->dataCriacao = $dataCriacao;
	}
	public function getDataCriacao() {
		return $this->dataCriacao;
	}

	public function setDescricaoTopico($descricaoTopico) {
		$this->descricaoTopico = $descricaoTopico;
	}
	public function getDescricaoTopico() {
		return $this->descricaoTopico;
	}

	public function setQuantDias($quantDias) {
		$this->quantDias = $quantDias;
	}
	public function getQuantDias() {
		return $this->quantDias;
	}

	public function setUltimaPostagem($ultimaPostagem) {
		$this->ultimaPostagem = $ultimaPostagem;
	}
	public function getUltimaPostagem() {
		return $this->ultimaPostagem;
	}
}
?>