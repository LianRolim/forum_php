<?php

class Postagem{

	public $nomePost;
	public $descricao;
	public $dataPost;
    public $nickname;
    public $nome;
    public $perfil;				
    public $foto;
    public $assinatura;
    public $dataRegistro;
    public $idUsuario;  										 
    public $idPost;
       										   

    public function setIdPost($idPost) {
		$this->idPost = $idPost;
	}
	public function getIdPost() {
		return $this->idPost;
	}

    public function setIdUsuario($idUsuario) {
		$this->idUsuario = $idUsuario;
	}
	public function getIdUsuario() {
		return $this->idUsuario;
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

	public function setNomePost($nomePost) {
		$this->nomePost = $nomePost;
	}
	public function getNomePost() {
		return $this->nomePost;
	}
	
	public function setDescricao($descricao) {
		$this->descricao = $descricao;
	}
	public function getDescricao() {
		return $this->descricao;
	}

	public function setDataPost($dataPost) {
		$this->dataPost = $dataPost;
	}
	public function getDataPost() {
		return $this->dataPost;
	}

	public function setNickName($nickname) {
		$this->nickname = $nickname;
	}
	public function getNickName() {
		return $this->nickname;
	}
	
	public function setNome($nome) {
		$this->nome = $nome;
	}
	public function getNome() {
		return $this->nome;
	}
}
?>