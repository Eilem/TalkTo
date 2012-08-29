<?php

require_once("bootstrap.php");


listarUsuariosStatus();

// os controllers juntos
function listarUsuariosStatus(){
    if(!empty($_POST)){
        if(!empty($_POST['acao'])){
            if(!empty($_POST['usuario2'])){
            $idTalker2 = $_POST['usuario2'];
            }
            if(!empty($_POST['usuario1'])){
            $idTalker1 = $_POST['usuario1'];
            }
            $idTalker2 = obterTodosUsuario($idTalker2);  //pq obterTodosUsuario se a função so obtem 1 usuario (o q foi passado por parametro)
            $idTalker1 = obterTodosUsuario($idTalker1);
            $idTalker1 = $idTalker1->getUsername();
            $idTalker2 = $idTalker2->getUsername();
            require_once("formDialogo.php");
        }
        else{
          if(!empty($_POST['user'])){
            $user = $_POST['user'];
            $idTalker1="";
            $idTalker2="";
            $cUsuarios = "";
            $oUsuario = new Usuario();
            $oUsuario->setId($user);
            $oUsuario->setOnLine(1);
            $oUsuario->isOnLine();

            // para aparecer o nome do usuario no form
            $idTalker1 = obterTodosUsuario($oUsuario->getId());
            $oTalker = new Talker();
            $cUsuarios = $oTalker->cUsuarios();
            require_once("formTeste.php"); 
            }  
        } 
    }else{
       require_once("index.php");    
    }  
}


// os controlers separados
//function listarUsuariosStatus($user){
//        $user = 1;
//        $idTalker1="";
//        $idTalker2="";
//        $cUsuarios = "";
//        $oUsuario = new Usuario();
//        $oUsuario->setId($user);
//        $oUsuario->setOnLine(1);
//        $oUsuario->isOnLine();
//        
//        // para aparecer o nome do usuario no form
//        $idTalker1 = obterTodosUsuario($oUsuario->getId());
//        $oTalker = new Talker();
//        $cUsuarios = $oTalker->cUsuarios();
//    
//        if(empty($_POST['usuario2'])){
//            require_once("formTeste.php"); 
//        }else{
//            $idTalker2 = $_POST['usuario2'];
//            $idTalker2 = obterTodosUsuario($idTalker2);
//
//
//            $idTalker1 = $idTalker1->getUsername();
//            $idTalker2 = $idTalker2->getUsername();
//            require_once("formDialogo.php");
//        }   
//}


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

