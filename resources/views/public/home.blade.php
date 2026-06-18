@extends('layouts.app')
@section('title', 'Accueil')
@section('content')

@include('partials.page-hero', [
    'split' => true,
    'badge' => '<span class="year">1992</span> Casablanca, Maroc',
    'heading' => 'Votre <span class="text-brand-500">canal</span> vers l\'excellence informatique',
    'description' => 'Solutions IT sur mesure, maintenance préventive, réseaux et distribution de matériel d\'infrastructure — un partenaire de confiance depuis plus de trois décennies.',
    'actions' => '
        <a href="'.route('quote').'" class="btn-canal w-full sm:w-auto bg-brand-600 hover:bg-brand-700 px-8 py-4 rounded-xl font-bold transition shadow-xl shadow-brand-900/30 text-center">Demander un Devis</a>
        <a href="'.route('services').'" class="w-full sm:w-auto bg-white/5 hover:bg-white/10 px-8 py-4 rounded-xl font-bold transition border border-white/15 backdrop-blur-sm text-center">Découvrir nos Services</a>
    ',
])

@include('partials.canal-wave', ['fill' => '#ffffff'])

<section class="bg-white py-14 -mt-1">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 sm:gap-6">
            <div class="canal-stat text-center">
                <p class="number">34+</p>
                <p class="text-[10px] sm:text-xs uppercase tracking-widest font-bold text-slate-500 mt-2">Années d'Expérience</p>
            </div>
            <div class="canal-stat accent text-center">
                <p class="number">100%</p>
                <p class="text-[10px] sm:text-xs uppercase tracking-widest font-bold text-slate-500 mt-2">Disponibilité</p>
            </div>
            <div class="canal-stat text-center">
                <p class="number">500+</p>
                <p class="text-[10px] sm:text-xs uppercase tracking-widest font-bold text-slate-500 mt-2">Clients Entreprises</p>
            </div>
            <div class="canal-stat accent text-center">
                <p class="number">24/7</p>
                <p class="text-[10px] sm:text-xs uppercase tracking-widest font-bold text-slate-500 mt-2">Support Technique</p>
            </div>
        </div>
    </div>
</section>

<section class="py-24 bg-slate-50 relative">
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-px h-16 bg-gradient-to-b from-brand-600 to-transparent opacity-40"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @include('partials.section-header', [
            'badge' => 'Expertise',
            'badgeLabel' => 'Canal IT',
            'title' => 'Nos expertises techniques',
            'subtitle' => 'Des infrastructures fiables, déployées et maintenues par des ingénieurs certifiés à Casablanca.',
        ])
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8">
            @foreach($services as $index => $service)
            <div class="canal-card bg-white border border-slate-200/80 rounded-2xl p-8 shadow-sm hover:shadow-xl hover:border-brand-200/60 hover:-translate-y-1 transition-all duration-300 group">
                <div class="flex items-start justify-between mb-6">
                    <div class="w-14 h-14 bg-gradient-to-br from-brand-50 to-brand-100 text-brand-600 rounded-2xl flex items-center justify-center text-xl shadow-sm group-hover:shadow-brand-100 transition-shadow">
                        @switch($service->icon)
                            @case('shopping-cart') 🛒 @break
                            @case('wrench') 🔧 @break
                            @case('server') 🖥️ @break
                            @default 🛠️
                        @endswitch
                    </div>
                    <span class="text-4xl font-black text-slate-100 group-hover:text-brand-100 transition-colors font-display">0{{ $index + 1 }}</span>
                </div>
                <h3 class="text-xl font-bold text-slate-950 mb-3 font-display">{{ $service->title }}</h3>
                <p class="text-slate-600 text-sm leading-relaxed mb-6">{{ $service->description }}</p>
                @if($service->features)
                <ul class="space-y-2.5 border-t border-slate-100 pt-5">
                    @foreach(array_slice($service->features, 0, 3) as $feature)
                    <li class="text-xs text-slate-500 flex items-center gap-2.5">
                        <svg class="w-3.5 h-3.5 text-brand-500 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        {{ $feature }}
                    </li>
                    @endforeach
                </ul>
                @endif
            </div>
            @endforeach
        </div>
        <div class="text-center mt-12">
            <a href="{{ route('services') }}" class="inline-flex items-center gap-2 text-brand-600 font-bold hover:text-brand-700 transition group">
                Voir tous nos services
                <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>
    </div>
</section>

@if($testimonials->isNotEmpty())
<section class="py-24 bg-white border-y border-slate-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @include('partials.section-header', [
            'title' => 'Ils nous font confiance',
            'subtitle' => 'Des entreprises casablancaises qui s\'appuient sur Canal Informatique au quotidien.',
        ])
        <div class="grid grid-cols-1 md:grid-cols-{{ min($testimonials->count(), 3) }} gap-6">
            @foreach($testimonials as $testimonial)
            <div class="canal-quote relative bg-slate-50 border border-slate-200/60 rounded-2xl p-8 pt-10">
                <div class="flex gap-1 mb-4">
                    @for($i = 0; $i < $testimonial->rating; $i++)
                    <svg class="w-4 h-4 text-brand-500" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    @endfor
                </div>
                <p class="text-slate-600 text-sm leading-relaxed mb-6 italic">"{{ $testimonial->feedback }}"</p>
                <div class="flex items-center gap-3 border-t border-slate-200 pt-5">
                    <div class="w-10 h-10 rounded-full bg-gradient-to-br from-brand-600 to-brand-800 flex items-center justify-center text-white font-bold text-sm">{{ strtoupper(substr($testimonial->client_name, 0, 1)) }}</div>
                    <div>
                        <p class="font-bold text-slate-900 text-sm">{{ $testimonial->client_name }}</p>
                        <p class="text-xs text-slate-500">{{ $testimonial->company_name }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<section class="py-24 bg-slate-50">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        @include('partials.section-header', [
            'title' => 'Questions Fréquentes',
            'subtitle' => 'Tout ce que vous devez savoir avant de nous confier votre infrastructure.',
        ])
        <div class="space-y-3" x-data="{ active: null }">
            @foreach($faqs as $faq)
            <div class="border border-slate-200 rounded-2xl overflow-hidden bg-white shadow-sm">
                <button @click="active = active === {{ $faq->id }} ? null : {{ $faq->id }}" class="w-full text-left px-6 py-5 font-semibold text-slate-900 flex justify-between items-center gap-4 transition hover:bg-brand-50/50">
                    <span class="flex items-center gap-3">
                        <span class="w-2 h-2 rounded-full bg-brand-500 shrink-0"></span>
                        {{ $faq->question }}
                    </span>
                    <span class="w-8 h-8 rounded-lg bg-slate-100 flex items-center justify-center text-brand-600 font-bold text-lg shrink-0" x-text="active === {{ $faq->id }} ? '−' : '+'"></span>
                </button>
                <div x-show="active === {{ $faq->id }}" class="px-6 pb-5 text-sm text-slate-600 leading-relaxed border-t border-slate-100 pt-4 ml-5" x-transition>
                    {{ $faq->answer }}
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@include('partials.cta-band')

@endsection
