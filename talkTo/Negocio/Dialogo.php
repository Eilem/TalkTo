<?php

class Dialogo {
   private $id;
   private $horaData;
   private $cMensagens=array();
   private $status;
   private $talker1;
   private $talker2;
   
    /**
    * Obtem o Id do Dialogo
    * @return int 
    */
   public function getId() {
       return $this->id;
       
       }
   
   /**
    * Define o id do Dialogo
    * @param type $id 
    */
   public function setId($id) {
       $this->id = $id;
   }
   
   /**
    * Obtem o Hora e Data do Dialogo 
    * @return date time 
    */
   public function getHoraData() {
       return $this->horaData;
   }
   
   /**
    * Define a Hora e Data do Dialogo
    * @param type $horaData 
    */
   public function setHoraData($horaData) {
       $this->horaData = $horaData;
   }
   
   public function getCMensagens() {
       return $this->cMensagens;
   }

   public function setCMensagens(Mensagem $oMensagens) {
       $this->cMensagens[count($this->cMensagens)] = $oMensagens;
   }
   
   public function getStatus() {
       return $this->status;
   }

   public function setStatus($status) {
       $this->status = $status;
   }

   public function getTalker1() {
       return $this->talker1;
   }

   public function setTalker1($talker1) {
       $this->talker1 = $talker1;
   }

   public function getTalker2() {
       return $this->talker2;
   }

   public function setTalker2($talker2) {
       $this->talker2 = $talker2;
   }

             
   /**
    * Cria o Dialogo enviando o objeto Dialogo 
    * @return id do Dialogo 
    */
   function persistir() {
       try {
           $dao = new ProxyDAO();
           return $dao->persistirDialogo($this);
       } catch (Exception $erro) {
           print ($erro->getMessage());
       }
      }
   
   /**
    * Inseri a Mensagem enviando o objeto Mensagem
    * @param Mensagem $mensagem
    * @return booleano 
    */   
   function persistirMensagem(Mensagem $mensagem) {
       try{
            $DAOnew = new ProxyDAO();
            return $DAOnew->persistirMensagem($mensagem);
        }catch(Exception $erro){
            print($erro->getMessage());
        }
       
   }
   
   /**
    * Coleções Mensagens de um determinado Dialogo que foi passado pelo parametro $id
    * @return array de Mensagens
    */
   function colecaoMensagens() {
         try{
            $pDAOnew = new ProxyDAO();
            return $pDAOnew->colecaoMensagens($this->getId());
        }catch(Exception $erro){
            print($erro->getMessage());
        }
   }
}
