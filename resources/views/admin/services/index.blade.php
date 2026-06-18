@extends('layouts.admin')
@section('admin_content')

<div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
    <div>
        <h1 class="text-2xl font-black text-slate-900 font-display">Gestion des Services</h1>
        <p class="text-sm text-slate-500 mt-1">Gérez les offres affichées sur le site public</p>
    </div>
    <a href="{{ route('admin.services.create') }}" class="btn-canal bg-brand-600 hover:bg-brand-700 text-white font-bold text-xs uppercase tracking-wider px-5 py-3 rounded-xl transition shadow-md shadow-brand-900/20 shrink-0">+ Ajouter un service</a>
</div>

<div class="bg-white rounded-2xl border shadow-sm overflow-hidden">
    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="bg-brand-50/80 text-slate-500 font-bold text-xs uppercase tracking-wider border-b">
                <th class="px-6 py-4">Titre</th>
                <th class="px-6 py-4">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y text-sm font-medium text-slate-900">
            @foreach($services as $service)
            <tr class="hover:bg-brand-50/30 transition">
                <td class="px-6 py-4 flex items-center gap-3">
                    <span class="w-2 h-2 rounded-full bg-brand-500 shrink-0"></span>
                    {{ $service->title }}
                </td>
                <td class="px-6 py-4">
                    <div class="flex gap-4">
                        <a href="{{ route('admin.services.edit', $service) }}" class="text-brand-600 hover:text-brand-700 font-semibold transition">Modifier</a>
                        <form action="{{ route('admin.services.destroy', $service) }}" method="POST" onsubmit="return confirm('Confirmer la suppression ?');">
                            @csrf @method('DELETE')
                            <button class="text-rose-600 hover:text-rose-700 transition">Supprimer</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
