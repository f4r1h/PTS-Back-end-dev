<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Halal Industries') }} – {{ $title ?? 'Auth' }}</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Barlow+Condensed:wght@600;700;800&display=swap" rel="stylesheet">

    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --gold:    #F5A623;
            --gold-dk: #C7831A;
            --dark:    #0D0F14;
            --dark-2:  #161920;
            --dark-3:  #1E222E;
            --dark-4:  #262B38;
            --slate:   #8A94A8;
            --light:   #E8ECF4;
            --white:   #FFFFFF;
            --danger:  #EF5350;
            --success: #66BB6A;
        }

        html { scroll-behavior: smooth; }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--dark);
            color: var(--light);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        /* Background decorations */
        .bg-grid {
            position: fixed; inset: 0; z-index: 0;
            background-image:
                linear-gradient(rgba(245,166,35,0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(245,166,35,0.03) 1px, transparent 1px);
            background-size: 60px 60px;
            pointer-events: none;
        }

        .bg-glow-1 {
            position: fixed;
            width: 600px; height: 600px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(245,166,35,0.07) 0%, transparent 70%);
            top: -200px; right: -200px;
            pointer-events: none; z-index: 0;
        }

        .bg-glow-2 {
            position: fixed;
            width: 400px; height: 400px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(245,166,35,0.05) 0%, transparent 70%);
            bottom: -100px; left: -100px;
            pointer-events: none; z-index: 0;
        }

        /* Main wrapper */
        .auth-wrapper {
            position: relative; z-index: 1;
            width: 100%;
            max-width: 480px;
            padding: 24px 16px;
        }

        /* Brand header */
        .auth-brand {
            text-align: center;
            margin-bottom: 32px;
        }

        .auth-logo {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 60px; height: 60px;
            background: linear-gradient(135deg, var(--gold), var(--gold-dk));
            border-radius: 16px;
            font-family: 'Barlow Condensed', sans-serif;
            font-size: 26px; font-weight: 800;
            color: var(--dark);
            box-shadow: 0 8px 30px rgba(245,166,35,0.35);
            margin-bottom: 14px;
            text-decoration: none;
        }

        .auth-brand-name {
            font-family: 'Barlow Condensed', sans-serif;
            font-size: 26px; font-weight: 800;
            color: var(--white);
            letter-spacing: 0.3px;
        }

        .auth-brand-name span { color: var(--gold); }

        .auth-brand-tagline {
            font-size: 13px;
            color: var(--slate);
            margin-top: 4px;
        }

        /* Card */
        .auth-card {
            background: var(--dark-3);
            border: 1px solid rgba(245,166,35,0.12);
            border-radius: 20px;
            padding: 40px 36px;
            box-shadow: 0 30px 80px rgba(0,0,0,0.5), 0 0 0 1px rgba(255,255,255,0.03);
        }

        @media (max-width: 480px) {
            .auth-card { padding: 28px 20px; border-radius: 16px; }
        }

        .auth-card-title {
            font-family: 'Barlow Condensed', sans-serif;
            font-size: 1.75rem; font-weight: 800;
            color: var(--white);
            margin-bottom: 4px;
        }

        .auth-card-sub {
            font-size: 14px; color: var(--slate);
            margin-bottom: 28px;
        }

        /* Form elements */
        .form-group { margin-bottom: 20px; }

        .form-label {
            display: block;
            font-size: 13px; font-weight: 600;
            color: var(--light);
            margin-bottom: 8px;
            letter-spacing: 0.2px;
        }

        .form-input {
            width: 100%;
            padding: 12px 16px;
            background: var(--dark-4);
            border: 1.5px solid rgba(255,255,255,0.08);
            border-radius: 10px;
            color: var(--white);
            font-size: 14px;
            font-family: 'Inter', sans-serif;
            transition: border-color 0.2s, box-shadow 0.2s;
            outline: none;
        }

        .form-input::placeholder { color: var(--slate); }

        .form-input:focus {
            border-color: rgba(245,166,35,0.5);
            box-shadow: 0 0 0 3px rgba(245,166,35,0.1);
        }

        .form-input.error {
            border-color: rgba(239,83,80,0.5);
        }

        /* Error messages */
        .form-error {
            display: flex; align-items: center; gap: 6px;
            font-size: 12px; color: var(--danger);
            margin-top: 6px;
        }

        /* Checkbox */
        .checkbox-group {
            display: flex; align-items: center; gap: 10px;
        }

        .form-checkbox {
            width: 16px; height: 16px;
            accent-color: var(--gold);
            cursor: pointer;
        }

        .checkbox-label {
            font-size: 13px; color: var(--slate);
            cursor: pointer;
        }

        /* Session status */
        .session-status {
            padding: 12px 16px;
            background: rgba(102,187,106,0.1);
            border: 1px solid rgba(102,187,106,0.25);
            border-radius: 10px;
            font-size: 13px; color: var(--success);
            margin-bottom: 20px;
        }

        /* Submit button */
        .btn-submit {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, var(--gold), var(--gold-dk));
            border: none;
            border-radius: 10px;
            font-family: 'Inter', sans-serif;
            font-size: 15px; font-weight: 700;
            color: var(--dark);
            cursor: pointer;
            transition: all 0.25s;
            box-shadow: 0 4px 20px rgba(245,166,35,0.3);
            letter-spacing: 0.3px;
            display: flex; align-items: center; justify-content: center; gap: 8px;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 28px rgba(245,166,35,0.45);
        }

        .btn-submit:active {
            transform: translateY(0);
        }

        /* Links */
        .auth-link {
            color: var(--gold);
            font-size: 13px;
            text-decoration: none;
            transition: color 0.2s;
            font-weight: 500;
        }

        .auth-link:hover { color: #ffc15e; text-decoration: underline; }

        .auth-footer {
            text-align: center;
            margin-top: 24px;
            font-size: 13px;
            color: var(--slate);
        }

        .divider {
            height: 1px;
            background: rgba(255,255,255,0.07);
            margin: 24px 0;
        }

        .form-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            flex-wrap: wrap;
        }

        /* Back to home */
        .back-link {
            display: inline-flex; align-items: center; gap: 6px;
            font-size: 13px; color: var(--slate);
            text-decoration: none;
            margin-top: 20px;
            transition: color 0.2s;
        }
        .back-link:hover { color: var(--gold); }

        /* Password toggle */
        .input-wrapper {
            position: relative;
        }

        .toggle-pw {
            position: absolute; right: 14px; top: 50%;
            transform: translateY(-50%);
            background: none; border: none;
            color: var(--slate); cursor: pointer;
            padding: 0; display: flex; align-items: center;
            transition: color 0.2s;
        }

        .toggle-pw:hover { color: var(--gold); }
    </style>
</head>
<body>
    <div class="bg-grid"></div>
    <div class="bg-glow-1"></div>
    <div class="bg-glow-2"></div>

    <div class="auth-wrapper">
        <!-- Brand -->
        <div class="auth-brand">
            <a href="/" class="auth-logo" style="background: transparent; box-shadow: none; overflow: hidden; display: inline-flex; align-items: center; justify-content: center; width: 60px; height: 60px;">
                <img src="{{ asset('image/logo.png') }}" alt="Logo Halal Industries" style="max-width: 100%; max-height: 100%; object-fit: contain;">
            </a>
            <div class="auth-brand-name">Halal <span>Industries</span></div>
            <div class="auth-brand-tagline">Sistem Manajemen Penyewaan Alat Berat</div>
        </div>

        <!-- Card -->
        <div class="auth-card">
            {{ $slot }}
        </div>

        <!-- Back to home -->
        <div style="text-align:center; margin-top: 20px;">
            <a href="/" class="back-link">
                <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                Kembali ke Beranda
            </a>
        </div>
    </div>

    <script>
        // Password visibility toggle
        function togglePassword(inputId, btn) {
            const input = document.getElementById(inputId);
            if (!input) return;
            const isText = input.type === 'text';
            input.type = isText ? 'password' : 'text';
            btn.innerHTML = isText
                ? `<svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>`
                : `<svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/></svg>`;
        }
    </script>
</body>
</html>
