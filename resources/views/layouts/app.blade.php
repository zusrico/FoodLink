<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'FoodLink') }}</title>
    <style>
/* =====================
   RESET Y ESTILOS BASE
   ===================== */

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

html {
    height: 100%;
}

.admin-body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f5f7fa;
    height: 100vh;
    display: flex;
    color: #333;
    overflow: hidden;
}

/* =====================
   BARRA LATERAL
   ===================== */

.sidebar {
    width: 260px;
    background: linear-gradient(180deg, #2c3e50 0%, #34495e 100%);
    color: white;
    display: flex;
    flex-direction: column;
    box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
    overflow-y: auto;
}

.sidebar-header {
    padding: 2rem 1.5rem;
    border-bottom: 2px solid rgba(255, 255, 255, 0.1);
    text-align: center;
}

.sidebar-header h2 {
    font-size: 1.8rem;
    color: #ff6b6b;
    margin-bottom: 0.3rem;
    font-weight: 700;
}

.sidebar-subtitle {
    font-size: 0.8rem;
    color: #bdc3c7;
    font-style: italic;
}

.sidebar-nav {
    display: flex;
    flex-direction: column;
    padding: 1rem 0;
    flex: 1;
}

.nav-item {
    display: flex;
    align-items: center;
    padding: 1rem 1.5rem;
    color: #ecf0f1;
    text-decoration: none;
    transition: all 0.3s ease;
    border-left: 4px solid transparent;
    font-weight: 500;
}

.nav-item:hover {
    background-color: rgba(255, 107, 107, 0.1);
    border-left-color: #ff6b6b;
    color: #fff;
}

.nav-item.active {
    background-color: rgba(255, 107, 107, 0.2);
    border-left-color: #ff6b6b;
    color: #ff6b6b;
}

.nav-icon {
    display: inline-block;
    margin-right: 1rem;
    font-size: 1.2rem;
}

.nav-item.logout {
    margin-top: auto;
    border-top: 1px solid rgba(255, 255, 255, 0.1);
}

/* =====================
   CONTENEDOR PRINCIPAL
   ===================== */

.main-container {
    flex: 1;
    display: flex;
    flex-direction: column;
    overflow: hidden;
}

/* =====================
   CABECERA SUPERIOR
   ===================== */

.admin-header {
    background-color: white;
    padding: 1.5rem 2rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    border-bottom: 2px solid #f0f0f0;
}

.header-left h1 {
    font-size: 2rem;
    color: #2c3e50;
    margin-bottom: 0.2rem;
}

.header-subtitle {
    font-size: 0.9rem;
    color: #7f8c8d;
    font-style: italic;
}

.admin-info {
    display: flex;
    align-items: center;
    gap: 2rem;
}

.notifications {
    position: relative;
    cursor: pointer;
    font-size: 1.5rem;
}

.notification-badge {
    position: absolute;
    top: -8px;
    right: -8px;
    background-color: #e74c3c;
    color: white;
    border-radius: 50%;
    width: 22px;
    height: 22px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.75rem;
    font-weight: 700;
}

.admin-profile {
    display: flex;
    align-items: center;
    gap: 0.8rem;
}

.avatar {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    font-size: 1rem;
}

.profile-info {
    text-align: right;
}

.admin-name {
    font-size: 0.95rem;
    font-weight: 600;
    color: #2c3e50;
    margin: 0;
}

.admin-role {
    font-size: 0.8rem;
    color: #7f8c8d;
    margin: 0;
}

/* =====================
   CONTENIDO PRINCIPAL
   ===================== */

.dashboard-content {
    flex: 1;
    overflow-y: auto;
    padding: 2rem;
}

/* =====================
   TARJETAS RESUMEN
   ===================== */

.summary-cards {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 1.5rem;
    margin-bottom: 2rem;
}

.card {
    background: white;
    padding: 1.5rem;
    border-radius: 10px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    border-top: 4px solid #667eea;
    transition: all 0.3s ease;
}

.card:hover {
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.12);
    transform: translateY(-2px);
}

.card-header {
    font-size: 0.9rem;
    color: #7f8c8d;
    font-weight: 600;
    margin-bottom: 0.8rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.card-number {
    font-size: 2.5rem;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 0.8rem;
}

.card-footer {
    font-size: 0.85rem;
    color: #27ae60;
    font-weight: 500;
}

/* =====================
   ACCESOS RÁPIDOS
   ===================== */

.quick-access {
    background: white;
    padding: 2rem;
    border-radius: 10px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    margin-bottom: 2rem;
}

.quick-access h2 {
    font-size: 1.3rem;
    color: #2c3e50;
    margin-bottom: 1.5rem;
    font-weight: 700;
}

.access-buttons {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
    gap: 1rem;
}

.access-btn {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 1.5rem;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: all 0.3s ease;
    font-weight: 600;
    text-align: center;
}

.access-btn:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 16px rgba(102, 126, 234, 0.3);
}

.btn-icon {
    font-size: 2rem;
    margin-bottom: 0.5rem;
}

/* =====================
   GRID DE DOS COLUMNAS
   ===================== */

.dashboard-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 2rem;
}

.card-section {
    background: white;
    padding: 1.5rem;
    border-radius: 10px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
}

.card-section h2 {
    font-size: 1.2rem;
    color: #2c3e50;
    margin-bottom: 1.5rem;
    font-weight: 700;
}

/* =====================
   TABLAS
   ===================== */

.activity-table,
.orders-table {
    width: 100%;
    border-collapse: collapse;
}

.activity-table th,
.orders-table th {
    background-color: #f8f9fa;
    padding: 0.8rem;
    text-align: left;
    font-weight: 600;
    color: #2c3e50;
    border-bottom: 2px solid #ecf0f1;
    font-size: 0.9rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.activity-table td,
.orders-table td {
    padding: 1rem 0.8rem;
    border-bottom: 1px solid #ecf0f1;
    color: #555;
}

.activity-table tbody tr:hover,
.orders-table tbody tr:hover {
    background-color: #f8f9fa;
}

/* =====================
   ESTADOS
   ===================== */

.status {
    display: inline-block;
    padding: 0.3rem 0.8rem;
    border-radius: 20px;
    font-size: 0.85rem;
    font-weight: 600;
}

.status.pending {
    background-color: #fff3cd;
    color: #856404;
}

.status.preparing {
    background-color: #cfe2ff;
    color: #084298;
}

.status.delivering {
    background-color: #d1e7dd;
    color: #0f5132;
}

.status.delivered {
    background-color: #d1e7dd;
    color: #0f5132;
}

/* =====================
   SCROLLBAR PERSONALIZADO
   ===================== */

.sidebar::-webkit-scrollbar,
.dashboard-content::-webkit-scrollbar {
    width: 6px;
}

.sidebar::-webkit-scrollbar-track,
.dashboard-content::-webkit-scrollbar-track {
    background: rgba(0, 0, 0, 0.1);
}

.sidebar::-webkit-scrollbar-thumb,
.dashboard-content::-webkit-scrollbar-thumb {
    background: rgba(255, 255, 255, 0.3);
    border-radius: 3px;
}

.sidebar::-webkit-scrollbar-thumb:hover,
.dashboard-content::-webkit-scrollbar-thumb:hover {
    background: rgba(255, 255, 255, 0.5);
}

/* =====================
   MEDIA QUERIES
   ===================== */

@media (max-width: 1200px) {
    .sidebar {
        width: 220px;
    }

    .dashboard-grid {
        grid-template-columns: 1fr;
    }

    .summary-cards {
        grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
    }
}

@media (max-width: 768px) {
    .admin-body {
        flex-direction: column;
    }

    .sidebar {
        width: 100%;
        max-height: 60px;
        flex-direction: row;
        overflow-x: auto;
    }

    .sidebar-header {
        padding: 0.8rem 1rem;
        border-bottom: none;
        border-right: 2px solid rgba(255, 255, 255, 0.1);
        min-width: 150px;
    }

    .sidebar-header h2 {
        font-size: 1.2rem;
    }

    .sidebar-subtitle {
        display: none;
    }

    .sidebar-nav {
        flex-direction: row;
        flex: 1;
        padding: 0;
    }

    .nav-item {
        padding: 0.8rem 1rem;
        border-left: none;
        border-bottom: 3px solid transparent;
    }

    .nav-item:hover,
    .nav-item.active {
        border-left: none;
        border-bottom-color: #ff6b6b;
    }

    .admin-header {
        flex-direction: column;
        gap: 1rem;
    }

    .header-left {
        width: 100%;
    }

    .header-right {
        width: 100%;
    }

    .admin-header h1 {
        font-size: 1.5rem;
    }

    .dashboard-content {
        padding: 1rem;
    }

    .summary-cards {
        grid-template-columns: repeat(2, 1fr);
    }

    .access-buttons {
        grid-template-columns: repeat(2, 1fr);
    }

    .dashboard-grid {
        grid-template-columns: 1fr;
    }

    .card-section {
        padding: 1rem;
    }

    table {
        font-size: 0.85rem;
    }

    .activity-table th,
    .orders-table th,
    .activity-table td,
    .orders-table td {
        padding: 0.6rem 0.4rem;
    }
}

@media (max-width: 480px) {
    .sidebar {
        max-height: auto;
    }

    .sidebar-nav {
        overflow-x: auto;
    }

    .nav-item span:last-child {
        display: none;
    }

    .summary-cards {
        grid-template-columns: 1fr;
    }

    .access-buttons {
        grid-template-columns: 1fr;
    }

    .admin-header {
        padding: 1rem;
    }

    .header-left h1 {
        font-size: 1.3rem;
    }

    .admin-info {
        gap: 1rem;
    }

    .card-number {
        font-size: 2rem;
    }
}
/* =====================
   RESET Y ESTILOS BASE
   ===================== */

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

html {
    scroll-behavior: smooth;
    height: 100%;
}

.user-dashboard-body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f8f9fa;
    color: #333;
    display: flex;
    flex-direction: column;
    min-height: 100vh;
}

/* =====================
   NAVBAR SUPERIOR
   ===================== */

.top-navbar {
    background: white;
    border-bottom: 1px solid #e0e0e0;
    position: sticky;
    top: 0;
    z-index: 100;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
}

.navbar-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 1rem 1.5rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 2rem;
}

.navbar-logo h1 {
    font-size: 1.8rem;
    color: #ff6b6b;
    font-weight: 700;
}

.navbar-center {
    flex: 1;
    display: flex;
    gap: 2rem;
    justify-content: center;
}

.nav-link {
    text-decoration: none;
    color: #666;
    font-weight: 500;
    transition: color 0.3s ease;
    position: relative;
}

.nav-link:hover {
    color: #ff6b6b;
}

.navbar-right {
    display: flex;
    gap: 1.5rem;
    align-items: center;
}

.notification-btn {
    background: none;
    border: none;
    font-size: 1.5rem;
    cursor: pointer;
    position: relative;
    transition: transform 0.2s ease;
}

.notification-btn:hover {
    transform: scale(1.1);
}

.badge {
    position: absolute;
    top: -8px;
    right: -8px;
    background: #e74c3c;
    color: white;
    border-radius: 50%;
    width: 20px;
    height: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.7rem;
    font-weight: 700;
}

.profile-menu {
    position: relative;
}

.profile-btn {
    background: none;
    border: none;
    font-size: 1.5rem;
    cursor: pointer;
    transition: transform 0.2s ease;
}

.profile-btn:hover {
    transform: scale(1.1);
}

.profile-dropdown {
    position: absolute;
    top: 100%;
    right: 0;
    background: white;
    border: 1px solid #e0e0e0;
    border-radius: 8px;
    min-width: 180px;
    padding: 0.5rem 0;
    display: none;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    margin-top: 0.5rem;
}

.profile-menu:hover .profile-dropdown {
    display: block;
}

.profile-dropdown a {
    display: block;
    padding: 0.75rem 1.5rem;
    color: #333;
    text-decoration: none;
    transition: background-color 0.2s ease;
}

.profile-dropdown a:hover {
    background-color: #f0f0f0;
    color: #ff6b6b;
}

.profile-dropdown hr {
    margin: 0.5rem 0;
    border: none;
    border-top: 1px solid #e0e0e0;
}

/* =====================
   MAIN CONTENT
   ===================== */

.user-main {
    flex: 1;
    max-width: 1200px;
    margin: 0 auto;
    width: 100%;
    padding: 0;
}

/* =====================
   HERO SECTION
   ===================== */

.hero-section {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    padding: 3rem 1.5rem;
    text-align: center;
    margin-bottom: 3rem;
}

.hero-content h2 {
    font-size: 2.2rem;
    margin-bottom: 0.5rem;
}

.hero-content p {
    font-size: 1.1rem;
    margin-bottom: 1.5rem;
    opacity: 0.95;
}

/* =====================
   SECCIONES GENERALES
   ===================== */

section {
    padding: 0 1.5rem 2rem;
    margin-bottom: 2rem;
}

section h2 {
    font-size: 1.5rem;
    color: #2c3e50;
    margin-bottom: 1.5rem;
    font-weight: 700;
}

/* =====================
   PEDIDOS ACTIVOS
   ===================== */

.orders-container {
    display: grid;
    gap: 1.5rem;
}

.order-card {
    background: white;
    border-radius: 12px;
    padding: 1.5rem;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    border-left: 4px solid #667eea;
    transition: all 0.3s ease;
}

.order-card:hover {
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.12);
    transform: translateY(-2px);
}

.order-card.active {
    border-left-color: #27ae60;
}

.order-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 1rem;
}

.order-header h3 {
    font-size: 1.2rem;
    color: #2c3e50;
    margin-bottom: 0.3rem;
}

.order-time {
    font-size: 0.85rem;
    color: #7f8c8d;
}

.order-status {
    padding: 0.4rem 0.9rem;
    border-radius: 20px;
    font-size: 0.85rem;
    font-weight: 600;
    white-space: nowrap;
}

.order-status.preparing {
    background-color: #cfe2ff;
    color: #084298;
}

.order-status.delivered {
    background-color: #d1e7dd;
    color: #0f5132;
}

.order-details {
    margin-bottom: 1rem;
    display: flex;
    gap: 2rem;
    font-size: 0.95rem;
}

.order-details p {
    margin: 0.3rem 0;
}

/* =====================
   PROGRESS BAR
   ===================== */

.order-progress {
    margin-bottom: 1.5rem;
}

.progress-bar {
    height: 4px;
    background: #e0e0e0;
    border-radius: 2px;
    margin-bottom: 1rem;
    overflow: hidden;
}

.progress-fill {
    height: 100%;
    background: linear-gradient(90deg, #667eea, #764ba2);
    border-radius: 2px;
    transition: width 0.3s ease;
}

.progress-steps {
    display: flex;
    justify-content: space-between;
    font-size: 0.8rem;
    gap: 0.5rem;
}

.step {
    flex: 1;
    text-align: center;
    color: #bdc3c7;
    padding: 0.5rem;
}

.step.done {
    color: #27ae60;
    font-weight: 600;
}

.step.active {
    color: #667eea;
    font-weight: 600;
}

/* =====================
   BOTONES
   ===================== */

.btn-primary {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border: none;
    border-radius: 8px;
    padding: 0.8rem 1.5rem;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 12px rgba(102, 126, 234, 0.3);
}

.btn-large {
    padding: 1rem 2rem;
    font-size: 1.1rem;
}

.btn-secondary {
    background: white;
    color: #667eea;
    border: 2px solid #667eea;
    border-radius: 6px;
    padding: 0.6rem 1.2rem;
    font-size: 0.95rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
}

.btn-secondary:hover {
    background: #667eea;
    color: white;
    transform: translateY(-2px);
}

.order-actions {
    display: flex;
    gap: 1rem;
}

.order-actions .btn-secondary {
    flex: 1;
}

.btn-link {
    background: none;
    border: none;
    color: #667eea;
    cursor: pointer;
    font-weight: 600;
    text-decoration: none;
    transition: color 0.3s ease;
    padding: 0;
}

.btn-link:hover {
    color: #764ba2;
    text-decoration: underline;
}

/* =====================
   RESTAURANTES FAVORITOS
   ===================== */

.restaurants-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
    gap: 1.5rem;
}

.restaurant-card {
    background: white;
    border-radius: 12px;
    padding: 1.5rem;
    text-align: center;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
}

.restaurant-card:hover {
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.12);
    transform: translateY(-4px);
}

.restaurant-image {
    font-size: 3rem;
    margin-bottom: 0.8rem;
}

.restaurant-card h3 {
    font-size: 1.1rem;
    color: #2c3e50;
    margin-bottom: 0.4rem;
}

.restaurant-card p {
    margin: 0.3rem 0;
    font-size: 0.9rem;
    color: #7f8c8d;
}

.rating {
    color: #f39c12;
    font-weight: 600;
}

.delivery {
    color: #667eea;
    font-weight: 500;
}

.restaurant-card .btn-secondary {
    width: 100%;
    margin-top: 1rem;
}

/* =====================
   HISTORIAL
   ===================== */

.history-list {
    display: grid;
    gap: 1rem;
}

.history-item {
    background: white;
    border-radius: 10px;
    padding: 1rem;
    display: flex;
    align-items: center;
    gap: 1rem;
    box-shadow: 0 1px 4px rgba(0, 0, 0, 0.05);
    border-left: 4px solid transparent;
    transition: all 0.3s ease;
}

.history-item.completed {
    border-left-color: #27ae60;
}

.history-item:hover {
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.history-icon {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: #d1e7dd;
    color: #0f5132;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    font-size: 1.2rem;
    flex-shrink: 0;
}

.history-info {
    flex: 1;
}

.history-info h4 {
    font-size: 1rem;
    color: #2c3e50;
    margin-bottom: 0.2rem;
}

.history-info p {
    font-size: 0.85rem;
    color: #7f8c8d;
    margin: 0.1rem 0;
}

.price {
    font-weight: 600;
    color: #27ae60;
}

/* =====================
   PROMOCIONES
   ===================== */

.promo-cards {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 1.5rem;
}

.promo-card {
    background: white;
    border-radius: 12px;
    padding: 1.5rem;
    text-align: center;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    position: relative;
    overflow: hidden;
    transition: all 0.3s ease;
    border: 2px solid transparent;
}

.promo-card:hover {
    border-color: #667eea;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.12);
    transform: translateY(-4px);
}

.promo-badge {
    position: absolute;
    top: -10px;
    right: -10px;
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: white;
    padding: 0.5rem 1.5rem;
    font-weight: 700;
    font-size: 0.9rem;
    transform: rotate(45deg);
    min-width: 150px;
}

.promo-card h3 {
    font-size: 1.2rem;
    color: #2c3e50;
    margin: 2rem 0 0.5rem;
    font-weight: 700;
}

.promo-card p {
    color: #7f8c8d;
    font-size: 0.95rem;
}

/* =====================
   MEDIA QUERIES
   ===================== */

@media (max-width: 768px) {
    .navbar-container {
        flex-direction: column;
        gap: 1rem;
        padding: 0.8rem 1rem;
    }

    .navbar-center {
        width: 100%;
        gap: 1rem;
    }

    .navbar-right {
        width: 100%;
        justify-content: center;
    }

    .hero-content h2 {
        font-size: 1.8rem;
    }

    .hero-section {
        padding: 2rem 1rem;
    }

    section {
        padding: 0 1rem 1.5rem;
    }

    section h2 {
        font-size: 1.3rem;
    }

    .restaurants-grid {
        grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
    }

    .promo-cards {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 480px) {
    .navbar-logo h1 {
        font-size: 1.5rem;
    }

    .navbar-center {
        display: none;
    }

    .navbar-container {
        justify-content: space-between;
    }

    .hero-content h2 {
        font-size: 1.5rem;
    }

    .hero-content p {
        font-size: 1rem;
    }

    .order-header {
        flex-direction: column;
        gap: 0.5rem;
    }

    .order-details {
        flex-direction: column;
        gap: 0;
    }

    .progress-steps {
        flex-wrap: wrap;
    }

    .step {
        font-size: 0.7rem;
        padding: 0.3rem;
    }

    .order-actions {
        flex-direction: column;
    }

    .restaurants-grid {
        grid-template-columns: repeat(2, 1fr);
    }

    .history-item {
        flex-direction: column;
        text-align: center;
    }

    .history-icon {
        width: 50px;
        height: 50px;
    }
}

/* =====================
   RESET Y ESTILOS BASE
   ===================== */

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

html {
    height: 100%;
}

.form-body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 2rem 1rem;
    color: #333;
}

/* =====================
   CONTENEDOR PRINCIPAL
   ===================== */

.form-container {
    background: white;
    border-radius: 12px;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
    width: 100%;
    max-width: 800px;
    padding: 2.5rem;
}

/* =====================
   CABECERA DEL FORMULARIO
   ===================== */

.form-header {
    text-align: center;
    margin-bottom: 2.5rem;
}

.form-header h1 {
    font-size: 2.2rem;
    color: #2c3e50;
    margin-bottom: 0.5rem;
    font-weight: 700;
}

.form-subtitle {
    font-size: 1rem;
    color: #7f8c8d;
    font-style: italic;
}

/* =====================
   FORMULARIO
   ===================== */

.product-form {
    display: flex;
    flex-direction: column;
}

.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1.5rem;
    margin-bottom: 1.5rem;
}

.form-group {
    display: flex;
    flex-direction: column;
}

.form-group.full-width {
    grid-column: 1 / -1;
}

.form-group label {
    font-size: 0.95rem;
    font-weight: 600;
    color: #2c3e50;
    margin-bottom: 0.6rem;
    text-transform: capitalize;
}

.form-group input,
.form-group select,
.form-group textarea {
    padding: 0.8rem 1rem;
    border: 2px solid #e0e0e0;
    border-radius: 6px;
    font-size: 0.95rem;
    font-family: inherit;
    transition: all 0.3s ease;
    background-color: #f8f9fa;
}

.form-group input:focus,
.form-group select:focus,
.form-group textarea:focus {
    outline: none;
    border-color: #667eea;
    background-color: white;
    box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
}

.form-group input::placeholder,
.form-group textarea::placeholder {
    color: #bdc3c7;
}

.form-group select {
    cursor: pointer;
    appearance: none;
    background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
    background-repeat: no-repeat;
    background-position: right 0.7rem center;
    background-size: 1.2em;
    padding-right: 2.5rem;
}

.form-group textarea {
    resize: vertical;
    min-height: 120px;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

/* =====================
   INPUT CON ADDON (Precio con €)
   ===================== */

.input-with-addon {
    position: relative;
    display: flex;
    align-items: center;
}

.input-with-addon input {
    padding-right: 2.5rem;
}

.addon {
    position: absolute;
    right: 1rem;
    font-weight: 600;
    color: #667eea;
    pointer-events: none;
}

/* =====================
   CARGA DE ARCHIVO
   ===================== */

.file-upload {
    display: flex;
    align-items: center;
    gap: 0.8rem;
    position: relative;
}

#image {
    display: none;
}

.btn-upload {
    flex: 0 0 auto;
    padding: 0.8rem 1rem;
    background-color: #667eea;
    color: white;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    font-weight: 600;
    transition: all 0.3s ease;
    white-space: nowrap;
}

.btn-upload:hover {
    background-color: #764ba2;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
}

.file-name {
    font-size: 0.9rem;
    color: #7f8c8d;
    flex: 1;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

/* =====================
   BOTONES DE ACCIÓN
   ===================== */

.form-actions {
    display: flex;
    justify-content: flex-end;
    gap: 1rem;
    margin-top: 2.5rem;
    padding-top: 2rem;
    border-top: 2px solid #f0f0f0;
}

.btn {
    padding: 0.9rem 2rem;
    border: none;
    border-radius: 6px;
    font-size: 0.95rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.btn-cancel {
    background-color: #ecf0f1;
    color: #7f8c8d;
}

.btn-cancel:hover {
    background-color: #bdc3c7;
    color: white;
}

.btn-save {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
}

.btn-save:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(102, 126, 234, 0.3);
}

.btn-save:active {
    transform: translateY(0);
}

/* =====================
   VALIDACIÓN
   ===================== */

.form-group input:invalid:not(:placeholder-shown),
.form-group select:invalid:not(:placeholder-shown),
.form-group textarea:invalid:not(:placeholder-shown) {
    border-color: #e74c3c;
}

/* =====================
   MEDIA QUERIES
   ===================== */

@media (max-width: 768px) {
    .form-container {
        padding: 1.5rem;
    }

    .form-header h1 {
        font-size: 1.8rem;
    }

    .form-row {
        grid-template-columns: 1fr;
        gap: 1rem;
    }

    .form-actions {
        flex-direction: column-reverse;
    }

    .btn {
        width: 100%;
    }
}

@media (max-width: 480px) {
    .form-body {
        padding: 1rem;
    }

    .form-container {
        padding: 1.2rem;
        border-radius: 8px;
    }

    .form-header h1 {
        font-size: 1.5rem;
    }

    .form-header {
        margin-bottom: 1.5rem;
    }

    .form-row {
        margin-bottom: 1rem;
    }

    .form-group label {
        font-size: 0.9rem;
        margin-bottom: 0.4rem;
    }

    .form-group input,
    .form-group select,
    .form-group textarea {
        padding: 0.7rem 0.8rem;
        font-size: 0.9rem;
    }

    .btn {
        padding: 0.8rem 1.5rem;
        font-size: 0.9rem;
    }
}
/* =====================
   RESET Y ESTILOS BASE
   ===================== */

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

html {
    height: 100%;
}

.orders-body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f5f7fa;
    min-height: 100vh;
    padding: 2rem 1rem;
    color: #333;
}

/* =====================
   CONTENEDOR PRINCIPAL
   ===================== */

.orders-container {
    background: white;
    border-radius: 12px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    max-width: 1200px;
    margin: 0 auto;
    padding: 2.5rem;
}

/* =====================
   CABECERA
   ===================== */

.orders-header {
    text-align: center;
    margin-bottom: 2rem;
}

.orders-header h1 {
    font-size: 2.2rem;
    color: #2c3e50;
    margin-bottom: 0.5rem;
    font-weight: 700;
}

.orders-subtitle {
    font-size: 1rem;
    color: #7f8c8d;
    font-style: italic;
}

/* =====================
   ZONA DE FILTROS
   ===================== */

.filters-section {
    display: flex;
    gap: 1.5rem;
    margin-bottom: 2rem;
    flex-wrap: wrap;
    align-items: center;
}

.search-box {
    flex: 1;
    min-width: 250px;
    position: relative;
    display: flex;
    align-items: center;
}

.search-input {
    width: 100%;
    padding: 0.8rem 1rem 0.8rem 2.5rem;
    border: 2px solid #e0e0e0;
    border-radius: 6px;
    font-size: 0.95rem;
    transition: all 0.3s ease;
}

.search-input:focus {
    outline: none;
    border-color: #667eea;
    box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
}

.search-icon {
    position: absolute;
    left: 0.8rem;
    font-size: 1.1rem;
    pointer-events: none;
    color: #7f8c8d;
}

.filters-group {
    display: flex;
    gap: 1rem;
    flex-wrap: wrap;
}

.status-filter {
    padding: 0.8rem 1rem;
    border: 2px solid #e0e0e0;
    border-radius: 6px;
    font-size: 0.95rem;
    cursor: pointer;
    transition: all 0.3s ease;
    appearance: none;
    background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
    background-repeat: no-repeat;
    background-position: right 0.7rem center;
    background-size: 1.2em;
    padding-right: 2.5rem;
}

.status-filter:focus {
    outline: none;
    border-color: #667eea;
    box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
}

.btn-export {
    padding: 0.8rem 1.5rem;
    background-color: #667eea;
    color: white;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    font-weight: 600;
    transition: all 0.3s ease;
    white-space: nowrap;
}

.btn-export:hover {
    background-color: #764ba2;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
}

/* =====================
   TABLA
   ===================== */

.table-wrapper {
    overflow-x: auto;
    margin-bottom: 2rem;
    border-radius: 8px;
    box-shadow: 0 1px 4px rgba(0, 0, 0, 0.05);
}

.orders-table {
    width: 100%;
    border-collapse: collapse;
    background-color: white;
}

.orders-table thead {
    background-color: #2c3e50;
    color: white;
}

.orders-table th {
    padding: 1rem;
    text-align: left;
    font-weight: 600;
    font-size: 0.95rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.orders-table td {
    padding: 1rem;
    border-bottom: 1px solid #ecf0f1;
    color: #555;
    font-size: 0.95rem;
}

.orders-table tbody tr {
    transition: all 0.3s ease;
}

.orders-table tbody tr:hover {
    background-color: #f8f9fa;
}

.order-id {
    font-weight: 600;
    color: #667eea;
}

.amount {
    font-weight: 600;
    color: #27ae60;
}

/* =====================
   ESTADO BADGES
   ===================== */

.status-badge {
    display: inline-block;
    padding: 0.4rem 0.9rem;
    border-radius: 20px;
    font-size: 0.85rem;
    font-weight: 600;
    text-align: center;
}

.status-badge.pending {
    background-color: #fff3cd;
    color: #856404;
}

.status-badge.preparing {
    background-color: #cfe2ff;
    color: #084298;
}

.status-badge.sent {
    background-color: #e7d4f5;
    color: #6f42c1;
}

.status-badge.delivered {
    background-color: #d1e7dd;
    color: #0f5132;
}

.status-badge.cancelled {
    background-color: #f8d7da;
    color: #842029;
}

/* =====================
   ACCIONES
   ===================== */

.actions {
    display: flex;
    gap: 0.5rem;
}

.action-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 36px;
    height: 36px;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    font-size: 1.1rem;
    transition: all 0.3s ease;
    background-color: #ecf0f1;
}

.action-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.view-btn:hover {
    background-color: #3498db;
    color: white;
}

.edit-btn:hover {
    background-color: #f39c12;
    color: white;
}

/* =====================
   PAGINACIÓN
   ===================== */

.pagination {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 1.5rem;
    margin-top: 2rem;
}

.pagination-btn {
    padding: 0.7rem 1.2rem;
    background-color: #667eea;
    color: white;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    font-weight: 600;
    transition: all 0.3s ease;
}

.pagination-btn:hover {
    background-color: #764ba2;
    transform: translateY(-2px);
}

.page-info {
    color: #7f8c8d;
    font-weight: 600;
}

/* =====================
   MODALES
   ===================== */

.modal {
    display: none;
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    animation: fadeIn 0.3s ease;
}

@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

.modal-content {
    background-color: white;
    margin: 5% auto;
    padding: 0;
    border-radius: 12px;
    width: 90%;
    max-width: 500px;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
    animation: slideDown 0.3s ease;
}

@keyframes slideDown {
    from {
        transform: translateY(-50px);
        opacity: 0;
    }
    to {
        transform: translateY(0);
        opacity: 1;
    }
}

.modal-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1.5rem;
    border-bottom: 2px solid #f0f0f0;
}

.modal-header h2 {
    font-size: 1.5rem;
    color: #2c3e50;
    margin: 0;
}

.modal-close {
    background: none;
    border: none;
    font-size: 1.8rem;
    cursor: pointer;
    color: #7f8c8d;
    transition: all 0.3s ease;
}

.modal-close:hover {
    color: #e74c3c;
}

.modal-body {
    padding: 1.5rem;
}

.modal-body p {
    margin-bottom: 1rem;
    font-size: 0.95rem;
}

.modal-body strong {
    color: #2c3e50;
}

.status-select {
    width: 100%;
    padding: 0.8rem 1rem;
    border: 2px solid #e0e0e0;
    border-radius: 6px;
    font-size: 0.95rem;
    margin-top: 0.5rem;
    cursor: pointer;
}

.status-select:focus {
    outline: none;
    border-color: #667eea;
    box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
}

.modal-actions {
    display: flex;
    justify-content: flex-end;
    gap: 1rem;
    padding: 1.5rem;
    border-top: 2px solid #f0f0f0;
}

.btn-modal-close,
.btn-cancel,
.btn-save {
    padding: 0.8rem 1.5rem;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-modal-close,
.btn-cancel {
    background-color: #ecf0f1;
    color: #7f8c8d;
}

.btn-modal-close:hover,
.btn-cancel:hover {
    background-color: #bdc3c7;
    color: white;
}

.btn-save {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
}

.btn-save:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 16px rgba(102, 126, 234, 0.3);
}

/* =====================
   MEDIA QUERIES
   ===================== */

@media (max-width: 768px) {
    .orders-container {
        padding: 1.5rem;
    }

    .orders-header h1 {
        font-size: 1.8rem;
    }

    .filters-section {
        flex-direction: column;
    }

    .search-box {
        width: 100%;
    }

    .filters-group {
        width: 100%;
        justify-content: space-between;
    }

    .status-filter,
    .btn-export {
        flex: 1;
    }

    .orders-table th,
    .orders-table td {
        padding: 0.8rem 0.5rem;
        font-size: 0.85rem;
    }

    .orders-table th {
        font-size: 0.8rem;
    }

    .status-badge {
        padding: 0.3rem 0.6rem;
        font-size: 0.8rem;
    }

    .action-btn {
        width: 32px;
        height: 32px;
        font-size: 0.9rem;
    }

    .pagination {
        flex-wrap: wrap;
        gap: 0.8rem;
    }

    .pagination-btn {
        padding: 0.6rem 1rem;
        font-size: 0.9rem;
    }
}

@media (max-width: 480px) {
    .orders-body {
        padding: 1rem;
    }

    .orders-container {
        padding: 1rem;
        border-radius: 8px;
    }

    .orders-header h1 {
        font-size: 1.5rem;
    }

    .filters-section {
        gap: 0.8rem;
    }

    .filters-group {
        width: 100%;
        flex-direction: column;
    }

    .status-filter,
    .btn-export {
        width: 100%;
    }

    .orders-table {
        font-size: 0.85rem;
    }

    .orders-table th,
    .orders-table td {
        padding: 0.6rem 0.4rem;
    }

    .actions {
        gap: 0.3rem;
    }

    .action-btn {
        width: 28px;
        height: 28px;
        font-size: 0.8rem;
    }

    .modal-content {
        width: 95%;
        margin: 20% auto;
    }
}
/* Ajustes Laravel integrados */
.foodlink-alert {
    padding: 1rem 1.25rem;
    border-radius: 8px;
    margin-bottom: 1.25rem;
    font-weight: 600;
}
.foodlink-alert-success { background:#d4edda; color:#155724; border:1px solid #c3e6cb; }
.foodlink-alert-error { background:#f8d7da; color:#721c24; border:1px solid #f5c6cb; }
.inline-form { display:inline; }
.button-as-link { background:none; border:none; cursor:pointer; font:inherit; }
.error-text { color:#e74c3c; font-size:.85rem; margin-top:.35rem; display:block; }
.admin-body .access-btn.link-btn { display:flex; align-items:center; justify-content:center; gap:.55rem; text-decoration:none; color:white; }
.sidebar .logout-form { margin:0; padding:0; }
.sidebar .logout-form button { width:100%; text-align:left; }
.product-actions { display:flex; gap:.45rem; justify-content:center; align-items:center; flex-wrap:wrap; }
.product-actions a, .product-actions button { text-decoration:none; }
.form-back-link { display:inline-block; margin-bottom:1rem; color:#667eea; text-decoration:none; font-weight:700; }
.form-back-link:hover { color:#764ba2; }
.show-card { background:white; border-radius:12px; box-shadow:0 10px 40px rgba(0,0,0,.12); padding:2rem; max-width:900px; margin:0 auto; }
.show-grid { display:grid; grid-template-columns: 1fr 1.2fr; gap:2rem; }
.show-image { width:100%; border-radius:12px; box-shadow:0 8px 24px rgba(0,0,0,.12); }
.show-placeholder { min-height:230px; border-radius:12px; background:linear-gradient(135deg,#667eea,#764ba2); color:white; display:flex; align-items:center; justify-content:center; font-size:5rem; }
.show-field { margin-bottom:1.2rem; }
.show-field h3 { color:#667eea; margin-bottom:.3rem; }
.show-field p { color:#2c3e50; }
.show-actions { display:flex; justify-content:space-between; gap:1rem; margin-top:2rem; border-top:2px solid #f0f0f0; padding-top:1.5rem; }
@media(max-width:768px) { .show-grid { grid-template-columns:1fr; } }
    </style>
</head>
<body>
    {{ $slot }}
</body>
</html>
