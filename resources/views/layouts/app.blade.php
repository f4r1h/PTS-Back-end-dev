<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Halal Industries') }} - Dashboard</title>

        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Barlow+Condensed:wght@600;700;800&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            :root {
                --gold: #F5A623;
                --gold-dk: #C7831A;
                color-scheme: dark;
            }
            body {
                font-family: 'Inter', sans-serif;
                background-color: #0D0F14;
                color: #E8ECF4;
            }
            .font-condensed {
                font-family: 'Barlow Condensed', sans-serif;
            }
            .text-gold {
                color: var(--gold);
            }
            .bg-gold {
                background-color: var(--gold);
            }
            .bg-dark-2 { background-color: #161920; }
            .bg-dark-3 { background-color: #1E222E; }
            .bg-dark-4 { background-color: #272C39; }
            .border-dark { border-color: rgba(255,255,255,0.06); }
            
            /* Custom Scrollbar for better dark UI */
            ::-webkit-scrollbar { width: 8px; height: 8px; }
            ::-webkit-scrollbar-track { background: #0D0F14; }
            ::-webkit-scrollbar-thumb { background: #374151; border-radius: 4px; }
            ::-webkit-scrollbar-thumb:hover { background: #4B5563; }

            /* Premium Buttons & Hover Styles */
            .bg-gold, .btn-primary, button[type="submit"]:not(.toggle-pw):not(table button) {
                background: linear-gradient(135deg, var(--gold), var(--gold-dk)) !important;
                color: #0D0F14 !important;
                font-weight: 800 !important;
                transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1) !important;
                box-shadow: 0 4px 14px rgba(245, 166, 35, 0.2) !important;
            }
            .bg-gold:hover, .btn-primary:hover, button[type="submit"]:not(.toggle-pw):not(table button):hover {
                filter: brightness(1.1) !important;
                transform: translateY(-2px) !important;
                box-shadow: 0 6px 20px rgba(245, 166, 35, 0.35) !important;
            }
            .bg-gold:active, .btn-primary:active, button[type="submit"]:not(.toggle-pw):not(table button):active {
                transform: translateY(0) !important;
            }
            .bg-gold:disabled, .btn-primary:disabled, button:disabled {
                background: #1F2937 !important;
                color: #4B5563 !important;
                cursor: not-allowed !important;
                transform: none !important;
                box-shadow: none !important;
                border-color: #374151 !important;
            }

            /* Table action buttons */
            td .flex.gap-3 a, td .flex.gap-2 a, td .flex.gap-3 button, td .flex.gap-2 button {
                padding: 6px 12px !important;
                border-radius: 8px !important;
                font-size: 11px !important;
                font-weight: 700 !important;
                transition: all 0.2s ease-in-out !important;
                display: inline-flex !important;
                align-items: center !important;
                justify-content: center !important;
                text-decoration: none !important;
                cursor: pointer !important;
            }
            /* Edit button styling */
            td .flex.gap-3 a:first-child, td .flex.gap-2 a:first-child {
                background-color: rgba(59, 130, 246, 0.1) !important;
                border: 1px solid rgba(59, 130, 246, 0.3) !important;
                color: #60A5FA !important;
            }
            td .flex.gap-3 a:first-child:hover, td .flex.gap-2 a:first-child:hover {
                background-color: rgba(59, 130, 246, 0.25) !important;
                border-color: #60A5FA !important;
                color: #FFFFFF !important;
                transform: translateY(-1px) !important;
            }
            /* Delete button styling */
            td .flex.gap-3 button, td .flex.gap-2 button {
                background: rgba(239, 68, 68, 0.1) !important;
                border: 1px solid rgba(239, 68, 68, 0.3) !important;
                color: #F87171 !important;
                box-shadow: none !important;
                transform: none !important;
            }
            td .flex.gap-3 button:hover, td .flex.gap-2 button:hover {
                background: rgba(239, 68, 68, 0.25) !important;
                border-color: #F87171 !important;
                color: #FFFFFF !important;
                transform: translateY(-1px) !important;
            }

            /* Fix text-dark and hover:text-dark classes */
            .text-dark, .hover\:text-dark:hover {
                color: #0D0F14 !important;
            }

            /* Approve action button styling */
            .btn-action-approve {
                display: inline-flex !important;
                align-items: center !important;
                justify-content: center !important;
                gap: 6px !important;
                padding: 10px 16px !important;
                background: rgba(245, 166, 35, 0.08) !important;
                border: 1px solid rgba(245, 166, 35, 0.3) !important;
                color: var(--gold) !important;
                border-radius: 8px !important;
                font-size: 12px !important;
                font-weight: 700 !important;
                transition: all 0.25s ease-in-out !important;
                text-decoration: none !important;
                cursor: pointer !important;
                box-shadow: none !important;
            }
            .btn-action-approve:hover {
                background: linear-gradient(135deg, var(--gold), var(--gold-dk)) !important;
                color: #0D0F14 !important;
                border-color: var(--gold) !important;
                transform: translateY(-2px) !important;
                box-shadow: 0 4px 15px rgba(245, 166, 35, 0.3) !important;
            }
            .btn-action-approve:active {
                transform: translateY(0) !important;
            }
            .btn-action-approve:visited {
                color: var(--gold) !important;
            }
            .btn-action-approve:hover:visited {
                color: #0D0F14 !important;
            }
            .bg-gold:visited, .btn-primary:visited {
                color: #0D0F14 !important;
            }

        </style>
    </head>
    <body class="font-sans antialiased bg-[#0D0F14]">
        <div class="min-h-screen bg-[#0D0F14]">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-[#161920] border-b border-dark">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
