<?php

class Mensagem {
    private $id;
    private $idDialogo;
    private $texto;
    private $dataHora;
    
    /**
     * Construtor da classe Mensagem 
     */
    function __construct() {
     
    }
    
    /**
     * Obtem o Id da Mensagem
     * @return int 
     */
    public function getId() {
        return $this->id;
    }
    
    /**
     * Define o Id da Mensagem
     * @param int $id 
     */
    public function setId($id) {
        $this->id = $id;
    }
    
    /**
     * Obtem o Id do Dialogo
     * @return int 
     */
    public function getIdDialogo() {
        return $this->idDialogo;
    }
    
    /**
     * Define o id do Dialogo
     * @param int $idDialogo 
     */
    public function setIdDialogo($idDialogo) {
        $this->idDialogo = $idDialogo;
    }
    
    /**
     * Obtem o texto da Mensagem
     * @return string 
     */
    public function getTexto() {
        return $this->texto;
    }
    
    /**
     * Define o texto da Mensagem
     * @param string $texto 
     */
    public function setTexto($texto) {
        $this->texto = $texto;
    }
    
    /**
     * Obtem a data e hora da Mensagem
     * @return date time 
     */
    public function getDataHora() {
        return $this->dataHora;
    }
    
    /**
     * Define a data e hora da Mensagem
     * @param date time $dataHora 
     */
    public function setDataHora($dataHora) {
        $this->dataHora = $dataHora;
    }
    
    
   
}


