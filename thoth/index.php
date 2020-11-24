<!DOCTYPE html>
<html>
<head>
    <!-- Meta -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Styles -->
    <link rel="stylesheet" href="./css/global.css">
    <link rel="stylesheet" href="./css/pages/login.css">

    <!-- Icon -->
    <link rel="icon" href="./img/logo.png">

    <!-- Title -->
    <title>Thoth</title>
</head>
<body>
    <div id="login-page">
        <div class="content-wrapper">
            <form action="GET" class="form-container">
                <div class="logo-group">
                    <img src="./img/logo.png" alt="Thoth">
                    <h1>Seu sistema de biblioteca</h1>
                </div>

                <div class="input-group">
                    <label for="usuario">Usuário:</label>
                    <input type="text" name="usuario" id="usuario" required autofocus>
                </div>

                <div class="input-group">
                    <label for="senha">Senha:</label>
                    <input type="password" name="senha" id="senha" required>
                </div>

                <button type="submit">Entrar</button>
                <a href="#">Esqueci minha senha</a>
            </form>
        </div>
    </div>
</body>
</html>