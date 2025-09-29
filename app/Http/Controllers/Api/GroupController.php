<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index()
    {
        return response()->json(Group::with('contacts')->get(), 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|unique:groups,name',
            'description' => 'nullable|string',
        ]);

        $group = Group::create($data);

        return response()->json($group, 201);
    }

    public function show(Group $group)
    {
        return response()->json($group->load('contacts'), 200);
    }

    public function update(Request $request, Group $group)
    {
        $data = $request->validate([
            'name' => 'required|string|unique:groups,name,' . $group->id,
            'description' => 'nullable|string',
        ]);

        $group->update($data);

        return response()->json($group, 200);
    }

    public function destroy(Group $group)
    {
        $group->delete();

        return response()->json(null, 204);
    }
}
