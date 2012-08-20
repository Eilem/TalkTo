<?php
require_once("bootstrap.php");

    try{
        if(!empty($_GET)){
            if(!empty($_GET['mensagem'])){
                $mensagem = $_GET['mensagem']; 
                
                if(!empty($_GET['idDialogo'])){
                    
                     $oTalker = new Talker();
                     $oDialogo = $oTalker->obterDialogo($_GET['idDialogo']);
                     
                }else{
                    $oDialogo = new Dialogo(); // criando Dialogo
                    $oDialogo->setId(null);
                    $oDialogo->setHoraData(time());
                }
                
                $oMensagem= new Mensagem(); //criando msg
                $oMensagem->setId(null);
                $oMensagem->setIdDialogo($oDialogo->getId());
                $oMensagem->setTexto($mensagem);
                $oMensagem->setDataHora(time());
                
                $oDialogo->setCMensagens($oMensagem);
                
                $oDialogo->persistir();
                $id="";
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
