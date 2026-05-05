# 🍔 FoodLink - Sistema de Gestión de Productos

Un aplicativo web completo para la gestión de productos de comida, desarrollado con Laravel 12 y Blade templates. Incluye autenticación de usuarios, control de roles y CRUD funcional.

## ✨ Características

- ✅ **Autenticación completa** con Laravel Breeze (login, registro, recuperación de contraseña)
- ✅ **CRUD de Productos** (crear, leer, actualizar, eliminar)
- ✅ **Control de Roles** (admin y usuario regular)
- ✅ **Validación de formularios** con mensajes de error
- ✅ **Interface responsiva** con Tailwind CSS
- ✅ **Base de datos SQLite** con migraciones
- ✅ **Dashboard protegido** solo para usuarios autenticados

## 🛠️ Requisitos

- PHP 8.2+
- Composer 2.0+
- XAMPP o servidor equivalente
- Git

## 📦 Instalación

### 1. Clonar el repositorio
```bash
git clone https://github.com/zusrico/FoodLink.git
cd FoodLink
git checkout EAP2
```

### 2. Instalar dependencias
```bash
composer install
```

### 3. Configurar variables de entorno
```bash
cp .env.example .env
php artisan key:generate
```

### 4. Ejecutar migraciones
```bash
php artisan migrate
```

### 5. Iniciar el servidor
```bash
php artisan serve --host=127.0.0.1 --port=8000
```

Accede a: `http://127.0.0.1:8000`

## 👤 Usuarios de Prueba

| Email | Contraseña | Rol |
|-------|-----------|-----|
| admin@foodlink.test | password | Admin |
| usuario@foodlink.test | password | User |

## 🎯 Funcionalidades Principales

### Para Administrador
- Crear nuevos productos
- Editar productos existentes
- Eliminar productos
- Ver lista completa de productos
- Ver detalles de cada producto

### Para Usuario Regular
- Ver lista de productos
- Ver detalles de productos
- **No puede** crear, editar ni eliminar productos

## 📁 Estructura del Proyecto

```
FoodLink/
├── app/
│   ├── Models/
│   │   ├── User.php (con campo role)
│   │   └── Producto.php
│   └── Http/Controllers/
│       ├── ProductoController.php
│       └── Auth/*
├── routes/
│   ├── web.php
│   └── auth.php
├── database/
│   └── migrations/
├── resources/views/
│   ├── layouts/
│   ├── productos/
│   └── auth/
└── public/
```

## 🔐 Control de Acceso

- **Rutas protegidas**: Todas las funciones requieren autenticación
- **CRUD protegido por rol**: Solo admins pueden crear, editar y eliminar
- **UI condicional**: Los botones de admin se ocultan para usuarios regulares

## 🛢️ Base de Datos

La aplicación utiliza SQLite con las siguientes tablas:

- **users**: Usuarios del sistema (con campo `role`)
- **productos**: Catálogo de productos
- **cache** y **jobs**: Tablas de soporte

## 🎨 Tecnologías

| Tecnología | Versión |
|-----------|---------|
| Laravel | 12.58.0 |
| PHP | 8.2.12 |
| Tailwind CSS | 4 (CDN) |
| SQLite | Default |
| Blade | 12 |

## 📖 Documentación Adicional

- `RESUMEN_FINAL.md` - Resumen ejecutivo y validación
- `PRUEBAS_SISTEMA.md` - Plan completo de pruebas

## 🚀 Deployment

Para usar en producción:
1. Configurar variables de entorno en servidor
2. Usar base de datos MySQL/PostgreSQL en lugar de SQLite
3. Configurar Tailwind CSS con build tools
4. Ejecutar: `php artisan config:cache`
5. Ejecutar: `php artisan route:cache`

## 📝 Notas

- El proyecto usa Tailwind CSS vía CDN para desarrollo rápido
- Las contraseñas están hasheadas con bcrypt
- Todos los formularios incluyen protección CSRF
- Validación server-side implementada

## ✅ Estado

**Proyecto completado y funcionando correctamente**
- ✅ Autenticación: 100%
- ✅ CRUD: 100%
- ✅ Control de roles: 100%
- ✅ Validación: 100%
- ✅ Testing: Completado

---

**Desarrollado para Práctica 2 de Programación Web**

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
