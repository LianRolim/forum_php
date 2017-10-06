<?php

class Usuario{

	public $idUsuario;
	public $nome;
	public $nickName;
	public $email;
	public $senha;
	public $sexo;
	public $dataNasc;
	public $perfil;
	public $assinatura;
	public $banido;
	public $biografia;
	public $localizacao;
	public $interesse;
	public $ocupacao;
	public $facebook;
	public $linkedin;
	public $twitter;
	public $foto;
	public $dataRegistro;

	public function setDataRegistro($dataRegistro) {
		$this->dataRegistro = $dataRegistro;
	}
	public function getDataRegistro() {
		return $this->dataRegistro;
	}

	public function setFoto($foto) {
		$this->foto = $foto;
	}
	public function getFoto() {
		return $this->foto;
	}

	public function setTwitter($twitter) {
		$this->twitter = $twitter;
	}
	public function getTwitter() {
		return $this->twitter;
	}

	public function setLinkedin($linkedin) {
		$this->linkedin = $linkedin;
	}
	public function getLinkedin() {
		return $this->linkedin;
	}

	public function setFacebook($facebook) {
		$this->facebook = $facebook;
	}
	public function getFacebook() {
		return $this->facebook;
	}

	public function setOcupacao($ocupacao) {
		$this->ocupacao = $ocupacao;
	}
	public function getOcupacao() {
		return $this->ocupacao;
	}

	public function setInteresse($interesse) {
		$this->interesse = $interesse;
	}
	public function getInteresse() {
		return $this->interesse;
	}

	public function setLocalizacao($localizacao) {
		$this->localizacao = $localizacao;
	}
	public function getLocalizacao() {
		return $this->localizacao;
	}

	public function setBiografia($biografia) {
		$this->biografia = $biografia;
	}
	public function getBiografia() {
		return $this->biografia;
	}

	public function setBanido($banido) {
		$this->banido = $banido;
	}
	public function getBanido() {
		return $this->banido;
	}

	public function setIdUsuario($idUsuario) {
		$this->idUsuario = $idUsuario;
	}
	public function getIdUsuario() {
		return $this->idUsuario;
	}

	public function setAssinatura($assinatura) {
		$this->assinatura = $assinatura;
	}
	public function getAssinatura() {
		return $this->assinatura;
	}
	
	public function setPerfil($perfil) {
		$this->perfil = $perfil;
	}
	public function getPerfil() {
		return $this->perfil;
	}
	
	public function setNickName($nickName) {
		$this->nickName = $nickName;
	}
	public function getNickName() {
		return $this->nickName;
	}
	
	public function setNome($nome) {
		$this->nome = $nome;
	}
	public function getNome() {
		return $this->nome;
	}

	public function setEmail($email) {
		$this->email = $email;
	}
	public function getEmail() {
		return $this->email;
	}

	public function setSenha($senha) {
		$this->senha = $senha;
	}
	public function getSenha() {
		return $this->senha;
	}

	public function setSexo($sexo) {
		$this->sexo = $sexo;
	}
	public function getSexo() {
		return $this->sexo;
	}

	public function setDataNascimento($dataNasc) {
		$this->dataNasc = $dataNasc;
	}
	public function getDataNascimento() {
		return $this->dataNasc;
	}

}
?>