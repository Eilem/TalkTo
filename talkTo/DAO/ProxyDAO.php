<?php

class ProxyDAO {
    
    function criarDialogo() {
       
   }
   
   function inserirMensagem($texto) {
       $dao = new DAO();
       $dao->inserirMensagem($texto);
       
   }
   
   function colecaoMensagens() {
       $dao = new DAO();
       $dao->colecaoMensagens();
   }
    
}
