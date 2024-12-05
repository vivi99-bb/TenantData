<div class="bg-gray-800 text-white w-64 h-screen p-6">
    <h2 class="text-2xl font-semibold mb-8">Arrendador</h2>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" role="menu">
                <li class="nav-item">
                    <a href="{{ route('arrendadores.dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Inicio</p>
                    </a>
                </li>

                <!-- NUEVA Opción: Buscar -->
                <li class="nav-item">
                    <a href="{{ url('/buscar') }}" class="nav-link">
                        <i class="fa-solid fa-search mr-3"></i> <!-- Icono para buscar -->
                        Buscar
                    </a>
                </li>
                

                <!-- Opción: Agregar Propiedad -->
                <li class="nav-item">
                    <a href="{{ url('/arrendador/propiedades') }}" class="nav-link">
                        <i class="fa-solid fa-home mr-3"></i> <!-- Icono para propiedades -->
                        Propiedades
                    </a>
                </li>
                
                <!-- Opción: Agregar Reporte -->
                <li class="nav-item">
                    <a href="{{ url('/reportes/agregar') }}" class="nav-link">
                        <i class="fa-solid fa-file-alt mr-3"></i> <!-- Icono para reportes -->
                        Agregar Reporte
                    </a>
                </li>
                
                <!-- Opción: Ver Arrendatarios -->
                <li class="nav-item">
                    <a href="{{ url('/arrendador/ver-arrendatarios') }}" class="nav-link">
                        <i class="fa-solid fa-users mr-3"></i> <!-- Icono para arrendatarios -->
                        Ver Arrendatarios
                    </a>
                </li>
                
                <!-- Opción: Mi Perfil -->
                <li class="nav-item">
                    <a href="{{ url('/mi-perfil') }}" class="nav-link">
                        <i class="fa-solid fa-user mr-3"></i> <!-- Icono para perfil -->
                        Mi Perfil
                    </a>
                </li>
                

                {{-- Agrega más enlaces aquí --}}
            </ul>
        </nav>
    </div>
</div>
