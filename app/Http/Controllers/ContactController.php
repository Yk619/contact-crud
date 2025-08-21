<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // Show all contacts
    public function index()
    {
        $contacts = Contact::all();
        return view('contacts.index', compact('contacts'));
    }

    // Show form
    public function create()
    {
        return view('contacts.create');
    }

    // Store new contact
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required'
        ]);

        Contact::create($request->all());
        return redirect()->route('contacts.index');
    }

    // Edit form
    public function edit(Contact $contact)
    {
        return view('contacts.edit', compact('contact'));
    }

    // Update
    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required'
        ]);

        $contact->update($request->all());
        return redirect()->route('contacts.index');
    }

    // Delete
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('contacts.index');
    }

    // XML Import
    public function importXml(Request $request)
    {
        $xml = simplexml_load_file($request->file('xml_file')->getRealPath());
        if (!empty($xml)) {
            foreach ($xml->contact as $contact) {
                Contact::create([
                    'name'  => (string) $contact->name,
                    'phone' => (string) $contact->phone,
                ]);
            }
        }

        return redirect()->route('contacts.index');
    }
}
