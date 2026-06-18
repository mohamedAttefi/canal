@extends('layouts.admin')
@section('admin_content')

<div class="mb-8">
    <h1 class="text-2xl font-black text-slate-900 font-display">Statistiques Opérationnelles</h1>
    <p class="text-sm text-slate-500 mt-1">Vue d'ensemble de l'activité Canal Informatique</p>
</div>

<div class="grid grid-cols-1 sm:grid-cols-3 gap-5 mb-12">
    <div class="canal-card bg-white p-6 rounded-2xl border shadow-sm">
        <div class="flex items-center justify-between mb-3">
            <h3 class="text-xs font-bold uppercase tracking-wider text-slate-500">Devis En Attente</h3>
            <div class="w-8 h-8 bg-brand-50 rounded-lg flex items-center justify-center">
                <svg class="w-4 h-4 text-brand-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
            </div>
        </div>
        <p class="text-4xl font-black text-brand-600 font-display">{{ $stats['quotes'] }}</p>
    </div>
    <div class="canal-card bg-white p-6 rounded-2xl border shadow-sm">
        <div class="flex items-center justify-between mb-3">
            <h3 class="text-xs font-bold uppercase tracking-wider text-slate-500">Messages Non Lus</h3>
            <div class="w-8 h-8 bg-amber-50 rounded-lg flex items-center justify-center">
                <svg class="w-4 h-4 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
            </div>
        </div>
        <p class="text-4xl font-black text-amber-600 font-display">{{ $stats['contacts'] }}</p>
    </div>
    <div class="canal-card bg-white p-6 rounded-2xl border shadow-sm">
        <div class="flex items-center justify-between mb-3">
            <h3 class="text-xs font-bold uppercase tracking-wider text-slate-500">Services Actifs</h3>
            <div class="w-8 h-8 bg-slate-100 rounded-lg flex items-center justify-center">
                <svg class="w-4 h-4 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
            </div>
        </div>
        <p class="text-4xl font-black text-slate-900 font-display">{{ $stats['services'] }}</p>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <div class="bg-white rounded-2xl border p-6 shadow-sm">
        <h2 class="text-lg font-bold text-slate-900 mb-5 font-display flex items-center gap-2">
            <span class="w-1.5 h-6 bg-brand-600 rounded-full"></span>
            Dernières demandes de devis
        </h2>
        <div class="divide-y text-sm">
            @forelse($recentQuotes as $quote)
            <div class="py-3.5 flex justify-between items-center">
                <div>
                    <p class="font-semibold text-slate-900">{{ $quote->name }}</p>
                    <p class="text-xs text-slate-500">{{ $quote->service->title }}</p>
                </div>
                <span class="px-2.5 py-1 rounded-full text-xs font-bold {{ $quote->status === 'Pending' ? 'bg-amber-50 text-amber-700' : 'bg-emerald-50 text-emerald-700' }}">{{ $quote->status }}</span>
            </div>
            @empty
            <p class="text-xs text-slate-400 py-6 text-center">Aucune demande pour le moment.</p>
            @endforelse
        </div>
    </div>
</div>

@endsection
