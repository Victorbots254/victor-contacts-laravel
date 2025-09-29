@extends('layouts.app')

@section('content')
<div class="container my-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4>Contact Details</h4>
            <a href="{{ route('contacts.index') }}" class="btn btn-light btn-sm">
                <i class="bi bi-arrow-left"></i> Back
            </a>
        </div>
        <div class="card-body">
            <p><strong>First Name:</strong> {{ $contact->first_name }}</p>
            <p><strong>Last Name:</strong> {{ $contact->last_name }}</p>
            <p><strong>Email:</strong> {{ $contact->email ?? 'N/A' }}</p>
            <p><strong>Phone:</strong> {{ $contact->phone ?? 'N/A' }}</p>
            <p><strong>Notes:</strong> {{ $contact->notes ?? 'No notes' }}</p>
            <p><strong>Groups:</strong>
                @foreach($contact->groups as $group)
                    <span class="badge bg-info text-dark">{{ $group->name }}</span>
                @endforeach
            </p>
        </div>
        <div class="card-footer">
            <a href="{{ route('contacts.edit', $contact) }}" class="btn btn-warning">
                <i class="bi bi-pencil-square"></i> Edit
            </a>
            <form action="{{ route('contacts.destroy', $contact) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Delete this contact?')" class="btn btn-danger">
                    <i class="bi bi-trash"></i> Delete
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
