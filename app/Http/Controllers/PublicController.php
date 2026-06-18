<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Testimonial;
use App\Models\Faq;
use App\Models\Contact;
use App\Models\QuoteRequest;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home()
    {
        $services = Service::where('is_active', true)->take(3)->get();
        $testimonials = Testimonial::where('is_featured', true)->get();
        $faqs = Faq::orderBy('order_index')->get();
        return view('public.home', compact('services', 'testimonials', 'faqs'));
    }

    public function about()
    {
        return view('public.about');
    }

    public function services()
    {
        $services = Service::where('is_active', true)->get();
        return view('public.services', compact('services'));
    }

    public function contact()
    {
        return view('public.contact');
    }

    public function handleContact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        Contact::create($validated);
        return back()->with('success', 'Votre message a bien été envoyé. Notre équipe vous contactera sous peu.');
    }

    public function quote()
    {
        $services = Service::where('is_active', true)->get();
        return view('public.quote', compact('services'));
    }

    public function handleQuote(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'company_name' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'service_id' => 'required|exists:services,id',
            'description' => 'required|string',
        ]);

        QuoteRequest::create($validated);
        return back()->with('success', 'Votre demande de devis a été enregistrée avec succès.');
    }
}