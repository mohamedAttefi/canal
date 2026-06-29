<!DOCTYPE html>
<html lang="fr">

<head>
    <link rel="icon" sizes="32x32" href="{{ asset('image.png') }}" type="image">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow">
    <title>@yield('title', 'Canal Informatique') - Votre partenaire informatique depuis 1992</title>
    <meta name="description" content="@yield('meta-description', 'Canal Informatique, maintenance informatique, vente de matériel, installations réseaux et support technique de confiance à Casablanca. Plus de 34 ans d\'expérience en IT.')">
    <meta name="keywords" content="@yield('meta-keywords', 'maintenance informatique Casablanca, vente matériel informatique, installation réseaux, support technique, IT Maroc, infrastructure informatique, Canal Informatique')">
    <meta name="author" content="Canal Informatique">
    <meta name="language" content="fr">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ config('app.url') }}">
    <meta property="og:title" content="Canal Informatique - Casablanca">
    <meta property="og:description" content="Votre partenaire de confiance en maintenance et déploiement d'infrastructures informatiques à Casablanca depuis 1992.">
    <meta property="og:image" content="{{ asset('images/og-image.jpg') }}">
    <meta property="og:locale" content="fr_FR">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ config('app.url') }}">
    <meta name="twitter:title" content="Canal Informatique - Casablanca">
    <meta name="twitter:description" content="Votre partenaire de confiance en maintenance et déploiement d'infrastructures informatiques à Casablanca depuis 1992.">
    <meta name="twitter:image" content="{{ asset('images/og-image.jpg') }}">

    <!-- Canonical URL -->
    <link rel="canonical" href="{{ request()->url() }}">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

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
                            50: '#fef2f2',
                            100: '#fee2e2',
                            400: '#f87171',
                            500: '#ef4444',
                            600: '#dc2626',
                            700: '#b91c1c',
                            800: '#991b1b',
                            900: '#7f1d1d',
                            950: '#450a0a',
                        },
                        canal: {
                            dark: '#0c0f14',
                            charcoal: '#1a1f2e',
                        }
                    }
                }
            }
        }
    </script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Structured Data for Local Business -->
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "ComputerRepairService",
            "name": "Canal Informatique",
            "image": "{{ asset('images/og-image.jpg') }}",
            "description": "Maintenance informatique, vente de matériel, installations réseaux et support technique de confiance à Casablanca depuis 1992.",
            "address": {
                "@type": "PostalAddress",
                "streetAddress": "Boulevard Mohamed V",
                "addressLocality": "Casablanca",
                "addressCountry": "MA"
            },
            "telephone": "+212620155466",
            "openingHours": [
                "Mo-Fr 08:30-18:30",
                "Sa 09:00-13:00"
            ],
            "foundingDate": "1992",
            "areaServed": {
                "@type": "City",
                "name": "Casablanca"
            },
            "priceRange": "$$"
        }
    </script>
</head>

<body class="bg-slate-50 text-slate-800 flex flex-col min-h-screen font-sans antialiased">

    <header class="relative bg-white/95 backdrop-blur-md border-b border-slate-200/80 sticky top-0 z-50 canal-stripe" x-data="{ open: false }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between h-[4.5rem]">
            <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                @include('partials.logo')
                <div>
                    <span class="text-lg font-extrabold tracking-tight text-slate-950 block font-display leading-none">CANAL</span>
                    <span class="text-lg font-extrabold tracking-tight text-brand-600 block font-display leading-none -mt-0.5">INFORMATIQUE</span>
                    <span class="text-[10px] font-bold text-slate-400 uppercase tracking-[0.2em] block mt-0.5">Casablanca · depuis 1992</span>
                </div>
            </a>
            <nav class="hidden md:flex items-center gap-8 font-medium text-slate-600">
                <a href="{{ route('home') }}" class="canal-nav-link {{ request()->routeIs('home') ? 'active text-brand-600 font-semibold' : 'hover:text-brand-600' }} transition">Accueil</a>
                <a href="{{ route('about') }}" class="canal-nav-link {{ request()->routeIs('about') ? 'active text-brand-600 font-semibold' : 'hover:text-brand-600' }} transition">À Propos</a>
                <a href="{{ route('services') }}" class="canal-nav-link {{ request()->routeIs('services') ? 'active text-brand-600 font-semibold' : 'hover:text-brand-600' }} transition">Services</a>
                <a href="{{ route('contact') }}" class="canal-nav-link {{ request()->routeIs('contact') ? 'active text-brand-600 font-semibold' : 'hover:text-brand-600' }} transition">Contact</a>
            </nav>
            <div class="hidden md:flex items-center gap-4">
                <a href="tel:+212620155466" class="text-xs font-semibold text-slate-500 hover:text-brand-600 transition hidden lg:block">+212 620 155 466</a>
                <a href="{{ route('quote') }}" class="btn-canal bg-brand-600 hover:bg-brand-700 text-white font-bold px-5 py-2.5 rounded-xl transition text-sm shadow-lg shadow-brand-900/20">Devis Gratuit</a>
            </div>
            <button @click="open = !open" class="md:hidden text-slate-600 hover:text-brand-600 focus:outline-none transition p-2" :class="open && 'text-brand-600'">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
        <div x-show="open" x-cloak class="md:hidden border-t border-slate-100 bg-white px-4 py-4 space-y-1" x-transition>
            <a href="{{ route('home') }}" class="block px-4 py-3 rounded-xl font-medium transition {{ request()->routeIs('home') ? 'text-brand-600 bg-brand-50' : 'hover:bg-slate-50' }}">Accueil</a>
            <a href="{{ route('about') }}" class="block px-4 py-3 rounded-xl font-medium transition {{ request()->routeIs('about') ? 'text-brand-600 bg-brand-50' : 'hover:bg-slate-50' }}">À Propos</a>
            <a href="{{ route('services') }}" class="block px-4 py-3 rounded-xl font-medium transition {{ request()->routeIs('services') ? 'text-brand-600 bg-brand-50' : 'hover:bg-slate-50' }}">Services</a>
            <a href="{{ route('contact') }}" class="block px-4 py-3 rounded-xl font-medium transition {{ request()->routeIs('contact') ? 'text-brand-600 bg-brand-50' : 'hover:bg-slate-50' }}">Contact</a>
            <a href="{{ route('quote') }}" class="block w-full text-center btn-canal bg-brand-600 hover:bg-brand-700 text-white font-bold py-3 rounded-xl transition mt-2">Devis Gratuit</a>
        </div>
    </header>

    <main class="flex-grow">
        @yield('content')
    </main>

    <footer class="relative bg-canal-dark text-slate-400 pt-20 pb-10 overflow-hidden">
        <div class="absolute top-0 left-0 right-0">
            @include('partials.canal-wave', ['fill' => '#0c0f14'])
        </div>
        <div class="absolute inset-0 opacity-5" style="background-image: radial-gradient(#ef4444 1px, transparent 1px); background-size: 24px 24px;"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-12 mb-14">
                <div class="md:col-span-5">
                    <div class="flex items-center gap-3 mb-6">
                        @include('partials.logo')
                        <div>
                            <span class="text-white font-bold font-display text-lg block leading-none">CANAL INFORMATIQUE</span>
                            <span class="text-brand-400 text-xs font-semibold uppercase tracking-widest">Votre canal vers l'excellence IT</span>
                        </div>
                    </div>
                    <p class="text-sm leading-relaxed mb-6 text-slate-500">Partenaire technologique de confiance à Casablanca depuis 1992 — installation, maintenance et vente de matériel informatique professionnel.</p>
                    <a href="tel:+212620155466" class="inline-flex items-center gap-2 text-sm font-bold text-white hover:text-brand-400 transition">
                        <span class="w-8 h-8 rounded-lg bg-brand-600/20 flex items-center justify-center text-brand-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                        </span>
                        +212 620 155 466
                    </a>
                </div>
                <div class="md:col-span-3">
                    <h4 class="text-white font-bold text-sm uppercase tracking-wider mb-5">Navigation</h4>
                    <ul class="space-y-3 text-sm">
                        <li><a href="{{ route('home') }}" class="hover:text-brand-400 transition flex items-center gap-2"><span class="w-1 h-1 rounded-full bg-brand-600"></span>Accueil</a></li>
                        <li><a href="{{ route('about') }}" class="hover:text-brand-400 transition flex items-center gap-2"><span class="w-1 h-1 rounded-full bg-brand-600"></span>À Propos</a></li>
                        <li><a href="{{ route('services') }}" class="hover:text-brand-400 transition flex items-center gap-2"><span class="w-1 h-1 rounded-full bg-brand-600"></span>Services</a></li>
                        <li><a href="{{ route('contact') }}" class="hover:text-brand-400 transition flex items-center gap-2"><span class="w-1 h-1 rounded-full bg-brand-600"></span>Contact</a></li>
                        <li><a href="{{ route('quote') }}" class="hover:text-brand-400 transition flex items-center gap-2"><span class="w-1 h-1 rounded-full bg-brand-600"></span>Demande de Devis</a></li>
                    </ul>
                </div>
                <div class="md:col-span-4">
                    <h4 class="text-white font-bold text-sm uppercase tracking-wider mb-5">Casablanca</h4>
                    <p class="text-sm mb-3 text-slate-500">Boulevard Mohamed V<br>Casablanca, Maroc</p>
                    <div class="space-y-1 text-sm text-slate-500">
                        <p>Lun – Ven : 08:30 – 18:30</p>
                        <p>Samedi : 09:00 – 13:00</p>
                    </div>
                    <div class="mt-6 inline-flex items-center gap-2 canal-stamp border-white/10 bg-white/5 text-slate-400">
                        <span class="year text-brand-400">1992</span> Fondée à Casablanca
                    </div>
                </div>
            </div>
            <div class="border-t border-white/10 pt-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-slate-600">
                <p>&copy; {{ date('Y') }} Canal Informatique. Tous droits réservés.</p>
                <p class="flex items-center gap-2">
                    <svg class="w-4 h-4 text-brand-600" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 2L2 7v10l10 5 10-5V7L12 2zm0 2.18l8 4v8.64l-8 4-8-4V8.18l8-4z" />
                    </svg>
                    Infrastructure · Réseaux · Support
                </p>
            </div>
        </div>
    </footer>

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</body>

</html>