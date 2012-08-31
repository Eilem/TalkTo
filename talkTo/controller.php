<?php
header('Content-type: text/html; charset=utf-8');
require_once("bootstrap.php");

//listarUsuariosStatus();
listarUsuariosStatus();

// os controllers juntos
function listarUsuariosStatus(){
    try{
    if(!empty($_POST)){
        $idTalker2=null;
        $idTalker1=null;
        if(!empty($_POST['usuario2'])){
            $idTalker2 = $_POST['usuario2'];
            $oUsuario = new Usuario();
            $oUsuario->setId($idTalker2);
            $idTalker2 = obterTodosUsuario($oUsuario->getId());
        }
        if(!empty($_POST['usuario1'])){
            $idTalker1 = $_POST['usuario1'];
            $oUsuario = new Usuario();
            $check = $oUsuario->validarUsuario($idTalker1);
                if(!is_null($check)){
                        $oUsuario->setId($idTalker1);
                        $oUsuario->setOnLine('1');
                        $oUsuario->isOnLine($oUsuario);
                        $idTalker1 = obterTodosUsuario($oUsuario->getId());
                        $oTalker = new Talker();
                        $cUsuarios = $oTalker->cUsuarios();
                }else{
                    throw new Exception("usuario não localizado!");
                }
        }        
        if(($idTalker1!=null)&&($idTalker2==null)){           
            if (!empty($_POST['sair'])) {
                logOff($idTalker1->getId());
                require_once("index.php");
            }
            elseif(!empty($_POST['encerrarDialogo'])) {
                throw new Exception("Por favor selecione o 2 usuario");  
            }
            else{
                $oTalker = new Talker();
                $cUsuarios = $oTalker->cUsuarios();
                require_once("formTalker.php");
            }
            
        }else{
            if(!empty($_POST['dialogar'])){
                require_once("formDialogo.php");
            }elseif (!empty($_POST['enviar'])) {
                enviar($idTalker1->getId(), $idTalker2->getId());
            }elseif(!empty($_POST['encerrarDialogo'])){
                encerrarDialogo($idTalker1->getId(), $idTalker2->getId());
                $oTalker = new Talker();
                $cUsuarios = $oTalker->cUsuarios();
                require_once("formTalker.php");      
            }elseif (!empty($_POST['sair'])) {
                logOff($idTalker1->getId());
                require_once("index.php");     
            }elseif (!empty($_POST['voltar'])){
                $oTalker = new Talker();
                $cUsuarios = $oTalker->cUsuarios();
                require_once("formTalker.php");
            }else{
               $dialogo = atualizar($idTalker1->getId(), $idTalker2->getId());  
                echo $dialogo; 
            }
        }
    }
    
    }catch(Exception $erro){
        echo($erro->getMessage());
    } 
}


function logOff($idTalker1) {
    $oUsuario = new Usuario();
    $oUsuario->setId($idTalker1);
    $oUsuario->setOnLine('0');
    $oUsuario->isOnLine($oUsuario);   
}

function validacaoDialogo($idTalker1,$idTalker2) {
    $idUsuarioUltimo = verificarTalkerUltimaMensagem($idTalker1,$idTalker2);
    return verificarStatusUsuario($idUsuarioUltimo,$idTalker1,$idTalker2);
}

function verificarTalkerUltimaMensagem($idTalker1,$idTalker2){
    $oTalker = new Talker();
    $idUsuarioUltimo="";
    $id = $oTalker->obterDialogosDeTalkers($idTalker1,$idTalker2);
    if($id!=null){
        $oDialogo = $oTalker->obterDialogo($id);
            foreach($oDialogo->getCMensagens() as $oMensagem){
                $idUsuarioUltimo = $oMensagem->getIdUsuario();
            }
        return $idUsuarioUltimo;
    }   
}

function verificarStatusUsuario($idUsuarioUltimo,$idTalker1){
    if($idUsuarioUltimo!=null){
        if($idUsuarioUltimo==$idTalker1 ){
            return "Aguardando resposta";
        }else{
            return "Deve resposta";
        }
    }
    return "";
    
}

function validacaoStatus($status) {
    if($status==1){
        return "onLine";
    }else{
        return "offLine";
    }
}

function obterTodosUsuario($idTalker) {
    $oUsuario = new Usuario();
    $oUsuario->setId($idTalker);
    $usuarios = $oUsuario->obterUsuario();
    return $usuarios;
}

function encerrarDialogo($idTalker1,$idTalker2){
    $oTalker = new Talker();
    try{
        if(validacaoUsuario($idTalker1,$idTalker2)){
            $oTalker->encerrarDialogo($idTalker1,$idTalker2);
        }  
    }catch(Exception $erro){
        echo($erro->getMessage());
    }
}

function atualizar($idTalker1,$idTalker2){
    $oTalker = new Talker();
    $dialogo="";
    try{
            $id = $oTalker->obterDialogosDeTalkers($idTalker1,$idTalker2);
            $id2 = $oTalker->obterDialogosDeTalkers($idTalker2,$idTalker1);
            if($id!=null){
                $id = $oTalker->obterDialogosDeTalkers($idTalker1,$idTalker2);//pq repete a função? o $id já possui o id do dialogo^
                $oDialogo = $oTalker->obterDialogo($id); // não é preciso instanciar o objeto $oDialogo??

                foreach($oDialogo->getCMensagens() as $oMensagem){
                        $dialogo.= date('d-m H:i',$oMensagem->getDataHora())." - ".$oMensagem->getTexto()."\n";
                }
            }
            if($id2!=null){
                $id2 = $oTalker->obterDialogosDeTalkers($idTalker2,$idTalker1);//pq repete a função? o $id já possui o id do dialogo^
                $oDialogo = $oTalker->obterDialogo($id2); // não é preciso instanciar o objeto $oDialogo??

                foreach($oDialogo->getCMensagens() as $oMensagem){
                        $dialogo.= date('d-m H:i',$oMensagem->getDataHora())." - ".$oMensagem->getTexto()."\n";
                }
            }
        return $dialogo;

    }catch(Exception $erro){
        echo($erro->getMessage());
    }
}

function enviar($idTalker1, $idTalker2){
    $dialogo="";
    try{
            if(!empty($_POST['mensagem'])){
                
                $mensagem = $_POST['mensagem'];
                $oTalker = new Talker();

                $id = $oTalker->obterDialogosDeTalkers($idTalker1,$idTalker2);
                $id2 = $oTalker->obterDialogosDeTalkers($idTalker2,$idTalker1);
                if($id!=null){
                    $id = $oTalker->obterDialogosDeTalkers($idTalker1,$idTalker2);//pq repete a função? o $id já possui o id do dialogo^
                    $oDialogo = $oTalker->obterDialogo($id); // não é preciso instanciar o objeto $oDialogo??

                    foreach($oDialogo->getCMensagens() as $oMensagem){
                            $dialogo.= date('d-m H:i',$oMensagem->getDataHora())." - ".$oMensagem->getTexto()."\n";
                    }
                }else if ($id2!=null){
                    $id2 = $oTalker->obterDialogosDeTalkers($idTalker2,$idTalker1);//pq repete a função? o $id já possui o id do dialogo^
                    $oDialogo = $oTalker->obterDialogo($id2); // não é preciso instanciar o objeto $oDialogo??

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
            }

            return $dialogo;
            }catch(Exception $erro){
                    echo($erro->getMessage());
    }
}

function validacaoUsuario($idTalker1,$idTalker2){
    $oTalker = new Talker();
    $validacao1 = $oTalker->validarUsuario($idTalker1);
    $validacao2 = $oTalker->validarUsuario($idTalker2);

    if(($validacao1)&&($validacao2)){
        return true;
    }
    else{
        throw new Exception ("Talker não localizado!! Favor inseir um id válido!");
        return false;
    }
}