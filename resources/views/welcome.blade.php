<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halal Industries – Penyewaan Alat Berat Profesional</title>
    <meta name="description" content="Halal Industries menyediakan layanan penyewaan alat berat berkualitas tinggi untuk proyek konstruksi Anda. Armada lengkap, operator berpengalaman, harga kompetitif.">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Barlow+Condensed:wght@600;700;800&display=swap" rel="stylesheet">

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
            --danger:  #E53935;
            --success: #43A047;
        }

        html { scroll-behavior: smooth; }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--dark);
            color: var(--light);
            overflow-x: hidden;
        }

        /* ── SCROLLBAR ── */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: var(--dark-2); }
        ::-webkit-scrollbar-thumb { background: var(--gold); border-radius: 3px; }

        /* ── NAVBAR ── */
        .navbar {
            position: fixed; top: 0; left: 0; right: 0; z-index: 1000;
            display: flex; align-items: center; justify-content: space-between;
            padding: 0 5%;
            height: 72px;
            background: rgba(13, 15, 20, 0.85);
            backdrop-filter: blur(16px);
            border-bottom: 1px solid rgba(245, 166, 35, 0.15);
            transition: background 0.3s;
        }

        .navbar.scrolled {
            background: rgba(13, 15, 20, 0.98);
            border-bottom-color: rgba(245, 166, 35, 0.3);
        }

        .nav-brand {
            display: flex; align-items: center; gap: 12px;
            text-decoration: none;
        }

        .nav-logo-box {
            width: 42px; height: 42px;
        
            border-radius: 10px;
            display: flex; align-items: center; justify-content: center;
            font-family: 'Barlow Condensed', sans-serif;
            font-size: 20px; font-weight: 800;
            color: var(--dark);
            box-shadow: 0 4px 15px rgba(245, 166, 35, 0.35);
        }

        .nav-logo-box img{
            height: 50px;
            width: auto;
        }

        .nav-title {
            font-family: 'Barlow Condensed', sans-serif;
            font-size: 22px; font-weight: 700;
            color: var(--white);
            letter-spacing: 0.5px;
        }

        .nav-title span { color: var(--gold); }

        .nav-links {
            display: flex; align-items: center; gap: 32px;
            list-style: none;
        }

        .nav-links a {
            color: var(--slate);
            text-decoration: none;
            font-size: 14px; font-weight: 500;
            transition: color 0.2s;
        }

        .nav-links a:hover { color: var(--gold); }

        .nav-actions { display: flex; align-items: center; gap: 12px; }

        .btn {
            display: inline-flex; align-items: center; justify-content: center; gap: 8px;
            padding: 10px 22px;
            border-radius: 8px;
            font-size: 14px; font-weight: 600;
            text-decoration: none;
            border: none; cursor: pointer;
            transition: all 0.25s;
        }

        .btn-outline {
            background: transparent;
            border: 1.5px solid rgba(245, 166, 35, 0.5);
            color: var(--gold);
        }
        .btn-outline:hover {
            border-color: var(--gold);
            background: rgba(245, 166, 35, 0.08);
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--gold), var(--gold-dk));
            color: var(--dark);
            box-shadow: 0 4px 20px rgba(245, 166, 35, 0.3);
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 28px rgba(245, 166, 35, 0.45);
        }

        .btn-lg {
            padding: 14px 32px;
            font-size: 16px;
            border-radius: 10px;
        }

        /* ── HERO ── */
        .hero {
            min-height: 100vh;
            display: flex; align-items: center;
            position: relative;
            overflow: hidden;
            padding: 120px 5% 80px;
        }

        .hero-bg {
            position: absolute; inset: 0;
            background:
                radial-gradient(ellipse 80% 60% at 60% 40%, rgba(245,166,35,0.06) 0%, transparent 70%),
                radial-gradient(ellipse 50% 80% at 20% 80%, rgba(245,166,35,0.04) 0%, transparent 60%),
                var(--dark);
        }

        /* Grid lines overlay */
        .hero-grid {
            position: absolute; inset: 0;
            background-image:
                linear-gradient(rgba(245,166,35,0.04) 1px, transparent 1px),
                linear-gradient(90deg, rgba(245,166,35,0.04) 1px, transparent 1px);
            background-size: 60px 60px;
        }

        /* Floating shapes */
        .hero-shape {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            pointer-events: none;
        }
        .shape-1 {
            width: 500px; height: 500px;
            background: rgba(245,166,35,0.06);
            top: -100px; right: -100px;
        }
        .shape-2 {
            width: 300px; height: 300px;
            background: rgba(245,166,35,0.04);
            bottom: 50px; left: -50px;
        }

        .hero-content {
            position: relative; z-index: 2;
            max-width: 650px;
        }

        .hero-badge {
            display: inline-flex; align-items: center; gap: 8px;
            padding: 6px 16px;
            background: rgba(245, 166, 35, 0.1);
            border: 1px solid rgba(245, 166, 35, 0.25);
            border-radius: 100px;
            font-size: 12px; font-weight: 600;
            color: var(--gold);
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: 24px;
        }

        .hero-badge-dot {
            width: 6px; height: 6px;
            background: var(--gold);
            border-radius: 50%;
            animation: blink 1.5s infinite;
        }

        @keyframes blink {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.3; }
        }

        .hero h1 {
            font-family: 'Barlow Condensed', sans-serif;
            font-size: clamp(3rem, 7vw, 5.5rem);
            font-weight: 800;
            line-height: 1.0;
            color: var(--white);
            margin-bottom: 24px;
            letter-spacing: -0.5px;
        }

        .hero h1 .accent {
            color: var(--gold);
            display: block;
        }

        .hero p {
            font-size: 17px;
            color: var(--slate);
            line-height: 1.8;
            margin-bottom: 40px;
            max-width: 520px;
        }

        .hero-cta {
            display: flex; flex-wrap: wrap; gap: 16px;
            align-items: center;
        }

        .hero-stats {
            display: flex; gap: 40px;
            margin-top: 64px;
            padding-top: 40px;
            border-top: 1px solid rgba(255,255,255,0.08);
        }

        .stat-item {}
        .stat-num {
            font-family: 'Barlow Condensed', sans-serif;
            font-size: 2.4rem; font-weight: 800;
            color: var(--gold);
            line-height: 1;
        }
        .stat-label {
            font-size: 13px; color: var(--slate);
            margin-top: 4px;
        }

        /* Hero image side */
        .hero-visual {
            position: absolute;
            right: 5%; top: 50%;
            transform: translateY(-50%);
            z-index: 1;
        }

        .hero-machine-card {
            width: 420px;
            background: var(--dark-3);
            border: 1px solid rgba(245,166,35,0.15);
            border-radius: 20px;
            padding: 28px;
            box-shadow: 0 30px 80px rgba(0,0,0,0.5);
        }

        .machine-img-placeholder {
            width: 100%; height: 220px;
            background: linear-gradient(135deg, var(--dark-4), var(--dark-2));
            border-radius: 12px;
            display: flex; align-items: center; justify-content: center;
            margin-bottom: 20px;
            overflow: hidden;
            position: relative;
        }

        .machine-svg { opacity: 0.35; }

        .machine-badge-row {
            display: flex; gap: 8px; margin-bottom: 16px; flex-wrap: wrap;
        }

        .machine-badge {
            padding: 4px 12px;
            border-radius: 100px;
            font-size: 11px; font-weight: 600;
            letter-spacing: 0.5px;
        }
        .badge-available { background: rgba(67,160,71,0.15); color: #66BB6A; border: 1px solid rgba(67,160,71,0.3); }
        .badge-type { background: rgba(245,166,35,0.1); color: var(--gold); border: 1px solid rgba(245,166,35,0.2); }

        .machine-name {
            font-family: 'Barlow Condensed', sans-serif;
            font-size: 1.4rem; font-weight: 700;
            color: var(--white);
            margin-bottom: 8px;
        }

        .machine-price {
            font-size: 13px; color: var(--slate);
        }
        .machine-price strong { color: var(--gold); font-size: 18px; }

        .card-footer-strip {
            margin-top: 20px;
            padding-top: 16px;
            border-top: 1px solid rgba(255,255,255,0.07);
            display: flex; justify-content: space-between; align-items: center;
        }

        .card-footer-strip span { font-size: 12px; color: var(--slate); }

        /* ── SECTION COMMON ── */
        section { padding: 100px 5%; }

        .section-label {
            display: inline-block;
            font-size: 11px; font-weight: 700;
            text-transform: uppercase; letter-spacing: 2px;
            color: var(--gold);
            margin-bottom: 14px;
        }

        .section-title {
            font-family: 'Barlow Condensed', sans-serif;
            font-size: clamp(2rem, 4vw, 3rem);
            font-weight: 800;
            color: var(--white);
            line-height: 1.15;
            margin-bottom: 16px;
        }

        .section-title span { color: var(--gold); }

        .section-sub {
            font-size: 16px; color: var(--slate);
            max-width: 520px;
            line-height: 1.7;
            margin-bottom: 56px;
        }

        .section-header { margin-bottom: 56px; }
        .section-header.centered { text-align: center; }
        .section-header.centered .section-sub { margin-left: auto; margin-right: auto; }

        /* ── LAYANAN / SERVICES ── */
        .services { background: var(--dark-2); }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 24px;
        }

        .service-card {
            background: var(--dark-3);
            border: 1px solid rgba(255,255,255,0.06);
            border-radius: 16px;
            padding: 32px;
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
        }

        .service-card::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--gold), var(--gold-dk));
            transform: scaleX(0);
            transition: transform 0.3s;
        }

        .service-card:hover {
            border-color: rgba(245,166,35,0.2);
            transform: translateY(-4px);
            box-shadow: 0 20px 50px rgba(0,0,0,0.4);
        }

        .service-card:hover::before { transform: scaleX(1); }

        .service-icon {
            width: 52px; height: 52px;
            background: rgba(245,166,35,0.1);
            border: 1px solid rgba(245,166,35,0.2);
            border-radius: 12px;
            display: flex; align-items: center; justify-content: center;
            margin-bottom: 24px;
            color: var(--gold);
        }

        .service-card h3 {
            font-family: 'Barlow Condensed', sans-serif;
            font-size: 1.25rem; font-weight: 700;
            color: var(--white);
            margin-bottom: 12px;
        }

        .service-card p {
            font-size: 14px; color: var(--slate);
            line-height: 1.7;
        }

        /* ── ARMADA / FLEET ── */
        .fleet-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 24px;
        }

        .fleet-card {
            background: var(--dark-3);
            border: 1px solid rgba(255,255,255,0.06);
            border-radius: 16px;
            overflow: hidden;
            transition: all 0.3s;
        }

        .fleet-card:hover {
            border-color: rgba(245,166,35,0.2);
            transform: translateY(-5px);
            box-shadow: 0 25px 60px rgba(0,0,0,0.5);
        }

        .fleet-img {
            width: 100%; height: 200px;
            background: linear-gradient(135deg, var(--dark-4), var(--dark-2));
            display: flex; align-items: center; justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .fleet-img-label {
            position: absolute; bottom: 12px; right: 12px;
            background: rgba(245,166,35,0.85);
            color: var(--dark); font-size: 11px; font-weight: 700;
            padding: 4px 10px; border-radius: 6px;
            text-transform: uppercase; letter-spacing: 0.5px;
        }

        .fleet-body { padding: 24px; }

        .fleet-body h3 {
            font-family: 'Barlow Condensed', sans-serif;
            font-size: 1.2rem; font-weight: 700;
            color: var(--white);
            margin-bottom: 8px;
        }

        .fleet-specs {
            display: flex; flex-direction: column; gap: 6px;
            margin-bottom: 20px;
        }

        .fleet-spec {
            display: flex; justify-content: space-between; align-items: center;
            font-size: 13px;
        }

        .fleet-spec-key { color: var(--slate); }
        .fleet-spec-val { color: var(--light); font-weight: 500; }

        .fleet-footer {
            display: flex; justify-content: space-between; align-items: center;
            padding-top: 16px;
            border-top: 1px solid rgba(255,255,255,0.07);
        }

        .fleet-price {
            font-family: 'Barlow Condensed', sans-serif;
            font-size: 1.3rem; font-weight: 700;
            color: var(--gold);
        }

        .fleet-price small { font-size: 12px; color: var(--slate); font-family: 'Inter', sans-serif; font-weight: 400; }

        .fleet-status {
            font-size: 11px; font-weight: 600;
            padding: 4px 10px; border-radius: 100px;
        }
        .status-available { background: rgba(67,160,71,0.15); color: #66BB6A; }
        .status-rented    { background: rgba(229,57,53,0.15); color: #EF5350; }

        /* ── PROSES / HOW IT WORKS ── */
        .process { background: var(--dark-2); }

        .process-steps {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 0;
            position: relative;
        }

        .process-step {
            text-align: center;
            padding: 32px 24px;
            position: relative;
        }

        .process-step:not(:last-child)::after {
            content: '';
            position: absolute;
            top: 52px; right: -1px;
            width: 2px; height: 60px;
            background: linear-gradient(to bottom, var(--gold), transparent);
            opacity: 0.3;
        }

        @media (max-width: 768px) {
            .process-step:not(:last-child)::after { display: none; }
        }

        .step-num {
            width: 64px; height: 64px;
            background: linear-gradient(135deg, rgba(245,166,35,0.15), rgba(245,166,35,0.05));
            border: 2px solid rgba(245,166,35,0.3);
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            margin: 0 auto 20px;
            font-family: 'Barlow Condensed', sans-serif;
            font-size: 1.6rem; font-weight: 800;
            color: var(--gold);
            transition: all 0.3s;
        }

        .process-step:hover .step-num {
            background: rgba(245,166,35,0.2);
            border-color: var(--gold);
            box-shadow: 0 0 25px rgba(245,166,35,0.25);
        }

        .process-step h3 {
            font-size: 16px; font-weight: 700;
            color: var(--white); margin-bottom: 10px;
        }

        .process-step p {
            font-size: 14px; color: var(--slate);
            line-height: 1.6;
        }

        /* ── KEUNGGULAN ── */
        .features-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: center;
        }

        @media (max-width: 900px) {
            .features-grid { grid-template-columns: 1fr; }
        }

        .features-list {
            display: flex; flex-direction: column; gap: 28px;
        }

        .feature-item {
            display: flex; gap: 20px; align-items: flex-start;
        }

        .feature-icon {
            width: 44px; height: 44px; flex-shrink: 0;
            background: rgba(245,166,35,0.1);
            border: 1px solid rgba(245,166,35,0.2);
            border-radius: 10px;
            display: flex; align-items: center; justify-content: center;
            color: var(--gold);
        }

        .feature-text h4 {
            font-size: 16px; font-weight: 700;
            color: var(--white); margin-bottom: 6px;
        }
        .feature-text p { font-size: 14px; color: var(--slate); line-height: 1.6; }

        .features-visual {
            position: relative;
        }

        .big-stat-card {
            background: var(--dark-3);
            border: 1px solid rgba(245,166,35,0.15);
            border-radius: 20px;
            padding: 40px;
            text-align: center;
        }

        .big-stat-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 28px;
        }

        .big-stat-item {
            padding: 24px;
            background: var(--dark-4);
            border-radius: 12px;
            border: 1px solid rgba(255,255,255,0.05);
        }

        .big-stat-num {
            font-family: 'Barlow Condensed', sans-serif;
            font-size: 2.5rem; font-weight: 800;
            color: var(--gold);
            line-height: 1;
            margin-bottom: 6px;
        }

        .big-stat-label {
            font-size: 12px; color: var(--slate);
            text-transform: uppercase; letter-spacing: 0.5px;
        }

        /* ── KONTAK / CTA ── */
        .cta-section {
            background: var(--dark-2);
            position: relative;
            overflow: hidden;
        }

        .cta-glow {
            position: absolute;
            width: 600px; height: 400px;
            background: radial-gradient(ellipse, rgba(245,166,35,0.08) 0%, transparent 70%);
            top: 50%; left: 50%;
            transform: translate(-50%, -50%);
            pointer-events: none;
        }

        .cta-inner {
            position: relative; z-index: 1;
            text-align: center;
            max-width: 700px;
            margin: 0 auto;
        }

        .cta-inner .section-title { font-size: clamp(2rem, 5vw, 3.5rem); }

        .cta-contacts {
            display: flex; flex-wrap: wrap; gap: 16px;
            justify-content: center;
            margin-top: 40px;
        }

        .contact-pill {
            display: inline-flex; align-items: center; gap: 10px;
            padding: 12px 24px;
            background: var(--dark-3);
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 100px;
            color: var(--light);
            font-size: 14px; font-weight: 500;
            text-decoration: none;
            transition: all 0.25s;
        }

        .contact-pill:hover {
            border-color: var(--gold);
            color: var(--gold);
        }

        .contact-pill svg { color: var(--gold); flex-shrink: 0; }

        /* ── FOOTER ── */
        footer {
            background: var(--dark);
            border-top: 1px solid rgba(255,255,255,0.06);
            padding: 60px 5% 32px;
        }

        .footer-top {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr;
            gap: 60px;
            padding-bottom: 48px;
            border-bottom: 1px solid rgba(255,255,255,0.06);
            margin-bottom: 32px;
        }

        @media (max-width: 768px) {
            .footer-top { grid-template-columns: 1fr; gap: 40px; }
        }

        .footer-brand p {
            font-size: 14px; color: var(--slate); margin-top: 16px; line-height: 1.7;
            max-width: 320px;
        }

        .footer-col h4 {
            font-size: 13px; font-weight: 700; color: var(--white);
            text-transform: uppercase; letter-spacing: 1px;
            margin-bottom: 18px;
        }

        .footer-col ul { list-style: none; }
        .footer-col ul li { margin-bottom: 10px; }
        .footer-col ul li a {
            color: var(--slate); text-decoration: none; font-size: 14px;
            transition: color 0.2s;
        }
        .footer-col ul li a:hover { color: var(--gold); }

        .footer-bottom {
            display: flex; justify-content: space-between; align-items: center;
            flex-wrap: wrap; gap: 12px;
        }

        .footer-bottom p { font-size: 13px; color: var(--slate); }
        .footer-bottom span { color: var(--gold); }

        /* ── MOBILE NAV ── */
        @media (max-width: 768px) {
            .nav-links { display: none; }
            .hero-visual { display: none; }
            .hero { padding: 100px 5% 60px; }
            .hero h1 { font-size: 3rem; }
            .hero-stats { gap: 24px; flex-wrap: wrap; }
            section { padding: 70px 5%; }
            .features-grid { gap: 40px; }
        }

        /* ── ANIMATIONS ── */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(30px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .animate-fadeup {
            opacity: 0;
            animation: fadeUp 0.7s ease forwards;
        }
        .delay-1 { animation-delay: 0.1s; }
        .delay-2 { animation-delay: 0.25s; }
        .delay-3 { animation-delay: 0.4s; }
        .delay-4 { animation-delay: 0.55s; }

        /* Icon SVG size */
        svg { flex-shrink: 0; }
    </style>
</head>
<body>

<!-- ═══════════════════════════════════════════
     NAVBAR
═══════════════════════════════════════════ -->
<nav class="navbar" id="navbar">
    <a href="/" class="nav-brand">
        <div class="nav-logo-box"><img src="../image/logo.png" alt=""></div>
        <span class="nav-title">Halal <span>Industries</span></span>
    </a>

    <ul class="nav-links">
        <li><a href="#layanan">Layanan</a></li>
        <li><a href="#armada">Armada</a></li>
        <li><a href="#proses">Cara Kerja</a></li>
        <li><a href="#kontak">Kontak</a></li>
    </ul>

    <div class="nav-actions">
        @if (Route::has('login'))
            @auth
                <a href="{{ url('/dashboard') }}" class="btn btn-primary">Dasbor Admin</a>
            @else
                <a href="{{ route('login') }}" class="btn btn-outline">Masuk</a>
            @endauth
        @endif
    </div>
</nav>


<!-- ═══════════════════════════════════════════
     HERO
═══════════════════════════════════════════ -->
<section class="hero">
    <div class="hero-bg"></div>
    <div class="hero-grid"></div>
    <div class="hero-shape shape-1"></div>
    <div class="hero-shape shape-2"></div>

    <div class="hero-content">
        <div class="hero-badge animate-fadeup">
            <span class="hero-badge-dot"></span>
            Armada Siap Operasi 24/7
        </div>

        <h1 class="animate-fadeup delay-1">
            Sewa Alat Berat
            <span class="accent">Profesional &amp; Terpercaya</span>
        </h1>

        <p class="animate-fadeup delay-2">
            Halal Industries menyediakan solusi penyewaan alat berat berkualitas tinggi untuk proyek konstruksi, pertambangan, dan infrastruktur Anda. Armada lengkap dengan operator berpengalaman.
        </p>

        <div class="hero-cta animate-fadeup delay-3">
            @auth
                <a href="{{ url('/dashboard') }}" class="btn btn-primary btn-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                    Buka Dasbor
                </a>
            @else
                <a href="{{ route('login') }}" class="btn btn-primary btn-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/></svg>
                    Konsultasi Sekarang
                </a>
                <a href="#armada" class="btn btn-outline btn-lg">
                    Lihat Armada
                </a>
            @endauth
        </div>

        <div class="hero-stats animate-fadeup delay-4">
            <div class="stat-item">
                <div class="stat-num">50+</div>
                <div class="stat-label">Unit Alat Berat</div>
            </div>
            <div class="stat-item">
                <div class="stat-num">200+</div>
                <div class="stat-label">Proyek Selesai</div>
            </div>
            <div class="stat-item">
                <div class="stat-num">15+</div>
                <div class="stat-label">Tahun Pengalaman</div>
            </div>
        </div>
    </div>

    <!-- Hero Visual Card -->
    <div class="hero-visual">
        <div class="hero-machine-card">
            <div class="machine-img-placeholder">
                <svg class="machine-svg" width="160" height="120" viewBox="0 0 160 120" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <!-- Excavator silhouette -->
                    <rect x="10" y="80" width="80" height="22" rx="4" fill="#F5A623" opacity="0.6"/>
                    <rect x="15" y="85" width="70" height="4" rx="2" fill="#F5A623" opacity="0.8"/>
                    <rect x="40" y="55" width="30" height="28" rx="3" fill="#F5A623" opacity="0.5"/>
                    <rect x="35" y="50" width="40" height="10" rx="3" fill="#F5A623" opacity="0.7"/>
                    <!-- Arm -->
                    <line x1="70" y1="58" x2="110" y2="35" stroke="#F5A623" stroke-width="6" stroke-linecap="round" opacity="0.7"/>
                    <line x1="110" y1="35" x2="135" y2="55" stroke="#F5A623" stroke-width="5" stroke-linecap="round" opacity="0.6"/>
                    <rect x="128" y="52" width="22" height="14" rx="3" fill="#F5A623" opacity="0.8"/>
                    <!-- Wheels -->
                    <circle cx="22" cy="98" r="9" fill="#C7831A" opacity="0.8"/>
                    <circle cx="78" cy="98" r="9" fill="#C7831A" opacity="0.8"/>
                    <circle cx="22" cy="98" r="4" fill="#0D0F14" opacity="0.5"/>
                    <circle cx="78" cy="98" r="4" fill="#0D0F14" opacity="0.5"/>
                    <!-- Exhaust smoke circles -->
                    <circle cx="55" cy="25" r="8" fill="#8A94A8" opacity="0.2"/>
                    <circle cx="65" cy="15" r="5" fill="#8A94A8" opacity="0.15"/>
                    <circle cx="58" cy="8" r="3" fill="#8A94A8" opacity="0.1"/>
                </svg>
                <div class="fleet-img-label">Excavator</div>
            </div>
            <div class="machine-badge-row">
                <span class="machine-badge badge-available">● Tersedia</span>
                <span class="machine-badge badge-type">Konstruksi</span>
            </div>
            <div class="machine-name">Excavator PC200-8</div>
            <div class="machine-price">
                <strong>Rp 2.500.000</strong> / hari
            </div>
            <div class="card-footer-strip">
                <span>📍 Lokasi: Site A – Surabaya</span>
                <span>Kondisi: Baik</span>
            </div>
        </div>
    </div>
</section>


<!-- ═══════════════════════════════════════════
     LAYANAN
═══════════════════════════════════════════ -->
<section class="services" id="layanan">
    <div class="section-header centered">
        <span class="section-label">Apa yang Kami Tawarkan</span>
        <h2 class="section-title">Layanan <span>Unggulan</span> Kami</h2>
        <p class="section-sub">Kami menyediakan solusi alat berat menyeluruh, dari penyewaan harian hingga kontrak proyek jangka panjang.</p>
    </div>

    <div class="services-grid">
        <div class="service-card">
            <div class="service-icon">
                <svg width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
            </div>
            <h3>Sewa Harian</h3>
            <p>Sewa alat berat per hari dengan fleksibilitas tinggi. Cocok untuk pekerjaan singkat dan proyek skala kecil-menengah tanpa komitmen jangka panjang.</p>
        </div>

        <div class="service-card">
            <div class="service-icon">
                <svg width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/></svg>
            </div>
            <h3>Kontrak Proyek</h3>
            <p>Paket penyewaan kontrak untuk proyek infrastruktur berskala besar dengan harga kompetitif, SLA yang jelas, dan dukungan teknis penuh.</p>
        </div>

        <div class="service-card">
            <div class="service-icon">
                <svg width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
            </div>
            <h3>Operator Berpengalaman</h3>
            <p>Setiap unit dilengkapi operator tersertifikasi dengan jam terbang tinggi. Keselamatan dan efisiensi pekerjaan terjamin di setiap proyek.</p>
        </div>

        <div class="service-card">
            <div class="service-icon">
                <svg width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
            </div>
            <h3>Perawatan & Servis</h3>
            <p>Tim mekanik kami memastikan setiap unit dalam kondisi prima sebelum beroperasi. Pemeliharaan berkala dan respons darurat 24 jam tersedia.</p>
        </div>

        <div class="service-card">
            <div class="service-icon">
                <svg width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/></svg>
            </div>
            <h3>Pengiriman ke Lokasi</h3>
            <p>Kami menangani transportasi dan mobilisasi alat berat dari gudang kami langsung ke lokasi proyek Anda di seluruh wilayah Jawa.</p>
        </div>

        <div class="service-card">
            <div class="service-icon">
                <svg width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
            </div>
            <h3>Asuransi & Jaminan</h3>
            <p>Seluruh armada kami dilindungi asuransi komprehensif. Klien mendapatkan ketenangan pikiran dengan jaminan perlindungan penuh selama masa sewa.</p>
        </div>
    </div>
</section>


<!-- ═══════════════════════════════════════════
     ARMADA
═══════════════════════════════════════════ -->
<section id="armada">
    <div class="section-header">
        <span class="section-label">Katalog Unit</span>
        <h2 class="section-title">Armada <span>Alat Berat</span> Kami</h2>
        <p class="section-sub">Pilihan armada lengkap siap untuk berbagai kebutuhan proyek konstruksi dan pertambangan Anda.</p>
    </div>

    <div class="fleet-grid">

        <!-- Card 1: Excavator -->
        <div class="fleet-card">
            <div class="fleet-img">
                <svg width="130" height="100" viewBox="0 0 130 100" fill="none" opacity="0.4">
                    <rect x="5" y="65" width="70" height="18" rx="3" fill="#F5A623"/>
                    <rect x="30" y="42" width="28" height="25" rx="2" fill="#F5A623"/>
                    <rect x="28" y="38" width="32" height="8" rx="2" fill="#F5A623" opacity="0.8"/>
                    <line x1="58" y1="46" x2="95" y2="28" stroke="#F5A623" stroke-width="5" stroke-linecap="round"/>
                    <line x1="95" y1="28" x2="115" y2="44" stroke="#F5A623" stroke-width="4" stroke-linecap="round"/>
                    <rect x="108" y="41" width="18" height="11" rx="2" fill="#F5A623"/>
                    <circle cx="18" cy="80" r="8" fill="#C7831A"/>
                    <circle cx="62" cy="80" r="8" fill="#C7831A"/>
                </svg>
                <div class="fleet-img-label">Excavator</div>
            </div>
            <div class="fleet-body">
                <h3>Excavator Hydraulic</h3>
                <div class="fleet-specs">
                    <div class="fleet-spec"><span class="fleet-spec-key">Merek</span><span class="fleet-spec-val">Komatsu / Caterpillar</span></div>
                    <div class="fleet-spec"><span class="fleet-spec-key">Kapasitas Bucket</span><span class="fleet-spec-val">0.8 – 1.2 m³</span></div>
                    <div class="fleet-spec"><span class="fleet-spec-key">Bobot Operasi</span><span class="fleet-spec-val">20 – 25 Ton</span></div>
                </div>
                <div class="fleet-footer">
                    <div class="fleet-price">Rp 2.500.000 <small>/hari</small></div>
                    <span class="fleet-status status-available">Tersedia</span>
                </div>
            </div>
        </div>

        <!-- Card 2: Bulldozer -->
        <div class="fleet-card">
            <div class="fleet-img">
                <svg width="130" height="100" viewBox="0 0 130 100" fill="none" opacity="0.4">
                    <rect x="5" y="60" width="100" height="22" rx="3" fill="#F5A623"/>
                    <rect x="10" y="65" width="90" height="5" rx="2" fill="#C7831A" opacity="0.6"/>
                    <rect x="20" y="38" width="55" height="25" rx="3" fill="#F5A623" opacity="0.9"/>
                    <rect x="5" y="55" width="20" height="25" rx="2" fill="#F5A623" opacity="0.8"/>
                    <rect x="3" y="52" width="5" height="32" rx="2" fill="#C7831A"/>
                    <circle cx="20" cy="80" r="7" fill="#C7831A"/>
                    <circle cx="90" cy="80" r="7" fill="#C7831A"/>
                    <circle cx="55" cy="80" r="7" fill="#C7831A" opacity="0.6"/>
                </svg>
                <div class="fleet-img-label">Bulldozer</div>
            </div>
            <div class="fleet-body">
                <h3>Bulldozer D65EX</h3>
                <div class="fleet-specs">
                    <div class="fleet-spec"><span class="fleet-spec-key">Merek</span><span class="fleet-spec-val">Komatsu</span></div>
                    <div class="fleet-spec"><span class="fleet-spec-key">Tenaga Mesin</span><span class="fleet-spec-val">190 HP</span></div>
                    <div class="fleet-spec"><span class="fleet-spec-key">Bobot Operasi</span><span class="fleet-spec-val">18 Ton</span></div>
                </div>
                <div class="fleet-footer">
                    <div class="fleet-price">Rp 3.200.000 <small>/hari</small></div>
                    <span class="fleet-status status-available">Tersedia</span>
                </div>
            </div>
        </div>

        <!-- Card 3: Motor Grader -->
        <div class="fleet-card">
            <div class="fleet-img">
                <svg width="130" height="100" viewBox="0 0 130 100" fill="none" opacity="0.4">
                    <rect x="5" y="68" width="120" height="14" rx="2" fill="#F5A623" opacity="0.5"/>
                    <rect x="40" y="50" width="50" height="22" rx="3" fill="#F5A623" opacity="0.9"/>
                    <rect x="80" y="40" width="25" height="15" rx="2" fill="#F5A623" opacity="0.7"/>
                    <rect x="10" y="60" width="40" height="14" rx="2" fill="#F5A623" opacity="0.6"/>
                    <line x1="30" y1="65" x2="60" y2="65" stroke="#C7831A" stroke-width="5" stroke-linecap="round"/>
                    <circle cx="22" cy="78" r="8" fill="#C7831A"/>
                    <circle cx="105" cy="78" r="8" fill="#C7831A"/>
                </svg>
                <div class="fleet-img-label">Motor Grader</div>
            </div>
            <div class="fleet-body">
                <h3>Motor Grader GD655-5</h3>
                <div class="fleet-specs">
                    <div class="fleet-spec"><span class="fleet-spec-key">Merek</span><span class="fleet-spec-val">Komatsu</span></div>
                    <div class="fleet-spec"><span class="fleet-spec-key">Panjang Blade</span><span class="fleet-spec-val">3.7 m</span></div>
                    <div class="fleet-spec"><span class="fleet-spec-key">Tenaga Mesin</span><span class="fleet-spec-val">175 HP</span></div>
                </div>
                <div class="fleet-footer">
                    <div class="fleet-price">Rp 2.800.000 <small>/hari</small></div>
                    <span class="fleet-status status-rented">Disewa</span>
                </div>
            </div>
        </div>

        <!-- Card 4: Dump Truck -->
        <div class="fleet-card">
            <div class="fleet-img">
                <svg width="130" height="100" viewBox="0 0 130 100" fill="none" opacity="0.4">
                    <rect x="5" y="62" width="120" height="18" rx="4" fill="#F5A623" opacity="0.6"/>
                    <rect x="55" y="38" width="70" height="28" rx="3" fill="#F5A623" opacity="0.85"/>
                    <rect x="5" y="45" width="55" height="22" rx="3" fill="#F5A623" opacity="0.7"/>
                    <rect x="8" y="48" width="22" height="12" rx="2" fill="#0D0F14" opacity="0.4"/>
                    <circle cx="28" cy="78" r="9" fill="#C7831A"/>
                    <circle cx="100" cy="78" r="9" fill="#C7831A"/>
                    <circle cx="28" cy="78" r="4" fill="#0D0F14" opacity="0.5"/>
                    <circle cx="100" cy="78" r="4" fill="#0D0F14" opacity="0.5"/>
                </svg>
                <div class="fleet-img-label">Dump Truck</div>
            </div>
            <div class="fleet-body">
                <h3>Dump Truck HD785</h3>
                <div class="fleet-specs">
                    <div class="fleet-spec"><span class="fleet-spec-key">Merek</span><span class="fleet-spec-val">Komatsu</span></div>
                    <div class="fleet-spec"><span class="fleet-spec-key">Kapasitas Muatan</span><span class="fleet-spec-val">91 Ton</span></div>
                    <div class="fleet-spec"><span class="fleet-spec-key">Tenaga Mesin</span><span class="fleet-spec-val">1000 HP</span></div>
                </div>
                <div class="fleet-footer">
                    <div class="fleet-price">Rp 4.500.000 <small>/hari</small></div>
                    <span class="fleet-status status-available">Tersedia</span>
                </div>
            </div>
        </div>

        <!-- Card 5: Tower Crane -->
        <div class="fleet-card">
            <div class="fleet-img">
                <svg width="130" height="100" viewBox="0 0 130 100" fill="none" opacity="0.4">
                    <rect x="60" y="10" width="6" height="80" fill="#F5A623" opacity="0.8"/>
                    <rect x="30" y="15" width="70" height="6" fill="#F5A623" opacity="0.9"/>
                    <rect x="30" y="15" width="40" height="6" fill="#C7831A" opacity="0.6"/>
                    <line x1="63" y1="18" x2="100" y2="40" stroke="#F5A623" stroke-width="2" opacity="0.5"/>
                    <line x1="63" y1="18" x2="38" y2="35" stroke="#F5A623" stroke-width="2" opacity="0.5"/>
                    <rect x="55" y="88" width="16" height="8" rx="2" fill="#F5A623" opacity="0.7"/>
                    <circle cx="100" cy="40" r="4" fill="#F5A623" opacity="0.6"/>
                </svg>
                <div class="fleet-img-label">Tower Crane</div>
            </div>
            <div class="fleet-body">
                <h3>Tower Crane Liebherr</h3>
                <div class="fleet-specs">
                    <div class="fleet-spec"><span class="fleet-spec-key">Merek</span><span class="fleet-spec-val">Liebherr</span></div>
                    <div class="fleet-spec"><span class="fleet-spec-key">Kapasitas Angkat</span><span class="fleet-spec-val">8 Ton</span></div>
                    <div class="fleet-spec"><span class="fleet-spec-key">Tinggi Max</span><span class="fleet-spec-val">65 m</span></div>
                </div>
                <div class="fleet-footer">
                    <div class="fleet-price">Rp 8.000.000 <small>/hari</small></div>
                    <span class="fleet-status status-available">Tersedia</span>
                </div>
            </div>
        </div>

        <!-- Card 6: Vibro Compactor -->
        <div class="fleet-card">
            <div class="fleet-img">
                <svg width="130" height="100" viewBox="0 0 130 100" fill="none" opacity="0.4">
                    <rect x="25" y="55" width="80" height="28" rx="5" fill="#F5A623" opacity="0.7"/>
                    <rect x="45" y="30" width="40" height="28" rx="3" fill="#F5A623" opacity="0.9"/>
                    <rect x="55" y="22" width="20" height="10" rx="2" fill="#F5A623" opacity="0.6"/>
                    <rect x="25" y="78" width="80" height="8" rx="4" fill="#C7831A" opacity="0.8"/>
                    <line x1="40" y1="75" x2="40" y2="85" stroke="#F5A623" stroke-width="3"/>
                    <line x1="55" y1="75" x2="55" y2="85" stroke="#F5A623" stroke-width="3"/>
                    <line x1="70" y1="75" x2="70" y2="85" stroke="#F5A623" stroke-width="3"/>
                    <line x1="85" y1="75" x2="85" y2="85" stroke="#F5A623" stroke-width="3"/>
                    <line x1="100" y1="75" x2="100" y2="85" stroke="#F5A623" stroke-width="3"/>
                </svg>
                <div class="fleet-img-label">Vibro Compactor</div>
            </div>
            <div class="fleet-body">
                <h3>Vibro Compactor SD100</h3>
                <div class="fleet-specs">
                    <div class="fleet-spec"><span class="fleet-spec-key">Merek</span><span class="fleet-spec-val">Sakai</span></div>
                    <div class="fleet-spec"><span class="fleet-spec-key">Lebar Drum</span><span class="fleet-spec-val">2.13 m</span></div>
                    <div class="fleet-spec"><span class="fleet-spec-key">Bobot Operasi</span><span class="fleet-spec-val">10 Ton</span></div>
                </div>
                <div class="fleet-footer">
                    <div class="fleet-price">Rp 1.800.000 <small>/hari</small></div>
                    <span class="fleet-status status-available">Tersedia</span>
                </div>
            </div>
        </div>

    </div>
</section>


<!-- ═══════════════════════════════════════════
     PROSES / HOW IT WORKS
═══════════════════════════════════════════ -->
<section class="process" id="proses">
    <div class="section-header centered">
        <span class="section-label">Mudah &amp; Cepat</span>
        <h2 class="section-title">Bagaimana Cara <span>Menyewa?</span></h2>
        <p class="section-sub">Proses pemesanan yang simpel dan transparan, dari konsultasi hingga alat siap di lokasi proyek Anda.</p>
    </div>

    <div class="process-steps">
        <div class="process-step">
            <div class="step-num">01</div>
            <h3>Konsultasi Kebutuhan</h3>
            <p>Hubungi tim kami melalui telepon atau WhatsApp. Jelaskan jenis proyek dan kebutuhan alat berat Anda.</p>
        </div>
        <div class="process-step">
            <div class="step-num">02</div>
            <h3>Penawaran Harga</h3>
            <p>Kami akan menyiapkan penawaran harga yang kompetitif sesuai durasi dan spesifikasi kebutuhan proyek.</p>
        </div>
        <div class="process-step">
            <div class="step-num">03</div>
            <h3>Tanda Tangan Kontrak</h3>
            <p>Penandatanganan SPK (Surat Perintah Kerja) dan perjanjian sewa sesuai kesepakatan kedua belah pihak.</p>
        </div>
        <div class="process-step">
            <div class="step-num">04</div>
            <h3>Mobilisasi Alat</h3>
            <p>Tim kami mengantarkan alat berat beserta operator bersertifikasi ke lokasi proyek Anda tepat waktu.</p>
        </div>
        <div class="process-step">
            <div class="step-num">05</div>
            <h3>Proyek Berjalan</h3>
            <p>Alat beroperasi dengan pengawasan penuh. Tim support kami siap 24/7 untuk kebutuhan teknis darurat.</p>
        </div>
    </div>
</section>


<!-- ═══════════════════════════════════════════
     KEUNGGULAN
═══════════════════════════════════════════ -->
<section id="keunggulan">
    <div class="features-grid">
        <div>
            <span class="section-label">Mengapa Halal Industries?</span>
            <h2 class="section-title">Keunggulan yang Membuat Kami <span>Berbeda</span></h2>
            <p class="section-sub" style="margin-bottom: 40px;">Kepercayaan klien dibangun di atas komitmen kualitas, transparansi, dan keandalan layanan kami.</p>

            <div class="features-list">
                <div class="feature-item">
                    <div class="feature-icon">
                        <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <div class="feature-text">
                        <h4>Armada Terawat &amp; Bersertifikasi</h4>
                        <p>Setiap unit melalui inspeksi ketat dan memiliki sertifikasi laik operasi dari lembaga terakreditasi.</p>
                    </div>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">
                        <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <div class="feature-text">
                        <h4>Respons Cepat 24 Jam</h4>
                        <p>Tim darurat kami siap merespons dan menangani kendala teknis kapanpun dibutuhkan, tanpa terkecuali.</p>
                    </div>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">
                        <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <div class="feature-text">
                        <h4>Harga Transparan Tanpa Biaya Tersembunyi</h4>
                        <p>Penawaran harga kami jelas dan rinci. Tidak ada biaya kejutan di akhir masa sewa.</p>
                    </div>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">
                        <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    </div>
                    <div class="feature-text">
                        <h4>Jangkauan Wilayah Luas</h4>
                        <p>Melayani proyek di seluruh wilayah Jawa Timur, Jawa Tengah, dan sekitarnya dengan armada transportasi sendiri.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="features-visual">
            <div class="big-stat-card">
                <div style="margin-bottom: 28px;">
                    <div class="nav-logo-box" style="margin: 0 auto 16px; width: 56px; height: 56px; font-size: 24px;">HI</div>
                    <div style="font-family:'Barlow Condensed',sans-serif; font-size:1.4rem; font-weight:800; color:var(--white);">Halal Industries</div>
                    <div style="font-size:13px; color:var(--slate); margin-top:4px;">Dipercaya sejak 2009</div>
                </div>
                <div class="big-stat-grid">
                    <div class="big-stat-item">
                        <div class="big-stat-num">50+</div>
                        <div class="big-stat-label">Unit Armada</div>
                    </div>
                    <div class="big-stat-item">
                        <div class="big-stat-num">200+</div>
                        <div class="big-stat-label">Proyek Sukses</div>
                    </div>
                    <div class="big-stat-item">
                        <div class="big-stat-num">80+</div>
                        <div class="big-stat-label">Klien Aktif</div>
                    </div>
                    <div class="big-stat-item">
                        <div class="big-stat-num">15+</div>
                        <div class="big-stat-label">Tahun Berpengalaman</div>
                    </div>
                </div>
                <div style="margin-top: 24px; padding: 16px; background: rgba(245,166,35,0.08); border: 1px solid rgba(245,166,35,0.2); border-radius: 10px;">
                    <div style="font-size:13px; color:var(--gold); font-weight:600; margin-bottom:4px;">✦ Prinsip Kami</div>
                    <div style="font-size:13px; color:var(--slate); line-height:1.6;">
                        Beroperasi dengan prinsip kejujuran, amanah, dan profesionalisme sesuai nilai-nilai Islam.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- ═══════════════════════════════════════════
     KONTAK / CTA
═══════════════════════════════════════════ -->
<section class="cta-section" id="kontak">
    <div class="cta-glow"></div>
    <div class="cta-inner">
        <span class="section-label">Siap Memulai?</span>
        <h2 class="section-title">
            Hubungi Kami untuk <span>Penawaran Terbaik</span>
        </h2>
        <p style="font-size:16px; color:var(--slate); line-height:1.7; margin-top:16px;">
            Tim kami siap membantu Anda menemukan solusi alat berat yang paling sesuai dengan kebutuhan dan anggaran proyek Anda.
        </p>

        <div class="cta-contacts">
            <a href="tel:+6281234567890" class="contact-pill">
                <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                +62 812-3456-7890
            </a>
            <a href="https://wa.me/6281234567890" class="contact-pill" target="_blank">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" style="color:var(--gold)"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                WhatsApp
            </a>
            <a href="mailto:info@halalindustries.co.id" class="contact-pill">
                <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                info@halalindustries.co.id
            </a>
            <a href="https://maps.google.com" class="contact-pill" target="_blank">
                <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                Surabaya, Jawa Timur
            </a>
        </div>

        @guest
        <div style="margin-top: 48px;">
            <a href="{{ route('login') }}" class="btn btn-primary btn-lg">
                Login ke Sistem Manajemen
                <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </a>
        </div>
        @endguest
    </div>
</section>


<!-- ═══════════════════════════════════════════
     FOOTER
═══════════════════════════════════════════ -->
<footer>
    <div class="footer-top">
        <div class="footer-brand">
            <a href="/" class="nav-brand" style="display:inline-flex;">
                <div class="nav-logo-box">HI</div>
                <span class="nav-title">Halal <span>Industries</span></span>
            </a>
            <p>Solusi penyewaan alat berat profesional yang amanah dan terpercaya untuk mendukung kemajuan proyek konstruksi dan infrastruktur Indonesia.</p>
        </div>

        <div class="footer-col">
            <h4>Navigasi</h4>
            <ul>
                <li><a href="#layanan">Layanan</a></li>
                <li><a href="#armada">Armada</a></li>
                <li><a href="#proses">Cara Kerja</a></li>
                <li><a href="#keunggulan">Keunggulan</a></li>
                <li><a href="#kontak">Kontak</a></li>
            </ul>
        </div>

        <div class="footer-col">
            <h4>Informasi</h4>
            <ul>
                <li><a href="#">Syarat &amp; Ketentuan</a></li>
                <li><a href="#">Kebijakan Privasi</a></li>
                <li><a href="#">FAQ</a></li>
                <li><a href="{{ route('login') }}">Login Admin</a></li>
            </ul>
        </div>
    </div>

    <div class="footer-bottom">
        <p>&copy; {{ date('Y') }} <span>Halal Industries</span>. Seluruh hak cipta dilindungi.</p>
        <p style="font-size:12px; color:var(--slate);">Beroperasi dengan amanah &amp; profesionalisme</p>
    </div>
</footer>

<!-- ═══════════════════════════════════════════
     JAVASCRIPT
═══════════════════════════════════════════ -->
<script>
    // Navbar scroll effect
    const navbar = document.getElementById('navbar');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });

    // Smooth scroll for nav links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });

    // Scroll-triggered animations
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, { threshold: 0.1 });

    document.querySelectorAll('.service-card, .fleet-card, .process-step, .feature-item').forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(24px)';
        el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(el);
    });
</script>

</body>
</html>