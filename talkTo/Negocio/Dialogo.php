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
       try {
           $dao = new ProxyDAO();
           return $dao->criarDialogo($this);
       } catch (Exception $erro) {
           print ($erro->getMessage());
       }
      }
   
   function inserirMensagem(Mensagem $mensagem) {
       try{
            $DAOnew = new ProxyDAO();
            return $DAOnew->inserirMensagem($mensagem);
        }catch(Exception $erro){
            print($erro->getMessage());
        }
       
   }
   
   function colecaoMensagens($id) {
         try{
            $pDAOnew = new ProxyDAO();
            return $pDAOnew->colecaoMensagens($id);
        }catch(Exception $erro){
            print($erro->getMessage());
        }
   }
}
