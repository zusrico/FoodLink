<x-guest-layout>
    <header>
        <h1><a href="{{ url('/') }}">FoodLink</a></h1>
        <h2>Tu comida favorita, más cerca que nunca</h2>
    </header>

    <main>
        <form method="POST" action="{{ route('register') }}" @if($errors->any()) class="shaker" @endif>
            @csrf

            <label for="email">Correo Electrónico: <span style="color:red;">*</span></label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required autocomplete="username">
            @error('email')
                <span class="error-message">{{ $message }}</span>
            @enderror

            <label for="name">Usuario: <span style="color:red;">*</span></label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
            @error('name')
                <span class="error-message">{{ $message }}</span>
            @enderror

            <label for="password">Contraseña: <span style="color:red;">*</span></label>
            <input type="password" id="password" name="password" required autocomplete="new-password">
            @error('password')
                <span class="error-message">{{ $message }}</span>
            @enderror

            <label for="password_confirmation">Confirmar Contraseña: <span style="color:red;">*</span></label>
            <input type="password" id="password_confirmation" name="password_confirmation" required autocomplete="new-password">
            @error('password_confirmation')
                <span class="error-message">{{ $message }}</span>
            @enderror

            <label for="phone">Teléfono:</label>
            <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" placeholder="(opcional)">

            <label for="address">Dirección:</label>
            <input type="text" id="address" name="address" value="{{ old('address') }}" placeholder="(opcional)">

            <button type="submit">Crear Cuenta</button>
        </form>

        <p><a href="{{ route('login') }}">¿Ya tienes cuenta? Inicia sesión aquí</a></p>
        <p>Al registrarse, aceptas nuestros términos y condiciones de servicio</p>
    </main>

    <footer class="footer">
        <p>&copy; 2026 FoodLink. Todos los derechos reservados.</p>
    </footer>
</x-guest-layout>
