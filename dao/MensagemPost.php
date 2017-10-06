<?php

class MensagemPost{

	public $descricao;
	public $dataHora;
	public $nome;									 
    public $nick;
    public $perfil;
    public $foto;
    public $assinatura;		
    public $dataRegistro;
    public $quantPosts;							   

    
    public function setQuantPosts($quantPosts) {
		$this->quantPosts = $quantPosts;
	}
	public function getQuantPosts() {
		return $this->quantPosts;
	}

    public function setDataRegistro($dataRegistro) {
		$this->dataRegistro = $dataRegistro;
	}
	public function getDataRegistro() {
		return $this->dataRegistro;
	}

    public function setAssinatura($assinatura) {
		$this->assinatura = $assinatura;
	}
	public function getAssinatura() {
		return $this->assinatura;
	}

    public function setFoto($foto) {
		$this->foto = $foto;
	}
	public function getFoto() {
		return $this->foto;
	}

    public function setPerfil($perfil) {
		$this->perfil = $perfil;
	}
	public function getPerfil() {
		return $this->perfil;
	}

    public function setNick($nick) {
		$this->nick = $nick;
	}
	public function getNick() {
		return $this->nick;
	}

    public function setNome($nome) {
		$this->nome = $nome;
	}
	public function getNome() {
		return $this->nome;
	}

    public function setDataHora($dataHora) {
		$this->dataHora = $dataHora;
	}
	public function getDataHora() {
		return $this->dataHora;
	}

    public function setDescricao($descricao) {
		$this->descricao = $descricao;
	}
	public function getDescricao() {
		return $this->descricao;
	}



}
?>