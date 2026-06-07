<x-guest-layout>
    @php $title = 'Daftar Akun' @endphp

    <div class="auth-card-title">Buat Akun Baru</div>
    <div class="auth-card-sub">Daftarkan diri Anda ke sistem Halal Industries</div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div class="form-group">
            <label for="name" class="form-label">Nama Lengkap</label>
            <input
                id="name"
                type="text"
                name="name"
                value="{{ old('name') }}"
                class="form-input {{ $errors->get('name') ? 'error' : '' }}"
                placeholder="Nama lengkap Anda"
                required
                autofocus
                autocomplete="name"
            >
            @foreach ($errors->get('name') as $message)
                <div class="form-error">
                    <svg width="12" height="12" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                    {{ $message }}
                </div>
            @endforeach
        </div>

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
                    placeholder="Minimal 8 karakter"
                    required
                    autocomplete="new-password"
                    style="padding-right: 48px;"
                >
                <button type="button" class="toggle-pw" onclick="togglePassword('password', this)" tabindex="-1">
                    <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                </button>
            </div>

            <!-- Password Strength Bar -->
            <div id="pw-strength-bar" style="margin-top:8px; height:3px; border-radius:2px; background:var(--dark-4); overflow:hidden; display:none;">
                <div id="pw-strength-fill" style="height:100%; width:0%; border-radius:2px; transition: width 0.3s, background 0.3s;"></div>
            </div>
            <div id="pw-strength-label" style="font-size:11px; margin-top:4px; color:var(--slate); display:none;"></div>

            @foreach ($errors->get('password') as $message)
                <div class="form-error">
                    <svg width="12" height="12" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                    {{ $message }}
                </div>
            @endforeach
        </div>

        <!-- Confirm Password -->
        <div class="form-group">
            <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
            <div class="input-wrapper">
                <input
                    id="password_confirmation"
                    type="password"
                    name="password_confirmation"
                    class="form-input {{ $errors->get('password_confirmation') ? 'error' : '' }}"
                    placeholder="Ulangi password Anda"
                    required
                    autocomplete="new-password"
                    style="padding-right: 48px;"
                >
                <button type="button" class="toggle-pw" onclick="togglePassword('password_confirmation', this)" tabindex="-1">
                    <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                </button>
            </div>
            <div id="pw-match-hint" style="font-size:11px; margin-top:4px; display:none;"></div>
            @foreach ($errors->get('password_confirmation') as $message)
                <div class="form-error">
                    <svg width="12" height="12" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                    {{ $message }}
                </div>
            @endforeach
        </div>

        <!-- Submit -->
        <button type="submit" class="btn-submit" style="margin-top: 8px;">
            <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/></svg>
            Buat Akun Sekarang
        </button>
    </form>

    <div class="divider"></div>

    <div class="auth-footer">
        Sudah punya akun?
        <a href="{{ route('login') }}" class="auth-link" style="margin-left: 4px;">Masuk di sini</a>
    </div>

    <script>
        // Password strength indicator
        const pwInput = document.getElementById('password');
        const bar = document.getElementById('pw-strength-bar');
        const fill = document.getElementById('pw-strength-fill');
        const label = document.getElementById('pw-strength-label');

        pwInput.addEventListener('input', function() {
            const val = this.value;
            if (!val) {
                bar.style.display = 'none';
                label.style.display = 'none';
                return;
            }
            bar.style.display = 'block';
            label.style.display = 'block';

            let score = 0;
            if (val.length >= 8) score++;
            if (/[A-Z]/.test(val)) score++;
            if (/[0-9]/.test(val)) score++;
            if (/[^A-Za-z0-9]/.test(val)) score++;

            const levels = [
                { pct: '25%', color: '#EF5350', text: 'Lemah' },
                { pct: '50%', color: '#FFA726', text: 'Cukup' },
                { pct: '75%', color: '#FFEE58', text: 'Kuat' },
                { pct: '100%', color: '#66BB6A', text: 'Sangat Kuat' },
            ];
            const lvl = levels[score - 1] || levels[0];
            fill.style.width = lvl.pct;
            fill.style.background = lvl.color;
            label.textContent = 'Kekuatan: ' + lvl.text;
            label.style.color = lvl.color;
        });

        // Password match indicator
        const pwConfirm = document.getElementById('password_confirmation');
        const matchHint = document.getElementById('pw-match-hint');

        pwConfirm.addEventListener('input', function() {
            if (!this.value) { matchHint.style.display = 'none'; return; }
            matchHint.style.display = 'block';
            if (this.value === pwInput.value) {
                matchHint.textContent = '✓ Password cocok';
                matchHint.style.color = '#66BB6A';
            } else {
                matchHint.textContent = '✗ Password tidak cocok';
                matchHint.style.color = '#EF5350';
            }
        });
    </script>
</x-guest-layout>
