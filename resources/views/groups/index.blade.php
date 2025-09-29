@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h2>Groups</h2>
    <a href="{{ route('groups.create') }}" class="btn btn-primary">Add Group</a>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($groups as $group)
        <tr>
            <td>{{ $group->name }}</td>
            <td>{{ $group->description }}</td>
            <td>
                <a href="{{ route('groups.edit', $group) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('groups.destroy', $group) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Delete this group?')" class="btn btn-sm btn-danger">Delete</button>
                </form>
                <a href="{{ route('groups.show', $group) }}" class="btn btn-sm btn-info">View</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $groups->links() }}
@endsection
