<?php

class Dialogo {
   private $id;
   private $horaData;
   
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
   
   /**
    * Cria o Dialogo enviando o objeto Dialogo 
    * @return id do Dialogo 
    */
   function criarDialogo() {
       try {
           $dao = new ProxyDAO();
           return $dao->criarDialogo($this);
       } catch (Exception $erro) {
           print ($erro->getMessage());
       }
      }
   
   /**
    * Inseri a Mensagem enviando o objeto Mensagem
    * @param Mensagem $mensagem
    * @return booleano 
    */   
   function inserirMensagem(Mensagem $mensagem) {
       try{
            $DAOnew = new ProxyDAO();
            return $DAOnew->inserirMensagem($mensagem);
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
        //    $pDAOnew = new ProxyDAO();
        //    return $pDAOnew->colecaoMensagens($this->getId());
            
            return array(
                new Mensagem("REcebendo msg"),
                new Mensagem("hi how are you?"),
                new Mensagem("i'm good!!")
                
            );
            
            
        }catch(Exception $erro){
            print($erro->getMessage());
        }
   }
}
