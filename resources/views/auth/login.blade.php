<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-color: #f0f4f8;
        }

        .login-container {
            background-color: white;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            padding: 40px;
            max-width: 400px;
            width: 100%;
            margin: auto;
        }

        .logo {
            width: 80px;
            margin-bottom: 20px;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        .form-input {
            padding: 12px;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            width: 100%;
            font-size: 1rem;
            margin-top: 8px;
            transition: all 0.3s ease;
        }

        .form-input:focus {
            border-color: #4fd1c5;
            outline: none;
        }

        .btn-submit {
            background-color: #2563eb; /* Azul más oscuro */
            color: white;
            padding: 12px;
            width: 100%;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-submit:hover {
            background-color: #1d4ed8; /* Azul aún más oscuro al hacer hover */
        }

        .text-center {
            text-align: center;
        }

        /* Estilos para el enlace de regreso */
        .regresar-link {
            position: absolute;
            top: 20px;
            left: 20px;
            font-size: 30px;
            color: #2563eb; /* Azul más oscuro */
            display: flex;
            align-items: center;
            text-decoration: none;
            font-weight: 600;
        }

        .regresar-link:hover {
            color: #1d4ed8; /* Azul más oscuro al hacer hover */
        }

        .regresar-icon {
            width: 30px;
            margin-right: 8px;
        }
    </style>
</head>

<body class="flex justify-center items-center min-h-screen bg-gray-100 relative">
    <!-- Enlace de regresar en la parte superior izquierda -->
    <a href="{{ url('/') }}" class="regresar-link">
        <svg class="regresar-icon" fill="none" viewBox="0 0 20 20" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
        </svg>
    </a>

    <div class="login-container">
        <h2 class="text-2xl font-bold mb-6 text-center text-gray-700">Inicio de Sesión</h2>

        @if (session('message'))
            <div class="alert alert-success mb-4 text-green-500 text-center">{{ session('message') }}</div>
        @endif

        <form method="POST" action="{{ route('login.custom') }}">
            @csrf
            <!-- Email -->
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Correo Electrónico</label>
                <input type="email" name="email" id="email" required class="form-input" placeholder="Ingresa tu correo">
            </div>

            <!-- Contraseña -->
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="contraseña">Contraseña</label>
                <input type="password" name="contraseña" id="contraseña" required class="form-input" placeholder="Ingresa tu contraseña">
            </div>

            <button type="submit" class="btn-submit">Ingresar</button>
        </form>

        <div class="text-center mt-4">
            <p class="text-sm text-gray-500">¿No tienes una cuenta? <a href="{{ url('/register') }}" class="text-blue-600 hover:text-blue-700">Registrate</a></p>
        </div>
    </div>
</body>

</html>
