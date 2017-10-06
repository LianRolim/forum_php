<?php

class Usuario{

	public $nome;
	public $email;
	public $senha;
	public $sexo;
	public $dataNasc;


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