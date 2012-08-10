<?php

class ProxyDAO {
    
    /**
    * Cria o Dialogo enviando o objeto Dialogo 
    * @return id do Dialogo 
    */
   public function persistirDialogo(Dialogo $oDialogo) {
       try{
           $dao = new DAO();
           return $dao->persistirDialogo($oDialogo); 
        }catch(Exception $erro){
            print($erro->getMessage());
        }
   }
   
   /**
    * Inseri a Mensagem enviando o objeto Mensagem
    * @param Mensagem $mensagem
    * @return booleano 
    */
   public function persistirMensagem(Mensagem $mensagem) {
       try{
          $dao = new DAO();
          return $dao->persistirMensagem($mensagem);
        }catch(Exception $erro){
            print($erro->getMessage());
        }
   }
   
    /**
    * Coleções Mensagens de um determinado Dialogo que foi passado pelo parametro $id
    * @param int $id
    * @return array de Mensagens
    */
   public function colecaoMensagens($id) {
       try{
           $dao = new DAO();
           return $dao->colecaoMensagens($id);
        }catch(Exception $erro){
            print($erro->getMessage());
        }
   }
   
}
