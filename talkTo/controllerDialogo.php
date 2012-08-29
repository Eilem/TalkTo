<?php 
require_once("bootstrap.php");

// $cUsuarios = "";
//
//    try{
//        if(!empty($_POST)){
//            if(!empty($_POST['usuario'])){
//                $idTalker1 = $_POST['usuario'];
//            }
//            $oTalker = new Talker();
//            if($oTalker->validarUsuario($idTalker1)){
//                $cUsuarios = $oTalker->cUsuarios();
//                 require_once("formTalker.php");
//                 
//                    
//                    if(!empty($_POST['idTalker2'])){
//                        $idTalker2= $_POST['idTalker2'];
//                    } 
//
//                    if(!empty($_POST['atualizar'])){
//                        atualizar($idTalker1, $idTalker2);
//                    }
//                    if(!empty($_POST['enviar'])){
//                        enviar($idTalker1, $idTalker2);
//                    }
//
//                    if(!empty($_POST['encerrarDialogo'])){
//                        encerrarDialogo($idTalker1, $idTalker2);
//                    }
//                    
//            }
//            else{
//                echo "Talker não localizado!! Favor inseir um id válido!";
//            }
//            
//            
//        }
//    }catch(Exception $erro){
//        echo($erro->getMessage());
//    }
//    
//    function encerrarDialogo($idTalker1,$idTalker2){
//        $oTalker = new Talker();
//        try{
//          if(validacaoUsuario($idTalker1,$idTalker2)){
//            $oTalker->encerrarDialogo($idTalker1,$idTalker2);
//            require_once("index.html");
//          }  
//        }catch(Exception $erro){
//            echo($erro->getMessage());
//            
//        }
//    }
//    
//    function atualizar($idTalker1,$idTalker2){
//        
//        $oTalker = new Talker();
//        $dialogo="";
//        try{
//                       
//            if(validacaoUsuario($idTalker1,$idTalker2)){
//                $id = $oTalker->obterDialogosDeTalkers($idTalker1,$idTalker2);
//                if($id!=null){
//                    $id = $oTalker->obterDialogosDeTalkers($idTalker1,$idTalker2);//pq repete a função? o $id já possui o id do dialogo^
//                    $oDialogo = $oTalker->obterDialogo($id); // não é preciso instanciar o objeto $oDialogo??
//
//                    foreach($oDialogo->getCMensagens() as $oMensagem){
//                            $dialogo.= date('d-m H:i',$oMensagem->getDataHora())." - ".$oMensagem->getTexto()."\n";
//                    }
//                }
//            }
//            require_once("formDialogo.php");
//    
//        }catch(Exception $erro){
//            echo($erro->getMessage());
//        }
//    }
//    
//    function enviar($idTalker1, $idTalker2){
//        $dialogo="";
//        try{
//            if(validacaoUsuario($idTalker1,$idTalker2)){
//                if(!empty($_POST['mensagem'])){
//                    $mensagem = $_POST['mensagem'];
//                    $oTalker = new Talker();
//                    
//                    $id = $oTalker->obterDialogosDeTalkers($idTalker1,$idTalker2);
//                    if($id!=null){
//                        $id = $oTalker->obterDialogosDeTalkers($idTalker1,$idTalker2);
//                        $oDialogo = $oTalker->obterDialogo($id);
//                        
//                        foreach($oDialogo->getCMensagens() as $oMensagem){
//                            $dialogo.= date('d-m H:i',$oMensagem->getDataHora())." - ".$oMensagem->getTexto()."\n";
//                            }
//                    }else{
//                        $oDialogo = new Dialogo(); // criando Dialogo
//                        $oDialogo->setId(null);
//                        $oDialogo->setHoraData(time());
//                        $oDialogo->setTalker1($idTalker1);
//                        $oDialogo->setTalker2($idTalker2);
//                        $oDialogo->setStatus(true);
//                        }
//                        $oMensagem= new Mensagem(); //criando msg
//                        $oMensagem->setId(null);
//                        $oMensagem->setIdDialogo($oDialogo->getId());
//                        $oMensagem->setTexto($mensagem);
//                        $oMensagem->setDataHora(time());
//                        
//                        $oDialogo->setCMensagens($oMensagem);
//                        
//                        $oDialogo->persistir();
//                        
//                        $id = $oDialogo->getId();
//                        
//                        $oMensagem->__destruct();
//                        
//                        $cMensagens = $oDialogo->getCMensagens();
//                        
//                        $dialogo="";
//                        
//                        foreach($cMensagens as $oMensagem){
//                            $dialogo .= date('d-m H:i',$oMensagem->getDataHora())." - ".$oMensagem->getTexto()."\n";
//                            }
//                        require_once("formDialogo.php");    
//                       
//                }
//             }
//             }catch(Exception $erro){
//                        echo($erro->getMessage());
//        }
//    }
//            
//    function validacaoUsuario($idTalker1,$idTalker2){
//                 $oTalker = new Talker();
//                 $validacao1 = $oTalker->validarUsuario($idTalker1);
//                 $validacao2 = $oTalker->validarUsuario($idTalker2);
//                 
//                 if(($validacao1)&&($validacao2)){
//                     return true;
//                 }
//                 else{
//                     throw new Exception ("Talker não localizado!! Favor inseir um id válido!");
//                     return false;
//                 }
//
//
//}

// os controlers separados  

require_once 'controllerLogin.php';

$oTalk1 = $oUsuario1;
var_dump($oTalk1);
echo "objeto talk 1";

$id1= $oUsuario1->getId();

var_dump($id1);
echo "id talk 1";

echo ("s aqui?");
var_dump(listarUsuariosStatus($oUsuario1));
echo ("algo aqui?");


//if(!empty($_POST)){
//    if(!empty($_POST['usuario1'])){
//        $u1=$_POST['usuario1'];
//        var_dump($u1);
//        echo("uuuuuuuuuu");
//    }
//}

listarUsuariosStatus($oUsuario1);

function listarUsuariosStatus($id1){
    $oTalk1 = $oUsuario1;
    var_dump($oTalk1);
    echo("vamo q vamo");
         var_dump($id1);
        $idTalker1= $id1;
        echo "entrou";
         var_dump($idTalker1);
        
        echo "entrou na function listarUsuariosStatus";
        $idTalker2="";
        $cUsuarios = "";
//        $oUsuario = new Usuario();
//        $oUsuario->setId($user);
//        $oUsuario->setOnLine(1);
//        $oUsuario->isOnLine();
        
        // para aparecer o nome do usuario no form
       $idTalker1 = obterTodosUsuario($oTalk1->getId()); // obter dados 
       var_dump($idTalker1 = obterTodosUsuario($oTalk1->getId()));
        $oTalker = new Talker();
        $cUsuarios = $oTalker->cUsuarios();
    
        if(empty($_POST['usuario2'])){
            require_once("formTalker.php"); 
        }else{
            $idTalker2 = $_POST['usuario2'];
            $idTalker2 = obterTodosUsuario($idTalker2);


            $idTalker1 = $idTalker1->getUsername();
            $idTalker2 = $idTalker2->getUsername();
            require_once("formDialogo.php");
        }   
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

//listarUsuariosStatus();

// os controllers juntos
//function listarUsuariosStatus(){
//    if(!empty($_POST)){
//        if(!empty($_POST['acao'])){
//            if(!empty($_POST['usuario2'])){
//            $idTalker2 = $_POST['usuario2'];
//            }
//            if(!empty($_POST['usuario1'])){
//            $idTalker1 = $_POST['usuario1'];
//            }
//            $idTalker2 = obterTodosUsuario($idTalker2);
//            $idTalker1 = obterTodosUsuario($idTalker1);
//            $idTalker1 = $idTalker1->getUsername();
//            $idTalker2 = $idTalker2->getUsername();
//            require_once("formDialogo.php");
//        }
//        else{
//          if(!empty($_POST['user'])){
//            $user = $_POST['user'];
//            $idTalker1="";
//            $idTalker2="";
//            $cUsuarios = "";
//            $oUsuario = new Usuario();
//            $oUsuario->setId($user);
//            $oUsuario->setOnLine(1);
//            $oUsuario->isOnLine();
//
//            // para aparecer o nome do usuario no form
//            $idTalker1 = obterTodosUsuario($oUsuario->getId());
//            $oTalker = new Talker();
//            $cUsuarios = $oTalker->cUsuarios();
//            require_once("formTeste.php"); 
//            }  
//        } 
//    }else{
//       require_once("index.php");    
//    }  
//}

