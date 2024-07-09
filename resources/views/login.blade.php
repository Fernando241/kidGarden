<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style_login.css')}}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Login</title>
</head>
<body>
    <div class="login">
        <div id="imagen">
            <img src=" {{ asset('/img/logoGeniosDelSaber.png')}} " class="logo" width="300" alt="">
        </div>
        <div id="entrada">
            <h1>Login</h1>
            <div id="usuario">
                <label for="txt_usuario">Tipo de Usuario</label>
                <select name="txt_usuario" id="">
                    <option value="0">Seleccionar</option>
                    <option value="1">Administrador</option>
                    <option value="2">Acudiente</option>
                </select>
            </div>
            <div class="input-box">
                <input type="text" placeholder="Usuario" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Contraseña" required>
                <i class='bx bxs-lock-alt'></i>
            </div>
            <div class="remember-forgot">
                <label><input type="checkbox">Recordar</label>
                <a href="#">Restaurar contraseña</a>
            </div>
            <button type="submit" class="btn">Iniciar Sesión</button>
            <div class="registro">
                <p>¿No estas registrado?<a href="#">Registrar</a></p>
                
            </div>
        </div>
    </div>
</body>
</html>