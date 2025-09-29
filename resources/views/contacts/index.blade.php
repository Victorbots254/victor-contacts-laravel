@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h2>Contacts</h2>
    <a href="{{ route('contacts.create') }}" class="btn btn-primary">Add Contact</a>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Groups</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($contacts as $contact)
        <tr>
            <td>{{ $contact->first_name }} {{ $contact->last_name }}</td>
            <td>{{ $contact->email }}</td>
            <td>{{ $contact->phone }}</td>
            <td>
                @foreach($contact->groups as $group)
                    <span class="badge bg-secondary">{{ $group->name }}</span>
                @endforeach
            </td>
            <td>
                <a href="{{ route('contacts.edit', $contact) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('contacts.destroy', $contact) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Delete this contact?')" class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $contacts->links() }}
@endsection
