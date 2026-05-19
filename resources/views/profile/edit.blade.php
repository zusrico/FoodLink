<x-app-layout>
<body class="user-dashboard-body">
    <nav class="top-navbar">
        <div class="navbar-container">
            <div class="navbar-logo"><h1>FoodLink</h1></div>
            <div class="navbar-center">
                <a href="{{ route('dashboard') }}" class="nav-link">Inicio</a>
                <a href="#restaurantes" class="nav-link">Restaurantes</a>
                <a href="#history" class="nav-link">Mis pedidos</a>
                <a href="{{ route('profile.edit') }}" class="nav-link">Mi perfil</a>
            </div>
            <div class="navbar-right">
                <button class="notification-btn">🔔<span class="badge">2</span></button>
                <div class="profile-menu">
                    <button class="profile-btn">👤</button>
                    <div class="profile-dropdown">
                        <a href="{{ route('profile.edit') }}">Mi perfil</a>
                        <hr>
                        <form method="POST" action="{{ route('logout') }}">@csrf<button type="submit" class="button-as-link" style="padding:.75rem 1.5rem; width:100%; text-align:left;">Cerrar sesión</button></form>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <main class="user-main">
        <section class="profile-section">
            <div class="profile-container">
                <div class="profile-header">
                    <h1>Mi Perfil</h1>
                    <p class="profile-subtitle">Gestiona tu información personal y seguridad</p>
                </div>

                <div class="profile-card">
                    <h2>Información personal</h2>
                    @include('profile.partials.update-profile-information-form')
                </div>

                <div class="profile-card">
                    <h2>Cambiar contraseña</h2>
                    @include('profile.partials.update-password-form')
                </div>

                <div class="profile-card delete-card">
                    <h2>Eliminar cuenta</h2>
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </section>
    </main>

</body>
</x-app-layout>
