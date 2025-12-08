@extends('components.base')

@section('title', 'Save contact')

@section('content')

    <fieldset>
        <legend>Create a new contact</legend>

        <form action="/" method="POST">
            @csrf
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="contact">Contact Number:</label>
            <input type="text" id="contact" name="contact" required>

            <br><br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <br><br>
            <button type="submit">Save Contact</button>
        </form>
    </fieldset>

@endsection()
