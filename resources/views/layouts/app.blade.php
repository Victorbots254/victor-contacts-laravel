<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Victor Contacts App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
    <div class="container">
        <a class="navbar-brand" href="{{ route('contacts.index') }}">ContactsApp</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('contacts.index') }}">Contacts</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('groups.index') }}">Groups</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @yield('content')
</div>
</body>
</html>
