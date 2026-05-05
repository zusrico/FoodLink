<x-guest-layout>
    <header>
        <h1><a href="{{ url('/') }}">FoodLink</a></h1>
        <h2>Tu comida favorita, más cerca que nunca</h2>
    </header>

    <main>
        <x-auth-session-status class="auth-status" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" @if($errors->any()) class="shaker" @endif>
            @csrf

            <label for="email">Correo electrónico:</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" placeholder="admin@foodlink.com">
            @error('email')
                <span class="error-message">{{ $message }}</span>
            @enderror

            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required autocomplete="current-password" placeholder="Contraseña">
            @error('password')
                <span class="error-message">{{ $message }}</span>
            @enderror

            <label style="display:flex; align-items:center; gap:.5rem; margin-top:.5rem; font-weight:500;">
                <input type="checkbox" name="remember" id="remember_me" style="width:auto; margin:0;">
                Recordarme
            </label>

            <button type="submit">Iniciar Sesión</button>
        </form>

        <p><a href="{{ route('register') }}">¿No tienes cuenta? Regístrate aquí</a></p>
        @if (Route::has('password.request'))
            <p><a href="{{ route('password.request') }}">¿Olvidaste tu contraseña? Recupérala aquí</a></p>
        @endif
        <p>Accede como usuario o administrador según tus credenciales</p>
    </main>

    <footer class="footer">
        <p>&copy; 2026 FoodLink. Todos los derechos reservados.</p>
    </footer>
</x-guest-layout>
