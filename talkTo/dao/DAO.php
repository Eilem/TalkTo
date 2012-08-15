<?php
include("conectar.php");

class DAO {
    
    /**
    * Cria o Dialogo inserindo no BD o objeto Dialogo 
    * @return id do Dialogo 
    */ 
   public function persistirDialogo(Dialogo &$oDialogo) {
       try{
                $id = $oDialogo->getId();
                $dataHor = $oDialogo->getHoraData();  
                $result = mysql_query("INSERT INTO dialogo (id, horaData) VALUES ('$id','$dataHor'); ");
     
                if($result){
                    $oDialogo->setId(mysql_insert_id());
                    
                    $cMensagens = $oDialogo->getCMensagens();
                    foreach ($cMensagens as $oMensagem) {
                        $oMensagem->setIdDialogo($oDialogo->getId());
                        $result = $this->persistirMensagem($oMensagem);  
                    }
                    return $result;
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
       
       $id = $mensagem->getId();
       $idDialogo = $mensagem->getIdDialogo();
       $texto = $mensagem->getTexto();
       $dataHora = $mensagem->getDataHora();

           $result = mysql_query("INSERT INTO mensagem (id, idDialogo, texto, dataHora) VALUES ('$id', '$idDialogo','$texto', '$dataHora')"); 
           
           if($result){
                $mensagem->setId(mysql_insert_id());
                return true;
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
         
        $result = mysql_query("SELECT * FROM mensagem where idDialogo='$id'");
        if($result){      
              while($row = mysql_fetch_array($result,MYSQL_ASSOC) ){
                    $mensagem = new Mensagem();
                    $mensagem->setId($row["id"]);
                    $mensagem->setIdDialogo($id);
                    $mensagem->setTexto($row["texto"]);
                    $mensagem->setDataHora($row["dataHora"]);
                    $colecao[] = $mensagem;
                }
                return $colecao;
           }
        else{
            return false;
               
        }
        }catch(Exception $erro){
            print($erro->getMessage());
        }
   }
   
   function obterDialogo($id){
       try{
           $result = mysql_query("SELECT * FROM dialogo where id={$id}");
           $result = mysql_fetch_array($result,MYSQLI_ASSOC);
           $oDialogo = new Dialogo();
           $oDialogo->setId($result["id"]);
           $oDialogo->setHoraData($result["horaData"]);
           $result = $this->colecaoMensagens($id);
           foreach ($result as $mensagem){
               $oDialogo->setCMensagens($mensagem);
           }
           
           return $oDialogo;
       }  catch (Exception $erro){
           print($erro->getMessage());
           
       }
        
   }
}
