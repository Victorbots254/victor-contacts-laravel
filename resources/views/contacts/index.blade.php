@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Contacts</h2>
    <a href="{{ route('contacts.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> Add Contact
    </a>
</div>

<div class="table-responsive">
<table class="table table-striped table-bordered align-middle">
    <thead class="table-dark">
        <tr>
            <th>#</th>
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
            <td>{{ $loop->iteration }}</td>
            <td>{{ $contact->first_name }} {{ $contact->last_name }}</td>
            <td>{{ $contact->email }}</td>
            <td>{{ $contact->phone }}</td>
            <td>
                @foreach($contact->groups as $group)
                    <span class="badge bg-info text-dark">{{ $group->name }}</span>
                @endforeach
            </td>
            <td>
                <a href="{{ route('contacts.show', $contact) }}" class="btn btn-sm btn-info me-1" title="View">
                    <i class="bi bi-eye"></i>
                </a>
                <a href="{{ route('contacts.edit', $contact) }}" class="btn btn-sm btn-warning me-1" title="Edit">
                    <i class="bi bi-pencil-square"></i>
                </a>
                <form action="{{ route('contacts.destroy', $contact) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Delete this contact?')" class="btn btn-sm btn-danger" title="Delete">
                        <i class="bi bi-trash"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>

{{ $contacts->links() }}
@endsection
