<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Group;
use Illuminate\Http\Request;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::with('groups')->paginate(10);
        return view('contacts.index', compact('contacts'));
    }

    public function create()
    {
        $groups = Group::all();
        return view('contacts.create', compact('groups'));
    }

    public function store(StoreContactRequest $request)
    {
        $data = $request->validated();
        $groupIds = $data['group_ids'] ?? [];
        unset($data['group_ids']);

        $contact = Contact::create($data);
        if (!empty($groupIds)) {
            $contact->groups()->sync($groupIds);
        }

        return redirect()->route('contacts.index')->with('success', 'Contact created successfully.');
    }

    public function show(Contact $contact)
    {
        $contact->load('groups');
        return view('contacts.show', compact('contact'));
    }

    public function edit(Contact $contact)
    {
        $groups = Group::all();
        $contact->load('groups');
        return view('contacts.edit', compact('contact','groups'));
    }

    public function update(UpdateContactRequest $request, Contact $contact)
    {
        $data = $request->validated();
        $groupIds = $data['group_ids'] ?? [];
        unset($data['group_ids']);

        $contact->update($data);
        $contact->groups()->sync($groupIds);

        return redirect()->route('contacts.index')->with('success', 'Contact updated successfully.');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('contacts.index')->with('success', 'Contact deleted successfully.');
    }
}
