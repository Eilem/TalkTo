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
<<<<<<< HEAD
        <form method="POST" action="controllerLogin.php" class="index" onSubmit="return verificaUsuario(this)">
=======
        <form method="POST" action="teste.php" class="index"/>
>>>>>>> f78d4c164f0505918cfc03ceaa5ac49c46859eeb
        <img src="welcome_talker.jpg"/>
        <h2>Bem vindo ao Talk To!!</h2>
        Usu&aacute;rio <input type="text" name="user" id="user"/>        
        <input type="submit" value="Entrar" name="entrar"/> 
        </form>
    </body>
</html>
