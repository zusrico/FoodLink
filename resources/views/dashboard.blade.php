<x-app-layout>
@if(auth()->user()->role === 'admin')
<body class="admin-body">
    <aside class="sidebar">
        <div class="sidebar-header">
            <h2>FoodLink</h2>
            <p class="sidebar-subtitle">Admin Panel</p>
        </div>

        <nav class="sidebar-nav">
            <a href="{{ route('dashboard') }}" class="nav-item active">
                <span class="nav-icon">📊</span><span>Dashboard</span>
            </a>
            <a href="#" class="nav-item"><span class="nav-icon">👥</span><span>Usuarios</span></a>
            <a href="#" class="nav-item"><span class="nav-icon">🏪</span><span>Restaurantes</span></a>
            <a href="{{ route('productos.index') }}" class="nav-item"><span class="nav-icon">📦</span><span>Productos</span></a>
            <a href="{{ route('productos.index') }}" class="nav-item"><span class="nav-icon">🛒</span><span>Pedidos</span></a>
            <a href="#" class="nav-item"><span class="nav-icon">📈</span><span>Estadísticas</span></a>
            <form method="POST" action="{{ route('logout') }}" class="logout-form">
                @csrf
                <button type="submit" class="nav-item logout button-as-link">
                    <span class="nav-icon">🚪</span><span>Cerrar sesión</span>
                </button>
            </form>
        </nav>
    </aside>

    <div class="main-container">
        <header class="admin-header">
            <div class="header-left">
                <h1>Panel de Administración</h1>
                <p class="header-subtitle">Resumen general de la actividad de FoodLink</p>
            </div>
            <div class="header-right">
                <div class="admin-info">
                    <div class="notifications"><span class="notification-icon">🔔</span><span class="notification-badge">3</span></div>
                    <div class="admin-profile">
                        <div class="avatar">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</div>
                        <div class="profile-info">
                            <p class="admin-name">{{ auth()->user()->name }}</p>
                            <p class="admin-role">Administrador</p>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <main class="dashboard-content">
            <section class="summary-cards">
                <div class="card"><div class="card-header">Usuarios registrados</div><div class="card-number">248</div><div class="card-footer">↑ 12 nuevos esta semana</div></div>
                <div class="card"><div class="card-header">Restaurantes activos</div><div class="card-number">34</div><div class="card-footer">↑ 2 nuevos esta semana</div></div>
                <div class="card"><div class="card-header">Productos publicados</div><div class="card-number">{{ \App\Models\Producto::count() ?? 0 }}</div><div class="card-footer">Catálogo en base de datos</div></div>
                <div class="card"><div class="card-header">Pedidos activos</div><div class="card-number">27</div><div class="card-footer">En tiempo real</div></div>
            </section>

            <section class="quick-access">
                <h2>Accesos Rápidos</h2>
                <div class="access-buttons">
                    <button class="access-btn"><span class="btn-icon">👥</span><span>Gestionar Usuarios</span></button>
                    <button class="access-btn"><span class="btn-icon">🏪</span><span>Gestionar Restaurantes</span></button>
                    <a href="{{ route('productos.create') }}" class="access-btn link-btn"><span class="btn-icon">📦</span><span>Nuevo Producto</span></a>
                    <a href="{{ route('productos.index') }}" class="access-btn link-btn"><span class="btn-icon">🛒</span><span>Ver Productos</span></a>
                    <button class="access-btn"><span class="btn-icon">📄</span><span>Generar Informe</span></button>
                </div>
            </section>

            <section class="dashboard-grid">
                <div class="card-section">
                    <h2>Actividad Reciente</h2>
                    <table class="activity-table">
                        <thead><tr><th>Acción</th><th>Fecha</th></tr></thead>
                        <tbody>
                            <tr><td>Nuevo restaurante registrado</td><td>12/10/2025</td></tr>
                            <tr><td>Producto actualizado</td><td>12/10/2025</td></tr>
                            <tr><td>Pedido #1054 entregado</td><td>12/10/2025</td></tr>
                            <tr><td>Usuario desactivado</td><td>11/10/2025</td></tr>
                            <tr><td>Restaurante verificado</td><td>11/10/2025</td></tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-section">
                    <h2>Pedidos Recientes</h2>
                    <table class="orders-table">
                        <thead><tr><th>ID</th><th>Usuario</th><th>Estado</th><th>Total</th></tr></thead>
                        <tbody>
                            <tr><td>#1058</td><td>Ana Ruiz</td><td><span class="status preparing">En preparación</span></td><td>18,50 €</td></tr>
                            <tr><td>#1057</td><td>Carlos Gil</td><td><span class="status delivered">Entregado</span></td><td>24,90 €</td></tr>
                            <tr><td>#1056</td><td>Marta López</td><td><span class="status pending">Pendiente</span></td><td>13,00 €</td></tr>
                            <tr><td>#1055</td><td>Jorge Martín</td><td><span class="status delivering">En camino</span></td><td>32,75 €</td></tr>
                        </tbody>
                    </table>
                </div>
            </section>
        </main>
    </div>
</body>
@else
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
        <section class="hero-section">
            <div class="hero-content">
                <h2>Hola, {{ auth()->user()->name }}</h2>
                <p>¿Qué te apetece comer hoy?</p>
                <a href="{{ route('productos.index') }}" class="btn-primary" style="text-decoration:none; display:inline-block;">Explorar restaurantes</a>
            </div>
        </section>

        <section class="active-orders">
            <h2>Pedido activo</h2>
            <div class="orders-container">
                <div class="order-card active">
                    <div class="order-header"><h3>Pizza Perfecta</h3><span class="order-status preparing">En preparación</span></div>
                    <p class="order-info">Orden #1058 • 18,50 €</p>
                    <div class="progress-bar"><div class="progress-fill" style="width:55%;"></div></div>
                    <div class="progress-steps"><span class="step completed">Confirmado</span><span class="step active">Preparando</span><span class="step">Entregando</span><span class="step">Entregado</span></div>
                </div>
            </div>
        </section>

        <section class="favorites">
            <h2>Tus Favoritos</h2>
            <div class="restaurants-grid">
                <div class="restaurant-card"><div class="restaurant-image">🍕</div><h3>Pizza Perfecta</h3><p class="rating">⭐ 4.8 (324)</p><p class="delivery">📍 2.5 km • 25-35 min</p><a href="{{ route('productos.index') }}" class="btn-secondary" style="text-decoration:none; display:inline-block;">Ordenar</a></div>
                <div class="restaurant-card"><div class="restaurant-image">🍔</div><h3>Burguer House</h3><p class="rating">⭐ 4.6 (189)</p><p class="delivery">📍 1.2 km • 15-20 min</p><a href="{{ route('productos.index') }}" class="btn-secondary" style="text-decoration:none; display:inline-block;">Ordenar</a></div>
                <div class="restaurant-card"><div class="restaurant-image">🍜</div><h3>Thai Deluxe</h3><p class="rating">⭐ 4.9 (512)</p><p class="delivery">📍 3.1 km • 30-40 min</p><a href="{{ route('productos.index') }}" class="btn-secondary" style="text-decoration:none; display:inline-block;">Ordenar</a></div>
            </div>
        </section>

        <section class="order-history" id="history">
            <h2>Historial de Pedidos</h2>
            <div class="history-list">
                <div class="history-item completed"><div class="history-icon">✓</div><div class="history-info"><h4>Pizza Perfecta</h4><p>Orden #1056 • 12 de octubre</p><p class="price">24,90 €</p></div><button class="btn-link">Repetir</button></div>
                <div class="history-item completed"><div class="history-icon">✓</div><div class="history-info"><h4>Burguer House</h4><p>Orden #1055 • 11 de octubre</p><p class="price">15,40 €</p></div><button class="btn-link">Repetir</button></div>
            </div>
        </section>
    </main>
</body>
@endif
</x-app-layout>
