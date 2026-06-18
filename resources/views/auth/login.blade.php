<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Admin - Canal Informatique</title>
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
                        canal: { dark: '#0c0f14' }
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-canal-dark flex items-center justify-center min-h-screen font-sans antialiased relative overflow-hidden">
    <div class="absolute inset-0 canal-hero-glow"></div>
    <div class="absolute inset-0 opacity-[0.04]" style="background-image: radial-gradient(#ef4444 1px, transparent 1px); background-size: 24px 24px;"></div>

    <div class="w-full max-w-sm relative z-10 mx-4">
        <div class="text-center mb-8">
            <div class="flex items-center justify-center gap-3 mb-4">
                @include('partials.logo')
                <div class="text-left">
                    <span class="text-white font-bold font-display block leading-none">CANAL</span>
                    <span class="text-brand-400 font-bold font-display block leading-none">INFORMATIQUE</span>
                </div>
            </div>
            <p class="text-slate-500 text-sm">Espace d'administration</p>
        </div>
        <div class="bg-white rounded-3xl p-8 shadow-2xl relative overflow-hidden">
            <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-brand-600 via-brand-500 to-brand-600"></div>
            <form action="{{ route('login') }}" method="POST" class="space-y-5">
                @csrf
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Email</label>
                    <input type="email" name="email" required class="canal-input w-full border border-slate-300 rounded-xl px-4 py-3 text-sm outline-none transition">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Mot de passe</label>
                    <input type="password" name="password" required class="canal-input w-full border border-slate-300 rounded-xl px-4 py-3 text-sm outline-none transition">
                </div>
                <button type="submit" class="btn-canal w-full bg-brand-600 text-white font-bold py-3 rounded-xl text-sm transition hover:bg-brand-700 shadow-lg shadow-brand-900/20">Se Connecter</button>
            </form>
        </div>
        <div class="text-center mt-6">
            <span class="canal-stamp border-white/10 bg-white/5 text-slate-400"><span class="year text-brand-400">1992</span> Canal Informatique</span>
        </div>
    </div>
</body>

</html>
