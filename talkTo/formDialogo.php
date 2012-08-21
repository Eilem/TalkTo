<html>
    <head>
        <title>Talk To</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="estilo.css">
    </head>
    <body>
        <form method="POST" action="controleDialogo.php" class="formDialogo">
            <h3>Você esta no Talker To!<h3/>
            <br/>
            <div>
                <input type="hidden" name="idDialogo" value="<?php if(isset($id)) echo($id);?>"/>
            </div>
            <div>
                User 1<input type="text" name="idTalker1" value="<?php if(isset($idTalker1)) echo($idTalker1);?>"/>
                User 2<input type="text" name="idTalker2" value="<?php if(isset($idTalker2)) echo($idTalker2);?>"/>
            </div>            
            <div>
                <textarea name="mensagens" readonly>
                  <?php               
                  if(isset($dialogo)){
                      echo $dialogo;
                  }
                  ?>
                </textarea>
            </div>
            <br/>
            <div>
                <input type="text" name="mensagem" id="texto" />
            </div>
            <br/>
            <div>
                <input type="submit" value="Enviar Mensagem" name="texto"/>
            </div>
            
            <input type="submit" value="Atualizar" name="atualizar"/>
            <input type="submit" value="Fechar Dialogo" name="fecharDialogo"/>

        </form>
       
        
        
        <form method="POST" action="index.html" title="Clique aqui para Sair do DiÃ¡logo">
            <div class="sair">
                <input type="submit" value="Sair" name="sair"/>
            </div>
        </form>
    </body>
</html>
