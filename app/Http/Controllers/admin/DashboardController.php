<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\Faq;
use App\Models\Contact;
use App\Models\QuoteRequest;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'services' => Service::count(),
            'testimonials' => Testimonial::count(),
            'faqs' => Faq::count(),
            'contacts' => Contact::where('is_read', false)->count(),
            'quotes' => QuoteRequest::where('status', 'Pending')->count(),
        ];

        $recentQuotes = QuoteRequest::with('service')->latest()->take(5)->get();
        $recentContacts = Contact::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentQuotes', 'recentContacts'));
    }
}