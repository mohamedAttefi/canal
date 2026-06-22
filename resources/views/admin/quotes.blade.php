@extends('layouts.admin')
@section('admin_content')

<div class="mb-8 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
    <div>
        <h1 class="text-2xl font-black text-slate-900 font-display">Demandes de Devis</h1>
        <p class="text-sm text-slate-500 mt-1">Gérez et répondez aux estimations techniques de vos clients Canal Informatique.</p>
    </div>
    <div class="flex items-center gap-2 text-xs font-medium bg-brand-50 text-brand-700 px-3 py-1.5 rounded-xl border border-brand-100">
        <span class="w-2 h-2 rounded-full bg-brand-500 animate-pulse"></span>
        {{ $quotes->where('status', 'Pending')->count() }} en attente de traitement
    </div>
</div>

<div class="grid grid-cols-1 sm:grid-cols-3 gap-5 mb-8">
    <div class="canal-card bg-white p-6 rounded-2xl border border-slate-200/80 shadow-sm">
        <div class="flex items-center justify-between mb-2">
            <h3 class="text-xs font-bold uppercase tracking-wider text-slate-500">Total Demandes</h3>
            <span class="text-[10px] font-bold bg-slate-100 text-slate-600 px-2 py-0.5 rounded-md">Global</span>
        </div>
        <p class="text-3xl font-black text-slate-900 font-display">{{ $quotes->count() }}</p>
    </div>
    <div class="canal-card bg-white p-6 rounded-2xl border border-slate-200/80 shadow-sm">
        <div class="flex items-center justify-between mb-2">
            <h3 class="text-xs font-bold uppercase tracking-wider text-slate-500">En Attente</h3>
            <span class="text-[10px] font-bold bg-amber-50 text-amber-700 px-2 py-0.5 rounded-md">Prioritaire</span>
        </div>
        <p class="text-3xl font-black text-amber-600 font-display">{{ $quotes->where('status', 'Pending')->count() }}</p>
    </div>
    <div class="canal-card bg-white p-6 rounded-2xl border border-slate-200/80 shadow-sm">
        <div class="flex items-center justify-between mb-2">
            <h3 class="text-xs font-bold uppercase tracking-wider text-slate-500">Traitées</h3>
            <span class="text-[10px] font-bold bg-emerald-50 text-emerald-700 px-2 py-0.5 rounded-md">Terminé</span>
        </div>
        <p class="text-3xl font-black text-emerald-600 font-display">{{ $quotes->where('status', 'Completed')->count() }}</p>
    </div>
</div>

<div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
    <div class="px-6 py-5 border-b border-slate-100 flex items-center justify-between bg-slate-50/50">
        <h2 class="text-lg font-bold text-slate-900 font-display flex items-center gap-2">
            <span class="w-1.5 h-6 bg-brand-600 rounded-full"></span>
            Registre des Devis Récents
        </h2>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse text-sm">
            <thead>
                <tr class="bg-slate-50 border-b border-slate-200/60 text-slate-500 text-xs uppercase font-bold tracking-wider">
                    <th class="px-6 py-3.5">Client & Entreprise</th>
                    <th class="px-6 py-3.5">Contact</th>
                    <th class="px-6 py-3.5">Service Demandé</th>
                    <th class="px-6 py-3.5">Description du Projet</th>
                    <th class="px-6 py-3.5 text-center">Statut</th>
                    <th class="px-6 py-3.5 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 text-slate-700">
                @forelse($quotes as $quote)
                <tr class="hover:bg-slate-50/60 transition-colors">
                    <td class="px-6 py-4">
                        <div class="font-semibold text-slate-900">{{ $quote->name }}</div>
                        @if($quote->company_name)
                            <div class="text-xs text-slate-400 font-medium">{{ $quote->company_name }}</div>
                        @else
                            <div class="text-xs text-slate-400 italic">Particulier</div>
                        @endif
                    </td>
                    
                    <td class="px-6 py-4 text-xs space-y-0.5">
                        <div class="text-slate-600 font-mono">{{ $quote->email }}</div>
                        <div class="text-slate-400">{{ $quote->phone }}</div>
                    </td>

                    <td class="px-6 py-4">
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 bg-slate-100 text-slate-800 rounded-xl text-xs font-medium border border-slate-200/40">
                            {{ $quote->service->title ?? 'Service inconnu' }}
                        </span>
                    </td>

                    <td class="px-6 py-4 max-w-xs">
                        <p class="text-xs text-slate-500 line-clamp-2" title="{{ $quote->description }}">
                            {{ $quote->description }}
                        </p>
                    </td>

                    <td class="px-6 py-4 text-center">
                        <span class="inline-block px-2.5 py-1 rounded-full text-xs font-bold {{ $quote->status === 'Pending' ? 'bg-amber-50 text-amber-700 border border-amber-200/50' : 'bg-emerald-50 text-emerald-700 border border-emerald-200/50' }}">
                            {{ $quote->status === 'Pending' ? 'En attente' : 'Traité' }}
                        </span>
                    </td>

                    <td class="px-6 py-4 text-right whitespace-nowrap">
                        <div class="flex items-center justify-end gap-2">
                            @if($quote->status === 'Pending')
                                <form action="{{ route('admin.quotes.status', [$quote->id, 'Completed']) }}" method="POST" class="inline">
                                    @csrf
                                    @method('POST')
                                    <button type="submit" class="text-xs font-bold text-emerald-600 hover:text-emerald-700 bg-emerald-50 hover:bg-emerald-100 px-3 py-1.5 rounded-xl transition">
                                        Marquer Traité
                                    </button>
                                </form>
                            @else
                                <form action="{{ route('admin.quotes.status', [$quote->id, 'Pending']) }}" method="POST" class="inline">
                                    @csrf
                                    @method('POST')
                                    <button type="submit" class="text-xs font-bold text-slate-500 hover:text-slate-600 bg-slate-100 hover:bg-slate-200 px-3 py-1.5 rounded-xl transition">
                                        Réouvrir
                                    </button>
                                </form>
                            @endif
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-12 text-center">
                        <div class="flex flex-col items-center justify-center max-w-sm mx-auto">
                            <div class="p-3 bg-slate-100 text-slate-400 rounded-2xl mb-3">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                            </div>
                            <h3 class="text-sm font-bold text-slate-900">Aucun devis enregistré</h3>
                            <p class="text-xs text-slate-400 mt-1">Les demandes envoyées via le formulaire public apparaîtront instantanément dans ce tableau.</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection