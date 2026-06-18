@extends('layouts.admin')
@section('admin_content')

<div class="mb-8 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
    <div>
        <h1 class="text-2xl font-black text-slate-900 font-display">Messages de Contact</h1>
        <p class="text-sm text-slate-500 mt-1">Consultez et gérez les messages envoyés par les prospects de Canal Informatique.</p>
    </div>
    <div class="flex items-center gap-2 text-xs font-medium bg-amber-50 text-amber-700 px-3 py-1.5 rounded-xl border border-amber-100">
        <span class="w-2 h-2 rounded-full bg-amber-500 animate-pulse"></span>
        {{ $contacts->where('is_read', false)->count() }} message(s) non lu(s)
    </div>
</div>

@if(session('success'))
    <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 text-sm font-medium rounded-xl flex items-center gap-3">
        <svg class="w-5 h-5 shrink-0 text-emerald-600" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
        </svg>
        {{ session('success') }}
    </div>
@endif

<div class="grid grid-cols-1 sm:grid-cols-3 gap-5 mb-8">
    <div class="canal-card bg-white p-6 rounded-2xl border border-slate-200/80 shadow-sm">
        <div class="flex items-center justify-between mb-2">
            <h3 class="text-xs font-bold uppercase tracking-wider text-slate-500">Total Courriels</h3>
            <span class="text-[10px] font-bold bg-slate-100 text-slate-600 px-2 py-0.5 rounded-md">Archive</span>
        </div>
        <p class="text-3xl font-black text-slate-900 font-display">{{ $contacts->count() }}</p>
    </div>
    <div class="canal-card bg-white p-6 rounded-2xl border border-slate-200/80 shadow-sm">
        <div class="flex items-center justify-between mb-2">
            <h3 class="text-xs font-bold uppercase tracking-wider text-slate-500">Non lus</h3>
            <span class="text-[10px] font-bold bg-amber-50 text-amber-700 px-2 py-0.5 rounded-md">Action requise</span>
        </div>
        <p class="text-3xl font-black text-amber-600 font-display">{{ $contacts->where('is_read', false)->count() }}</p>
    </div>
    <div class="canal-card bg-white p-6 rounded-2xl border border-slate-200/80 shadow-sm">
        <div class="flex items-center justify-between mb-2">
            <h3 class="text-xs font-bold uppercase tracking-wider text-slate-500">Lus & Traités</h3>
            <span class="text-[10px] font-bold bg-slate-100 text-slate-600 px-2 py-0.5 rounded-md">Lu</span>
        </div>
        <p class="text-3xl font-black text-slate-400 font-display">{{ $contacts->where('is_read', true)->count() }}</p>
    </div>
</div>

<div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
    <div class="px-6 py-5 border-b border-slate-100 flex items-center justify-between bg-slate-50/50">
        <h2 class="text-lg font-bold text-slate-900 font-display flex items-center gap-2">
            <span class="w-1.5 h-6 bg-amber-500 rounded-full"></span>
            Boite de réception
        </h2>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse text-sm">
            <thead>
                <tr class="bg-slate-50 border-b border-slate-200/60 text-slate-500 text-xs uppercase font-bold tracking-wider">
                    <th class="px-6 py-3.5">Expéditeur</th>
                    <th class="px-6 py-3.5">Sujet & Message</th>
                    <th class="px-6 py-3.5 text-center">État</th>
                    <th class="px-6 py-3.5 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 text-slate-700">
                @forelse($contacts as $contact)
                <tr class="hover:bg-slate-50/60 transition-colors {{ !$contact->is_read ? 'bg-amber-50/10 font-medium' : '' }}">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="font-semibold text-slate-900">{{ $contact->name }}</div>
                        <div class="text-xs text-slate-400 font-mono">{{ $contact->email }}</div>
                    </td>
                    
                    <td class="px-6 py-4 max-w-xl">
                        @if($contact->subject)
                            <div class="text-slate-900 font-semibold text-xs mb-0.5">{{ $contact->subject }}</div>
                        @endif
                        <p class="text-xs text-slate-500 leading-relaxed line-clamp-3" title="{{ $contact->message }}">
                            {{ $contact->message }}
                        </p>
                        <div class="text-[10px] text-slate-400 font-mono mt-1">
                            Reçu le : {{ $contact->created_at->format('d/m/Y à H:i') }}
                        </div>
                    </td>

                    <td class="px-6 py-4 text-center whitespace-nowrap">
                        @if(!$contact->is_read)
                            <span class="inline-block px-2.5 py-1 rounded-full text-[11px] font-bold bg-amber-50 text-amber-700 border border-amber-200/40">
                                Non lu
                            </span>
                        @else
                            <span class="inline-block px-2.5 py-1 rounded-full text-[11px] font-bold bg-slate-100 text-slate-500 border border-slate-200/40">
                                Lu
                            </span>
                        @endif
                    </td>

                    <td class="px-6 py-4 text-right whitespace-nowrap">
                        <div class="flex items-center justify-end gap-2">
                            @if(!$contact->is_read)
                                <form action="{{ route('admin.contacts.read', $contact->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('POST')
                                    <button type="submit" class="text-xs font-bold text-brand-600 hover:text-brand-700 bg-brand-50 hover:bg-brand-100 px-3 py-1.5 rounded-xl transition">
                                        Marquer comme lu
                                    </button>
                                </form>
                            @else
                                <span class="text-xs text-slate-400 italic px-3 py-1.5">Aucune action</span>
                            @endif
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-6 py-12 text-center">
                        <div class="flex flex-col items-center justify-center max-w-sm mx-auto">
                            <div class="p-3 bg-slate-100 text-slate-400 rounded-2xl mb-3">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <h3 class="text-sm font-bold text-slate-900">Boîte de réception vide</h3>
                            <p class="text-xs text-slate-400 mt-1">Tous les messages de contact des utilisateurs s'afficheront ici après soumission.</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection