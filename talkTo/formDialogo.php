<html>
    <head>
        <title>Talk To</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="estilo.css">
        <script type="text/javascript"> 
            function validaMensagem(formulario)
            {
                if(formulario.mensagem.value==""){
                alert("Digite uma mensagem para enviar!");
                return false;
                }
            }
        </script>
    </head>
    <body>
        <form method="POST" action="controleDialogo.php" title="Clique aqui para enviar a Mensagem" class="formDialogo" onSubmit="return validaMensagem(this)">
            <h3>Você esta no Talker To!<h3/>
            <br/>
            <div>
                <textarea name="mensagens">
                  <?php
                  if(isset($dialogo)){
                      echo($dialogo);
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
        </form>
        <form method="POST" action="index.html" title="Clique aqui para Sair do Diálogo">
            <div class="sair">
                <input type="submit" value="Fechar Diálogo" name="fecharDialogo"/>
            </div>
        </form>
    </body>
</html>
