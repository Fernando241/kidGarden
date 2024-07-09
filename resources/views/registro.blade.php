<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style_login.css')}}">
    <title>Registro</title>
</head>
<body>
    <div class="login">
        <form onsubmit="return validarCampo()">
            <div id="imagen">
                <img src=" {{ asset('/img/logoGeniosDelSaber.png')}} " class="logo" width="200" alt="">
            </div>
            <div id="entrada">
                <h3>Registro</h3><br>
                <hr>
                <p id="usuario">* Exclusivo para administradores</p>
                <div class="campos">
                    <label for="txt_cargo">cargo</label>
                    <select id="cargo" name="txt_cargo">
                        <option value="0">Seleccionar cargo</option>
                        <option value="1">Rector(a)</option>
                        <option value="2">Secretaria</option>
                        <option value="3">Contador</option>
                        <option value="4">Coordinador</option>
                        <option value="5">Profesor</option>
                    </select>
                </div>
                <div class="campos">
                    <label for="txt_tipo_documento">Tipo de documento *</label>
                    <select name="txt_tipo_documento" id="tipoDocumento">
                        <option value="0">Seleccionar</option>
                        <option value="1">Cédula de Ciudadania</option>
                        <option value="2">Cédula de Extranjería</option>
                    </select>
                </div>
                <div class="campos">
                    <label for="txt_documento">documento *</label>
                    <input type="number" placeholder="número de documento" id="documento">
                </div>
                <div class="campos">
                    <label for="txt_nombre">Nombres *</label>
                    <input type="text" placeholder="Nombres" id="nombre">
                </div>
                <div class="campos">
                    <label for="txt_apellidos">Apellidos *</label>
                    <input type="text" placeholder="Apellidos" id="apellidos">
                </div>
                <div class="campos">
                    <label for="txt_nombre">fecha de nacimiento *</label>
                    <input type="date" placeholder="Nombres" required>
                </div>
                <div class="campos">
                    <label for="txt_telefono">Telefono *</label>
                    <input type="number" placeholder="teléfono" id="telefono">
                </div>
                <div class="campos">
                    <label for="txt_correo">correo *</label>
                    <input type="email" placeholder="correo electronico" id="correo">
                </div>
                <div class="campos">
                    <label for="txt_password">crear contraseña *</label>
                    <input type="password" placeholder="crear contrasena" id="contraseña">
                </div>
                <div class="campos">
                    <label for="txt_password">confirmar contraseña *</label>
                    <input type="password" placeholder="confirmar contraseña" id="confirmarcontraseña">
                </div>
                <br>
                <hr>
                <button type="submit" class="btn" name="btn_guardar" value="Guardar Datos">Registrarse</button> <!--falta ver la validacion de este boton mirando el codigo del 4 de septiembre-->
            </div>
        </div>
        </form>
    <script src="/js/validacion.js"></script>
</body>
</html>