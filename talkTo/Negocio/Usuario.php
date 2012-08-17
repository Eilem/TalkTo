<?php

class Usuario{
    
    private $id;
    private $user;
    private $password;
    private $logado;    
    
    /**
     * Obtem o Id de Usuário
     * @return int
     */
    public function getId() {
        return $this->id;
    }
    
    /**
     * define o Id de um Usuário
     * @param type $id 
     */
    public function setId($id) {
        $this->id = $id;
    }

    /**
     * Obtem o Nome do Usuário
     * @return string 
     */
    public function getUsername() {
        return $this->user;
    }

    /**
     * Define o Nome de um usuário
     * @param type $username 
     */
    public function setUsername($username) {
        $this->user = $username;
    }

    /**
     * Obtém a senha de um Usuário
     * @return string
     */
    public function getPassword() {
        return $this->password;
    }

    /**
     * Define O password do usuario
     * @param type $password 
     */
    public function setPassword($password) {
        $this->password = $password;
    }

    /**
     * 
     * @return bool
     */
    public function getLogado() {
        return $this->logado;
    }

    /**
     *
     * @param bool $logado 
     */
    public function setLogado($logado) {
        $this->logado = $logado;
    }


}