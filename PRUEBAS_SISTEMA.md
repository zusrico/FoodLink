# 📋 Plan de Pruebas Completo - FoodLink

## ✅ Verificación del Proyecto

Este documento guía la verificación completa del sistema FoodLink, incluyendo autenticación, CRUD y control de roles.

---

## 1️⃣ AUTENTICACIÓN

### Prueba 1.1: Login como Admin
1. Navega a: `http://127.0.0.1:8000/login`
2. Ingresa credenciales:
   - Email: `admin@foodlink.test`
   - Password: `password`
3. ✅ Esperado: Redirecciona a `/dashboard` con mensaje "You're logged in!"

### Prueba 1.2: Verificar Identidad
1. En el dashboard, haz clic en el botón con nombre de usuario en esquina superior derecha
2. ✅ Esperado: Muestra el nombre del usuario autenticado

### Prueba 1.3: Página de Registro
1. Navega a: `http://127.0.0.1:8000/register`
2. Completa el formulario con datos válidos
3. ✅ Esperado: Se crea nuevo usuario y redirige a dashboard

---

## 2️⃣ CRUD - CREAR PRODUCTOS (Admin)

### Prueba 2.1: Crear Producto
1. Como admin, navega a: `http://127.0.0.1:8000/productos`
2. Verifica que existe el botón **"+ Nuevo Producto"** ✅
3. Haz clic en el botón
4. Completa el formulario:
   - Nombre: `Hamburguesa Clásica`
   - Descripción: `Hamburguesa con carne, queso y lechuga`
   - Precio: `8.99`
   - Stock: `100`
   - Disponible: ✅ (marcado)
5. Haz clic en "Crear Producto"
6. ✅ Esperado: Mensaje "Producto creado exitosamente" y nuevo producto en tabla

### Prueba 2.2: Crear Producto Incompleto
1. En el formulario de crear, deja el campo "Nombre" vacío
2. Haz clic en "Crear Producto"
3. ✅ Esperado: Se muestra error de validación "Nombre es requerido"

---

## 3️⃣ CRUD - LEER PRODUCTOS

### Prueba 3.1: Listar Productos
1. Navega a: `http://127.0.0.1:8000/productos`
2. ✅ Esperado: Se muestran todos los productos creados en una tabla
3. Verifica columnas: Nombre, Descripción, Precio, Stock, Disponible, Acciones

### Prueba 3.2: Ver Detalle de Producto
1. En la lista de productos, haz clic en el nombre del producto
2. ✅ Esperado: Se abre página de detalle con toda la información del producto

---

## 4️⃣ CRUD - ACTUALIZAR PRODUCTOS

### Prueba 4.1: Editar Producto
1. En lista de productos, haz clic en botón **"Editar"**
2. Cambia el precio a: `9.99`
3. Haz clic en "Actualizar Producto"
4. ✅ Esperado: Mensaje "Producto actualizado exitosamente"
5. Verifica que el precio cambió en la lista

### Prueba 4.2: Cambios Validados
1. En la edición, intenta dejar "Nombre" vacío
2. Haz clic en "Actualizar Producto"
3. ✅ Esperado: Se muestra error de validación

---

## 5️⃣ CRUD - ELIMINAR PRODUCTOS

### Prueba 5.1: Eliminar Producto
1. En lista de productos, haz clic en botón **"Eliminar"**
2. ✅ Esperado: Se abre formulario de confirmación (si existe)
3. ✅ Esperado: Producto desaparece de la tabla
4. Verifica mensaje de confirmación

---

## 6️⃣ CONTROL DE ROLES - USUARIO REGULAR

### Prueba 6.1: Usuario Regular VE limitaciones
1. Crea nuevo usuario o usa: `usuario@foodlink.test` / `password`
2. Navega a: `http://127.0.0.1:8000/productos`
3. ✅ Esperado: NO hay botón "+ Nuevo Producto"
4. ✅ Esperado: NO hay columna "Acciones"
5. ✅ Esperado: NO hay botones "Editar" ni "Eliminar"
6. ✅ Esperado: Puede VER la lista de productos

### Prueba 6.2: Protección en Controller - Create
1. Usuario regular intenta acceder a: `http://127.0.0.1:8000/productos/create`
2. ✅ Esperado: Redirige a `/productos` con error "No tienes permiso para crear productos"

### Prueba 6.3: Protección en Controller - Edit
1. Usuario regular intenta acceder a: `http://127.0.0.1:8000/productos/1/edit`
2. ✅ Esperado: Redirige a `/productos` con error "No tienes permiso para editar productos"

### Prueba 6.4: Usuario Regular Puede VER
1. Usuario regular puede hacer clic en nombre del producto
2. ✅ Esperado: Ve la página de detalle sin botones de editar/eliminar

---

## 7️⃣ CONTROL DE ACCESO (Autenticación)

### Prueba 7.1: Acceso sin Login
1. Abre navegador en incógnito o limpia sesión
2. Intenta acceder a: `http://127.0.0.1:8000/productos`
3. ✅ Esperado: Redirige a `/login`

### Prueba 7.2: Dashboard Protegido
1. Sin login, intenta acceder a: `http://127.0.0.1:8000/dashboard`
2. ✅ Esperado: Redirige a `/login`

---

## 8️⃣ BASE DE DATOS

### Prueba 8.1: Persistencia de Datos
1. Crea un producto como admin
2. Recarga la página
3. ✅ Esperado: El producto sigue visible (guardado en BD)

### Prueba 8.2: Datos en Tabla
1. Abre terminal en proyecto FoodLink
2. Ejecuta: `php artisan tinker`
3. En Tinker, ejecuta: `\App\Models\Producto::all()`
4. ✅ Esperado: Se muestran todos los productos creados

---

## 9️⃣ ENDPOINTS API (Rutas)

| Verbo | Ruta | Protección | Rol |
|-------|------|-----------|-----|
| GET | `/` | Public | - |
| GET | `/login` | Guest | - |
| POST | `/login` | Guest | - |
| GET | `/register` | Guest | - |
| POST | `/register` | Guest | - |
| GET | `/dashboard` | Auth | - |
| GET | `/productos` | Auth | user/admin |
| GET | `/productos/create` | Auth | admin ✅ |
| POST | `/productos` | Auth | admin ✅ |
| GET | `/productos/{id}` | Auth | user/admin |
| GET | `/productos/{id}/edit` | Auth | admin ✅ |
| PUT | `/productos/{id}` | Auth | admin ✅ |
| DELETE | `/productos/{id}` | Auth | admin ✅ |

---

## 🔟 CHECKLIST FINAL

- [ ] Login funciona ✅
- [ ] Registro funciona ✅
- [ ] CRUD Create (admin) ✅
- [ ] CRUD Read (todos) ✅
- [ ] CRUD Update (admin) ✅
- [ ] CRUD Delete (admin) ✅
- [ ] Usuario regular no ve botones de admin ✅
- [ ] Usuario regular es rechazado en rutas admin ✅
- [ ] Datos persisten en BD ✅
- [ ] Validaciones funcionan ✅
- [ ] Mensajes de éxito/error muestran ✅
- [ ] Estilos Tailwind cargan correctamente ✅

---

## 🎯 RESUMEN DE REQUISITOS CUMPLIDOS

### Práctica 2 - Requerimientos:

1. ✅ **Laravel Framework con Blade Templates**
   - Proyecto Laravel 12.58.0 configurado
   - Todas las vistas usan Blade (.blade.php)
   - Componentes Blade reutilizables

2. ✅ **Laravel Breeze Authentication**
   - Sistema de login/registro implementado
   - Gestión de sesiones
   - Contraseñas hasheadas (bcrypt)
   - Email verification ready
   - Password reset ready

3. ✅ **CRUD Functionality - Producto**
   - Create: Formulario con validación
   - Read: Listado y detalle
   - Update: Edición con validación
   - Delete: Eliminación de productos

4. ✅ **Role-Based Access Control**
   - Tabla usuarios con campo `role` (admin/user)
   - Protección en rutas (middleware auth)
   - Protección en controlador (verificación de rol)
   - UI condicional (mostrar/ocultar botones por rol)

---

## 📊 ESTRUCTURA DE ARCHIVOS

```
FoodLink/
├── app/
│   ├── Models/
│   │   ├── User.php (con role field)
│   │   └── Producto.php
│   └── Http/Controllers/
│       ├── ProductoController.php
│       └── ProfileController.php
├── database/
│   ├── migrations/
│   │   ├── create_productos_table.php
│   │   └── add_role_to_users_table.php
│   └── seeders/
├── routes/
│   ├── web.php
│   └── auth.php
├── resources/views/
│   ├── layouts/
│   │   ├── app.blade.php (con Tailwind CDN)
│   │   ├── guest.blade.php
│   │   └── navigation.blade.php
│   ├── productos/
│   │   ├── index.blade.php
│   │   ├── create.blade.php
│   │   ├── edit.blade.php
│   │   └── show.blade.php
│   └── auth/
│       ├── login.blade.php
│       └── register.blade.php
└── public/
```

---

## 🚀 PARA INICIAR EL SERVIDOR

```powershell
cd C:\Users\zus\Desktop\raiz\universidad\PW\pracs\P1\FoodLink
C:\xampp\php\php.exe artisan serve --host=127.0.0.1 --port=8000
```

Luego accede a: `http://127.0.0.1:8000`

---

## 📝 NOTAS IMPORTANTES

- Base de datos: SQLite (default Laravel)
- Usuarios de prueba creados:
  - admin@foodlink.test / password (role: admin)
  - usuario@foodlink.test / password (role: user)
- Tailwind CSS: Cargado vía CDN para desarrollo rápido
- Todas las migraciones ejecutadas exitosamente
- Sistema de validación laravel funcionando

