<nav>
    <h1>Hello, {{ $user->name }}</h1>

    <form method="post" action="/logout">
        @csrf
        <button action="submit">Logout</button>
    </form>
</nav>
<section class="car-display">
    @include('errors')
    @foreach ($cars as $car)
        <div class="car-in-lot">
            <p>{{$car->make}}</p>
            <p>{{$car->model}}</p>
            <p>{{$car->reg_nr}}</p>
            <p>{{$car->fine}}:-</p>
            <form action="/car/{{$car->id}}/update-fine" method="post">
            @csrf
            <label for="new-fine">New fine:</label>
            <input type="text" name="new-fine">
            <button type="submit">Update fine</button>
        </form>
        <form action="/car/{{$car->id}}/delete">
        <button type="submit">remove car from lot</button>
        </form>
        </div>
    @endforeach
</section>
<section class="inpound-car">
    <h2>Register new inpounded car</h2>
    <form action="/cars" method="post">
        @csrf
        <label for="make">Make:</label>
        <input type="text" name="make">
        <label for="model">Model:</label>
        <input type="text" name="model">
        <label for="reg_nr">Registration number:</label>
        <input type="text" name="reg_nr">
        <label for="owner">Owner (if known):</label>
        <input type="text" name="owner">
        <label for="fine">Fine:</label>
        <input type="text" name="fine">
        <button type="submit">Inpound</button>
    </form>
</section>
