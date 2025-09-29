@extends('layouts.app')

@section('content')
<h2>Add New Contact</h2>

<form method="POST" action="{{ route('contacts.store') }}">
    @csrf
    <div class="mb-3">
        <label>First Name</label>
        <input type="text" name="first_name" class="form-control" value="{{ old('first_name') }}" required>
    </div>
    <div class="mb-3">
        <label>Last Name</label>
        <input type="text" name="last_name" class="form-control" value="{{ old('last_name') }}">
    </div>
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="{{ old('email') }}">
    </div>
    <div class="mb-3">
        <label>Phone</label>
        <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
    </div>
    <div class="mb-3">
        <label>Groups</label>
        <select name="group_ids[]" class="form-control" multiple>
            @foreach($groups as $group)
                <option value="{{ $group->id }}">{{ $group->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label>Notes</label>
        <textarea name="notes" class="form-control">{{ old('notes') }}</textarea>
    </div>
    <button type="submit" class="btn btn-success">Save Contact</button>
</form>
@endsection
