<!-- resources/views/components/navbar.blade.php -->

<nav class="navbar">
    <div class="logo">
        <img src="{{ asset('img/logo2.png') }}" alt="TenantData Logo">
        TenantData
    </div>
    
    <ul class="nav-links">
        <li><a href="#inicio" class="active">Inicio</a></li>
        <li><a href="#benefits-section" class="text-blue-500 hover:underline">Beneficios</a></li>
        <li><a href="#examples-section">Casos de Éxito</a></li>
    </ul>
    <div class="auth-links">
        <a href="{{ url('/login') }}" class="signin-button">Iniciar Sesión</a>
        <a href="{{ url('register') }}" class="signup-button">Regístrate</a>
    </div>
</nav>


