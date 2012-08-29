<html>
    <head>
        <title>Talk To</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="estilo.css">

    </head>
    <body class="index">
        <form method="POST" action="controller.php"/>
        <h2>Bem Vindo
            <?php
                if(isset($idTalker1)) echo($idTalker1->getUsername());
            ?>
        </h2>
        <select name="usuario2" size="100" multiple="multiple">
            <?php
                    foreach($cUsuarios as $oUsuarios){
                        if($oUsuario->getId()!=$oUsuarios->getId()){
                            echo '<option value="'.$oUsuarios->getId().'">'.$oUsuarios->getUsername()." está: ".validacaoStatus($oUsuarios->getOnLine())." ".validacaoDialogo($oUsuario->getId(),$oUsuarios->getId()).'</option>';
                        }
                    }
                ?>
        </select>
        <p/>
        <input type="hidden" value="<?php echo $idTalker1->getId() ?>" name="usuario1"/>
        <input type="hidden" value="flag" name="acao"/>
        <input type="submit" value="Dialogar" name="dialogar" title="Clique aqui para Iniciar um Di&aacute;logo!!"/>
        <input type="submit" value="Encerrar Diálogo" name="encerrarDialogo" title="Clique aqui para Encerrar este Di&aacute;logo!!"/>
        <input type="submit" value="Sair" name="sair" title="Clique aqui para Sair do Di&aacute;logo"/>
        </form>
    </body>
</html>