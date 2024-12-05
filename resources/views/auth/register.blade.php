<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Registro de Usuario</title>
<style>
        /* Notificación personalizada */
        .alert {
        padding: 15px;
        margin-bottom: 20px;
        border: 1px solid transparent;
        border-radius: 4px;
    }
    .alert-success {
        color: #155724;
        background-color: #d4edda;
        border-color: #c3e6cb;
    }
</style>
</head>

<body class="flex justify-center items-center min-h-screen bg-gray-100 relative">
    
    
    <div class="container mx-auto px-80 py-8">

        
        <!-- Notificaciones -->
        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
            <a href="{{ url('/') }}" class="text-gray-600 hover:text-gray-800">
                <svg class="h-12 w-12 text-teal-500"  fill="none" viewBox="0 0 24 24" stroke="currentColor" >
                    
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                  
                </svg>
            </a> 
            @else
            <a href="{{ url('/') }}" class="text-gray-600 hover:text-gray-800">
                <svg class="h-12 w-12 text-teal-500"  fill="none" viewBox="0 0 24 24" stroke="currentColor" >
                    
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                  
                </svg>
            </a>
        @endif
           
    
        <form method="POST" action="{{ route('register.custom') }}" class="container mx-auto max-w-lg bg-white shadow-md rounded-lg p-8">
            @csrf
            <h2 class="text-2xl font-bold mb-2 text-center" >Registro de Usuario</h2>
    
            <!-- Nombre -->
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Nombre:</label>
                <input type="text" name="nombre" required class="form-control border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring focus:ring-blue-300">
            </div>
    
            <!-- Apellido -->
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Apellido:</label>
                <input type="text" name="apellido" required class="form-control border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring focus:ring-blue-300">
            </div>
    
            <!-- Email -->
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Email (usuario):</label>
                <input type="email" name="email" required class="form-control border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring focus:ring-blue-300">
            </div>
    
            <!-- Contraseña -->
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Contraseña: <strong>8 carcteres</strong></label>
                <input type="password" name="contraseña" required class="form-control border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring focus:ring-blue-300">
            </div>
    
            <!-- Seleccionar Rol -->
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Rol:</label>
                <select name="rol" id="rol" required class="form-control border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring focus:ring-blue-300" onchange="toggleFields()">
                    <option value="">Seleccione</option>
                    <option value="arrendador">Arrendador</option>
                    <option value="agencia_arrendamiento">Agencia de Arrendamiento</option>
                </select>
            </div>

            
    
            <!-- Campos para Arrendador -->
            <div id="arrendadorFields" style="display: none;" class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Identificación:</label>
                <input type="text" name="identificacion" class="form-control border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring focus:ring-blue-300">
                
                <label class="block text-gray-700 text-sm font-bold mb-2 mt-4">Dirección:</label>
                <input type="text" name="direccion" class="form-control border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring focus:ring-blue-300">
                
                <label class="block text-gray-700 text-sm font-bold mb-2 mt-4">Teléfono:</label>
                <input type="text" name="telefono" class="form-control border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring focus:ring-blue-300">
                
                <label class="block text-gray-700 text-sm font-bold mb-2 mt-4">Teléfono Fijo:</label>
                <input type="text" name="tel_contacto" class="form-control border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring focus:ring-blue-300">
                
                <label class="block text-gray-700 text-sm font-bold mb-2 mt-4">Correo Electrónico :</label>
                <input type="email" name="correo_electronico" class="form-control border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring focus:ring-blue-300">
            </div>
    
            <!-- Campos para Agencia -->
            <div id="agenciaFields" style="display: none;" class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Nombre de Agencia:</label>
                <input type="text" name="nombre_agencia" class="form-control border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring focus:ring-blue-300">
                
                <label class="block text-gray-700 text-sm font-bold mb-2 mt-4">Dirección de Agencia:</label>
                <input type="text" name="direccion_agencia" class="form-control border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring focus:ring-blue-300">
                
                <label class="block text-gray-700 text-sm font-bold mb-2 mt-4">Teléfono de Agencia:</label>
                <input type="text" name="telefono_agencia" class="form-control border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring focus:ring-blue-300">
                
                <label class="block text-gray-700 text-sm font-bold mb-2 mt-4">NIT:</label>
                <input type="text" name="nit" class="form-control border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring focus:ring-blue-300">
                
                <label class="block text-gray-700 text-sm font-bold mb-2 mt-4">Teléfono de Contacto de Agencia:</label>
                <input type="text" name="tel_contacto_agencia" class="form-control border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring focus:ring-blue-300">
                
                <label class="block text-gray-700 text-sm font-bold mb-2 mt-4">Correo de Contacto de Agencia:</label>
                <input type="email" name="correo_contacto_agencia" class="form-control border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring focus:ring-blue-300">
            </div>
    
            <button type="submit" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Registrar</button>
            <div class="text-center mt-4">
                <p class="text-sm text-gray-500">¿Ya tienes una cuenta? <a href="{{ url('/login') }}" class="text-blue-600 hover:text-blue-700">Iniciar sesion</a></p>
            </div>
        </form>
    </div>
    
    <script>
        
        function toggleFields() {
            const rol = document.getElementById('rol').value;
            document.getElementById('arrendadorFields').style.display = rol === 'arrendador' ? 'block' : 'none';
            document.getElementById('agenciaFields').style.display = rol === 'agencia_arrendamiento' ? 'block' : 'none';
        }
    </script>
    
</body>
</html>