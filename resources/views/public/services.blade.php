@extends('layouts.app')
@section('title', 'Nos Services')
@section('meta-description', 'Découvrez les services de Canal Informatique : maintenance informatique, vente de matériel, installation réseaux et support technique à Casablanca.')
@section('meta-keywords', 'services informatiques Casablanca, maintenance PC, vente matériel informatique, installation réseau, support IT, Canal Informatique services')
@section('content')

@include('partials.page-hero', [
    'compact' => true,
    'badge' => '<span class="year">CI</span> Expertise IT',
    'heading' => 'Nos <span class="text-brand-500">Services</span>',
    'description' => 'Installation, maintenance et distribution de matériel — des solutions complètes pour chaque étape de votre infrastructure informatique.',
])

@include('partials.canal-wave', ['fill' => '#f8fafc'])

<section class="py-24 bg-slate-50 -mt-1">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($services->isEmpty())
            <div class="text-center py-20 bg-white rounded-3xl border border-slate-200">
                <div class="w-16 h-16 bg-brand-50 rounded-2xl flex items-center justify-center mx-auto mb-6 text-2xl">📭</div>
                <p class="text-slate-500 text-lg mb-6">Aucun service disponible pour le moment.</p>
                <a href="{{ route('contact') }}" class="btn-canal inline-block bg-brand-600 hover:bg-brand-700 text-white font-bold px-6 py-3 rounded-xl transition">Contactez-nous</a>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
                @foreach($services as $index => $service)
                <div class="canal-card bg-white border border-slate-200/80 rounded-2xl p-8 shadow-sm hover:shadow-xl hover:border-brand-200/60 hover:-translate-y-1 transition-all duration-300 flex flex-col group">
                    <div class="flex items-start justify-between mb-6">
                        <div class="w-14 h-14 bg-gradient-to-br from-brand-50 to-brand-100 text-brand-600 rounded-2xl flex items-center justify-center text-xl shadow-sm">
                            @switch($service->icon)
                                @case('shopping-cart') 🛒 @break
                                @case('wrench') 🔧 @break
                                @case('server') 🖥️ @break
                                @default 🛠️
                            @endswitch
                        </div>
                        <span class="text-4xl font-black text-slate-100 group-hover:text-brand-100 transition-colors font-display">0{{ $index + 1 }}</span>
                    </div>
                    <h2 class="text-xl font-bold text-slate-950 mb-3 font-display">{{ $service->title }}</h2>
                    <p class="text-slate-600 text-sm leading-relaxed mb-6 flex-grow">{{ $service->description }}</p>
                    @if($service->features)
                    <ul class="space-y-2.5 border-t border-slate-100 pt-5 mb-6">
                        @foreach($service->features as $feature)
                        <li class="text-xs text-slate-500 flex items-center gap-2.5">
                            <svg class="w-3.5 h-3.5 text-brand-500 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                            {{ $feature }}
                        </li>
                        @endforeach
                    </ul>
                    @endif
                    <a href="{{ route('quote') }}" class="btn-canal inline-block text-center bg-brand-600 hover:bg-brand-700 text-white font-bold py-3 px-4 rounded-xl transition text-sm shadow-md shadow-brand-900/10 mt-auto">Demander un Devis</a>
                </div>
                @endforeach
            </div>
        @endif
    </div>
</section>

@include('partials.cta-band', [
    'title' => 'Besoin d\'une solution sur mesure ?',
    'subtitle' => 'Notre équipe analyse vos besoins et vous propose la meilleure configuration pour votre entreprise à Casablanca.',
])

@endsection
