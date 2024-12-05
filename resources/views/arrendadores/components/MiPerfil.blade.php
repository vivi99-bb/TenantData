@extends('layouts.app2')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6 text-gray-800">Mi Perfil</h1>

        @if (session('message'))
            <div class="bg-green-500 text-white p-4 rounded mb-6">
                {{ session('message') }}
            </div>
        @endif

        <!-- Información del Perfil -->
        <div class="bg-white shadow-md rounded-lg p-6 mb-6">
            <h2 class="text-xl font-semibold mb-4 text-gray-700">Información Actual</h2>
            <div class="space-y-4">
                <p><strong class="text-gray-600">Nombre:</strong> {{ $usuario->nombre }}</p>
                <p><strong class="text-gray-600">Apellido:</strong> {{ $usuario->apellido }}</p>
                <p><strong class="text-gray-600">Correo Electrónico:</strong> {{ $usuario->email }}</p>
            </div>
            <button 
                id="openModal" 
                class="mt-4 bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                Editar Perfil
            </button>
        </div>
    </div>

    <!-- Modal -->
    <div id="profileModal" class="fixed inset-0 bg-gray-800 bg-opacity-50 hidden items-center justify-center">
        <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-lg relative">
            <button id="closeModal" class="absolute top-2 right-2 text-gray-500 hover:text-gray-800">
                ✕
            </button>
            <h2 class="text-2xl font-bold mb-4 text-gray-800">Editar Perfil</h2>
            <form action="{{ route('arrendador.actualizarPerfil') }}" method="POST">
                @csrf
                <!-- Nombre -->
                <div class="mb-4">
                    <label for="name" class="block font-semibold mb-1 text-gray-700">Nombre</label>
                    <input type="text" id="name" name="name" value="{{ $usuario->nombre }}" 
                           class="w-full border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>

                <!-- Apellido -->
                <div class="mb-4">
                    <label for="apellido" class="block font-semibold mb-1 text-gray-700">Apellido</label>
                    <input type="text" id="apellido" name="apellido" value="{{ $usuario->apellido }}" 
                           class="w-full border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="block font-semibold mb-1 text-gray-700">Correo Electrónico</label>
                    <input type="email" id="email" name="email" value="{{ $usuario->email }}" 
                           class="w-full border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>

                <!-- Contraseña -->
                <div class="mb-4">
                    <label for="password" class="block font-semibold mb-1 text-gray-700">Contraseña (Opcional)</label>
                    <input type="password" id="password" name="password" 
                           class="w-full border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <small class="text-gray-500">Déjalo vacío si no deseas cambiar tu contraseña.</small>
                </div>

                <!-- Confirmar Contraseña -->
                <div class="mb-4">
                    <label for="password_confirmation" class="block font-semibold mb-1 text-gray-700">Confirmar Contraseña</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" 
                           class="w-full border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Botón -->
                <div>
                    <button type="submit" 
                            class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                        Guardar Cambios
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Manejo del Modal
        const openModal = document.getElementById('openModal');
        const closeModal = document.getElementById('closeModal');
        const profileModal = document.getElementById('profileModal');

        openModal.addEventListener('click', () => {
            profileModal.classList.remove('hidden');
            profileModal.classList.add('flex');
        });

        closeModal.addEventListener('click', () => {
            profileModal.classList.add('hidden');
            profileModal.classList.remove('flex');
        });
    </script>
@endsection
