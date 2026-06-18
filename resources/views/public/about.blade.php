@extends('layouts.app')
@section('title', 'À Propos de Nous')
@section('content')

@include('partials.page-hero', [
    'compact' => true,
    'badge' => '<span class="year">1992</span> Notre histoire',
    'heading' => 'Plus de <span class="text-brand-500">trois décennies</span> d\'excellence IT',
    'description' => 'Fondée au cœur de Casablanca, Canal Informatique s\'est imposée comme un pilier de confiance pour les entreprises marocaines.',
])

@include('partials.canal-wave', ['fill' => '#ffffff'])

<section class="py-24 bg-white -mt-1">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="prose prose-slate max-w-none text-slate-600 text-base leading-relaxed mb-16 text-center max-w-3xl mx-auto">
            <p>Depuis <strong class="text-brand-600">1992</strong>, nous accompagnons les entreprises de Casablanca dans la conception, le déploiement et la maintenance de leurs infrastructures informatiques critiques. Notre nom reflète notre mission : être le <em>canal</em> fiable par lequel circulent performance, sécurité et innovation.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="canal-card group bg-slate-50 p-8 rounded-2xl border border-slate-200/60 hover:border-brand-200 hover:shadow-lg transition-all duration-300">
                <div class="w-12 h-12 bg-brand-600 rounded-xl flex items-center justify-center mb-5 shadow-lg shadow-brand-900/20">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                </div>
                <h3 class="text-slate-900 font-bold text-lg mb-3 font-display">Notre Mission</h3>
                <p class="text-sm text-slate-600 leading-relaxed">Garantir la stabilité opérationnelle continue de vos outils informatiques critiques, 24 heures sur 24.</p>
            </div>
            <div class="canal-card group bg-slate-50 p-8 rounded-2xl border border-slate-200/60 hover:border-brand-200 hover:shadow-lg transition-all duration-300">
                <div class="w-12 h-12 bg-brand-600 rounded-xl flex items-center justify-center mb-5 shadow-lg shadow-brand-900/20">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                </div>
                <h3 class="text-slate-900 font-bold text-lg mb-3 font-display">Notre Vision</h3>
                <p class="text-sm text-slate-600 leading-relaxed">Devenir l'intégrateur réseau et support de référence absolue sur l'axe économique de Casablanca.</p>
            </div>
            <div class="canal-card group bg-slate-50 p-8 rounded-2xl border border-slate-200/60 hover:border-brand-200 hover:shadow-lg transition-all duration-300">
                <div class="w-12 h-12 bg-brand-600 rounded-xl flex items-center justify-center mb-5 shadow-lg shadow-brand-900/20">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                </div>
                <h3 class="text-slate-900 font-bold text-lg mb-3 font-display">Nos Valeurs</h3>
                <p class="text-sm text-slate-600 leading-relaxed">Intégrité, réactivité technique rigoureuse et engagement contractuel total envers chaque client.</p>
            </div>
        </div>

        <div class="mt-20 grid grid-cols-1 sm:grid-cols-3 gap-6 text-center">
            <div class="p-6">
                <p class="text-3xl font-black text-brand-600 font-display">1992</p>
                <p class="text-xs uppercase tracking-widest font-bold text-slate-500 mt-2">Année de fondation</p>
            </div>
            <div class="p-6 border-x border-slate-200">
                <p class="text-3xl font-black text-brand-600 font-display">Casa</p>
                <p class="text-xs uppercase tracking-widest font-bold text-slate-500 mt-2">Ancrage local</p>
            </div>
            <div class="p-6">
                <p class="text-3xl font-black text-brand-600 font-display">IT</p>
                <p class="text-xs uppercase tracking-widest font-bold text-slate-500 mt-2">Cœur de métier</p>
            </div>
        </div>
    </div>
</section>

@include('partials.cta-band')

@endsection
