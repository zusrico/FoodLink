# FoodLink

Plataforma integral de gestión de pedidos de comida online. FoodLink permite a los usuarios explorar restaurantes, visualizar productos, realizar pedidos y gestionar sus compras, mientras que los administradores pueden controlar el catálogo de productos, restaurantes y supervisar el sistema.

## Descripción General

FoodLink es una aplicación web desarrollada con Laravel 12 y Vue.js que facilita la experiencia de compra de comida en línea. La plataforma cuenta con un sistema de autenticación seguro, control de roles (administrador y usuario regular), y una interfaz moderna y responsiva construida con Tailwind CSS.

## Requisitos Previos

Antes de instalar y ejecutar el proyecto, asegúrate de tener instalado lo siguiente:

- PHP 8.2 o superior
- Composer (gestor de dependencias de PHP)
- Node.js 18+ y npm
- SQLite (incluido en PHP por defecto)
- Git

## Instalación

Sigue estos pasos para descargar y configurar el proyecto:

### 1. Clonar o descargar el repositorio

```bash
git clone <url-del-repositorio>
cd FoodLink
```

Si descargaste el archivo ZIP, extrae la carpeta y accede a ella desde la terminal.

### 2. Instalar dependencias del backend

```bash
composer install
```

Este comando descargará e instalará todos los paquetes PHP necesarios, incluyendo el framework Laravel y sus herramientas asociadas.

### 3. Configurar archivo de entorno

```bash
copy .env.example .env
```

En Windows PowerShell, si el comando anterior no funciona:

```bash
Copy-Item .env.example .env
```

### 4. Generar clave de aplicación

```bash
php artisan key:generate
```

Este comando genera una clave de encriptación única para tu aplicación.

### 5. Crear base de datos y ejecutar migraciones

```bash
php artisan migrate
```

Este comando crea la estructura de la base de datos SQLite ejecutando todas las migraciones.

### 6. Instalar dependencias del frontend

```bash
npm install
```

Descargará todos los paquetes JavaScript y dependencias del frontend.

### 7. Compilar assets

```bash
npm run build
```

Compila los estilos CSS y el código JavaScript para producción.

## Ejecución de la Aplicación

Una vez instalado todo, tienes dos opciones:

### Opción 1: Desarrollo completo (Recomendado)

Para ejecutar la aplicación con todos los servicios activos (servidor, queue, logs en tiempo real y compilación de Vite):

```bash
composer run dev
```

Este comando inicia simultáneamente:
- Servidor Laravel en http://localhost:8000
- Sistema de colas
- Monitor de logs en tiempo real
- Compilador Vite para hot-reload de assets

### Opción 2: Servidor Laravel únicamente

Si solo deseas ejecutar el servidor sin los servicios adicionales:

```bash
php artisan serve
```

La aplicación estará disponible en http://localhost:8000

### Opción 3: Compilación de assets en tiempo real

En una terminal separada, para que los cambios en CSS y JavaScript se reflejen automáticamente:

```bash
npm run dev
```

## Cuentas de Prueba

El proyecto incluye datos de prueba. Puedes autenticarte con:

**Usuario Administrador:**
- Email: admin@foodlink.test
- Contraseña: password

**Usuario Regular:**
- Email: user@foodlink.test
- Contraseña: password

## Estructura del Proyecto

```
FoodLink/
├── app/                      # Código de la aplicación
│   ├── Http/                 # Controllers y Requests
│   ├── Models/               # Modelos Eloquent (User, Producto, Restaurante, etc)
│   └── Providers/            # Proveedores de servicios
├── database/
│   ├── migrations/           # Migraciones de base de datos
│   ├── seeders/              # Seeders para datos de prueba
│   └── factories/            # Factories para testing
├── resources/
│   ├── css/                  # Estilos CSS
│   ├── js/                   # Código JavaScript/Vue.js
│   └── views/                # Templates Blade
├── routes/                   # Definición de rutas
├── config/                   # Archivos de configuración
├── tests/                    # Tests unitarios y funcionales
├── public/                   # Archivos públicos (index.php)
├── storage/                  # Logs y archivos generados
├── vendor/                   # Dependencias de Composer
└── node_modules/             # Dependencias de npm
```

## Características Principales

### Autenticación y Autorización
- Sistema de autenticación con Laravel Breeze
- Control de roles: Administrador y Usuario regular
- Protección de rutas mediante middleware

### Gestión de Productos
- Crear, leer, actualizar y eliminar productos (CRUD)
- Asociación de productos con restaurantes
- Control de inventario (stock)
- Validación de datos

### Gestión de Pedidos
- Crear y gestionar pedidos
- Detalles de pedidos con líneas individuales
- Seguimiento del estado de compras

### Gestión de Restaurantes
- Catálogo de restaurantes
- Asociación de productos por restaurante

### Interfaz de Usuario
- Diseño responsivo con Tailwind CSS
- Templates Blade para vistas del servidor
- Componentes reutilizables
- Experiencia consistente en diferentes dispositivos

## Tecnologías Utilizadas

- **Backend:** Laravel 12.58, PHP 8.2+
- **Frontend:** Vue.js 3, Alpine.js
- **Estilos:** Tailwind CSS 3.1
- **Build Tool:** Vite 7
- **Base de Datos:** SQLite
- **Autenticación:** Laravel Breeze 2.4
- **Testing:** PHPUnit 11.5
- **Herramientas de Desarrollo:** Composer, npm

## Configuración de Base de Datos

La aplicación utiliza SQLite de manera predeterminada. La base de datos se almacena en `database/database.sqlite`. Si necesitas cambiar a otro gestor de base de datos (como MySQL o PostgreSQL), modifica la variable `DB_CONNECTION` en el archivo `.env`.

## Comandos Útiles

```bash
# Ejecutar tests
composer test

# Limpiar cache
php artisan cache:clear
php artisan config:clear

# Crear un nuevo modelo con migración
php artisan make:model NombreModelo -m

# Crear un nuevo controlador
php artisan make:controller NombreController

# Acceder a la consola interactiva de Laravel
php artisan tinker

# Ver todas las rutas disponibles
php artisan route:list
```

## Solución de Problemas

**Problema:** "Class not found" después de cambios en modelos.
**Solución:** Ejecuta `composer dump-autoload`

**Problema:** Assets no se cargan correctamente.
**Solución:** Ejecuta `npm run build` nuevamente

**Problema:** Base de datos vacía.
**Solución:** Ejecuta `php artisan migrate --force`

**Problema:** La aplicación no se inicia.
**Solución:** Verifica que el archivo `.env` existe y que `APP_KEY` está configurada con `php artisan key:generate`

## Licencia

Este proyecto está bajo la Licencia MIT. Consulta el archivo LICENSE para más detalles.

## Contacto y Soporte

Para reportar problemas o contribuir al proyecto, por favor abre un issue o contacta con el equipo de desarrollo.
