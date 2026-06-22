@extends('layouts.admin')
@section('admin_content')

<div class="mb-8 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
    <div>
        <div class="flex items-center gap-2 mb-1">
            <a href="{{ route('admin.services.index') }}" class="text-xs font-bold text-brand-600 hover:text-brand-700 bg-brand-50 px-2.5 py-1 rounded-lg transition flex items-center gap-1">
                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" /></svg>
                Retour à la liste
            </a>
        </div>
        <h1 class="text-2xl font-black text-slate-900 font-display">Modifier le Service</h1>
        <p class="text-sm text-slate-500 mt-1">Mettez à jour les informations de la prestation : <span class="text-brand-600 font-semibold">{{ $service->title }}</span></p>
    </div>
</div>

@if($errors->any())
    <div class="mb-6 p-4 bg-rose-50 border border-rose-200 text-rose-800 text-sm rounded-xl space-y-1 font-medium">
        <p class="font-bold">Veuillez corriger les erreurs suivantes :</p>
        <ul class="list-disc list-inside text-xs font-normal text-rose-700 space-y-0.5">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
    
    <div class="lg:col-span-2 bg-white rounded-2xl p-6 border border-slate-200/80 shadow-sm relative overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-amber-500 via-brand-500 to-amber-500"></div>
        
        <form action="{{ route('admin.services.update', $service->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <div class="sm:col-span-2">
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Titre de la prestation *</label>
                    <input type="text" name="title" value="{{ old('title', $service->title) }}" required placeholder="Ex: Maintenance & Dépannage PC" 
                           class="w-full rounded-xl border border-slate-300 px-4 py-2.5 focus:ring-2 focus:ring-brand-500/20 focus:border-brand-600 outline-none text-sm text-slate-900 placeholder:text-slate-400 transition bg-white @error('title') border-rose-400 focus:ring-rose-500/10 @enderror">
                    @error('title') <p class="text-rose-600 text-xs mt-1 font-medium">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Tarif estimatif (€)</label>
                    <input type="number" name="price" value="{{ old('price', $service->price ?? '') }}" min="0" step="0.01" placeholder="Ex: 49.00" 
                           class="w-full rounded-xl border border-slate-300 px-4 py-2.5 focus:ring-2 focus:ring-brand-500/20 focus:border-brand-600 outline-none text-sm text-slate-900 placeholder:text-slate-400 transition bg-white @error('price') border-rose-400 @enderror">
                    @error('price') <p class="text-rose-600 text-xs mt-1 font-medium">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Identifiant / Balise Icône</label>
                    <input type="text" name="icon" value="{{ old('icon', $service->icon) }}" placeholder="Ex: shopping-cart ou <svg>...</svg>" 
                           class="w-full rounded-xl border border-slate-300 px-4 py-2.5 focus:ring-2 focus:ring-brand-500/20 focus:border-brand-600 outline-none text-sm text-slate-900 placeholder:text-slate-400 transition bg-white @error('icon') border-rose-400 @enderror">
                    @error('icon') <p class="text-rose-600 text-xs mt-1 font-medium">{{ $message }}</p> @enderror
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Description de l'offre *</label>
                <textarea name="description" rows="6" required placeholder="Décrivez la prestation..." 
                          class="w-full rounded-xl border border-slate-300 px-4 py-2.5 focus:ring-2 focus:ring-brand-500/20 focus:border-brand-600 outline-none text-sm text-slate-900 placeholder:text-slate-400 transition bg-white @error('description') border-rose-400 @enderror">{{ old('description', $service->description) }}</textarea>
                @error('description') <p class="text-rose-600 text-xs mt-1 font-medium">{{ $message }}</p> @enderror
            </div>

            <div class="p-4 bg-slate-50 border border-slate-200/60 rounded-xl flex items-center justify-between">
                <div>
                    <span class="block text-sm font-bold text-slate-900">Visibilité sur le site</span>
                    <span class="block text-xs text-slate-500 mt-0.5">Rendre ce service disponible pour les demandes de devis et visible en ligne.</span>
                </div>
                <label class="relative inline-flex items-center cursor-pointer select-none">
                    <input type="hidden" name="is_active" value="0">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $service->is_active) ? 'checked' : '' }} class="sr-only peer">
                    <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-brand-600"></div>
                </label>
            </div>

            <div class="flex items-center justify-end gap-3 pt-2 border-t border-slate-100">
                <a href="{{ route('admin.services.index') }}" class="text-sm font-bold text-slate-600 hover:text-slate-700 px-4 py-2.5 rounded-xl transition">
                    Annuler
                </a>
                <button type="submit" class="bg-brand-600 hover:bg-brand-700 text-white font-bold py-2.5 px-5 rounded-xl shadow-md shadow-brand-900/10 transition tracking-wide text-sm">
                    Enregistrer les modifications
                </button>
            </div>
        </form>
    </div>

    <div class="lg:col-span-1 space-y-6">
        <div class="bg-white rounded-2xl p-5 border border-slate-200/80 shadow-sm font-mono text-xs text-slate-500 space-y-3">
            <h3 class="text-xs font-bold uppercase tracking-wider text-slate-700 mb-1 font-sans flex items-center gap-2">
                <span class="w-1.5 h-3.5 bg-slate-900 rounded-sm"></span> Métadonnées
            </h3>
            <div>
                <span class="block text-[10px] text-slate-400 uppercase font-sans font-bold">Slug URL</span>
                <span class="text-slate-800 break-all bg-slate-50 border border-slate-100 px-2 py-1 rounded block mt-1">{{ $service->slug }}</span>
            </div>
            <div>
                <span class="block text-[10px] text-slate-400 uppercase font-sans font-bold">Date de création</span>
                <span class="text-slate-700 block mt-0.5">{{ \Carbon\Carbon::parse($service->created_at)->format('d/m/Y à H:i') }}</span>
            </div>
            <div>
                <span class="block text-[10px] text-slate-400 uppercase font-sans font-bold">Dernière mise à jour</span>
                <span class="text-slate-700 block mt-0.5">{{ \Carbon\Carbon::parse($service->updated_at)->format('d/m/Y à H:i') }}</span>
            </div>
        </div>
    </div>
</div>

@endsection