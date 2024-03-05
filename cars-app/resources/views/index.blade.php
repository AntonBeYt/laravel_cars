<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Comic+Neue:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">


<section class="login">
    <h1>Welcome to the inpound lot, please input your credentials</h1>
    @include('errors')
    <form method="post" action="/login" class="login-box">
        @csrf
            <label for="email">Email</label>
            <input name="email" id="email" type="email" />
            <label for="password">Password</label>
            <input name="password" id="password" type="password" />
        <button type="submit">Login</button>
    </form>
</section>

