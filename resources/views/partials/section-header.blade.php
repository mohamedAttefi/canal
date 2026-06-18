<div class="text-center max-w-3xl mx-auto mb-16 {{ $class ?? '' }}">
    @if(isset($badge))
    <span class="canal-stamp mb-4 inline-flex"><span class="year">{{ $badge }}</span> {{ $badgeLabel ?? '' }}</span>
    @endif
    <h2 class="canal-section-title text-3xl font-extrabold text-slate-950 tracking-tight sm:text-4xl font-display">{{ $title }}</h2>
    @if(isset($subtitle))
    <p class="text-slate-600 mt-6 text-lg leading-relaxed">{{ $subtitle }}</p>
    @endif
</div>
