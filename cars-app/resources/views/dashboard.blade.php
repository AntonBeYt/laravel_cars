<h1>Hello, {{ $user->name }}</h1>

<form method="post" action="/logout">
    @csrf
    <button action="submit">Logout</button>
</form>
@include('errors')
