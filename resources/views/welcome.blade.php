<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TenantData</title>
    <!-- Estilos CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <x-navbar />
   
    <!-- Sección Principal -->
    <section class="hero-section ">
        <div class="hero-content fade-in " id="inicio">
            <h1>Bienvenido a TenantData</h1>
            <p style="align-align: center">En TenantData, somos tu aliado en la selección de inquilinos de confianza. Con nuestro sistema, podrás tomar decisiones informadas y respaldadas por historiales detallados y confiables de posibles inquilinos. Entiendo lo importante que es proteger tu propiedad y asegurar su estabilidad, por eso te ayudo a reducir riesgos, minimizar problemas de impago y crear relaciones duraderas con arrendatarios responsables. Con TenantData, puedes gestionar tus alquileres con tranquilidad y confianza, sabiendo que tienes toda la información necesaria para tomar las mejores decisiones.
            </p>
            <a href="{{ url('register')}}" class="get-started-button ">Comienza Ahora</a>
        </div>
        <div class="hero-image">
            <img src="{{ asset('img/image.png') }}" alt="TenantData Illustration">
        </div>
    </section>

    <!-- Sección de Beneficios -->
    <section class="benefits-section fade-in" id="benefits-section">
        <h2>¿Por qué elegir TenantData?</h2>
        <ul>
            <li><strong>Análisis Rápido y Completo:</strong> Consulta historiales detallados en minutos.</li>
            <li><strong>Seguridad y Confianza:</strong> Toma decisiones con información precisa y confiable.</li>
            <li><strong>Eficiencia en el Proceso:</strong> Ahorra tiempo y minimiza riesgos en la selección de inquilinos.</li>
        </ul>
    </section>

<!-- Sección de Ejemplos -->
<section class="examples-section fade-in" id="examples-section">
    <h2 class="text-2xl font-bold mb-6 text-center text-blue-600">Ejemplos de Uso</h2>
    
    <!-- Contenedor de dos columnas -->
    <div class="flex flex-col md:flex-row md:justify-between gap-8">
        
        <!-- Experiencia 1 -->
        <div class="bg-gray-100 p-6 rounded-lg shadow-lg w-full md:w-1/2">
            <p class="font-semibold text-lg">Experiencia:</p>
            <p>
                <strong>María</strong> es propietaria de varios apartamentos y solía depender de referencias informales. Con TenantData, ahora accede a reportes completos de historial de inquilinos, tomando decisiones con confianza y evitando problemas de impagos.
            </p>
        </div>
        
        <!-- Experiencia 2 -->
        <div class="bg-gray-100 p-6 rounded-lg shadow-lg w-full md:w-1/2">
            <p class="font-semibold text-lg">Experiencia:</p>
            <p>
                <strong>Juan</strong>, gerente de una agencia de arrendamiento, usa TenantData para verificar rápidamente el historial de arrendatarios. Esto le ha permitido optimizar su proceso de selección, reduciendo el tiempo y los costos asociados a la búsqueda de inquilinos confiables.
            </p>
        </div>
        
    </div>
</section>


    <!-- Estilos Integrados -->

        <!-- Script para animación de scroll y fade-in -->
        <script>
            // Observador para el desvanecimiento de las secciones
            const sections = document.querySelectorAll('.fade-in');
            const navLinks = document.querySelectorAll('.nav-links a');
        
            // Configuración del IntersectionObserver para animaciones
            const observerOptions = {
                threshold: 0.5, // El porcentaje de visibilidad para activar la animación
            };
        
            const sectionObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('show');
                    } else {
                        entry.target.classList.remove('show');
                    }
                });
            }, observerOptions);
        
            sections.forEach(section => sectionObserver.observe(section));
        
            // Resaltado de navegación
            const navObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const id = entry.target.getAttribute('id');
                        navLinks.forEach(link => {
                            link.classList.toggle('active', link.getAttribute('href').includes(id));
                        });
                    }
                });
            }, {
                threshold: 0.5
            });
        
            sections.forEach(section => navObserver.observe(section));
        </script>
        

</body>
</html>
