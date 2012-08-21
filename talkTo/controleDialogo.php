<?php
require_once("bootstrap.php");
    try{
        if(!empty($_POST)){   
            if(!empty($_POST['idTalker1'])){
                $idTalker1 = $_POST['idTalker1'];
            }

            if(!empty($_POST['idTalker2'])){
                $idTalker2= $_POST['idTalker2'];
            } 
            if(!empty($_POST['atualizar'])){
                atualizar($idTalker1, $idTalker2);
            }else{
                enviar($idTalker1, $idTalker2);
            }
        }
        
             
    }catch(Exception $erro){
        echo($erro->getMessage());
    }
    
    
    function atualizar($idTalker1,$idTalker2){
        $dialogo="";
                    $oTalker = new Talker();
                    $id = $oTalker->obterDialogosDeTalkers($idTalker1,$idTalker2);
                    
                    if($id!=null){
                        $id = $oTalker->obterDialogosDeTalkers($idTalker1,$idTalker2);
                        $oDialogo = $oTalker->obterDialogo($id); 
                        
                        foreach($oDialogo->getCMensagens() as $oMensagem){
                             $dialogo.= date('d-m H:i',$oMensagem->getDataHora())." - ".$oMensagem->getTexto()."\n";
                        }
                    }
            require_once("formDialogo.php");
    }
    
    function enviar($idTalker1, $idTalker2){
        $dialogo="";
        if(!empty($_POST['mensagem'])){
                $mensagem = $_POST['mensagem'];
               $oTalker = new Talker();
                    $id = $oTalker->obterDialogosDeTalkers($idTalker1,$idTalker2);
                    
                    if($id!=null){
                        
                        $id = $oTalker->obterDialogosDeTalkers($idTalker1,$idTalker2);
                        $oDialogo = $oTalker->obterDialogo($id); 
                        
                        foreach($oDialogo->getCMensagens() as $oMensagem){
                             $dialogo.= date('d-m H:i',$oMensagem->getDataHora())." - ".$oMensagem->getTexto()."\n";
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
            require_once("formDialogo.php");
            }
    }