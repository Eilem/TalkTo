<html>
    <head>
        <title>Talk To</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="estilo.css">

    </head>
    <body class="index">
        <form method="POST" action="controleDialogo.php"/>
        <h2>Bem Vindo <?php if(isset($idTalker1)) echo($idTalker1);?></h2>
        <select name="usuario2" size="15"  multiple="multiple">
                <option value="">Usuarios</option>
                <?php
                    foreach($cUsuarios as $oUsuarios){
                        echo '<option value="'.$oUsuarios->getId().'">'.$oUsuarios->getUsername().": ".$oUsuarios->getOnLine().'</option>';                  
                    } 
                ?>
        </select>
            <p/>
         <input type="submit" value="Dialogar" name="dialogar" title="Clique aqui para Iniciar um Di&aacute;logo!!"/> 
         <input type="submit" value="Encerrar Diálogo" name="encerrar" title="Clique aqui para Encerrar este Di&aacute;logo!!"/> 
        
        </fomr>
    </body>
</html>

