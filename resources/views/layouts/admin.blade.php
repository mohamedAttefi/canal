<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panneau de Contrôle - Canal Informatique</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Syne:wght@700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/canal-signature.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'ui-sans-serif', 'system-ui', 'sans-serif'],
                        display: ['"Syne"', '"Plus Jakarta Sans"', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            50:  '#fef2f2', 100: '#fee2e2', 400: '#f87171', 500: '#ef4444',
                            600: '#dc2626', 700: '#b91c1c', 800: '#991b1b', 900: '#7f1d1d', 950: '#450a0a',
                        },
                        canal: { dark: '#0c0f14', charcoal: '#1a1f2e' }
                    }
                }
            }
        }
    </script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-slate-100 flex min-h-screen font-sans antialiased">

    <aside class="w-64 bg-canal-dark text-slate-400 flex flex-col hidden md:flex relative canal-stripe">
        <div class="p-6 border-b border-white/10 flex items-center gap-3">
            @include('partials.logo')
            <div>
                <span class="text-white font-bold font-display text-sm block leading-none">CANAL</span>
                <span class="text-brand-400 font-bold font-display text-sm block leading-none">ADMIN</span>
            </div>
        </div>
        <nav class="flex-grow p-4 space-y-1 text-sm font-medium">
            <a href="{{ route('admin.dashboard') }}" class="block px-4 py-3 rounded-xl transition {{ request()->routeIs('admin.dashboard') ? 'bg-brand-600/15 text-brand-400 border-l-2 border-brand-600' : 'hover:bg-white/5 hover:text-white' }}">Statistiques globales</a>
            <a href="{{ route('admin.services.index') }}" class="block px-4 py-3 rounded-xl transition {{ request()->routeIs('admin.services.*') ? 'bg-brand-600/15 text-brand-400 border-l-2 border-brand-600' : 'hover:bg-white/5 hover:text-white' }}">Gérer Services</a>
            <a href="{{ route('admin.quotes') }}" class="block px-4 py-3 rounded-xl transition {{ request()->routeIs('admin.quotes*') ? 'bg-brand-600/15 text-brand-400 border-l-2 border-brand-600' : 'hover:bg-white/5 hover:text-white' }}">Demandes de Devis</a>
            <a href="{{ route('admin.contacts') }}" class="block px-4 py-3 rounded-xl transition {{ request()->routeIs('admin.contacts*') ? 'bg-brand-600/15 text-brand-400 border-l-2 border-brand-600' : 'hover:bg-white/5 hover:text-white' }}">Messages de Contact</a>
        </nav>
        <div class="p-4 border-t border-white/10">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="w-full bg-white/5 text-slate-400 font-bold py-2.5 rounded-xl text-xs uppercase tracking-wider transition hover:bg-brand-600/20 hover:text-brand-400 border border-white/10">Déconnexion</button>
            </form>
        </div>
    </aside>

    <main class="flex-grow p-6 sm:p-8">
        @yield('admin_content')
    </main>

</body>

</html>
