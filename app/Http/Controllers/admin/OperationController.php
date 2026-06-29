<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\QuoteRequest;

class OperationController extends Controller
{
    public function contacts() { return view('admin.contacts', ['contacts' => Contact::latest()->get()]); }
    
    public function markContactRead(Contact $contact) {
        $contact->update(['is_read' => true]);
        return back()->with('success', 'Marqué comme lu.');
    }

    public function quotes() { return view('admin.quotes', ['quotes' => QuoteRequest::with('service')->latest()->get()]); }

    public function updateQuoteStatus(QuoteRequest $quote, $status) {
        $quote->update(['status' => $status]);
        return back()->with('success', 'Statut du devis mis à jour.');
    }
}