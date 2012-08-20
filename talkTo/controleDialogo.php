<?php
require_once("bootstrap.php");

$dialogo="";
$time="";

    try{
        if(!empty($_POST)){            
                
            if(!empty($_POST['mensagem'])){
                $mensagem = $_POST['mensagem'];
                
                if(!empty($_POST['idTalker1'])){
                    $idTalker1 = $_POST['idTalker1'];
                    }

                if(!empty($_POST['idTalker2'])){
                    $idTalker2 = $_POST['idTalker2'];
                    } 

                if(!empty($_POST['idDialogo'])){                    
                                        
                     $oTalker = new Talker();
                     $oDialogo = $oTalker->obterDialogo($_POST['idDialogo']);
                     
                     if($oDialogo->getStatus()){
                         foreach($oDialogo->getCMensagens() as $oMensagem){
                             $dialogo.= date('d-m H:i',$oMensagem->getDataHora())." - ".$oMensagem->getTexto()."\n";
                        }
                        
                     } else {
                        $oDialogo = new Dialogo(); // criando Dialogo
                        $oDialogo->setId(null);
                        $oDialogo->setHoraData(time());
                        $oDialogo->setTalker1($idTalker1);
                        $oDialogo->setTalker2($idTalker2);
                        $oDialogo->setStatus(true);
                     }
                     
                     
                }else{
                    $oDialogo = new Dialogo(); // criando Dialogo
                    $oDialogo->setId(null);
                    $oDialogo->setHoraData(time());
                    $oDialogo->setTalker1($idTalker1);
                    $oDialogo->setTalker2($idTalker2);
                    $oDialogo->setStatus(true);
                    
                }
                
                $oMensagem= new Mensagem(); //criando msg
                $oMensagem->setId(null);
                $oMensagem->setIdDialogo($oDialogo->getId());
                $oMensagem->setTexto($mensagem);
                $oMensagem->setDataHora(time());
                
                $oDialogo->setCMensagens($oMensagem);
                
                $oDialogo->persistir();
                
                $id = $oDialogo->getId();

                $oMensagem->__destruct();

                $cMensagens = $oDialogo->getCMensagens();
                
                $dialogo="";
                foreach($cMensagens as $oMensagem){
                   $dialogo .= date('d-m H:i',$oMensagem->getDataHora())." - ".$oMensagem->getTexto()."\n";                   
                }
                
            require_once("formdialogo.php");
            }else{
                throw new Exception("Digite uma mensagem para enviar!");
            }
        }
    }catch(Exception $erro){
        echo($erro->getMessage());
    }