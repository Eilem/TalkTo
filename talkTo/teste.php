<?php

require_once(dirname(__FILE__) . '/DAO/DAO.php');
require_once(dirname(__FILE__) . '/DAO/ProxyDAO.php');
require_once(dirname(__FILE__) . '/Negocio/Dialogo.php');
require_once(dirname(__FILE__) . '/Negocio/Mensagem.php');

$dialogo = new Dialogo();

$texto = "teste de textos";
$dialogo->inserirMensagem($texto);

$dialogo->colecaoMensagens();
