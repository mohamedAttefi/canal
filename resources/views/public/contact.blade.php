@extends('layouts.app')
@section('title', 'Contact')
@section('content')

@include('partials.page-hero', [
    'compact' => true,
    'badge' => '<span class="year">CI</span> À votre écoute',
    'heading' => 'Contactez <span class="text-brand-500">Canal Informatique</span>',
    'description' => 'Nos experts sont à votre disposition pour planifier un audit, une intervention d\'urgence ou répondre à vos questions.',
])

@include('partials.canal-wave', ['fill' => '#ffffff'])

<section class="py-24 bg-white -mt-1">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16">
        <div>
            <div class="space-y-4 mb-8">
                <div class="canal-card flex items-start gap-4 p-5 rounded-2xl border border-slate-200/80 bg-slate-50 hover:border-brand-200 transition">
                    <div class="w-12 h-12 bg-brand-600 rounded-xl flex items-center justify-center shrink-0 shadow-md shadow-brand-900/20">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                    </div>
                    <div>
                        <p class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-1">Téléphone</p>
                        <a href="tel:+212620155466" class="text-slate-900 font-bold hover:text-brand-600 transition">+212 620 155 466</a>
                    </div>
                </div>
                <div class="canal-card flex items-start gap-4 p-5 rounded-2xl border border-slate-200/80 bg-slate-50 hover:border-brand-200 transition">
                    <div class="w-12 h-12 bg-brand-600 rounded-xl flex items-center justify-center shrink-0 shadow-md shadow-brand-900/20">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    </div>
                    <div>
                        <p class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-1">Adresse</p>
                        <p class="text-slate-900 font-bold">Boulevard Mohamed V<br>Casablanca, Maroc</p>
                    </div>
                </div>
                <div class="canal-card flex items-start gap-4 p-5 rounded-2xl border border-slate-200/80 bg-slate-50 hover:border-brand-200 transition">
                    <div class="w-12 h-12 bg-brand-600 rounded-xl flex items-center justify-center shrink-0 shadow-md shadow-brand-900/20">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <div>
                        <p class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-1">Horaires</p>
                        <p class="text-slate-900 font-bold text-sm">Lun – Ven : 08:30 – 18:30<br>Samedi : 09:00 – 13:00</p>
                    </div>
                </div>
            </div>
            <div class="rounded-2xl overflow-hidden border border-slate-200 h-72 shadow-sm">
                <iframe class="w-full h-full border-0" src="https://maps.google.com/maps?q=Casablanca&t=&z=13&ie=UTF-8&iwloc=&output=embed" allowfullscreen></iframe>
            </div>
        </div>

        <div class="bg-slate-50 p-8 sm:p-10 rounded-3xl border border-slate-200/80 relative">
            <div class="absolute top-0 right-0 w-24 h-24 bg-brand-600/5 rounded-bl-full"></div>
            <h2 class="text-xl font-bold text-slate-950 mb-1 font-display">Envoyez-nous un message</h2>
            <p class="text-sm text-slate-500 mb-8">Réponse sous 24h ouvrées.</p>

            @if(session('success'))
                <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 text-sm font-medium rounded-xl">{{ session('success') }}</div>
            @endif

            <form action="{{ route('contact.submit') }}" method="POST" class="space-y-5">
                @csrf
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Nom</label>
                    <input type="text" name="name" required placeholder="Votre nom" class="canal-input w-full rounded-xl border border-slate-300 px-4 py-3 text-sm text-slate-900 placeholder:text-slate-400 outline-none transition bg-white">
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Email</label>
                    <input type="email" name="email" required placeholder="votre@email.com" class="canal-input w-full rounded-xl border border-slate-300 px-4 py-3 text-sm text-slate-900 placeholder:text-slate-400 outline-none transition bg-white">
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Sujet</label>
                    <input type="text" name="subject" required placeholder="Objet de votre message" class="canal-input w-full rounded-xl border border-slate-300 px-4 py-3 text-sm text-slate-900 placeholder:text-slate-400 outline-none transition bg-white">
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Message</label>
                    <textarea name="message" rows="4" required placeholder="Décrivez votre demande..." class="canal-input w-full rounded-xl border border-slate-300 px-4 py-3 text-sm text-slate-900 placeholder:text-slate-400 outline-none transition bg-white"></textarea>
                </div>
                <button type="submit" class="btn-canal w-full bg-brand-600 hover:bg-brand-700 text-white font-bold py-3.5 px-4 rounded-xl transition text-sm shadow-lg shadow-brand-900/20">Envoyer le Message</button>
            </form>
        </div>
    </div>
</section>

@endsection
