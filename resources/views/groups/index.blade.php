@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Groups</h2>
    <a href="{{ route('groups.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> Add Group
    </a>
</div>

<div class="table-responsive">
<table class="table table-striped table-bordered align-middle">
    <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($groups as $group)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $group->name }}</td>
            <td>{{ $group->description ?? 'N/A' }}</td>
            <td>
                <a href="{{ route('groups.edit', $group) }}" class="btn btn-sm btn-warning me-1" title="Edit">
                    <i class="bi bi-pencil-square"></i>
                </a>
                <form action="{{ route('groups.destroy', $group) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Delete this group?')" class="btn btn-sm btn-danger" title="Delete">
                        <i class="bi bi-trash"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>

{{ $groups->links() }}
@endsection
