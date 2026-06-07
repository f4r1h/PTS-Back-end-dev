<x-guest-layout>
    @php $title = 'Masuk Akun' @endphp

    <!-- Session Status -->
    @if (session('status'))
        <div class="session-status">
            {{ session('status') }}
        </div>
    @endif

    <div class="auth-card-title">Selamat Datang 👋</div>
    <div class="auth-card-sub">Masuk ke sistem manajemen Halal Industries</div>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email -->
        <div class="form-group">
            <label for="email" class="form-label">Alamat Email</label>
            <input
                id="email"
                type="email"
                name="email"
                value="{{ old('email') }}"
                class="form-input {{ $errors->get('email') ? 'error' : '' }}"
                placeholder="nama@perusahaan.com"
                required
                autofocus
                autocomplete="username"
            >
            @foreach ($errors->get('email') as $message)
                <div class="form-error">
                    <svg width="12" height="12" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                    {{ $message }}
                </div>
            @endforeach
        </div>

        <!-- Password -->
        <div class="form-group">
            <label for="password" class="form-label">Password</label>
            <div class="input-wrapper">
                <input
                    id="password"
                    type="password"
                    name="password"
                    class="form-input {{ $errors->get('password') ? 'error' : '' }}"
                    placeholder="Masukkan password Anda"
                    required
                    autocomplete="current-password"
                    style="padding-right: 48px;"
                >
                <button type="button" class="toggle-pw" onclick="togglePassword('password', this)" tabindex="-1">
                    <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                </button>
            </div>
            @foreach ($errors->get('password') as $message)
                <div class="form-error">
                    <svg width="12" height="12" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                    {{ $message }}
                </div>
            @endforeach
        </div>

        <!-- Remember Me + Forgot Password -->
        <div class="form-row" style="margin-bottom: 24px;">
            <div class="checkbox-group">
                <input id="remember_me" type="checkbox" name="remember" class="form-checkbox">
                <label for="remember_me" class="checkbox-label">Ingat saya</label>
            </div>

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="auth-link">
                    Lupa password?
                </a>
            @endif
        </div>

        <!-- Submit -->
        <button type="submit" class="btn-submit">
            <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/></svg>
            Masuk Sekarang
        </button>
    </form>

    <div class="divider"></div>

    <div class="auth-footer">
        Belum punya akun?
        <a href="{{ route('register') }}" class="auth-link" style="margin-left: 4px;">Daftar di sini</a>
    </div>
</x-guest-layout>
