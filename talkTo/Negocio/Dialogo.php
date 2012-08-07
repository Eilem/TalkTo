<?php

class Dialogo {
   private $id;
   private $horaData;
   
   public function getId() {
       return $this->id;
   }

   public function setId($id) {
       $this->id = $id;
   }

   public function getHoraData() {
       return $this->horaData;
   }

   public function setHoraData($horaData) {
       $this->horaData = $horaData;
   }

   function criarDialogo() {
       
   }
   
   function inserirMensagem($texto) {
       try{
            $pDAOnew = new ProxyDAO();
            return $pDAOnew->inserirMensagem($texto);
        }catch(Exception $erro){
            print($erro->getMessage());
        }
       
   }
   
   function colecaoMensagens() {
         try{
            $pDAOnew = new ProxyDAO();
            return $pDAOnew->colecaoMensagens();
        }catch(Exception $erro){
            print($erro->getMessage());
        }
   }
}
