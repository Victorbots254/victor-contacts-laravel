@extends('layouts.app')

@section('content')
<h2>Group Details</h2>

<div class="mb-3">
    <strong>Name:</strong> {{ $group->name }}
</div>
<div class="mb-3">
    <strong>Description:</strong> {{ $group->description ?? 'N/A' }}
</div>

<a href="{{ route('groups.index') }}" class="btn btn-secondary">Back to Groups</a>
<a href="{{ route('groups.edit', $group) }}" class="btn btn-warning">Edit Group</a>
<form action="{{ route('groups.destroy', $group) }}" method="POST" class="d-inline">
    @csrf
    @method('DELETE')
    <button type="submit" onclick="return confirm('Delete this group?')" class="btn btn-danger">Delete</button>
</form>
@endsection
