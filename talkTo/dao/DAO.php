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
                $idTalker1 = $oDialogo->getTalker1();           
                $idTalker2 = $oDialogo->getTalker2();
                $status = $oDialogo->getStatus();
                
                if(is_null($id)){
                    $dataHora = $oDialogo->getHoraData();  
                    $result = mysql_query("INSERT INTO dialogo (id, horaData,talker1,talker2,status) VALUES ('$id','$dataHora','$idTalker1','$idTalker2','$status'); ");
                    $oDialogo->setId(mysql_insert_id());
                    
                }
                $e = $oDialogo->getCMensagens();  // e???
                $oMensagem = $e[count($e)-1];
                $oMensagem->setIdDialogo($oDialogo->getId());
                $result = $this->persistirMensagem($oMensagem);
              
        }catch(Exception $erro){
            echo($erro->getMessage());
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
       $idUsuario = $mensagem->getIdUsuario();

           $result = mysql_query("INSERT INTO mensagem (id, idDialogo, texto, dataHora,user_id) VALUES ('$id', '$idDialogo','$texto', '$dataHora', '$idUsuario')"); 
           
           if($result){
                $mensagem->setId(mysql_insert_id());
                return TRUE;
           }
           else{
                return FALSE;
               
           }
        }catch(Exception $erro){
            echo($erro->getMessage());
        }
   }

     /**
    * ColeÃ§Ãµes Mensagens de um determinado Dialogo que foi passado pelo parametro $id
    * @param int $id
    * @return array de Mensagens
    */
   public function colecaoMensagens($id) {     
       try{
         
        $result = mysql_query("SELECT * FROM mensagem where idDialogo='$id'");
        if($result){     
            $colecao = array();
              while($row = mysql_fetch_array($result,MYSQL_ASSOC) ){
                    $mensagem = new Mensagem();
                    $mensagem->setId($row["id"]);
                    $mensagem->setIdDialogo($id);
                    $mensagem->setTexto($row["texto"]);
                    $mensagem->setDataHora($row["dataHora"]);
                    $mensagem->setIdUsuario($row["user_id"]);
                    $colecao[] = $mensagem;
                }
                return $colecao;
        }
        else{
            return FALSE;
               
        }
        }catch(Exception $erro){
            echo($erro->getMessage());
        }
   }
   
   function obterDialogo($id){
       try{
           $result = mysql_query("SELECT * FROM dialogo where id={$id}");
           $result = mysql_fetch_array($result,MYSQLI_ASSOC);
           $oDialogo = new Dialogo();
           $oDialogo->setId($result["id"]);
           $oDialogo->setHoraData($result["horaData"]);
           $oDialogo->setTalker1($result["talker1"]);
           $oDialogo->setTalker2($result["talker2"]);
           $oDialogo->setStatus($result["status"]);
           
           $result = $this->colecaoMensagens($id);
           foreach ($result as $mensagem){
               $oDialogo->setCMensagens($mensagem);
           }
           
           return $oDialogo;
       }  catch (Exception $erro){
           echo($erro->getMessage());
           
       }
   }

   function logar(Usuario &$oUsuario){
       try{
           
           $user = $oUsuario->getUsername();
           $password= $oUsuario->getPassword();
                      
           $result = mysql_query("SELECT * FROM user where user={$user} and password={$password}");
           $result = mysql_fetch_array($result,MYSQLI_ASSOC);
           
       }catch(Exception $erro){
           echo($erro->getMessage());
       }
   }
     
   public function obterDialogosDeTalkers($talker1,$talker2){
       try{
           $result = mysql_query("SELECT * FROM dialogo where talker1={$talker1} and talker2={$talker2} and status=1");
           $result = mysql_fetch_array($result,MYSQLI_ASSOC);
           
           $idDialogo = $result['id'];
           return $idDialogo;
            
           }catch(Exception $erro){
               $erro->getMessage();
           }
   }
   
   public function atualizarDialogo($talker1,$talker2){
       try{
           $result = mysql_query("SELECT * FROM dialogo WHERE talker1={$talker1} AND talker2={$talker2} AND status=1");
           $result = mysql_fetch_array($result,MYSQL_ASSOC);
           
           $idDialogo = $result['id'];
           
           $oDialogo = new Dialogo();
           
           $result = $this->colecaoMensagens($idDialogo);
           foreach($result as $mensagem){
               $oDialogo->setCMensagens($mensagem);
           }
           return $oDialogo;
           
       }catch(Exception $erro){
           $erro->getMessage();
       }
   }
   
   public function encerrarDialogo($talker1, $talker2){
       try{
           $result = mysql_query("UPDATE  dialogo 
                                  SET  finalizadoPor ={$talker1},status=0 
                                  WHERE  talker1={$talker1} AND talker2={$talker2} AND status=1"
                                );
            if($result){
                return TRUE;
            }else{
                return FALSE;
            }
       }catch(Exception $erro){
           echo($erro->getMessage());
       }
   }
   
   public function validarUsuario($idTalker){
        try {
            $result = mysql_query("SELECT * FROM user WHERE id={$idTalker}");
            $result = mysql_fetch_array($result,MYSQL_ASSOC);
            return $result['id'];
            
            }catch(Exception $erro) {
            echo($erro->getMessage());
        }
   }
   
   public function cUsuarios(){
        try {
            $result = mysql_query("SELECT * from user");
            if($result){
                $colecao = array(); 
                while($row = mysql_fetch_array($result,MYSQL_ASSOC) ){
                    $oUsuario = new Usuario();
                    $oUsuario->setId($row["id"]);
                    $oUsuario->setUsername($row["user"]);
                    $oUsuario->setOnLine($row["onLine"]);
                    $colecao[]=$oUsuario;
                }
                return $colecao;
            }
            else{
                return false;
            }
             
        }catch(Exception $erro) {
            echo($erro->getMessage());
        }
   }
   
   public function obterUsuario($idUsuario) {
       try {
            $result = mysql_query("SELECT * from user WHERE id={$idUsuario}");
            $result = mysql_fetch_array($result,MYSQL_ASSOC);
               $oUsuario = new Usuario();
               $oUsuario->setId($result["id"]);
               $oUsuario->setUsername($result["user"]);
               $oUsuario->setOnLine($result["onLine"]);
               
               return $oUsuario;
               
        }catch(Exception $erro) {
            echo($erro->getMessage());
        }
   }
   
   public function isOnLine(Usuario $oUsuario){
        try {
           $id = $oUsuario->getId();
           $online = $oUsuario->getOnLine();
           $result = mysql_query("UPDATE user SET online={$online} WHERE id={$id}");
           if($result){
                return true;
            }else{
                return false;
            }
        }catch(Exception $erro) {
            echo($erro->getMessage());
        }
   }
  
}
