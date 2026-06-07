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
