<!DOCTYPE html>
<html lang="port-br">
<head>
    <link rel="shortcut icon" type="imagex/png" href="assets/media/Logo-menor.png">
    
	<title>Donas</title>
	<link rel="stylesheet" type="text/css" href="assets/css/styles-adm.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<img class="wave" src="assets/media/Onda.png">
	<div class="container">
		<div class="img">
			<img src="assets/media/LOGO.png">
            <div id="linha-vertical"></div>
		</div>
		<div class="login-content">
			<form action="authenticate-session-adm.php" method="post">
				<h2 class="title">Bem-Vindo</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Login</h5>
           		   		<input type="text" name="txtlogin" class="input">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Senha</h5>
           		    	<input type="password" name="txtsenha" class="input">
            	   </div>
            	</div>
            	<br>
            	<input type="submit" class="btn" value="Login">
                <a href="">DONAS</a>
            </form>
        </div>
    </div>
    <script type="text/javascript" src="assets/js/main.js"></script>
</body>
</html>