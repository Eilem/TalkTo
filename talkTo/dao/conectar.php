<?php

//nome do servidor (localhost)
$servidor = "dbmy0062.whservidor.com";
 
//usuário do banco de dados
$user = "linkurbano_3";
 
//senha do banco de dados
$senha = "t4lk3r";
 
//nome da base de dados
$db = "linkurbano_3";
 
//executa a conexão com o banco, caso contrário mostra o erro ocorrido
$conexao = mysql_connect($servidor,$user,$senha) or die (mysql_error());
 
//seleciona a base de dados daquela conexão, caso contrário mostra o erro ocorrido
mysql_select_db($db, $conexao) or die(mysql_error());