<?php

class Mensagem {
    private $id;
    private $idDialogo;
    private $texto;
    private $dataHora;
    
    function __construct() {
     
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getIdDialogo() {
        return $this->idDialogo;
    }

    public function setIdDialogo($idDialogo) {
        $this->idDialogo = $idDialogo;
    }

    public function getTexto() {
        return $this->texto;
    }

    public function setTexto($texto) {
        $this->texto = $texto;
    }

    public function getDataHora() {
        return $this->dataHora;
    }

    public function setDataHora($dataHora) {
        $this->dataHora = $dataHora;
    }
    
    
   
}


