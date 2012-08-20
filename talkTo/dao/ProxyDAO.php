<?php

class ProxyDAO {
    
    /**
    * Cria o Dialogo enviando o objeto Dialogo 
    * @return id do Dialogo 
    */
   public function persistirDialogo(Dialogo $oDialogo) {
       try{
           $oDao = new DAO();
           return $oDao->persistirDialogo($oDialogo); 
        }catch(Exception $erro){
            echo($erro->getMessage());
        }
   }
   
   /**
    * Inseri a Mensagem enviando o objeto Mensagem
    * @param Mensagem $mensagem
    * @return booleano 
    */
   public function persistirMensagem(Mensagem $mensagem) {
       try{
          $oDao = new DAO();
          return $oDao->persistirMensagem($mensagem);
        }catch(Exception $erro){
            echo($erro->getMessage());
        }
   }
   
    /**
    * Coleções Mensagens de um determinado Dialogo que foi passado pelo parametro $id
    * @param int $id
    * @return array de Mensagens
    */
   public function colecaoMensagens($id) {
       try{
           $oDao = new DAO();
           return $oDao->colecaoMensagens($id);
        }catch(Exception $erro){
            echo($erro->getMessage());
        }
   }
   
    public function obterDialogo($id){
         try{
           $oDao = new DAO();
           return $oDao->obterDialogo($id);
        }catch(Exception $erro){
            echo($erro->getMessage());
        }
    }
    
    public function validarUsuario(){
        try{
            
        }catch(Exception $erro){
            echo($erro->getMessage());
        }
        
    }
    
    public function obterDialogoDeTalkers($talker1,$talker2){
         try{
           $oDao = new DAO();
           return $oDao->obterDialogoDeTalkers($talker1,$talker2);
        }catch(Exception $erro){
            echo($erro->getMessage());
        }
    }
    
}