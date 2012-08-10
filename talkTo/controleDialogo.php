<?php
require_once(dirname(__DIR__).'../TalkTo/Negocio/Mensagem.php');
    if(isset($_POST['mensagem'])){
        $mensagem = $_POST['mensagem']; 
        echo $mensagem;
    }
    else {
        echo("Digite uma mensagem para enviar!");    
    }

$oMensagem= new Mensagem();
$oMensagem->setTexto($mensagem);
