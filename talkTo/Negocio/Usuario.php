<?php

class Usuario{
    
    private $id;
    private $username;
    private $password;
    private $onLine;    
    
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
        return $this->username;
    }

    /**
     * Define o Nome de um usuário
     * @param type $username 
     */
    public function setUsername($username) {
        $this->username = $username;
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
     * @return bool
     */
    public function getOnLine() {
        return $this->onLine;
    }

    /**
     * @param bool $onLine
     */
    public function setOnLine($onLine) {
        $this->onLine = $onLine;
    }

    public function validarUsuario($userId){
        try{
            $oProxyDAO = new ProxyDAO();
            $oProxyDAO->validarUsuario($userId);
            
        }catch(Exception $erro){
            echo($erro->getMessage());
        }
    }
    
    public function isOnLine(){
        try{
            $oProxyDAO = new ProxyDAO();
            return $oProxyDAO->isOnLine($this);
         }catch (Exception $erro){
             echo($erro->getMessage());
         }
    }
    
     public function obterUsuario(){
       try {
            $oDao = new Dao();
            return $oDao->obterUsuario($this->id);
        } catch (Exception $erro) {
            echo $erro->getMessage();
        }
   
   }
}