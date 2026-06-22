@extends('layouts.admin')
@section('admin_content')

<div class="mb-8 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
    <div>
        <div class="flex items-center gap-2 mb-1">
            <a href="{{ route('admin.services.index') }}" class="text-xs font-bold text-brand-600 hover:text-brand-700 bg-brand-50 px-2.5 py-1 rounded-lg transition flex items-center gap-1">
                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                </svg>
                Retour à la liste
            </a>
        </div>
        <h1 class="text-2xl font-black text-slate-900 font-display">Ajouter un Service</h1>
        <p class="text-sm text-slate-500 mt-1">Créez une nouvelle prestation technique pour la vitrine de Canal Informatique.</p>
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
        <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-brand-600 via-brand-500 to-brand-600"></div>

        <form action="{{ route('admin.services.store') }}" method="POST" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <div class="sm:col-span-2">
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Titre de la prestation *</label>
                    <input type="text" name="title" value="{{ old('title') }}" required placeholder="Ex: Maintenance & Dépannage PC"
                        class="w-full rounded-xl border border-slate-300 px-4 py-2.5 focus:ring-2 focus:ring-brand-500/20 focus:border-brand-600 outline-none text-sm text-slate-900 placeholder:text-slate-400 transition bg-white @error('title') border-rose-400 focus:ring-rose-500/10 @enderror">
                    @error('title') <p class="text-rose-600 text-xs mt-1 font-medium">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Tarif estimatif ou à partir de (€)</label>
                    <input type="number" name="price" value="{{ old('price') }}" min="0" step="0.01" placeholder="Ex: 49.00"
                        class="w-full rounded-xl border border-slate-300 px-4 py-2.5 focus:ring-2 focus:ring-brand-500/20 focus:border-brand-600 outline-none text-sm text-slate-900 placeholder:text-slate-400 transition bg-white @error('price') border-rose-400 @enderror">
                    @error('price') <p class="text-rose-600 text-xs mt-1 font-medium">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Code Icône (SVG Heroicons ou classe)</label>
                    <input type="text" name="icon" value="{{ old('icon') }}" placeholder="Ex: <svg>...</svg> ou nom de l'icône"
                        class="w-full rounded-xl border border-slate-300 px-4 py-2.5 focus:ring-2 focus:ring-brand-500/20 focus:border-brand-600 outline-none text-sm text-slate-900 placeholder:text-slate-400 transition bg-white @error('icon') border-rose-400 @enderror">
                    @error('icon') <p class="text-rose-600 text-xs mt-1 font-medium">{{ $message }}</p> @enderror
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Description détaillée de l'offre *</label>
                <textarea name="description" rows="6" required placeholder="Décrivez de manière exhaustive ce que comprend cette prestation informatique, vos engagements et les livrables..."
                    class="w-full rounded-xl border border-slate-300 px-4 py-2.5 focus:ring-2 focus:ring-brand-500/20 focus:border-brand-600 outline-none text-sm text-slate-900 placeholder:text-slate-400 transition bg-white @error('description') border-rose-400 @enderror">{{ old('description') }}</textarea>
                @error('description') <p class="text-rose-600 text-xs mt-1 font-medium">{{ $message }}</p> @enderror
            </div>

            <div class="p-4 bg-slate-50 border border-slate-200/60 rounded-xl flex items-center justify-between">
                <div>
                    <span class="block text-sm font-bold text-slate-900">Visibilité publique</span>
                    <span class="block text-xs text-slate-500 mt-0.5">Rendre ce service immédiatement visible pour les demandes de devis clients.</span>
                </div>
                <label class="relative inline-flex items-center cursor-pointer select-none">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }} class="sr-only peer">
                    <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-brand-600"></div>
                </label>
            </div>

            <div class="flex items-center justify-end gap-3 pt-2 border-t border-slate-100">
                <a href="{{ route('admin.services.index') }}" class="text-sm font-bold text-slate-600 hover:text-slate-700 px-4 py-2.5 rounded-xl transition">
                    Annuler
                </a>
                <button type="submit" class="bg-brand-600 hover:bg-brand-700 text-white font-bold py-2.5 px-5 rounded-xl shadow-md shadow-brand-900/10 transition tracking-wide text-sm">
                    Publier la prestation
                </button>
            </div>
        </form>
    </div>

    <div class="lg:col-span-1 space-y-6">
        <div class="bg-white rounded-2xl p-5 border border-slate-200/80 shadow-sm">
            <h3 class="text-xs font-bold uppercase tracking-wider text-slate-700 mb-3 flex items-center gap-2">
                <span class="w-1.5 h-3.5 bg-brand-600 rounded-sm"></span> Conseils d'édition
            </h3>
            <ul class="space-y-3 text-xs text-slate-500 leading-relaxed list-disc list-inside">
                <li><strong class="text-slate-700">Titre percutant :</strong> Restez concis pour que le titre s'intègre harmonieusement sur les grilles de cartes publiques.</li>
                <li><strong class="text-slate-700">Prix :</strong> Laissez vide ou à <code class="font-mono bg-slate-100 px-1 py-0.5 rounded">0</code> si vous souhaitez uniquement afficher « Sur devis ».</li>
                <li><strong class="text-slate-700">Icônes SVG :</strong> Pour un rendu optimal, utilisez des icônes au format brut de type <code class="font-mono text-brand-600">&lt;svg&gt;</code> configurées avec les classes Tailwind de taille <code class="font-mono bg-slate-100 px-1 py-0.5 rounded">w-6 h-6</code>.</li>
            </ul>
        </div>
    </div>

</div>

@endsection