<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style_login.css')}}">
    <title>Solicitud de cupo</title>
</head>
<body>
    <div class="login">
        <form name="frm_usuarios" method="post" action="registro.html">
            <div id="imagen">
                <img src=" {{ asset('/img/logoGeniosDelSaber.png')}} " class="logo" width="200" alt="">
            </div>
            <div id="entrada">
                <h3>Solicitud de cupo</h3><br>
                <hr>
                <p class="datos">Datos del Estudiante</p><br>
                <div class="campos">
                    <label for="txt_tipo_documento">Tipo de documento *</label>
                    <select name="txt_tipo_documento" id="">
                        <option value="0">Seleccionar</option>
                        <option value="1">Nacido vivo</option>
                        <option value="2">Registro civil</option>
                        <option value="3">Tarjeta de identidad</option>
                        <option value="4">Tarjeta de extranjeria</option>
                    </select>
                </div>
                <div class="campos">
                    <label for="txt_documento">documento *</label>
                    <input type="number" placeholder="número de documento" required>
                </div>
                <div class="campos">
                    <label for="txt_nombre">Nombres *</label>
                    <input type="text" placeholder="Nombres" required>
                </div>
                <div class="campos">
                    <label for="txt_apellidos">Apellidos *</label>
                    <input type="text" placeholder="Apellidos" required>
                </div>
                <div class="campos">
                    <label for="txt_nombre">fecha de nacimiento *</label>
                    <input type="date" placeholder="Nombres" required>
                </div>
                <div class="campos">
                    <label for="txt_grado">Grado *</label>
                    <select name="txt_grado" id="">
                        <option value="0">selecione el grado</option>
                        <option value="1">Pärvulos (2 a 3 años)</option>
                        <option value="2">Pre-jardín (3 a 4 años)</option>
                        <option value="3">Jardín (4 a 5 años)</option>
                        <option value="4">Transición (5 a 6 años)</option>
                    </select>
                </div>
                <br>
                <hr>
                <p class="datos">Datos del Representante o Acudiente</p><br>
                <div class="campos">
                    <label for="txt_tipo_documento_acudiente">Tipo de documento *</label>
                    <select name="txt_tipo_documento" id="">
                        <option value="0">Seleccionar</option>
                        <option value="1">Cédula de Ciudadania</option>
                        <option value="2">Cédula de Extranjeria</option>
                    </select>
                </div>
                <div class="campos">
                    <label for="txt_tipo_documento_acudiente">documento *</label>
                    <input type="number" placeholder="número de documento" required>
                </div>
                <div class="campos">
                    <label for="txt_nombre">Nombres *</label>
                    <input type="text" placeholder="Nombres" required>
                </div>
                <div class="campos">
                    <label for="txt_apellidos">Apellidos *</label>
                    <input type="text" placeholder="Apellidos" required>
                </div>
                <div class="campos">
                    <label for="txt_nombre">Teléfono *</label>
                    <input type="number" placeholder="Teléfono" required>
                </div>
                <div class="campos">
                    <label for="txt_correo">correo *</label>
                    <input type="email" name="txt_correo" required="required" placeholder="correo">
                </div>
                <div class="campos">
                    <label for="txt_parentezco">Parentezco *</label>
                    <input type="text" name="txt_parentezco"  required="required" placeholder="escriba el parentezco">
                </div>
    
                <button type="submit" class="btn" name="btn_guardar" value="Guardar Datos">Solicitar cupo</button> <!--falta ver la validacion de este boton mirando el codigo del 4 de septiembre-->
            </div>
        </div>
    
        </form>
</body>
</html>