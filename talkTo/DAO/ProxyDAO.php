<?php

class ProxyDAO {
    
   function criarDialogo(Dialogo $dialogo) {
       try{
           $dao = new DAO();
           return $dao->criarDialogo($dialogo); 
        }catch(Exception $erro){
            print($erro->getMessage());
        }
   }
   
   function inserirMensagem(Mensagem $mensagem) {
       try{
          $dao = new DAO();
          return $dao->inserirMensagem($mensagem);
        }catch(Exception $erro){
            print($erro->getMessage());
        }
   }
   
   function colecaoMensagens($id) {
       try{
           $dao = new DAO();
           return $dao->colecaoMensagens($id);
        }catch(Exception $erro){
            print($erro->getMessage());
        }
   }
   
}
