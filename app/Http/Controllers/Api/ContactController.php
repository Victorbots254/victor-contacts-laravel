<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return response()->json([
            'data' => Contact::with('groups')->get()
        ], 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'first_name' => 'required|string',
            'last_name'  => 'nullable|string',
            'email'      => 'required|email|unique:contacts,email',
            'phone'      => 'nullable|string',
            'notes'      => 'nullable|string',
            'group_ids'  => 'nullable|array',
        ]);

        $groupIds = $data['group_ids'] ?? [];
        unset($data['group_ids']);

        $contact = Contact::create($data);
        if (!empty($groupIds)) {
            $contact->groups()->sync($groupIds);
        }

        return response()->json($contact->load('groups'), 201);
    }

    public function show(Contact $contact)
    {
        return response()->json($contact->load('groups'), 200);
    }

    public function update(Request $request, Contact $contact)
    {
        $data = $request->validate([
            'first_name' => 'sometimes|required|string',
            'last_name'  => 'nullable|string',
            'email'      => 'sometimes|required|email|unique:contacts,email,' . $contact->id,
            'phone'      => 'nullable|string',
            'notes'      => 'nullable|string',
            'group_ids'  => 'nullable|array',
        ]);

        $groupIds = $data['group_ids'] ?? [];
        unset($data['group_ids']);

        $contact->update($data);
        $contact->groups()->sync($groupIds);

        return response()->json($contact->load('groups'), 200);
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return response()->json(null, 204);
    }
}
