<section class="canal-cta-wave relative bg-gradient-to-r from-brand-700 via-brand-600 to-brand-700 text-white py-20 overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <pattern id="canal-grid" width="40" height="40" patternUnits="userSpaceOnUse">
                    <path d="M0 20 H40 M20 0 V40" stroke="white" stroke-width="0.5" fill="none"/>
                </pattern>
            </defs>
            <rect width="100%" height="100%" fill="url(#canal-grid)"/>
        </svg>
    </div>
    <div class="absolute top-0 left-0 right-0 overflow-hidden opacity-20" aria-hidden="true">
        <div class="canal-flow-track flex whitespace-nowrap">
            @for($i = 0; $i < 4; $i++)
            <svg viewBox="0 0 200 20" class="h-5 w-[200px] inline-block mx-4" fill="none"><path d="M0 10 Q50 0 100 10 T200 10" stroke="white" stroke-width="1.5"/></svg>
            @endfor
        </div>
    </div>
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
        <span class="canal-stamp mb-6 inline-flex border-white/20 bg-white/10 text-white/80"><span class="year text-white">CI</span> Canal Informatique</span>
        <h2 class="text-3xl sm:text-4xl font-black tracking-tight mb-4 font-display">{{ $title ?? 'Prêt à moderniser votre infrastructure ?' }}</h2>
        <p class="text-brand-100 mb-10 text-lg max-w-2xl mx-auto">{{ $subtitle ?? 'Obtenez un devis personnalisé sous 24h et bénéficiez de plus de 34 ans d\'expertise IT à Casablanca.' }}</p>
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
            <a href="{{ route('quote') }}" class="btn-canal w-full sm:w-auto bg-white text-brand-600 hover:bg-brand-50 font-bold px-8 py-4 rounded-xl transition shadow-xl">Demander un Devis</a>
            @if($showContact ?? true)
            <a href="{{ route('contact') }}" class="w-full sm:w-auto bg-brand-800/60 hover:bg-brand-800 font-bold px-8 py-4 rounded-xl transition border border-white/20 backdrop-blur-sm">Nous Contacter</a>
            @endif
        </div>
    </div>
</section>
