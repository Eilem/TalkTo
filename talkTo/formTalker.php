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
         <input type="submit" value="Dialogar" name="dialogar"/> 
        
        </fomr>
    </body>
</html>

