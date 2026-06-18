@extends('layouts.app')
@section('title', 'Demande de Devis')
@section('content')

@include('partials.page-hero', [
    'compact' => true,
    'badge' => '<span class="year">24h</span> Réponse garantie',
    'heading' => 'Demander un <span class="text-brand-500">devis</span> personnalisé',
    'description' => 'Décrivez votre projet et recevez une estimation technique détaillée de notre équipe Canal Informatique.',
])

@include('partials.canal-wave', ['fill' => '#f8fafc'])

<section class="py-24 bg-slate-50 -mt-1">
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-3xl p-8 sm:p-10 border border-slate-200/80 shadow-sm relative overflow-hidden">
            <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-brand-600 via-brand-500 to-brand-600"></div>
            <div class="absolute top-4 right-4 canal-stamp text-[10px]"><span class="year">CI</span> Devis gratuit</div>

            @if(session('success'))
                <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 text-sm font-medium rounded-xl flex items-center gap-3">
                    <svg class="w-5 h-5 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('quote.submit') }}" method="POST" class="space-y-5">
                @csrf
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Nom Complet *</label>
                        <input type="text" name="name" required placeholder="Jean Dupont" class="canal-input w-full rounded-xl border border-slate-300 px-4 py-3 focus:ring-2 focus:ring-brand-500/20 focus:border-brand-600 outline-none text-sm text-slate-900 placeholder:text-slate-400 transition bg-white">
                    </div>
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Nom de l'Entreprise</label>
                        <input type="text" name="company_name" placeholder="Votre société" class="canal-input w-full rounded-xl border border-slate-300 px-4 py-3 focus:ring-2 focus:ring-brand-500/20 focus:border-brand-600 outline-none text-sm text-slate-900 placeholder:text-slate-400 transition bg-white">
                    </div>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Adresse Email *</label>
                        <input type="email" name="email" required placeholder="contact@entreprise.ma" class="canal-input w-full rounded-xl border border-slate-300 px-4 py-3 focus:ring-2 focus:ring-brand-500/20 focus:border-brand-600 outline-none text-sm text-slate-900 placeholder:text-slate-400 transition bg-white">
                    </div>
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Téléphone *</label>
                        <input type="text" name="phone" required placeholder="+212 6XX XXX XXX" class="canal-input w-full rounded-xl border border-slate-300 px-4 py-3 focus:ring-2 focus:ring-brand-500/20 focus:border-brand-600 outline-none text-sm text-slate-900 placeholder:text-slate-400 transition bg-white">
                    </div>
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Service Requis *</label>
                    <select name="service_id" required class="canal-input w-full rounded-xl border border-slate-300 px-4 py-3 bg-white focus:ring-2 focus:ring-brand-500/20 focus:border-brand-600 outline-none text-sm text-slate-900 transition">
                        @foreach($services as $service)
                            <option value="{{ $service->id }}">{{ $service->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Description du Projet / Besoins *</label>
                    <textarea name="description" rows="4" required placeholder="Décrivez votre infrastructure actuelle et vos besoins..." class="canal-input w-full rounded-xl border border-slate-300 px-4 py-3 focus:ring-2 focus:ring-brand-500/20 focus:border-brand-600 outline-none text-sm text-slate-900 placeholder:text-slate-400 transition bg-white"></textarea>
                </div>
                <button type="submit" class="btn-canal w-full bg-brand-600 hover:bg-brand-700 text-white font-bold py-3.5 px-4 rounded-xl shadow-lg shadow-brand-900/20 transition tracking-wide text-sm">Soumettre la Demande</button>
            </form>
        </div>
    </div>
</section>

@endsection
