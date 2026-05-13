<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name'              => 'required|string|max:255',
            'email'             => 'required|email|max:255',
            'phone'             => 'nullable|string|max:30',
            'service'           => 'required|string|in:' . implode(',', Lead::$services),
            'message'           => 'nullable|string|max:2000',
            'preferred_contact' => 'required|in:email,phone',
        ]);

        Lead::create($validated);

        return redirect()->route('contact')
            ->with('success', 'Thank you for your enquiry! We will be in touch with you shortly.');
    }
}
