<?php

class DAO {
    
    /**
    * Cria o Dialogo inserindo no BD o objeto Dialogo 
    * @return id do Dialogo 
    */ 
   function criarDialogo(Dialogo &$dialogo) {
       include("conectar.php");
       
       $id = $dialogo->getId();
       $dataHor = $dialogo->getHoraData();  
       mysql_query("INSERT INTO dialogo (id, horaData) VALUES ('$id','$dataHor');")or die(mysql_error());
     
       $dialogo->setId(mysql_insert_id());
       
       return true;
   }
   
   /**
    * Inseri a Mensagem enviando o objeto Mensagem
    * @param Mensagem $mensagem
    * @return booleano 
    */
   function inserirMensagem(Mensagem $mensagem) {     
       include("conectar.php");
       
       $id = $mensagem->getId();
       $idDialogo = $mensagem->getIdDialogo();
       $texto = $mensagem->getTexto();
       $dataHora = $mensagem->getDataHora();

       mysql_query("INSERT INTO mensagem (id, idDialogo, texto, dataHora) VALUES ('$id', '$idDialogo','$texto', '$dataHora')")or die(mysql_error()); 
   }
   
     /**
    * Coleções Mensagens de um determinado Dialogo que foi passado pelo parametro $id
    * @param int $id
    * @return array de Mensagens
    */
   function colecaoMensagens($id) {           
         include("conectar.php"); 
         
        $result = mysql_query("SELECT * FROM mensagem where idDialogo='$id'");
        
        while($row = mysql_fetch_array($result,MYSQL_ASSOC) ){
            $colecao[$row["texto"]] = $row["dataHora"];
        }
        return $colecao;   
   }
}
