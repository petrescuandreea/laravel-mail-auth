@extends('layouts.main-layout')
@section('content')
    @auth
        <h1>
            Hello {{ Auth::user() -> name }}
        </h1>

        <a class="btn btn-danger" href="{{ route('logout') }}">LOGOUT</a>
    @else
        {{-- login form  --}}
        <h2>Login</h2>
        <form action="{{ route('login') }}" method="POST">
            @method("POST")
            @csrf

            <label for="email">Email</label><br>
            <input type="email" name="email"><br>

            <label for="password">Password</label><br>
            <input type="password" name="password"><br>
            <br>

            <button class="btn btn-primary" type="submit" > Login</button>
        </form>

        {{-- registration form  --}}
        <h2>Registration</h2>
        <form action="{{ route('register') }}" method="POST">
            @method("POST")
            @csrf

            <label for="name">Name</label><br>
            <input type="text" name="name"><br>

            <label for="email">Email</label><br>
            <input type="email" name="email"><br>

            <label for="password">Password</label><br>
            <input type="password" name="password"><br>

            <label for="password_confirmation">Password Confirmation</label><br>
            <input type="password" name="password_confirmation"><br>
            <br>

            <button class="btn btn-primary" type="submit" > Register</button>
        </form>
    @endauth

    {{-- uso il componente videogames 
        attraverso la prop user che valorizzo con Auth::check() controllo se l'utente è loggato o meno --}}
    <videogames-component user="{{ Auth::check() }}"></videogames-component>
@endsection