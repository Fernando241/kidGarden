<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style_login.css')}}">
    <title>Solicitud de cupo</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div class="login">
        <form method="POST" action="{{ route('solicituds.store') }}" id="solicitudForm">
            @csrf {{-- token de seguridad --}}
            <div id="entrada">
                <h3>Solicitud de cupo</h3>
                <p class="datos">Jardín Infantil Genios del Saber</p><br>
                <hr>
                <p class="datos">Datos del Estudiante</p><br>
                <div class="campos">
                    <label for="tipo_documento">Tipo de documento *</label>
                    <select name="tipo_documento" id="tipo_documento" class="form-control" required>
                        <option value="">Seleccionar</option>
                        <option value="nacido vivo">Nacido Vivo</option>
                        <option value="registro civil">Registro Civil</option>
                        <option value="tarjeta de identidad">Tarjeta de Identidad</option>
                        <option value="tarjeta de extranjería">Tarjeta de Extranjería</option>
                    </select>
                </div>
                <div class="campos">
                    <label for="documento">documento *</label>
                    <input type="number"  name="documento" id="documento" placeholder="número de documento" required>
                </div>
                <div class="campos">
                    <label for="nombre">Nombres *</label>
                    <input type="text" name="nombres" id="nombres" placeholder="Nombres" required>
                </div>
                <div class="campos">
                    <label for="apellidos">Apellidos *</label>
                    <input type="text" name="apellidos" id="apellidos" placeholder="Apellidos" required>
                </div>
                <div class="campos">
                    <label for="fecha_nacimiento">fecha de nacimiento *</label>
                    <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" required>
                </div>
                <div class="campos">
                    <label for="grado">Grado *</label>
                    <select name="grado" id="grado" required>
                        <option value="">selecione el grado</option>
                        <option value="Parvulos">Pärvulos (2 a 3 años)</option>
                        <option value="Pre Jardin">Pre-jardín (3 a 4 años)</option>
                        <option value="Jardin">Jardín (4 a 5 años)</option>
                        <option value="Transicion">Transición (5 a 6 años)</option>
                    </select>
                </div>
                <br>
                <hr>
                <p class="datos">Datos del Representante o Acudiente</p><br>
                <div class="campos">
                    <label for="tipo_documento_acudiente">Tipo de documento *</label>
                    <select name="tipo_documento_acudiente" id="tipo_documento_acudiente" required>
                        <option value="">Seleccionar</option>
                        <option value="cédula de ciudadanía">Cédula de Ciudadania</option>
                        <option value="cédula de extranjería">Cédula de Extranjeria</option>
                    </select>
                </div>
                <div class="campos">
                    <label for="documento_acudiente">documento *</label>
                    <input type="number" name="documento_acudiente" id="documento_acudiente" placeholder="documento del Acudiente" required>
                </div>
                <div class="campos">
                    <label for="nombre_acudiente">Nombre *</label>
                    <input type="text" id="nombre_acudiente" name="nombre_acudiente" value="{{ $user->name }}" readonly>
                </div>
                <div class="campos">
                    <label for="telefono">Teléfono *</label>
                    <input type="number" name="telefono" id="telefono" placeholder="Teléfono" required>
                </div>
                <div class="campos">
                    <label for="direccion">Dirección *</label>
                    <input type="text" name="direccion" id="direccion" placeholder="Dirección" required="required">
                </div>
                <div class="campos">
                    <label for="correo">correo *</label>
                    <input type="email" id="correo" name="correo" value="{{ $user->email }}" readonly>
                </div>
                <div class="campos">
                    <label for="parentesco">Parentesco *</label>
                    <input type="text" name="parentesco" id="parentesco" placeholder="escriba el parentesco" required="required">
                </div>
    
                <button type="submit" class="btn btn-primary">Solicitar cupo</button>
            </div>
        </form>
        <script>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                document.getElementById('solicitudForm').addEventListener('submit', function(event) {
                    event.preventDefault(); // Prevenir el envío del formulario

                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Su solicitud a sido enviada con exito!',
                            showConfirmButton: false,
                            timer: 1500
                        }).then((result) => {
                            if (result.dismiss === Swal.DismissReason.timer) {
                                // Enviar el formulario después de mostrar la alerta
                                event.target.submit();
                            }
                        });
                    });
            </script>
        </script>
</body>
</html>