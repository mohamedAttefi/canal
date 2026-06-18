@extends('layouts.admin')
@section('admin_content')

<div class="mb-8 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
    <div>
        <h1 class="text-2xl font-black text-slate-900 font-display">Foire Aux Questions (FAQ)</h1>
        <p class="text-sm text-slate-500 mt-1">Configurez les questions et réponses qui apparaîtront sur l'interface publique.</p>
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

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
    
    <div class="lg:col-span-1 bg-white rounded-2xl p-6 border border-slate-200/80 shadow-sm relative overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-brand-600 via-brand-500 to-brand-600"></div>
        
        <h2 class="text-base font-bold text-slate-900 mb-5 font-display flex items-center gap-2">
            Nouvelle FAQ
        </h2>

        <form action="{{ route('admin.faqs.store') }}" method="POST" class="space-y-4">
            @csrf
            
            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Question *</label>
                <input type="text" name="question" required placeholder="Ex: Quels sont vos délais d'intervention ?" 
                       class="w-full rounded-xl border border-slate-300 px-4 py-2.5 focus:ring-2 focus:ring-brand-500/20 focus:border-brand-600 outline-none text-sm text-slate-900 placeholder:text-slate-400 transition bg-white">
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Réponse *</label>
                <textarea name="answer" rows="5" required placeholder="Décrivez la réponse technique de manière claire et concise..." 
                          class="w-full rounded-xl border border-slate-300 px-4 py-2.5 focus:ring-2 focus:ring-brand-500/20 focus:border-brand-600 outline-none text-sm text-slate-900 placeholder:text-slate-400 transition bg-white"></textarea>
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Ordre d'apparition</label>
                <input type="number" name="sort_order" value="0" min="0" 
                       class="w-full rounded-xl border border-slate-300 px-4 py-2.5 focus:ring-2 focus:ring-brand-500/20 focus:border-brand-600 outline-none text-sm text-slate-900 transition bg-white">
                <span class="text-[10px] text-slate-400 mt-1 block">Le chiffre le plus bas apparaît en premier.</span>
            </div>

            <button type="submit" class="w-full bg-brand-600 hover:bg-brand-700 text-white font-bold py-2.5 px-4 rounded-xl shadow-md shadow-brand-900/10 transition tracking-wide text-sm mt-2">
                Enregistrer la FAQ
            </button>
        </form>
    </div>

    <div class="lg:col-span-2 space-y-4">
        <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
            <div class="px-6 py-5 border-b border-slate-100 bg-slate-50/50 flex items-center justify-between">
                <h2 class="text-base font-bold text-slate-900 font-display flex items-center gap-2">
                    <span class="w-1.5 h-5 bg-brand-600 rounded-full"></span>
                    Questions en ligne ({{ $faqs->count() }})
                </h2>
            </div>

            <div class="divide-y divide-slate-100">
                @forelse($faqs as $faq)
                    <div class="p-6 hover:bg-slate-50/40 transition-colors group">
                        <div class="flex items-start justify-between gap-4">
                            <div class="space-y-1.5">
                                <div class="flex items-center gap-2">
                                    <span class="text-[10px] font-mono font-bold bg-slate-100 text-slate-500 px-1.5 py-0.5 rounded">#{{ $faq->sort_order }}</span>
                                    <h3 class="font-bold text-slate-900 text-sm">{{ $faq->question }}</h3>
                                </div>
                                <p class="text-xs text-slate-500 leading-relaxed pl-7">
                                    {{ $faq->answer }}
                                </p>
                            </div>

                            <div class="shrink-0">
                                <form action="{{ route('admin.faqs.destroy', $faq->id) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer cette FAQ ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-slate-400 hover:text-rose-600 p-1 rounded-lg hover:bg-rose-50 transition-colors">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="px-6 py-16 text-center">
                        <div class="p-3 bg-slate-100 text-slate-400 rounded-2xl w-12 h-12 flex items-center justify-center mx-auto mb-3">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="text-sm font-bold text-slate-900">Aucune FAQ configurée</h3>
                        <p class="text-xs text-slate-400 mt-1 max-w-xs mx-auto">Utilisez le formulaire latéral pour ajouter vos premiers éléments d'assistance client.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

</div>

@endsection