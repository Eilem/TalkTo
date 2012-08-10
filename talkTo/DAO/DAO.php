<?php

class DAO {
    
    /**
    * Cria o Dialogo inserindo no BD o objeto Dialogo 
    * @return id do Dialogo 
    */ 
   public function criarDialogo(Dialogo &$dialogo) {
       try{
           include("conectar.php");
       
                $id = $dialogo->getId();
                $dataHor = $dialogo->getHoraData();  
                $result = mysql_query("INSERT INTO dialogo (id, horaData) VALUES ('$id','$dataHor');");
     
                if($result){
                    return $dialogo->setId(mysql_insert_id());
                }
                else{
                    return false;
                }
        }catch(Exception $erro){
            print($erro->getMessage());
        }     
   }
   
   /**
    * Inseri a Mensagem enviando o objeto Mensagem
    * @param Mensagem $mensagem
    * @return booleano 
    */
   public function persistirMensagem(Mensagem &$mensagem) {  
    try{
           include("conectar.php");
       
       $id = $mensagem->getId();
       $idDialogo = $mensagem->getIdDialogo();
       $texto = $mensagem->getTexto();
       $dataHora = $mensagem->getDataHora();

           $result = mysql_query("INSERT INTO mensagem (id, idDialogo, texto, dataHora) VALUES ('$id', '$idDialogo','$texto', '$dataHora')"); 
           
           if($result){
                return $mensagem->setId(mysql_insert_id());
           }
           else{
                return false;
               
           }
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
         include("conectar.php"); 
         
        $result = mysql_query("SELECT * FROM mensagem where idDialogo='$id'");
        
        while($row = mysql_fetch_array($result,MYSQL_ASSOC) ){
            //            $colecao[$row["texto"]] = $row["dataHora"];
            
            $mensagem = new Mensagem();
            $mensagem->setId($row["id"]);
            $mensagem->setIdDialogo($id);
            $mensagem->setTexto($row["texto"]);
            $mensagem->setDataHora($row["dataHora"]);

            $colecao[] = $mensagem;
        }
            return $colecao;   
        }catch(Exception $erro){
            print($erro->getMessage());
        }
   }
}
