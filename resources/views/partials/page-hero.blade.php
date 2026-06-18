<section class="relative bg-canal-dark text-white overflow-hidden {{ $compact ?? false ? 'py-16 sm:py-20' : 'py-24 sm:py-36' }}">
    <div class="absolute inset-0 canal-hero-glow"></div>
    <div class="absolute inset-0 opacity-[0.07]" style="background-image: radial-gradient(#ef4444 1px, transparent 1px); background-size: 20px 20px;"></div>
    <div class="absolute bottom-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-brand-500/50 to-transparent"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="{{ isset($split) && $split ? 'grid grid-cols-1 lg:grid-cols-2 gap-12 items-center' : 'text-center' }}">
            <div class="{{ isset($split) && $split ? '' : 'max-w-4xl mx-auto' }}">
                @if(isset($badge))
                <span class="canal-stamp mb-6 inline-flex canal-fade-up">{!! $badge !!}</span>
                @endif
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black tracking-tight mb-6 leading-[1.1] font-display canal-fade-up {{ isset($split) && $split ? 'text-left' : '' }}" style="animation-delay: 0.1s">
                    {!! $heading !!}
                </h1>
                @if(isset($description))
                <p class="text-slate-400 text-lg sm:text-xl leading-relaxed mb-8 canal-fade-up {{ isset($split) && $split ? 'text-left max-w-xl' : 'max-w-2xl mx-auto' }}" style="animation-delay: 0.2s">{{ $description }}</p>
                @endif
                @if(isset($actions))
                <div class="flex flex-col sm:flex-row gap-4 canal-fade-up {{ isset($split) && $split ? '' : 'justify-center' }}" style="animation-delay: 0.3s">
                    {!! $actions !!}
                </div>
                @endif
            </div>

            @if(isset($split) && $split)
            <div class="hidden lg:flex items-center justify-center relative">
                <div class="relative w-full max-w-md aspect-square">
                    <div class="absolute inset-8 border border-brand-500/20 rounded-3xl rotate-6"></div>
                    <div class="absolute inset-4 bg-gradient-to-br from-brand-600/20 to-transparent rounded-3xl border border-brand-500/10 backdrop-blur-sm flex items-center justify-center">
                        <svg viewBox="0 0 200 200" class="w-48 h-48" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="100" cy="100" r="80" stroke="rgba(220,38,38,0.2)" stroke-width="1"/>
                            <circle cx="100" cy="100" r="60" stroke="rgba(220,38,38,0.15)" stroke-width="1"/>
                            <circle cx="100" cy="100" r="40" stroke="rgba(220,38,38,0.3)" stroke-width="1.5"/>
                            <path d="M30 120 Q70 80 100 100 T170 80" stroke="#ef4444" stroke-width="2" stroke-linecap="round" fill="none" opacity="0.6"/>
                            <path d="M30 100 Q70 60 100 80 T170 60" stroke="#ef4444" stroke-width="2.5" stroke-linecap="round" fill="none"/>
                            <path d="M30 140 Q70 100 100 120 T170 100" stroke="#ef4444" stroke-width="1.5" stroke-linecap="round" fill="none" opacity="0.4"/>
                            <rect x="85" y="85" width="30" height="30" rx="6" fill="#dc2626" opacity="0.9"/>
                            <text x="100" y="106" text-anchor="middle" fill="white" font-size="14" font-weight="bold" font-family="sans-serif">CI</text>
                        </svg>
                    </div>
                    <div class="absolute -top-2 -right-2 bg-brand-600 text-white text-xs font-bold px-3 py-1.5 rounded-full shadow-lg">Depuis 1992</div>
                    <div class="absolute -bottom-2 -left-2 bg-white/10 backdrop-blur text-white text-xs font-semibold px-3 py-1.5 rounded-full border border-white/20">Casablanca, Maroc</div>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>
