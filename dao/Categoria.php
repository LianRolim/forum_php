<?php

class Categoria{

	public $idCategoria;
	public $nomeCategoria;
	public $imagem;
	
	
	public function setIdCategoria($idCategoria) {
		$this->idCategoria = $idCategoria;
	}
	public function getIdCategoria() {
		return $this->idCategoria;
	}

	public function setNomeCategoria($nomeCategoria) {
		$this->nomeCategoria = $nomeCategoria;
	}
	public function getNomeCategoria() {
		return $this->nomeCategoria;
	}

	public function setImagem($imagem) {
		$this->imagem = $imagem;
	}
	public function getImagem() {
		return $this->imagem;
	}

}
?>