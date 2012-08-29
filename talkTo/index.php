<html>
    <head>
        <title>Talk To</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="estilo.css">
        <script type="text/javascript">
            function validaMensagem(formulario)
            {
                if(formulario.user.value==""){
                alert("Digite uma mensagem para enviar!");
                return false;
                }
            }
        </script>
    </head>
    
    <body class="index">
        <form method="POST" action="controller.php" class="index" onSubmit="return verificaUsuario(this)">
        <img src="welcome_talker.jpg"/>
        <h2>Bem vindo ao Talk To!!</h2>
        Usu&aacute;rio <input type="text" name="usuario1" id="user"/>        
        <input type="submit" value="Entrar" name="entrar"/> 
        </form>
    </body>
</html>
